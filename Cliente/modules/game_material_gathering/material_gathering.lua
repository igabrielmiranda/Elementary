local OPCODE = 95
local COLLECTION_INTERVAL_MS = 10000
local COLLECTION_PROGRESS_UPDATE_MS = 50
local PENDING_COLLECTION_TIMEOUT_MS = 3000
local COLLECTION_PROGRESS_WIDGET_WIDTH = 220
local COLLECTION_PROGRESS_WIDGET_HEIGHT = 28
local COLLECTION_PROGRESS_LABEL_HEIGHT = 14
local COLLECTION_PROGRESS_BAR_WIDTH = 220
local COLLECTION_PROGRESS_BAR_HEIGHT = 10
local COLLECTION_PROGRESS_MARGIN_BOTTOM = 6
local COLLECTION_PROGRESS_FILL_COLOR = "#d8a53b"
local COLLECTION_PROGRESS_BACKGROUND_COLOR = "#111111dd"
local COLLECTION_PROGRESS_BORDER_COLOR = "#4a3618"
local COLLECTION_PROGRESS_TEXT = "Coletando..."

local originalProcessMouseAction = nil
local trackedNodes = {}
local activeCollectionPosition = nil
local pendingCollectionPosition = nil
local pendingCollectionEvent = nil
local collectionProgressWidget = nil
local collectionProgressLabel = nil
local collectionProgressBackground = nil
local collectionProgressFill = nil
local collectionProgressEvent = nil
local collectionProgressStart = 0
local collectionProgressDuration = COLLECTION_INTERVAL_MS
local collectionSessionActive = false
local collectionCancelPending = false
local collectionCancelReason = nil
local lastKnownHealth = nil

local function copyPosition(position)
  if not position then
    return nil
  end

  local x = tonumber(position.x)
  local y = tonumber(position.y)
  local z = tonumber(position.z)
  if not x or not y or not z then
    return nil
  end

  return {x = x, y = y, z = z}
end

local function samePosition(a, b)
  return a and b and a.x == b.x and a.y == b.y and a.z == b.z
end

local function getPositionKey(position)
  return string.format("%d:%d:%d", position.x, position.y, position.z)
end

local function clearEvent(event)
  if event then
    removeEvent(event)
  end
  return nil
end

local function clearPendingCollectionPosition()
  pendingCollectionEvent = clearEvent(pendingCollectionEvent)
  pendingCollectionPosition = nil
end

local function rememberPendingCollectionPosition(position)
  pendingCollectionPosition = copyPosition(position)
  pendingCollectionEvent = clearEvent(pendingCollectionEvent)
  pendingCollectionEvent = scheduleEvent(clearPendingCollectionPosition, PENDING_COLLECTION_TIMEOUT_MS)
end

local function clearTrackedNodes()
  trackedNodes = {}
end

local function syncTrackedNodes(nodes)
  local snapshot = {}

  for _, nodeData in ipairs(nodes or {}) do
    local position = copyPosition(nodeData.position)
    if position then
      snapshot[getPositionKey(position)] = {
        position = position,
        itemId = tonumber(nodeData.itemId) or 0,
      }
    end
  end

  trackedNodes = snapshot
end

local function findGatheringNode(position, preferredThing)
  if not position then
    return nil
  end

  local trackedNode = trackedNodes[getPositionKey(position)]
  if not trackedNode then
    return nil
  end

  if preferredThing and preferredThing.isItem and preferredThing:isItem() then
    if trackedNode.itemId == 0 or preferredThing:getServerId() == trackedNode.itemId then
      return preferredThing
    end
  end

  local tile = g_map.getTile(position)
  if not tile then
    return nil
  end

  for _, item in ipairs(tile:getItems() or {}) do
    if trackedNode.itemId == 0 or item:getServerId() == trackedNode.itemId then
      return item
    end
  end

  return nil
end

