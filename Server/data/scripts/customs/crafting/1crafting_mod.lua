--- File is called 1crafting_mod.lua , because it needs to be the first file of the folder, if not, then you get errors of nil value about categorys crafting (armorsmith, etc)

Crafting = {}

local CODE_CRAFTING = 91
local fetchLimit = 10
local categories = {"herbalist", "woodcutting", "mining", "generalcrafting", "armorsmith", "weaponsmith", "jewelsmith"}
local QUALITY_MIXED_GRADE_MESSAGE = "Todos os materiais precisam ser do mesmo grau."

local qualityGradeRarity = {
  [1] = 0,
  [2] = ITEM_RARITY_COMMON,
  [3] = ITEM_RARITY_RARE,
  [4] = ITEM_RARITY_EPIC,
  [5] = ITEM_RARITY_LEGENDARY
}

local specialCraftRarities = {
  [1] = {label = "Normal", chance = 60},
  [2] = {label = "Raro", chance = 25},
  [3] = {label = "Excelente", chance = 12},
  [4] = {label = "Lendario", chance = 3},
}

local specialCraftProfiles = {
  elemental_orb = {
    [1] = {magicLevel = 1, energyIncrement = 4},
    [2] = {magicLevel = 2, energyIncrement = 7},
    [3] = {magicLevel = 3, energyIncrement = 10},
    [4] = {magicLevel = 5, energyIncrement = 15},
  }
}

local ActionEvent = Action()

local function getCategoryCrafts(category)
  local crafts = Crafting[category]
  if type(crafts) ~= "table" then
    return {}
  end
  return crafts
end

local function getMaterialData(materialKey)
  local materialApi = rawget(_G, "MaterialRefining")
  return materialApi and materialApi.materials and materialApi.materials[materialKey] or nil
end

local function getMaterialClientId(materialKey)
  local materialData = getMaterialData(materialKey)
  if not materialData then
    return 0
  end

  local itemType = ItemType(materialData.baseItemId)
  return itemType and itemType:getClientId() or 0
end

local function getMaterialLabel(materialKey)
  local materialData = getMaterialData(materialKey)
  return materialData and materialData.label or materialKey
end

local function getMaterialName(materialKey, grade)
  return string.format("%s [Grau %d]", getMaterialLabel(materialKey), grade)
end

local function getCraftResultName(sourceCraft)
  if type(sourceCraft.name) == "string" and sourceCraft.name ~= "" then
    return sourceCraft.name:gsub("%s*%[Quality%]$", "")
  end

  return ItemType(sourceCraft.id):getName()
end

local function slugifyText(value)
  local normalized = (value or ""):lower():gsub("[%s%-]+", "_"):gsub("[^%w_]", "")
  normalized = normalized:gsub("_+", "_"):gsub("^_", ""):gsub("_$", "")
  return normalized
end

local function getCraftRecipeKey(sourceCraft)
  if type(sourceCraft.recipeKey) == "string" and sourceCraft.recipeKey ~= "" then
    return sourceCraft.recipeKey
  end

  if sourceCraft.qualityCraft then
    return slugifyText(getCraftResultName(sourceCraft))
  end

  return nil
end

local function getCraftItemGrade(item)
  local grade = tonumber(item:getCustomAttribute("craft_quality_grade"))
  if grade and grade >= 1 and grade <= 5 then
    return grade
  end

  grade = tonumber(item:getAttribute(ITEM_ATTRIBUTE_CRAFTQUALITY))
  if grade and grade >= 1 and grade <= 5 then
    return grade
  end

  return nil
end

local function getCraftedItemName(item)
  local customName = item:getAttribute(ITEM_ATTRIBUTE_NAME)
  if type(customName) == "string" and customName ~= "" then
    return customName
  end

  return ItemType(item:getId()):getName()
end

local qualityCraftsByRecipeKey = nil

