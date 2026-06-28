local MaterialGathering = rawget(_G, "MaterialGathering") or {}
_G.MaterialGathering = MaterialGathering

local CODE_MATERIAL_GATHERING = 95
local PERSISTENCE_FILE = "data/material_gathering_nodes.json"
local COLLECTION_INTERVAL_MS = 10000
local GLOVE_BASE_ITEM_ID = 5875
local GLOVE_NAME = "Luva de Coleta"
local GLOVE_DESCRIPTION = "Permite coletar materiais das fontes do sistema de refinamento."
local CLIENT_CANCEL_REASONS = {
	click = "Coleta interrompida.",
	move = "Coleta interrompida porque voce se moveu.",
	damage = "Coleta interrompida porque voce foi atingido.",
}

local NODE_TYPES = {
	metal = {
		label = "Mina de Metal",
		materialLabel = "Metal",
		materialKey = "metal",
		defaultStacks = 800,
		maxStacks = 800,
		visualItemId = 26405,
		actionId = 61001,
	},
	madeira = {
		label = "Fonte de Madeira",
		materialLabel = "Madeira",
		materialKey = "madeira",
		defaultStacks = 800,
		maxStacks = 800,
		visualItemId = 26634,
		actionId = 61002,
	},
	couro = {
		label = "Fonte de Couro",
		materialLabel = "Couro",
		materialKey = "couro",
		defaultStacks = 800,
		maxStacks = 800,
		visualItemId = 26721,
		actionId = 61003,
	},
	cristal = {
		label = "Mina de Cristal",
		materialLabel = "Cristal",
		materialKey = "cristal",
		defaultStacks = 800,
		maxStacks = 800,
		visualItemId = 26407,
		actionId = 61004,
	},
	algodao = {
		label = "Plantacao de Algodao",
		materialLabel = "Algodao",
		materialKey = "algodao",
		defaultStacks = 800,
		maxStacks = 800,
		visualItemId = 26717,
		actionId = 61005,
	},
	metal_raro = {
		label = "Mina de Metal Raro",
		materialLabel = "Metal Raro",
		materialKey = "metal_raro",
		defaultStacks = 400,
		maxStacks = 400,
		visualItemId = 26411,
		actionId = 61006,
	},
	madeira_rara = {
		label = "Arvore de Madeira Rara",
		materialLabel = "Madeira Rara",
		materialKey = "madeira_rara",
		defaultStacks = 400,
		maxStacks = 400,
		visualItemId = 26613,
		actionId = 61007,
	},
}

