skillsPanelWindow = nil
skillsPanelButton = nil

local TAB_ALL = 'all'
local TAB_AVAILABLE = 'available'
local CATEGORY_FILTER_ALL = 'all'
local PAGE_SIZE = 30
local DEBUG_FROZEN_ARROW_VALIDATION = false
local FROZEN_ARROW_WORDS = 'flecha congelante'

local CATEGORY_ORDER = { 'Ofensiva', 'Defensiva', 'Utilidade' }
local CATEGORY_HEADER_LABELS = {
  Ofensiva = 'Ofensivas',
  Defensiva = 'Defensivas',
  Utilidade = 'Utilidade'
}
local CATEGORY_COLORS = {
  Ofensiva = {
    background = '#38231f',
    border = '#7c5248',
    text = '#efd9d3'
  },
  Defensiva = {
    background = '#1b392f',
    border = '#417f6b',
    text = '#d7efe5'
  },
  Utilidade = {
    background = '#23303c',
    border = '#5a738b',
    text = '#dae6f1'
  }
}
local CATEGORY_ICON_CLIPS = {
  Ofensiva = '0 0 20 20',
  Defensiva = '20 0 20 20',
  Utilidade = '40 0 20 20'
}
local SKILL_ENTRY_DEFAULT_STYLE = {
  background = '#12171c',
  border = '#2d363f'
}
local SKILL_ENTRY_SELECTED_STYLE = {
  background = '#202a2e',
  border = '#4f806d'
}
local STATUS_STYLES = {
  liberada = {
    label = 'Liberada',
    background = '#1c4035',
    border = '#408a70',
    text = '#d8f2e7'
  },
  arma_incorreta = {
    label = 'Arma incorreta',
    background = '#412823',
    border = '#906152',
    text = '#f1ddd7'
  },
  nivel_insuficiente = {
    label = 'Nivel insuficiente',
    background = '#443821',
    border = '#968157',
    text = '#efe5d0'
  },
  premium_necessario = {
    label = 'Premium necessario',
    background = '#3f3521',
    border = '#8b7b52',
    text = '#ebe2cd'
  },
  indisponivel = {
    label = 'Indisponivel',
    background = '#232830',
    border = '#59616c',
    text = '#dbe0e7'
  }
}
local TYPE_LABELS = {
  instant = 'Instant',
  conjure = 'Conjure'
}
local ALLOWED_SCRIPT_FOLDERS = {
  attack = true,
  healing = true,
  support = true,
  conjuring = true,
  party = true
}
local SPELL_REQUIREMENT_OVERRIDES = {
  ['fire tornado'] = {
    needWeapon = true,
    requiredItemId = 2189,
    requiredItemIds = {2189},
    requiredClientItemId = 3073,
    requiredClientItemIds = {3073},
    requiredItemName = 'Orbe Elemental',
    requiredRecipeKey = 'elemental_orb',
    description = 'Invoca um tornado de fogo que causa dano em area ao redor do conjurador.'
  },
  ['flecha congelante'] = {
    needWeapon = true,
    requiredWeaponType = 'bow',
    requiredItemName = 'Bow',
    description = 'Dispara uma flecha congelante que nao causa dano, mas congela/stuna o alvo por 2 segundos.'
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

local ui = {}
local panelState = {
  activeTab = TAB_ALL,
  categoryFilter = CATEGORY_FILTER_ALL,
  allSpells = {},
  displayedSpells = {},
  currentPageSpells = {},
  selectedSkill = nil,
  selectedSkillUid = nil,
  selectedListEntry = nil,
  iconLookup = nil,
  dataSourceLabel = 'Fonte: -',
  validationContext = nil,
  validationContextKey = nil,
  detailRenderKey = nil,
  dataLoaded = false,
  listRevision = 0,
  renderKey = nil,
  currentPage = 1,
  totalPages = 1,
  pageSize = PAGE_SIZE,
  searchText = '',
  needsListRefresh = true,
  forceSelectFirstVisible = true,
  cachedLists = {
    all = {
      base = {},
      byCategory = {}
    },
    available = {
      base = {},
      byCategory = {},
      contextKey = nil
    }
  },
  inventorySlotKeys = {}
}
local consoleCommandFilter = nil
local printSkillsPanel = function(message)
  print(message)
end
local lastFrozenArrowDebugSignature = nil

local function normalizeToken(value)
  value = tostring(value or ''):lower():trim()
  local normalized = value:gsub('[^%w]+', '')
  return normalized
end

local function normalizeWords(value)
  value = tostring(value or ''):lower():trim()
  value = value:gsub('%s+', ' ')
  return value
end

local function isFrozenArrowSkill(skill)
  return skill and normalizeWords(skill.words or '') == FROZEN_ARROW_WORDS
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
  local itemName = normalizeToken(getHandItemDisplayName(item))

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
  local requiredWeapon = tostring(skill and skill.requiredWeaponType or '-')
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
    requiredWeapon,
    tostring(entry and entry.debugLabel or '-'),
    tostring(item and getItemClientId(item) or '-'),
    tostring(item and getItemServerId(item) or '-'),
    tostring(item and getHandItemDisplayName(item) or '-'),
    detectWeaponTypeFromItem(item),
    result and 'available' or 'unavailable',
    reason
  )
end

local function logFrozenArrowValidation(skill, contextLabel, availability, reason, equippedWeapon)
  if not DEBUG_FROZEN_ARROW_VALIDATION or not isFrozenArrowSkill(skill) then
    return
  end

  local entries = getEquippedWeaponEntries(equippedWeapon)
  if equippedWeapon and equippedWeapon.player then
    for _, entry in ipairs(getAllEquippedInventoryEntries(equippedWeapon.player)) do
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

  printSkillsPanel(string.format(
    '[FrozenArrow][SkillsPanel][%s] requiredWeapon=%s availability=%s reason=%s',
    tostring(contextLabel or 'validation'),
    tostring(skill.requiredWeaponType or '-'),
    availability and 'available' or 'unavailable',
    tostring(reason or '-')
  ))

  if #entries == 0 then
    printSkillsPanel(string.format(
      '[FrozenArrow][SkillsPanel][%s] requiredWeapon=%s slot=- itemId=- serverId=- itemName=- weaponType=none result=unavailable reason=nenhum slot de arma encontrado',
      tostring(contextLabel or 'validation'),
      tostring(skill.requiredWeaponType or '-')
    ))
    return
  end

  for _, entry in ipairs(entries) do
    printSkillsPanel(string.format('[FrozenArrow][SkillsPanel][%s] %s', tostring(contextLabel or 'validation'), buildFrozenArrowEntryDebug(entry, skill)))
  end
end

local function normalizeSearchText(value)
  value = tostring(value or ''):trim()
  value = value:gsub('%s+', ' ')
  return value
end

local function hasActiveSearchText()
  return panelState.searchText and panelState.searchText:len() > 0
end

local function humanizeToken(value)
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

local function tableContainsValue(values, needle)
  if not values then
    return false
  end

  for _, value in ipairs(values) do
    if value == needle then
      return true
    end
  end

  return false
end

local function getCategorySortIndex(category)
  for index, value in ipairs(CATEGORY_ORDER) do
    if value == category then
      return index
    end
  end

  return #CATEGORY_ORDER + 1
end

local function getCategoryVisual(category)
  return CATEGORY_COLORS[category] or CATEGORY_COLORS.Utilidade
end

local function getStatusVisual(statusKey)
  return STATUS_STYLES[statusKey] or STATUS_STYLES.indisponivel
end

local function buildStatusInfo(statusKey, detail)
  local visual = getStatusVisual(statusKey)
  return {
    key = statusKey,
    label = visual.label,
    background = visual.background,
    border = visual.border,
    text = visual.text,
    detail = detail or '-'
  }
end

local function setBadgeStyle(widget, backgroundColor, borderColor, textColor, text)
  widget:setBackgroundColor(backgroundColor)
  widget:setBorderColor(borderColor)
  widget:setColor(textColor)
  widget:setText(text)
end

local function setCategoryBadge(widget, category)
  local categoryName = category or 'Utilidade'
  local visual = getCategoryVisual(categoryName)
  local label = CATEGORY_HEADER_LABELS[categoryName] or categoryName
  setBadgeStyle(widget, visual.background, visual.border, visual.text, label)
end

local function setStatusBadge(widget, statusInfo)
  if not statusInfo then
    statusInfo = buildStatusInfo('indisponivel', '-')
  end

  setBadgeStyle(widget, statusInfo.background, statusInfo.border, statusInfo.text, statusInfo.label)
end

local function formatYesNo(value)
  return value and 'Sim' or 'Nao'
end

local function formatMs(milliseconds)
  if milliseconds == nil then
    return '-'
  end

  local numeric = tonumber(milliseconds)
  if not numeric then
    return tostring(milliseconds)
  end

  if numeric % 1000 == 0 then
    return string.format('%ds', numeric / 1000)
  end

  return string.format('%.1fs', numeric / 1000)
end

local function formatMana(spell)
  local mana = spell.mana
  if mana == nil or mana == '' then
    mana = '-'
  end

  if spell.soul and tostring(spell.soul) ~= '0' and tostring(spell.soul) ~= '' then
    return string.format('%s / Soul %s', tostring(mana), tostring(spell.soul))
  end

  return tostring(mana)
end

local function formatManaChip(spell)
  local mana = spell.mana
  if mana == nil or mana == '' then
    return 'Mana -'
  end

  if spell.soul and tostring(spell.soul) ~= '0' and tostring(spell.soul) ~= '' then
    return string.format('Mana %s + S%s', tostring(mana), tostring(spell.soul))
  end

  return 'Mana ' .. tostring(mana)
end

local function formatCooldown(spell)
  local parts = {}

  if spell.cooldown then
    table.insert(parts, 'Base ' .. formatMs(spell.cooldown))
  end

  if spell.groupCooldown then
    table.insert(parts, 'Grupo ' .. formatMs(spell.groupCooldown))
  end

  if spell.secondaryGroupCooldown then
    table.insert(parts, 'Sec. ' .. formatMs(spell.secondaryGroupCooldown))
  end

  if #parts == 0 then
    return '-'
  end

  return table.concat(parts, ' | ')
end

local function formatCooldownChip(spell)
  if not spell.cooldown then
    return 'CD -'
  end

  return 'CD ' .. formatMs(spell.cooldown)
end

local function formatLevelChip(spell)
  if not spell.level then
    return 'Nivel -'
  end

  return 'Nivel ' .. tostring(spell.level)
end

local function getSpellGroupText(spell)
  local parts = {}

  if spell.group and spell.group:len() > 0 and spell.group ~= '-' then
    table.insert(parts, humanizeToken(spell.group))
  end

  if spell.secondaryGroup and spell.secondaryGroup:len() > 0 then
    table.insert(parts, humanizeToken(spell.secondaryGroup))
  end

  if #parts == 0 then
    return '-'
  end

  return table.concat(parts, ' / ')
end

local function getSpellTargetText(spell)
  if spell.selfTarget then
    return 'Proprio personagem'
  end

  if spell.needTarget and spell.targetOrDirection then
    return 'Alvo ou direcao'
  end

  if spell.needTarget then
    return 'Alvo selecionado'
  end

  if spell.directionTarget then
    return 'Direcional'
  end

  if spell.parameterTarget then
    return 'Parametro / nome'
  end

  if spell.range then
    return 'Sem alvo fixo'
  end

  return '-'
end

local function getSpellRangeText(spell)
  if spell.range then
    return tostring(spell.range)
  end

  if spell.selfTarget then
    return 'Proprio'
  end

  if spell.directionTarget then
    return 'Direcional'
  end

  return '-'
end

local function getSpellDescriptionText(spell)
  local description = tostring(spell.description or ''):trim()
  if description:len() > 0 then
    return description
  end

  return '-'
end

local function getSpellWeaponRequirementText(spell)
  if spell.requiredItemName and spell.requiredItemName ~= '' then
    return spell.requiredItemName
  end

  if spell.requiredWeaponType and spell.requiredWeaponType ~= '' then
    return humanizeToken(spell.requiredWeaponType)
  end

  if not spell.needWeapon then
    return '-'
  end

  return 'Sim (placeholder para tipo de arma)'
end

local function getSpellVocationText(spell)
  if spell.isAllVocations then
    return 'Todas'
  end

  if not spell.vocations or #spell.vocations == 0 then
    return '-'
  end

  return table.concat(spell.vocations, ', ')
end

local function buildSkillMetaText(spell)
  local meta = {}
  local groupText = getSpellGroupText(spell)

  if spell.type and spell.type ~= '' then
    table.insert(meta, spell.type)
  end

  if groupText ~= '-' then
    table.insert(meta, groupText)
  end

  if spell.level then
    table.insert(meta, 'Nivel ' .. tostring(spell.level))
  end

  if #meta == 0 then
    return '-'
  end

  return table.concat(meta, ' | ')
end

local function applySpellOverrides(spell)
  local override = SPELL_REQUIREMENT_OVERRIDES[normalizeWords(spell and spell.words or '')]
  if not override then
    return
  end

  for key, value in pairs(override) do
    spell[key] = value
  end
end

local function finalizeSpellPresentation(spell)
  spell.cachedManaText = formatMana(spell)
  spell.cachedCooldownText = formatCooldown(spell)
  spell.cachedGroupText = getSpellGroupText(spell)
  spell.cachedTargetText = getSpellTargetText(spell)
  spell.cachedRangeText = getSpellRangeText(spell)
  spell.cachedDescriptionText = getSpellDescriptionText(spell)
  spell.cachedWeaponRequirementText = getSpellWeaponRequirementText(spell)
  spell.cachedVocationText = getSpellVocationText(spell)
  spell.cachedMetaText = buildSkillMetaText(spell)
  spell.cachedManaChipText = formatManaChip(spell)
  spell.cachedCooldownChipText = formatCooldownChip(spell)
  spell.cachedLevelChipText = formatLevelChip(spell)
  spell.cachedLevelText = spell.level and tostring(spell.level) or '-'
end

local function parseAttributes(attributeText)
  local attributes = {}

  for key, value in attributeText:gmatch('([%w_]+)%s*=%s*"([^"]*)"') do
    attributes[key] = value
  end

  return attributes
end

local function attributeIsTrue(value)
  value = tostring(value or ''):lower()
  return value == '1' or value == 'true'
end

local function getCategoryByGroupAndFolder(groupName, scriptFolder)
  groupName = tostring(groupName or ''):lower()
  scriptFolder = tostring(scriptFolder or ''):lower()

  if groupName == 'attack' or scriptFolder == 'attack' then
    return 'Ofensiva'
  end

  if groupName == 'healing' or scriptFolder == 'healing' then
    return 'Defensiva'
  end

  return 'Utilidade'
end

local function ensureIconLookup()
  if panelState.iconLookup then
    return
  end

  local lookup = {
    byWords = {},
    byName = {},
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
        clientId = tonumber(Spells.getClientId(spellName))
      end

      if clientId then
        lookup.byName[normalizeToken(spellName)] = clientId
        lookup.byWords[normalizeWords(info.words)] = clientId
      end
    end
  end

  panelState.iconLookup = lookup
end

local function resolveSpellIcon(spell)
  ensureIconLookup()

  local clientId = nil
  local lookup = panelState.iconLookup
  local spellId = tonumber(spell.spellId)

  if lookup.byWords[normalizeWords(spell.words)] then
    clientId = lookup.byWords[normalizeWords(spell.words)]
  elseif lookup.byName[normalizeToken(spell.name)] then
    clientId = lookup.byName[normalizeToken(spell.name)]
  elseif spellId and lookup.byServerId[spellId] then
    clientId = lookup.byServerId[spellId]
  end

  if clientId and SpelllistSettings and SpelllistSettings.Default and Spells and Spells.getImageClip then
    spell.iconSource = SpelllistSettings.Default.iconFile
    spell.iconClip = Spells.getImageClip(clientId, 'Default')
    spell.iconGeneric = false
    return
  end

  spell.iconSource = '/images/game/spells/cooldowns'
  spell.iconClip = CATEGORY_ICON_CLIPS[spell.category] or CATEGORY_ICON_CLIPS.Utilidade
  spell.iconGeneric = true
end

local function buildSpellUid(name, words, script)
  return normalizeWords(words) .. '|' .. normalizeToken(name) .. '|' .. normalizeToken(script)
end

local function buildSpellFromXmlBlock(block)
  local attributes = block.attributes
  local groupName = tostring(attributes.group or ''):lower()
  local scriptPath = attributes.script or ''
  local scriptFolder = scriptPath:match('^([^/]+)/') or ''

  if not ALLOWED_SCRIPT_FOLDERS[scriptFolder] then
    return nil
  end

  if block.xmlTag == 'rune' then
    return nil
  end

  local normalizedVocations = {}
  for _, vocationName in ipairs(block.vocations) do
    local normalized = normalizeToken(vocationName)
    if normalized:len() > 0 and not tableContainsValue(normalizedVocations, normalized) then
      table.insert(normalizedVocations, normalized)
    end
  end

  local spell = {
    uid = buildSpellUid(attributes.name, attributes.words, scriptPath),
    name = attributes.name or 'Skill sem nome',
    words = attributes.words or '-',
    category = getCategoryByGroupAndFolder(groupName, scriptFolder),
    group = groupName ~= '' and groupName or scriptFolder,
    secondaryGroup = tostring(attributes.secondarygroup or ''):lower(),
    type = TYPE_LABELS[block.xmlTag] or humanizeToken(block.xmlTag),
    level = tonumber(attributes.level),
    mana = attributes.mana,
    soul = attributes.soul,
    cooldown = tonumber(attributes.cooldown),
    groupCooldown = tonumber(attributes.groupcooldown),
    secondaryGroupCooldown = tonumber(attributes.secondarygroupcooldown),
    premium = attributeIsTrue(attributes.premium),
    needWeapon = attributeIsTrue(attributes.needweapon),
    script = scriptPath,
    scriptFolder = scriptFolder,
    spellId = tonumber(attributes.spellid),
    vocations = block.vocations,
    normalizedVocations = normalizedVocations,
    isAllVocations = #normalizedVocations == 0 or tableContainsValue(normalizedVocations, 'none'),
    dataSource = 'xml',
    range = tonumber(attributes.range),
    needTarget = attributeIsTrue(attributes.needtarget),
    selfTarget = attributeIsTrue(attributes.selftarget),
    directionTarget = attributeIsTrue(attributes.direction),
    targetOrDirection = attributeIsTrue(attributes.casterTargetOrDirection),
    parameterTarget = attributeIsTrue(attributes.params) or attributeIsTrue(attributes.playernameparam),
    aggressive = attributes.aggressive ~= nil and attributeIsTrue(attributes.aggressive) or nil,
    description = attributes.description or attributes.desc or ''
  }

  if spell.group == '' then
    spell.group = '-'
  end

  applySpellOverrides(spell)
  resolveSpellIcon(spell)
  finalizeSpellPresentation(spell)
  return spell
end

local function readXmlSpellData()
  local relativePaths = {
    '../../../Server/data/spells/spells.xml',
    '../../../../Server/data/spells/spells.xml',
    '../../Server/data/spells/spells.xml',
    'Server/data/spells/spells.xml'
  }

  for depth = 1, 5 do
    for _, relativePath in ipairs(relativePaths) do
      local resolvedPath = relativePath
      local okResolve, customPath = pcall(resolvepath, relativePath, depth)
      if okResolve and customPath then
        resolvedPath = customPath
      end

      local okRead, content = pcall(g_resources.readFileContents, resolvedPath)
      if okRead and type(content) == 'string' and content:find('<spells>', 1, true) then
        return content, resolvedPath
      end
    end
  end

  return nil, nil
end

local function parseXmlSpellData(xmlContent)
  local spells = {}
  local current = nil

  local function finishCurrent()
    if not current then
      return
    end

    local spell = buildSpellFromXmlBlock(current)
    if spell then
      table.insert(spells, spell)
    end

    current = nil
  end

  for line in xmlContent:gmatch('[^\r\n]+') do
    local trimmed = line:trim()

    if current then
      local vocationName = trimmed:match('<vocation%s+[^>]-name="([^"]+)"')
      if vocationName then
        table.insert(current.vocations, vocationName)
      else
        local closingTag = trimmed:match('^</([%a_]+)>$')
        if closingTag and closingTag == current.xmlTag then
          finishCurrent()
        end
      end
    else
      local xmlTag, attributeText, selfClosing = trimmed:match('^<([%a_]+)%s+(.-)(/?)>$')
      if xmlTag and (xmlTag == 'instant' or xmlTag == 'conjure' or xmlTag == 'rune') then
        current = {
          xmlTag = xmlTag,
          attributes = parseAttributes(attributeText),
          vocations = {}
        }

        if selfClosing == '/' then
          finishCurrent()
        end
      end
    end
  end

  finishCurrent()
  return spells
end

local function buildFallbackSpellData()
  local spells = {}

  if not SpellInfo or not SpellInfo.Default then
    return spells
  end

  for spellName, info in pairs(SpellInfo.Default) do
    local primaryGroupId = nil
    if info.group then
      for groupId, _ in pairs(info.group) do
        if not primaryGroupId or groupId < primaryGroupId then
          primaryGroupId = groupId
        end
      end
    end

    local scriptFolder = 'support'
    if tostring(info.type or ''):lower() == 'conjure' then
      scriptFolder = 'conjuring'
    elseif primaryGroupId == 1 then
      scriptFolder = 'attack'
    elseif primaryGroupId == 2 then
      scriptFolder = 'healing'
    end

    local vocationNames = {}
    local normalizedVocations = {}
    if info.vocations then
      for _, vocationId in ipairs(info.vocations) do
        local vocationName = VocationNames and VocationNames[vocationId]
        if vocationName and not tableContainsValue(vocationNames, vocationName) then
          table.insert(vocationNames, vocationName)
          table.insert(normalizedVocations, normalizeToken(vocationName))
        end
      end
    end

    local spell = {
      uid = buildSpellUid(spellName, info.words, spellName),
      name = spellName,
      words = info.words or '-',
      category = getCategoryByGroupAndFolder(primaryGroupId == 1 and 'attack' or primaryGroupId == 2 and 'healing' or 'support', scriptFolder),
      group = SpellGroups and primaryGroupId and SpellGroups[primaryGroupId] and SpellGroups[primaryGroupId]:lower() or scriptFolder,
      secondaryGroup = '',
      type = humanizeToken(info.type or 'Instant'),
      level = info.level,
      mana = info.mana,
      soul = info.soul,
      cooldown = info.exhaustion,
      groupCooldown = primaryGroupId and info.group and info.group[primaryGroupId] or nil,
      secondaryGroupCooldown = nil,
      premium = info.premium == true,
      needWeapon = false,
      script = 'Fallback do client',
      scriptFolder = scriptFolder,
      spellId = info.id,
      vocations = vocationNames,
      normalizedVocations = normalizedVocations,
      isAllVocations = #normalizedVocations == 0,
      dataSource = 'client-fallback',
      range = nil,
      needTarget = false,
      selfTarget = false,
      directionTarget = false,
      targetOrDirection = false,
      parameterTarget = info.parameter == true,
      aggressive = nil,
      description = info.description or '',
      needWeapon = info.needWeapon == true,
      requiredItemId = info.requiredItemId,
      requiredItemIds = info.requiredItemIds,
      requiredClientItemId = info.requiredClientItemId,
      requiredClientItemIds = info.requiredClientItemIds,
      requiredItemName = info.requiredItemName,
      requiredRecipeKey = info.requiredRecipeKey
    }

    applySpellOverrides(spell)
    resolveSpellIcon(spell)
    finalizeSpellPresentation(spell)
    table.insert(spells, spell)
  end

  return spells
end

local function sortSpells(spells)
  table.sort(spells, function(a, b)
    local categoryA = getCategorySortIndex(a.category)
    local categoryB = getCategorySortIndex(b.category)
    if categoryA ~= categoryB then
      return categoryA < categoryB
    end

    local nameA = a.name:lower()
    local nameB = b.name:lower()
    if nameA ~= nameB then
      return nameA < nameB
    end

    return a.uid < b.uid
  end)

  return spells
end

local function buildCategoryBuckets(spells)
  local buckets = {
    Ofensiva = {},
    Defensiva = {},
    Utilidade = {}
  }

  for _, spell in ipairs(spells) do
    local bucket = buckets[spell.category] or buckets.Utilidade
    table.insert(bucket, spell)
  end

  return buckets
end

local function markListDirty()
  panelState.needsListRefresh = true
  panelState.renderKey = nil
end

local function incrementListRevision()
  panelState.listRevision = panelState.listRevision + 1
  markListDirty()
end

local function invalidateValidationCache()
  panelState.validationContext = nil
  panelState.validationContextKey = nil
  panelState.cachedLists.available.base = {}
  panelState.cachedLists.available.byCategory = {}
  panelState.cachedLists.available.contextKey = nil
  incrementListRevision()
end

local function ensureSkillsLoaded(forceReload)
  if panelState.dataLoaded and not forceReload then
    return
  end

  if forceReload then
    panelState.iconLookup = nil
  end

  local xmlContent = readXmlSpellData()
  if xmlContent then
    local spells = parseXmlSpellData(xmlContent)
    if #spells > 0 then
      panelState.allSpells = sortSpells(spells)
      panelState.dataSourceLabel = 'Fonte: spells.xml | Icones: gamelib/spells.lua'
    else
      panelState.allSpells = sortSpells(buildFallbackSpellData())
      panelState.dataSourceLabel = 'Fonte: gamelib/spells.lua (fallback no client)'
    end
  else
    panelState.allSpells = sortSpells(buildFallbackSpellData())
    panelState.dataSourceLabel = 'Fonte: gamelib/spells.lua (fallback no client)'
  end

  panelState.cachedLists.all.base = panelState.allSpells
  panelState.cachedLists.all.byCategory = buildCategoryBuckets(panelState.allSpells)
  panelState.dataLoaded = true
  panelState.currentPage = 1
  panelState.totalPages = 1
  invalidateValidationCache()
end

local function getHandItemDisplayName(item)
  if not item then
    return 'Nenhum'
  end

  if item.getName then
    local okName, itemName = pcall(function()
      return item:getName()
    end)
    if okName and type(itemName) == 'string' and itemName:len() > 0 then
      return itemName
    end
  end

  local tooltip = item:getTooltip()
  if tooltip and tooltip:len() > 0 then
    local firstLine = tooltip:match('([^\r\n]+)')
    if firstLine and firstLine:len() > 0 then
      return firstLine
    end
  end

  return 'Item ' .. item:getId()
end

local function getSkillRequiredItemIds(skill)
  if not skill then
    return {}
  end

  if skill.requiredItemIds and #skill.requiredItemIds > 0 then
    return skill.requiredItemIds
  end

  if skill.requiredItemId then
    return {skill.requiredItemId}
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
    return {skill.requiredClientItemId}
  end

  return {}
end

local function getItemClientId(item)
  if not item then
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

local function getItemServerId(item)
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

local function getItemComparisonId(item)
  return getItemServerId(item) or getItemClientId(item)
end

local function buildItemIdentityKey(item)
  return string.format('%s|%s', tostring(getItemServerId(item) or 0), tostring(getItemClientId(item) or 0))
end

local function formatEquippedItemDebug(item)
  if not item then
    return 'nil'
  end

  return string.format('server=%s client=%s / %s', tostring(getItemServerId(item) or '-'), tostring(getItemClientId(item) or '-'), getHandItemDisplayName(item))
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

local function getEquippedWeaponEntries(equippedWeapon)
  local entries = {}
  if not equippedWeapon then
    return entries
  end

  table.insert(entries, {
    item = equippedWeapon.rightItem,
    handLabel = 'mao direita',
    debugLabel = 'right hand'
  })
  table.insert(entries, {
    item = equippedWeapon.leftItem,
    handLabel = 'mao esquerda',
    debugLabel = 'left hand'
  })

  if equippedWeapon.otherItem and equippedWeapon.otherItem ~= equippedWeapon.rightItem and equippedWeapon.otherItem ~= equippedWeapon.leftItem then
    table.insert(entries, {
      item = equippedWeapon.otherItem,
      handLabel = 'slot alternativo de arma',
      debugLabel = 'other weapon slot'
    })
  end

  return entries
end

local function getAllEquippedInventoryEntries(player)
  local entries = {}
  if not player then
    return entries
  end

  for slot = InventorySlotOther, InventorySlotAmmo do
    local item = getInventoryItemFromSlot(player, slot)
    if item then
      table.insert(entries, {
        item = item,
        handLabel = 'slot ' .. tostring(slot),
        debugLabel = 'inventory slot ' .. tostring(slot)
      })
    end
  end

  return entries
end

local function equippedItemMatchesRequirement(item, requiredItemId, requiredItemName)
  if not item then
    return false
  end

  local itemServerId = getItemServerId(item)
  if requiredItemId and itemServerId and itemServerId == requiredItemId then
    return true
  end

  if requiredItemName and requiredItemName ~= '' then
    local itemName = normalizeToken(getHandItemDisplayName(item))
    local requiredName = normalizeToken(requiredItemName)
    if itemName:find(requiredName, 1, true) then
      return true
    end
  end

  if not requiredItemId then
    return requiredItemName == nil or requiredItemName == ''
  end

  return getItemComparisonId(item) == requiredItemId
end

local function equippedItemMatchesWeaponType(item, requiredWeaponType)
  if not item or not requiredWeaponType or requiredWeaponType == '' then
    return false
  end

  local normalizedType = normalizeToken(requiredWeaponType)
  local itemServerId = getItemServerId(item)
  local itemClientId = getItemClientId(item)
  local itemName = normalizeToken(getHandItemDisplayName(item))

  if normalizedType == 'bow' then
    if (itemServerId and KNOWN_BOW_SERVER_IDS[itemServerId]) or (itemClientId and KNOWN_BOW_SERVER_IDS[itemClientId]) then
      return true
    end
    return itemName:find('bow', 1, true) ~= nil and itemName:find('crossbow', 1, true) == nil
  end

  if normalizedType == 'crossbow' then
    return itemName:find('crossbow', 1, true) ~= nil
  end

  return itemName:find(normalizedType, 1, true) ~= nil
end

local function equippedItemMatchesSkillRequirement(item, skill)
  if not item or not skill then
    return false
  end

  for _, requiredItemId in ipairs(getSkillRequiredItemIds(skill)) do
    if equippedItemMatchesRequirement(item, requiredItemId, nil) then
      return true
    end
  end

  local itemClientId = getItemClientId(item)
  for _, requiredClientItemId in ipairs(getSkillRequiredClientItemIds(skill)) do
    if itemClientId and itemClientId == requiredClientItemId then
      return true
    end
  end

  if skill.requiredItemName and skill.requiredItemName ~= '' then
    if equippedItemMatchesRequirement(item, nil, skill.requiredItemName) then
      return true
    end
  end

  if skill.requiredWeaponType and skill.requiredWeaponType ~= '' then
    if equippedItemMatchesWeaponType(item, skill.requiredWeaponType) then
      return true
    end
  end

  return false
end

local function getMatchingEquippedWeapon(skill, equippedWeapon)
  if not skill or not equippedWeapon then
    return nil, nil
  end

  for _, entry in ipairs(getEquippedWeaponEntries(equippedWeapon)) do
    if entry.item and equippedItemMatchesSkillRequirement(entry.item, skill) then
      return entry.item, entry.handLabel
    end
  end

  local player = equippedWeapon.player
  for _, entry in ipairs(getAllEquippedInventoryEntries(player)) do
    if entry.item and equippedItemMatchesSkillRequirement(entry.item, skill) then
      return entry.item, entry.handLabel
    end
  end

  return nil, nil
end

local function getEquippedWeaponContext()
  local player = g_game.getLocalPlayer()
  if not player then
    return {
      player = nil,
      rightItem = nil,
      leftItem = nil,
      hasAnyHandItem = false,
      primaryItem = nil,
      primaryName = 'Nenhum',
      primarySlot = nil,
      weaponType = 'unknown'
    }
  end

  local rightItem = getInventoryItemFromSlot(player, InventorySlotRight)
  local leftItem = getInventoryItemFromSlot(player, InventorySlotLeft)
  local otherItem = getInventoryItemFromSlot(player, InventorySlotOther)
  local primaryItem = rightItem or leftItem or otherItem
  local primarySlot = rightItem and 'right' or leftItem and 'left' or otherItem and 'other' or nil

  return {
    player = player,
    rightItem = rightItem,
    leftItem = leftItem,
    otherItem = otherItem,
    hasAnyHandItem = rightItem ~= nil or leftItem ~= nil or otherItem ~= nil,
    primaryItem = primaryItem,
    primaryName = getHandItemDisplayName(primaryItem),
    primarySlot = primarySlot,
    weaponType = 'unknown'
  }
end

local function updateEquippedWeaponPanel()
  local context = getEquippedWeaponContext()

  ui.rightHandItem:setItem(context.rightItem)
  ui.leftHandItem:setItem(context.leftItem)
  ui.equippedItemPreview:setItem(context.primaryItem)
  ui.rightHandLabel:setText(getHandItemDisplayName(context.rightItem))
  ui.leftHandLabel:setText(getHandItemDisplayName(context.leftItem))

  if context.primaryItem then
    ui.equippedItemLabel:setText(context.primaryName)
  else
    ui.equippedItemLabel:setText('Nenhum item nas maos')
  end

  if context.hasAnyHandItem then
    ui.equippedItemHint:setText('O painel valida skills pela arma equipada nas maos e suporta requisito de item especifico quando configurado.')
  else
    ui.equippedItemHint:setText('Nenhum item equipado nas maos. Skills com requisito de arma ficam indisponiveis ate equipar o item correto.')
  end
end

local function playerHasPremium(player)
  if not player or not player.isPremium then
    return true
  end

  local ok, value = pcall(function()
    return player:isPremium()
  end)

  if not ok then
    return true
  end

  return value
end

local function spellMatchesPlayerVocation(spell, player)
  if spell.isAllVocations then
    return true
  end

  if not player then
    return false
  end

  local vocationName = VocationNames and VocationNames[player:getVocation()] or ''
  return tableContainsValue(spell.normalizedVocations, normalizeToken(vocationName))
end

local function isSkillAvailableByWeapon(skill, equippedWeapon)
  local requiredClientItemIds = getSkillRequiredClientItemIds(skill)
  if not skill.needWeapon and not skill.requiredItemId and not skill.requiredItemName and not skill.requiredWeaponType and #requiredClientItemIds == 0 then
    return true, 'Validacao de arma nao necessaria para esta skill.'
  end

  if skill.requiredItemId or skill.requiredItemName or skill.requiredWeaponType or #requiredClientItemIds > 0 then
    local rightItem = equippedWeapon and equippedWeapon.rightItem or nil
    local leftItem = equippedWeapon and equippedWeapon.leftItem or nil
    local matchedItem, handLabel = getMatchingEquippedWeapon(skill, equippedWeapon)
    local requiredWeaponLabel = skill.requiredItemName or (skill.requiredWeaponType and humanizeToken(skill.requiredWeaponType)) or 'a arma correta'

    printSkillsPanel(string.format('[SkillsPanel] skill required item: server=%s client=%s / %s', tostring(skill.requiredItemId or '-'), #requiredClientItemIds > 0 and table.concat(requiredClientItemIds, ',') or '-', tostring(requiredWeaponLabel)))
    printSkillsPanel(string.format('[SkillsPanel] right hand item: %s', formatEquippedItemDebug(rightItem)))
    printSkillsPanel(string.format('[SkillsPanel] left hand item: %s', formatEquippedItemDebug(leftItem)))
    if equippedWeapon and equippedWeapon.otherItem and equippedWeapon.otherItem ~= rightItem and equippedWeapon.otherItem ~= leftItem then
      printSkillsPanel(string.format('[SkillsPanel] other weapon slot item: %s', formatEquippedItemDebug(equippedWeapon.otherItem)))
    end

    if matchedItem then
      printSkillsPanel('[SkillsPanel] availability result: Liberada')
      logFrozenArrowValidation(skill, 'availability', true, string.format('%s equipado na %s.', requiredWeaponLabel, handLabel), equippedWeapon)
      return true, string.format('%s equipado na %s.', requiredWeaponLabel, handLabel)
    end

    printSkillsPanel('[SkillsPanel] availability result: Arma incorreta')
    local unavailableReason = string.format('Requer %s equipado.', requiredWeaponLabel)
    logFrozenArrowValidation(skill, 'availability', false, unavailableReason, equippedWeapon)
    return false, unavailableReason
  end

  if equippedWeapon and equippedWeapon.hasAnyHandItem then
    return true, 'Validacao de arma em placeholder: ha item equipado em alguma mao. O tipo real da arma sera resolvido depois.'
  end

  return false, 'Filtro por arma ainda nao configurado. No placeholder atual, a skill exige item em alguma mao.'
end

local function getValidationContext()
  local equippedWeapon = getEquippedWeaponContext()
  local player = equippedWeapon.player

  return {
    player = player,
    equippedWeapon = equippedWeapon,
    hasPremium = playerHasPremium(player)
  }
end

local function buildValidationContextKey(context)
  if not context or not context.player then
    return 'offline'
  end

  local rightId = context.equippedWeapon.rightItem and context.equippedWeapon.rightItem:getId() or 0
  local leftId = context.equippedWeapon.leftItem and context.equippedWeapon.leftItem:getId() or 0
  local otherId = context.equippedWeapon.otherItem and context.equippedWeapon.otherItem:getId() or 0
  local rightServerId = context.equippedWeapon.rightItem and getItemServerId(context.equippedWeapon.rightItem) or 0
  local leftServerId = context.equippedWeapon.leftItem and getItemServerId(context.equippedWeapon.leftItem) or 0
  local otherServerId = context.equippedWeapon.otherItem and getItemServerId(context.equippedWeapon.otherItem) or 0

  return table.concat({
    tostring(context.player:getVocation()),
    tostring(context.player:getLevel()),
    context.hasPremium and '1' or '0',
    tostring(rightId),
    tostring(leftId),
    tostring(otherId),
    tostring(rightServerId),
    tostring(leftServerId),
    tostring(otherServerId)
  }, '|')
end

local function evaluateSkillStatus(spell, context)
  context = context or getValidationContext()
  local player = context.player

  if not player then
    return buildStatusInfo('indisponivel', 'Entre no jogo para validar vocacao, nivel, premium e arma equipada.')
  end

  if not spellMatchesPlayerVocation(spell, player) then
    return buildStatusInfo('indisponivel', 'Vocacao atual nao corresponde aos requisitos desta skill.')
  end

  if spell.level and player:getLevel() < spell.level then
    return buildStatusInfo('nivel_insuficiente', string.format('Nivel atual %d. Requer nivel %d.', player:getLevel(), spell.level))
  end

  if spell.premium and not context.hasPremium then
    return buildStatusInfo('premium_necessario', 'Esta skill exige premium para ser usada.')
  end

  local weaponOk, weaponDetail = isSkillAvailableByWeapon(spell, context.equippedWeapon)
  if not weaponOk then
    return buildStatusInfo('arma_incorreta', weaponDetail)
  end

  if spell.needWeapon then
    return buildStatusInfo('liberada', weaponDetail)
  end

  return buildStatusInfo('liberada', 'Skill liberada com os filtros atuais.')
end

local function ensureValidationCache(forceRefresh)
  ensureSkillsLoaded(false)

  local context = getValidationContext()
  local contextKey = buildValidationContextKey(context)
  panelState.validationContext = context
  panelState.validationContextKey = contextKey

  if not forceRefresh and panelState.cachedLists.available.contextKey == contextKey then
    return
  end

  local availableSpells = {}
  for _, spell in ipairs(panelState.allSpells) do
    spell.statusInfo = evaluateSkillStatus(spell, context)
    if spell.statusInfo and spell.statusInfo.key == 'liberada' then
      table.insert(availableSpells, spell)
    end
  end

  panelState.cachedLists.available.base = availableSpells
  panelState.cachedLists.available.byCategory = buildCategoryBuckets(availableSpells)
  panelState.cachedLists.available.contextKey = contextKey
  incrementListRevision()
end

local function evaluateSkillStatusLive(spell, context)
  if not spell then
    return buildStatusInfo('indisponivel', '-')
  end

  local statusInfo = evaluateSkillStatus(spell, context or getValidationContext())
  spell.statusInfo = statusInfo
  return statusInfo
end

local function buildDetailRenderKey(spell)
  local statusInfo = spell and spell.statusInfo or nil
  return table.concat({
    spell and spell.uid or 'nil',
    panelState.validationContextKey or 'offline',
    statusInfo and statusInfo.key or '-',
    statusInfo and statusInfo.detail or '-'
  }, '|')
end

local function getActiveListCache()
  if panelState.activeTab == TAB_AVAILABLE then
    return panelState.cachedLists.available
  end

  return panelState.cachedLists.all
end

local function getFilteredSpellsForCurrentState(listCache)
  local filteredSpells = nil

  if panelState.categoryFilter == CATEGORY_FILTER_ALL then
    filteredSpells = listCache.base or {}
  else
    filteredSpells = listCache.byCategory and listCache.byCategory[panelState.categoryFilter] or {}
  end

  if not hasActiveSearchText() then
    return filteredSpells or {}
  end

  local searchQuery = normalizeWords(panelState.searchText)
  local searchResults = {}

  for _, spell in ipairs(filteredSpells or {}) do
    local spellName = normalizeWords(spell.name)
    local spellWords = normalizeWords(spell.words)

    if spellName:find(searchQuery, 1, true) or spellWords:find(searchQuery, 1, true) then
      table.insert(searchResults, spell)
    end
  end

  return searchResults
end

local function getPageCount(itemCount)
  if itemCount <= 0 then
    return 1
  end

  return math.max(1, math.ceil(itemCount / panelState.pageSize))
end

local function ensurePageInRange(itemCount)
  panelState.totalPages = getPageCount(itemCount)
  if panelState.currentPage < 1 then
    panelState.currentPage = 1
  elseif panelState.currentPage > panelState.totalPages then
    panelState.currentPage = panelState.totalPages
  end
end

local function buildPageSlice(spells)
  ensurePageInRange(#spells)

  local firstIndex = 0
  local lastIndex = 0
  local pageSpells = {}

  if #spells > 0 then
    firstIndex = (panelState.currentPage - 1) * panelState.pageSize + 1
    lastIndex = math.min(firstIndex + panelState.pageSize - 1, #spells)

    for index = firstIndex, lastIndex do
      table.insert(pageSpells, spells[index])
    end
  end

  return pageSpells, firstIndex, lastIndex
end

local function setSkillIcon(widget, spell)
  widget:setImageSource(spell and spell.iconSource or '/images/game/spells/cooldowns')
  widget:setImageClip(spell and spell.iconClip or CATEGORY_ICON_CLIPS.Utilidade)
end

local function buildSkillStatusText(spell)
  local notes = {}
  local statusInfo = spell.statusInfo or buildStatusInfo('indisponivel', '-')

  table.insert(notes, statusInfo.detail)

  if spell.dataSource == 'xml' then
    table.insert(notes, 'Dados carregados do spells.xml.')
  else
    table.insert(notes, 'Dados em fallback do client.')
  end

  if spell.iconGeneric then
    table.insert(notes, 'Icone generico por categoria.')
  end

  if spell.needWeapon then
    table.insert(notes, 'Estrutura pronta para isSkillAvailableByWeapon(skill, equippedWeapon).')
  end

  return table.concat(notes, ' ')
end

local function getSkillDisplayName(spell)
  if not spell or not spell.name then
    return '-'
  end

  local spellName = tostring(spell.name)
  if spellName:trim():len() == 0 then
    return '-'
  end

  return spellName
end

local function getDisplayText(value)
  if value == nil then
    return '-'
  end

  local text = tostring(value)
  if text:trim():len() == 0 then
    return '-'
  end

  return text
end

local function setWidgetPassThrough(widget)
  if not widget then
    return
  end

  pcall(function()
    widget:setPhantom(true)
  end)
  pcall(function()
    widget:setFocusable(false)
  end)

  if not widget.getChildren then
    return
  end

  for _, child in ipairs(widget:getChildren()) do
    setWidgetPassThrough(child)
  end
end

local function getDetailContentWidth()
  local baseWidth = 440

  if ui.detailPanel and ui.detailPanel.getWidth and ui.detailPanel:getWidth() > 0 then
    baseWidth = ui.detailPanel:getWidth() - 16
  elseif ui.detailContent and ui.detailContent.getWidth and ui.detailContent:getWidth() > 0 then
    baseWidth = ui.detailContent:getWidth()
  end

  return math.max(baseWidth, 280)
end

local function refreshDetailContentLayout()
  if not ui.detailContent then
    return
  end

  if ui.detailContent.getLayout then
    local layout = ui.detailContent:getLayout()
    if layout and layout.update then
      layout:update()
    end
  end
end

local function createDetailText(styleName, parent, text, left, top, width, height, options)
  local widget = g_ui.createWidget(styleName, parent)
  widget:addAnchor(AnchorLeft, 'parent', AnchorLeft)
  widget:addAnchor(AnchorTop, 'parent', AnchorTop)
  widget:setMarginLeft(left or 0)
  widget:setMarginTop(top or 0)
  if width then
    widget:setWidth(width)
  end
  if height then
    widget:setHeight(height)
  end
  if options then
    if options.color then
      widget:setColor(options.color)
    end
    if options.font then
      widget:setFont(options.font)
    end
    if options.wrap ~= nil then
      widget:setTextWrap(options.wrap)
    end
    if options.align then
      widget:setTextAlign(options.align)
    end
  end
  widget:setText(getDisplayText(text))
  setWidgetPassThrough(widget)
  return widget
end

local function createDetailSection(parent, titleText, rows, options)
  options = options or {}

  local rowLabelWidth = options.labelWidth or 120
  local rowSpacing = options.rowSpacing or 4
  local titleHeight = 18
  local topPadding = 10
  local currentY = titleHeight + topPadding
  local contentWidth = math.max(getDetailContentWidth() - 16, 240)
  local sectionHeight = currentY + 8

  for _, row in ipairs(rows) do
    local rowHeight = row.height or 16
    sectionHeight = sectionHeight + rowHeight + rowSpacing
  end

  sectionHeight = math.max(sectionHeight - rowSpacing + 8, options.minHeight or 72)

  local section = g_ui.createWidget('SkillSectionCard', parent)
  section:setHeight(sectionHeight)
  section:setFocusable(false)
  section:setPhantom(true)

  createDetailText('SkillSectionTitle', section, titleText, 0, 0, contentWidth, titleHeight)

  for _, row in ipairs(rows) do
    local rowHeight = row.height or 16
    createDetailText('SkillDetailLabel', section, row.label, 0, currentY, rowLabelWidth, 16)
    createDetailText('SkillDetailValue', section, row.value, rowLabelWidth + 8, currentY, math.max(contentWidth - rowLabelWidth - 8, 120), rowHeight, {
      wrap = row.wrap == true
    })
    currentY = currentY + rowHeight + rowSpacing
  end

  setWidgetPassThrough(section)
  return section
end

local function getSkillWeaponTextForPanel(spell)
  local weaponText = getDisplayText(spell and spell.cachedWeaponRequirementText or nil)
  if weaponText ~= '-' then
    return weaponText
  end

  if spell and spell.needWeapon then
    return 'Ainda nao configurado.'
  end

  return 'Nao exige arma especifica neste placeholder.'
end

local function buildSkillEffectDescription(spell)
  if not spell then
    return nil
  end

  local description = getDisplayText(spell.cachedDescriptionText)
  if description ~= '-' then
    return description
  end

  local summary = {}

  if spell.category == 'Ofensiva' then
    table.insert(summary, 'Skill voltada para ataque ou pressao ofensiva.')
  elseif spell.category == 'Defensiva' then
    table.insert(summary, 'Skill voltada para protecao, cura ou sustentacao.')
  else
    table.insert(summary, 'Skill voltada para suporte, mobilidade ou utilidade.')
  end

  local targetText = getDisplayText(spell.cachedTargetText)
  if targetText ~= '-' then
    table.insert(summary, 'Uso: ' .. targetText .. '.')
  end

  local rangeText = getDisplayText(spell.cachedRangeText)
  if rangeText ~= '-' and rangeText ~= 'Proprio' and rangeText ~= 'Direcional' then
    table.insert(summary, 'Alcance: ' .. rangeText .. '.')
  end

  if spell.needWeapon then
    table.insert(summary, 'No placeholder atual, depende de arma equipada.')
  end

  if #summary == 0 then
    return nil
  end

  return table.concat(summary, ' ')
end

local function createSkillOverviewSection(parent, spell)
  local section = g_ui.createWidget('SkillSectionCard', parent)
  local contentWidth = math.max(getDetailContentWidth() - 16, 240)
  local metaTop = 78
  local leftColumnValueWidth = math.max(math.floor(contentWidth * 0.42), 96)
  local rightColumnLabelX = math.max(leftColumnValueWidth + 116, 208)
  local rightColumnValueX = rightColumnLabelX + 60
  local titleWidth = math.max(contentWidth - 76, 140)

  section:setHeight(100)
  section:setFocusable(false)
  section:setPhantom(true)

  createDetailText('SkillSectionTitle', section, 'Resumo', 0, 0, contentWidth, 18)

  local icon = g_ui.createWidget('UIWidget', section)
  icon:addAnchor(AnchorLeft, 'parent', AnchorLeft)
  icon:addAnchor(AnchorTop, 'parent', AnchorTop)
  icon:setMarginLeft(0)
  icon:setMarginTop(28)
  icon:setSize(tosize('54 54'))
  icon:setImageSize(tosize('40 40'))
  setSkillIcon(icon, spell)
  setWidgetPassThrough(icon)

  createDetailText('Label', section, spell.name, 66, 28, titleWidth, 18, {
    color = '#edf1f4',
    font = 'verdana-11px-rounded'
  })
  createDetailText('Label', section, spell.words, 66, 48, titleWidth, 24, {
    color = '#b3bbc4',
    font = 'verdana-11px-monochrome',
    wrap = true
  })

  createDetailText('SkillDetailLabel', section, 'Tipo:', 0, metaTop, 42, 16)
  createDetailText('SkillDetailValue', section, spell.type, 46, metaTop, leftColumnValueWidth, 16)

  createDetailText('SkillDetailLabel', section, 'Grupo:', rightColumnLabelX, metaTop, 56, 16)
  createDetailText('SkillDetailValue', section, spell.cachedGroupText, rightColumnValueX, metaTop, math.max(contentWidth - rightColumnValueX, 72), 16)

  createDetailText('SkillDetailLabel', section, 'Premium:', 0, metaTop + 20, 58, 16)
  createDetailText('SkillDetailValue', section, spell.premium ~= nil and formatYesNo(spell.premium) or '-', 62, metaTop + 20, leftColumnValueWidth, 16)

  setWidgetPassThrough(section)
  return section
end

local function createSkillRequirementsSection(parent, spell)
  local validationContext = getValidationContext()
  local statusInfo = spell.statusInfo or evaluateSkillStatusLive(spell, validationContext)
  local matchedItem, matchedHandLabel = getMatchingEquippedWeapon(spell, validationContext.equippedWeapon)
  local requirementRows = {
    {
      label = 'Status:',
      value = statusInfo.label,
      height = 22,
      wrap = true
    },
    {
      label = 'Arma:',
      value = getSkillWeaponTextForPanel(spell),
      height = 22,
      wrap = true
    },
    {
      label = 'Slot:',
      value = matchedItem and matchedHandLabel or 'Nao detectada equipada nas maos',
      height = 22,
      wrap = true
    },
    {
      label = 'Requisito:',
      value = statusInfo.detail,
      height = 34,
      wrap = true
    }
  }

  return createDetailSection(parent, 'Requisitos', requirementRows, {
    minHeight = 138,
    rowSpacing = 4
  })
end

local function createSkillDescriptionSection(parent, spell)
  local descriptionText = buildSkillEffectDescription(spell)
  if not descriptionText then
    return nil
  end

  local contentWidth = math.max(getDetailContentWidth() - 16, 240)
  local section = g_ui.createWidget('SkillSectionCard', parent)
  local textHeight = math.max(54, math.min(82, 18 + math.ceil(#descriptionText / 56) * 12))

  section:setHeight(textHeight + 34)
  section:setFocusable(false)
  section:setPhantom(true)

  createDetailText('SkillSectionTitle', section, 'O que faz', 0, 0, contentWidth, 18)
  createDetailText('SkillDetailValue', section, descriptionText, 0, 28, contentWidth, textHeight, {
    wrap = true
  })

  setWidgetPassThrough(section)
  return section
end

local function scheduleAutoSelection(entry)
  if not entry or not entry.skillData then
    return
  end

  addEvent(function()
    if not ui.skillsList or not entry.getParent or entry:getParent() ~= ui.skillsList then
      return
    end

    selectSkill(entry.skillData, entry, 'auto')
  end)
end

local function clearSelection()
  if panelState.selectedListEntry then
    panelState.selectedListEntry:setBackgroundColor(SKILL_ENTRY_DEFAULT_STYLE.background)
    panelState.selectedListEntry:setBorderColor(SKILL_ENTRY_DEFAULT_STYLE.border)
    panelState.selectedListEntry:setChecked(false)
    panelState.selectedListEntry = nil
  end
end

local function getFirstVisibleSkillEntry()
  if not ui.skillsList or not ui.skillsList.getChildren then
    return nil
  end

  for _, child in ipairs(ui.skillsList:getChildren()) do
    if child.skillData then
      return child
    end
  end

  return nil
end

local function renderSkillDetails(spell)
  printSkillsPanel(string.format('[SkillsPanel] rendering details: %s', getSkillDisplayName(spell)))
  panelState.selectedSkill = spell

  if not ui.detailContent then
    if ui.fixBarButton then
      ui.fixBarButton:disable()
    end
    return
  end

  if not spell then
    local emptyDetailKey = buildDetailRenderKey(nil)
    if panelState.detailRenderKey == emptyDetailKey then
      return
    end

    panelState.detailRenderKey = emptyDetailKey
    ui.detailContent:destroyChildren()
    if ui.fixBarButton then
      ui.fixBarButton:disable()
    end

    createDetailSection(ui.detailContent, 'Detalhes e disponibilidade', {
      {
        label = 'Status:',
        value = 'Nenhuma skill selecionada.',
        height = 32,
        wrap = true
      }
    }, {
      minHeight = 84
    })
    refreshDetailContentLayout()
    return
  end

  if ui.fixBarButton then
    ui.fixBarButton:enable()
  end

  spell.statusInfo = evaluateSkillStatusLive(spell)
  local detailRenderKey = buildDetailRenderKey(spell)
  if panelState.selectedListEntry and panelState.selectedListEntry.skillData == spell and panelState.selectedListEntry.statusBadge then
    setStatusBadge(panelState.selectedListEntry.statusBadge, spell.statusInfo)
  end

  if panelState.detailRenderKey == detailRenderKey then
    return
  end

  panelState.detailRenderKey = detailRenderKey
  ui.detailContent:destroyChildren()

  createSkillOverviewSection(ui.detailContent, spell)
  local spacer = g_ui.createWidget('Panel', ui.detailContent)
  spacer:setHeight(6)
  spacer:setFocusable(false)
  spacer:setPhantom(true)
  createSkillRequirementsSection(ui.detailContent, spell)
  createSkillDescriptionSection(ui.detailContent, spell)
  refreshDetailContentLayout()
end

local function updateDetailPanel(spell)
  renderSkillDetails(spell)
end

local function selectSkill(spell, widget, source)
  clearSelection()

  panelState.selectedSkillUid = spell and spell.uid or nil
  panelState.selectedSkill = spell

  if spell and spell.name then
    printSkillsPanel(string.format('[SkillsPanel] selected: %s', spell.name))
  end

  if spell and isFrozenArrowSkill(spell) then
    local available, detail = isSkillAvailableByWeapon(spell, getEquippedWeaponContext())
    logFrozenArrowValidation(spell, 'selection', available, detail, getEquippedWeaponContext())
  end

  local okUpdate, updateError = pcall(updateDetailPanel, spell)
  if not okUpdate then
    g_logger.error('[SkillsPanel] failed to update detail panel: ' .. tostring(updateError))
  end

  if widget then
    local okFocus, focusError = pcall(function()
      widget:focus()
    end)
    if not okFocus then
      g_logger.error('[SkillsPanel] failed to focus selected skill: ' .. tostring(focusError))
    end

    widget:setBackgroundColor(SKILL_ENTRY_SELECTED_STYLE.background)
    widget:setBorderColor(SKILL_ENTRY_SELECTED_STYLE.border)
    widget:setChecked(true)
    panelState.selectedListEntry = widget
    if spell and spell.statusInfo and widget.statusBadge then
      setStatusBadge(widget.statusBadge, spell.statusInfo)
    end
    local okScroll, scrollError = pcall(function()
      ui.skillsList:ensureChildVisible(widget, { y = 6 })
    end)
    if not okScroll then
      g_logger.error('[SkillsPanel] failed to ensure selected skill visible: ' .. tostring(scrollError))
    end
  end
end

local function activateSkillEntry(widget, source)
  if not widget or not widget.skillData then
    return false
  end

  selectSkill(widget.skillData, widget, source)
  return true
end

local function handleSkillEntryMouseRelease(widget, mousePos, mouseButton, source)
  if not widget or not widget.skillData then
    return false
  end

  if mouseButton ~= MouseLeftButton then
    return false
  end

  printSkillsPanel(string.format('[SkillsPanel] clicked card: %s', getSkillDisplayName(widget.skillData)))
  return activateSkillEntry(widget, source or 'click')
end

local function createCategoryHeader(parent, categoryName, count)
  local header = g_ui.createWidget('SkillCategoryHeader', parent)
  header:setText(string.format('%s (%d)', CATEGORY_HEADER_LABELS[categoryName] or categoryName, count))
  return header
end

local function createSkillEntry(parent, spell)
  local entry = g_ui.createWidget('SkillListEntry', parent)
  entry.skillData = spell
  entry:setFocusable(true)
  entry:setBackgroundColor(SKILL_ENTRY_DEFAULT_STYLE.background)
  entry:setBorderColor(SKILL_ENTRY_DEFAULT_STYLE.border)
  entry.nameLabel:setText(spell.name)
  entry.wordsLabel:setText(spell.words and spell.words:len() > 0 and spell.words or '-')
  entry.manaChip:setText(spell.cachedManaChipText)
  entry.cooldownChip:setText(spell.cachedCooldownChipText)
  entry.levelChip:setText(spell.cachedLevelChipText)
  setSkillIcon(entry.icon, spell)
  setCategoryBadge(entry.categoryBadge, spell.category)
  setStatusBadge(entry.statusBadge, spell.statusInfo)
  setWidgetPassThrough(entry.icon)
  setWidgetPassThrough(entry.nameLabel)
  setWidgetPassThrough(entry.categoryBadge)
  setWidgetPassThrough(entry.wordsLabel)
  setWidgetPassThrough(entry.statusBadge)
  setWidgetPassThrough(entry.manaChip)
  setWidgetPassThrough(entry.cooldownChip)
  setWidgetPassThrough(entry.levelChip)
  entry.onMousePress = function(widget, mousePos, mouseButton)
    return mouseButton == MouseLeftButton
  end
  entry.onMouseRelease = function(widget, mousePos, mouseButton)
    return handleSkillEntryMouseRelease(widget, mousePos, mouseButton, 'click')
  end
  entry.onTouchRelease = function(widget, mousePos, mouseButton)
    return handleSkillEntryMouseRelease(widget, mousePos, mouseButton or MouseLeftButton, 'touch')
  end

  return entry
end

local function getCurrentCategoryFilterLabel()
  if panelState.categoryFilter == CATEGORY_FILTER_ALL then
    return 'Todas'
  end

  return CATEGORY_HEADER_LABELS[panelState.categoryFilter] or panelState.categoryFilter
end

local function getCurrentSearchSuffix()
  if not hasActiveSearchText() then
    return ''
  end

  return string.format(' | Busca "%s"', panelState.searchText)
end

local function updateListHeader(filteredCount, baseCount, firstIndex, lastIndex)
  local tabLabel = panelState.activeTab == TAB_ALL and 'Todas as Skills' or 'Skills Disponiveis'
  local filterLabel = getCurrentCategoryFilterLabel()

  ui.listTitleLabel:setText(tabLabel)

  if filteredCount == 0 then
    ui.listResultLabel:setText(string.format('Nenhum resultado | Filtro %s%s.', filterLabel, getCurrentSearchSuffix()))
    return
  end

  if panelState.categoryFilter == CATEGORY_FILTER_ALL then
    ui.listResultLabel:setText(string.format('Mostrando %d-%d de %d | Pagina %d/%d%s.', firstIndex, lastIndex, filteredCount, panelState.currentPage, panelState.totalPages, getCurrentSearchSuffix()))
  else
    ui.listResultLabel:setText(string.format('Mostrando %d-%d de %d | Base %d | %s%s.', firstIndex, lastIndex, filteredCount, baseCount, filterLabel, getCurrentSearchSuffix()))
  end
end

local function updateTabHint(filteredCount, baseCount)
  local context = panelState.validationContext or getValidationContext()

  if panelState.activeTab == TAB_ALL then
    ui.tabHintLabel:setText(string.format('Dados em cache. Todas as Skills usa %d skills reais e renderiza %d por pagina com filtro visual %s.', baseCount, panelState.pageSize, getCurrentCategoryFilterLabel()))
    return
  end

  if not context.player then
    ui.tabHintLabel:setText('Sistema de skills por arma ainda nao configurado. Esta aba exibira apenas as skills compativeis com a arma equipada. Entre no jogo para validar vocacao, nivel, premium e arma.')
    return
  end

  local vocationName = VocationNames and VocationNames[context.player:getVocation()] or 'Desconhecida'
  ui.tabHintLabel:setText(string.format('Sistema de skills por arma ainda nao configurado. Esta aba exibira apenas as skills compativeis com a arma equipada. Cache atual: %d de %d skills liberadas para %s nivel %d.', filteredCount, baseCount, vocationName, context.player:getLevel()))
end

local function buildEmptyListText()
  if panelState.activeTab == TAB_AVAILABLE and (not panelState.validationContext or not panelState.validationContext.player) then
    return 'Entre no jogo para usar a aba Skills Disponiveis.'
  end

  if hasActiveSearchText() then
    return 'Nenhuma skill encontrada para a busca atual.'
  end

  if panelState.activeTab == TAB_AVAILABLE then
    return 'Nenhuma skill liberada com os filtros atuais.'
  end

  return 'Nenhuma skill encontrada com os filtros atuais.'
end

local function updatePageControls(filteredCount)
  ensurePageInRange(filteredCount)
  ui.pageInfoLabel:setText(string.format('Pagina %d/%d', panelState.currentPage, panelState.totalPages))

  if filteredCount <= 0 or panelState.currentPage <= 1 then
    ui.previousPageButton:disable()
  else
    ui.previousPageButton:enable()
  end

  if filteredCount <= 0 or panelState.currentPage >= panelState.totalPages then
    ui.nextPageButton:disable()
  else
    ui.nextPageButton:enable()
  end
end

local function populateSkillList(preferredUid, baseCount, filteredCount, pageSpells, firstIndex, lastIndex)
  ui.skillsList:destroyChildren()
  panelState.selectedListEntry = nil
  panelState.currentPageSpells = pageSpells

  updatePageControls(filteredCount)
  updateListHeader(filteredCount, baseCount, firstIndex, lastIndex)
  ui.dataSourceLabel:setText(panelState.dataSourceLabel)
  updateTabHint(filteredCount, baseCount)

  local firstEntry = nil
  local preferredEntry = nil

  if panelState.categoryFilter == CATEGORY_FILTER_ALL then
    local grouped = {
      Ofensiva = {},
      Defensiva = {},
      Utilidade = {}
    }

    for _, spell in ipairs(pageSpells) do
      local bucket = grouped[spell.category] or grouped.Utilidade
      table.insert(bucket, spell)
    end

    for _, category in ipairs(CATEGORY_ORDER) do
      local categorySpells = grouped[category]
      if #categorySpells > 0 then
        createCategoryHeader(ui.skillsList, category, #categorySpells)
        for _, spell in ipairs(categorySpells) do
          local entry = createSkillEntry(ui.skillsList, spell)
          if not firstEntry then
            firstEntry = entry
          end
          if preferredUid and spell.uid == preferredUid then
            preferredEntry = entry
          end
        end
      end
    end
  else
    for _, spell in ipairs(pageSpells) do
      local entry = createSkillEntry(ui.skillsList, spell)
      if not firstEntry then
        firstEntry = entry
      end
      if preferredUid and spell.uid == preferredUid then
        preferredEntry = entry
      end
    end
  end

  if not firstEntry then
    local emptyLabel = g_ui.createWidget('SkillEmptyLabel', ui.skillsList)
    emptyLabel:setText(buildEmptyListText())
    panelState.selectedSkillUid = nil
    panelState.forceSelectFirstVisible = false
    updateDetailPanel(nil)
    return
  end

  local targetEntry = nil
  if panelState.forceSelectFirstVisible then
    targetEntry = firstEntry
  else
    targetEntry = preferredEntry or firstEntry
  end

  panelState.forceSelectFirstVisible = false
  scheduleAutoSelection(targetEntry)
end

local function refreshDisplayedSkills(forceRefresh)
  ensureSkillsLoaded(false)
  ensureValidationCache(false)

  local listCache = getActiveListCache()
  local baseSpells = listCache.base or {}
  local filteredSpells = getFilteredSpellsForCurrentState(listCache)
  local pageSpells, firstIndex, lastIndex = buildPageSlice(filteredSpells)
  local preferredUid = panelState.selectedSkillUid
  local contextKey = panelState.validationContextKey or 'offline'
  local renderKey = table.concat({
    tostring(panelState.listRevision),
    panelState.activeTab,
    panelState.categoryFilter,
    tostring(panelState.currentPage),
    tostring(#filteredSpells),
    contextKey
  }, '|')

  panelState.displayedSpells = filteredSpells

  if not forceRefresh and not panelState.needsListRefresh and panelState.renderKey == renderKey then
    updatePageControls(#filteredSpells)
    updateListHeader(#filteredSpells, #baseSpells, firstIndex, lastIndex)
    ui.dataSourceLabel:setText(panelState.dataSourceLabel)
    updateTabHint(#filteredSpells, #baseSpells)

    if panelState.forceSelectFirstVisible then
      local firstEntry = getFirstVisibleSkillEntry()
      if firstEntry then
        panelState.forceSelectFirstVisible = false
        scheduleAutoSelection(firstEntry)
      else
        panelState.forceSelectFirstVisible = false
        updateDetailPanel(nil)
      end
    elseif panelState.selectedSkill then
      updateDetailPanel(panelState.selectedSkill)
    else
      updateDetailPanel(nil)
    end
    return
  end

  populateSkillList(preferredUid, #baseSpells, #filteredSpells, pageSpells, firstIndex, lastIndex)
  panelState.renderKey = renderKey
  panelState.needsListRefresh = false
end

local function cacheWidgets()
  ui.tabAllSkills = skillsPanelWindow:recursiveGetChildById('tabAllSkills')
  ui.tabAvailableSkills = skillsPanelWindow:recursiveGetChildById('tabAvailableSkills')
  ui.filterAllCategories = skillsPanelWindow:recursiveGetChildById('filterAllCategories')
  ui.filterOffensiveCategory = skillsPanelWindow:recursiveGetChildById('filterOffensiveCategory')
  ui.filterDefensiveCategory = skillsPanelWindow:recursiveGetChildById('filterDefensiveCategory')
  ui.filterUtilityCategory = skillsPanelWindow:recursiveGetChildById('filterUtilityCategory')
  ui.previousPageButton = skillsPanelWindow:recursiveGetChildById('previousPageButton')
  ui.nextPageButton = skillsPanelWindow:recursiveGetChildById('nextPageButton')
  ui.pageInfoLabel = skillsPanelWindow:recursiveGetChildById('pageInfoLabel')
  ui.tabHintLabel = skillsPanelWindow:recursiveGetChildById('tabHintLabel')
  ui.skillsList = skillsPanelWindow:recursiveGetChildById('skillsList')
  ui.listTitleLabel = skillsPanelWindow:recursiveGetChildById('listTitleLabel')
  ui.listResultLabel = skillsPanelWindow:recursiveGetChildById('listResultLabel')
  ui.searchInput = skillsPanelWindow:recursiveGetChildById('searchInput')
  ui.detailPanel = skillsPanelWindow:recursiveGetChildById('detailPanel')
  ui.detailContent = skillsPanelWindow:recursiveGetChildById('detailContent')
  ui.detailScrollBar = skillsPanelWindow:recursiveGetChildById('detailScrollBar')
  ui.selectedSkillIcon = skillsPanelWindow:recursiveGetChildById('selectedSkillIcon')
  ui.selectedSkillName = skillsPanelWindow:recursiveGetChildById('selectedSkillName')
  ui.selectedSkillWords = skillsPanelWindow:recursiveGetChildById('selectedSkillWords')
  ui.selectedSkillMeta = skillsPanelWindow:recursiveGetChildById('selectedSkillMeta')
  ui.selectedSkillCategoryBadge = skillsPanelWindow:recursiveGetChildById('selectedSkillCategoryBadge')
  ui.selectedSkillStatusBadge = skillsPanelWindow:recursiveGetChildById('selectedSkillStatusBadge')
  ui.rightHandItem = skillsPanelWindow:recursiveGetChildById('rightHandItem')
  ui.leftHandItem = skillsPanelWindow:recursiveGetChildById('leftHandItem')
  ui.rightHandLabel = skillsPanelWindow:recursiveGetChildById('rightHandLabel')
  ui.leftHandLabel = skillsPanelWindow:recursiveGetChildById('leftHandLabel')
  ui.equippedItemPreview = skillsPanelWindow:recursiveGetChildById('equippedItemPreview')
  ui.equippedItemLabel = skillsPanelWindow:recursiveGetChildById('equippedItemLabel')
  ui.equippedItemHint = skillsPanelWindow:recursiveGetChildById('equippedItemHint')
  ui.detailCostManaValue = skillsPanelWindow:recursiveGetChildById('detailCostManaValue')
  ui.detailCostCooldownValue = skillsPanelWindow:recursiveGetChildById('detailCostCooldownValue')
  ui.detailCostGroupValue = skillsPanelWindow:recursiveGetChildById('detailCostGroupValue')
  ui.detailRequirementLevelValue = skillsPanelWindow:recursiveGetChildById('detailRequirementLevelValue')
  ui.detailRequirementPremiumValue = skillsPanelWindow:recursiveGetChildById('detailRequirementPremiumValue')
  ui.detailRequirementWeaponValue = skillsPanelWindow:recursiveGetChildById('detailRequirementWeaponValue')
  ui.detailRequirementVocationValue = skillsPanelWindow:recursiveGetChildById('detailRequirementVocationValue')
  ui.detailInfoTypeValue = skillsPanelWindow:recursiveGetChildById('detailInfoTypeValue')
  ui.detailInfoTargetValue = skillsPanelWindow:recursiveGetChildById('detailInfoTargetValue')
  ui.detailInfoRangeValue = skillsPanelWindow:recursiveGetChildById('detailInfoRangeValue')
  ui.detailInfoDescriptionValue = skillsPanelWindow:recursiveGetChildById('detailInfoDescriptionValue')
  ui.detailStatusLabel = skillsPanelWindow:recursiveGetChildById('detailStatusLabel')
  ui.dataSourceLabel = skillsPanelWindow:recursiveGetChildById('dataSourceLabel')
  ui.fixBarButton = skillsPanelWindow:recursiveGetChildById('fixBarButton')
end

local function setTabButtons()
  ui.tabAllSkills:setOn(panelState.activeTab == TAB_ALL)
  ui.tabAvailableSkills:setOn(panelState.activeTab == TAB_AVAILABLE)
end

local function setCategoryFilterButtons()
  ui.filterAllCategories:setOn(panelState.categoryFilter == CATEGORY_FILTER_ALL)
  ui.filterOffensiveCategory:setOn(panelState.categoryFilter == 'Ofensiva')
  ui.filterDefensiveCategory:setOn(panelState.categoryFilter == 'Defensiva')
  ui.filterUtilityCategory:setOn(panelState.categoryFilter == 'Utilidade')
end

local function resetToFirstPage()
  panelState.currentPage = 1
end

function onSearchTextChange(widget)
  local nextSearchText = normalizeSearchText(widget and widget:getText() or '')
  if panelState.searchText == nextSearchText then
    return
  end

  panelState.searchText = nextSearchText
  resetToFirstPage()
  panelState.forceSelectFirstVisible = true
  markListDirty()
  refreshDisplayedSkills(false)
end

local function setCategoryFilter(filterKey)
  if panelState.categoryFilter ~= filterKey then
    panelState.categoryFilter = filterKey
    resetToFirstPage()
    panelState.forceSelectFirstVisible = true
    markListDirty()
  end

  setCategoryFilterButtons()
  refreshDisplayedSkills(false)
end

function selectAllTab()
  if panelState.activeTab ~= TAB_ALL then
    panelState.activeTab = TAB_ALL
    resetToFirstPage()
    panelState.forceSelectFirstVisible = true
    markListDirty()
  end

  setTabButtons()
  refreshDisplayedSkills(false)
end

function selectAvailableTab()
  if panelState.activeTab ~= TAB_AVAILABLE then
    panelState.activeTab = TAB_AVAILABLE
    resetToFirstPage()
    panelState.forceSelectFirstVisible = true
    markListDirty()
  end

  setTabButtons()
  refreshDisplayedSkills(false)
end

function selectAllCategoriesFilter()
  setCategoryFilter(CATEGORY_FILTER_ALL)
end

function selectOffensiveCategoryFilter()
  setCategoryFilter('Ofensiva')
end

function selectDefensiveCategoryFilter()
  setCategoryFilter('Defensiva')
end

function selectUtilityCategoryFilter()
  setCategoryFilter('Utilidade')
end

function selectPreviousPage()
  if panelState.currentPage <= 1 then
    return
  end

  panelState.currentPage = panelState.currentPage - 1
  panelState.forceSelectFirstVisible = true
  markListDirty()
  refreshDisplayedSkills(false)
end

function selectNextPage()
  if panelState.currentPage >= panelState.totalPages then
    return
  end

  panelState.currentPage = panelState.currentPage + 1
  panelState.forceSelectFirstVisible = true
  markListDirty()
  refreshDisplayedSkills(false)
end

local function onClientCommand(message)
  local lowered = message:lower():trim()
  if lowered == '/skillpanel' or lowered == '!skillpanel' or lowered == '/painelskills' then
    toggle()
    return true
  end

  return false
end

local function online()
  invalidateValidationCache()

  if skillsPanelWindow:isVisible() then
    refreshDisplayedSkills(false)
  end
end

local function offline()
  invalidateValidationCache()

  if skillsPanelWindow:isVisible() then
    hide()
  end
end

local function onInventoryChange(localPlayer, slot, item, oldItem)
  if slot ~= InventorySlotRight and slot ~= InventorySlotLeft and slot ~= InventorySlotOther then
    return
  end

  local slotKey = buildItemIdentityKey(item)
  if panelState.inventorySlotKeys[slot] == slotKey then
    return
  end

  panelState.inventorySlotKeys[slot] = slotKey
  printSkillsPanel(string.format('[SkillsPanel] inventory change slot %s: %s', tostring(slot), formatEquippedItemDebug(item)))

  invalidateValidationCache()

  if skillsPanelWindow:isVisible() then
    refreshDisplayedSkills(false)
  end
end

local function onLevelChange()
  invalidateValidationCache()

  if skillsPanelWindow:isVisible() then
    refreshDisplayedSkills(false)
  end
end

function init()
  g_ui.importStyle('/modules/game_custom_skillbar/modern_skill_theme.otui')

  connect(g_game, {
    onGameStart = online,
    onGameEnd = offline
  })
  connect(LocalPlayer, {
    onInventoryChange = onInventoryChange,
    onLevelChange = onLevelChange
  })

  g_keyboard.bindKeyDown('Ctrl+Shift+K', toggle)

  skillsPanelWindow = g_ui.displayUI('skills_panel')
  skillsPanelWindow:hide()
  cacheWidgets()

  skillsPanelButton = modules.client_topmenu.addRightGameToggleButton(
    'skillsPanelButton',
    'Painel de Skills (Ctrl+Shift+K)',
    '/images/topbuttons/spelllist',
    toggle,
    false,
    6
  )
  skillsPanelButton:setOn(false)

  consoleCommandFilter = onClientCommand
  if modules.game_console and modules.game_console.addFilter then
    modules.game_console.addFilter(consoleCommandFilter)
  end

  ensureSkillsLoaded(false)
  setTabButtons()
  setCategoryFilterButtons()
  updatePageControls(0)
  updateDetailPanel(nil)
end

function terminate()
  disconnect(g_game, {
    onGameStart = online,
    onGameEnd = offline
  })
  disconnect(LocalPlayer, {
    onInventoryChange = onInventoryChange,
    onLevelChange = onLevelChange
  })

  g_keyboard.unbindKeyDown('Ctrl+Shift+K')

  if modules.game_console and modules.game_console.removeFilter and consoleCommandFilter then
    modules.game_console.removeFilter(consoleCommandFilter)
  end
  consoleCommandFilter = nil

  if skillsPanelWindow then
    skillsPanelWindow:destroy()
    skillsPanelWindow = nil
  end

  if skillsPanelButton then
    skillsPanelButton:destroy()
    skillsPanelButton = nil
  end
end

function show()
  ensureSkillsLoaded(false)
  setTabButtons()
  setCategoryFilterButtons()
  panelState.forceSelectFirstVisible = true
  skillsPanelWindow:show()
  if panelState.selectedSkill and isFrozenArrowSkill(panelState.selectedSkill) then
    local equippedWeapon = getEquippedWeaponContext()
    local available, detail = isSkillAvailableByWeapon(panelState.selectedSkill, equippedWeapon)
    logFrozenArrowValidation(panelState.selectedSkill, 'panel-open', available, detail, equippedWeapon)
  end
  skillsPanelWindow:raise()
  skillsPanelWindow:focus()
  if ui.detailScrollBar then
    ui.detailScrollBar:setValue(ui.detailScrollBar:getMinimum())
  end
  refreshDisplayedSkills(false)
  skillsPanelButton:setOn(true)
end

function hide()
  if not skillsPanelWindow then
    return
  end

  skillsPanelWindow:hide()
  if skillsPanelButton then
    skillsPanelButton:setOn(false)
  end
end

function toggle()
  if not skillsPanelWindow then
    return
  end

  if skillsPanelWindow:isVisible() then
    hide()
  else
    show()
  end
end

function onFixButtonClick()
  if not panelState.selectedSkill then
    return
  end

  if not modules.game_custom_skillbar or not modules.game_custom_skillbar.openSkillChooserForSkill then
    displayInfoBox(
      'Fixar na barra',
      'A Custom Skill Bar nao esta disponivel no momento.'
    )
    return
  end

  modules.game_custom_skillbar.openSkillChooserForSkill(panelState.selectedSkill)
end