local function getQualityCraftByRecipeKey(recipeKey)
  if type(recipeKey) ~= "string" or recipeKey == "" then
    return nil
  end

  if not qualityCraftsByRecipeKey then
    qualityCraftsByRecipeKey = {}
    for _, category in ipairs(categories) do
      for _, craft in ipairs(getCategoryCrafts(category)) do
        if craft.qualityCraft then
          local craftRecipeKey = getCraftRecipeKey(craft)
          if craftRecipeKey and craftRecipeKey ~= "" then
            qualityCraftsByRecipeKey[craftRecipeKey] = craft
          end
        end
      end
    end
  end

  return qualityCraftsByRecipeKey[recipeKey]
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

local function getMaterialCount(player, materialKey, grade)
  local count = 0
  for _, item in ipairs(collectMatchingInventoryItems(player, materialKey, grade)) do
    count = count + item:getCount()
  end
  return count
end

local function removeMaterial(player, materialKey, grade, amount)
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

local function resolveDismantleItem(player, data)
  if type(data) ~= "table" or type(data.position) ~= "table" then
    return nil, "Dados do item invalidos."
  end

  local position = data.position
  local x = tonumber(position.x)
  local y = tonumber(position.y)
  local z = tonumber(position.z)
  if x ~= 0xFFFF or not y or not z then
    return nil, "Arraste um equipamento craftado da backpack ou de um container aberto."
  end

  if y < 0x40 then
    return nil, "Desmonte apenas itens que estejam na backpack ou em um container aberto."
  end

  local item, err = resolveDraggedItem(player, data)
  if not item then
    return nil, err
  end

  local topParent = item:getTopParent()
  if not topParent or not topParent:isPlayer() or topParent:getId() ~= player:getId() then
    return nil, "Este item nao pode ser desmontado nesta localizacao."
  end

  return item
end

local function getCraftMoney(player)
  return player:getMoney()
end

local function validateCraftBasics(player, craft)
  local money = getCraftMoney(player)
  if money < craft.cost then
    player:popupFYI("You don't have enough money: " .. craft.cost .. ".")
    return false
  end

  if player:getLevel() < craft.level then
    player:popupFYI("You don't have the required Level." .. craft.level .. ".")
    return false
  end

  return true
end

local function buildClientCraft(sourceCraft)
  local craft = {
    id = sourceCraft.id,
    name = sourceCraft.name,
    resultName = getCraftResultName(sourceCraft),
    level = sourceCraft.level,
    cost = sourceCraft.cost,
    count = sourceCraft.count,
    qualityCraft = sourceCraft.qualityCraft == true
  }

  craft.materials = {}
  if craft.qualityCraft then
    for idx, requirement in ipairs(sourceCraft.qualityRequirements or {}) do
      craft.materials[idx] = {
        id = getMaterialClientId(requirement.materialType),
        count = requirement.count,
        player = 0,
        label = getMaterialLabel(requirement.materialType),
        materialType = requirement.materialType
      }
    end
  else
    for idx, material in ipairs(sourceCraft.materials or {}) do
      craft.materials[idx] = {
        id = ItemType(material.id):getClientId(),
        count = material.count,
        player = 0
      }
    end
  end

  craft.clientId = ItemType(craft.id):getClientId()
  return craft
end

local function buildQualitySlotSelection(player, craft, slotIndex, item, requestData)
  local requirement = craft.qualityRequirements and craft.qualityRequirements[slotIndex]
  if not requirement then
    return nil, "Slot de material invalido."
  end

  if tonumber(item:getCustomAttribute("material_refining")) ~= 1 then
    return nil, "Arraste um material refinado valido para este slot."
  end

  local materialType = item:getCustomAttribute("material_type")
  local grade = tonumber(item:getCustomAttribute("material_grade"))
  if not materialType or not grade then
    return nil, "Arraste um material refinado valido para este slot."
  end

  if grade < 1 or grade > 5 then
    return nil, "O grau do material selecionado e invalido."
  end

  if materialType ~= requirement.materialType then
    return nil, string.format("Este slot exige %s.", getMaterialLabel(requirement.materialType))
  end

  local available = getMaterialCount(player, materialType, grade)
  return {
    slot = slotIndex,
    materialType = materialType,
    label = getMaterialLabel(materialType),
    name = getMaterialName(materialType, grade),
    grade = grade,
    gradeLabel = string.format("Grau %d", grade),
    rarityId = qualityGradeRarity[grade] or 0,
    available = available,
    required = requirement.count,
    clientId = item:getType():getClientId(),
    position = requestData.position
  }
