local MODULE_TAG = '[CustomSkillBar]'
local SLOT_COUNT = 20
local SLOTS_PER_ROW = 10
local SLOT_SIZE = 36
local SLOT_SPACING = 4
local BAR_POSITION_X = 20
local BAR_POSITION_BOTTOM_OFFSET = 190
local POSITION_RETRY_DELAY = 30
local TARGET_SKILL_NAME = 'Fire Tornado'
local SETTINGS_PREFIX = 'custom_skillbar_'
local GLOBAL_SETTINGS_KEY = 'custom_skillbar_global'
local DEBUG_FROZEN_ARROW_VALIDATION = false
local FROZEN_ARROW_WORDS = 'flecha congelante'
local PLACEHOLDER_ICON = {
  source = '/images/game/spells/cooldowns',
  clip = '40 0 20 20'
}
local SLOT_LABELS = {
  '1', '2', '3', '4', '5', '6', '7', '8', '9', '0',
  'F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8', 'F9', 'F10'
}

local HOTKEY_OPTIONS = {
  { text = 'Sem', value = '' }
}
local ALLOWED_HOTKEYS = {}

local TYPE_LABELS = {
  instant = 'Instantanea',
  conjure = 'Conjuracao'
}

local GROUP_LABELS = {
  attack = 'Ataque',
  healing = 'Cura',
  support = 'Suporte',
  special = 'Especial',
  cripple = 'Debuff'
}

local CHOICE_STATUS_STYLES = {
  liberada = {
    label = 'Liberada',
    background = '#1c4035',
    border = '#3f8970',
    text = '#d8f2e6'
  },
  indisponivel = {
    label = 'Indisponivel',
    background = '#232830',
    border = '#59616c',
    text = '#dbe0e7'
  }
}

local KNOWN_BOW_SERVER_IDS = {
  [3350] = true,
  [2456] = true,
  [7438] = true,
  [8854] = true,
  [8855] = true,
  [8856] = true,
  [8857] = true,
  [8858] = true,
  [10295] = true,
  [13873] = true,
  [15643] = true,
  [18454] = true,
  [21696] = true,
  [22416] = true,
  [22417] = true,
  [22418] = true,
  [23798] = true,
  [25522] = true,
  [25885] = true,
  [25895] = true,
  [25906] = true,
  [25915] = true,
  [26251] = true,
  [26253] = true,
  [26254] = true,
  [26285] = true,
  [26286] = true,
  [26288] = true,
  [26306] = true,
  [26307] = true,
  [26308] = true,
  [26758] = true,
  [26765] = true,
  [27199] = true,
  [27230] = true,
  [27395] = true,
  [27471] = true,
  [27472] = true,
  [27646] = true,
  [27661] = true,
  [27662] = true,
  [27735] = true,
  [27741] = true,
  [27747] = true,
  [28116] = true,
  [28131] = true
}

for index = 1, 9 do
  local value = tostring(index)
  table.insert(HOTKEY_OPTIONS, { text = value, value = value })
  ALLOWED_HOTKEYS[value] = true
end

table.insert(HOTKEY_OPTIONS, { text = '0', value = '0' })
ALLOWED_HOTKEYS['0'] = true

for index = 1, 10 do
  local value = 'F' .. index
  table.insert(HOTKEY_OPTIONS, { text = value, value = value })
  ALLOWED_HOTKEYS[value] = true
end

local customSkillBar = nil
local choiceWindow = nil
local positionEvent = nil
local activeCharacterName = nil
local slotsPanelWidget = nil
local topRowWidget = nil
local bottomRowWidget = nil
local dragHandleWidget = nil
local testButton = nil
local hoveredSlotIndex = nil
local barPosition = nil
local lastMouseDispatch = {
  slotIndex = nil,
  mouseButton = nil,
  timestamp = 0
}

local slotWidgets = {}
local slotSettings = {}
local hotkeyCallbacks = {}
local slotCooldowns = {}

local choiceWidgets = {}
local choiceState = {
  slotIndex = nil,
  selectedSkillName = nil,
  searchText = ''
}

local skillCatalog = nil
local skillCatalogByName = {}
local skillIconLookup = nil
local saveSettings = nil
local inventorySlotKeys = {}
local lastFrozenArrowDebugSignature = nil
local normalizeToken
local updateSlotWidget
local getItemClientId
local getItemServerId
local getItemDisplayName
local getEquippedWeaponContext
local getEquippedWeaponEntries
local getAllEquippedInventoryEntries
local equippedItemMatchesSkillRequirement
local getSkillRequiredWeaponLabel

local function logInfo(message)
  print(string.format('%s %s', MODULE_TAG, message))
end

local function logError(message)
  g_logger.error(string.format('%s ERROR: %s', MODULE_TAG, message))
end

local function showChooserMessage(message)
  if modules.game_textmessage and modules.game_textmessage.displayGameMessage then
    modules.game_textmessage.displayGameMessage(message)
  elseif modules.game_textmessage and modules.game_textmessage.displayStatusMessage then
    modules.game_textmessage.displayStatusMessage(message)
  else
    print(message)
  end
end

local function normalizeText(value)
  value = tostring(value or ''):lower():trim()
  value = value:gsub('%s+', ' ')
  return value
end

local function isFrozenArrowSkill(skill)
  return skill and normalizeText(skill.words or '') == FROZEN_ARROW_WORDS
end

local function hasEquippedVisibleBow2456()
  local panel = rawget(_G, 'inventoryPanel')
  if not panel then
    return false
  end

  for slot = InventorySlotOther, InventorySlotAmmo do
    local itemWidget = panel:getChildById('slot' .. slot)
    if itemWidget and itemWidget.getItem then
      local okItem, item = pcall(function()
        return itemWidget:getItem()
      end)

      if okItem and item then
        local clientId = getItemClientId(item)
        local serverId = getItemServerId(item)
        if clientId == 2456 or serverId == 2456 then
          return true
        end
      end
    end
  end

  return false
end

local function detectWeaponTypeFromItem(item)
  if not item then
    return 'none'
  end

  local itemServerId = getItemServerId(item)
  local itemClientId = getItemClientId(item)
  local itemName = normalizeToken(getItemDisplayName(item))

  if (itemServerId and KNOWN_BOW_SERVER_IDS[itemServerId]) or (itemClientId and KNOWN_BOW_SERVER_IDS[itemClientId]) then
    return 'bow'
  end

  if itemName:find('crossbow', 1, true) then
    return 'crossbow'
  end

  if itemName:find('bow', 1, true) then
    return 'bow'
  end

  return 'unknown'
end

local function buildFrozenArrowEntryDebug(entry, skill)
  local item = entry and entry.item or nil
  local result = item and equippedItemMatchesSkillRequirement(item, skill) or false
  local reason = 'slot vazio'

  if item then
    if result then
      reason = 'item atende ao requisito por tipo/nome/id'
    else
      reason = 'item equipado nao corresponde ao requisito da skill'
    end
  end

  return string.format(
    'requiredWeapon=%s slot=%s itemId=%s serverId=%s itemName=%s weaponType=%s result=%s reason=%s',
    tostring(skill and skill.requiredWeaponType or '-'),
    tostring(entry and entry.handLabel or '-'),
    tostring(item and getItemClientId(item) or '-'),
    tostring(item and getItemServerId(item) or '-'),
    tostring(item and getItemDisplayName(item) or '-'),
    detectWeaponTypeFromItem(item),
    result and 'available' or 'unavailable',
    reason
  )
end

local function logFrozenArrowValidation(skill, contextLabel, availability, reason)
  if not DEBUG_FROZEN_ARROW_VALIDATION or not isFrozenArrowSkill(skill) then
    return
  end

  local context = getEquippedWeaponContext()
  local entries = getEquippedWeaponEntries(context)
  local player = g_game.getLocalPlayer()
  if player then
    for _, entry in ipairs(getAllEquippedInventoryEntries(player)) do
      local alreadyListed = false
      for _, handEntry in ipairs(entries) do
        if handEntry.item == entry.item then
          alreadyListed = true
          break
        end
      end

      if not alreadyListed then
        table.insert(entries, entry)
      end
    end
  end

  logInfo(string.format(
    '[FrozenArrow][SkillBar][%s] requiredWeapon=%s availability=%s reason=%s',
    tostring(contextLabel or 'validation'),
    tostring(skill.requiredWeaponType or '-'),
    availability and 'available' or 'unavailable',
    tostring(reason or '-')
  ))

  if #entries == 0 then
    logInfo(string.format(
      '[FrozenArrow][SkillBar][%s] requiredWeapon=%s slot=- itemId=- serverId=- itemName=- weaponType=none result=unavailable reason=nenhum slot de arma encontrado',
      tostring(contextLabel or 'validation'),
      tostring(skill.requiredWeaponType or '-')
    ))
    return
  end

  for _, entry in ipairs(entries) do
    logInfo(string.format('[FrozenArrow][SkillBar][%s] %s', tostring(contextLabel or 'validation'), buildFrozenArrowEntryDebug(entry, skill)))
  end
end

normalizeToken = function(value)
  return normalizeText(value)
end

local function humanizeText(value)
  value = tostring(value or ''):trim()
  if value:len() == 0 then
    return '-'
  end

  value = value:gsub('_', ' ')
  value = value:gsub("(%a)([%w']*)", function(first, rest)
    return first:upper() .. rest:lower()
  end)
  return value
end

local function normalizeHotkey(value)
  value = tostring(value or ''):upper():trim()
  value = value:gsub('%s+', '')
  return value
end

local function sanitizeHotkey(value)
  local hotkey = normalizeHotkey(value)
  if hotkey ~= '' and not ALLOWED_HOTKEYS[hotkey] then
    return ''
  end

  return hotkey
end

