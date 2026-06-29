function onCastSpell(creature, variant)
	if not ElementalistCanCastSpell(creature, ELEMENT_AIR) then
		return false
	end
	return creature:conjureItem(2260, 2315, 4)
end
