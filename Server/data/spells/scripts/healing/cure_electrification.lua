local combat = Combat()
combat:setParameter(COMBAT_PARAM_EFFECT, CONST_ME_MAGIC_BLUE)
combat:setParameter(COMBAT_PARAM_DISPEL, CONDITION_ENERGY)
combat:setParameter(COMBAT_PARAM_AGGRESSIVE, false)

function onCastSpell(creature, variant)
	if not ElementalistCanCastSpell(creature, ELEMENT_WATER) then
		return false
	end
	return combat:execute(creature, variant)
end
