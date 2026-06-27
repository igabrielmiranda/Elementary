function Player:onBrowseField(position)
	if hasEventCallback(EVENT_CALLBACK_ONBROWSEFIELD) then
		return EventCallback(EVENT_CALLBACK_ONBROWSEFIELD, self, position)
	end
	return true
end

function Player:onLook(thing, position, distance)
    local description = ""
    
    if hasEventCallback(EVENT_CALLBACK_ONLOOK) then
        local callbackResult = EventCallback(EVENT_CALLBACK_ONLOOK, self, thing, position, distance, description)
        
        if callbackResult then
            description = callbackResult
        end
    end
    
    if thing:isCreature() then
        if thing:isPlayer() then
            local rankTask = getRankTask(thing)
            if rankTask then
                description = string.format("%s\n Ancestral Rank: %s", description, rankTask)
            end
        end
    end
    
    self:sendTextMessage(MESSAGE_INFO_DESCR, description)
end

function Player:onLookInBattleList(creature, distance)
	local description = ""
	if hasEventCallback(EVENT_CALLBACK_ONLOOKINBATTLELIST) then
		description = EventCallback(EVENT_CALLBACK_ONLOOKINBATTLELIST, self, creature, distance, description)
	end
	self:sendTextMessage(MESSAGE_INFO_DESCR, description)
end

function Player:onLookInTrade(partner, item, distance)
	local description = "You see " .. item:getDescription(distance)
	if hasEventCallback(EVENT_CALLBACK_ONLOOKINTRADE) then
		description = EventCallback(EVENT_CALLBACK_ONLOOKINTRADE, self, partner, item, distance, description)
	end
	self:sendTextMessage(MESSAGE_INFO_DESCR, description)
end

function Player:onLookInShop(itemType, count, description)
	local description = "You see " .. description
	if hasEventCallback(EVENT_CALLBACK_ONLOOKINSHOP) then
		description = EventCallback(EVENT_CALLBACK_ONLOOKINSHOP, self, itemType, count, description)
	end
	self:sendTextMessage(MESSAGE_INFO_DESCR, description)
end

function Player:onMoveItem(item, count, fromPosition, toPosition, fromCylinder, toCylinder)
	if item:getActionId() == CURSED_CHESTS_AID then return false end
    if hasEventCallback(EVENT_CALLBACK_ONMOVEITEM) then
        return EventCallback(EVENT_CALLBACK_ONMOVEITEM, self, item, count, fromPosition, toPosition, fromCylinder, toCylinder)
    end
	return RETURNVALUE_NOERROR
end

function Player:onItemMoved(item, count, fromPosition, toPosition, fromCylinder, toCylinder)
	if hasEventCallback(EVENT_CALLBACK_ONITEMMOVED) then
		EventCallback(EVENT_CALLBACK_ONITEMMOVED, self, item, count, fromPosition, toPosition, fromCylinder, toCylinder)
	end
end

function Player:onMoveCreature(creature, fromPosition, toPosition)
	if hasEventCallback(EVENT_CALLBACK_ONMOVECREATURE) then
		return EventCallback(EVENT_CALLBACK_ONMOVECREATURE, self, creature, fromPosition, toPosition)
	end
	return true
end

function Player:onReportRuleViolation(targetName, reportType, reportReason, comment, translation)
	if hasEventCallback(EVENT_CALLBACK_ONREPORTRULEVIOLATION) then
		EventCallback(EVENT_CALLBACK_ONREPORTRULEVIOLATION, self, targetName, reportType, reportReason, comment, translation)
	end
end

function Player:onReportBug(message, position, category)
	if hasEventCallback(EVENT_CALLBACK_ONREPORTBUG) then
		return EventCallback(EVENT_CALLBACK_ONREPORTBUG, self, message, position, category)
	end
	return true
end

function Player:onTurn(direction)
	if hasEventCallback(EVENT_CALLBACK_ONTURN) then
		return EventCallback(EVENT_CALLBACK_ONTURN, self, direction)
	end
	return true
end

function Player:onTradeRequest(target, item)
	if hasEventCallback(EVENT_CALLBACK_ONTRADEREQUEST) then
		return EventCallback(EVENT_CALLBACK_ONTRADEREQUEST, self, target, item)
	end
	return true
end

function Player:onTradeAccept(target, item, targetItem)
	if hasEventCallback(EVENT_CALLBACK_ONTRADEACCEPT) then
		return EventCallback(EVENT_CALLBACK_ONTRADEACCEPT, self, target, item, targetItem)
	end
	return true
end

