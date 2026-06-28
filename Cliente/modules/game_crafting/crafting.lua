local CODE = 91
local MAX_MATERIAL_SLOTS = 6

local window = nil
local craftingButton = nil
local categories = nil
local craftPanel = nil
local dismantlePanel = nil
local itemsList = nil
local itemsListScrollbar = nil
local searchPanel = nil
local searchSeparator = nil
local listDivider = nil

local selectedCategory = nil
local selectedCraftId = nil
local money = 0
local qualitySelections = {}
local dismantleSelection = nil
local pendingFetchFallbackEvent = nil

local function createEmptyCrafts()
  return {herbalist = {}, woodcutting = {}, mining = {}, generalcrafting = {}, armorsmith = {}, weaponsmith = {}, jewelsmith = {}}
end

local Crafts = createEmptyCrafts()

local gradeRarity = {
  [1] = 0,
  [2] = 1,
  [3] = 2,
  [4] = 3,
  [5] = 4
}

local function sendToServer(payload)
  local protocolGame = g_game.getProtocolGame()
  if not protocolGame then
    return
  end

  protocolGame:sendExtendedOpcode(CODE, json.encode(payload))
end

local function getTotalCraftCount()
  local total = 0
  for _, categoryCrafts in pairs(Crafts) do
    total = total + #categoryCrafts
  end
  return total
end

local function isDismantleCategory()
  return selectedCategory == "dismantle"
end

local function getSelectedCraft()
  if not selectedCategory or not selectedCraftId then
    return nil
  end

  local categoryCrafts = Crafts[selectedCategory]
  return categoryCrafts and categoryCrafts[selectedCraftId] or nil
end

local function isQualityCraft(craft)
  return craft and craft.qualityCraft and craft.materials and #craft.materials > 0
end

local function setPreviewRarity(widget, rarityId)
  if not widget then
    return
  end

  g_game.updateRarityFrames(widget, rarityId or 0)
end

local function getMaterialSlot(slotIndex)
  return craftPanel and craftPanel:getChildById("material" .. slotIndex) or nil
end

local function getMaterialItemWidget(slotIndex)
  local slot = getMaterialSlot(slotIndex)
  return slot and slot:getChildById("item") or nil
end

local function getCraftLine(slotIndex)
  return craftPanel and craftPanel:getChildById("craftLine" .. slotIndex) or nil
end

local function getDismantleChild(childId)
  return dismantlePanel and dismantlePanel:recursiveGetChildById(childId) or nil
end

local function getDismantleSlot(slotIndex)
  return getDismantleChild("dismantleMaterial" .. slotIndex)
end

local function getDismantleRow(slotIndex)
  return getDismantleChild("dismantleRow" .. slotIndex)
end

local function getDismantleItemWidget(slotIndex)
  local slot = getDismantleSlot(slotIndex)
  return slot and slot:getChildById("item") or nil
end

local function getDismantleNameLabel(slotIndex)
  return getDismantleChild("dismantleName" .. slotIndex)
end

local function getDismantleQtyLabel(slotIndex)
  return getDismantleChild("dismantleQty" .. slotIndex)
end

local function setQualityStatus(text, color)
  if not craftPanel then
    return
  end

  local status = craftPanel:getChildById("qualityStatus")
  if not status then
    return
  end

  status:setText(text or "")
  status:setColor(color or "#afafaf")
  status:setVisible(text and text:len() > 0 or false)
end

local function setQualityResult(text, visible)
  if not craftPanel then
    return
  end

  local result = craftPanel:getChildById("qualityResult")
  if not result then
    return
  end

  result:setText(text or "")
  result:setVisible(visible and text and text:len() > 0 or false)
end

local function setDismantleStatus(text, color)
  if not dismantlePanel then
    return
  end

  local status = getDismantleChild("dismantleStatus")
  if not status then
    return
  end

  status:setText(text or "")
  status:setColor(color or "#afafaf")
  status:setVisible(text and text:len() > 0 or false)
