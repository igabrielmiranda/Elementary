local OPCODE = 94
local DEFAULT_MESSAGE = ""

local window = nil
local materialDropArea = nil
local materialPreview = nil
local resultPreview = nil
local emptyHint = nil
local resultHint = nil
local feedbackLabel = nil
local refineButton = nil
local minusButton = nil
local plusButton = nil

local previewCurrent = nil
local previewResult = nil
local materialNameValue = nil
local gradeValue = nil
local availableValue = nil
local nextGradeValue = nil
local statusValue = nil
local attemptsValue = nil
local selectedBaseValue = nil
local chanceValue = nil
local consumeValue = nil
local maxAttemptsValue = nil
local totalConsumeValue = nil

local baseButtons = {}
local state = {
	baseTemplate = {},
	selection = nil,
	selectedBase = nil,
	attempts = 0,
}

local function buildBaseTemplate()
	local bases = {}
	for i = 2, 5 do
		bases[#bases + 1] = {
			id = i,
			base = i,
			chance = i * 20,
			consume = i,
			maxAttempts = 0,
			enabled = false,
		}
	end
	return bases
end

local function normalizeBase(base)
	local baseValue = tonumber(base.base or base.id) or 0
	local maxAttempts = tonumber(base.maxAttempts) or 0
	return {
		id = tonumber(base.id or base.base) or baseValue,
		base = baseValue,
		chance = tonumber(base.chance) or 0,
		consume = tonumber(base.consume or base.base or base.id) or baseValue,
		maxAttempts = maxAttempts,
		enabled = base.enabled == true or maxAttempts > 0,
	}
end