function Player:onTradeCompleted(target, item, targetItem, isSuccess)
	if hasEventCallback(EVENT_CALLBACK_ONTRADECOMPLETED) then
		EventCallback(EVENT_CALLBACK_ONTRADECOMPLETED, self, target, item, targetItem, isSuccess)
	end
end

local soulCondition = Condition(CONDITION_SOUL, CONDITIONID_DEFAULT)
soulCondition:setTicks(4 * 60 * 1000)
soulCondition:setParameter(CONDITION_PARAM_SOULGAIN, 1)

local function useStamina(player)
	local staminaMinutes = player:getStamina()
	if staminaMinutes == 0 then
		return
	end

	local playerId = player:getId()
	if not nextUseStaminaTime[playerId] then
		nextUseStaminaTime[playerId] = 0
	end

	local currentTime = os.time()
	local timePassed = currentTime - nextUseStaminaTime[playerId]
	if timePassed <= 0 then
		return
	end

	if timePassed > 60 then
		if staminaMinutes > 2 then
			staminaMinutes = staminaMinutes - 2
		else
			staminaMinutes = 0
		end
		nextUseStaminaTime[playerId] = currentTime + 120
	else
		staminaMinutes = staminaMinutes - 1
		nextUseStaminaTime[playerId] = currentTime + 60
	end
	player:setStamina(staminaMinutes)
end

local pet_storage_experience = 633451
local pet_storage_level = 633452
local pet_id = 633453

function Player:getPet()
    local petId = self:getStorageValue(pet_id)
    if petId > 0 then
        return Creature(petId)
    end
    return nil
end

local monsterExpBoosts = {
    ["Bloated Man-Maggot"] = 876547,
    ["Converter"] = 876548,
    ["Darklight Construct"] = 876549,
	["Darklight Emitter"] = 876550,
	["Darklight Matter"] = 876551,
	["Darklight Source"] = 876552,
	["Darklight Striker"] = 876553,
	["Meandering Mushroom"] = 876554,
	["Mycobiontic Beetle"] = 876555,
	["Oozing Carcass"] = 876556,
	["Oozing Corpus"] = 876557,
	["Elder Bloodjaw"] = 876558,
	["Rotten Man-Maggot"] = 876559,
	["Sopping Carcass"] = 876560,
	["Sopping Corpus"] = 876561,
	["Walking Pillar"] = 876562,
	["Wandering Pillar"] = 876563,
	["Bony Sea Devil"] = 876564,
	["Brachiodemon"] = 876565,
	["Branchy Crawler"] = 876566,
	["Capricious Phantom"] = 876567,
	["Cloak Of Terror"] = 876568,
	["Courage Leech"] = 876569,
	["Distorted Phantom"] = 876570,
	["Druid's Apparition"] = 876571,
	["Hazardous Phantom"] = 876572,
	["Infernal Demon"] = 876573,
	["Infernal Phantom"] = 876574,
	["Knight's Apparition"] = 876575,
	["Many Faces"] = 876576,
	["Mould Phantom"] = 876577,
	["Paladin's Apparition"] = 876578,
	["Rotten Golem"] = 876579,
	["Sorcerer's Apparition"] = 876580,
	["Turbulent Elemental"] = 876581,
	["Vibrant Phantom"] = 876582
}

