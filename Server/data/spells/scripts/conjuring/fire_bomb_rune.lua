function onCastSpell(creature, variant)
	if not ElementalistCanCastSpell(creature, ELEMENT_FIRE) then
		return false
	end
	return creature:conjureItem(2260, 2305, 2)
end
