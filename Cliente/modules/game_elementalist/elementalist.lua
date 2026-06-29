local OPCODE = 110

local ELEMENT_NONE = 0
local ELEMENT_FIRE = 1
local ELEMENT_WATER = 2
local ELEMENT_EARTH = 3
local ELEMENT_AIR = 4

local ELEMENT_ORDER = {
  ELEMENT_FIRE,
  ELEMENT_WATER,
  ELEMENT_EARTH,
  ELEMENT_AIR
}

local window = nil
local button = nil

local feedbackLabel = nil
local primaryValueLabel = nil
local secondaryValueLabel = nil

local unlockedSkillsList = nil
local blockedSkillsList = nil
local unlockedEmptyLabel = nil
local blockedEmptyLabel = nil

local skillNameValueLabel = nil
local skillWordsValueLabel = nil
local skillElementValueLabel = nil
local skillStatusValueLabel = nil
local skillRequirementRow = nil
local skillRequirementValueLabel = nil
local skillEffectRow = nil
local skillEffectValueLabel = nil
local skillManaRow = nil
local skillManaValueLabel = nil
local skillCooldownRow = nil
local skillCooldownValueLabel = nil
local skillLevelRow = nil
local skillLevelValueLabel = nil
local skillDescriptionValueLabel = nil

local cards = {}
local selectedSkillKey = nil

local state = {
  selected = {},
  serverPrimary = ELEMENT_NONE,
  serverSecondary = ELEMENT_NONE,
  initialized = false,
  serverSkills = {},
  currentSkills = {}
}

local ELEMENTS = {
  [ELEMENT_FIRE] = {
    name = "Fogo",
    short = "FO",
    description = "Dano explosivo, queimadura e pressao ofensiva.",
    color = "#ff9a4d",
    widgetId = "fireCard"
  },
  [ELEMENT_WATER] = {
    name = "Agua",
    short = "AG",
    description = "Cura, regeneracao, gelo e sustentacao.",
    color = "#5cb8ff",
    widgetId = "waterCard"
  },
  [ELEMENT_EARTH] = {
    name = "Terra",
    short = "TE",
    description = "Defesa, controle, natureza e resistencia.",
    color = "#8ad26d",
    widgetId = "earthCard"
  },
  [ELEMENT_AIR] = {
    name = "Ar",
    short = "AR",
    description = "Velocidade, raio, mobilidade e reducao de tempo.",
    color = "#e6d36c",
    widgetId = "airCard"
  }
}