end

local function clearQualitySelections()
  qualitySelections = {}
end

local function clearDismantleSelection()
  dismantleSelection = nil
end

local function setSlotVisible(slotIndex, visible)
  local slot = getMaterialSlot(slotIndex)
  local countLabel = craftPanel and craftPanel:getChildById("count" .. slotIndex)
  local line = getCraftLine(slotIndex)

  if slot then
    slot:setVisible(visible)
  end

  if countLabel then
    countLabel:setVisible(visible)
  end

  if line then
    line:setVisible(visible)
  end
end

local function resetSlotVisual(slotIndex)
  local slot = getMaterialSlot(slotIndex)
  local itemWidget = getMaterialItemWidget(slotIndex)
  if slot then
    slot:setImageColor("#5f5f5f")
    slot:setBorderWidth(0)
    slot:setTooltip("")
  end

  if itemWidget then
    itemWidget:setItemId(0)
    itemWidget:setItemCount(0)
    setPreviewRarity(itemWidget, 0)
  end

  local countLabel = craftPanel and craftPanel:getChildById("count" .. slotIndex)
  if countLabel then
    countLabel:setText("")
    countLabel:setColor("#FFFFFF")
  end
end

local function resetDismantleMaterialSlot(slotIndex)
  local row = getDismantleRow(slotIndex)
  local slot = getDismantleSlot(slotIndex)
  local itemWidget = getDismantleItemWidget(slotIndex)
  local nameLabel = getDismantleNameLabel(slotIndex)
  local qtyLabel = getDismantleQtyLabel(slotIndex)

  if row then
    row:setVisible(false)
  end

  if slot then
    slot:setTooltip("")
  end

  if itemWidget then
    itemWidget:setItemId(0)
    itemWidget:setItemCount(0)
    setPreviewRarity(itemWidget, 0)
  end

  if nameLabel then
    nameLabel:setText("")
    nameLabel:setVisible(false)
  end

  if qtyLabel then
    qtyLabel:setText("")
    qtyLabel:setVisible(false)
  end
end

local function refreshOutcomePreview(craft, rarityId, resultText)
  local outcome = craftPanel:getChildById("craftOutcome")
  outcome:setItemId(craft.clientId)
  outcome:setItemCount(craft.count)
  setPreviewRarity(outcome, rarityId)
  setQualityResult(resultText, isQualityCraft(craft))
end