local function isTextHotkey(value)
  return sanitizeHotkey(value):len() == 1
end

local function getSkillTypeLabel(value)
  local normalized = normalizeText(value)
  if normalized:len() == 0 then
    return '-'
  end

  return TYPE_LABELS[normalized] or humanizeText(value)
end

local function getSkillGroupLabel(groupInfo)
  if type(groupInfo) ~= 'table' then
    return '-'
  end

  local primaryGroupId = nil
  for groupId, _ in pairs(groupInfo) do
    if type(groupId) == 'number' and (not primaryGroupId or groupId < primaryGroupId) then
      primaryGroupId = groupId
    end
  end

  local groupName = primaryGroupId and SpellGroups and SpellGroups[primaryGroupId] or nil
  if not groupName or tostring(groupName):len() == 0 then
    return '-'
  end

  local normalized = normalizeText(groupName)
  return GROUP_LABELS[normalized] or humanizeText(groupName)
end

local function getRawSpellInfo(spellName)
  if Spells and Spells.getSpellByName then
    local ok, spellInfo = pcall(Spells.getSpellByName, spellName)
    if ok and type(spellInfo) == 'table' then
      return spellInfo
    end
  end

  if SpellInfo and SpellInfo.Default then
    return SpellInfo.Default[spellName]
  end

  return nil
end

local function getRawSpellInfoByWords(words)
  if Spells and Spells.getSpellByWords and type(words) == 'string' and words:len() > 0 then
    local ok, spellInfo = pcall(function()
      return select(1, Spells.getSpellByWords(words))
    end)
    if ok and type(spellInfo) == 'table' then
      return spellInfo
    end
  end

  return nil
end

getItemClientId = function(item)
  if not item or not item.getId then
    return nil
  end

  local ok, itemId = pcall(function()
    return item:getId()
  end)

  if not ok then
    return nil
  end

  return tonumber(itemId) or itemId
end

getItemServerId = function(item)
  if not item or not item.getServerId then
    return nil
  end

  local ok, serverId = pcall(function()
    return item:getServerId()
  end)

  if not ok then
    return nil
  end

  serverId = tonumber(serverId) or serverId
  if type(serverId) == 'number' and serverId <= 0 then
    return nil
  end

  return serverId
end

local function buildItemIdentityKey(item)
  return string.format('%s|%s', tostring(getItemServerId(item) or 0), tostring(getItemClientId(item) or 0))
end

local function getInventoryItemFromSlot(player, slot)
  if not player or slot == nil then
    player = nil
  end

  local item = nil
  if player then
    local ok, resolvedItem = pcall(function()
      return player:getInventoryItem(slot)
    end)

    if ok and resolvedItem then
      item = resolvedItem
    end
  end

  if item then
    return item
  end

  local panel = rawget(_G, 'inventoryPanel')
  if not panel then
    return nil
  end

  local itemWidget = panel:getChildById('slot' .. slot)
  if not itemWidget or not itemWidget.getItem then
    return nil
  end

  local okWidgetItem, widgetItem = pcall(function()
    return itemWidget:getItem()
  end)
  if okWidgetItem and widgetItem then
    return widgetItem
  end

  return nil
end

getItemDisplayName = function(item)
  if not item then
    return 'Nenhuma'
  end

  if item.getName then
    local okName, itemName = pcall(function()
      return item:getName()
    end)

    if okName and type(itemName) == 'string' and itemName:len() > 0 then
      return itemName
    end
  end

  if item.getTooltip then
    local okTooltip, tooltip = pcall(function()
      return item:getTooltip()
    end)

    if okTooltip and type(tooltip) == 'string' and tooltip:len() > 0 then
      local firstLine = tooltip:match('([^\r\n]+)')
      if firstLine and firstLine:len() > 0 then
        return firstLine
      end
    end
  end

  return tostring(item)
end

getEquippedWeaponContext = function()
  local player = g_game.getLocalPlayer()
  if not player then
    return {
      rightItem = nil,
      leftItem = nil,
      otherItem = nil
    }
  end

  return {
    rightItem = getInventoryItemFromSlot(player, InventorySlotRight),
    leftItem = getInventoryItemFromSlot(player, InventorySlotLeft),
    otherItem = getInventoryItemFromSlot(player, InventorySlotOther)
  }
end

getEquippedWeaponEntries = function(context)
  if not context then
    return {}
  end

  local entries = {
    { item = context.rightItem, handLabel = 'mao direita' },
    { item = context.leftItem, handLabel = 'mao esquerda' }
  }

  if context.otherItem and context.otherItem ~= context.rightItem and context.otherItem ~= context.leftItem then
    table.insert(entries, { item = context.otherItem, handLabel = 'slot alternativo de arma' })
  end

  return entries
end

getAllEquippedInventoryEntries = function(player)
  local entries = {}
  if not player then
    return entries
  end

  for slot = InventorySlotOther, InventorySlotAmmo do
    local item = getInventoryItemFromSlot(player, slot)
    if item then
      table.insert(entries, { item = item, handLabel = 'slot ' .. tostring(slot) })
    end
  end

  return entries
end

local function getSkillRequiredItemIds(skill)
  if not skill then
    return {}
  end

  if skill.requiredItemIds and #skill.requiredItemIds > 0 then
    return skill.requiredItemIds
  end

  if skill.requiredItemId then
    return { skill.requiredItemId }
  end

  return {}
end

local function getSkillRequiredClientItemIds(skill)
  if not skill then
    return {}
  end

  if skill.requiredClientItemIds and #skill.requiredClientItemIds > 0 then
    return skill.requiredClientItemIds
  end

  if skill.requiredClientItemId then
    return { skill.requiredClientItemId }
  end

  return {}
end

local function getSkillRequiredWeaponType(skill)
  if not skill then
    return ''
  end

  return normalizeToken(skill.requiredWeaponType or '')
end

getSkillRequiredWeaponLabel = function(skill)
  local requiredItemName = tostring(skill and skill.requiredItemName or ''):trim()
  if requiredItemName ~= '' then
    return requiredItemName
  end

  local requiredWeaponType = getSkillRequiredWeaponType(skill)
  if requiredWeaponType ~= '' then
    return humanizeText(requiredWeaponType)
  end

  return ''
end

local function itemMatchesRequiredWeaponType(item, requiredWeaponType)
  if not item or not requiredWeaponType or requiredWeaponType == '' then
    return false
  end

  local itemServerId = getItemServerId(item)
  local itemClientId = getItemClientId(item)
  local itemName = normalizeToken(getItemDisplayName(item))
  if requiredWeaponType == 'bow' then
    if (itemServerId and KNOWN_BOW_SERVER_IDS[itemServerId]) or (itemClientId and KNOWN_BOW_SERVER_IDS[itemClientId]) then
      return true
    end
    return itemName:find('bow', 1, true) ~= nil and itemName:find('crossbow', 1, true) == nil
  end

  if requiredWeaponType == 'crossbow' then
    return itemName:find('crossbow', 1, true) ~= nil
  end

  return itemName:find(requiredWeaponType, 1, true) ~= nil
end

