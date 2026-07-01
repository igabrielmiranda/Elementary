local FREEZE_DURATION_MS = 2000
local FREEZE_VISUAL_EFFECT = 324
local FREEZE_VISUAL_TICK_MS = 250
local FREEZE_VISUAL_FADE_MS = 1500
local REQUIRED_WEAPON_MESSAGE = "Voce precisa estar com um arco equipado para usar esta habilidade."
local REQUIRED_TARGET_MESSAGE = "Voce precisa usar esta habilidade em uma criatura."
local DISTANCE_EFFECT = 35
local IMPACT_EFFECT = CONST_ME_ICEATTACK
local activeFreezes = {}
local freezeCombat = Combat()
freezeCombat:setParameter(COMBAT_PARAM_EFFECT, IMPACT_EFFECT)

local freezeCondition = Condition(CONDITION_PARALYZE)
freezeCondition:setParameter(CONDITION_PARAM_TICKS, FREEZE_DURATION_MS)
freezeCondition:setFormula(-1, 80, -1, 80)
freezeCombat:addCondition(freezeCondition)

local function showFreezeVisual(targetId, remainingTicks)
	if remainingTicks <= 0 then
		return
	end

	local target = Creature(targetId)
	if not target or target:isRemoved() or target:getHealth() <= 0 then
		return
	end

	target:getPosition():sendMagicEffect(FREEZE_VISUAL_EFFECT)

	if remainingTicks > 1 then
		addEvent(showFreezeVisual, FREEZE_VISUAL_TICK_MS, targetId, remainingTicks - 1)
	end
end

local function startFreezeVisual(targetId)
	local visualWindowMs = math.max(FREEZE_VISUAL_TICK_MS, FREEZE_DURATION_MS - FREEZE_VISUAL_FADE_MS)
	local visualTicks = math.max(1, math.ceil(visualWindowMs / FREEZE_VISUAL_TICK_MS))
	showFreezeVisual(targetId, visualTicks)
end

local function clearFreeze(targetId, freezeToken)
	local freezeData = activeFreezes[targetId]
	if not freezeData or freezeData.token ~= freezeToken then
		return
	end

	local target = Creature(targetId)
	if target and not target:isRemoved() then
		target:changeSpeed(-freezeData.delta)
	end

	activeFreezes[targetId] = nil
end

local function applyFreeze(target)
	local targetId = target:getId()
	local previousFreeze = activeFreezes[targetId]
	if previousFreeze then
		clearFreeze(targetId, previousFreeze.token)
		target = Creature(targetId)
		if not target or target:isRemoved() or target:getHealth() <= 0 then
			return false
		end
	end

	local currentSpeed = target:getSpeed()
	if currentSpeed > 0 then
		local freezeDelta = -currentSpeed
		local freezeToken = os.mtime()
		target:changeSpeed(freezeDelta)
		activeFreezes[targetId] = {
			delta = freezeDelta,
			token = freezeToken
		}
		addEvent(clearFreeze, FREEZE_DURATION_MS, targetId, freezeToken)
	end

	target:blockSpellCasts(FREEZE_DURATION_MS)
	target:addCondition(freezeCondition:clone())
	startFreezeVisual(targetId)
	return true
end

local function isBowItem(item)
	if not item then
		return false
	end

	local itemType = item:getType()
	local weaponType = itemType:getWeaponType()
	if weaponType ~= WEAPON_DISTANCE then
		return false
	end

	local ammoType = itemType:getAmmoType()
	if ammoType == AMMO_ARROW then
		return true
	end

	if ammoType == AMMO_BOLT then
		return false
	end

	local weaponName = item:getName()
	if type(weaponName) ~= "string" or weaponName == "" then
		weaponName = itemType:getName()
	end

	if type(weaponName) ~= "string" then
		return false
	end

	weaponName = weaponName:lower()
	return weaponName:find("bow", 1, true) ~= nil and weaponName:find("crossbow", 1, true) == nil
end

local function hasBowEquipped(player)
	for _, slot in ipairs({CONST_SLOT_LEFT, CONST_SLOT_RIGHT}) do
		local weapon = player:getSlotItem(slot)
		if isBowItem(weapon) then
			return true
		end
	end

	return false
end

function onCastSpell(creature, variant)
	local player = Player(creature)
	if not player then
		return false
	end

	if not hasBowEquipped(player) then
		player:sendCancelMessage(REQUIRED_WEAPON_MESSAGE)
		return false
	end

	local target = creature:getTarget()
	if not target or target:isRemoved() or target:getHealth() <= 0 then
		player:sendCancelMessage(REQUIRED_TARGET_MESSAGE)
		return false
	end

	player:getPosition():sendDistanceEffect(target:getPosition(), DISTANCE_EFFECT)
	variant = Variant(target)

	if not freezeCombat:execute(creature, variant) then
		return false
	end

	return applyFreeze(target)
end