local function sendGatheringOpcode(payload)
  local protocol = g_game.getProtocolGame()
  if not protocol then
    return false
  end

  protocol:sendExtendedOpcode(OPCODE, json.encode(payload))
  return true
end

local function sendStartGathering(node)
  if not node then
    return false
  end

  local position = node:getPosition()
  if not position then
    return false
  end

  rememberPendingCollectionPosition(position)

  local sent = sendGatheringOpcode({
    action = "start",
    data = {
      position = {x = position.x, y = position.y, z = position.z},
      actionId = node:getActionId(),
      itemId = node:getServerId(),
    },
  })

  if not sent then
    clearPendingCollectionPosition()
  end

  return sent
end

local function sendCancelGathering(reasonCode)
  return sendGatheringOpcode({
    action = "cancel",
    data = {
      reason = reasonCode,
    },
  })
end

local function requestSync()
  sendGatheringOpcode({action = "requestSync"})
end

local function getCurrentCollectionPosition()
  return activeCollectionPosition or pendingCollectionPosition
end

local function hasCollectionInFlight()
  return collectionSessionActive or activeCollectionPosition ~= nil or pendingCollectionPosition ~= nil
end

local function clearCollectionState()
  activeCollectionPosition = nil
  collectionSessionActive = false
end

local function getCollectionProgressParent()
  if not modules.game_interface or not modules.game_interface.getRootPanel then
    return nil
  end

  return modules.game_interface.getRootPanel()
end

local function getCollectionProgressAnchorTarget(rootPanel)
  if not rootPanel then
    return "gameBottomActionPanel"
  end

  local topBar = rootPanel:getChildById("topbar")
  if topBar and topBar:isVisible() then
    return "topbar"
  end

  return "gameBottomActionPanel"
end

local function positionCollectionProgressWidget()
  if not collectionProgressWidget then
    return false
  end

  local rootPanel = getCollectionProgressParent()
  if not rootPanel then
    return false
  end

  if collectionProgressWidget:getParent() ~= rootPanel then
    collectionProgressWidget:setParent(rootPanel)
  end

  collectionProgressWidget:removeAnchor(AnchorLeft)
  collectionProgressWidget:removeAnchor(AnchorRight)
  collectionProgressWidget:removeAnchor(AnchorTop)
  collectionProgressWidget:removeAnchor(AnchorBottom)
  collectionProgressWidget:removeAnchor(AnchorHorizontalCenter)
  collectionProgressWidget:removeAnchor(AnchorVerticalCenter)
  local anchorTarget = getCollectionProgressAnchorTarget(rootPanel)
  collectionProgressWidget:addAnchor(AnchorHorizontalCenter, anchorTarget, AnchorHorizontalCenter)
  collectionProgressWidget:addAnchor(AnchorBottom, anchorTarget, AnchorTop)
  collectionProgressWidget:setMarginLeft(0)
  collectionProgressWidget:setMarginTop(0)
  collectionProgressWidget:setMarginBottom(COLLECTION_PROGRESS_MARGIN_BOTTOM)
  collectionProgressWidget:raise()
  return true
end