local function normalizeBases(rawBases)
	local bases = {}
	for _, base in ipairs(rawBases or {}) do
		bases[#bases + 1] = normalizeBase(base)
	end

	if #bases == 0 then
		return buildBaseTemplate()
	end
	return bases
end

local function getDisplayedBases()
	if state.selection and state.selection.bases then
		return state.selection.bases
	end
	return state.baseTemplate
end

local function findBase(baseValue)
	for _, base in ipairs(getDisplayedBases()) do
		if base.base == baseValue then
			return base
		end
	end
	return nil
end

local function getSelectedBase()
	if not state.selectedBase then
		return nil
	end
	return findBase(state.selectedBase)
end

local function setFeedback(message, tone)
	if not feedbackLabel then
		return
	end

	local text = message or ""
	feedbackLabel:setText(text)
	if text == "" then
		feedbackLabel:hide()
	else
		feedbackLabel:show()
	end

	if tone == "error" then
		feedbackLabel:setColor("#ff6b6b")
	elseif tone == "warning" then
		feedbackLabel:setColor("#f0c674")
	elseif tone == "success" then
		feedbackLabel:setColor("#92d36e")
	else
		feedbackLabel:setColor("#d8d8d8")
	end
end

local function setStatusColor(tone)
	if not statusValue then
		return
	end

	if tone == "error" then
		statusValue:setColor("#ff6b6b")
	elseif tone == "warning" then
		statusValue:setColor("#f0c674")
	elseif tone == "success" then
		statusValue:setColor("#92d36e")
	else
		statusValue:setColor("#ffffff")
	end
end

local function setPreviewItem(widget, clientId, rarityId)
	if clientId and clientId > 0 then
		widget:setItem(Item.create(clientId, 1))
	else
		widget:setItem(nil)
	end
	g_game.updateRarityFrames(widget, rarityId or 0)
end

local function chooseBase(preferredBase)
	local displayedBases = getDisplayedBases()
	for _, base in ipairs(displayedBases) do
		if base.base == preferredBase and base.enabled then
			return base.base
		end
	end

	for _, base in ipairs(displayedBases) do
		if base.enabled then
			return base.base
		end
	end

	return nil
end

local function clampAttempts()
	local base = getSelectedBase()
	if not state.selection or not state.selection.refinable or not base or not base.enabled then
		state.attempts = 0
		return
	end

	local maxAttempts = base.maxAttempts or 0
	if maxAttempts < 1 then
		state.attempts = 0
		return
	end

	if state.attempts < 1 then
		state.attempts = 1
	end

	if state.attempts > maxAttempts then
		state.attempts = maxAttempts
	end
end

local function updateBaseButtons()
	for i = 1, #baseButtons do
		local widget = baseButtons[i]
		local base = getDisplayedBases()[i]
		if widget and base then
			widget:setEnabled(base.enabled)
			widget:setOn(base.enabled and state.selectedBase == base.base)

			widget:getChildById("title"):setText(string.format("Base %d", base.base))
			widget:getChildById("details"):setText(string.format("%d%% de chance - consome %d", base.chance, base.consume))
			if base.enabled then
				widget:getChildById("max"):setText(string.format("Max: %d", base.maxAttempts))
			else
				widget:getChildById("max"):setText("Indisponivel")
			end

			local indicator = widget:getChildById("indicator")
			if base.enabled and state.selectedBase == base.base then
				indicator:setText("*")
				indicator:setColor("#f0c674")
			elseif base.enabled then
				indicator:setText("o")
				indicator:setColor("#d8d8d8")
			else
				indicator:setText("x")
				indicator:setColor("#8a8a8a")
			end
		end
	end
end

local function updateAttemptsPanel()
	local base = getSelectedBase()
	local attempts = state.attempts or 0

	attemptsValue:setText(attempts > 0 and string.format("%d tentativa(s)", attempts) or "-")
	selectedBaseValue:setText(base and string.format("Base %d", base.base) or "-")
	chanceValue:setText(base and string.format("%d%%", base.chance) or "-")
	consumeValue:setText(base and tostring(base.consume) or "-")
	if maxAttemptsValue then
		maxAttemptsValue:setText(base and tostring(base.maxAttempts or 0) or "-")
	end

	if totalConsumeValue then
		if base and attempts > 0 then
			totalConsumeValue:setText(tostring(base.consume * attempts))
		else
			totalConsumeValue:setText("-")
		end
	end

	local canDecrease = attempts > 1
	local canIncrease = base and base.enabled and attempts > 0 and attempts < (base.maxAttempts or 0)
	minusButton:setEnabled(canDecrease)
	plusButton:setEnabled(canIncrease)

	local canRefine = state.selection and state.selection.refinable and base and base.enabled and attempts > 0
	refineButton:setEnabled(canRefine)
end

local function updateSelectionInfo()
	if not state.selection then
		setPreviewItem(materialPreview, 0, 0)
		setPreviewItem(resultPreview, 0, 0)
		if emptyHint then
			emptyHint:show()
		end
		if resultHint then
			resultHint:setText("")
			resultHint:hide()
		end

		previewCurrent:setText("Atual: -")
		previewResult:setText("Resultado: -")
		materialNameValue:setText("-")
		gradeValue:setText("-")
		availableValue:setText("-")
		nextGradeValue:setText("-")
		statusValue:setText("-")
		setStatusColor(nil)
		return
	end

	if emptyHint then
		emptyHint:hide()
	end
	setPreviewItem(materialPreview, state.selection.clientId, state.selection.rarityId)
	previewCurrent:setText("Atual: " .. (state.selection.name or "-"))

	if state.selection.refinable then
		setPreviewItem(resultPreview, state.selection.clientId, state.selection.nextRarityId)
		if resultHint then
			resultHint:setText("")
			resultHint:hide()
		end
		previewResult:setText("Resultado: " .. (state.selection.nextName or "-"))
	else
		setPreviewItem(resultPreview, 0, 0)
		if resultHint then
			resultHint:setText("")
			resultHint:hide()
		end
		previewResult:setText("Resultado: sem upgrade")
	end

	materialNameValue:setText(state.selection.name or "-")
	gradeValue:setText(state.selection.gradeLabel or "-")
	availableValue:setText(tostring(state.selection.availableCount or 0))
	nextGradeValue:setText(state.selection.nextName or "Grau maximo")
	statusValue:setText(state.selection.status or "-")
	setStatusColor(state.selection.statusType)
end

local function refreshUI()
	updateSelectionInfo()
	updateBaseButtons()
	updateAttemptsPanel()
end

local function clearSelection(message, tone)
	state.selection = nil
	state.selectedBase = chooseBase(nil)
	state.attempts = 0
	materialDropArea:setBorderWidth(0)
	refreshUI()
	setFeedback(message or DEFAULT_MESSAGE, tone)
end

local function applySelection(selection)
	selection.bases = normalizeBases(selection.bases)
	selection.clientId = tonumber(selection.clientId) or 0
	selection.rarityId = tonumber(selection.rarityId) or 0
	selection.nextRarityId = tonumber(selection.nextRarityId) or 0
	selection.availableCount = tonumber(selection.availableCount) or 0

	state.selection = selection
	state.selectedBase = chooseBase(state.selectedBase)
	clampAttempts()
	refreshUI()
	setFeedback(selection.message or DEFAULT_MESSAGE, selection.statusType)
end

local function sendToServer(payload)
	local protocol = g_game.getProtocolGame()
	if not protocol then
		return
	end

	protocol:sendExtendedOpcode(OPCODE, json.encode(payload))
end

local function inspectDraggedItem(item)
	if not item then
		return
	end

	local position = item:getPosition()
	sendToServer(
		{
			action = "inspect",
			data = {
				clientId = item:getId(),
				position = {x = position.x, y = position.y, z = position.z},
			},
		}
	)
	setFeedback("Validando material selecionado...", "info")
end

local function isDragItemValid()
	local draggingWidget = g_ui.getDraggingWidget()
	if not draggingWidget then
		return nil
	end

	local item = draggingWidget.currentDragThing
	if not item or not item:isItem() then
		return nil
	end

	return item
end

local function onMaterialDragEnter(widget, mousePos)
	local item = isDragItemValid()
	if not item then
		return false
	end

	widget:setBorderWidth(1)
	widget:setBorderColor("#c2953e")
	return true
end

local function onMaterialDragLeave(widget, droppedWidget, mousePos)
	widget:setBorderWidth(0)
	return true
end

local function onMaterialDrop(widget, draggedWidget, mousePos)
	local item = draggedWidget and draggedWidget.currentDragThing
	widget:setBorderWidth(0)

	if not item or not item:isItem() then
		return false
	end

	inspectDraggedItem(item)
	return true
end

function init()
	connect(
		g_game,
		{
			onGameStart = create,
			onGameEnd = destroy,
		}
	)

	ProtocolGame.registerExtendedOpcode(OPCODE, onExtendedOpcode)

	if g_game.isOnline() then
		create()
	end
end

function terminate()
	disconnect(
		g_game,
		{
			onGameStart = create,
			onGameEnd = destroy,
		}
	)

	ProtocolGame.unregisterExtendedOpcode(OPCODE)
	destroy()
end

function create()
	if window then
		return
	end

	window = g_ui.displayUI("material_refining")
	window:hide()

	materialDropArea = window:recursiveGetChildById("materialDropArea")
	materialPreview = window:recursiveGetChildById("materialPreview")
	resultPreview = window:recursiveGetChildById("resultPreview")
	emptyHint = window:recursiveGetChildById("emptyHint")
	resultHint = window:recursiveGetChildById("resultHint")
	feedbackLabel = window:recursiveGetChildById("feedbackLabel")
	refineButton = window:recursiveGetChildById("refineButton")
	minusButton = window:recursiveGetChildById("minusButton")
	plusButton = window:recursiveGetChildById("plusButton")

	previewCurrent = window:recursiveGetChildById("previewCurrent")
	previewResult = window:recursiveGetChildById("previewResult")
	materialNameValue = window:recursiveGetChildById("materialNameValue")
	gradeValue = window:recursiveGetChildById("gradeValue")
	availableValue = window:recursiveGetChildById("availableValue")
	nextGradeValue = window:recursiveGetChildById("nextGradeValue")
	statusValue = window:recursiveGetChildById("statusValue")
	attemptsValue = window:recursiveGetChildById("attemptsValue")
	selectedBaseValue = window:recursiveGetChildById("selectedBaseValue")
	chanceValue = window:recursiveGetChildById("chanceValue")
	consumeValue = window:recursiveGetChildById("consumeValue")
	maxAttemptsValue = window:recursiveGetChildById("maxAttemptsValue")
	totalConsumeValue = window:recursiveGetChildById("totalConsumeValue")

	baseButtons = {}
	for _, baseValue in ipairs({2, 3, 4, 5}) do
		baseButtons[#baseButtons + 1] = window:recursiveGetChildById("base" .. baseValue)
	end

	materialDropArea.onDragEnter = onMaterialDragEnter
	materialDropArea.onDragLeave = onMaterialDragLeave
	materialDropArea.onDrop = onMaterialDrop
	materialDropArea:setBorderWidth(0)

	state.baseTemplate = buildBaseTemplate()
	clearSelection(DEFAULT_MESSAGE, "info")
end

function destroy()
	state.baseTemplate = buildBaseTemplate()
	state.selection = nil
	state.selectedBase = nil
	state.attempts = 0

	baseButtons = {}

	if window then
		window:destroy()
		window = nil
	end

	materialDropArea = nil
	materialPreview = nil
	resultPreview = nil
	emptyHint = nil
	resultHint = nil
	feedbackLabel = nil
	refineButton = nil
	minusButton = nil
	plusButton = nil
	previewCurrent = nil
	previewResult = nil
	materialNameValue = nil
	gradeValue = nil
	availableValue = nil
	nextGradeValue = nil
	statusValue = nil
	attemptsValue = nil
	selectedBaseValue = nil
	chanceValue = nil
	consumeValue = nil
	maxAttemptsValue = nil
	totalConsumeValue = nil
end

function show()
	if not window then
		return
	end

	window:show()
	window:raise()
	window:focus()
end

function hide()
	if not window then
		return
	end

	window:hide()
end

function clearSelectionByUser()
	clearSelection("Selecao removida. Arraste outro material refinavel.", "info")
end

function selectBase(baseValue)
	baseValue = tonumber(baseValue)
	local base = findBase(baseValue)
	if not base then
		return
	end

	if not base.enabled then
		setFeedback("Quantidade insuficiente para usar essa base com o material atual.", "warning")
		return
	end

	state.selectedBase = base.base
	if state.attempts < 1 then
		state.attempts = 1
	end
	clampAttempts()
	refreshUI()
end

function changeAttempts(delta)
	delta = tonumber(delta) or 0
	local base = getSelectedBase()
	if not base or not base.enabled or not state.selection or not state.selection.refinable then
		return
	end

	if state.attempts < 1 then
		state.attempts = 1
	end

	state.attempts = state.attempts + delta
	clampAttempts()
	refreshUI()
end

function refine()
	local selection = state.selection
	local base = getSelectedBase()

	if not selection then
		setFeedback("Arraste um material refinavel para o slot antes de refinar.", "warning")
		return
	end

	if not selection.refinable then
		setFeedback("Esse material ja atingiu o grau maximo.", "warning")
		return
	end

	if not base or not base.enabled then
		setFeedback("Escolha uma base valida para continuar.", "warning")
		return
	end

	if state.attempts < 1 then
		setFeedback("Defina pelo menos uma tentativa de refinamento.", "warning")
		return
	end

	sendToServer(
		{
			action = "refine",
			data = {
				materialKey = selection.materialKey,
				grade = selection.grade,
				base = base.base,
				attempts = state.attempts,
			},
		}
	)

	setFeedback("Executando refinamento...", "info")
end

function onExtendedOpcode(protocol, opcode, buffer)
	local status, payload = pcall(function()
		return json.decode(buffer)
	end)

	if not status or type(payload) ~= "table" then
		g_logger.error("[MaterialRefining] JSON invalido recebido do servidor.")
		return
	end

	local action = payload.action
	local data = payload.data

	if action == "show" then
		state.baseTemplate = normalizeBases(data and data.bases or nil)
		show()
	elseif action == "selection" then
		applySelection(data or {})
		show()
	elseif action == "clearSelection" then
		clearSelection(DEFAULT_MESSAGE, "info")
	elseif action == "error" then
		setFeedback(data and data.message or "Nao foi possivel concluir a acao.", "error")
	elseif action == "feedback" then
		setFeedback(data and data.message or "", data and data.type or "info")
	end
end
