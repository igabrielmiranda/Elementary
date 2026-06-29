local PRISON_EFFECT = 323
local PRISON_RADIUS = 3
local PRISON_DURATION_MS = 5000
local LIGHT_SLOW_DURATION_MS = 2000
local HEAVY_SLOW_DURATION_MS = 5000

local damageCombat = Combat()
damageCombat:setParameter(COMBAT_PARAM_TYPE, COMBAT_EARTHDAMAGE)
damageCombat:setArea(createCombatArea({
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 3, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1}
}))

local lightControlCombat = Combat()
lightControlCombat:setArea(createCombatArea({
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 3, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1}
}))

local lightCondition = Condition(CONDITION_PARALYZE)
lightCondition:setParameter(CONDITION_PARAM_TICKS, LIGHT_SLOW_DURATION_MS)
lightCondition:setFormula(-0.20, 0, -0.35, 0)
lightControlCombat:addCondition(lightCondition)

local heavyControlCombat = Combat()
heavyControlCombat:setArea(createCombatArea({
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 3, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1},
	{1, 1, 1, 1, 1, 1, 1}
}))

local heavyCondition = Condition(CONDITION_PARALYZE)
heavyCondition:setParameter(CONDITION_PARAM_TICKS, HEAVY_SLOW_DURATION_MS)
heavyCondition:setFormula(-0.70, 0, -0.85, 0)
heavyControlCombat:addCondition(heavyCondition)

function onGetFormulaValues(player, level, magicLevel)
	local min = (level * 1.0) + (magicLevel * 3)
	local max = (level * 1.5) + (magicLevel * 5)
	return -min, -max
end

damageCombat:setCallback(CALLBACK_PARAM_LEVELMAGICVALUE, "onGetFormulaValues")

local function getPerimeterPositions(centerPosition)
	local positions = {}

	for offsetX = -PRISON_RADIUS, PRISON_RADIUS do
		for offsetY = -PRISON_RADIUS, PRISON_RADIUS do
			if math.abs(offsetX) == PRISON_RADIUS or math.abs(offsetY) == PRISON_RADIUS then
				positions[#positions + 1] = Position(centerPosition.x + offsetX, centerPosition.y + offsetY, centerPosition.z)
			end
		end
	end

	return positions
end

local function showPrisonEffect(centerPosition)
	for _, position in ipairs(getPerimeterPositions(centerPosition)) do
		local tile = Tile(position)
		if tile then
			position:sendMagicEffect(PRISON_EFFECT)
		end
	end
end

local function hasBlockingItem(tile)
	local items = tile:getItems()
	if not items then
		return false
	end

	for index = 1, tile:getItemCount() do
		local item = items[index]
		if item and item:hasProperty(CONST_PROP_BLOCKSOLID) then
			return true
		end
	end

	return false
end

local function canCreateBarrierAt(position)
	local tile = Tile(position)
	if not tile or not tile:getGround() then
		return false
	end

	if tile:hasFlag(TILESTATE_PROTECTIONZONE) or tile:isHouse() then
		return false
	end

	if tile:hasProperty(TILESTATE_NONE) or tile:hasProperty(TILESTATE_FLOORCHANGE_EAST) then
		return false
	end

	if tile:getTopCreature() then
		return false
	end

	if hasBlockingItem(tile) then
		return false
	end

	return true
end

local function hasNpcInArea(centerPosition)
	local spectators = Game.getSpectators(centerPosition, false, false, PRISON_RADIUS, PRISON_RADIUS, PRISON_RADIUS, PRISON_RADIUS)
	for _, spectator in ipairs(spectators) do
		if spectator:isNpc() then
			return true
		end
	end

	return false
end

local function safelyRemoveBarrierItems(items)
	for _, item in ipairs(items) do
		pcall(function()
			if item and item:isItem() then
				item:remove()
			end
		end)
	end
end

local function createBarrier(centerPosition)
	if hasNpcInArea(centerPosition) then
		return {}
	end

	local createdItems = {}

	for _, position in ipairs(getPerimeterPositions(centerPosition)) do
		if canCreateBarrierAt(position) then
			local wallItem = Game.createItem(ITEM_WILDGROWTH, 1, position)
			if wallItem then
				pcall(function()
					wallItem:decay()
				end)
				createdItems[#createdItems + 1] = wallItem
			end
		end
	end

	if #createdItems > 0 then
		addEvent(function()
			safelyRemoveBarrierItems(createdItems)
		end, PRISON_DURATION_MS)
	end

	return createdItems
end

function onCastSpell(creature, variant)
	local player = Player(creature)
	if player and not player:checkElementRequirement(ELEMENT_EARTH) then
		return false
	end

	if not damageCombat:execute(creature, variant) then
		return false
	end

	local centerPosition = creature:getPosition()
	showPrisonEffect(centerPosition)

	local barrierItems = createBarrier(centerPosition)
	if #barrierItems > 0 then
		lightControlCombat:execute(creature, variant)
	else
		heavyControlCombat:execute(creature, variant)
	end

	return true
end