local function skillRequiresEquippedWeapon(skill)
  if not skill then
    return false
  end

  return skill.needWeapon == true
    or skill.requiredItemId ~= nil
    or (skill.requiredItemIds and #skill.requiredItemIds > 0)
    or skill.requiredClientItemId ~= nil
    or (skill.requiredClientItemIds and #skill.requiredClientItemIds > 0)
    or getSkillRequiredWeaponType(skill) ~= ''
    or (type(skill.requiredItemName) == 'string' and skill.requiredItemName:len() > 0)
end

equippedItemMatchesSkillRequirement = function(item, skill)
  if not item or not skill then
    return false
  end

  local itemServerId = getItemServerId(item)
  for _, requiredItemId in ipairs(getSkillRequiredItemIds(skill)) do
    if itemServerId and itemServerId == requiredItemId then
      return true
    end
  end

  local itemClientId = getItemClientId(item)
  for _, requiredClientItemId in ipairs(getSkillRequiredClientItemIds(skill)) do
    if itemClientId and itemClientId == requiredClientItemId then
      return true
    end
  end

  local requiredItemName = tostring(skill.requiredItemName or ''):trim()
  if requiredItemName ~= '' then
    local itemName = normalizeToken(getItemDisplayName(item))
    local requiredName = normalizeToken(requiredItemName)
    if itemName:find(requiredName, 1, true) then
      return true
    end
  end

  local requiredWeaponType = getSkillRequiredWeaponType(skill)
  if requiredWeaponType ~= '' and itemMatchesRequiredWeaponType(item, requiredWeaponType) then
    return true
  end

  return false
end

local function getSkillAvailability(skill)
  if not skillRequiresEquippedWeapon(skill) then
    return true, 'Liberada'
  end

  local context = getEquippedWeaponContext()
  for _, entry in ipairs(getEquippedWeaponEntries(context)) do
    if entry.item and equippedItemMatchesSkillRequirement(entry.item, skill) then
      local availableReason = string.format('%s equipada na %s.', getItemDisplayName(entry.item), entry.handLabel)
      logFrozenArrowValidation(skill, 'availability', true, availableReason)
      return true, availableReason
    end
  end

  local player = g_game.getLocalPlayer()
  for _, entry in ipairs(getAllEquippedInventoryEntries(player)) do
    if entry.item and equippedItemMatchesSkillRequirement(entry.item, skill) then
      local availableReason = string.format('%s equipada no %s.', getItemDisplayName(entry.item), entry.handLabel)
      logFrozenArrowValidation(skill, 'availability', true, availableReason)
      return true, availableReason
    end
  end

  local requiredWeaponLabel = getSkillRequiredWeaponLabel(skill)
  if requiredWeaponLabel ~= '' then
    local unavailableReason = string.format('Requer %s equipado.', requiredWeaponLabel)
    logFrozenArrowValidation(skill, 'availability', false, unavailableReason)
    return false, unavailableReason
  end

  local fallbackReason = 'Requer a arma correta equipada.'
  logFrozenArrowValidation(skill, 'availability', false, fallbackReason)
  return false, fallbackReason
end

local function getSkillStatusLabel(skill)
  local available = getSkillAvailability(skill)
  if available then
    return 'Liberada'
  end

  return 'Indisponivel'
end

local function getChoiceStatusStyle(statusText)
  if normalizeText(statusText) == 'liberada' then
    return CHOICE_STATUS_STYLES.liberada
  end

  return CHOICE_STATUS_STYLES.indisponivel
end

local function shouldIgnoreDuplicateMouseDispatch(slotIndex, mouseButton)
  local now = g_clock.millis()
  if lastMouseDispatch.slotIndex == slotIndex
    and lastMouseDispatch.mouseButton == mouseButton
    and now - lastMouseDispatch.timestamp <= 50 then
    return true
  end

  lastMouseDispatch.slotIndex = slotIndex
  lastMouseDispatch.mouseButton = mouseButton
  lastMouseDispatch.timestamp = now
  return false
end

local function cloneTable(source)
  if type(source) ~= 'table' then
    return source
  end

  local clone = {}
  for key, value in pairs(source) do
    if type(value) == 'table' then
      clone[key] = cloneTable(value)
    else
      clone[key] = value
    end
  end
  return clone
end

local function getSlotCooldownState(slotIndex)
  if type(slotIndex) ~= 'number' then
    return nil
  end

  local state = slotCooldowns[slotIndex]
  if not state then
    state = {
      active = false,
      duration = 0,
      startTime = 0,
      endTime = 0,
      event = nil
    }
    slotCooldowns[slotIndex] = state
  end

  return state
end

local function clearSlotCooldownEvent(slotIndex)
  local state = slotCooldowns[slotIndex]
  if state and state.event then
    removeEvent(state.event)
    state.event = nil
  end
end

local function stopSlotCooldown(slotIndex)
  local state = getSlotCooldownState(slotIndex)
  if not state then
    return
  end

  clearSlotCooldownEvent(slotIndex)
  state.active = false
  state.duration = 0
  state.startTime = 0
  state.endTime = 0
end

local function getSlotCooldownRemaining(slotIndex)
  local state = slotCooldowns[slotIndex]
  if not state or not state.active then
    return 0
  end

  local remaining = state.endTime - g_clock.millis()
  if remaining <= 0 then
    stopSlotCooldown(slotIndex)
    return 0
  end

  return remaining
end

local function isSlotCooldownActive(slotIndex)
  return getSlotCooldownRemaining(slotIndex) > 0
end

local function formatCooldownSeconds(remainingMillis)
  if remainingMillis <= 0 then
    return ''
  end

  local remainingSeconds = math.ceil(remainingMillis / 1000)
  return tostring(remainingSeconds)
end

local function scheduleSlotCooldownUpdate(slotIndex)
  local state = slotCooldowns[slotIndex]
  if not state or not state.active then
    return
  end

  clearSlotCooldownEvent(slotIndex)
  state.event = scheduleEvent(function()
    local remaining = getSlotCooldownRemaining(slotIndex)
    if remaining <= 0 then
      updateSlotWidget(slotIndex)
      return
    end

    updateSlotWidget(slotIndex)
    scheduleSlotCooldownUpdate(slotIndex)
  end, 100)
end

local function startSlotCooldown(slotIndex, durationMillis)
  durationMillis = math.max(0, tonumber(durationMillis) or 0)
  if durationMillis <= 0 then
    stopSlotCooldown(slotIndex)
    updateSlotWidget(slotIndex)
    return
  end

  local state = getSlotCooldownState(slotIndex)
  local now = g_clock.millis()
  state.active = true
  state.duration = durationMillis
  state.startTime = now
  state.endTime = now + durationMillis
  updateSlotWidget(slotIndex)
  scheduleSlotCooldownUpdate(slotIndex)
end

local function getSlotCooldownDuration(slotData)
  if type(slotData) ~= 'table' then
    return 0
  end

  local spellInfo = getRawSpellInfo(slotData.name) or getRawSpellInfoByWords(slotData.words)
  if spellInfo and tonumber(spellInfo.exhaustion) and tonumber(spellInfo.exhaustion) > 0 then
    return tonumber(spellInfo.exhaustion)
  end

  return 0
end

local function findSlotsBySpellId(spellId)
  local matchingSlots = {}
  spellId = tonumber(spellId)
  if not spellId then
    return matchingSlots
  end

  for slotIndex = 1, SLOT_COUNT do
    local slotData = slotSettings[slotIndex]
    if slotData then
      local spellInfo = getRawSpellInfo(slotData.name) or getRawSpellInfoByWords(slotData.words)
      if spellInfo and tonumber(spellInfo.id) == spellId then
        table.insert(matchingSlots, slotIndex)
      end
    end
  end

  return matchingSlots
end

local function getRootWidget()
  return g_ui.getRootWidget()
end

local function getGameRootPanel()
  if modules.game_interface and modules.game_interface.getRootPanel then
    return modules.game_interface.getRootPanel()
  end
  return nil
end

local function getCharacterSettingsKey()
  local characterName = g_game.getCharacterName()
  if characterName and characterName:len() > 0 then
    return SETTINGS_PREFIX .. characterName
  end
  if activeCharacterName and activeCharacterName:len() > 0 then
    return SETTINGS_PREFIX .. activeCharacterName
  end
  return GLOBAL_SETTINGS_KEY
end

local function getSlotDisplayLabel(slotIndex)
  return SLOT_LABELS[slotIndex] or tostring(slotIndex)
end

local function getDefaultHotkeyForSlot(slotIndex)
  return ''
end

local function hasConfiguredHotkey(slotData)
  return type(slotData) == 'table'
    and slotData.hotkeyConfigured == true
    and sanitizeHotkey(slotData.hotkey) ~= ''
end

local function normalizeBarPosition(value)
  if type(value) == 'string' and value:len() > 0 then
    local ok, point = pcall(topoint, value)
    if ok then
      return normalizeBarPosition(point)
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

  return {
    x = math.floor(x),
    y = math.floor(y)
  }
end

local function cloneBarPosition(position)
  local normalized = normalizeBarPosition(position)
  if not normalized then
    return nil
  end

  return {
    x = normalized.x,
    y = normalized.y
  }
end

local function isSameBarPosition(first, second)
  local normalizedFirst = normalizeBarPosition(first)
  local normalizedSecond = normalizeBarPosition(second)

  if not normalizedFirst or not normalizedSecond then
    return normalizedFirst == normalizedSecond
  end

  return normalizedFirst.x == normalizedSecond.x and normalizedFirst.y == normalizedSecond.y
end

local function buildDefaultBarPosition(rootWidget)
  if not rootWidget then
    return nil
  end

  return {
    x = BAR_POSITION_X,
    y = math.max(0, rootWidget:getHeight() - BAR_POSITION_BOTTOM_OFFSET)
  }
end

local function clampBarPosition(position)
  local normalizedPosition = normalizeBarPosition(position)
  if not normalizedPosition or not customSkillBar then
    return normalizedPosition
  end

  local rootWidget = getRootWidget()
  if not rootWidget then
    return normalizedPosition
  end

  local maxX = math.max(0, rootWidget:getWidth() - customSkillBar:getWidth())
  local maxY = math.max(0, rootWidget:getHeight() - customSkillBar:getHeight())

  return {
    x = math.min(math.max(normalizedPosition.x, 0), maxX),
    y = math.min(math.max(normalizedPosition.y, 0), maxY)
  }
end

local function getPreferredBarPosition()
  local rootWidget = getRootWidget()
  if not rootWidget then
    return nil
  end

  return clampBarPosition(barPosition or buildDefaultBarPosition(rootWidget))
end

local function applyBarPosition(position)
  if not customSkillBar then
    return nil
  end

  local clampedPosition = clampBarPosition(position)
  if not clampedPosition then
    return nil
  end

  customSkillBar:setPosition(clampedPosition)
  customSkillBar:raise()
  return clampedPosition
end

local function persistBarPosition(position)
  local clampedPosition = clampBarPosition(position)
  if not clampedPosition then
    return
  end

  if isSameBarPosition(barPosition, clampedPosition) then
    return
  end

  barPosition = cloneBarPosition(clampedPosition)
  if saveSettings then
    saveSettings()
  end
end

local function buildFallbackSkill()
  return {
    name = TARGET_SKILL_NAME,
    words = 'fire tornado',
    icon = cloneTable(PLACEHOLDER_ICON),
    iconResolvedFrom = 'fallback',
    needWeapon = true,
    requiredItemId = 2189,
    requiredItemIds = {2189},
    requiredClientItemId = 3073,
    requiredClientItemIds = {3073},
    requiredItemName = 'Orbe Elemental',
    status = 'Liberada',
    description = 'Invoca um tornado de fogo que causa dano em area ao redor do conjurador.',
    type = 'Instantanea',
    group = 'Ataque',
    level = 30,
    mana = 80
  }
end

local function isTargetSkill(skillName)
  return normalizeText(skillName) == normalizeText(TARGET_SKILL_NAME)
end

local function logTargetSkillIcon(skillName, iconData, resolvedFrom, context)
  if not isTargetSkill(skillName) then
    return
  end

  local contextSuffix = context and string.format(' (%s)', context) or ''
  logInfo(string.format('Fire Tornado icon source: %s%s', tostring(iconData and iconData.source or '-'), contextSuffix))
  logInfo(string.format('Fire Tornado image clip: %s%s', tostring(iconData and iconData.clip or '-'), contextSuffix))
  logInfo(string.format('Fire Tornado icon resolved from: %s%s', tostring(resolvedFrom or '-'), contextSuffix))
end

local function ensureSkillIconLookup()
  if skillIconLookup then
    return
  end

  local lookup = {
    byName = {},
    byWords = {},
    byServerId = {}
  }

  if SpellIcons then
    for _, iconData in pairs(SpellIcons) do
      if type(iconData) == 'table' and iconData[1] and iconData[2] then
        lookup.byServerId[tonumber(iconData[2])] = tonumber(iconData[1])
      end
    end
  end

  if SpellInfo and SpellInfo.Default then
    for spellName, info in pairs(SpellInfo.Default) do
      local clientId = tonumber(info.icon)
      if not clientId and SpellIcons and SpellIcons[info.icon] then
        clientId = tonumber(SpellIcons[info.icon][1])
      end
      if not clientId and Spells and Spells.getClientId then
        local ok, resolvedClientId = pcall(Spells.getClientId, spellName)
        if ok then
          clientId = tonumber(resolvedClientId)
        end
      end

      if clientId then
        lookup.byName[normalizeText(spellName)] = clientId
        lookup.byWords[normalizeText(info.words)] = clientId
      end
    end
  end

  skillIconLookup = lookup
end

local function resolveSkillIconData(skillName, skillWords, spellInfo)
  ensureSkillIconLookup()

  local normalizedName = normalizeText(skillName)
  local normalizedWords = normalizeText(skillWords)
  local spellId = tonumber(spellInfo and spellInfo.id)
  local clientId = nil
  local resolvedFrom = 'fallback'

  if normalizedWords ~= '' and skillIconLookup.byWords[normalizedWords] then
    clientId = skillIconLookup.byWords[normalizedWords]
    resolvedFrom = 'painel'
  elseif normalizedName ~= '' and skillIconLookup.byName[normalizedName] then
    clientId = skillIconLookup.byName[normalizedName]
    resolvedFrom = 'painel'
  elseif spellId and skillIconLookup.byServerId[spellId] then
    clientId = skillIconLookup.byServerId[spellId]
    resolvedFrom = 'painel'
  end

  if clientId and SpelllistSettings and SpelllistSettings.Default and Spells and Spells.getImageClip then
    return {
      source = SpelllistSettings.Default.iconFile,
      clip = Spells.getImageClip(clientId, 'Default')
    }, resolvedFrom
  end

  if Spells and Spells.getClientId and SpelllistSettings and SpelllistSettings.Default and Spells.getImageClip then
    local ok, directClientId = pcall(Spells.getClientId, skillName)
    if ok then
      directClientId = tonumber(directClientId)
      if directClientId then
        return {
          source = SpelllistSettings.Default.iconFile,
          clip = Spells.getImageClip(directClientId, 'Default')
        }, 'gamelib'
      end
    end
  end

  return cloneTable(PLACEHOLDER_ICON), resolvedFrom
end

local function buildResolvedSkillIcon(skillName, skillWords)
  local spellInfo = getRawSpellInfo(skillName) or getRawSpellInfoByWords(skillWords)
  local iconData, resolvedFrom = resolveSkillIconData(skillName, skillWords, spellInfo)
  return iconData, resolvedFrom, spellInfo
end

local function applySkillIconToWidget(widget, iconData, skillName, resolvedFrom, context)
  if not widget then
    return
  end

  local resolvedIcon = iconData or PLACEHOLDER_ICON
  local imageWidget = widget.getChildById and widget:getChildById('image') or nil
  local targetWidget = imageWidget or widget
  targetWidget:setImageSource(resolvedIcon.source or PLACEHOLDER_ICON.source)
  targetWidget:setImageClip(resolvedIcon.clip or PLACEHOLDER_ICON.clip)
  logTargetSkillIcon(skillName, resolvedIcon, resolvedFrom, context)
end

local function ensureSkillCatalog()
  if skillCatalog then
    return
  end

  skillCatalog = {}
  skillCatalogByName = {}

  if SpellInfo and SpellInfo.Default then
    for skillName, spellInfo in pairs(SpellInfo.Default) do
      if type(spellInfo.words) == 'string' and spellInfo.words:len() > 0 then
        local resolvedIcon, resolvedFrom = buildResolvedSkillIcon(skillName, spellInfo.words)
        local skill = {
          name = skillName,
          words = spellInfo.words,
          icon = cloneTable(resolvedIcon),
          iconResolvedFrom = resolvedFrom,
          needWeapon = spellInfo.needWeapon == true,
          requiredItemId = spellInfo.requiredItemId,
          requiredItemIds = cloneTable(spellInfo.requiredItemIds),
          requiredClientItemId = spellInfo.requiredClientItemId,
          requiredClientItemIds = cloneTable(spellInfo.requiredClientItemIds),
          requiredItemName = spellInfo.requiredItemName or '',
          requiredWeaponType = spellInfo.requiredWeaponType or '',
          status = 'Liberada',
          description = spellInfo.description or '',
          type = getSkillTypeLabel(spellInfo.type or 'Instant'),
          group = getSkillGroupLabel(spellInfo.group),
          level = tonumber(spellInfo.level) or 0,
          mana = tonumber(spellInfo.mana) or spellInfo.mana or 0
        }

        if (not skill.group or skill.group:len() == 0 or skill.group == '-') and spellInfo.needTarget then
          skill.group = 'Ataque'
        end

        table.insert(skillCatalog, skill)
      end
    end
  end

  if #skillCatalog == 0 then
    local fallbackSkill = buildFallbackSkill()
    local resolvedIcon, resolvedFrom = buildResolvedSkillIcon(TARGET_SKILL_NAME, fallbackSkill.words)
    fallbackSkill.icon = resolvedIcon
    fallbackSkill.iconResolvedFrom = resolvedFrom
    table.insert(skillCatalog, fallbackSkill)
  end

  table.sort(skillCatalog, function(a, b)
    return normalizeText(a.name) < normalizeText(b.name)
  end)

  for _, skill in ipairs(skillCatalog) do
    skillCatalogByName[normalizeText(skill.name)] = skill
  end
end

local function findSkillByName(skillName)
  ensureSkillCatalog()
  return skillCatalogByName[normalizeText(skillName)]
end

local function filterSkills(searchText)
  ensureSkillCatalog()

  local normalizedSearch = normalizeText(searchText)
  if normalizedSearch:len() == 0 then
    return skillCatalog
  end

  local filtered = {}
  for _, skill in ipairs(skillCatalog) do
    local nameMatches = normalizeText(skill.name):find(normalizedSearch, 1, true) ~= nil
    local wordsMatches = normalizeText(skill.words):find(normalizedSearch, 1, true) ~= nil
    if nameMatches or wordsMatches then
      table.insert(filtered, skill)
    end
  end

  return filtered
end

local function buildStoredSlotData(skill, hotkey)
  local normalizedHotkey = sanitizeHotkey(hotkey)
  return {
    name = skill.name,
    words = skill.words,
    icon = cloneTable(skill.icon or PLACEHOLDER_ICON),
    iconResolvedFrom = skill.iconResolvedFrom or 'fallback',
    hotkey = normalizedHotkey,
    hotkeyConfigured = normalizedHotkey ~= '',
    needWeapon = skill.needWeapon == true,
    requiredItemId = skill.requiredItemId,
    requiredItemIds = cloneTable(skill.requiredItemIds),
    requiredClientItemId = skill.requiredClientItemId,
    requiredClientItemIds = cloneTable(skill.requiredClientItemIds),
    requiredItemName = skill.requiredItemName or '',
    requiredWeaponType = skill.requiredWeaponType or '',
    description = skill.description or '',
    type = skill.type or 'Spell',
    group = skill.group or ''
  }
end

local function serializeSlotData(slotData)
  if not slotData then
    return nil
  end

  return {
    name = slotData.name,
    words = slotData.words,
    icon = cloneTable(slotData.icon),
    iconResolvedFrom = slotData.iconResolvedFrom or 'fallback',
    hotkey = sanitizeHotkey(slotData.hotkey),
    hotkeyConfigured = slotData.hotkeyConfigured == true and sanitizeHotkey(slotData.hotkey) ~= '',
    needWeapon = slotData.needWeapon == true,
    requiredItemId = slotData.requiredItemId,
    requiredItemIds = cloneTable(slotData.requiredItemIds),
    requiredClientItemId = slotData.requiredClientItemId,
    requiredClientItemIds = cloneTable(slotData.requiredClientItemIds),
    requiredItemName = slotData.requiredItemName or '',
    requiredWeaponType = slotData.requiredWeaponType or '',
    description = slotData.description or '',
    type = slotData.type or 'Spell',
    group = slotData.group or ''
  }
end

local function normalizeStoredSlotData(slotData, slotIndex)
  if type(slotData) ~= 'table' then
    return nil
  end

  if type(slotData.name) ~= 'string' or type(slotData.words) ~= 'string' then
    return nil
  end

  local normalizedHotkey = sanitizeHotkey(slotData.hotkey)
  local hotkeyConfigured = slotData.hotkeyConfigured == true and normalizedHotkey ~= ''
  if slotData.hotkeyConfigured == nil then
    hotkeyConfigured = normalizedHotkey ~= '' and normalizedHotkey ~= sanitizeHotkey(getSlotDisplayLabel(slotIndex))
  end

  local normalizedSlotData = {
    name = slotData.name,
    words = slotData.words,
    icon = cloneTable(slotData.icon or PLACEHOLDER_ICON),
    iconResolvedFrom = slotData.iconResolvedFrom or 'fallback',
    hotkey = hotkeyConfigured and normalizedHotkey or '',
    hotkeyConfigured = hotkeyConfigured,
    needWeapon = slotData.needWeapon == true,
    requiredItemId = slotData.requiredItemId,
    requiredItemIds = cloneTable(slotData.requiredItemIds),
    requiredClientItemId = slotData.requiredClientItemId,
    requiredClientItemIds = cloneTable(slotData.requiredClientItemIds),
    requiredItemName = slotData.requiredItemName or '',
    requiredWeaponType = slotData.requiredWeaponType or '',
    description = slotData.description or '',
    type = slotData.type or 'Spell',
    group = slotData.group or ''
  }

  local resolvedIcon, resolvedFrom, spellInfo = buildResolvedSkillIcon(normalizedSlotData.name, normalizedSlotData.words)
  normalizedSlotData.icon = resolvedIcon
  normalizedSlotData.iconResolvedFrom = resolvedFrom
  normalizedSlotData.needWeapon = normalizedSlotData.needWeapon or (spellInfo and spellInfo.needWeapon == true) or false
  normalizedSlotData.requiredItemId = normalizedSlotData.requiredItemId or (spellInfo and spellInfo.requiredItemId) or nil
  normalizedSlotData.requiredItemIds = normalizedSlotData.requiredItemIds or cloneTable(spellInfo and spellInfo.requiredItemIds)
  normalizedSlotData.requiredClientItemId = normalizedSlotData.requiredClientItemId or (spellInfo and spellInfo.requiredClientItemId) or nil
  normalizedSlotData.requiredClientItemIds = normalizedSlotData.requiredClientItemIds or cloneTable(spellInfo and spellInfo.requiredClientItemIds)
  if normalizedSlotData.requiredItemName == '' and spellInfo and spellInfo.requiredItemName then
    normalizedSlotData.requiredItemName = spellInfo.requiredItemName
  end
  if normalizedSlotData.requiredWeaponType == '' and spellInfo and spellInfo.requiredWeaponType then
    normalizedSlotData.requiredWeaponType = spellInfo.requiredWeaponType
  end

  return normalizedSlotData
end

local function buildEmptySlotTooltip(slotIndex)
  return string.format(
    'Slot %s\nBotao direito: Escolher Skill',
    getSlotDisplayLabel(slotIndex)
  )
end

local function buildSlotTooltip(slotData)
  local hotkeyText = hasConfiguredHotkey(slotData) and sanitizeHotkey(slotData.hotkey) or '-'
  local requiredItemText = getSkillRequiredWeaponLabel(slotData)
  if requiredItemText == '' then
    requiredItemText = '-'
  end
  local available, availabilityDetail = getSkillAvailability(slotData)
  local statusText = available and 'Liberada' or 'Indisponivel'

  return string.format(
    '%s\n%s\nTecla: %s\nArma: %s\nStatus: %s\n%s',
    slotData.name,
    slotData.words,
    hotkeyText,
    requiredItemText,
    statusText,
    availabilityDetail or ''
  )
end

local function getSlotHotkeyBadgeText(slotIndex, slotData)
  if not hasConfiguredHotkey(slotData) then
    return ''
  end

  return sanitizeHotkey(slotData.hotkey)
end

local function getSlotPrimaryLabel(slotIndex, slotData)
  if hasConfiguredHotkey(slotData) then
    return sanitizeHotkey(slotData.hotkey)
  end

  return ''
end

updateSlotWidget = function(slotIndex)
  local slotWidget = slotWidgets[slotIndex]
  if not slotWidget then
    return
  end

  local slotData = slotSettings[slotIndex]
  local slotLabel = getSlotPrimaryLabel(slotIndex, slotData)
  local hotkeyBadgeText = getSlotHotkeyBadgeText(slotIndex, slotData)
  local cooldownRemaining = getSlotCooldownRemaining(slotIndex)
  local cooldownActive = cooldownRemaining > 0

  if slotWidget.slotNumberLabel then
    slotWidget.slotNumberLabel:setText(slotLabel)
  end

  if slotWidget.hotkeyLabelWidget then
    slotWidget.hotkeyLabelWidget:setText(hotkeyBadgeText)
    slotWidget.hotkeyLabelWidget:hide()
  end

  if slotData then
    slotWidget:setTooltip(buildSlotTooltip(slotData))
    local available = getSkillAvailability(slotData)
    if cooldownActive then
      slotWidget:setBackgroundColor(available and '#11161b' or '#101317')
    else
      slotWidget:setBackgroundColor(available and '#1a1f25' or '#14181c')
    end
    slotWidget:setBorderColor(available and '#627080' or '#313740')
    if slotWidget.iconWidget and available then
      applySkillIconToWidget(slotWidget.iconWidget, slotData.icon, slotData.name, slotData.iconResolvedFrom, 'slot')
      slotWidget.iconWidget:show()
    elseif slotWidget.iconWidget then
      slotWidget.iconWidget:hide()
    end
  else
    slotWidget:setTooltip(buildEmptySlotTooltip(slotIndex))
    slotWidget:setBackgroundColor('#14181c')
    slotWidget:setBorderColor('#2f343b')
    if slotWidget.iconWidget then
      slotWidget.iconWidget:hide()
    end
  end

  if slotWidget.cooldownLabel then
    if cooldownActive then
      slotWidget.cooldownLabel:setText(formatCooldownSeconds(cooldownRemaining))
      slotWidget.cooldownLabel:show()
      slotWidget.cooldownLabel:raise()
    else
      slotWidget.cooldownLabel:hide()
    end
  end

end

local function refreshSlotWidgets()
  for slotIndex = 1, SLOT_COUNT do
    updateSlotWidget(slotIndex)
  end
end

saveSettings = function()
  logInfo('save slots')
  local payload = {
    slots = {}
  }

  for slotIndex = 1, SLOT_COUNT do
    local slotData = serializeSlotData(slotSettings[slotIndex])
    if slotData then
      payload.slots[tostring(slotIndex)] = slotData
    end
  end

  if barPosition then
    payload.position = pointtostring(barPosition)
  end

  g_settings.setNode(getCharacterSettingsKey(), payload)
  if g_settings.save then
    g_settings.save()
  end
end

local function removeDuplicateLoadedHotkeys()
  local usedHotkeys = {}
  local changed = false

  for slotIndex = 1, SLOT_COUNT do
    local slotData = slotSettings[slotIndex]
    local hotkey = hasConfiguredHotkey(slotData) and sanitizeHotkey(slotData.hotkey) or ''

    if hotkey ~= '' then
      if usedHotkeys[hotkey] then
        slotData.hotkey = ''
        slotData.hotkeyConfigured = false
        changed = true
        logError(string.format('duplicate hotkey removed from slot %s: %s', getSlotDisplayLabel(slotIndex), hotkey))
      else
        usedHotkeys[hotkey] = true
      end
    end
  end

  if changed then
    saveSettings()
  end
end

local function loadSettings()
  logInfo('load slots')
  slotSettings = {}
  local settingsNode = g_settings.getNode(getCharacterSettingsKey()) or {}
  local savedSlots = settingsNode.slots or {}
  barPosition = normalizeBarPosition(settingsNode.position)

  for slotIndex = 1, SLOT_COUNT do
    local savedSlot = savedSlots[tostring(slotIndex)] or savedSlots[slotIndex]
    slotSettings[slotIndex] = normalizeStoredSlotData(savedSlot, slotIndex)
  end

  removeDuplicateLoadedHotkeys()
  refreshSlotWidgets()
end

local function unbindAllHotkeys()
  local gameRootPanel = getGameRootPanel()
  if not gameRootPanel then
    hotkeyCallbacks = {}
    return
  end

  for hotkey, callback in pairs(hotkeyCallbacks) do
    g_keyboard.unbindKeyPress(hotkey, callback, gameRootPanel)
  end

  hotkeyCallbacks = {}
end

local function getDeepFocusedWidget()
  local currentWidget = getRootWidget()
  if not currentWidget then
    return nil
  end

  local nextWidget = nil
  local okGetFocusedChild, focusedChild = pcall(function()
    return currentWidget:getFocusedChild()
  end)

  if not okGetFocusedChild then
    return nil
  end

  nextWidget = focusedChild
  while nextWidget do
    currentWidget = nextWidget
    local okNext, nestedChild = pcall(function()
      return currentWidget:getFocusedChild()
    end)

    if not okNext then
      break
    end

    nextWidget = nestedChild
  end

  if currentWidget == getRootWidget() then
    return nil
  end

  return currentWidget
end

local function isFocusedTextInput(widget, hotkey)
  while widget do
    local className = ''
    local okClassName, value = pcall(function()
      return widget:getClassName()
    end)

    if okClassName and type(value) == 'string' then
      className = value:lower()
      if className:find('textedit', 1, true) or className:find('spinbox', 1, true) then
        local isVisible = true
        local okVisible, visibleValue = pcall(function()
          return widget:isVisible()
        end)
        if okVisible then
          isVisible = visibleValue
        end

        if isVisible then
          local okId, widgetId = pcall(function()
            return widget:getId()
          end)

          if okId and widgetId == 'consoleTextEdit' and not isTextHotkey(hotkey) then
            return false
          end

          return true
        end
      end
    end

    local okParent, parentWidget = pcall(function()
      return widget:getParent()
    end)

    if not okParent then
      break
    end

    widget = parentWidget
  end

  return false
end

local function shouldBlockHotkeyCast(hotkey)
  if choiceWindow and choiceWindow:isVisible() then
    return true
  end

  if modules.game_console and modules.game_console.isChatEnabled and modules.game_console.isChatEnabled() and isTextHotkey(hotkey) then
    return true
  end

  return isFocusedTextInput(getDeepFocusedWidget(), hotkey)
end

local function doCastSlot(slotIndex, source, hotkey)
  if not g_game.isOnline() then
    return false
  end

  local slotData = slotSettings[slotIndex]
  if not slotData or not slotData.words or slotData.words:len() == 0 then
    return false
  end

  if source == 'hotkey' and shouldBlockHotkeyCast(hotkey or slotData.hotkey) then
    return false
  end

  if isSlotCooldownActive(slotIndex) then
    return false
  end

  local available, availabilityDetail = getSkillAvailability(slotData)
  if not available then
    if modules.game_textmessage and modules.game_textmessage.displayFailureMessage then
      modules.game_textmessage.displayFailureMessage(availabilityDetail or 'Esta skill nao esta disponivel com a arma atual.')
    end
    return false
  end

  g_game.talk(slotData.words)
  local cooldownDuration = getSlotCooldownDuration(slotData)
  if cooldownDuration > 0 then
    startSlotCooldown(slotIndex, cooldownDuration)
  end
  logInfo(string.format('cast slot %s: %s', getSlotDisplayLabel(slotIndex), slotData.words))
  return true
end

function castSlot(slotIndex)
  return doCastSlot(slotIndex, 'api')
end

local function bindSlotHotkey(slotIndex, hotkey)
  local gameRootPanel = getGameRootPanel()
  if not gameRootPanel then
    return
  end

  hotkeyCallbacks[hotkey] = function()
    local slotData = slotSettings[slotIndex]
    if slotData and slotData.words and slotData.words:len() > 0 then
      logInfo(string.format('hotkey cast: %s / %s', hotkey, slotData.words))
    end
    doCastSlot(slotIndex, 'hotkey', hotkey)
  end

  g_keyboard.bindKeyPress(hotkey, hotkeyCallbacks[hotkey], gameRootPanel)
end

local function rebindHotkeys()
  unbindAllHotkeys()

  if not g_game.isOnline() then
    return
  end

  for slotIndex = 1, SLOT_COUNT do
    local slotData = slotSettings[slotIndex]
    local hotkey = hasConfiguredHotkey(slotData) and sanitizeHotkey(slotData.hotkey) or ''

    if hotkey ~= '' then
      bindSlotHotkey(slotIndex, hotkey)
    end
  end
end

function rebuildHotkeys()
  rebindHotkeys()
end

local function findHotkeyOwner(hotkey, ignoredSlotIndex)
  local normalizedHotkey = sanitizeHotkey(hotkey)
  if normalizedHotkey == '' then
    return nil
  end

  for slotIndex = 1, SLOT_COUNT do
    if slotIndex ~= ignoredSlotIndex then
      local slotData = slotSettings[slotIndex]
      if slotData and sanitizeHotkey(slotData.hotkey) == normalizedHotkey then
        return slotIndex
      end
    end
  end

  return nil
end

local function findSlotAtPosition(mousePos)
  if not mousePos then
    return nil, nil
  end

  for slotIndex = 1, SLOT_COUNT do
    local slotWidget = slotWidgets[slotIndex]
    if slotWidget and slotWidget:isVisible() and slotWidget:containsPoint(mousePos) then
      return slotIndex, slotWidget
    end
  end

  return nil, nil
end

local function updateHoveredSlot(mousePos)
  local slotIndex = nil
  slotIndex = select(1, findSlotAtPosition(mousePos))

  if slotIndex ~= hoveredSlotIndex then
    hoveredSlotIndex = slotIndex
    if slotIndex then
      logInfo(string.format('hover slot %s', getSlotDisplayLabel(slotIndex)))
    end
  end
end

local function handleSlotMouseRelease(slotIndex, mousePos, mouseButton, source)
  if not slotIndex then
    return false
  end

  if shouldIgnoreDuplicateMouseDispatch(slotIndex, mouseButton) then
    return true
  end

  logInfo(string.format('slot click %s button %s', getSlotDisplayLabel(slotIndex), tostring(mouseButton)))
  logInfo(string.format('mouse release slot %s button: %s', getSlotDisplayLabel(slotIndex), tostring(mouseButton)))

  if mouseButton == MouseRightButton then
    if modules.game_textmessage and modules.game_textmessage.displayStatusMessage then
      modules.game_textmessage.displayStatusMessage('SLOT RIGHT CLICK ' .. getSlotDisplayLabel(slotIndex))
    end
    logInfo(string.format('right click slot %s', getSlotDisplayLabel(slotIndex)))
    openSkillChooser(slotIndex)
    return true
  end

  if mouseButton == MouseLeftButton then
    if modules.game_textmessage and modules.game_textmessage.displayStatusMessage then
      modules.game_textmessage.displayStatusMessage('SLOT LEFT CLICK ' .. getSlotDisplayLabel(slotIndex))
    end
    logInfo(string.format('left click slot %s', getSlotDisplayLabel(slotIndex)))
    doCastSlot(slotIndex, source or 'click')
    return true
  end

  return false
end

local function schedulePositionBar()
  if positionEvent then
    removeEvent(positionEvent)
    positionEvent = nil
  end

  positionEvent = scheduleEvent(function()
    positionEvent = nil
    if not customSkillBar then
      return
    end

    local rootWidget = getRootWidget()
    if not rootWidget then
      return
    end

    local position = getPreferredBarPosition()
    local appliedPosition = applyBarPosition(position)
    if barPosition and appliedPosition and not isSameBarPosition(barPosition, appliedPosition) then
      barPosition = cloneBarPosition(appliedPosition)
      saveSettings()
    end
  end, POSITION_RETRY_DELAY)
end

local function onBarDragEnter(widget, mousePos)
  if not customSkillBar then
    return false
  end

  customSkillBar:breakAnchors()
  local currentPosition = customSkillBar:getPosition()
  widget.movingReference = {
    x = mousePos.x - currentPosition.x,
    y = mousePos.y - currentPosition.y
  }
  return true
end

local function onBarDragMove(widget, mousePos, mouseMoved)
  if not customSkillBar or not widget.movingReference then
    return false
  end

  local position = {
    x = mousePos.x - widget.movingReference.x,
    y = mousePos.y - widget.movingReference.y
  }
  applyBarPosition(position)
  return true
end

local function onBarDragLeave(widget, droppedWidget, mousePos)
  if not customSkillBar then
    return false
  end

  local currentPosition = applyBarPosition(customSkillBar:getPosition())
  widget.movingReference = nil
  if currentPosition then
    persistBarPosition(currentPosition)
  end
  return true
end

local function showBar()
  if not customSkillBar or not g_game.isOnline() then
    return
  end

  customSkillBar:show()
  customSkillBar:raise()
  if slotsPanelWidget then
    slotsPanelWidget:raise()
  end
  if testButton then
    testButton:raise()
  end
  for slotIndex = 1, SLOT_COUNT do
    local slotWidget = slotWidgets[slotIndex]
    if slotWidget then
      slotWidget:raise()
    end
  end
  schedulePositionBar()
  logInfo('showBar')
end

local function clearChoiceState()
  choiceWidgets = {}
  choiceState.slotIndex = nil
  choiceState.selectedSkillName = nil
  choiceState.searchText = ''
end

function closeChoiceWindow()
  if choiceWindow then
    choiceWindow:destroy()
    choiceWindow = nil
  end
end

local function hideBar()
  closeChoiceWindow()

  if customSkillBar and customSkillBar:isVisible() then
    customSkillBar:hide()
    logInfo('hideBar')
  end
end

local function centerWindow(window)
  local rootWidget = getRootWidget()
  if not rootWidget then
    return
  end

  local position = {
    x = math.max(0, math.floor((rootWidget:getWidth() - window:getWidth()) / 2)),
    y = math.max(0, math.floor((rootWidget:getHeight() - window:getHeight()) / 2))
  }

  window:setPosition(position)
end

local function applyChoiceStatusStyle(widget, statusText)
  if not widget then
    return
  end

  local style = getChoiceStatusStyle(statusText)
  widget:setText(style.label)
  widget:setBackgroundColor(style.background)
  widget:setBorderColor(style.border)
  widget:setColor(style.text)
end

local function updateChoiceDetailPanel(skill)
  local icon = skill and skill.icon or PLACEHOLDER_ICON
  local words = skill and skill.words or '-'
  local typeText = skill and tostring(skill.type or '') or ''
  local groupText = skill and tostring(skill.group or '') or ''
  local requiredItemText = skill and getSkillRequiredWeaponLabel(skill) or ''
  local descriptionText = skill and tostring(skill.description or '') or ''

  if words == '' then
    words = '-'
  end

  if typeText == '' then
    typeText = '-'
  end

  if groupText == '' then
    groupText = '-'
  end

  if requiredItemText == '' then
    requiredItemText = 'Nenhuma'
  end

  if descriptionText == '' then
    descriptionText = skill and 'Sem descricao disponivel.' or 'Selecione uma skill na lista para ver os detalhes.'
  end

  applySkillIconToWidget(choiceWidgets.detailIcon, icon, skill and skill.name or nil, skill and skill.iconResolvedFrom or 'fallback', 'chooser-detail')

  if choiceWidgets.detailName then
    choiceWidgets.detailName:setText(skill and skill.name or 'Selecione uma skill')
  end

  if choiceWidgets.detailWords then
    choiceWidgets.detailWords:setText(words)
  end

  if choiceWidgets.detailTypeValue then
    choiceWidgets.detailTypeValue:setText(typeText)
  end

  if choiceWidgets.detailGroupValue then
    choiceWidgets.detailGroupValue:setText(groupText)
  end

  if choiceWidgets.detailRequiredItemValue then
    choiceWidgets.detailRequiredItemValue:setText(requiredItemText)
  end

  if choiceWidgets.detailDescriptionValue then
    choiceWidgets.detailDescriptionValue:setText(descriptionText)
  end

  if skill and isFrozenArrowSkill(skill) then
    local available, detail = getSkillAvailability(skill)
    logFrozenArrowValidation(skill, 'selection', available, detail)
  end

  applyChoiceStatusStyle(choiceWidgets.detailStatusLabel, skill and getSkillStatusLabel(skill) or 'Indisponivel')
end

local function formatChoiceResultLabel(skillCount, searchText)
  local label = string.format('%d skill%s', skillCount, skillCount == 1 and '' or 's')
  if searchText and searchText:len() > 0 then
    label = string.format('%s | Busca "%s"', label, searchText)
  end
  return label
end

local function setChoiceSelection(skillName)
  choiceState.selectedSkillName = skillName
  local selectedSkill = findSkillByName(skillName)
  updateChoiceDetailPanel(selectedSkill)

  if choiceWidgets.selectButton then
    if selectedSkill then
      choiceWidgets.selectButton:enable()
    else
      choiceWidgets.selectButton:disable()
    end
  end

  if not choiceWidgets.skillList then
    return
  end

  for _, child in ipairs(choiceWidgets.skillList:getChildren()) do
    if child.skillData then
      child:setChecked(child.skillData.name == skillName)
    end
  end
end

local function createChoiceEntry(parent, skill)
  local entry = g_ui.createWidget('CustomSkillChoiceEntry', parent)
  entry.skillData = skill
  entry:setHeight(72)
  entry:setChecked(false)
  entry.nameLabel:setText(skill.name)
  entry.wordsLabel:setText(skill.words)
  local requiredWeaponLabel = getSkillRequiredWeaponLabel(skill)
  entry.metaLabel:setText(string.format('Arma: %s', requiredWeaponLabel ~= '' and requiredWeaponLabel or '-'))
  applyChoiceStatusStyle(entry.statusLabel, getSkillStatusLabel(skill))
  applySkillIconToWidget(entry.icon, skill.icon, skill.name, skill.iconResolvedFrom, 'chooser-card')
  entry:setTooltip(string.format('%s\n%s\nArma: %s', skill.name, skill.words, requiredWeaponLabel ~= '' and requiredWeaponLabel or '-'))

  entry.onMousePress = function(widget, mousePos, mouseButton)
    return mouseButton == MouseLeftButton
  end

  entry.onMouseRelease = function(widget, mousePos, mouseButton)
    if mouseButton ~= MouseLeftButton then
      return false
    end

    setChoiceSelection(widget.skillData.name)
    return true
  end

  entry.onDoubleClick = function(widget)
    setChoiceSelection(widget.skillData.name)
    modules.game_custom_skillbar.confirmChoiceSelection()
    return true
  end

  entry.onTouchRelease = function(widget)
    setChoiceSelection(widget.skillData.name)
    return true
  end

  return entry
end

local function refreshChoiceEntries()
  if not choiceWindow or not choiceWidgets.skillList then
    return
  end

  local filteredSkills = {}
  for _, skill in ipairs(filterSkills(choiceState.searchText)) do
    table.insert(filteredSkills, skill)
  end
  choiceWidgets.skillList:destroyChildren()

  local firstSkillName = nil
  local selectedVisible = false

  for _, skill in ipairs(filteredSkills) do
    local entry = createChoiceEntry(choiceWidgets.skillList, skill)
    if not firstSkillName then
      firstSkillName = skill.name
    end
    if choiceState.selectedSkillName == skill.name then
      entry:setChecked(true)
      selectedVisible = true
    end
  end

  if choiceWidgets.resultLabel then
    choiceWidgets.resultLabel:setText(formatChoiceResultLabel(#filteredSkills, choiceState.searchText))
  end

  if not selectedVisible then
    setChoiceSelection(firstSkillName)
  else
    setChoiceSelection(choiceState.selectedSkillName)
  end

  if #filteredSkills == 0 then
    setChoiceSelection(nil)
    local emptyLabel = g_ui.createWidget('CustomSkillChoiceEmpty', choiceWidgets.skillList)
    emptyLabel:setText('Nenhuma skill encontrada.')
  end
end

local function fillHotkeyOptions(comboBox, currentHotkey)
  comboBox:clearOptions()

  for _, option in ipairs(HOTKEY_OPTIONS) do
    comboBox:addOption(option.text, option.value)
  end

  comboBox:setCurrentOptionByData(sanitizeHotkey(currentHotkey), true)
  if not comboBox:getCurrentOption() then
    comboBox:setCurrentIndex(1, true)
  end
end

local function cacheChoiceWidgets()
  choiceWidgets.slotLabel = choiceWindow:recursiveGetChildById('slotLabel')
  choiceWidgets.searchInput = choiceWindow:recursiveGetChildById('searchInput')
  choiceWidgets.resultLabel = choiceWindow:recursiveGetChildById('resultLabel')
  choiceWidgets.skillList = choiceWindow:recursiveGetChildById('skillList')
  choiceWidgets.hotkeyCombo = choiceWindow:recursiveGetChildById('hotkeyCombo')
  choiceWidgets.selectButton = choiceWindow:recursiveGetChildById('selectButton')
  choiceWidgets.clearButton = choiceWindow:recursiveGetChildById('clearButton')
  choiceWidgets.detailIcon = choiceWindow:recursiveGetChildById('detailIcon')
  choiceWidgets.detailName = choiceWindow:recursiveGetChildById('detailName')
  choiceWidgets.detailWords = choiceWindow:recursiveGetChildById('detailWords')
  choiceWidgets.detailStatusLabel = choiceWindow:recursiveGetChildById('detailStatusLabel')
  choiceWidgets.detailTypeValue = choiceWindow:recursiveGetChildById('detailTypeValue')
  choiceWidgets.detailGroupValue = choiceWindow:recursiveGetChildById('detailGroupValue')
  choiceWidgets.detailRequiredItemValue = choiceWindow:recursiveGetChildById('detailRequiredItemValue')
  choiceWidgets.detailDescriptionValue = choiceWindow:recursiveGetChildById('detailDescriptionValue')
end

local function getSelectedChoiceHotkey()
  if not choiceWidgets.hotkeyCombo then
    return ''
  end

  local option = choiceWidgets.hotkeyCombo:getCurrentOption()
  if not option then
    return ''
  end

  return sanitizeHotkey(option.data or option.text)
end

local function setSlotData(slotIndex, slotData)
  slotSettings[slotIndex] = slotData
  saveSettings()
  refreshSlotWidgets()
  rebindHotkeys()
end

function setSlotSkill(slotIndex, skill, hotkey)
  if type(slotIndex) ~= 'number' or slotIndex < 1 or slotIndex > SLOT_COUNT then
    logError('invalid slot index while setting skill')
    return false
  end

  if not skill or type(skill) ~= 'table' then
    logError('invalid skill payload while setting slot')
    return false
  end

  local normalizedHotkey = sanitizeHotkey(hotkey)
  if normalizedHotkey ~= '' and findHotkeyOwner(normalizedHotkey, slotIndex) then
    modules.game_textmessage.displayFailureMessage('Esta tecla ja esta em uso em outro slot.')
    logError('hotkey already in use in another slot')
    return false
  end

  local slotData = buildStoredSlotData(skill, normalizedHotkey)
  setSlotData(slotIndex, slotData)
  logInfo(string.format('set slot %s: %s / %s / %s', getSlotDisplayLabel(slotIndex), slotData.name, slotData.words, slotData.hotkey ~= '' and slotData.hotkey or '-'))
  return true
end

local function clearSlot(slotIndex)
  if slotSettings[slotIndex] then
    logInfo(string.format('clear slot %s', getSlotDisplayLabel(slotIndex)))
  end

  slotSettings[slotIndex] = nil
  saveSettings()
  refreshSlotWidgets()
  rebindHotkeys()
end

function onClearChoiceButtonClick()
  if not choiceState.slotIndex then
    return
  end

  clearSlot(choiceState.slotIndex)
  closeChoiceWindow()
end

function confirmChoiceSelection()
  if not choiceState.slotIndex then
    logError('chooser confirm without slot index')
    return
  end

  local selectedSkill = findSkillByName(choiceState.selectedSkillName)
  if not selectedSkill then
    modules.game_textmessage.displayFailureMessage('Selecione uma skill.')
    logError('selected skill not found in chooser')
    return
  end

  logInfo(string.format('selected skill: %s', selectedSkill.name))

  local hotkey = getSelectedChoiceHotkey()
  if not setSlotSkill(choiceState.slotIndex, selectedSkill, hotkey) then
    return
  end

  closeChoiceWindow()
end

function onChoiceSearchTextChange(widget)
  if not widget then
    return
  end

  local nextSearchText = widget:getText() or ''
  if choiceState.searchText == nextSearchText then
    return
  end

  choiceState.searchText = nextSearchText
  refreshChoiceEntries()
end

local function buildChoiceWindow(slotIndex, currentSlotData, preferredSkillName)
  choiceWidgets = {}

  choiceWindow = g_ui.createWidget('CustomSkillChoiceWindow', getRootWidget())
  if not choiceWindow then
    logError('chooser create failed: CustomSkillChoiceWindow unavailable')
    clearChoiceState()
    return nil
  end

  choiceWindow.onDestroy = function()
    choiceWindow = nil
    clearChoiceState()
  end
  choiceWindow.onEscape = closeChoiceWindow
  cacheChoiceWidgets()

  if choiceWidgets.slotLabel then
    choiceWidgets.slotLabel:setText(string.format('Slot %s', getSlotDisplayLabel(slotIndex)))
  end

  if choiceWidgets.hotkeyCombo then
    local currentHotkey = hasConfiguredHotkey(currentSlotData) and currentSlotData.hotkey or getDefaultHotkeyForSlot(slotIndex)
    fillHotkeyOptions(choiceWidgets.hotkeyCombo, currentHotkey)
  end

  if choiceWidgets.clearButton then
    if currentSlotData then
      choiceWidgets.clearButton:enable()
    else
      choiceWidgets.clearButton:disable()
    end
  end

  local selectedSkill = nil
  if currentSlotData and currentSlotData.name and currentSlotData.name:len() > 0 then
    selectedSkill = findSkillByName(currentSlotData.name)
  end
  if not selectedSkill and preferredSkillName and preferredSkillName:len() > 0 then
    selectedSkill = findSkillByName(preferredSkillName)
  end
  if not selectedSkill then
    ensureSkillCatalog()
    selectedSkill = skillCatalog[1] or buildFallbackSkill()
  end

  choiceState.selectedSkillName = selectedSkill and selectedSkill.name or nil
  updateChoiceDetailPanel(selectedSkill)
  refreshChoiceEntries()

  return choiceWindow
end

local function openChoiceWindow(slotIndex, preferredSkillName)
  closeChoiceWindow()

  choiceState.slotIndex = slotIndex
  choiceState.searchText = ''

  local currentSlotData = slotSettings[slotIndex]
  logInfo(string.format('openSkillChooser called slot %s', getSlotDisplayLabel(slotIndex)))

  local okCreate, createdWindow = pcall(function()
    return buildChoiceWindow(slotIndex, currentSlotData, preferredSkillName)
  end)
  if not okCreate or not createdWindow then
    local errorMessage = tostring(createdWindow)
    logError('openSkillChooser ERROR: ' .. errorMessage)
    showChooserMessage('Erro ao abrir Escolher Skill: ' .. errorMessage)
    clearChoiceState()
    return
  end

  logInfo('chooser window created')
  choiceWindow:show()
  choiceWindow:raise()
  centerWindow(choiceWindow)
  choiceWindow:focus()
  if choiceWidgets.searchInput then
    choiceWidgets.searchInput:focus()
  elseif choiceWidgets.hotkeyCombo then
    choiceWidgets.hotkeyCombo:focus()
  end
end

function openSkillChooser(slotIndex)
  local ok, err = pcall(function()
    openChoiceWindow(slotIndex)
  end)
  if not ok then
    logError('openSkillChooser ERROR: ' .. tostring(err))
    showChooserMessage('Erro ao abrir Escolher Skill: ' .. tostring(err))
  end
end

local function findFirstEmptySlotIndex()
  for slotIndex = 1, SLOT_COUNT do
    if not slotSettings[slotIndex] then
      return slotIndex
    end
  end

  return 1
end

function openSkillChooserForSkill(skillOrName, preferredSlotIndex)
  local skillName = nil
  if type(skillOrName) == 'table' then
    skillName = skillOrName.name
  elseif type(skillOrName) == 'string' then
    skillName = skillOrName
  end

  local slotIndex = tonumber(preferredSlotIndex) or findFirstEmptySlotIndex()
  local ok, err = pcall(function()
    openChoiceWindow(slotIndex, skillName)
  end)
  if not ok then
    logError('openSkillChooserForSkill ERROR: ' .. tostring(err))
    showChooserMessage('Erro ao abrir Escolher Skill: ' .. tostring(err))
  end
end

local function createSlotButton(slotIndex, parentWidget)
  local slotWidget = g_ui.createWidget('CustomSkillBarSlot', parentWidget or slotsPanelWidget or customSkillBar)
  slotWidget.slotIndex = slotIndex
  slotWidget.iconWidget = slotWidget:getChildById('icon')
  slotWidget.slotNumberLabel = slotWidget:getChildById('slotNumber')
  slotWidget.hotkeyLabelWidget = slotWidget:getChildById('hotkeyLabel')
  slotWidget.cooldownLabel = slotWidget:getChildById('cooldownLabel')
  if slotWidget.slotNumberLabel then
    slotWidget.slotNumberLabel:setText(getSlotDisplayLabel(slotIndex))
  end
  if slotWidget.iconWidget then
    slotWidget.iconWidget:hide()
  end
  if slotWidget.cooldownLabel then
    slotWidget.cooldownLabel:hide()
  end
  slotWidget:setPhantom(false)
  slotWidget:setFocusable(false)
  slotWidget.onMousePress = function(widget, mousePos, mouseButton)
    return widget:containsPoint(mousePos) and (mouseButton == MouseLeftButton or mouseButton == MouseRightButton)
  end
  slotWidget.onMouseRelease = function(widget, mousePos, mouseButton)
    if not widget:containsPoint(mousePos) then
      return false
    end
    return handleSlotMouseRelease(widget.slotIndex, mousePos, mouseButton, 'slot')
  end
  slotWidget.onTouchRelease = function(widget)
    return handleSlotMouseRelease(widget.slotIndex, nil, MouseLeftButton, 'touch')
  end
  slotWidgets[slotIndex] = slotWidget
  logInfo(string.format('created slot %s', getSlotDisplayLabel(slotIndex)))
  return slotWidget
end

local function createSlots()
  slotsPanelWidget = customSkillBar:getChildById('slotsPanel')
  if slotsPanelWidget then
    slotsPanelWidget:setVisible(true)
    slotsPanelWidget:setPhantom(false)
    slotsPanelWidget:setFocusable(false)
    topRowWidget = slotsPanelWidget:getChildById('topRow')
    bottomRowWidget = slotsPanelWidget:getChildById('bottomRow')
    if topRowWidget then
      topRowWidget:setVisible(true)
      topRowWidget:setPhantom(false)
      topRowWidget:setFocusable(false)
      topRowWidget:destroyChildren()
    end
    if bottomRowWidget then
      bottomRowWidget:setVisible(true)
      bottomRowWidget:setPhantom(false)
      bottomRowWidget:setFocusable(false)
      bottomRowWidget:destroyChildren()
    end
  else
    for _, slotWidget in pairs(slotWidgets) do
      if slotWidget then
        slotWidget:destroy()
      end
    end
  end
  slotWidgets = {}
  hoveredSlotIndex = nil

  for slotIndex = 1, SLOT_COUNT do
    local parentWidget = slotsPanelWidget
    if topRowWidget and bottomRowWidget then
      parentWidget = slotIndex <= SLOTS_PER_ROW and topRowWidget or bottomRowWidget
    end
    createSlotButton(slotIndex, parentWidget)
  end

  logInfo(string.format('slot count: %d', SLOT_COUNT))
end

local function onRootGeometryChange()
  if customSkillBar and customSkillBar:isVisible() then
    schedulePositionBar()
  end

  if choiceWindow and choiceWindow:isVisible() then
    centerWindow(choiceWindow)
  end
end

local function online()
  activeCharacterName = g_game.getCharacterName() or activeCharacterName
  inventorySlotKeys = {}
  loadSettings()
  rebindHotkeys()
  showBar()
end

local function offline()
  inventorySlotKeys = {}
  for slotIndex = 1, SLOT_COUNT do
    stopSlotCooldown(slotIndex)
  end
  saveSettings()
  unbindAllHotkeys()
  hideBar()
end

local function onSpellCooldown(iconId, duration)
  local matchingSlots = findSlotsBySpellId(iconId)
  if #matchingSlots == 0 then
    return
  end

  for _, slotIndex in ipairs(matchingSlots) do
    startSlotCooldown(slotIndex, duration)
  end
end

local function onInventoryChange(localPlayer, slot, item, oldItem)
  if slot ~= InventorySlotRight and slot ~= InventorySlotLeft and slot ~= InventorySlotOther then
    return
  end

  local slotKey = buildItemIdentityKey(item)
  if inventorySlotKeys[slot] == slotKey then
    return
  end

  inventorySlotKeys[slot] = slotKey
  refreshSlotWidgets()

  if choiceWindow and choiceWindow:isVisible() then
    refreshChoiceEntries()
  end
end

function init()
  logInfo('init')

  g_ui.importStyle('/modules/game_custom_skillbar/modern_skill_theme.otui')

  connect(g_game, {
    onGameStart = online,
    onGameEnd = offline,
    onSpellCooldown = onSpellCooldown
  })
  connect(LocalPlayer, {
    onInventoryChange = onInventoryChange
  })

  connect(getRootWidget(), {
    onGeometryChange = onRootGeometryChange
  })

  customSkillBar = g_ui.loadUI('custom_skillbar', getRootWidget())
  customSkillBar:setPhantom(false)
  customSkillBar:setFocusable(false)
  customSkillBar:raise()
  customSkillBar:hide()

  testButton = customSkillBar:getChildById('testButton')
  if testButton then
    testButton:hide()
    testButton:setPhantom(true)
  end

  dragHandleWidget = customSkillBar:getChildById('dragHandle')
  if dragHandleWidget then
    dragHandleWidget:setPhantom(false)
    dragHandleWidget:setFocusable(false)
    dragHandleWidget:setDraggable(true)
    dragHandleWidget.onDragEnter = onBarDragEnter
    dragHandleWidget.onDragMove = onBarDragMove
    dragHandleWidget.onDragLeave = onBarDragLeave
  end

  createSlots()
  refreshSlotWidgets()

  if g_game.isOnline() then
    online()
  end
end

function terminate()
  disconnect(g_game, {
    onGameStart = online,
    onGameEnd = offline,
    onSpellCooldown = onSpellCooldown
  })
  disconnect(LocalPlayer, {
    onInventoryChange = onInventoryChange
  })

  disconnect(getRootWidget(), {
    onGeometryChange = onRootGeometryChange
  })

  if positionEvent then
    removeEvent(positionEvent)
    positionEvent = nil
  end

  for slotIndex = 1, SLOT_COUNT do
    stopSlotCooldown(slotIndex)
  end

  closeChoiceWindow()
  unbindAllHotkeys()

  if customSkillBar then
    customSkillBar:destroy()
    customSkillBar = nil
  end

  activeCharacterName = nil
  dragHandleWidget = nil
end