end

local function buildDismantleRefunds(craft, grade)
  local refunds = {}

  for _, requirement in ipairs(craft.qualityRequirements or {}) do
    local refundCount = math.floor((requirement.count or 0) / 2)
    if refundCount > 0 then
      refunds[#refunds + 1] = {
        materialType = requirement.materialType,
        label = getMaterialLabel(requirement.materialType),
        name = getMaterialName(requirement.materialType, grade),
        count = refundCount,
        grade = grade,
        clientId = getMaterialClientId(requirement.materialType),
      }
    end
  end

  return refunds
end

local function getRefundTotalWeight(refunds)
  local totalWeight = 0

  for _, refund in ipairs(refunds) do
    local materialData = getMaterialData(refund.materialType)
    if materialData then
      totalWeight = totalWeight + ItemType(materialData.baseItemId):getWeight(refund.count)
    end
  end

  return totalWeight
end

local function validateDismantleItem(player, item)
  if tonumber(item:getCustomAttribute("craft_quality")) ~= 1 then
    return nil, "Este item nao pode ser desmontado."
  end

  local grade = getCraftItemGrade(item)
  if not grade then
    return nil, "Este item nao possui um Grau de craft valido."
  end

  local recipeKey = item:getCustomAttribute("craft_recipe_key")
  if type(recipeKey) ~= "string" or recipeKey == "" then
    return nil, "Nao foi possivel identificar os materiais deste equipamento."
  end

  local craft = getQualityCraftByRecipeKey(recipeKey)
  if not craft or not craft.qualityCraft then
    return nil, "Nao foi possivel identificar os materiais deste equipamento."
  end

  local refunds = buildDismantleRefunds(craft, grade)
  if #refunds == 0 then
    return nil, "Nao foi possivel identificar os materiais deste equipamento."
  end

  return {
    item = item,
    grade = grade,
    craft = craft,
    recipeKey = recipeKey,
    refunds = refunds,
  }
end

local function buildDismantleSelection(item, validation, requestData)
  local rarityId = tonumber(item:getAttribute(ITEM_ATTRIBUTE_RARITYLEVEL)) or qualityGradeRarity[validation.grade] or 0

  return {
    clientId = item:getType():getClientId(),
    itemName = getCraftedItemName(item),
    rarityId = rarityId,
    grade = validation.grade,
    recipeKey = validation.recipeKey,
    position = requestData.position,
    materials = validation.refunds,
  }
end

local function rollbackDismantle(player, rollbackItem, refunds, grade, countsBefore)
  for _, refund in ipairs(refunds) do
    local beforeCount = countsBefore[refund.materialType] or 0
    local currentCount = getMaterialCount(player, refund.materialType, grade)
    local gainedCount = math.max(0, currentCount - beforeCount)
    if gainedCount > 0 then
      removeMaterial(player, refund.materialType, grade, gainedCount)
    end
  end

  local result = player:addItemEx(rollbackItem)
  return result == true or result == RETURNVALUE_NOERROR
end

