--- Script created by
--- ______     __         ______     __  __   
---/\  __ \   /\ \       /\  ___\   /\_\_\_\  
---\ \  __ \  \ \ \____  \ \  __\   \/_/\_\/_ 
--- \ \_\ \_\  \ \_____\  \ \_____\   /\_\/\_\
---  \/_/\/_/   \/_____/   \/_____/   \/_/\/_/
                                           



local pet_experience = 633451
local pet_level = 633452
local pet_id = 633453
local pet_name = 633454

local cooldown_storage = 808815
local cooldown_duration = 900

function createPet(cid, petName)
  local player = Player(cid)
  if not player then
    return
  end

  local vocationId = getPlayerVocation(player)
  local vocationBaseId = player:getVocation():getId()

  local summons = player:getSummons()
  for _, summon in ipairs(summons) do
    if summon:isMonster() then
      player:sendTextMessage(MESSAGE_INFO_DESCR, "You already have a pet or familiar summoned.")
      return
    end
  end

  local currentCooldown = player:getStorageValue(cooldown_storage)
  if currentCooldown > os.time() then
    local remainingCooldown = currentCooldown - os.time()
    local minutes = math.ceil(remainingCooldown / 60)
    player:sendTextMessage(MESSAGE_INFO_DESCR, "You need to wait " .. minutes .. " more minutes before summoning a Familiar again.")
    return
  end

  local pet = nil

  if vocationId == VOCATION.ID.SORCERER or vocationBaseId == VOCATION.ID.MASTER_SORCERER then
    pet = Game.createMonster("Sorcerer Familiar", player:getPosition())
  elseif vocationId == VOCATION.ID.DRUID or vocationBaseId == VOCATION.ID.ELDER_DRUID then
    pet = Game.createMonster("Druid Familiar", player:getPosition())
  elseif vocationId == VOCATION.ID.KNIGHT or vocationBaseId == VOCATION.ID.ELITE_KNIGHT then
    pet = Game.createMonster("Knight Familiar", player:getPosition())
  elseif vocationId == VOCATION.ID.PALADIN or vocationBaseId == VOCATION.ID.ROYAL_PALADIN then
    pet = Game.createMonster("Paladin Familiar", player:getPosition())
  elseif vocationId == VOCATION.ID.NONE then
    player:sendTextMessage(MESSAGE_INFO_DESCR, "You need a vocation to summon a Familiar.")
  end

  if pet ~= nil then
    pet:setMaster(player)
    pet:registerEvent('SummonFollow')
    local petStorageValue = 655421 + player:getAccountId()
    pet:setStorageValue(tostring(petStorageValue), pet:getId())
    pet:setStorageValue(pet_experience, 0) 
    pet:setStorageValue(pet_level, 1)
    player:setStorageValue(pet_id, pet:getId())
    player:setStorageValue(pet_name, petName)
    player:setStorageValue(cooldown_storage, os.time() + cooldown_duration)
    player:sendTextMessage(MESSAGE_INFO_DESCR, "You have summoned your Familiar.")
  else
    player:sendTextMessage(MESSAGE_INFO_DESCR, "Unable to create the Familiar.")
  end
end


local pet_storage_experience = 633451
local pet_storage_level = 633452

function loadPlayerPet(player)
  local petId = player:getStorageValue(pet_id)
  if petId > 0 then
    local pet = Creature(petId)  
    if pet then
      local accountId = player:getAccountId()
      local query = db.storeQuery("SELECT `pet_experience`, `pet_level` FROM `players` WHERE `id` = " .. player:getGuid())
      if query ~= nil then
        local petExperience = result.getNumber(query, "pet_experience")
        local petLevel = result.getNumber(query, "pet_level")
        result.free(query)

        pet:setStorageValue(pet_storage_experience, petExperience)
        pet:setStorageValue(pet_storage_level, petLevel)
        return pet
      end
    end
  else
    return true  
  end
  return nil  
end



local storageGet = TalkAction("!summonfamiliar")

storageGet.onSay = function(player, words)
  if player:getLevel() >= 200 then
  if words == "!summonfamiliar" then
    local playerPos = player:getPosition()
    local summons = Game.getSpectators(playerPos, false, true, 1, 1, 1, 1)
    for _, summon in ipairs(summons) do
      if summon:isMonster() and summon:getMaster() == player then
        player:sendTextMessage(MESSAGE_INFO_DESCR, "You already have a pet or familiar summoned.")
        return false
      end
    end
    loadPlayerPet(player)
    local vocation = player:getVocation()
    local petName = ""
    if vocation == VOCATION.ID.VOCATION_KNIGHT or vocation == VOCATION.ID.VOCATION_ELITE_KNIGHT then
      petName = "Knight Familiar"
    elseif vocation == VOCATION.ID.VOCATION_SORCERER or vocation == VOCATION.ID.VOCATION_MASTER_SORCERER then
      petName = "Sorcerer Familiar"
    elseif vocation == VOCATION.ID.VOCATION_DRUID or vocation == VOCATION.ID.VOCATION_ELDER_DRUID then
      petName = "Druid Familiar"
    elseif vocation == VOCATION.ID.VOCATION_PALADIN or vocation == VOCATION.ID.VOCATION_ROYAL_PALADIN then
      petName = "Paladin Familiar"
    elseif vocation == VOCATION.ID.NONE then
      player:sendTextMessage(MESSAGE_INFO_DESCR, "You need a vocation to summon a Familiar.")
    end
    createPet(player, petName)
    return false
  end
else
  player:sendTextMessage(MESSAGE_INFO_DESCR, "You need level 200 to summon your Familiar.")
end
  return true
end

storageGet:separator(" ")
storageGet:register()

local petLevelAction = TalkAction("!familiarlevel")

function calculateNextLevelExperience(level)
  return level * level * 200
end

petLevelAction.onSay = function(player, words)
  if words == "!familiarlevel" then
    local pet = loadPlayerPet(player)
    
    if pet then
      local petLevel = pet:getStorageValue(pet_level)
      local petExperience = pet:getStorageValue(pet_experience)
      local petNextLevelExperience = calculateNextLevelExperience(petLevel)
      
      player:sendTextMessage(MESSAGE_INFO_DESCR, string.format("Your Familiar is currently level %d.\nYour Familiar has experience %d/%d.", petLevel, petExperience, petNextLevelExperience))
    else
      player:sendTextMessage(MESSAGE_INFO_DESCR, "You don't have a Familiar summoned.")
    end
    
    return false
  end
  
  return true
end

petLevelAction:separator(" ")
petLevelAction:register()


