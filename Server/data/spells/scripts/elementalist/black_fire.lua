local combat = Combat()
combat:setParameter(COMBAT_PARAM_TYPE, COMBAT_FIREDAMAGE)
combat:setParameter(COMBAT_PARAM_EFFECT, 229)
combat:setArea(createCombatArea({
  {1, 1, 1},
  {1, 3, 1},
  {1, 1, 1}
}))

function onGetFormulaValues(player, level, magicLevel)
  local min = (level * 1.2) + (magicLevel * 4)
  local max = (level * 1.8) + (magicLevel * 6)
  return -min, -max
end

combat:setCallback(CALLBACK_PARAM_LEVELMAGICVALUE, "onGetFormulaValues")

function onCastSpell(creature, variant)
  local player = Player(creature)
  if player and not player:checkElementRequirement(ELEMENT_FIRE) then
    return false
  end

  return combat:execute(creature, variant)
end
