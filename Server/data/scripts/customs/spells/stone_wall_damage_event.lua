local stoneWallPrisonDamage = CreatureEvent("StoneWallPrisonDamage")

local function applyMultiplier(damage, multiplier)
  local numericDamage = tonumber(damage) or 0
  if numericDamage <= 0 then
    return damage
  end

  return math.floor(numericDamage * multiplier + 0.5)
end

function stoneWallPrisonDamage.onHealthChange(creature, attacker, primaryDamage, primaryType, secondaryDamage, secondaryType, origin)
  if not creature then
    return primaryDamage, primaryType, secondaryDamage, secondaryType
  end

  local multiplierPercent = creature:getStorageValue(STORAGEVALUE_STONEWALL_DAMAGE_TAKEN)
  if multiplierPercent == nil or multiplierPercent < 100 then
    return primaryDamage, primaryType, secondaryDamage, secondaryType
  end

  local multiplier = multiplierPercent / 100
  primaryDamage = applyMultiplier(primaryDamage, multiplier)
  secondaryDamage = applyMultiplier(secondaryDamage, multiplier)
  return primaryDamage, primaryType, secondaryDamage, secondaryType
end

stoneWallPrisonDamage:register()