function Player:onGainExperience(source, exp, rawExp)
	if not source or source:isPlayer() then
		return exp
	end
	local sourceName = source:getName():lower()
    local storageValue = monsterExpBoosts[sourceName]
    if storageValue then
        if self:getStorageValue(storageValue) >= 1 then
            exp = exp * 1.03 -- Gives 3% EXP Boost Permanent to the monster - 1.00 = Normal, 1.03 = 3%, 2.00 = 100% Plus
        end
    end
	if source:isMonster() then
        local bonusExperience = source:getMonsterLevel() * 0.03
        if source:getMonsterLevel() > 0 and bonusExperience > 1 then
            exp = exp * bonusExperience
        end
    end
	-- Soul regeneration
	local vocation = self:getVocation()
	if self:getSoul() < vocation:getMaxSoul() and exp >= self:getLevel() then
		soulCondition:setParameter(CONDITION_PARAM_SOULTICKS, vocation:getSoulGainTicks() * 1000)
		self:addCondition(soulCondition)
	end

	-- Apply experience stage multiplier
	exp = exp * Game.getExperienceStage(self:getLevel())

	-- Stamina modifier
	if configManager.getBoolean(configKeys.STAMINA_SYSTEM) then
		useStamina(self)
		local staminaMinutes = self:getStamina()
		if staminaMinutes > 2400 and self:isPremium() then
			exp = exp * 1.5
		elseif staminaMinutes <= 840 then
			exp = exp * 0.5
		end
	end
	if self:getStorageValue(6000) >= os.time() then
        exp = exp * 2.00
    end

	local pet = self:getPet()
    if not pet then
        return exp
    end
    local petId = self:getStorageValue(pet_id)

    if petId <= 0 then
        return exp
    end

    local pet_experience = pet:getStorageValue(pet_storage_experience)
    local pet_level = pet:getStorageValue(pet_storage_level)
    local petNextLevelExperience = calculateNextLevelExperience(pet_level)
    local petExp = exp * 0.2 

    pet_experience = pet_experience + petExp

    while pet_experience >= petNextLevelExperience do
        pet_level = pet_level + 1
        pet_experience = pet_experience - petNextLevelExperience
        petNextLevelExperience = calculateNextLevelExperience(pet_level)

        if pet_level == 50 then
            self:setStorageValue(688110, 1)
        elseif pet_level == 100 then
            self:setStorageValue(688111, 1)
        elseif pet_level == 150 then
            self:setStorageValue(688112, 1)
        elseif pet_level == 200 then
            self:setStorageValue(688113, 1)
        elseif pet_level == 250 then
            self:setStorageValue(688114, 1)
        elseif pet_level == 300 then
            self:setStorageValue(688115, 1)
        end
    end

    pet:setStorageValue(pet_storage_experience, pet_experience)
    pet:setStorageValue(pet_storage_level, pet_level)

    db.query("UPDATE `players` SET `pet_experience` = " .. pet_experience .. ", `pet_level` = " .. pet_level .. " WHERE `id` = " .. self:getGuid())

    return exp
end


function Player:onLoseExperience(exp)
	return hasEventCallback(EVENT_CALLBACK_ONLOSEEXPERIENCE) and EventCallback(EVENT_CALLBACK_ONLOSEEXPERIENCE, self, exp) or exp
end

function Player:onGainSkillTries(skill, tries)
	if APPLY_SKILL_MULTIPLIER == false then
		return hasEventCallback(EVENT_CALLBACK_ONGAINSKILLTRIES) and EventCallback(EVENT_CALLBACK_ONGAINSKILLTRIES, self, skill, tries) or tries
	end

	if skill == SKILL_MAGLEVEL then
		tries = tries * configManager.getNumber(configKeys.RATE_MAGIC)
		return hasEventCallback(EVENT_CALLBACK_ONGAINSKILLTRIES) and EventCallback(EVENT_CALLBACK_ONGAINSKILLTRIES, self, skill, tries) or tries
	end
	tries = tries * configManager.getNumber(configKeys.RATE_SKILL)
	return hasEventCallback(EVENT_CALLBACK_ONGAINSKILLTRIES) and EventCallback(EVENT_CALLBACK_ONGAINSKILLTRIES, self, skill, tries) or tries
end

function Player:onWrapItem(item)
	local topCylinder = item:getTopParent()
	if not topCylinder then
		return
	end

	local tile = Tile(topCylinder:getPosition())
	if not tile then
		return
	end

	local house = tile:getHouse()
	if not house then
		self:sendCancelMessage("You can only wrap and unwrap this item inside a house.")
		return
	end

	if house ~= self:getHouse() and not string.find(house:getAccessList(SUBOWNER_LIST):lower(), "%f[%a]" .. self:getName():lower() .. "%f[%A]") then
		self:sendCancelMessage("You cannot wrap or unwrap items from a house, which you are only guest to.")
		return
	end

	local wrapId = item:getAttribute("wrapid")
	if wrapId == 0 then
		return
	end

	if not hasEventCallback(EVENT_CALLBACK_ONWRAPITEM) or EventCallback(EVENT_CALLBACK_ONWRAPITEM, self, item) then
		local oldId = item:getId()
		item:remove(1)
		local item = tile:addItem(wrapId)
		if item then
			item:setAttribute("wrapid", oldId)
		end
	end
end


function Player:onQueueLeave(queue)
	self:sendExtendedOpcode(ExtendedOPCodes.CODE_DUNGEONS, json.encode({action = "queue", data = {joined = false}}))
	local dungeon = queue:getDungeon()
	local players = Game.getPlayers()
	local inQueue = queue:getPlayersNumber()
	for _, player in ipairs(players) do
		player:sendExtendedOpcode(
			ExtendedOPCodes.CODE_DUNGEONS,
			json.encode({action = "queueUpdate", data = {id = dungeon:getId(), queue = inQueue, estimated = dungeon:getEstimatedQueueTime(player)}})
		)
	end
end