local FREEZE_DURATION_MS = 2000
local REQUIRED_WEAPON_MESSAGE = "Voce precisa estar com um arco equipado para usar esta habilidade."
local DISTANCE_EFFECT = 35
local IMPACT_EFFECT = CONST_ME_ICEATTACK
local freezeCombat = Combat()
freezeCombat:setParameter(COMBAT_PARAM_EFFECT, IMPACT_EFFECT)

local freezeCondition = Condition(CONDITION_PARALYZE)
freezeCondition:setParameter(CONDITION_PARAM_TICKS, FREEZE_DURATION_MS)
freezeCondition:setFormula(-1, 0, -1, 0)
freezeCombat:addCondition(freezeCondition)

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
	if target then
		player:getPosition():sendDistanceEffect(target:getPosition(), DISTANCE_EFFECT)
		variant = Variant(target)
	end

	return freezeCombat:execute(creature, variant)
end
