local OPCODE = ExtendedOPCodes.CODE_ELEMENTALIST

local TEST_SKILLS = {
  [ELEMENT_FIRE] = {
    {name = "Apprentice's Strike", words = "exori min flam", level = 8, mana = 6, cooldown = 2000},
    {name = "Flame Strike", words = "exori flam", level = 14, mana = 20, cooldown = 2000},
    {name = "Black Fire", words = "fire black", level = 20, mana = 40, cooldown = 6000, effect = 229, description = "Libera uma explosao de chamas negras ao redor do Elementalista, causando dano de fogo em area."},
    {name = "Fire Tornado", words = "fire tornado", level = 30, mana = 80, cooldown = 10000, effect = 321, description = "Invoca um tornado de fogo que puxa inimigos proximos para o centro e causa dano de fogo em area."},
    {name = "Strong Flame Strike", words = "exori gran flam", level = 70, mana = 60, cooldown = 8000},
    {name = "Ultimate Flame Strike", words = "exori max flam", level = 90, mana = 100, cooldown = 30000},
    {name = "Fire Wave", words = "exevo flam hur", level = 18, mana = 25, cooldown = 4000},
    {name = "Great Fire Wave", words = "exevo gran flam hur", level = 38, mana = 120, cooldown = 4000},
    {name = "Hell's Core", words = "exevo gran mas flam", level = 60, mana = 1100, cooldown = 40000},
    {name = "Ignite", words = "utori flam", level = 26, mana = 30, cooldown = 30000},
    {name = "Practice Fire Wave", words = "exevo dis flam hur", level = 1, mana = 5, cooldown = 4000},
    {name = "Scorch", words = "exevo infir flam hur", level = 1, mana = 8, cooldown = 4000},
    {name = "Fireball Rune", words = "adori flam", level = 27, mana = 460, cooldown = 2000},
    {name = "Great Fireball Rune", words = "adori mas flam", level = 30, mana = 530, cooldown = 2000},
    {name = "Fire Field Rune", words = "adevo grav flam", level = 15, mana = 240, cooldown = 2000},
    {name = "Fire Bomb Rune", words = "adevo mas flam", level = 27, mana = 600, cooldown = 2000},
    {name = "Fire Wall Rune", words = "adevo mas grav flam", level = 33, mana = 780, cooldown = 2000},
    {name = "Soulfire Rune", words = "adevo res flam", level = 27, mana = 420, cooldown = 2000},
  },
  [ELEMENT_WATER] = {
    {name = "Chill Out", words = "exevo infir frigo hur", level = 1, mana = 8, cooldown = 4000},
    {name = "Ice Strike", words = "exori frigo", level = 15, mana = 20, cooldown = 2000},
    {name = "Strong Ice Strike", words = "exori gran frigo", level = 80, mana = 60, cooldown = 8000},
    {name = "Ultimate Ice Strike", words = "exori max frigo", level = 100, mana = 100, cooldown = 30000},
    {name = "Ice Wave", words = "exevo frigo hur", level = 18, mana = 25, cooldown = 4000},
    {name = "Strong Ice Wave", words = "exevo gran frigo hur", level = 40, mana = 170, cooldown = 8000},
    {name = "Eternal Winter", words = "exevo gran mas frigo", level = 60, mana = 1050, cooldown = 40000},
    {name = "Ice Burst", words = "exevo ulus frigo", level = 300, mana = 230, cooldown = 22000},
    {name = "Light Healing", words = "exura", level = 8, mana = 20, cooldown = 1000},
    {name = "Intense Healing", words = "exura gran", level = 20, mana = 70, cooldown = 1000},
    {name = "Ultimate Healing", words = "exura vita", level = 30, mana = 160, cooldown = 1000},
    {name = "Heal Friend", words = "exura sio", level = 18, mana = 140, cooldown = 1000},
    {name = "Mass Healing", words = "exura gran mas res", level = 36, mana = 150, cooldown = 2000},
    {name = "Divine Healing", words = "exura san", level = 35, mana = 160, cooldown = 1000},
    {name = "Recovery", words = "utura", level = 50, mana = 75, cooldown = 60000},
    {name = "Intense Recovery", words = "utura gran", level = 100, mana = 165, cooldown = 60000},
    {name = "Restoration", words = "exura max vita", level = 300, mana = 260, cooldown = 6000},
    {name = "Salvation", words = "exura gran san", level = 60, mana = 210, cooldown = 1000},
    {name = "Practice Healing", words = "exura dis", level = 1, mana = 5, cooldown = 1000},
    {name = "Cure Burning", words = "exana flam", level = 30, mana = 30, cooldown = 6000},
    {name = "Cure Poison", words = "exana pox", level = 10, mana = 30, cooldown = 6000},
    {name = "Cure Electrification", words = "exana vis", level = 22, mana = 30, cooldown = 6000},
    {name = "Icicle Rune", words = "adori frigo", level = 28, mana = 460, cooldown = 2000},
    {name = "Avalanche Rune", words = "adori mas frigo", level = 30, mana = 530, cooldown = 2000},
    {name = "Intense Healing Rune", words = "adura gran", level = 15, mana = 120, cooldown = 2000},
    {name = "Ultimate Healing Rune", words = "adura vita", level = 24, mana = 400, cooldown = 2000},
  },
  [ELEMENT_EARTH] = {
    {name = "Mud Attack", words = "exori infir tera", level = 1, mana = 6, cooldown = 2000},
    {name = "Terra Strike", words = "exori tera", level = 13, mana = 20, cooldown = 2000},
    {name = "Strong Terra Strike", words = "exori gran tera", level = 70, mana = 60, cooldown = 8000},
    {name = "Ultimate Terra Strike", words = "exori max tera", level = 90, mana = 100, cooldown = 30000},
    {name = "Terra Wave", words = "exevo tera hur", level = 38, mana = 210, cooldown = 4000},
    {name = "Earth Prison", words = "earth prison", level = 35, mana = 100, cooldown = 12000, effect = 323, description = "Ergue uma prisao de terra ao redor do Elementalista, prendendo inimigos proximos e causando dano de terra."},
    {name = "Terra Burst", words = "exevo ulus tera", level = 300, mana = 230, cooldown = 22000},
    {name = "Wrath of Nature", words = "exevo gran mas tera", level = 55, mana = 700, cooldown = 40000},
    {name = "Envenom", words = "utori pox", level = 50, mana = 30, cooldown = 40000},
    {name = "Stalagmite Rune", words = "adori tera", level = 24, mana = 350, cooldown = 2000},
    {name = "Stone Shower Rune", words = "adori mas tera", level = 28, mana = 430, cooldown = 2000},
    {name = "Light Stone Shower Rune", words = "adori infir mas tera", level = 1, mana = 6, cooldown = 2000},
    {name = "Poison Field Rune", words = "adevo grav pox", level = 14, mana = 200, cooldown = 2000},
    {name = "Poison Bomb Rune", words = "adevo mas pox", level = 25, mana = 520, cooldown = 2000},
    {name = "Poison Wall Rune", words = "adevo mas grav pox", level = 29, mana = 640, cooldown = 2000},
    {name = "Wild Growth Rune", words = "adevo grav vita", level = 27, mana = 600},
  },
  [ELEMENT_AIR] = {
    {name = "Buzz", words = "exori infir vis", level = 1, mana = 6, cooldown = 2000},
    {name = "Wind Shot", words = "wind shot", level = 10, mana = 15, cooldown = 1000, effect = "Missile 23", description = "Dispara uma rajada concentrada de vento contra o alvo."},
    {name = "Electrify", words = "utori vis", level = 34, mana = 30, cooldown = 30000},
    {name = "Energy Strike", words = "exori vis", level = 12, mana = 20, cooldown = 2000},
    {name = "Strong Energy Strike", words = "exori gran vis", level = 80, mana = 60, cooldown = 8000},
    {name = "Ultimate Energy Strike", words = "exori max vis", level = 100, mana = 100, cooldown = 30000},
    {name = "Energy Beam", words = "exevo vis lux", level = 23, mana = 40, cooldown = 4000},
    {name = "Great Energy Beam", words = "exevo gran vis lux", level = 29, mana = 110, cooldown = 6000},
    {name = "Energy Wave", words = "exevo vis hur", level = 38, mana = 170, cooldown = 8000},
    {name = "Lightning", words = "exori amp vis", level = 55, mana = 60, cooldown = 8000},
    {name = "Rage of the Skies", words = "exevo gran mas vis", level = 55, mana = 600, cooldown = 40000},
    {name = "Thunderstorm Rune", words = "adori mas vis", level = 28, mana = 430, cooldown = 2000},
    {name = "Haste", words = "utani hur", level = 14, mana = 60, cooldown = 2000},
    {name = "Strong Haste", words = "utani gran hur", level = 20, mana = 100, cooldown = 2000},
    {name = "Swift Foot", words = "utamo tempo san", level = 55, mana = 400, cooldown = 2000},
    {name = "Charge", words = "utani tempo hur", level = 25, mana = 100, cooldown = 2000},
  },
}

