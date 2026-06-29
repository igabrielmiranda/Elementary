local combat = Combat()
combat:setParameter(COMBAT_PARAM_DISTANCEEFFECT, CONST_ANI_ENERGY)
combat:setParameter(COMBAT_PARAM_CREATEITEM, ITEM_WILDGROWTH)

function onCastSpell(creature, variant, isHotkey)
	if not ElementalistCanCastSpell(creature, ELEMENT_EARTH) then
		return false
	end
	return combat:execute(creature, variant)
end
