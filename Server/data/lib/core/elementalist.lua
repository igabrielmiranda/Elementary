ELEMENT_NONE = 0
ELEMENT_FIRE = 1
ELEMENT_WATER = 2
ELEMENT_EARTH = 3
ELEMENT_AIR = 4

local ELEMENTALIST_ELEMENT_NAMES = {
	[ELEMENT_NONE] = "Nenhum",
	[ELEMENT_FIRE] = "Fogo",
	[ELEMENT_WATER] = "Agua",
	[ELEMENT_EARTH] = "Terra",
	[ELEMENT_AIR] = "Ar",
}

local ELEMENTALIST_ELEMENT_ALIASES = {
	none = ELEMENT_NONE,
	nenhum = ELEMENT_NONE,
	fire = ELEMENT_FIRE,
	fogo = ELEMENT_FIRE,
	water = ELEMENT_WATER,
	agua = ELEMENT_WATER,
	earth = ELEMENT_EARTH,
	terra = ELEMENT_EARTH,
	air = ELEMENT_AIR,
	ar = ELEMENT_AIR,
}

local function normalizeElementId(elementId)
	elementId = tonumber(elementId) or ELEMENT_NONE
	if elementId < ELEMENT_NONE or elementId > ELEMENT_AIR then
		return ELEMENT_NONE
	end
	return elementId
end

function ElementalistGetElementId(value)
	if type(value) == "number" then
		return normalizeElementId(value)
	end

	if type(value) ~= "string" then
		return nil
	end

	return ELEMENTALIST_ELEMENT_ALIASES[value:trim():lower()]
end

function ElementalistGetElementName(elementId)
	return ELEMENTALIST_ELEMENT_NAMES[normalizeElementId(elementId)] or ELEMENTALIST_ELEMENT_NAMES[ELEMENT_NONE]
end

function Player.getPrimaryElement(self)
	return normalizeElementId(self:getStorageValue(PlayerStorageKeys.elementPrimary))
end

function Player.getSecondaryElement(self)
	return normalizeElementId(self:getStorageValue(PlayerStorageKeys.elementSecondary))
end

function Player.isElementalistInitialized(self)
	return self:getStorageValue(PlayerStorageKeys.elementInitialized) > 0
end

function Player.hasElement(self, elementId)
	elementId = normalizeElementId(elementId)
	if elementId == ELEMENT_NONE then
		return false
	end

	return self:getPrimaryElement() == elementId or self:getSecondaryElement() == elementId
end

function Player.getElementSummary(self)
	if not self:isElementalistInitialized() then
		return "Nenhum"
	end

	local primary = self:getPrimaryElement()
	local secondary = self:getSecondaryElement()

	if primary == ELEMENT_NONE then
		return "Nenhum"
	end

	if secondary == ELEMENT_NONE then
		return ElementalistGetElementName(primary)
	end

	return string.format("%s + %s", ElementalistGetElementName(primary), ElementalistGetElementName(secondary))
end

function Player.setElements(self, primary, secondary)
	primary = ElementalistGetElementId(primary)
	secondary = secondary ~= nil and ElementalistGetElementId(secondary) or ELEMENT_NONE

	if primary == nil or secondary == nil then
		return false, "invalid"
	end

	if primary == ELEMENT_NONE and secondary ~= ELEMENT_NONE then
		return false, "invalid"
	end

	if primary == secondary then
		secondary = ELEMENT_NONE
	end

	local initialized = 1
	if primary == ELEMENT_NONE and secondary == ELEMENT_NONE then
		initialized = 0
	end

	self:setStorageValue(PlayerStorageKeys.elementPrimary, primary)
	self:setStorageValue(PlayerStorageKeys.elementSecondary, secondary)
	self:setStorageValue(PlayerStorageKeys.elementInitialized, initialized)
	self:setStorageValue(PlayerStorageKeys.elementLastChange, os.time())
	return true
end

function Player.clearElements(self)
	return self:setElements(ELEMENT_NONE, ELEMENT_NONE)
end

function Player.checkElementRequirement(self, elementId)
	elementId = normalizeElementId(elementId)
	if elementId == ELEMENT_NONE then
		return true
	end

	if not self:isElementalistInitialized() then
		return true
	end

	local primary = self:getPrimaryElement()
	local secondary = self:getSecondaryElement()
	local allowed = self:hasElement(elementId)

	if allowed then
		return true
	end

	self:sendCancelMessage("Esta habilidade exige o elemento " .. ElementalistGetElementName(elementId) .. ".")
	self:getPosition():sendMagicEffect(CONST_ME_POFF)
	return false
end

local function resolveElementalistPlayer(creature)
	local player = Player(creature)
	if player then
		return player
	end

	if type(creature) == "userdata" then
		local ok, isPlayer = pcall(function()
			return creature:isPlayer()
		end)
		if ok and isPlayer then
			return creature
		end

		local okGetPlayer, resolvedPlayer = pcall(function()
			return creature:getPlayer()
		end)
		if okGetPlayer and resolvedPlayer then
			return resolvedPlayer
		end
	end

	return nil
end

function ElementalistCanCastSpell(creature, elementId)
	local player = resolveElementalistPlayer(creature)
	if not player then
		return true
	end

	return player:checkElementRequirement(elementId)
end