local function sendElementalistError(player, message)
	player:sendCancelMessage(message)
	player:sendExtendedOpcode(OPCODE, json.encode({action = "error", data = {message = message}}))
end

local function appendSkills(skills, elementId)
	local elementSkills = TEST_SKILLS[elementId]
	if not elementSkills then
		return
	end

	for _, skill in ipairs(elementSkills) do
		local entry = {}
		for key, value in pairs(skill) do
			entry[key] = value
		end
		entry.element = elementId
		entry.elementName = entry.elementName or ElementalistGetElementName(elementId)
		skills[#skills + 1] = entry
	end
end

local function buildSkillsForPlayer(player)
	local skills = {}
	local primary = player:getPrimaryElement()
	local secondary = player:getSecondaryElement()

	appendSkills(skills, primary)
	if secondary ~= primary then
		appendSkills(skills, secondary)
	end

	return skills
end

local function buildStatePayload(player, message)
	return {
		primary = player:getPrimaryElement(),
		secondary = player:getSecondaryElement(),
		initialized = player:isElementalistInitialized(),
		summary = player:getElementSummary(),
		skills = buildSkillsForPlayer(player),
		message = message,
	}
end

local function sendElementalistState(player, message)
	player:sendExtendedOpcode(OPCODE, json.encode({action = "state", data = buildStatePayload(player, message)}))
end

local function normalizeSelection(data)
	if type(data) ~= "table" then
		return ELEMENT_NONE, ELEMENT_NONE
	end

	local primary = data.primary
	local secondary = data.secondary

	if type(data.elements) == "table" then
		if #data.elements > 2 then
			return nil, nil, "Voce so pode escolher ate 2 elementos."
		end

		primary = data.elements[1]
		secondary = data.elements[2]
	end

	if primary == nil then
		primary = ELEMENT_NONE
	end

	if secondary == nil then
		secondary = ELEMENT_NONE
	end

	primary = ElementalistGetElementId(primary)
	secondary = ElementalistGetElementId(secondary)

	if primary == nil or secondary == nil then
		return nil, nil, "Elemento invalido."
	end

	if primary == ELEMENT_NONE and secondary ~= ELEMENT_NONE then
		return nil, nil, "Elemento invalido."
	end

	if primary == secondary then
		secondary = ELEMENT_NONE
	end

	return primary, secondary, nil
end

local LoginEvent = CreatureEvent("ElementalistInterfaceLogin")

function LoginEvent.onLogin(player)
	player:registerEvent("ElementalistInterfaceExtended")
	return true
end

local ExtendedEvent = CreatureEvent("ElementalistInterfaceExtended")

function ExtendedEvent.onExtendedOpcode(player, opcode, buffer)
	if opcode ~= OPCODE then
		return
	end

	local status, payload = pcall(function()
		return json.decode(buffer)
	end)

	if not status or type(payload) ~= "table" then
		sendElementalistError(player, "Falha ao ler a solicitacao elemental.")
		return
	end

	local action = payload.action
	local data = payload.data

	if action == "fetch" then
		sendElementalistState(player)
		return
	end

	if action ~= "save" then
		sendElementalistError(player, "Acao elemental invalida.")
		return
	end

	local primary, secondary, errorMessage = normalizeSelection(data)
	if errorMessage then
		sendElementalistError(player, errorMessage)
		return
	end

	local ok, reason = player:setElements(primary, secondary)
	if not ok then
		sendElementalistError(player, reason == "invalid" and "Elemento invalido." or "Nao foi possivel salvar os elementos.")
		return
	end

	local message
	if primary == ELEMENT_NONE then
		message = "Elementos limpos."
	elseif secondary == ELEMENT_NONE then
		message = "Elemento definido: " .. ElementalistGetElementName(primary) .. "."
	else
		message = string.format("Elementos definidos: %s + %s.", ElementalistGetElementName(primary), ElementalistGetElementName(secondary))
	end

	player:sendTextMessage(MESSAGE_STATUS_CONSOLE_BLUE, message)
	sendElementalistState(player, message)
end

LoginEvent:type("login")
LoginEvent:register()

ExtendedEvent:type("extendedopcode")
ExtendedEvent:register()
