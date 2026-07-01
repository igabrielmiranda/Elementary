local topBar = nil
local healthBar = nil
local manaBar = nil
local xpTextBar = nil
local experienceBar = nil
local levelValue = nil
local experienceValue = nil

local currentExperience = 0
local currentLevel = 0
local currentLevelPercent = 0

local settings = {}
local TOPBAR_POSITION_KEY = 'position'
local TOPBAR_WIDTH = 620
local TOPBAR_HEIGHT = 30
local TOPBAR_MARGIN_BOTTOM = 22

local topBarPosition = nil

local function normalizePosition(value)
  if type(value) == 'string' and value:len() > 0 then
    local ok, point = pcall(topoint, value)
    if ok then
      return normalizePosition(point)
    end
    return nil
  end

  if type(value) ~= 'table' then
    return nil
  end

  local x = tonumber(value.x)
  local y = tonumber(value.y)
  if not x or not y then
    return nil
  end

  return { x = math.floor(x), y = math.floor(y) }
end

local function clonePosition(position)
  local normalized = normalizePosition(position)
  if not normalized then
    return nil
  end

  return { x = normalized.x, y = normalized.y }
end

local function samePosition(a, b)
  local first = normalizePosition(a)
  local second = normalizePosition(b)
  if not first or not second then
    return first == second
  end
  return first.x == second.x and first.y == second.y
end

local function clampPosition(position)
  local normalized = normalizePosition(position)
  if not normalized or not topBar then
    return normalized
  end

  local rootPanel = modules.game_interface.getRootPanel()
  if not rootPanel then
    return normalized
  end

  local maxX = math.max(0, rootPanel:getWidth() - topBar:getWidth())
  local maxY = math.max(0, rootPanel:getHeight() - topBar:getHeight())
  return {
    x = math.min(math.max(normalized.x, 0), maxX),
    y = math.min(math.max(normalized.y, 0), maxY)
  }
end

local function buildDefaultPosition()
  local rootPanel = modules.game_interface.getRootPanel()
  local bottomActionPanel = modules.game_interface.getBottomActionPanel()
  if not rootPanel or not bottomActionPanel or not topBar then
    return nil
  end

  local rootSize = rootPanel:getSize()
  local bottomRect = bottomActionPanel:getRect()
  return clampPosition({
    x = math.floor((rootSize.width - topBar:getWidth()) / 2),
    y = math.floor(bottomRect.y - TOPBAR_MARGIN_BOTTOM - topBar:getHeight())
  })
end

local function preferredPosition()
  return clampPosition(topBarPosition or buildDefaultPosition())
end

local function applyPosition(position)
  if not topBar then
    return nil
  end

  local clamped = clampPosition(position)
  if not clamped then
    return nil
  end

  topBar:breakAnchors()
  topBar:setPosition(clamped)
  topBar:raise()
  return clamped
end

local function formatShortExperience(value)
  local numeric = math.max(0, math.floor(tonumber(value) or 0))
  if numeric >= 1000000000 then
    return string.format('%dB XP', math.floor(numeric / 1000000000))
  elseif numeric >= 1000000 then
    return string.format('%dM XP', math.floor(numeric / 1000000))
  elseif numeric >= 1000 then
    return string.format('%dK XP', math.floor(numeric / 1000))
  end

  return string.format('%d XP', numeric)
end

local function clampPercent(value)
  return math.min(100, math.max(0, math.floor(tonumber(value) or 0)))
end

local function refreshExperienceDisplay()
  if not xpTextBar then
    return
  end

  local percent = clampPercent(currentLevelPercent)
  local formatted = formatShortExperience(currentExperience)

  xpTextBar:setText(string.format('%s  %d%%', formatted, percent))
  xpTextBar:setValue(percent, 0, 100)
  xpTextBar:setPercent(percent)
  xpTextBar:setTooltip(string.format(
    'Total experience: %s\nProgress to level %d: %d%%',
    comma_value(currentExperience), currentLevel + 1, percent))

  -- Kept updated for compatibility, although these widgets are hidden.
  if experienceBar then
    experienceBar:setPercent(percent)
  end
  if experienceValue then
    experienceValue:setText(formatted)
  end
  if levelValue then
    levelValue:setText(tostring(currentLevel))
  end
end

local function persistPosition(position)
  local clamped = clampPosition(position)
  if not clamped or samePosition(topBarPosition, clamped) then
    return
  end

  topBarPosition = clonePosition(clamped)
  save()
end

local function cacheWidgets()
  healthBar = topBar:recursiveGetChildById('healthBar')
  manaBar = topBar:recursiveGetChildById('manaBar')
  xpTextBar = topBar:recursiveGetChildById('xpTextBar')
  experienceBar = topBar:recursiveGetChildById('experienceBar')
  levelValue = topBar:recursiveGetChildById('levelValue')
  experienceValue = topBar:recursiveGetChildById('experienceValue')
end

local function positionTopBar()
  local rootPanel = modules.game_interface.getRootPanel()
  if topBar:getParent() ~= rootPanel then
    topBar:setParent(rootPanel)
  end

  local applied = applyPosition(preferredPosition())
  if applied and topBarPosition and not samePosition(topBarPosition, applied) then
    topBarPosition = clonePosition(applied)
  end
end

function init()
  connect(LocalPlayer, {
    onHealthChange = onHealthChange,
    onManaChange = onManaChange,
    onExperienceChange = onExperienceChange,
    onLevelChange = onLevelChange
  })

  connect(g_game, {
    onGameStart = refresh,
    onGameEnd = offline
  })

  connect(modules.game_interface.getRootPanel(), {
    onGeometryChange = onTopBarParentGeometryChange
  })

  if g_game.isOnline() then
    refresh()
  end
