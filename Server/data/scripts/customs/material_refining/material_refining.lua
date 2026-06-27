local MaterialRefining = rawget(_G, "MaterialRefining") or {}
_G.MaterialRefining = MaterialRefining

local CODE_MATERIAL_REFINING = 94
local MATERIAL_DESCRIPTION = "Material usado em forja, fabricacao e refinamento de equipamentos."
local MATERIAL_ORDER = {
	"metal",
	"madeira",
	"couro",
	"cristal",
	"algodao",
	"metal_raro",
	"madeira_rara",
}

local MATERIALS = {
	metal = {
		label = "Metal",
		plural = "Metais",
		article = "um",
		baseItemId = 26398,
		aliases = {"metal"},
	},
	madeira = {
		label = "Madeira",
		plural = "Madeiras",
		article = "uma",
		baseItemId = 26594,
		aliases = {"madeira", "wood"},
	},
	couro = {
		label = "Couro",
		plural = "Couros",
		article = "um",
		baseItemId = 5878,
		aliases = {"couro", "leather"},
	},
	cristal = {
		label = "Cristal",
		plural = "Cristais",
		article = "um",
		baseItemId = 18413,
		aliases = {"cristal", "crystal"},
	},
	algodao = {
		label = "Algodao",
		plural = "Algodoes",
		article = "um",
		baseItemId = 5909,
		aliases = {"algodao", "cotton", "cloth"},
	},
	metal_raro = {
		label = "Metal Raro",
		plural = "Metais Raros",
		article = "um",
		baseItemId = 26401,
		aliases = {"metal_raro", "metal raro", "rare_metal", "rare metal"},
	},
	madeira_rara = {
		label = "Madeira Rara",
		plural = "Madeiras Raras",
		article = "uma",
		baseItemId = 26598,
		aliases = {"madeira_rara", "madeira rara", "rare_wood", "rare wood"},
	},
}

local BASE_OPTIONS = {
	{base = 2, chance = 40},
	{base = 3, chance = 60},
	{base = 4, chance = 80},
	{base = 5, chance = 100},
}

local GRADE_RARITY = {
	[1] = 0,
	[2] = ITEM_RARITY_COMMON,
	[3] = ITEM_RARITY_RARE,
	[4] = ITEM_RARITY_EPIC,
	[5] = ITEM_RARITY_LEGENDARY,
}

local aliasToKey = {}
for materialKey, materialData in pairs(MATERIALS) do
	for _, alias in ipairs(materialData.aliases) do
		aliasToKey[alias:lower():gsub("[%s%-]+", "_")] = materialKey
	end
end

MaterialRefining.materials = MATERIALS
MaterialRefining.baseOptions = BASE_OPTIONS
MaterialRefining.gradeRarity = GRADE_RARITY
MaterialRefining.opcode = CODE_MATERIAL_REFINING

