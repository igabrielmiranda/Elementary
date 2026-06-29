function onCastSpell(creature, variant)
	if not ElementalistCanCastSpell(creature, ELEMENT_FIRE) then
		return false
	end
	return creature:conjureItem(2260, 2302, 5)
end
