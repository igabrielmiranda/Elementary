local WALL_EFFECT = 323
local WALL_DURATION_MS = 7000
local WALL_RADIUS = 3
local WALL_ITEM_ID = ITEM_WILDGROWTH
local DAMAGE_TAKEN_MULTIPLIER = 1.20
local REQUIRED_WEAPON_MESSAGE = "Voce precisa estar com um machado equipado para usar esta habilidade."
local activeStoneWalls = rawget(_G, "StoneWallPrisonState")

if type(activeStoneWalls) ~= "table" then
  activeStoneWalls = {
    trappedCreatures = {}
  }
  rawset(_G, "StoneWallPrisonState", activeStoneWalls)
end

local function isAxeItem(item)
  if not item then
    return false
  end

  local itemType = item:getType()
  return itemType and itemType:getWeaponType() == WEAPON_AXE
end

local function hasAxeEquipped(player)
  for _, slot in ipairs({CONST_SLOT_LEFT, CONST_SLOT_RIGHT}) do
    if isAxeItem(player:getSlotItem(slot)) then
      return true
    end
  end

  return false
end

local function getPerimeterPositions(centerPosition)
  local positions = {}

  for offsetX = -WALL_RADIUS, WALL_RADIUS do
    for offsetY = -WALL_RADIUS, WALL_RADIUS do
      if math.abs(offsetX) == WALL_RADIUS or math.abs(offsetY) == WALL_RADIUS then
        positions[#positions + 1] = Position(centerPosition.x + offsetX, centerPosition.y + offsetY, centerPosition.z)
      end
    end
  end

  return positions
end

local function showWallEffect(centerPosition)
  for _, position in ipairs(getPerimeterPositions(centerPosition)) do
    position:sendMagicEffect(WALL_EFFECT)
  end
end

local function safelyRemoveBarrierItems(items)
  for _, item in ipairs(items) do
    pcall(function()
      if item and item:isItem() then
        item:remove()
      end
    end)
  end
end

local function canCreateBarrierAt(position)
  local tile = Tile(position)
  if not tile or not tile:getGround() then
    return false
  end

  if tile:hasFlag(TILESTATE_PROTECTIONZONE) or tile:isHouse() then
    return false
  end

  if tile:getTopCreature() then
    return false
  end

  local items = tile:getItems()
  if items then
    for index = 1, tile:getItemCount() do
      local item = items[index]
      if item and item:hasProperty(CONST_PROP_BLOCKSOLID) then
        return false
      end
    end
  end

  return true
end

local function createBarrier(centerPosition)
  local createdItems = {}

  for _, position in ipairs(getPerimeterPositions(centerPosition)) do
    if canCreateBarrierAt(position) then
      local wallItem = Game.createItem(WALL_ITEM_ID, 1, position)
      if wallItem then
        createdItems[#createdItems + 1] = wallItem
      end
    end
  end

  return createdItems
end

local function sameParty(first, second)
  if not first or not second or not first:isPlayer() or not second:isPlayer() then
    return false
  end

  local firstParty = first:getParty()
  local secondParty = second:getParty()
  return firstParty and secondParty and firstParty == secondParty
end

local function isEnemyCreature(caster, target)
  if not caster or not target or caster:getId() == target:getId() then
    return false
  end

  local targetMaster = target:getMaster()
  if targetMaster and targetMaster:getId() == caster:getId() then
    return false
  end

  local casterMaster = caster:getMaster()
  if casterMaster and casterMaster:getId() == target:getId() then
    return false
  end

  if target:isMonster() then
    return true
  end

  if target:isPlayer() and caster:isPlayer() then
    return not sameParty(caster, target)
  end

  if targetMaster and targetMaster:isPlayer() and caster:isPlayer() then
    return not sameParty(caster, targetMaster)
  end

  return true
end

local function releaseCreature(creatureId, token)
  local trapData = activeStoneWalls.trappedCreatures[creatureId]
  if not trapData or trapData.token ~= token then
    return
  end

  local creature = Creature(creatureId)
  if creature and not creature:isRemoved() then
    if trapData.shouldBlockMovement then
      creature:setMovementBlocked(false)
    end
    creature:setStorageValue(STORAGEVALUE_STONEWALL_DAMAGE_TAKEN, -1)
    creature:unregisterEvent("StoneWallPrisonDamage")
  end

  activeStoneWalls.trappedCreatures[creatureId] = nil
end

local function trapCreature(caster, target)
  local creatureId = target:getId()
  local token = os.mtime()
  local shouldBlockMovement = caster:getId() ~= creatureId

  activeStoneWalls.trappedCreatures[creatureId] = {
    token = token,
    shouldBlockMovement = shouldBlockMovement
  }

  if shouldBlockMovement then
    target:setMovementBlocked(true)
  end

  if isEnemyCreature(caster, target) then
    target:setStorageValue(STORAGEVALUE_STONEWALL_DAMAGE_TAKEN, math.floor(DAMAGE_TAKEN_MULTIPLIER * 100))
    target:registerEvent("StoneWallPrisonDamage")
  else
    target:setStorageValue(STORAGEVALUE_STONEWALL_DAMAGE_TAKEN, -1)
  end

  addEvent(releaseCreature, WALL_DURATION_MS, creatureId, token)
end

local function trapCreaturesInArea(caster, centerPosition)
  local spectators = Game.getSpectators(centerPosition, false, false, WALL_RADIUS, WALL_RADIUS, WALL_RADIUS, WALL_RADIUS)
  for _, target in ipairs(spectators) do
    if target and not target:isRemoved() and target:getHealth() > 0 then
      trapCreature(caster, target)
    end
  end
end

function onCastSpell(creature, variant)
  local player = Player(creature)
  if not player then
    return false
  end

  if not hasAxeEquipped(player) then
    player:sendCancelMessage(REQUIRED_WEAPON_MESSAGE)
    return false
  end

  local centerPosition = player:getPosition()
  showWallEffect(centerPosition)

  local barrierItems = createBarrier(centerPosition)
  if #barrierItems > 0 then
    addEvent(safelyRemoveBarrierItems, WALL_DURATION_MS, barrierItems)
  end

  trapCreaturesInArea(player, centerPosition)
  return true
end