local function splitWords(param)
	local words = {}
	local normalized = (param or ""):gsub(",", " ")
	for token in normalized:gmatch("%S+") do
		words[#words + 1] = token
	end
	return words
end

local function trimString(value)
	return (value or ""):gsub("^%s+", ""):gsub("%s+$", "")
end

local function normalizeMaterialToken(text)
	if not text or text == "" then
		return nil
	end
	return text:lower():gsub("[%s%-]+", "_")
end

local function getMaterialKey(rawMaterial)
	return aliasToKey[normalizeMaterialToken(rawMaterial or "")]
end

local function resolveMaterialKey(rawMaterial)
	if not rawMaterial or rawMaterial == "" then
		return nil
	end

	if MATERIALS[rawMaterial] then
		return rawMaterial
	end

	return getMaterialKey(rawMaterial)
end

local function getMaterialData(materialKey)
	return MATERIALS[materialKey]
end

local function getMaterialName(materialKey, grade)
	local materialData = getMaterialData(materialKey)
	if not materialData then
		return nil
	end
	return string.format("%s [Grau %d]", materialData.label, grade)
end

local function getMaterialPlural(materialKey, grade)
	local materialData = getMaterialData(materialKey)
	if not materialData then
		return nil
	end
	return string.format("%s [Grau %d]", materialData.plural, grade)
end

local function getMaterialDescription(materialKey, grade)
	local description = string.format("%s\nGrau do material: %d", MATERIAL_DESCRIPTION, grade)
	if materialKey == "metal_raro" or materialKey == "madeira_rara" then
		description = description .. "\nCategoria: raro"
	end
	return description
end

local function sendClientAction(player, action, data)
	player:sendExtendedOpcode(CODE_MATERIAL_REFINING, json.encode({action = action, data = data}))
end

local function getBaseOption(baseValue)
	for _, option in ipairs(BASE_OPTIONS) do
		if option.base == baseValue then
			return option
		end
	end
	return nil
end

local function serializeBaseOptions(availableCount, refinable)
	local bases = {}
	for _, option in ipairs(BASE_OPTIONS) do
		local maxAttempts = 0
		if refinable and availableCount and availableCount > 0 then
			maxAttempts = math.floor(availableCount / option.base)
		end

		bases[#bases + 1] = {
			id = option.base,
			base = option.base,
			chance = option.chance,
			consume = option.base,
			maxAttempts = maxAttempts,
			enabled = maxAttempts > 0,
		}
	end
	return bases
end

local function getMaterialClientId(materialKey)
	local materialData = getMaterialData(materialKey)
	if not materialData then
		return 0
	end

	local itemType = ItemType(materialData.baseItemId)
	return itemType and itemType:getClientId() or 0
end

local function isMaterialItem(item, materialKey, grade)
	if not item or not item:isItem() then
		return false
	end

	if tonumber(item:getCustomAttribute("material_refining")) ~= 1 then
		return false
	end

	local itemMaterialKey = item:getCustomAttribute("material_type")
	local itemGrade = tonumber(item:getCustomAttribute("material_grade"))
	if not itemMaterialKey or not itemGrade then
		return false
	end

	if materialKey and itemMaterialKey ~= materialKey then
		return false
	end

	if grade and itemGrade ~= grade then
		return false
	end

	return true
end

local function applyMaterialAttributes(item, materialKey, grade)
	local materialData = getMaterialData(materialKey)
	if not item or not materialData then
		return false
	end

	item:setAttribute(ITEM_ATTRIBUTE_NAME, getMaterialName(materialKey, grade))
	item:setAttribute(ITEM_ATTRIBUTE_ARTICLE, materialData.article)
	item:setAttribute(ITEM_ATTRIBUTE_PLURALNAME, getMaterialPlural(materialKey, grade))
	item:setAttribute(ITEM_ATTRIBUTE_DESCRIPTION, getMaterialDescription(materialKey, grade))
	item:setCustomAttribute("material_refining", 1)
	item:setCustomAttribute("material_type", materialKey)
	item:setCustomAttribute("material_grade", grade)

	local rarity = GRADE_RARITY[grade] or 0
	if rarity > 0 then
		item:setAttribute(ITEM_ATTRIBUTE_RARITYLEVEL, rarity)
	end

	return true
end

function MaterialRefining.createMaterialItem(materialKey, grade, count)
	local materialData = getMaterialData(materialKey)
	if not materialData then
		return nil, "Material invalido."
	end

	local item = Game.createItem(materialData.baseItemId, count)
	if not item then
		return nil, "Nao foi possivel criar o item base do material."
	end

	applyMaterialAttributes(item, materialKey, grade)
	return item
end

function MaterialRefining.giveMaterial(player, materialKey, grade, count)
	if not player then
		return false, "Jogador invalido."
	end

	local materialData = getMaterialData(materialKey)
	if not materialData then
		return false, "Material invalido."
	end

	if grade < 1 or grade > 5 then
		return false, "Grau invalido. Use um valor entre 1 e 5."
	end

	if count < 1 then
		return false, "Quantidade invalida."
	end

	local remaining = count
	while remaining > 0 do
		local stackCount = math.min(remaining, 100)
		local item, err = MaterialRefining.createMaterialItem(materialKey, grade, stackCount)
		if not item then
			return false, err
		end

		local result = player:addItemEx(item)
		if result ~= true and result ~= RETURNVALUE_NOERROR then
			item:remove()
			return false, "Nao foi possivel adicionar o material ao inventario."
		end

		remaining = remaining - stackCount
	end

	return true
end

local function collectMatchingInventoryItems(player, materialKey, grade)
	local matches = {}

	local function addItem(item)
		if isMaterialItem(item, materialKey, grade) then
			matches[#matches + 1] = item
		end
	end

	for slot = CONST_SLOT_HEAD, CONST_SLOT_AMMO do
		local slotItem = player:getSlotItem(slot)
		if slotItem then
			addItem(slotItem)
			if slotItem:isContainer() then
				for _, containerItem in ipairs(slotItem:getItems(true)) do
					addItem(containerItem)
				end
			end
		end
	end

	return matches
end

function MaterialRefining.getMaterialCount(player, materialKey, grade)
	local count = 0
	for _, item in ipairs(collectMatchingInventoryItems(player, materialKey, grade)) do
		count = count + item:getCount()
	end
	return count
end

function MaterialRefining.removeMaterial(player, materialKey, grade, amount)
	local remaining = amount
	for _, item in ipairs(collectMatchingInventoryItems(player, materialKey, grade)) do
		if remaining <= 0 then
			break
		end

		local removeCount = math.min(remaining, item:getCount())
		if not item:remove(removeCount) then
			return false
		end
		remaining = remaining - removeCount
	end

	return remaining == 0
end

local function buildSelectionData(player, materialKey, grade)
	local materialData = getMaterialData(materialKey)
	if not materialData then
		return nil, "Material invalido."
	end

	local availableCount = MaterialRefining.getMaterialCount(player, materialKey, grade)
	if availableCount <= 0 then
		return nil, "Voce nao possui mais esse material para refinar."
	end

	local refinable = grade >= 1 and grade <= 4
	local nextGrade = refinable and (grade + 1) or grade
	local statusText
	local message
	local statusType

	if refinable then
		statusText = "Refinavel"
		statusType = "success"
		message = string.format("%s esta pronto para refinamento.", getMaterialName(materialKey, grade))
	else
		statusText = "Grau maximo"
		statusType = "warning"
		message = string.format("%s ja esta no grau maximo e nao pode ser refinado.", getMaterialName(materialKey, grade))
	end

	return {
		materialKey = materialKey,
		name = getMaterialName(materialKey, grade),
		grade = grade,
		gradeLabel = string.format("Grau %d", grade),
		clientId = getMaterialClientId(materialKey),
		rarityId = GRADE_RARITY[grade] or 0,
		availableCount = availableCount,
		nextGrade = nextGrade,
		nextName = refinable and getMaterialName(materialKey, nextGrade) or nil,
		nextRarityId = refinable and (GRADE_RARITY[nextGrade] or 0) or (GRADE_RARITY[grade] or 0),
		refinable = refinable,
		status = statusText,
		statusType = statusType,
		message = message,
		bases = serializeBaseOptions(availableCount, refinable),
	}
end

local function sendSelection(player, materialKey, grade)
	local selection, err = buildSelectionData(player, materialKey, grade)
	if not selection then
		sendClientAction(player, "clearSelection")
		return false, err
	end

	sendClientAction(player, "selection", selection)
	return true
end

local function resolveDraggedItem(player, data)
	if type(data) ~= "table" or type(data.position) ~= "table" then
		return nil, "Dados do item invalidos."
	end

	local position = data.position
	local x = tonumber(position.x)
	local y = tonumber(position.y)
	local z = tonumber(position.z)
	if x ~= 0xFFFF or not y or not z then
		return nil, "Arraste um material da backpack, de um container ou do equipamento para o slot."
	end

	local item
	if y >= 0x40 then
		local containerId = y % 0x40
		local container = player:getContainerById(containerId)
		if not container then
			return nil, "Abra o container do material antes de arrasta-lo para o slot."
		end

		item = container:getItem(z)
	else
		item = player:getSlotItem(y)
	end

	if not item or not item:isItem() then
		return nil, "Nao foi possivel localizar o item arrastado."
	end

	local clientId = tonumber(data.clientId)
	if clientId and clientId > 0 and item:getType():getClientId() ~= clientId then
		return nil, "O item selecionado mudou. Arraste novamente."
	end

	return item
end

function MaterialRefining.inspectDraggedItem(player, data)
	local item, err = resolveDraggedItem(player, data)
	if not item then
		return nil, err
	end

	if tonumber(item:getCustomAttribute("material_refining")) ~= 1 then
		return nil, "Este item nao pode ser refinado."
	end

	local materialKey = item:getCustomAttribute("material_type")
	local grade = tonumber(item:getCustomAttribute("material_grade"))
	if not materialKey or not grade then
		return nil, "Este item nao pode ser refinado."
	end

	return buildSelectionData(player, materialKey, grade)
end

local function buildRefineResultMessage(materialKey, grade, baseValue, attempts, successCount, failCount)
	local resultName = getMaterialName(materialKey, grade + 1)
	local sourceName = getMaterialName(materialKey, grade)
	local message = string.format(
		"Refino concluido: %s x%d usando Base %d. Sucessos: %d. Falhas: %d.",
		sourceName,
		attempts,
		baseValue,
		successCount,
		failCount
	)

	if successCount > 0 then
		message = string.format("%s Recebido: %dx %s.", message, successCount, resultName)
	end

	return message
end

local function sendRefineResult(player, materialKey, grade, baseValue, attempts, successCount, failCount)
	player:sendTextMessage(
		MESSAGE_EVENT_ADVANCE,
		buildRefineResultMessage(materialKey, grade, baseValue, attempts, successCount, failCount)
	)
end

function MaterialRefining.refine(player, materialKey, grade, baseValue, attempts)
	local materialData = getMaterialData(materialKey)
	if not materialData then
		return false, "Material invalido."
	end

	if grade < 1 or grade > 4 then
		return false, "Apenas materiais entre Grau 1 e Grau 4 podem ser refinados."
	end

	local baseOption = getBaseOption(baseValue)
	if not baseOption then
		return false, "Base invalida. Use um valor entre 2 e 5."
	end

	local availableCount = MaterialRefining.getMaterialCount(player, materialKey, grade)
	local maxAttempts = math.floor(availableCount / baseOption.base)
	if maxAttempts < 1 then
		return false, string.format(
			"Voce precisa de pelo menos %d unidade(s) de %s para usar Base %d.",
			baseOption.base,
			getMaterialName(materialKey, grade),
			baseOption.base
		)
	end

	if attempts < 1 then
		return false, "Quantidade de tentativas invalida."
	end

	if attempts > maxAttempts then
		return false, string.format("Tentativas invalidas. Maximo disponivel no momento: %d.", maxAttempts)
	end

	local consumed = attempts * baseOption.base
	if not MaterialRefining.removeMaterial(player, materialKey, grade, consumed) then
		return false, "Nao foi possivel consumir os materiais selecionados."
	end

	local successCount = 0
	for _ = 1, attempts do
		if math.random(100) <= baseOption.chance then
			successCount = successCount + 1
		end
	end

	if successCount > 0 then
		local ok, err = MaterialRefining.giveMaterial(player, materialKey, grade + 1, successCount)
		if not ok then
			return false, err or "Os materiais foram consumidos, mas houve falha ao entregar o resultado do refino."
		end
	end

	player:getPosition():sendMagicEffect(176)
	player:getPosition():sendMagicEffect(179)
	sendRefineResult(player, materialKey, grade, baseValue, attempts, successCount, attempts - successCount)

	return true, {
		successCount = successCount,
		failCount = attempts - successCount,
		consumed = consumed,
	}
end

function MaterialRefining.showWindow(player)
	sendClientAction(player, "show", {bases = serializeBaseOptions(0, false)})
	sendClientAction(player, "clearSelection")
end

local function refreshClientSelection(player, materialKey, grade, reportMissingAsError)
	local ok, err = sendSelection(player, materialKey, grade)
	if not ok and err and reportMissingAsError then
		sendClientAction(player, "error", {message = err})
	end
end

local function handleClientInspect(player, data)
	local selection, err = MaterialRefining.inspectDraggedItem(player, data)
	if not selection then
		sendClientAction(player, "error", {message = err or "Nao foi possivel analisar esse item."})
		return
	end

	sendClientAction(player, "selection", selection)
end

local function handleClientRefine(player, data)
	if type(data) ~= "table" then
		sendClientAction(player, "error", {message = "Dados de refinamento invalidos."})
		return
	end

	local materialKey = resolveMaterialKey(data.materialKey or data.material)
	local grade = tonumber(data.grade)
	local baseValue = tonumber(data.base)
	local attempts = tonumber(data.attempts)
	if not materialKey or not grade or not baseValue or not attempts then
		sendClientAction(player, "error", {message = "Dados de refinamento invalidos."})
		return
	end

	local ok, result = MaterialRefining.refine(player, materialKey, grade, baseValue, attempts)
	if not ok then
		sendClientAction(player, "error", {message = result})
		refreshClientSelection(player, materialKey, grade, true)
		return
	end

	refreshClientSelection(player, materialKey, grade, false)
end

local openBaseModal

local function openAttemptModal(player, materialKey, grade, baseValue, maxAttempts)
	local choices = {}
	local seen = {}

	local function addOption(value)
		if value >= 1 and value <= maxAttempts and not seen[value] then
			seen[value] = true
			choices[#choices + 1] = value
		end
	end

	addOption(1)
	addOption(5)
	addOption(10)
	addOption(25)
	addOption(50)
	addOption(maxAttempts)
	table.sort(choices)

	local sourceName = getMaterialName(materialKey, grade)

	local function buttonCallback(button, choice)
		if button.text == "    Voltar    " then
			openBaseModal(player, materialKey, grade)
			return
		end

		if button.text ~= "   Refinar   " or not choice then
			return
		end

		local attempts = choices[choice.id]
		local ok, err = MaterialRefining.refine(player, materialKey, grade, baseValue, attempts)
		if not ok then
			player:sendCancelMessage(err)
		end
	end

	local window = ModalWindow {
		title = "Refino de Materiais",
		message = string.format(
			"Escolha quantas tentativas deseja executar para %s.\n\nBase %d consome %d material(is) por tentativa.\nTentativas maximas disponiveis: %d.\n",
			sourceName,
			baseValue,
			baseValue,
			maxAttempts
		),
	}

	window:addButton("    Voltar    ", buttonCallback)
	window:addButton("    Fechar    ")
	window:addButton("   Refinar   ", buttonCallback)
	window:setDefaultEnterButton("   Refinar   ")
	window:setDefaultEscapeButton("    Fechar    ")

	for _, attemptsValue in ipairs(choices) do
		window:addChoice(string.format("%d tentativa(s)", attemptsValue))
	end

	window:sendToPlayer(player)
end

openBaseModal = function(player, materialKey, grade)
	local availableCount = MaterialRefining.getMaterialCount(player, materialKey, grade)
	if availableCount <= 0 then
		player:sendCancelMessage("Voce nao possui mais esse material para refinar.")
		return
	end

	local availableBases = {}
	for _, option in ipairs(BASE_OPTIONS) do
		if availableCount >= option.base then
			availableBases[#availableBases + 1] = option
		end
	end

	if #availableBases == 0 then
		player:sendCancelMessage("Quantidade insuficiente para qualquer base de refinamento.")
		return
	end

	local sourceName = getMaterialName(materialKey, grade)

	local function buttonCallback(button, choice)
		if button.text == "    Voltar    " then
			MaterialRefining.openRefineModal(player)
			return
		end

		if button.text ~= " Selecionar " or not choice then
			return
		end

		local baseOption = availableBases[choice.id]
		local maxAttempts = math.floor(availableCount / baseOption.base)
		openAttemptModal(player, materialKey, grade, baseOption.base, maxAttempts)
	end

	local window = ModalWindow {
		title = "Refino de Materiais",
		message = string.format(
			"Material selecionado: %s\nQuantidade atual: %d\n\nEscolha a base do refino.\n",
			sourceName,
			availableCount
		),
	}

	window:addButton("    Voltar    ", buttonCallback)
	window:addButton("    Fechar    ")
	window:addButton(" Selecionar ", buttonCallback)
	window:setDefaultEnterButton(" Selecionar ")
	window:setDefaultEscapeButton("    Fechar    ")

	for _, option in ipairs(availableBases) do
		window:addChoice(string.format("Base %d - %d%% de chance - consome %d", option.base, option.chance, option.base))
	end

	window:sendToPlayer(player)
end

function MaterialRefining.openRefineModal(player)
	local choices = {}
	for _, materialKey in ipairs(MATERIAL_ORDER) do
		for grade = 1, 4 do
			local amount = MaterialRefining.getMaterialCount(player, materialKey, grade)
			if amount > 0 then
				choices[#choices + 1] = {
					key = materialKey,
					grade = grade,
					amount = amount,
				}
			end
		end
	end

	if #choices == 0 then
		player:sendCancelMessage("Voce precisa de um material entre Grau 1 e Grau 4 para iniciar o refinamento.")
		return
	end

	local function buttonCallback(button, choice)
		if button.text ~= " Selecionar " or not choice then
			return
		end

		local selected = choices[choice.id]
		openBaseModal(player, selected.key, selected.grade)
	end

	local window = ModalWindow {
		title = "Refino de Materiais",
		message = "Escolha qual material deseja refinar.\n",
	}

	window:addButton("    Fechar    ")
	window:addButton(" Selecionar ", buttonCallback)
	window:setDefaultEnterButton(" Selecionar ")
	window:setDefaultEscapeButton("    Fechar    ")

	for _, choice in ipairs(choices) do
		window:addChoice(string.format("%s (x%d)", getMaterialName(choice.key, choice.grade), choice.amount))
	end

	window:sendToPlayer(player)
end

local LoginEvent = CreatureEvent("MaterialRefiningLogin")

function LoginEvent.onLogin(player)
	player:registerEvent("MaterialRefiningExtended")
	return true
end

LoginEvent:type("login")
LoginEvent:register()

local ExtendedEvent = CreatureEvent("MaterialRefiningExtended")

function ExtendedEvent.onExtendedOpcode(player, opcode, buffer)
	if opcode ~= CODE_MATERIAL_REFINING then
		return true
	end

	local status, jsonData = pcall(function()
		return json.decode(buffer)
	end)

	if not status or type(jsonData) ~= "table" then
		return false
	end

	local action = jsonData.action
	local data = jsonData.data

	if action == "open" then
		MaterialRefining.showWindow(player)
	elseif action == "inspect" then
		handleClientInspect(player, data)
	elseif action == "refine" then
		handleClientRefine(player, data)
	end

	return true
end

ExtendedEvent:type("extendedopcode")
ExtendedEvent:register()

local function parseGiveMaterialParam(param)
	local words = splitWords(param)
	if #words < 3 then
		return nil, nil, nil
	end

	local grade = tonumber(words[#words - 1])
	local count = tonumber(words[#words])
	local materialName = table.concat(words, " ", 1, #words - 2)
	return getMaterialKey(materialName), grade, count
end

local function parseDirectRefineParam(param)
	local words = splitWords(param)
	if #words < 4 then
		return nil, nil, nil, nil
	end

	local grade = tonumber(words[#words - 2])
	local baseValue = tonumber(words[#words - 1])
	local attemptsToken = words[#words]
	local materialName = table.concat(words, " ", 1, #words - 3)
	return getMaterialKey(materialName), grade, baseValue, attemptsToken
end

local giveMaterialTalk = TalkAction("/givemat")

function giveMaterialTalk.onSay(player, words, param)
	if not player:getGroup():getAccess() then
		player:sendCancelMessage("Apenas administradores podem usar este comando.")
		return false
	end

	local materialKey, grade, count = parseGiveMaterialParam(param)
	if not materialKey or not grade or not count then
		player:sendCancelMessage("Uso: /givemat <material> <grau 1-5> <quantidade>")
		return false
	end

	local ok, err = MaterialRefining.giveMaterial(player, materialKey, grade, count)
	if not ok then
		player:sendCancelMessage(err)
		return false
	end

	local itemName = getMaterialName(materialKey, grade)
	player:sendTextMessage(MESSAGE_EVENT_ADVANCE, string.format("Voce recebeu %dx %s.", count, itemName))
	print(string.format("[MaterialRefining] %s usou /givemat %s %d %d", player:getName(), materialKey, grade, count))
	return false
end

giveMaterialTalk:separator(" ")
giveMaterialTalk:register()

local refineTalk = TalkAction("!refine", "/refine")

function refineTalk.onSay(player, words, param)
	local cleanedParam = trimString(param)
	if cleanedParam == "" then
		MaterialRefining.showWindow(player)
		return false
	end

	local normalizedParam = cleanedParam:lower()
	if normalizedParam == "modal" or normalizedParam == "legacy" then
		MaterialRefining.openRefineModal(player)
		return false
	end

	local materialKey, grade, baseValue, attemptsToken = parseDirectRefineParam(cleanedParam)
	if not materialKey or not grade or not baseValue or not attemptsToken then
		player:sendCancelMessage("Uso direto: !refine <material> <grau 1-4> <base 2-5> <tentativas|max>")
		return false
	end

	local attempts
	if attemptsToken:lower() == "all" or attemptsToken:lower() == "max" then
		local baseOption = getBaseOption(baseValue)
		if not baseOption then
			player:sendCancelMessage("Base invalida. Use um valor entre 2 e 5.")
			return false
		end

		local availableCount = MaterialRefining.getMaterialCount(player, materialKey, grade)
		attempts = math.floor(availableCount / baseOption.base)
	else
		attempts = tonumber(attemptsToken)
	end

	if not attempts then
		player:sendCancelMessage("Tentativas invalidas. Use um numero inteiro ou 'max'.")
		return false
	end

	local ok, err = MaterialRefining.refine(player, materialKey, grade, baseValue, attempts)
	if not ok then
		player:sendCancelMessage(err)
	end
	return false
end

refineTalk:separator(" ")
refineTalk:register()
