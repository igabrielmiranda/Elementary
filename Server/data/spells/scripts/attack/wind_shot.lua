-- TODO: Futuramente esta skill deve usar requisito por arma equipada.

local combat = Combat()
combat:setParameter(COMBAT_PARAM_TYPE, COMBAT_ENERGYDAMAGE)
combat:setParameter(COMBAT_PARAM_EFFECT, CONST_ME_ENERGYHIT)
combat:setParameter(COMBAT_PARAM_DISTANCEEFFECT, 23)

function onGetFormulaValues(player, level, magicLevel)
	local min = (level * 0.5) + (magicLevel * 2)
	local max = (level * 0.8) + (magicLevel * 3)
	return -min, -max
end

combat:setCallback(CALLBACK_PARAM_LEVELMAGICVALUE, "onGetFormulaValues")

function onCastSpell(creature, variant)

	return combat:execute(creature, variant)
end
