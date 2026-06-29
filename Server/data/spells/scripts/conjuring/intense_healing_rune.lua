function onCastSpell(creature, variant)
	if not ElementalistCanCastSpell(creature, ELEMENT_WATER) then
		return false
	end
	return creature:conjureItem(2260, 2265, 1)
end