-- Configure aqui as skills exibidas por elemento na interface elemental.
-- Campos opcionais aceitos por skill:
-- words, description, mana, cooldown, level e requirement.
local ELEMENTAL_SKILLS = {
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

local function getProtocolGame()
  return g_game.getProtocolGame()
end

local function trim(text)
  if type(text) ~= "string" then
    return ""
  end

  return (text:gsub("^%s+", ""):gsub("%s+$", ""))
end

local function normalizeIdentityText(text)
  return trim(text):lower()
end

local function copyTable(source)
  local result = {}

  for key, value in pairs(source or {}) do
    result[key] = value
  end

  return result
end

local function mergeTables(...)
  local merged = {}

  for index = 1, select("#", ...) do
    local source = select(index, ...)
    for key, value in pairs(source or {}) do
      merged[key] = value
    end
  end

  return merged
end

local function getElementName(elementId)
  local element = ELEMENTS[elementId]
  return element and element.name or "Nenhum"
end

local function getElementColor(elementId)
  local element = ELEMENTS[elementId]
  return element and element.color or "#ffffff"
end

local function getSelectedIndex(elementId)
  for index, selectedId in ipairs(state.selected) do
    if selectedId == elementId then
      return index
    end
  end

  return nil
end

local function isSelectionSameAsServer()
  return (state.selected[1] or ELEMENT_NONE) == state.serverPrimary
    and (state.selected[2] or ELEMENT_NONE) == state.serverSecondary
end

local function setFeedback(message, tone)
  if not feedbackLabel then
    return
  end

  message = message or ""
  feedbackLabel:setText(message)
  feedbackLabel:setVisible(message ~= "")

  if tone == "error" then
    feedbackLabel:setColor("#ff7d7d")
  elseif tone == "warning" then
    feedbackLabel:setColor("#f0c674")
  elseif tone == "success" then
    feedbackLabel:setColor("#92d36e")
  else
    feedbackLabel:setColor("#d8d8d8")
  end
end

local function buildSkillKey(skill)
  return string.format(
    "%s|%s|%s",
    normalizeIdentityText(skill.name),
    normalizeIdentityText(skill.words),
    tostring(tonumber(skill.element) or ELEMENT_NONE)
  )
end

local function findSkillTemplate(skillData)
  local targetName = normalizeIdentityText(skillData and skillData.name)
  local targetWords = normalizeIdentityText(skillData and skillData.words)
  local targetElement = tonumber(skillData and skillData.element) or ELEMENT_NONE

  local function matches(template, elementId)
    if targetElement > ELEMENT_NONE and targetElement ~= elementId then
      return false
    end

    if targetName ~= "" and normalizeIdentityText(template.name) == targetName then
      return true
    end

    if targetWords ~= "" and normalizeIdentityText(template.words) == targetWords then
      return true
    end

    return false
  end

  if targetElement > ELEMENT_NONE then
    for _, template in ipairs(ELEMENTAL_SKILLS[targetElement] or {}) do
      if matches(template, targetElement) then
        return mergeTables(template, { element = targetElement })
      end
    end
  end

  for _, elementId in ipairs(ELEMENT_ORDER) do
    for _, template in ipairs(ELEMENTAL_SKILLS[elementId] or {}) do
      if matches(template, elementId) then
        return mergeTables(template, { element = elementId })
      end
    end
  end

  return nil
end

local function findSpellInfo(skillData)
  if not SpellInfo then
    return nil, nil, nil
  end

  local targetName = trim(skillData and skillData.name)
  if targetName ~= "" then
    for profile, spells in pairs(SpellInfo) do
      if spells[targetName] then
        return spells[targetName], profile, targetName
      end
    end
  end

  local targetWords = normalizeIdentityText(skillData and skillData.words)
  if targetWords ~= "" then
    for profile, spells in pairs(SpellInfo) do
      for spellName, spellData in pairs(spells) do
        if normalizeIdentityText(spellData.words) == targetWords then
          return spellData, profile, spellName
        end
      end
    end
  end

  return nil, nil, nil
end

local function formatSeconds(milliseconds)
  local seconds = tonumber(milliseconds)
  if not seconds then
    return nil
  end

  seconds = seconds / 1000
  if seconds == math.floor(seconds) then
    return string.format("%ds", seconds)
  end

  return string.format("%.1fs", seconds)
end

local function buildManaText(skill)
  if skill.mana == nil or skill.mana == "" then
    return nil
  end

  local manaText = tostring(skill.mana)
  local soul = skill.soul

  if soul ~= nil and tostring(soul) ~= "" and tostring(soul) ~= "0" then
    manaText = string.format("%s + %s alma", manaText, tostring(soul))
  end

  return manaText
end

local function buildCooldownText(skill)
  if type(skill.cooldown) == "string" and trim(skill.cooldown) ~= "" then
    return skill.cooldown
  end

  if tonumber(skill.cooldown) then
    local numericCooldown = tonumber(skill.cooldown)
    if numericCooldown >= 100 then
      return formatSeconds(numericCooldown)
    end

    if numericCooldown == math.floor(numericCooldown) then
      return string.format("%ds", numericCooldown)
    end

    return string.format("%.1fs", numericCooldown)
  end

  if tonumber(skill.exhaustion) then
    return formatSeconds(skill.exhaustion)
  end

  return nil
end

local function buildLevelText(skill)
  if skill.level == nil or skill.level == "" then
    return nil
  end

  return tostring(skill.level)
end

local function buildRequirementText(skill)
  if skill.requirement and trim(skill.requirement) ~= "" then
    return skill.requirement
  end

  if skill.element and skill.element > ELEMENT_NONE then
    return string.format("Elemento necessario: %s", getElementName(skill.element))
  end

  return "Configuracao elemental necessaria."
end

local function buildEffectText(skill)
  if skill.effect == nil or skill.effect == "" then
    return nil
  end

  return tostring(skill.effect)
end

local function normalizeSkill(skillData)
  local template = findSkillTemplate(skillData or {})
  local spellData, spellProfile, spellName = findSpellInfo(skillData or template or {})
  local normalized = mergeTables(template, spellData, skillData)

  normalized.name = normalized.name or spellName or "Habilidade elemental"
  normalized.element = tonumber(normalized.element or (template and template.element)) or ELEMENT_NONE
  normalized.elementName = normalized.elementName or getElementName(normalized.element)
  normalized.description = normalized.description or "Descricao em preparacao."
  normalized.iconText = normalized.iconText or ((ELEMENTS[normalized.element] and ELEMENTS[normalized.element].short) or "*")
  normalized.iconColor = normalized.iconColor or getElementColor(normalized.element)
  normalized.spellProfile = normalized.spellProfile or spellProfile or "Default"
  normalized.key = buildSkillKey(normalized)

  return normalized
end

local function decorateSkillForSelection(skill)
  local decorated = copyTable(skill)
  decorated.isUnlocked = getSelectedIndex(decorated.element) ~= nil
  decorated.selectionOrder = getSelectedIndex(decorated.element) or 99
  decorated.elementOrder = decorated.element > ELEMENT_NONE and decorated.element or 99
  decorated.requirementText = buildRequirementText(decorated)
  decorated.effectText = buildEffectText(decorated)
  decorated.statusLabel = decorated.isUnlocked and "Liberada" or "Bloqueada"
  decorated.statusColor = decorated.isUnlocked and "#92d36e" or "#9f9f9f"
  decorated.manaText = buildManaText(decorated)
  decorated.cooldownText = buildCooldownText(decorated)
  decorated.levelText = buildLevelText(decorated)

  if decorated.isUnlocked then
    if decorated.words and trim(decorated.words) ~= "" then
      decorated.summaryText = "'" .. decorated.words .. "'"
    else
      decorated.summaryText = decorated.description
    end
  else
    decorated.summaryText = decorated.requirementText
  end

  return decorated
end

local function buildConfiguredSkills()
  local skills = {}

  for _, elementId in ipairs(ELEMENT_ORDER) do
    for _, template in ipairs(ELEMENTAL_SKILLS[elementId] or {}) do
      skills[#skills + 1] = normalizeSkill(mergeTables(template, { element = elementId }))
    end
  end

  return skills
end

local function findSkillIndex(skills, candidate)
  for index, skill in ipairs(skills) do
    if skill.key == candidate.key then
      return index
    end

    if normalizeIdentityText(skill.name) ~= "" and normalizeIdentityText(skill.name) == normalizeIdentityText(candidate.name) then
      return index
    end

    if normalizeIdentityText(skill.words) ~= "" and normalizeIdentityText(skill.words) == normalizeIdentityText(candidate.words) then
      return index
    end
  end

  return nil
end

local function buildSkillCollection(useServerSkills)
  local skills = buildConfiguredSkills()

  if useServerSkills and state.serverSkills and #state.serverSkills > 0 and isSelectionSameAsServer() then
    for _, serverSkillData in ipairs(state.serverSkills) do
      local serverSkill = normalizeSkill(serverSkillData)
      local existingIndex = findSkillIndex(skills, serverSkill)

      if existingIndex then
        skills[existingIndex] = normalizeSkill(mergeTables(skills[existingIndex], serverSkill))
      else
        skills[#skills + 1] = serverSkill
      end
    end
  end

  local decoratedSkills = {}
  for _, skill in ipairs(skills) do
    decoratedSkills[#decoratedSkills + 1] = decorateSkillForSelection(skill)
  end

  return decoratedSkills
end

local function sortUnlockedSkills(a, b)
  if a.selectionOrder ~= b.selectionOrder then
    return a.selectionOrder < b.selectionOrder
  end

  if a.elementOrder ~= b.elementOrder then
    return a.elementOrder < b.elementOrder
  end

  return (a.name or "") < (b.name or "")
end

local function sortBlockedSkills(a, b)
  if a.elementOrder ~= b.elementOrder then
    return a.elementOrder < b.elementOrder
  end

  return (a.name or "") < (b.name or "")
end

local function setOptionalInfoRow(row, valueLabel, value)
  if not row or not valueLabel then
    return
  end

  local hasValue = value ~= nil and trim(tostring(value)) ~= ""
  row:setVisible(hasValue)

  if hasValue then
    valueLabel:setText(tostring(value))
  else
    valueLabel:setText("")
  end
end

local function setSkillDetails(skill)
  if not skillNameValueLabel then
    return
  end

  if not skill then
    skillNameValueLabel:setText("Nenhuma habilidade selecionada")
    skillWordsValueLabel:setText("")
    skillWordsValueLabel:setVisible(false)
    skillElementValueLabel:setText("-")
    skillElementValueLabel:setColor("#ffffff")
    skillStatusValueLabel:setText("-")
    skillStatusValueLabel:setColor("#ffffff")
    setOptionalInfoRow(skillRequirementRow, skillRequirementValueLabel, nil)
    setOptionalInfoRow(skillEffectRow, skillEffectValueLabel, nil)
    setOptionalInfoRow(skillManaRow, skillManaValueLabel, nil)
    setOptionalInfoRow(skillCooldownRow, skillCooldownValueLabel, nil)
    setOptionalInfoRow(skillLevelRow, skillLevelValueLabel, nil)
    skillDescriptionValueLabel:setText("Selecione uma habilidade para ver os detalhes.")
    return
  end

  skillNameValueLabel:setText(skill.name or "-")

  if skill.words and trim(skill.words) ~= "" then
    skillWordsValueLabel:setText("Palavra magica: '" .. skill.words .. "'")
    skillWordsValueLabel:setVisible(true)
  else
    skillWordsValueLabel:setText("")
    skillWordsValueLabel:setVisible(false)
  end

  skillElementValueLabel:setText(skill.elementName or "-")
  skillElementValueLabel:setColor(skill.iconColor or "#ffffff")
  skillStatusValueLabel:setText(skill.statusLabel or "-")
  skillStatusValueLabel:setColor(skill.statusColor or "#ffffff")
  setOptionalInfoRow(skillRequirementRow, skillRequirementValueLabel, skill.requirementText)
  setOptionalInfoRow(skillEffectRow, skillEffectValueLabel, skill.effectText)
  setOptionalInfoRow(skillManaRow, skillManaValueLabel, skill.manaText)
  setOptionalInfoRow(skillCooldownRow, skillCooldownValueLabel, skill.cooldownText)
  setOptionalInfoRow(skillLevelRow, skillLevelValueLabel, skill.levelText)
  skillDescriptionValueLabel:setText(skill.description or "Descricao em preparacao.")
end

local function applySkillRowStyle(row, skill)
  local nameLabel = row:getChildById("name")
  local elementLabel = row:getChildById("element")
  local summaryLabel = row:getChildById("summary")
  local statusLabel = row:getChildById("status")
  local iconBg = row:getChildById("iconBg")
  local iconText = row:getChildById("iconText")

  if skill.isUnlocked then
    row:setImageColor("#6d5732")
    row:setBackgroundColor("#17120edd")
    nameLabel:setColor("#ffffff")
    elementLabel:setColor(skill.iconColor or "#f0c674")
    summaryLabel:setColor("#d0c5b2")
    statusLabel:setColor("#92d36e")
    iconBg:setImageColor(skill.iconColor or "#5f5f5f")
    iconBg:setBackgroundColor("#0f0f0fee")
    iconText:setColor("#ffffff")
  else
    row:setImageColor("#454545")
    row:setBackgroundColor("#0f0f0fcc")
    nameLabel:setColor("#9d9d9d")
    elementLabel:setColor("#7f7f7f")
    summaryLabel:setColor("#7f7f7f")
    statusLabel:setColor("#9b9b9b")
    iconBg:setImageColor("#5b5b5b")
    iconBg:setBackgroundColor("#0c0c0ccc")
    iconText:setColor("#b4b4b4")
  end
end

local function createSkillRow(parent, skill)
  local row = g_ui.createWidget("ElementalistSpellEntry", parent)
  row.skillKey = skill.key

  row:getChildById("name"):setText(skill.name or "-")
  row:getChildById("element"):setText(skill.elementName or getElementName(skill.element))
  row:getChildById("summary"):setText(skill.summaryText or "")
  row:getChildById("status"):setText(skill.statusLabel or "")
  row:getChildById("iconText"):setText(skill.iconText or "*")

  applySkillRowStyle(row, skill)

  row.onClick = function(widget)
    selectedSkillKey = widget.skillKey
    widget:focus()
    setSkillDetails(skill)
  end

  return row
end

local function renderSkills(skills)
  if not unlockedSkillsList or not blockedSkillsList or not unlockedEmptyLabel or not blockedEmptyLabel then
    return
  end

  state.currentSkills = {}
  unlockedSkillsList:destroyChildren()
  blockedSkillsList:destroyChildren()

  local unlockedSkills = {}
  local blockedSkills = {}

  for _, skill in ipairs(skills) do
    state.currentSkills[#state.currentSkills + 1] = skill

    if skill.isUnlocked then
      unlockedSkills[#unlockedSkills + 1] = skill
    else
      blockedSkills[#blockedSkills + 1] = skill
    end
  end

  table.sort(unlockedSkills, sortUnlockedSkills)
  table.sort(blockedSkills, sortBlockedSkills)

  unlockedEmptyLabel:setVisible(#unlockedSkills == 0)
  blockedEmptyLabel:setVisible(#blockedSkills == 0)

  local rowsByKey = {}

  for _, skill in ipairs(unlockedSkills) do
    rowsByKey[skill.key] = createSkillRow(unlockedSkillsList, skill)
  end

  for _, skill in ipairs(blockedSkills) do
    rowsByKey[skill.key] = createSkillRow(blockedSkillsList, skill)
  end

  local selectedSkill = nil

  if selectedSkillKey then
    for _, skill in ipairs(state.currentSkills) do
      if skill.key == selectedSkillKey then
        selectedSkill = skill
        break
      end
    end
  end

  if not selectedSkill then
    selectedSkill = unlockedSkills[1] or blockedSkills[1]
  end

  selectedSkillKey = selectedSkill and selectedSkill.key or nil
  setSkillDetails(selectedSkill)

  if selectedSkill and rowsByKey[selectedSkill.key] then
    rowsByKey[selectedSkill.key]:focus()
  end
end

local function refreshSkillPreview(useServerSkills)
  renderSkills(buildSkillCollection(useServerSkills))
end

local function updateSelectionLabels()
  if not primaryValueLabel or not secondaryValueLabel then
    return
  end

  local primaryElement = state.selected[1] or ELEMENT_NONE
  local secondaryElement = state.selected[2] or ELEMENT_NONE

  primaryValueLabel:setText(getElementName(primaryElement))
  primaryValueLabel:setColor(primaryElement > ELEMENT_NONE and getElementColor(primaryElement) or "#ffffff")
  secondaryValueLabel:setText(getElementName(secondaryElement))
  secondaryValueLabel:setColor(secondaryElement > ELEMENT_NONE and getElementColor(secondaryElement) or "#ffffff")
end

local function updateCardState()
  for elementId, config in pairs(ELEMENTS) do
    local card = cards[elementId]
    if card then
      local selectedIndex = getSelectedIndex(elementId)
      local accentLabel = card:getChildById("accent")
      local titleLabel = card:getChildById("title")
      local descriptionLabel = card:getChildById("description")
      local markerLabel = card:recursiveGetChildById("marker")
      local roleLabel = card:getChildById("role")
      local highlightBar = card:getChildById("highlightBar")
      local selectionBadge = card:getChildById("selectionBadge")

      card:getChildById("accent"):setText(config.short)
      titleLabel:setText(config.name)
      descriptionLabel:setText(config.description)

      if selectedIndex then
        card:setImageColor(config.color)
        card:setBackgroundColor("#1f1710ee")
        accentLabel:setColor(config.color)
        titleLabel:setColor("#ffffff")
        descriptionLabel:setColor("#efe2c8")
        markerLabel:setText(tostring(selectedIndex))
        markerLabel:setColor("#ffffff")
        roleLabel:setText(selectedIndex == 1 and "Primario" or "Secundario")
        roleLabel:setColor(config.color)
        highlightBar:setImageColor(config.color)
        highlightBar:setBackgroundColor(config.color)
        selectionBadge:setImageColor(config.color)
        selectionBadge:setBackgroundColor("#111111ee")
      else
        card:setImageColor("#3d3d3d")
        card:setBackgroundColor("#101010ee")
        accentLabel:setColor("#555555")
        titleLabel:setColor("#8d8d8d")
        descriptionLabel:setColor("#6d6d6d")
        markerLabel:setText("")
        roleLabel:setText("")
        highlightBar:setImageColor("#2a2a2a")
        highlightBar:setBackgroundColor("#2a2a2a")
        selectionBadge:setImageColor("#343434")
        selectionBadge:setBackgroundColor("#101010ee")
      end
    end
  end
end

local function updateView(useServerSkills)
  updateCardState()
  updateSelectionLabels()
  refreshSkillPreview(useServerSkills)
end

local function setSelection(primary, secondary)
  state.selected = {}

  primary = tonumber(primary) or ELEMENT_NONE
  secondary = tonumber(secondary) or ELEMENT_NONE

  if primary > ELEMENT_NONE then
    table.insert(state.selected, primary)
  end

  if secondary > ELEMENT_NONE and secondary ~= primary then
    table.insert(state.selected, secondary)
  end
end

local function requestState()
  local protocolGame = getProtocolGame()
  if not protocolGame then
    return
  end

  protocolGame:sendExtendedOpcode(OPCODE, json.encode({ action = "fetch" }))
end

local function applyServerState(data)
  state.serverPrimary = tonumber(data.primary) or ELEMENT_NONE
  state.serverSecondary = tonumber(data.secondary) or ELEMENT_NONE
  state.initialized = data.initialized == true or tonumber(data.initialized) == 1
  state.serverSkills = {}

  for _, skill in ipairs(data.skills or {}) do
    state.serverSkills[#state.serverSkills + 1] = skill
  end

  setSelection(state.serverPrimary, state.serverSecondary)
  updateView(true)

  if data.message and data.message ~= "" then
    setFeedback(data.message, "success")
  else
    setFeedback("", nil)
  end
end

function init()
  connect(g_game, {
    onGameStart = create,
    onGameEnd = destroy
  })

  ProtocolGame.registerExtendedOpcode(OPCODE, onExtendedOpcode)

  if g_game.isOnline() then
    create()
  end
end

function terminate()
  disconnect(g_game, {
    onGameStart = create,
    onGameEnd = destroy
  })

  ProtocolGame.unregisterExtendedOpcode(OPCODE, onExtendedOpcode)
  destroy()
end

function create()
  if window then
    return
  end

  window = g_ui.displayUI("elementalist")
  window:hide()
  button = modules.client_topmenu.addRightGameToggleButton("elementalistButton", tr("Habilidades Elementais"), "/images/topbuttons/awakeningspells", toggle, false, 5)
  button:setOn(false)
  window.onVisibilityChange = function(widget, visible)
    if button then
      button:setOn(visible)
    end
  end

  feedbackLabel = window:getChildById("feedbackLabel")
  primaryValueLabel = window:recursiveGetChildById("currentPrimaryValue")
  secondaryValueLabel = window:recursiveGetChildById("currentSecondaryValue")
  unlockedSkillsList = window:recursiveGetChildById("unlockedSkillsList")
  blockedSkillsList = window:recursiveGetChildById("blockedSkillsList")
  unlockedEmptyLabel = window:recursiveGetChildById("unlockedEmptyLabel")
  blockedEmptyLabel = window:recursiveGetChildById("blockedEmptyLabel")
  skillNameValueLabel = window:recursiveGetChildById("skillNameValue")
  skillWordsValueLabel = window:recursiveGetChildById("skillWordsValue")
  skillElementValueLabel = window:recursiveGetChildById("skillElementValue")
  skillStatusValueLabel = window:recursiveGetChildById("skillStatusValue")
  skillRequirementRow = window:recursiveGetChildById("skillRequirementRow")
  skillRequirementValueLabel = window:recursiveGetChildById("skillRequirementValue")
  skillEffectRow = window:recursiveGetChildById("skillEffectRow")
  skillEffectValueLabel = window:recursiveGetChildById("skillEffectValue")
  skillManaRow = window:recursiveGetChildById("skillManaRow")
  skillManaValueLabel = window:recursiveGetChildById("skillManaValue")
  skillCooldownRow = window:recursiveGetChildById("skillCooldownRow")
  skillCooldownValueLabel = window:recursiveGetChildById("skillCooldownValue")
  skillLevelRow = window:recursiveGetChildById("skillLevelRow")
  skillLevelValueLabel = window:recursiveGetChildById("skillLevelValue")
  skillDescriptionValueLabel = window:recursiveGetChildById("skillDescriptionValue")

  for _, elementId in ipairs(ELEMENT_ORDER) do
    local config = ELEMENTS[elementId]
    cards[elementId] = window:getChildById(config.widgetId)
  end

  setSkillDetails(nil)
  updateView(false)
end

function destroy()
  cards = {}
  selectedSkillKey = nil
  state.selected = {}
  state.serverPrimary = ELEMENT_NONE
  state.serverSecondary = ELEMENT_NONE
  state.initialized = false
  state.serverSkills = {}
  state.currentSkills = {}

  if button then
    button:destroy()
    button = nil
  end

  if window then
    window:destroy()
    window = nil
  end

  feedbackLabel = nil
  primaryValueLabel = nil
  secondaryValueLabel = nil
  unlockedSkillsList = nil
  blockedSkillsList = nil
  unlockedEmptyLabel = nil
  blockedEmptyLabel = nil
  skillNameValueLabel = nil
  skillWordsValueLabel = nil
  skillElementValueLabel = nil
  skillStatusValueLabel = nil
  skillRequirementRow = nil
  skillRequirementValueLabel = nil
  skillEffectRow = nil
  skillEffectValueLabel = nil
  skillManaRow = nil
  skillManaValueLabel = nil
  skillCooldownRow = nil
  skillCooldownValueLabel = nil
  skillLevelRow = nil
  skillLevelValueLabel = nil
  skillDescriptionValueLabel = nil
end

function onExtendedOpcode(protocol, code, buffer)
  if not g_game.isOnline() then
    return
  end

  local ok, payload = pcall(function()
    return json.decode(buffer)
  end)

  if not ok or type(payload) ~= "table" then
    g_logger.error("[Elementalist] JSON error while decoding elemental payload.")
    return false
  end

  if payload.action == "state" then
    applyServerState(payload.data or {})
  elseif payload.action == "error" then
    local data = payload.data or {}
    local message = data.message or "Falha no sistema elemental."
    setFeedback(message, "error")
    modules.game_textmessage.displayFailureMessage(message)
  end
end

function toggle()
  if not window then
    create()
  end

  if not window or not button then
    return
  end

  if window:isVisible() then
    hide()
  else
    show()
  end
end

function show()
  if not window then
    create()
  end

  if not window or not button then
    return
  end

  setFeedback("Carregando elementos salvos...", nil)
  requestState()
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

function toggleElement(elementId)
  local selectedIndex = getSelectedIndex(elementId)
  if selectedIndex then
    table.remove(state.selected, selectedIndex)
    updateView(false)
    setFeedback("Selecao local alterada. Clique em Confirmar para salvar.", "warning")
    return
  end

  if #state.selected >= 2 then
    local message = "Voce so pode escolher ate 2 elementos."
    setFeedback(message, "error")
    modules.game_textmessage.displayFailureMessage(message)
    return
  end

  table.insert(state.selected, elementId)
  updateView(false)
  setFeedback("Selecao local alterada. Clique em Confirmar para salvar.", "warning")
end

function clearSelection()
  state.selected = {}
  updateView(false)
  setFeedback("Selecao limpa. Clique em Confirmar para salvar.", "warning")
end

function confirmSelection()
  local protocolGame = getProtocolGame()
  if not protocolGame then
    setFeedback("Nao foi possivel enviar a selecao ao servidor.", "error")
    return
  end

  local primary = state.selected[1] or ELEMENT_NONE
  local secondary = state.selected[2] or ELEMENT_NONE

  protocolGame:sendExtendedOpcode(
    OPCODE,
    json.encode({
      action = "save",
      data = {
        primary = primary,
        secondary = secondary
      }
    })
  )
end
