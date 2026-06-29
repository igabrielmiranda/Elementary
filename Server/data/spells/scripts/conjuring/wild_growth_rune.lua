function onCastSpell(creature, variant)
	if not ElementalistCanCastSpell(creature, ELEMENT_EARTH) then
		return false
	end
	return creature:conjureItem(2260, 2269, 2)
end