local ACTION_IDS = {}
local ACTION_ID_TO_NODE_KEY = {}
for nodeKey, nodeType in pairs(NODE_TYPES) do
	nodeType.nodeKey = nodeKey
	ACTION_IDS[#ACTION_IDS + 1] = nodeType.actionId
	ACTION_ID_TO_NODE_KEY[nodeType.actionId] = nodeKey
end

local DIRECTION_OFFSETS = {
	[DIRECTION_NORTH] = {x = 0, y = -1, z = 0},
	[DIRECTION_EAST] = {x = 1, y = 0, z = 0},
	[DIRECTION_SOUTH] = {x = 0, y = 1, z = 0},
	[DIRECTION_WEST] = {x = -1, y = 0, z = 0},
	[DIRECTION_SOUTHWEST] = {x = -1, y = 1, z = 0},
	[DIRECTION_SOUTHEAST] = {x = 1, y = 1, z = 0},
	[DIRECTION_NORTHWEST] = {x = -1, y = -1, z = 0},
	[DIRECTION_NORTHEAST] = {x = 1, y = -1, z = 0},
}

local activeSessions = {}
local persistedNodes = {}
local nextSessionId = 0

MaterialGathering.nodeTypes = NODE_TYPES
MaterialGathering.actionIds = ACTION_ID_TO_NODE_KEY
MaterialGathering.gloveBaseItemId = GLOVE_BASE_ITEM_ID
MaterialGathering.opcode = CODE_MATERIAL_GATHERING

local function logInfo(message)
	print(string.format("[MaterialGathering] %s", message))
end

local function copyPosition(position)
	return {x = position.x, y = position.y, z = position.z}
end

local function createPosition(position)
	return Position(position.x, position.y, position.z)
end

local function samePosition(a, b)
	return a and b and a.x == b.x and a.y == b.y and a.z == b.z
end

local function getPositionKey(position)
	return string.format("%d:%d:%d", position.x, position.y, position.z)
end

local function clamp(value, minimum, maximum)
	if value < minimum then
		return minimum
	end
	if value > maximum then
		return maximum
	end
	return value
end

local function countEntries(values)
	local count = 0
	for _ in pairs(values) do
		count = count + 1
	end
	return count
end

local function trimString(value)
	return (value or ""):gsub("^%s+", ""):gsub("%s+$", "")
end

local function normalizeNodeType(rawType)
	return trimString(rawType):lower():gsub("[%s%-]+", "_")
end

local function resolveNodeType(rawType)
	local normalized = normalizeNodeType(rawType)
	return NODE_TYPES[normalized] and normalized or nil
end

local function getNodeType(nodeKey)
	return NODE_TYPES[nodeKey]
end

local function getNodeKeyFromActionId(actionId)
	if not actionId or actionId == 0 then
		return nil
	end
	return ACTION_ID_TO_NODE_KEY[actionId]
end

local function getMaterialRefining()
	local module = rawget(_G, "MaterialRefining")
	if module and type(module.giveMaterial) == "function" then
		return module
	end
	return nil
end

local function isCollectionGlove(item)
	return item and tonumber(item:getCustomAttribute("material_gathering_glove")) == 1
end

local function getNodeKeyFromItem(item)
	if not item then
		return nil
	end

	if tonumber(item:getCustomAttribute("material_gathering_node")) == 1 then
		return item:getCustomAttribute("material_gathering_type")
	end

	return getNodeKeyFromActionId(item:getActionId())
end

local function getDistanceBetween(a, b)
	if not a or not b then
		return math.huge
	end

	if a.z ~= b.z then
		return math.huge
	end

	return math.max(math.abs(a.x - b.x), math.abs(a.y - b.y))
end

local function getNodeStackData(item, nodeKey)
	local nodeType = getNodeType(nodeKey)
	if not item or not nodeType then
		return 0, 0
	end

	local maxStacks = tonumber(item:getCustomAttribute("material_gathering_max_stacks")) or nodeType.maxStacks
	maxStacks = clamp(maxStacks, 1, nodeType.maxStacks)

	local currentStacks = tonumber(item:getCustomAttribute("material_gathering_stacks"))
	if currentStacks == nil then
		currentStacks = maxStacks
	end
	currentStacks = clamp(currentStacks, 0, maxStacks)

	return currentStacks, maxStacks
end

local function getNodeDisplayName(nodeType, currentStacks)
	if currentStacks <= 0 then
		return string.format("%s Esgotada", nodeType.label)
	end
	return nodeType.label
end

local function getNodeDescription(nodeType, currentStacks, maxStacks)
	local lines = {
		"Fonte de coleta do sistema de refinamento.",
		string.format("Material: %s [Grau 1]", nodeType.materialLabel),
		string.format("Stacks restantes: %d/%d", currentStacks, maxStacks),
	}

	if currentStacks <= 0 then
		lines[#lines + 1] = "Status: esgotada"
	else
		lines[#lines + 1] = "Use com uma Luva de Coleta para iniciar a coleta automatica."
	end

	return table.concat(lines, "\n")
end

local function savePersistedNodes()
	local serialized = {}
	for _, nodeData in pairs(persistedNodes) do
		serialized[#serialized + 1] = nodeData
	end

	table.sort(serialized, function(a, b)
		if a.position.z ~= b.position.z then
			return a.position.z < b.position.z
		end
		if a.position.y ~= b.position.y then
			return a.position.y < b.position.y
		end
		return a.position.x < b.position.x
	end)

	local handle = io.open(PERSISTENCE_FILE, "w")
	if not handle then
		logInfo("Nao foi possivel abrir o arquivo de persistencia para escrita.")
		return false
	end

	handle:write(json.encode(serialized))
	handle:close()
	return true
end

local function loadPersistedNodes()
	local handle = io.open(PERSISTENCE_FILE, "r")
	if not handle then
		return {}
	end

	local buffer = handle:read("*a")
	handle:close()
	if not buffer or buffer == "" then
		return {}
	end

	local ok, decoded = pcall(json.decode, buffer)
	if not ok or type(decoded) ~= "table" then
		logInfo("Arquivo de persistencia invalido, ignorando dados anteriores.")
		return {}
	end

	return decoded
end

local function updatePersistedNode(item, nodeKey, currentStacks, maxStacks)
	local position = item:getPosition()
	local positionKey = getPositionKey(position)

	persistedNodes[positionKey] = {
		type = nodeKey,
		position = copyPosition(position),
		stacks = currentStacks,
		maxStacks = maxStacks,
		visualItemId = item:getId(),
	}

	savePersistedNodes()
end

local function removePersistedNode(position)
	local positionKey = getPositionKey(position)
	if persistedNodes[positionKey] then
		persistedNodes[positionKey] = nil
		savePersistedNodes()
	end
end

local function buildClientNodeSnapshot()
	local snapshot = {}
	for _, nodeData in pairs(persistedNodes) do
		local nodeKey = resolveNodeType(nodeData.type)
		local nodeType = getNodeType(nodeKey)
		if nodeType and nodeData.position then
			snapshot[#snapshot + 1] = {
				position = copyPosition(nodeData.position),
				nodeKey = nodeKey,
				itemId = tonumber(nodeData.visualItemId) or nodeType.visualItemId,
				stacks = tonumber(nodeData.stacks) or nodeType.defaultStacks,
				maxStacks = tonumber(nodeData.maxStacks) or nodeType.maxStacks,
			}
		end
	end
	return snapshot
end

local function sendNodeSync(player)
	if not player or not player:isUsingOtClient() then
		return false
	end

	return player:sendExtendedOpcode(
		CODE_MATERIAL_GATHERING,
		json.encode({action = "sync", data = {nodes = buildClientNodeSnapshot()}})
	)
end

local function broadcastNodeSync()
	for _, onlinePlayer in ipairs(Game.getPlayers()) do
		sendNodeSync(onlinePlayer)
	end
end

local function sendCollectionState(player, active, nodeKey, nodePosition)
	if not player or not player:isUsingOtClient() then
		return false
	end

	local positionPayload = nil
	if nodePosition then
		positionPayload = {
			x = tonumber(nodePosition.x) or 0,
			y = tonumber(nodePosition.y) or 0,
			z = tonumber(nodePosition.z) or 0,
		}
	end

	return player:sendExtendedOpcode(
		CODE_MATERIAL_GATHERING,
		json.encode({
			action = "session",
			data = {
				active = active == true,
				duration = COLLECTION_INTERVAL_MS,
				nodeKey = nodeKey,
				position = positionPayload,
			},
		})
	)
end

local function applyNodeAttributes(item, nodeKey, currentStacks, maxStacks)
	local nodeType = getNodeType(nodeKey)
	if not item or not nodeType then
		return false
	end

	item:setAttribute(ITEM_ATTRIBUTE_NAME, getNodeDisplayName(nodeType, currentStacks))
	item:setAttribute(ITEM_ATTRIBUTE_DESCRIPTION, getNodeDescription(nodeType, currentStacks, maxStacks))
	item:setCustomAttribute("material_gathering_node", 1)
	item:setCustomAttribute("material_gathering_type", nodeKey)
	item:setCustomAttribute("material_gathering_stacks", currentStacks)
	item:setCustomAttribute("material_gathering_max_stacks", maxStacks)
	item:setActionId(nodeType.actionId)
	return true
end

local function createCollectionGloveItem()
	local glove = Game.createItem(GLOVE_BASE_ITEM_ID, 1)
	if not glove then
		return nil
	end

	glove:setAttribute(ITEM_ATTRIBUTE_NAME, GLOVE_NAME)
	glove:setAttribute(ITEM_ATTRIBUTE_DESCRIPTION, GLOVE_DESCRIPTION)
	glove:setCustomAttribute("material_gathering_glove", 1)
	return glove
end

local function findGatheringNodeOnTile(position, expectedNodeKey)
	local tile = Tile(position)
	if not tile then
		return nil
	end

	for _, tileItem in ipairs(tile:getItems() or {}) do
		local itemNodeKey = getNodeKeyFromItem(tileItem)
		if itemNodeKey and (not expectedNodeKey or itemNodeKey == expectedNodeKey) then
			return tileItem
		end
	end

	return nil
end

local function ensureNodeState(item)
	local nodeKey = getNodeKeyFromItem(item)
	local nodeType = getNodeType(nodeKey)
	if not item or not nodeType then
		return nil
	end

	local currentStacks, maxStacks = getNodeStackData(item, nodeKey)
	applyNodeAttributes(item, nodeKey, currentStacks, maxStacks)
	updatePersistedNode(item, nodeKey, currentStacks, maxStacks)
	return nodeKey, currentStacks, maxStacks
end

local function restoreOrCreateNode(nodeData)
	local nodeKey = resolveNodeType(nodeData.type)
	local nodeType = getNodeType(nodeKey)
	if not nodeType or type(nodeData.position) ~= "table" then
		return false
	end

	local position = createPosition(nodeData.position)
	if not Tile(position) then
		logInfo(string.format("Posicao invalida ignorada no restore: %s", getPositionKey(nodeData.position)))
		return false
	end

	local item = findGatheringNodeOnTile(position, nodeKey)
	if not item then
		item = Game.createItem(nodeData.visualItemId or nodeType.visualItemId, 1, position)
	end

	if not item then
		logInfo(string.format("Nao foi possivel restaurar node em %s", getPositionKey(nodeData.position)))
		return false
	end

	local maxStacks = tonumber(nodeData.maxStacks) or nodeType.maxStacks
	maxStacks = clamp(maxStacks, 1, nodeType.maxStacks)

	local currentStacks = tonumber(nodeData.stacks) or maxStacks
	currentStacks = clamp(currentStacks, 0, maxStacks)

	applyNodeAttributes(item, nodeKey, currentStacks, maxStacks)
	persistedNodes[getPositionKey(position)] = {
		type = nodeKey,
		position = copyPosition(position),
		stacks = currentStacks,
		maxStacks = maxStacks,
		visualItemId = item:getId(),
	}

	return true
end

local function setNodeStacks(item, nodeKey, currentStacks, maxStacks)
	local clampedCurrent = clamp(currentStacks, 0, maxStacks)
	applyNodeAttributes(item, nodeKey, clampedCurrent, maxStacks)
	updatePersistedNode(item, nodeKey, clampedCurrent, maxStacks)
end

local function removeGatheringNode(item)
	if not item then
		return false
	end

	local position = copyPosition(item:getPosition())
	removePersistedNode(position)
	item:remove()
	Position(position.x, position.y, position.z):sendMagicEffect(CONST_ME_POFF)
	broadcastNodeSync()
	return true
end

local function hasCollectionGlove(player)
	for slot = CONST_SLOT_HEAD, CONST_SLOT_AMMO do
		local slotItem = player:getSlotItem(slot)
		if slotItem then
			if isCollectionGlove(slotItem) then
				return true
			end

			if slotItem:isContainer() then
				for _, containerItem in ipairs(slotItem:getItems(true)) do
					if isCollectionGlove(containerItem) then
						return true
					end
				end
			end
		end
	end

	return false
end

local function getPreferredSpawnPosition(player)
	local playerPosition = player:getPosition()
	local offset = DIRECTION_OFFSETS[player:getDirection()]
	if offset then
		local frontPosition = Position(playerPosition.x + offset.x, playerPosition.y + offset.y, playerPosition.z + offset.z)
		if Tile(frontPosition) then
			return frontPosition
		end
	end

	if Tile(playerPosition) then
		return playerPosition
	end

	return nil
end

local function getNextSessionId()
	nextSessionId = nextSessionId + 1
	return nextSessionId
end

local function stopCollection(playerId, reason)
	local session = activeSessions[playerId]
	activeSessions[playerId] = nil
	local player = Player(playerId)
	if player and session then
		sendCollectionState(player, false, session.nodeKey, session.nodePosition)
	end

	if player and reason and reason ~= "" then
		player:sendTextMessage(MESSAGE_STATUS_SMALL, reason)
	end
end

local function validateCollectionSession(player, item, session)
	if not player then
		return false, "Coleta interrompida."
	end

	if not item then
		return false, "A fonte de coleta nao esta mais disponivel."
	end

	local playerPosition = player:getPosition()
	if not samePosition(playerPosition, session.startPosition) then
		return false, "Coleta interrompida porque voce se moveu."
	end

	if playerPosition:getDistance(item:getPosition()) > 1 then
		return false, "Coleta interrompida porque voce se afastou demais."
	end

	if player:getTarget() then
		return false, "Coleta interrompida porque voce entrou em combate."
	end

	if not hasCollectionGlove(player) then
		return false, "Coleta interrompida porque voce nao esta mais com a Luva de Coleta."
	end

	local nodeKey = getNodeKeyFromItem(item)
	if nodeKey ~= session.nodeKey then
		return false, "A fonte de coleta nao esta mais disponivel."
	end

	local currentStacks = tonumber(item:getCustomAttribute("material_gathering_stacks")) or 0
	if currentStacks <= 0 then
		return false, "A mina esta esgotada."
	end

	return true
end

local function showCollectionFeedback(player, nodePosition, remainingStacks, maxStacks)
	if not nodePosition then
		return
	end

	nodePosition:sendMagicEffect(CONST_ME_BLOCKHIT)
	nodePosition:sendAnimatedText(string.format("%d/%d", remainingStacks, maxStacks))

	if player then
		player:getPosition():sendMagicEffect(CONST_ME_MAGIC_GREEN)
	end
end

local function performCollectionTick(playerId, sessionId)
	local session = activeSessions[playerId]
	if not session or session.id ~= sessionId then
		return
	end

	local player = Player(playerId)
	local item = findGatheringNodeOnTile(createPosition(session.nodePosition), session.nodeKey)
	local canContinue, reason = validateCollectionSession(player, item, session)
	if not canContinue then
		stopCollection(playerId, reason)
		return
	end

	local nodeType = getNodeType(session.nodeKey)
	local materialRefining = getMaterialRefining()
	if not nodeType or not materialRefining then
		stopCollection(playerId, "Sistema de refino indisponivel no momento.")
		return
	end

	local success, err = materialRefining.giveMaterial(player, nodeType.materialKey, 1, 1)
	if not success then
		stopCollection(playerId, err or "Nao foi possivel adicionar o material ao inventario.")
		return
	end

	local currentStacks, maxStacks = getNodeStackData(item, session.nodeKey)
	local remainingStacks = clamp(currentStacks - 1, 0, maxStacks)
	local nodePosition = item:getPosition()

	showCollectionFeedback(player, nodePosition, remainingStacks, maxStacks)
	player:sendTextMessage(
		MESSAGE_STATUS_SMALL,
		string.format("Coletado 1x %s [Grau 1]. Restante: %d/%d.", nodeType.materialLabel, remainingStacks, maxStacks)
	)

	if remainingStacks <= 0 then
		removeGatheringNode(item)
		stopCollection(playerId, string.format("%s esgotada.", nodeType.label))
		return
	end

	setNodeStacks(item, session.nodeKey, remainingStacks, maxStacks)
	broadcastNodeSync()

	addEvent(performCollectionTick, COLLECTION_INTERVAL_MS, playerId, sessionId)
end

local function startCollection(player, item)
	local nodeKey, currentStacks, maxStacks = ensureNodeState(item)
	local nodeType = getNodeType(nodeKey)
	if not nodeType then
		return false, "Node invalido."
	end

	if getDistanceBetween(player:getPosition(), item:getPosition()) > 1 then
		return false, "Voce precisa estar ao lado da mina para iniciar a coleta."
	end

	if not hasCollectionGlove(player) then
		return false, "Voce precisa de uma Luva de Coleta para coletar este material."
	end

	if currentStacks <= 0 then
		return false, "A mina esta esgotada."
	end

	local playerId = player:getId()
	activeSessions[playerId] = {
		id = getNextSessionId(),
		nodeKey = nodeKey,
		nodePosition = copyPosition(item:getPosition()),
		startPosition = copyPosition(player:getPosition()),
		maxStacks = maxStacks,
	}

	item:getPosition():sendMagicEffect(CONST_ME_MAGIC_BLUE)
	player:getPosition():sendMagicEffect(CONST_ME_MAGIC_BLUE)
	item:getPosition():sendAnimatedText(string.format("%d/%d", currentStacks, maxStacks))
	player:sendTextMessage(MESSAGE_STATUS_SMALL, string.format("Coleta automatica iniciada em %s.", nodeType.label))
	sendCollectionState(player, true, nodeKey, item:getPosition())
	addEvent(performCollectionTick, COLLECTION_INTERVAL_MS, playerId, activeSessions[playerId].id)
	return true
end

local function resolveNodeFromClientData(data)
	if type(data) ~= "table" or type(data.position) ~= "table" then
		return nil
	end

	local x = tonumber(data.position.x)
	local y = tonumber(data.position.y)
	local z = tonumber(data.position.z)
	if not x or not y or not z then
		return nil
	end

	local expectedActionId = tonumber(data.actionId)
	local expectedServerId = tonumber(data.itemId)
	local tile = Tile(Position(x, y, z))
	if not tile then
		return nil
	end

	for _, tileItem in ipairs(tile:getItems() or {}) do
		local itemNodeKey = getNodeKeyFromItem(tileItem)
		if itemNodeKey then
			local matchesActionId = not expectedActionId or expectedActionId == 0 or tileItem:getActionId() == expectedActionId
			local matchesServerId = not expectedServerId or expectedServerId == 0 or tileItem:getId() == expectedServerId
			if matchesActionId and matchesServerId then
				return tileItem
			end
		end
	end

	return nil
end

local function handleClientStart(player, data)
	local item = resolveNodeFromClientData(data)
	if not item then
		player:sendTextMessage(MESSAGE_STATUS_SMALL, "A fonte de coleta selecionada nao e valida.")
		return
	end

	local ok, err = startCollection(player, item)
	if not ok and err then
		player:sendTextMessage(MESSAGE_STATUS_SMALL, err)
	end
end

local function handleClientCancel(player, data)
	local playerId = player and player:getId()
	if not playerId or not activeSessions[playerId] then
		return
	end

	local reasonKey = type(data) == "table" and data.reason or nil
	stopCollection(playerId, CLIENT_CANCEL_REASONS[reasonKey] or "Coleta interrompida.")
end

local function spawnNode(player, nodeKey, requestedStacks)
	local nodeType = getNodeType(nodeKey)
	if not nodeType then
		return false, "Tipo de mina invalido."
	end

	local spawnPosition = getPreferredSpawnPosition(player)
	if not spawnPosition then
		return false, "Nao foi possivel encontrar uma posicao valida para criar a mina."
	end

	local stacks = tonumber(requestedStacks) or nodeType.defaultStacks
	stacks = math.floor(stacks)
	stacks = clamp(stacks, 0, nodeType.maxStacks)

	local existingNode = findGatheringNodeOnTile(spawnPosition)
	if existingNode then
		local existingNodeKey = getNodeKeyFromItem(existingNode)
		if existingNodeKey ~= nodeKey then
			return false, "Ja existe outra fonte de coleta nesta posicao."
		end

		setNodeStacks(existingNode, nodeKey, stacks, nodeType.maxStacks)
		spawnPosition:sendMagicEffect(CONST_ME_TELEPORT)
		broadcastNodeSync()
		return true, string.format("%s atualizada para %d stacks.", nodeType.label, stacks)
	end

	local item = Game.createItem(nodeType.visualItemId, 1, spawnPosition)
	if not item then
		return false, "Nao foi possivel criar a mina."
	end

	setNodeStacks(item, nodeKey, stacks, nodeType.maxStacks)
	spawnPosition:sendMagicEffect(CONST_ME_TELEPORT)
	broadcastNodeSync()
	return true, string.format("%s criada com %d stacks.", nodeType.label, stacks)
end

MaterialGathering.stopCollection = stopCollection
MaterialGathering.hasCollectionGlove = hasCollectionGlove

local gatheringAction = Action()

function gatheringAction.onUse(player, item, fromPosition, target, toPosition, isHotkey)
	local ok, err = startCollection(player, item)
	if not ok and err then
		player:sendTextMessage(MESSAGE_STATUS_SMALL, err)
	end
	return true
end

gatheringAction:aid(unpack(ACTION_IDS))
gatheringAction:register()

local loginEvent = CreatureEvent("MaterialGatheringLogin")

function loginEvent.onLogin(player)
	player:registerEvent("MaterialGatheringExtended")
	player:registerEvent("MaterialGatheringHealth")
	sendNodeSync(player)
	return true
end

loginEvent:type("login")
loginEvent:register()

local extendedEvent = CreatureEvent("MaterialGatheringExtended")

function extendedEvent.onExtendedOpcode(player, opcode, buffer)
	if opcode ~= CODE_MATERIAL_GATHERING then
		return true
	end

	local status, payload = pcall(function()
		return json.decode(buffer)
	end)

	if not status or type(payload) ~= "table" then
		player:sendTextMessage(MESSAGE_STATUS_SMALL, "Nao foi possivel interpretar a solicitacao de coleta.")
		return false
	end

	if payload.action == "start" then
		handleClientStart(player, payload.data)
	elseif payload.action == "cancel" then
		handleClientCancel(player, payload.data)
	elseif payload.action == "requestSync" then
		sendNodeSync(player)
	end

	return true
end

extendedEvent:type("extendedopcode")
extendedEvent:register()

local healthEvent = CreatureEvent("MaterialGatheringHealth")

function healthEvent.onHealthChange(creature, attacker, primaryDamage, primaryType, secondaryDamage, secondaryType, origin)
	if creature and creature:isPlayer() then
		local playerId = creature:getId()
		if activeSessions[playerId] and ((tonumber(primaryDamage) or 0) > 0 or (tonumber(secondaryDamage) or 0) > 0) then
			stopCollection(playerId, CLIENT_CANCEL_REASONS.damage)
		end
	end

	return primaryDamage, primaryType, secondaryDamage, secondaryType
end

healthEvent:register()

local moveCreatureCallback = EventCallback

moveCreatureCallback.onMoveCreature = function(self, creature, fromPosition, toPosition)
	if not self or not creature or not creature:isPlayer() or self:getId() ~= creature:getId() then
		return true
	end

	local playerId = self:getId()
	if activeSessions[playerId] and not samePosition(fromPosition, toPosition) then
		stopCollection(playerId, CLIENT_CANCEL_REASONS.move)
	end

	return true
end

moveCreatureCallback:register()

local spawnMineTalk = TalkAction("/spawnmine")

function spawnMineTalk.onSay(player, words, param)
	if not player:getGroup():getAccess() then
		return true
	end

	local nodeTypeToken, stacksToken = param:match("^(%S+)%s*(%d*)$")
	local nodeKey = resolveNodeType(nodeTypeToken)
	if not nodeKey then
		player:sendTextMessage(
			MESSAGE_STATUS_SMALL,
			"Uso: /spawnmine metal|madeira|couro|cristal|algodao|metal_raro|madeira_rara [stacks]"
		)
		return false
	end

	local ok, message = spawnNode(player, nodeKey, stacksToken ~= "" and stacksToken or nil)
	player:sendTextMessage(MESSAGE_STATUS_SMALL, message)
	return ok
end

spawnMineTalk:separator(" ")
spawnMineTalk:register()

local giveGloveTalk = TalkAction("/giveglove")

function giveGloveTalk.onSay(player, words, param)
	if not player:getGroup():getAccess() then
		return true
	end

	local glove = createCollectionGloveItem()
	if not glove then
		player:sendTextMessage(MESSAGE_STATUS_SMALL, "Nao foi possivel criar a Luva de Coleta.")
		return false
	end

	local result = player:addItemEx(glove)
	if result ~= true and result ~= RETURNVALUE_NOERROR then
		glove:remove()
		player:sendTextMessage(MESSAGE_STATUS_SMALL, "Nao foi possivel adicionar a Luva de Coleta ao inventario.")
		return false
	end

	player:sendTextMessage(MESSAGE_STATUS_SMALL, string.format("%s entregue. Base visual itemId: %d.", GLOVE_NAME, GLOVE_BASE_ITEM_ID))
	return true
end

giveGloveTalk:register()

local ec = EventCallback

ec.onLook = function(self, thing, position, distance, description)
	if not thing or not thing:isItem() then
		return description
	end

	if tonumber(thing:getCustomAttribute("material_gathering_node")) == 1 then
		return description
	end

	local nodeKey = getNodeKeyFromActionId(thing:getActionId())
	local nodeType = getNodeType(nodeKey)
	if not nodeType then
		return description
	end

	return string.format(
		"%s\nMaterial: %s [Grau 1]\nStacks restantes: %d/%d",
		description,
		nodeType.materialLabel,
		nodeType.defaultStacks,
		nodeType.maxStacks
	)
end

ec:register()

local startup = GlobalEvent("MaterialGatheringStartup")

function startup.onStartup()
	persistedNodes = {}

	local restoredCount = 0
	for _, nodeData in ipairs(loadPersistedNodes()) do
		if restoreOrCreateNode(nodeData) then
			restoredCount = restoredCount + 1
		end
	end

	if restoredCount > 0 then
		savePersistedNodes()
		logInfo(string.format("Restauradas %d minas persistidas.", restoredCount))
	else
		logInfo("Nenhuma mina persistida para restaurar.")
	end

	logInfo(string.format("Sistema ativo. Nodes persistidos em memoria: %d.", countEntries(persistedNodes)))
	broadcastNodeSync()
	return true
end

startup:register()
