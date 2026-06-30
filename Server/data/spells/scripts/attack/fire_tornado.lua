-- TODO: Futuramente esta skill deve usar requisito por arma equipada.

local TORNADO_EFFECT = 321
local TORNADO_DURATION_MS = 10000
local TORNADO_TICK_MS = 500
local REQUIRED_ORB_ITEM_ID = 2189
local REQUIRED_ORB_RECIPE_KEY = "elemental_orb"
local REQUIRED_ORB_NAME = "orbe elemental"
local REQUIRED_ORB_MESSAGE = "Voce precisa equipar um Orbe Elemental para usar esta habilidade."

local combat = Combat()
combat:setParameter(COMBAT_PARAM_TYPE, COMBAT_FIREDAMAGE)
combat:setArea(createCombatArea({
  {0, 1, 1, 1, 0},
  {1, 1, 1, 1, 1},
  {1, 1, 3, 1, 1},
  {1, 1, 1, 1, 1},
  {0, 1, 1, 1, 0}
}))

function onGetFormulaValues(player, level, magicLevel)
  local min = (level * 1.5) + (magicLevel * 5)
  local max = (level * 2.2) + (magicLevel * 7)
  return -min, -max
end

combat:setCallback(CALLBACK_PARAM_LEVELMAGICVALUE, "onGetFormulaValues")

local function showTornadoEffect(centerPosition, remainingTicks)
  Position(centerPosition):sendMagicEffect(TORNADO_EFFECT)

  if remainingTicks > 1 then
    addEvent(showTornadoEffect, TORNADO_TICK_MS, centerPosition, remainingTicks - 1)
  end
end

local function canPullTarget(caster, target)
  if not target or target:getId() == caster:getId() or target:isNpc() then
    return false
  end

  if target:isMonster() then
    return true
  end

  local master = target:getMaster()
  if master and master:getId() ~= caster:getId() then
    return true
  end

  return false
end

local function pullTargetTowardsCenter(caster, target, centerPosition)
  local targetPosition = target:getPosition()
  local dx = centerPosition.x - targetPosition.x
  local dy = centerPosition.y - targetPosition.y

  if math.max(math.abs(dx), math.abs(dy)) <= 1 then
    return false
  end

  local stepX = dx == 0 and 0 or (dx > 0 and 1 or -1)
  local stepY = dy == 0 and 0 or (dy > 0 and 1 or -1)

  local destination = Position(targetPosition)
  destination.x = destination.x + stepX
  destination.y = destination.y + stepY

  local tile = Tile(destination)
  if not tile or not tile:isWalkable() or tile:hasFlag(TILESTATE_PROTECTIONZONE) then
    return false
  end

  if tile:queryAdd(target, 0) ~= RETURNVALUE_NOERROR then
    return false
  end

  return target:teleportTo(destination, true)
end

local function pullTargets(creature, centerPosition)
  local spectators = Game.getSpectators(centerPosition, false, false, 2, 2, 2, 2)
  for _, target in ipairs(spectators) do
    if canPullTarget(creature, target) then
      pullTargetTowardsCenter(creature, target, centerPosition)
    end
  end
end

local function getEquippedOrbItem(player)
  for _, slot in ipairs({CONST_SLOT_LEFT, CONST_SLOT_RIGHT}) do
    local item = player:getSlotItem(slot)
    if item and item:getId() == REQUIRED_ORB_ITEM_ID then
      local recipeKey = item:getCustomAttribute("craft_recipe_key")
      if recipeKey == REQUIRED_ORB_RECIPE_KEY then
        return item
      end

      local customName = item:getAttribute(ITEM_ATTRIBUTE_NAME)
      if type(customName) == "string" and customName:lower():find(REQUIRED_ORB_NAME, 1, true) then
        return item
      end
    end
  end

  return nil
end

function onCastSpell(creature, variant)
  if not creature or not creature:isPlayer() then
    return false
  end

  if not getEquippedOrbItem(creature) then
    creature:sendCancelMessage(REQUIRED_ORB_MESSAGE)
    return false
  end

  local centerPosition = creature:getPosition()
  showTornadoEffect({
    x = centerPosition.x,
    y = centerPosition.y,
    z = centerPosition.z
  }, math.ceil(TORNADO_DURATION_MS / TORNADO_TICK_MS))
  pullTargets(creature, centerPosition)

  return combat:execute(creature, variant)
end