local function refreshClassicCraft(craft)
  clearQualitySelections()
  setQualityStatus("", "#afafaf")
  setQualityResult("", false)

  for i = 1, MAX_MATERIAL_SLOTS do
    resetSlotVisual(i)
    setSlotVisible(i, i <= #craft.materials)
  end

  for i = 1, #craft.materials do
    local material = craft.materials[i]
    local itemWidget = getMaterialItemWidget(i)
    if itemWidget then
      itemWidget:setItemId(material.id)
      setPreviewRarity(itemWidget, 0)
    end

    local count = craftPanel:getChildById("count" .. i)
    count:setText(material.player .. "\n" .. material.count)
    count:setVisible(true)
    if material.player >= material.count then
      count:setColor("#FFFFFF")
    else
      count:setColor("#FF0000")
    end
  end

  refreshOutcomePreview(craft, 0, "")
end

local function buildQualityCountText(material, selection)
  local available = selection and selection.available or 0
  return string.format("%s\n%d/%d", material.label or "Material", available, material.count)
end

local function buildQualityRequirementSummary(craft)
  local parts = {}
  for i = 1, #craft.materials do
    local material = craft.materials[i]
    parts[#parts + 1] = string.format("%s x%d", material.label or "Material", material.count or 0)
  end
  return table.concat(parts, ", ")
end

local function formatDisplayName(name)
  if not name or name == "" then
    return ""
  end

  local words = {}
  for word in name:gmatch("%S+") do
    words[#words + 1] = word:gsub("(%a)([%w']*)", function(first, rest)
      return first:upper() .. rest:lower()
    end)
  end

  return table.concat(words, " ")
end

local function updateQualityPreview()
  local craft = getSelectedCraft()
  if not isQualityCraft(craft) then
    return
  end

  local selectedGrade = nil
  local allFilled = true
  local mixedGrades = false

  for i = 1, MAX_MATERIAL_SLOTS do
    local material = craft.materials[i]
    local slot = getMaterialSlot(i)
    local itemWidget = getMaterialItemWidget(i)
    local countLabel = craftPanel:getChildById("count" .. i)

    if not material then
      resetSlotVisual(i)
      setSlotVisible(i, false)
    else
      setSlotVisible(i, true)
      local selection = qualitySelections[i]
      slot:setTooltip(string.format("%s\nNecessario: %d", material.label or "Material", material.count))

      if selection then
        itemWidget:setItemId(selection.clientId)
        setPreviewRarity(itemWidget, selection.rarityId)
        slot:setImageColor("#8a8a8a")
        countLabel:setText(buildQualityCountText(material, selection))
        countLabel:setVisible(true)
        countLabel:setColor(selection.available >= material.count and "#FFFFFF" or "#FF0000")
        slot:setTooltip(string.format("%s\nNecessario: %d\nDisponivel: %d", selection.name, material.count, selection.available or 0))

        if not selectedGrade then
          selectedGrade = selection.grade
        elseif selectedGrade ~= selection.grade then
          mixedGrades = true
        end
      else
        itemWidget:setItemId(material.id)
        setPreviewRarity(itemWidget, 0)
        slot:setImageColor("#5f5f5f")
        countLabel:setText(buildQualityCountText(material))
        countLabel:setVisible(true)
        countLabel:setColor("#FF0000")
        allFilled = false
      end
    end
  end

  local resultName = formatDisplayName(craft.resultName or craft.name)
  if mixedGrades then
    refreshOutcomePreview(craft, 0, resultName)
    setQualityStatus("Todos os materiais precisam ser do mesmo grau.", "#FF6B6B")
    return
  end

  if allFilled and selectedGrade then
    refreshOutcomePreview(craft, gradeRarity[selectedGrade] or 0, string.format("%s [Grau %d]", resultName, selectedGrade))
    setQualityStatus(string.format("Pronto para criar no Grau %d.", selectedGrade), "#8AD66F")
    return
  end

  refreshOutcomePreview(craft, 0, resultName)
  setQualityStatus("Necessario: " .. buildQualityRequirementSummary(craft) .. ".", "#afafaf")
end

local function resetCraftPanel()
  clearQualitySelections()

  for i = 1, MAX_MATERIAL_SLOTS do
    resetSlotVisual(i)
    setSlotVisible(i, true)
  end

  craftPanel:getChildById("craftOutcome"):setItemId(0)
  craftPanel:getChildById("craftOutcome"):setItemCount(0)
  setPreviewRarity(craftPanel:getChildById("craftOutcome"), 0)
  craftPanel:recursiveGetChildById("totalCost"):setText("")
  setQualityStatus("", "#afafaf")
  setQualityResult("", false)
end

local function resetDismantlePanel()
  clearDismantleSelection()

  if not dismantlePanel then
    return
  end

  local inputSlot = getDismantleChild("dismantleInputSlot")
  local inputItem = inputSlot and inputSlot:getChildById("item")
  local previewItem = getDismantleChild("dismantlePreview")
  local selectedName = getDismantleChild("dismantleSelectedName")
  local warning = getDismantleChild("dismantleWarning")

  if selectedName then
    selectedName:setText("Nenhum equipamento selecionado.")
  end
  if warning then
    warning:setVisible(false)
  end
  setDismantleStatus("", "#afafaf")

  if inputItem then
    inputItem:setItemId(0)
    inputItem:setItemCount(0)
    setPreviewRarity(inputItem, 0)
  end

  if previewItem then
    previewItem:setItemId(0)
    previewItem:setItemCount(0)
    setPreviewRarity(previewItem, 0)
  end

  for i = 1, MAX_MATERIAL_SLOTS do
    resetDismantleMaterialSlot(i)
  end
end

local function applyDismantleSelection(selection)
  dismantleSelection = selection

  if not dismantlePanel or not selection then
    return
  end

  local inputSlot = getDismantleChild("dismantleInputSlot")
  local inputItem = inputSlot and inputSlot:getChildById("item")
  local previewItem = getDismantleChild("dismantlePreview")

  if inputItem then
    inputItem:setItemId(selection.clientId or 0)
    inputItem:setItemCount(1)
    setPreviewRarity(inputItem, selection.rarityId or 0)
  end

  if previewItem then
    previewItem:setItemId(selection.clientId or 0)
    previewItem:setItemCount(1)
    setPreviewRarity(previewItem, selection.rarityId or 0)
  end

  local selectedName = getDismantleChild("dismantleSelectedName")
  local warning = getDismantleChild("dismantleWarning")
  if selectedName then
    selectedName:setText(selection.itemName or "Equipamento craftado")
  end
  if warning then
    warning:setVisible(true)
  end

  for i = 1, MAX_MATERIAL_SLOTS do
    resetDismantleMaterialSlot(i)
  end

  local materials = selection.materials or {}
  g_logger.info(string.format("[DISMANTLE_DEBUG_CLIENT] recebeu %d materiais recuperados", #materials))
  for i = 1, #materials do
    local material = materials[i]
    local row = getDismantleRow(i)
    local slot = getDismantleSlot(i)
    local itemWidget = getDismantleItemWidget(i)
    local nameLabel = getDismantleNameLabel(i)
    local qtyLabel = getDismantleQtyLabel(i)

    if slot and itemWidget and nameLabel and qtyLabel then
      if row then
        row:setVisible(true)
      end
      g_logger.info(string.format("[DISMANTLE_DEBUG_CLIENT] renderizando material: %s, id=%s, count=%s", material.name or material.label or "Material", tostring(material.clientId or 0), tostring(material.count or 0)))
      itemWidget:setItemId(material.clientId or 0)
      itemWidget:setItemCount(material.count or 0)
      setPreviewRarity(itemWidget, gradeRarity[material.grade or selection.grade or 0] or 0)
      slot:setTooltip(material.name or material.label or "Material")
      nameLabel:setText(material.name or material.label or "Material")
      qtyLabel:setText(string.format("x%d", material.count or 0))
      nameLabel:setVisible(true)
      qtyLabel:setVisible(true)
    end
  end
end

local function setInterfaceMode(mode)
  if not itemsList or not craftPanel or not dismantlePanel then
    return
  end

  local craftMode = mode ~= "dismantle"

  itemsList:setVisible(craftMode)
  if itemsListScrollbar then
    itemsListScrollbar:setVisible(craftMode)
  end
  if listDivider then
    listDivider:setVisible(craftMode)
  end
  if searchPanel then
    searchPanel:setVisible(craftMode)
  end
  if searchSeparator then
    searchSeparator:setVisible(craftMode)
  end

  craftPanel:setVisible(craftMode)
  dismantlePanel:setVisible(not craftMode)
end

local function resetCraftCollections()
  Crafts = createEmptyCrafts()
  selectedCategory = nil
  selectedCraftId = nil
  clearQualitySelections()
  clearDismantleSelection()

  if categories then
    for _, categoryId in ipairs({"herbalist", "woodcutting", "mining", "generalcrafting", "armorsmith", "weaponsmith", "jewelsmith", "dismantle"}) do
      local button = categories:getChildById(categoryId .. "Cat")
      if button then
        button:setOn(false)
      end
    end
  end

  if itemsList then
    itemsList:destroyChildren()
  end

  if craftPanel then
    resetCraftPanel()
  end

  if dismantlePanel then
    resetDismantlePanel()
  end

  setInterfaceMode("craft")
end

local function requestCraftFetch(resetState)
  if resetState then
    resetCraftCollections()
  end

  sendToServer({action = "fetch"})
end

local function scheduleFetchFallback()
  if pendingFetchFallbackEvent then
    removeEvent(pendingFetchFallbackEvent)
    pendingFetchFallbackEvent = nil
  end

  pendingFetchFallbackEvent = scheduleEvent(
    function()
      pendingFetchFallbackEvent = nil
      if not window or not window:isVisible() then
        return
      end

      if getTotalCraftCount() == 0 then
        requestCraftFetch(false)
      end
    end,
    1000
  )
end

local function bindRecipeListItem(widget, craftIndex)
  if not widget then
    return
  end

  local function handleRecipeClick(clickedWidget)
    if clickedWidget then
      clickedWidget:focus()
    end
    selectItem(craftIndex)
  end

  widget.craftIndex = craftIndex
  widget.onClick = function(clickedWidget)
    handleRecipeClick(clickedWidget)
  end

  local itemWidget = widget:getChildById("item")
  if itemWidget then
    itemWidget.onClick = function()
      handleRecipeClick(widget)
    end
  end

  local nameWidget = widget:getChildById("name")
  if nameWidget then
    nameWidget.onClick = function()
      handleRecipeClick(widget)
    end
  end

  local levelWidget = widget:getChildById("level")
  if levelWidget then
    levelWidget.onClick = function()
      handleRecipeClick(widget)
    end
  end
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

local function inspectDraggedQualityMaterial(slotIndex, item)
  if not item then
    return
  end

  local craft = getSelectedCraft()
  if not isQualityCraft(craft) then
    return
  end

  local position = item:getPosition()
  sendToServer(
    {
      action = "inspectQualityMaterial",
      data = {
        category = selectedCategory,
        craftId = selectedCraftId,
        slot = slotIndex,
        clientId = item:getId(),
        position = {x = position.x, y = position.y, z = position.z}
      }
    }
  )
  setQualityStatus("Validando material selecionado...", "#afafaf")
end

local function inspectDraggedDismantleItem(item)
  if not item then
    return
  end

  local position = item:getPosition()
  sendToServer(
    {
      action = "inspectDismantleItem",
      data = {
        clientId = item:getId(),
        position = {x = position.x, y = position.y, z = position.z}
      }
    }
  )
  setDismantleStatus("Validando equipamento selecionado...", "#afafaf")
end

local function onMaterialDragEnter(widget, mousePos)
  local craft = getSelectedCraft()
  if not isQualityCraft(craft) then
    return false
  end

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
  local craft = getSelectedCraft()
  widget:setBorderWidth(0)

  if not isQualityCraft(craft) then
    return false
  end

  local item = draggedWidget and draggedWidget.currentDragThing
  if not item or not item:isItem() then
    return false
  end

  inspectDraggedQualityMaterial(widget.slotIndex, item)
  return true
end

local function onDismantleDragEnter(widget, mousePos)
  if not isDismantleCategory() then
    return false
  end

  local item = isDragItemValid()
  if not item then
    return false
  end

  widget:setBorderWidth(1)
  widget:setBorderColor("#c2953e")
  return true
end

local function onDismantleDragLeave(widget, droppedWidget, mousePos)
  widget:setBorderWidth(0)
  return true
end

local function onDismantleDrop(widget, draggedWidget, mousePos)
  widget:setBorderWidth(0)

  if not isDismantleCategory() then
    return false
  end

  local item = draggedWidget and draggedWidget.currentDragThing
  if not item or not item:isItem() then
    return false
  end

  inspectDraggedDismantleItem(item)
  return true
end

local function bindQualitySlots()
  if not craftPanel then
    return
  end

  for i = 1, MAX_MATERIAL_SLOTS do
    local slot = getMaterialSlot(i)
    if slot then
      slot.slotIndex = i
      slot.onDragEnter = onMaterialDragEnter
      slot.onDragLeave = onMaterialDragLeave
      slot.onDrop = onMaterialDrop
    end
  end
end

local function bindDismantleSlot()
  if not dismantlePanel then
    return
  end

  local slot = getDismantleChild("dismantleInputSlot")
  if slot then
    slot.onDragEnter = onDismantleDragEnter
    slot.onDragLeave = onDismantleDragLeave
    slot.onDrop = onDismantleDrop
  end
end

local function ensureWindowVisible()
  if not window then
    return
  end

  local screenWidth = g_window.getWidth()
  local screenHeight = g_window.getHeight()
  local windowWidth = window:getWidth()
  local windowHeight = window:getHeight()

  local centeredPos = {
    x = math.max(0, math.floor((screenWidth - windowWidth) / 2)),
    y = math.max(0, math.floor((screenHeight - windowHeight) / 2))
  }

  window:breakAnchors()
  window:setPosition(centeredPos)
  window:bindRectToParent()
end

function init()
  connect(
    g_game,
    {
      onGameStart = create,
      onGameEnd = destroy
    }
  )

  ProtocolGame.registerExtendedOpcode(CODE, onExtendedOpcode)

  if g_game.isOnline() then
    create()
  end
end

function terminate()
  disconnect(
    g_game,
    {
      onGameStart = create,
      onGameEnd = destroy
    }
  )

  ProtocolGame.unregisterExtendedOpcode(CODE, onExtendedOpcode)

  destroy()
end

function create()
  if window then
    return
  end

  craftingButton = modules.client_topmenu.addRightGameToggleButton('craftingButton', tr('Crafting'), '/images/topbuttons/professions', toggle, false, 9)
  craftingButton:setOn(false)
  window = g_ui.displayUI("crafting")
  window:hide()
  window.onVisibilityChange = function(widget, visible)
    if craftingButton then
      craftingButton:setOn(visible)
    end
  end

  categories = window:getChildById("categories")
  craftPanel = window:getChildById("craftPanel")
  dismantlePanel = window:getChildById("dismantlePanel")
  itemsList = window:getChildById("itemsList")
  itemsListScrollbar = window:getChildById("itemsListScrollbar")
  searchPanel = window:getChildById("searchPanel")
  searchSeparator = window:getChildById("searchSeparator")
  listDivider = window:getChildById("listDivider")

  bindQualitySlots()
  bindDismantleSlot()
  resetDismantlePanel()
  setInterfaceMode("craft")
end

function destroy()
  if pendingFetchFallbackEvent then
    removeEvent(pendingFetchFallbackEvent)
    pendingFetchFallbackEvent = nil
  end

  if craftingButton then
    craftingButton:destroy()
    craftingButton = nil
  end

  if window then
    categories = nil
    craftPanel = nil
    dismantlePanel = nil
    itemsList = nil
    itemsListScrollbar = nil
    searchPanel = nil
    searchSeparator = nil
    listDivider = nil

    selectedCategory = nil
    selectedCraftId = nil
    Crafts = createEmptyCrafts()
    clearQualitySelections()
    clearDismantleSelection()

    window:destroy()
    window = nil
  end
end

function onExtendedOpcode(protocol, code, buffer)
  local status, jsonData =
    pcall(
    function()
      return json.decode(buffer)
    end
  )

  if not status then
    g_logger.error("[Crafting] JSON error: " .. buffer)
    return false
  end

  local action = jsonData.action
  local data = jsonData.data

  if action == "fetch" then
    if pendingFetchFallbackEvent and getTotalCraftCount() == 0 and #data.crafts > 0 then
      removeEvent(pendingFetchFallbackEvent)
      pendingFetchFallbackEvent = nil
    end

    if not Crafts[data.category] then
      Crafts[data.category] = {}
    end

    for i = 1, #data.crafts do
      table.insert(Crafts[data.category], data.crafts[i])
    end

    if data.category == "herbalist" and not selectedCategory then
      selectCategory("herbalist")
    elseif data.category == selectedCategory and window and window:isVisible() and itemsList and itemsList:getChildCount() == 0 and #Crafts[data.category] > 0 then
      selectCategory(data.category)
    end
  elseif action == "materials" then
    if Crafts[data.category] then
      for i = 1, #data.materials do
        local material = data.materials[i]
        local craft = Crafts[data.category][data.from + i - 1]
        if craft and not craft.qualityCraft then
          for x = 1, #material do
            local mats = craft.materials[x]
            if mats then
              mats.player = material[x]
            end
          end
        end
      end
    end

    if data.from == 1 and window and window:isVisible() and selectedCategory == data.category and selectedCraftId then
      selectItem(selectedCraftId)
    end
  elseif action == "money" then
    money = data
    if craftPanel then
      craftPanel:recursiveGetChildById("playerMoney"):setText(comma_value(money))
    end
  elseif action == "show" then
    if not selectedCategory and Crafts.herbalist and #Crafts.herbalist > 0 then
      selectCategory("herbalist")
    end

    if selectedCategory and not isDismantleCategory() then
      if selectedCraftId then
        selectItem(selectedCraftId)
      elseif #Crafts[selectedCategory] > 0 then
        selectItem(1)
      end
    end

    show()
  elseif action == "crafted" then
    onItemCrafted()
  elseif action == "qualitySlot" then
    if data.category == selectedCategory and data.craftId == selectedCraftId then
      qualitySelections[data.slot] = data.selection
      updateQualityPreview()
    end
  elseif action == "qualityMessage" then
    if not data.category or (data.category == selectedCategory and data.craftId == selectedCraftId) then
      setQualityStatus(data.text or "", data.color or "#afafaf")
    end
  elseif action == "dismantlePreview" then
    if isDismantleCategory() then
      applyDismantleSelection(data)
    end
  elseif action == "dismantleMessage" then
    if isDismantleCategory() then
      setDismantleStatus(data.text or "", data.color or "#afafaf")
    end
  elseif action == "dismantled" then
    if isDismantleCategory() then
      resetDismantlePanel()
      setDismantleStatus("Equipamento desmontado com sucesso.", "#8AD66F")
    end
  end
end

function onItemCrafted()
  if selectedCategory and selectedCraftId then
    local craft = Crafts[selectedCategory] and Crafts[selectedCategory][selectedCraftId]
    if craft then
      for i = 1, #craft.materials do
        local materialWidget = craftPanel:getChildById("craftLine" .. i)
        materialWidget:setImageSource("/images/crafting/craft_line" .. i .. "on")
        scheduleEvent(
          function()
            materialWidget:setImageSource("/images/crafting/craft_line" .. (i == 2 and 5 or i))
          end,
          850
        )
      end

      if craft.qualityCraft then
        clearQualitySelections()
        updateQualityPreview()
        setQualityStatus("Item criado com sucesso. Slots reiniciados.", "#8AD66F")
      end

      local button = craftPanel:getChildById("craftButton")
      button:disable()
      scheduleEvent(
        function()
          button:enable()
        end,
        860
      )
    end
  end
end

function onSearch()
  if isDismantleCategory() then
    return
  end

  scheduleEvent(
    function()
      local searchInput = window:recursiveGetChildById("searchInput")
      local text = searchInput:getText():lower()
      if text:len() >= 1 then
        local children = itemsList:getChildCount()
        for i = children, 1, -1 do
          local child = itemsList:getChildByIndex(i)
          local name = child:getChildById("name"):getText():lower()
          if name:find(text) then
            child:show()
            child:focus()
            selectItem(i)
          else
            child:hide()
          end
        end
      else
        local children = itemsList:getChildCount()
        for i = children, 1, -1 do
          local child = itemsList:getChildByIndex(i)
          child:show()
          child:focus()
          selectItem(i)
        end
      end
    end,
    25
  )
end

function selectCategory(category)
  if selectedCategory then
    local oldCatBtn = categories:getChildById(selectedCategory .. "Cat")
    if oldCatBtn then
      oldCatBtn:setOn(false)
    end
  end

  local newCatBtn = categories:getChildById(category .. "Cat")
  if not newCatBtn then
    return
  end

  newCatBtn:setOn(true)
  selectedCategory = category
  selectedCraftId = nil

  if itemsList then
    itemsList:destroyChildren()
  end

  resetCraftPanel()
  resetDismantlePanel()

  if isDismantleCategory() then
    setInterfaceMode("dismantle")
    return
  end

  setInterfaceMode("craft")

  local categoryCrafts = Crafts[selectedCategory] or {}
  for i = 1, #categoryCrafts do
    local craft = categoryCrafts[i]
    local w = g_ui.createWidget("ItemListItem", itemsList)
    if itemsList then
      w:setWidth(math.max(120, itemsList:getWidth() - 22))
    end
    w:setId(i)
    bindRecipeListItem(w, i)
    w:getChildById("item"):setItemId(craft.clientId)
    w:getChildById("name"):setText(craft.name)
    w:getChildById("level"):setText("Required Level " .. craft.level)

    if i == 1 then
      w:focus()
      selectItem(1)
    end
  end
end

function selectItem(id)
  if isDismantleCategory() then
    return
  end

  local craftId = tonumber(id)
  selectedCraftId = craftId

  local craft = Crafts[selectedCategory] and Crafts[selectedCategory][craftId]
  if not craft then
    return
  end

  if itemsList then
    local listItem = itemsList:getChildByIndex(craftId)
    if listItem and not listItem:isFocused() then
      listItem:focus()
    end
  end

  resetCraftPanel()
  craftPanel:recursiveGetChildById("totalCost"):setText(comma_value(craft.cost))

  if craft.qualityCraft then
    updateQualityPreview()
    return
  end

  refreshClassicCraft(craft)
end

function craftItem()
  if isDismantleCategory() or not selectedCategory or not selectedCraftId then
    return
  end

  local craft = getSelectedCraft()
  if not craft then
    return
  end

  local payload = {
    action = "craft",
    data = {
      category = selectedCategory,
      craftId = selectedCraftId
    }
  }

  if craft.qualityCraft then
    payload.data.slots = {}
    for slotIndex, selection in pairs(qualitySelections) do
      payload.data.slots[#payload.data.slots + 1] = {
        slot = slotIndex,
        clientId = selection.clientId,
        position = selection.position
      }
    end
  end

  sendToServer(payload)
end

function clearDismantleSelectionByUser()
  resetDismantlePanel()
  setDismantleStatus("Selecao limpa.", "#afafaf")
end

function dismantleSelectedItem()
  if not isDismantleCategory() or not dismantleSelection or not dismantleSelection.position then
    setDismantleStatus("Selecione um equipamento craftado antes de desmontar.", "#FF6B6B")
    return
  end

  sendToServer(
    {
      action = "dismantle",
      data = {
        clientId = dismantleSelection.clientId,
        position = dismantleSelection.position
      }
    }
  )
end

function openRefine()
  if modules.game_material_refining and modules.game_material_refining.show then
    hide()
    modules.game_material_refining.show()
    return
  end

  g_logger.error("[Crafting] Modulo de refino nao esta disponivel.")
end

function show()
  if not window then
    return
  end

  ensureWindowVisible()
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

function toggle()
  if not window then
    create()
  end

  if not window then
    return
  end

  if window:isVisible() then
    show()
    return
  end

  resetCraftCollections()
  show()
  sendToServer({action = "show"})
  scheduleFetchFallback()
end

function comma_value(amount)
  local formatted = amount
  while true do
    formatted, k = string.gsub(formatted, "^(-?%d+)(%d%d%d)", "%1.%2")
    if k == 0 then
      break
    end
  end
  return formatted
end