end

function terminate()
  disconnect(LocalPlayer, {
    onHealthChange = onHealthChange,
    onManaChange = onManaChange,
    onExperienceChange = onExperienceChange,
    onLevelChange = onLevelChange
  })

  disconnect(g_game, {
    onGameStart = refresh,
    onGameEnd = offline
  })

  disconnect(modules.game_interface.getRootPanel(), {
    onGeometryChange = onTopBarParentGeometryChange
  })

  if topBar then
    topBar:destroy()
    topBar = nil
  end
end

function setupTopBar()
  local rootPanel = modules.game_interface.getRootPanel()
  topBar = topBar or g_ui.loadUI('topbar', rootPanel)
  topBar:setWidth(TOPBAR_WIDTH)
  topBar:setHeight(TOPBAR_HEIGHT)
  topBar:setPhantom(false)
  topBar:setFocusable(false)
  topBar:setDraggable(true)
  topBar.onDragEnter = onTopBarDragEnter
  topBar.onDragMove = onTopBarDragMove
  topBar.onDragLeave = onTopBarDragLeave

  cacheWidgets()
  positionTopBar()
end

function refresh()
  local player = g_game.getLocalPlayer()
  if not player then
    return
  end

  load()
  setupTopBar()
  show()

  onHealthChange(player, player:getHealth(), player:getMaxHealth())
  onManaChange(player, player:getMana(), player:getMaxMana())
  onExperienceChange(player, player:getExperience())
  onLevelChange(player, player:getLevel(), player:getLevelPercent())
end

function show()
  if not g_game.isOnline() or not topBar then
    return
  end

  topBar:setVisible(g_settings.getBoolean('topBar', false))
  topBar:raise()
end

function offline()
  save()
end

function onHealthChange(localPlayer, health, maxHealth)
  if not healthBar then
    return
  end

  if health > maxHealth then
    maxHealth = health
  end

  local percent = maxHealth > 0 and (health / maxHealth) * 100 or 0
  healthBar:setText(string.format('%s / %s', comma_value(health), comma_value(maxHealth)))
  healthBar:setValue(health, 0, maxHealth)
  healthBar:setPercent(percent)

  if percent > 92 then
    healthBar:setBackgroundColor('#00BC00FF')
  elseif percent > 60 then
    healthBar:setBackgroundColor('#50A150FF')
  elseif percent > 30 then
    healthBar:setBackgroundColor('#A1A100FF')
  elseif percent > 8 then
    healthBar:setBackgroundColor('#BF0A0AFF')
  elseif percent > 3 then
    healthBar:setBackgroundColor('#910F0FFF')
  else
    healthBar:setBackgroundColor('#850C0CFF')
  end
end

function onManaChange(localPlayer, mana, maxMana)
  if not manaBar then
    return
  end

  if mana > maxMana then
    maxMana = mana
  end

  local percent = maxMana > 0 and (mana / maxMana) * 100 or 0
  manaBar:setText(string.format('%s / %s', comma_value(mana), comma_value(maxMana)))
  manaBar:setValue(mana, 0, maxMana)
  manaBar:setPercent(percent)
end

function onExperienceChange(localPlayer, value)
  currentExperience = math.max(0, math.floor(tonumber(value) or 0))
  refreshExperienceDisplay()
end

function onLevelChange(localPlayer, value, percent)
  currentLevel = math.max(0, math.floor(tonumber(value) or 0))
  currentLevelPercent = clampPercent(percent)
  refreshExperienceDisplay()
end

function onTopBarDragEnter(widget, mousePos)
  if not topBar then
    return false
  end

  local currentPosition = topBar:getPosition()
  widget.movingReference = {
    x = mousePos.x - currentPosition.x,
    y = mousePos.y - currentPosition.y
  }
  return true
end

function onTopBarDragMove(widget, mousePos, mouseMoved)
  if not topBar or not widget.movingReference then
    return false
  end

  applyPosition({
    x = mousePos.x - widget.movingReference.x,
    y = mousePos.y - widget.movingReference.y
  })
  return true
end

function onTopBarDragLeave(widget, droppedWidget, mousePos)
  if not topBar then
    return false
  end

  widget.movingReference = nil
  persistPosition(topBar:getPosition())
  return true
end

function onTopBarParentGeometryChange()
  if not topBar then
    return
  end

  local applied = applyPosition(preferredPosition())
  if applied and topBarPosition and not samePosition(topBarPosition, applied) then
    topBarPosition = clonePosition(applied)
    save()
  end
end

function save()
  local settingsFile = modules.client_profiles.getSettingsFilePath('topbar.json')

  if topBarPosition then
    settings[TOPBAR_POSITION_KEY] = pointtostring(topBarPosition)
  else
    settings[TOPBAR_POSITION_KEY] = nil
  end

  local status, result = pcall(function()
    return json.encode(settings, 2)
  end)

  if not status then
    return onError('Error while saving top bar settings. Data won\'t be saved. Details: ' .. result)
  end

  if result:len() > 100 * 1024 * 1024 then
    return onError('Something went wrong, file is above 100MB, won\'t be saved')
  end

  g_resources.writeFileContents(settingsFile, result)
end

function load()
  local settingsFile = modules.client_profiles.getSettingsFilePath('topbar.json')

  if g_resources.fileExists(settingsFile) then
    local status, result = pcall(function()
      return json.decode(g_resources.readFileContents(settingsFile))
    end)

    if not status then
      return onError('Error while reading top bar settings file. To fix this problem you can delete storage.json. Details: ' .. result)
    end

    settings = result
  else
    settings = {}
  end

  topBarPosition = normalizePosition(settings[TOPBAR_POSITION_KEY])
end
