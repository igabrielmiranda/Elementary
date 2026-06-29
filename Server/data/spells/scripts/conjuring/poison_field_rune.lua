function onCastSpell(creature, variant)
	if not ElementalistCanCastSpell(creature, ELEMENT_EARTH) then
		return false
	end
	return creature:conjureItem(2260, 2285, 3)
end