local function ensureCollectionProgressWidget()
  if collectionProgressWidget and collectionProgressLabel and collectionProgressBackground and collectionProgressFill then
    return positionCollectionProgressWidget()
  end

  local rootPanel = getCollectionProgressParent()
  if not rootPanel then
    return false
  end

  collectionProgressWidget = g_ui.createWidget("UIWidget", rootPanel)
  collectionProgressWidget:setWidth(COLLECTION_PROGRESS_WIDGET_WIDTH)
  collectionProgressWidget:setHeight(COLLECTION_PROGRESS_WIDGET_HEIGHT)
  collectionProgressWidget:setVisible(false)
  collectionProgressWidget:setPhantom(true)
  collectionProgressWidget:setFocusable(false)

  collectionProgressLabel = g_ui.createWidget("UILabel", collectionProgressWidget)
  collectionProgressLabel:setWidth(COLLECTION_PROGRESS_WIDGET_WIDTH)
  collectionProgressLabel:setHeight(COLLECTION_PROGRESS_LABEL_HEIGHT)
  collectionProgressLabel:addAnchor(AnchorTop, "parent", AnchorTop)
  collectionProgressLabel:addAnchor(AnchorHorizontalCenter, "parent", AnchorHorizontalCenter)
  collectionProgressLabel:setText(tr(COLLECTION_PROGRESS_TEXT))
  collectionProgressLabel:setColor("#f4deb2")
  collectionProgressLabel:setTextAlign(AlignCenter)
  collectionProgressLabel:setPhantom(true)
  collectionProgressLabel:setFocusable(false)

  collectionProgressBackground = g_ui.createWidget("UIWidget", collectionProgressWidget)
  collectionProgressBackground:addAnchor(AnchorHorizontalCenter, "parent", AnchorHorizontalCenter)
  collectionProgressBackground:addAnchor(AnchorBottom, "parent", AnchorBottom)
  collectionProgressBackground:setWidth(COLLECTION_PROGRESS_BAR_WIDTH)
  collectionProgressBackground:setHeight(COLLECTION_PROGRESS_BAR_HEIGHT)
  collectionProgressBackground:setBackgroundColor(COLLECTION_PROGRESS_BACKGROUND_COLOR)
  collectionProgressBackground:setBorderWidth(1)
  collectionProgressBackground:setBorderColor(COLLECTION_PROGRESS_BORDER_COLOR)
  collectionProgressBackground:setPhantom(true)
  collectionProgressBackground:setFocusable(false)

  collectionProgressFill = g_ui.createWidget("UIWidget", collectionProgressBackground)
  collectionProgressFill:setX(1)
  collectionProgressFill:setY(1)
  collectionProgressFill:setWidth(0)
  collectionProgressFill:setHeight(COLLECTION_PROGRESS_BAR_HEIGHT - 2)
  collectionProgressFill:setBackgroundColor(COLLECTION_PROGRESS_FILL_COLOR)
  collectionProgressFill:setPhantom(true)
  collectionProgressFill:setFocusable(false)
  collectionProgressFill:setVisible(false)
  return positionCollectionProgressWidget()
end

local function setCollectionProgressPercent(percent)
  if not collectionProgressFill then
    return
  end

  local clampedPercent = math.max(0, math.min(100, tonumber(percent) or 0))
  local innerWidth = COLLECTION_PROGRESS_BAR_WIDTH - 2
  local fillWidth = math.floor((innerWidth * clampedPercent / 100) + 0.5)

  collectionProgressFill:setWidth(fillWidth)
  collectionProgressFill:setVisible(fillWidth > 0)
end

local function destroyGatheringProgressBar()
  collectionProgressEvent = clearEvent(collectionProgressEvent)
  collectionProgressStart = 0
  collectionProgressDuration = COLLECTION_INTERVAL_MS

  if collectionProgressWidget then
    collectionProgressWidget:destroy()
  end

  collectionProgressWidget = nil
  collectionProgressLabel = nil
  collectionProgressBackground = nil
  collectionProgressFill = nil
end

local function stopGatheringProgress()
  collectionProgressEvent = clearEvent(collectionProgressEvent)
  collectionProgressStart = 0
  collectionProgressDuration = COLLECTION_INTERVAL_MS
  setCollectionProgressPercent(0)
  if collectionProgressWidget then
    collectionProgressWidget:hide()
  end
end

local function restartGatheringProgress(duration)
  if not collectionSessionActive then
    return
  end

  collectionProgressDuration = math.max(1, tonumber(duration) or COLLECTION_INTERVAL_MS)
  collectionProgressStart = g_clock.millis()
  setCollectionProgressPercent(0)
end