local function appendAppliedBonus(applied, label, bonus)
  if bonus > 0 then
    applied[#applied + 1] = string.format("%s +%d", label, bonus)
  end
end

local function rollSpecialCraftRarity()
  local roll = math.random(100)
  local accumulated = 0
  for rarityId = 1, #specialCraftRarities do
    local config = specialCraftRarities[rarityId]
    accumulated = accumulated + (config.chance or 0)
    if roll <= accumulated then
      return rarityId, config
    end
  end

  return 1, specialCraftRarities[1]
end

local function applySpecialCraftProfile(item, craft, grade, applied)
  if grade ~= 5 then
    return nil
  end

  local profileName = craft.specialRarityProfile
  local profile = profileName and specialCraftProfiles[profileName]
  if not profile then
    return nil
  end

  local rarityId, rarityConfig = rollSpecialCraftRarity()
  local bonuses = profile[rarityId]
  if not bonuses then
    return nil
  end

  item:setCustomAttribute("craft_special_rarity", rarityId)

  if bonuses.magicLevel and bonuses.magicLevel > 0 then
    item:addTooltipAttribute(TOOLTIP_ATTRIBUTE_STATS, bonuses.magicLevel, STAT_MAGICPOINTS)
    appendAppliedBonus(applied, "Magic Level", bonuses.magicLevel)
  end

  if bonuses.energyIncrement and bonuses.energyIncrement > 0 then
    item:addTooltipAttribute(TOOLTIP_ATTRIBUTE_INCREMENTS, bonuses.energyIncrement, COMBAT_ENERGYDAMAGE)
    appendAppliedBonus(applied, "Dano de Energia", bonuses.energyIncrement)
  end

  return {
    id = rarityId,
    label = rarityConfig.label,
    bonuses = bonuses
  }
end

local function applyQualityCraftAttributes(item, craft, grade)
  local itemType = ItemType(craft.id)
  local baseName = getCraftResultName(craft)
  local baseDescription = itemType:getDescription() or ""
  local delta = math.max(0, grade - 1)
  local attackBonus = delta
  local armorBonus = math.floor(delta / 2)
  local defenseBonus = math.floor(delta / 2)
  local extraDefenseBonus = math.floor(delta / 2)
  local applied = {}

  if itemType:getAttack() > 0 and attackBonus > 0 then
    item:setAttribute(ITEM_ATTRIBUTE_ATTACK, itemType:getAttack() + attackBonus)
    appendAppliedBonus(applied, "Ataque", attackBonus)
  end

  if itemType:getArmor() > 0 and armorBonus > 0 then
    item:setAttribute(ITEM_ATTRIBUTE_ARMOR, itemType:getArmor() + armorBonus)
    appendAppliedBonus(applied, "Armadura", armorBonus)
  end

  if itemType:getDefense() > 0 and defenseBonus > 0 then
    item:setAttribute(ITEM_ATTRIBUTE_DEFENSE, itemType:getDefense() + defenseBonus)
    appendAppliedBonus(applied, "Defesa", defenseBonus)
  end

  if itemType:getExtraDefense() > 0 and extraDefenseBonus > 0 then
    item:setAttribute(ITEM_ATTRIBUTE_EXTRADEFENSE, itemType:getExtraDefense() + extraDefenseBonus)
    appendAppliedBonus(applied, "Defesa Extra", extraDefenseBonus)
  end

  local specialCraft = applySpecialCraftProfile(item, craft, grade, applied)
  local craftedName = string.format("%s [Grau %d]", baseName, grade)
  if specialCraft then
    craftedName = string.format("%s - %s", craftedName, specialCraft.label)
  end

  item:setAttribute(ITEM_ATTRIBUTE_NAME, craftedName)
  item:setAttribute(ITEM_ATTRIBUTE_CRAFTQUALITY, grade)
  item:setCustomAttribute("craft_quality", 1)
  item:setCustomAttribute("craft_quality_grade", grade)
  local recipeKey = getCraftRecipeKey(craft)
  if recipeKey then
    item:setCustomAttribute("craft_recipe_key", recipeKey)
  end

  local rarity = qualityGradeRarity[grade] or 0
  if rarity > 0 then
    item:setAttribute(ITEM_ATTRIBUTE_RARITYLEVEL, rarity)
  else
    item:removeAttribute(ITEM_ATTRIBUTE_RARITYLEVEL)
  end

  local descriptionLines = {}
  if baseDescription ~= "" then
    descriptionLines[#descriptionLines + 1] = baseDescription
  end
  descriptionLines[#descriptionLines + 1] = string.format("Qualidade de craft: Grau %d.", grade)
  if specialCraft then
    descriptionLines[#descriptionLines + 1] = string.format("Qualidade especial: %s.", specialCraft.label)
  end
  if #applied > 0 then
    descriptionLines[#descriptionLines + 1] = "Bonus aplicados: " .. table.concat(applied, ", ") .. "."
  end
  item:setAttribute(ITEM_ATTRIBUTE_DESCRIPTION, table.concat(descriptionLines, "\n"))
end

function ActionEvent.onUse(player)
  player:showCrafting()
  return true
end

ActionEvent:aid(38820)
ActionEvent:register()

local LoginEvent = CreatureEvent("CraftingLogin")

function LoginEvent.onLogin(player)
  player:registerEvent("CraftingExtended")
  return true
end

LoginEvent:type("login")
LoginEvent:register()

local ExtendedEvent = CreatureEvent("CraftingExtended")

function ExtendedEvent.onExtendedOpcode(player, opcode, buffer)
  if opcode ~= CODE_CRAFTING then
    return true
  end

  local status, jsonData =
    pcall(
    function()
      return json.decode(buffer)
    end
  )

  if not status then
    return false
  end

  local action = jsonData.action
  local data = jsonData.data

  if action == "fetch" then
    Crafting:sendMoney(player)
    for _, category in ipairs(categories) do
      Crafting:sendCrafts(player, category)
    end
  elseif action == "show" then
    player:showCrafting()
  elseif action == "craft" then
    Crafting:craft(player, data.category, data.craftId, data.slots)
  elseif action == "inspectQualityMaterial" then
    Crafting:inspectQualityMaterial(player, data.category, data.craftId, data)
  elseif action == "inspectDismantleItem" then
    Crafting:inspectDismantleItem(player, data)
  elseif action == "dismantle" then
    Crafting:dismantle(player, data)
  end

  return true
end

ExtendedEvent:type("extendedopcode")
ExtendedEvent:register()

function Crafting:sendQualityMessage(player, text, color, category, craftId)
  local payload = {action = "qualityMessage", data = {text = text, color = color or "#afafaf", category = category, craftId = craftId}}
  player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
end

function Crafting:sendDismantleMessage(player, text, color)
  local payload = {action = "dismantleMessage", data = {text = text, color = color or "#afafaf"}}
  player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
end

function Crafting:sendCrafts(player, category)
  local categoryCrafts = getCategoryCrafts(category)

  local data = {}

  for i = 1, #categoryCrafts do
    local ok, craftOrErr =
      pcall(
      function()
        local craft = buildClientCraft(categoryCrafts[i])
        if not craft.qualityCraft then
          for x = 1, #craft.materials do
            local sourceMaterial = categoryCrafts[i].materials[x]
            craft.materials[x].player = player:getItemCount(sourceMaterial.id)
          end
        end
        return craft
      end
    )

    if ok then
      table.insert(data, craftOrErr)
    end
  end

  if #data >= fetchLimit then
    local x = 1
    for i = 1, math.floor(#data / fetchLimit) do
      local payload = {action = "fetch", data = {category = category, crafts = {unpack(data, x, math.min(x + fetchLimit - 1, #data))}}}
      player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
      x = x + fetchLimit
    end

    if x < #data then
      local payload = {action = "fetch", data = {category = category, crafts = {unpack(data, x, #data)}}}
      player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
    end
  else
    local payload = {action = "fetch", data = {category = category, crafts = data}}
    player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
  end
end

function Crafting:inspectQualityMaterial(player, category, craftId, requestData)
  local craft = Crafting[category] and Crafting[category][craftId]
  if not craft or not craft.qualityCraft then
    self:sendQualityMessage(player, "Esta receita nao usa slots livres.", "#FF6B6B", category, craftId)
    return
  end

  local slotIndex = tonumber(requestData.slot)
  if not slotIndex then
    self:sendQualityMessage(player, "Slot de material invalido.", "#FF6B6B", category, craftId)
    return
  end

  local item, err = resolveDraggedItem(player, requestData)
  if not item then
    self:sendQualityMessage(player, err, "#FF6B6B", category, craftId)
    return
  end

  local selection, selectionErr = buildQualitySlotSelection(player, craft, slotIndex, item, requestData)
  if not selection then
    self:sendQualityMessage(player, selectionErr, "#FF6B6B", category, craftId)
    return
  end

  self:sendQualityMessage(player, string.format("%s selecionado para o slot %d.", selection.name, slotIndex), "#8AD66F", category, craftId)
  local payload = {action = "qualitySlot", data = {category = category, craftId = craftId, slot = slotIndex, selection = selection}}
  player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
end

function Crafting:inspectDismantleItem(player, requestData)
  local item, err = resolveDismantleItem(player, requestData)
  if not item then
    self:sendDismantleMessage(player, err, "#FF6B6B")
    return
  end

  local validation, validationErr = validateDismantleItem(player, item)
  if not validation then
    self:sendDismantleMessage(player, validationErr, "#FF6B6B")
    return
  end

  local payload = {action = "dismantlePreview", data = buildDismantleSelection(item, validation, requestData)}
  player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
  self:sendDismantleMessage(player, "Preview pronto. Confirme para desmontar.", "#d8c173")
end

function Crafting:dismantle(player, requestData)
  local materialApi = rawget(_G, "MaterialRefining")
  if not materialApi or type(materialApi.giveMaterial) ~= "function" then
    self:sendDismantleMessage(player, "O sistema de materiais nao esta disponivel no momento.", "#FF6B6B")
    return
  end

  local item, err = resolveDismantleItem(player, requestData)
  if not item then
    self:sendDismantleMessage(player, err, "#FF6B6B")
    return
  end

  local validation, validationErr = validateDismantleItem(player, item)
  if not validation then
    self:sendDismantleMessage(player, validationErr, "#FF6B6B")
    return
  end

  local refundWeight = getRefundTotalWeight(validation.refunds)
  if player:getFreeCapacity() < refundWeight then
    self:sendDismantleMessage(player, "Voce nao possui espaco suficiente para receber os materiais.", "#FF6B6B")
    return
  end

  local rollbackItem = item:clone()
  if not rollbackItem then
    self:sendDismantleMessage(player, "Nao foi possivel preparar a desmontagem deste item.", "#FF6B6B")
    return
  end

  local countsBefore = {}
  for _, refund in ipairs(validation.refunds) do
    countsBefore[refund.materialType] = getMaterialCount(player, refund.materialType, validation.grade)
  end

  if not item:remove(1) then
    rollbackItem:remove()
    self:sendDismantleMessage(player, "Nao foi possivel destruir o equipamento selecionado.", "#FF6B6B")
    return
  end

  for _, refund in ipairs(validation.refunds) do
    local ok, giveErr = materialApi.giveMaterial(player, refund.materialType, validation.grade, refund.count)
    if not ok then
      local rollbackOk = rollbackDismantle(player, rollbackItem, validation.refunds, validation.grade, countsBefore)
      if not rollbackOk then
        self:sendDismantleMessage(player, "Falha ao restaurar o equipamento apos o erro na desmontagem.", "#FF6B6B")
        return
      end

      self:sendDismantleMessage(player, giveErr or "Voce nao possui espaco suficiente para receber os materiais.", "#FF6B6B")
      return
    end
  end

  rollbackItem:remove()
  self:sendDismantleMessage(player, "Desmontagem concluida com sucesso.", "#8AD66F")
  self:sendMoney(player)
  for _, category in ipairs(categories) do
    self:sendMaterials(player, category)
  end
  player:sendExtendedOpcode(CODE_CRAFTING, json.encode({action = "dismantled"}))
end

function Crafting:craftQuality(player, craft, slotSelections)
  if not validateCraftBasics(player, craft) then
    return false
  end

  if type(slotSelections) ~= "table" then
    player:popupFYI("Preencha todos os slots com materiais validos.")
    return false
  end

  local slotsByIndex = {}
  for _, slotData in ipairs(slotSelections) do
    local slotIndex = tonumber(slotData.slot)
    if slotIndex then
      slotsByIndex[slotIndex] = slotData
    end
  end

  local selectedGrade = nil
  local requiredByMaterial = {}

  for slotIndex, requirement in ipairs(craft.qualityRequirements or {}) do
    local slotData = slotsByIndex[slotIndex]
    if not slotData then
      player:popupFYI("Preencha todos os slots com materiais validos.")
      return false
    end

    local item, err = resolveDraggedItem(player, slotData)
    if not item then
      player:popupFYI(err)
      return false
    end

    local selection, selectionErr = buildQualitySlotSelection(player, craft, slotIndex, item, slotData)
    if not selection then
      player:popupFYI(selectionErr)
      return false
    end

    if not selectedGrade then
      selectedGrade = selection.grade
    elseif selectedGrade ~= selection.grade then
      player:popupFYI(QUALITY_MIXED_GRADE_MESSAGE)
      return false
    end

    requiredByMaterial[requirement.materialType] = (requiredByMaterial[requirement.materialType] or 0) + requirement.count
  end

  for materialType, requiredCount in pairs(requiredByMaterial) do
    if getMaterialCount(player, materialType, selectedGrade) < requiredCount then
      player:popupFYI(string.format("Voce nao possui materiais suficientes para %s no Grau %d.", getMaterialLabel(materialType), selectedGrade))
      return false
    end
  end

  local item = Game.createItem(craft.id, craft.count)
  if not item then
    player:popupFYI("Nao foi possivel criar o item final.")
    return false
  end

  applyQualityCraftAttributes(item, craft, selectedGrade)

  local result = player:addItemEx(item)
  if result ~= true and result ~= RETURNVALUE_NOERROR then
    item:remove()
    player:popupFYI("Nao foi possivel adicionar o item criado ao inventario.")
    return false
  end

  for materialType, requiredCount in pairs(requiredByMaterial) do
    if not removeMaterial(player, materialType, selectedGrade, requiredCount) then
      item:remove()
      player:popupFYI("Nao foi possivel consumir os materiais do craft.")
      return false
    end
  end

  player:removeTotalMoney(craft.cost)
  return true
end

function Crafting:craft(player, category, craftId, slotSelections)
  local craft = Crafting[category] and Crafting[category][craftId]
  if not craft then
    return
  end

  if craft.qualityCraft then
    if self:craftQuality(player, craft, slotSelections) then
      self:sendMoney(player)
      self:sendMaterials(player, category)
      player:sendExtendedOpcode(CODE_CRAFTING, json.encode({action = "crafted"}))
    end
    return
  end

  if not validateCraftBasics(player, craft) then
    return
  end

  for i = 1, #craft.materials do
    local material = craft.materials[i]
    if player:getItemCount(material.id) < material.count then
      player:popupFYI("You don't have enough materials.")
      return
    end
  end

  local item = Game.createItem(craft.id, craft.count)
  if item then
    if player:addItemEx(item) then
      player:removeTotalMoney(craft.cost)

      for i = 1, #craft.materials do
        local material = craft.materials[i]
        player:removeItem(material.id, material.count)
      end

      self:sendMoney(player)
      self:sendMaterials(player, category)
      player:sendExtendedOpcode(CODE_CRAFTING, json.encode({action = "crafted"}))
    end
  end
end

function Crafting:sendMaterials(player, category)
  local categoryCrafts = getCategoryCrafts(category)

  local data = {}

  for i = 1, #categoryCrafts do
    local craft = categoryCrafts[i]
    local materials = {}

    if craft.qualityCraft then
      for matId = 1, #(craft.qualityRequirements or {}) do
        materials[matId] = 0
      end
    else
      for matId, matData in ipairs(craft.materials or {}) do
        materials[matId] = player:getItemCount(matData.id)
      end
    end

    table.insert(data, materials)
  end

  if #data >= fetchLimit then
    local x = 1
    for i = 1, math.floor(#data / fetchLimit) do
      local payload = {action = "materials", data = {category = category, from = x, materials = {unpack(data, x, math.min(x + fetchLimit - 1, #data))}}}
      player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
      x = x + fetchLimit
    end

    if x < #data then
      local payload = {action = "materials", data = {category = category, from = x, materials = {unpack(data, x, #data)}}}
      player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
    end
  else
    local payload = {action = "materials", data = {category = category, from = 1, materials = data}}
    player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
  end
end

function Crafting:sendMoney(player)
  local payload = {action = "money", data = player:getMoney()}
  player:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
end

function Player:showCrafting()
  Crafting:sendMoney(self)
  for _, category in ipairs(categories) do
    Crafting:sendCrafts(self, category)
    Crafting:sendMaterials(self, category)
  end
  local payload = {action = "show"}
  self:sendExtendedOpcode(CODE_CRAFTING, json.encode(payload))
end
