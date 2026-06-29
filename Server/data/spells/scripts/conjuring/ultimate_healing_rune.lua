function onCastSpell(creature, variant)
	if not ElementalistCanCastSpell(creature, ELEMENT_WATER) then
		return false
	end
	return creature:conjureItem(2260, 2273, 1)
end