local function updateGatheringProgress()
  if not collectionSessionActive then
    stopGatheringProgress()
    return
  end

  local player = g_game.getLocalPlayer()
  if not player or not collectionProgressWidget then
    stopGatheringProgress()
    return
  end

  local now = g_clock.millis()
  local elapsed = math.max(0, now - collectionProgressStart)
  if elapsed >= collectionProgressDuration then
    restartGatheringProgress(collectionProgressDuration)
    elapsed = 0
  end

  setCollectionProgressPercent((elapsed / collectionProgressDuration) * 100)
  collectionProgressEvent = scheduleEvent(updateGatheringProgress, COLLECTION_PROGRESS_UPDATE_MS)
end

local function startGatheringProgress(duration)
  if not ensureCollectionProgressWidget() then
    return
  end

  collectionProgressWidget:show()
  collectionProgressWidget:raise()
  restartGatheringProgress(duration)
  collectionProgressEvent = clearEvent(collectionProgressEvent)
  updateGatheringProgress()
end

local function resolveSessionPosition(data)
  return copyPosition(data and data.position) or copyPosition(activeCollectionPosition) or copyPosition(pendingCollectionPosition)
end

local function cancelActiveCollection(reasonCode)
  if not hasCollectionInFlight() then
    return
  end

  collectionCancelPending = true
  collectionCancelReason = reasonCode or "click"
  clearPendingCollectionPosition()
  clearCollectionState()
  stopGatheringProgress()
  sendCancelGathering(collectionCancelReason)
end

local function handleSessionState(data)
  if data and data.active then
    if collectionCancelPending then
      clearPendingCollectionPosition()
      stopGatheringProgress()
      sendCancelGathering(collectionCancelReason or "click")
      return
    end

    activeCollectionPosition = resolveSessionPosition(data)
    clearPendingCollectionPosition()
    collectionCancelPending = false
    collectionCancelReason = nil
    collectionSessionActive = true
    startGatheringProgress(data and data.duration)
    return
  end

  clearPendingCollectionPosition()
  collectionCancelPending = false
  collectionCancelReason = nil
  clearCollectionState()
  stopGatheringProgress()
end

local function onExtendedOpcode(protocol, opcode, buffer)
  local status, payload = pcall(function()
    return json.decode(buffer)
  end)

  if not status or type(payload) ~= "table" then
    return
  end

  if payload.action == "sync" then
    syncTrackedNodes(payload.data and payload.data.nodes or {})
  elseif payload.action == "session" then
    handleSessionState(payload.data)
  end
end

local function shouldLookNode(mouseButton, autoWalkPos, marking)
  if marking or not autoWalkPos then
    return false
  end

  if mouseButton ~= MouseLeftButton and mouseButton ~= MouseRightButton then
    return false
  end

  return g_keyboard.getModifiers() == KeyboardShiftModifier
end

local function isDualButtonLook(mouseButton)
  if mouseButton == MouseLeftButton then
    return g_mouse.isPressed(MouseRightButton)
  end

  if mouseButton == MouseRightButton then
    return g_mouse.isPressed(MouseLeftButton)
  end

  return false
end

local function shouldHandleClick(mouseButton, autoWalkPos, marking)
  if marking or not autoWalkPos then
    return false
  end

  if mouseButton ~= MouseLeftButton and mouseButton ~= MouseRightButton then
    return false
  end

  if not g_game.isOnline() then
    return false
  end

  if g_keyboard.getModifiers() ~= KeyboardNoModifier then
    return false
  end

  return not isDualButtonLook(mouseButton)
end

local function isClickOnActiveCollection(autoWalkPos, lookThing, useThing)
  local collectionPosition = getCurrentCollectionPosition()
  if not collectionPosition then
    return false
  end

  if autoWalkPos and samePosition(autoWalkPos, collectionPosition) then
    return true
  end

  local function matchesThing(thing)
    local thingPosition = nil
    if thing and thing.getPosition then
      thingPosition = thing:getPosition()
    end
    return thingPosition and samePosition(thingPosition, collectionPosition)
  end

  return matchesThing(lookThing) or matchesThing(useThing)
end

local function shouldCancelForInteraction(mouseButton, autoWalkPos, lookThing, useThing, marking)
  if not hasCollectionInFlight() or marking then
    return false
  end

  if mouseButton ~= MouseLeftButton and mouseButton ~= MouseRightButton then
    return false
  end

  if isDualButtonLook(mouseButton) then
    return false
  end

  return not isClickOnActiveCollection(autoWalkPos, lookThing, useThing)
end

local function wrapProcessMouseAction()
  if originalProcessMouseAction or not modules.game_interface or not modules.game_interface.processMouseAction then
    return
  end

  originalProcessMouseAction = modules.game_interface.processMouseAction
  modules.game_interface.processMouseAction = function(menuPosition, mouseButton, autoWalkPos, lookThing, useThing, creatureThing, attackCreature, marking)
    if shouldCancelForInteraction(mouseButton, autoWalkPos, lookThing, useThing, marking) then
      cancelActiveCollection("click")
    end

    if shouldLookNode(mouseButton, autoWalkPos, marking) then
      local node = findGatheringNode(autoWalkPos, lookThing) or findGatheringNode(autoWalkPos, useThing)
      if node then
        g_game.look(node)
        return true
      end
    end

    if shouldHandleClick(mouseButton, autoWalkPos, marking) then
      local node = findGatheringNode(autoWalkPos, useThing) or findGatheringNode(autoWalkPos, lookThing)
      if node then
        if hasCollectionInFlight() and isClickOnActiveCollection(autoWalkPos, lookThing, useThing) then
          return true
        end

        if sendStartGathering(node) then
          return true
        end
      end
    end

    return originalProcessMouseAction(menuPosition, mouseButton, autoWalkPos, lookThing, useThing, creatureThing, attackCreature, marking)
  end
end

local function unwrapProcessMouseAction()
  if originalProcessMouseAction and modules.game_interface then
    modules.game_interface.processMouseAction = originalProcessMouseAction
  end

  originalProcessMouseAction = nil
end

local function onPlayerPositionChange(player, newPos, oldPos)
  if hasCollectionInFlight() and not samePosition(newPos, oldPos) then
    cancelActiveCollection("move")
  end
end

local function onPlayerHealthChange(player, health, maxHealth)
  if hasCollectionInFlight() and lastKnownHealth and health < lastKnownHealth then
    cancelActiveCollection("damage")
  end

  lastKnownHealth = health
end

local function onGameStart()
  local player = g_game.getLocalPlayer()
  lastKnownHealth = player and player:getHealth() or nil
  clearPendingCollectionPosition()
  collectionCancelPending = false
  collectionCancelReason = nil
  clearCollectionState()
  stopGatheringProgress()
  requestSync()
end

local function onGameEnd()
  clearPendingCollectionPosition()
  collectionCancelPending = false
  collectionCancelReason = nil
  lastKnownHealth = nil
  clearCollectionState()
  stopGatheringProgress()
  clearTrackedNodes()
end

function init()
  connect(g_game, {
    onGameStart = onGameStart,
    onGameEnd = onGameEnd,
  })

  connect(LocalPlayer, {
    onPositionChange = onPlayerPositionChange,
    onHealthChange = onPlayerHealthChange,
  })

  ProtocolGame.registerExtendedOpcode(OPCODE, onExtendedOpcode)
  wrapProcessMouseAction()

  if g_game.isOnline() then
    onGameStart()
  end
end

function terminate()
  disconnect(g_game, {
    onGameStart = onGameStart,
    onGameEnd = onGameEnd,
  })

  disconnect(LocalPlayer, {
    onPositionChange = onPlayerPositionChange,
    onHealthChange = onPlayerHealthChange,
  })

  ProtocolGame.unregisterExtendedOpcode(OPCODE)
  onGameEnd()
  destroyGatheringProgressBar()
  unwrapProcessMouseAction()
end
