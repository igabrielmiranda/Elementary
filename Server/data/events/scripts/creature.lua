function Creature:onChangeOutfit(outfit)
	if hasEventCallback(EVENT_CALLBACK_ONCHANGEMOUNT) then
		if not EventCallback(EVENT_CALLBACK_ONCHANGEMOUNT, self, outfit.lookMount) then
			return false
		end
	end
	if hasEventCallback(EVENT_CALLBACK_ONCHANGEOUTFIT) then
		return EventCallback(EVENT_CALLBACK_ONCHANGEOUTFIT, self, outfit)
	else
		return true
	end
end

function Creature:onAreaCombat(tile, isAggressive)
	if hasEventCallback(EVENT_CALLBACK_ONAREACOMBAT) then
		return EventCallback(EVENT_CALLBACK_ONAREACOMBAT, self, tile, isAggressive)
	else
		return RETURNVALUE_NOERROR
	end
end

function Creature:onTargetCombat(target)
	if not self or not target then
        return RETURNVALUE_NOERROR
    end

    target:registerEvent("WhenPlayerAttackHealth")
    target:registerEvent("WhenPlayerAttackMana")
    
    if self:isMonster() and target:isPlayer() then
        local master = self:getMaster()
        if master and master:isPlayer() then
            local party = target:getParty()
            local targetParty = master:getParty()
           
            if party and party == targetParty then
                return RETURNVALUE_YOUMAYNOTATTACKTHISCREATURE
            end

            if master == target then
                return RETURNVALUE_YOUMAYNOTATTACKTHISCREATURE
            end

			if target:hasSecureMode() then
				return RETURNVALUE_TURNSECUREMODETOATTACKUNMARKEDPLAYERS
			end
        end
    end
	if target:isPlayer() and self:isPlayer() then
		local attackerPlayer = Player(self)
		local targetPlayer = Player(target)
		
		if attackerPlayer and attackerPlayer:isPlayer() then
			local attackerParty = attackerPlayer:getParty()
			local targetParty = targetPlayer:getParty()
			
			if attackerParty and attackerParty == targetParty then
				return RETURNVALUE_YOUMAYNOTATTACKTHISCREATURE
			end
	
			if attackerPlayer == targetPlayer then
				return RETURNVALUE_YOUMAYNOTATTACKTHISCREATURE
			end
	
			if targetPlayer:hasSecureMode() then
				return RETURNVALUE_TURNSECUREMODETOATTACKUNMARKEDPLAYERS
			end
		end
	end
	
	

    
    if hasEventCallback(EVENT_CALLBACK_ONTARGETCOMBAT) then
        return EventCallback(EVENT_CALLBACK_ONTARGETCOMBAT, self, target)
    else
        return RETURNVALUE_NOERROR
    end
end

function Creature:onHear(speaker, words, type)
	if hasEventCallback(EVENT_CALLBACK_ONHEAR) then
		EventCallback(EVENT_CALLBACK_ONHEAR, self, speaker, words, type)
	end
end

function Creature:onBuffAdded(buff)
    if self:isPlayer() then
        local buffData = {
            id = buff:getId(),
            name = buff:getName(),
            description = buff:getDescription(),
            icon = buff:getIcon(),
            border = buff:getBorder(),
            stacks = buff:getStacks(),
            ticks = buff:getTicks(),
            endTime = buff:getEndTime(),
            server_time = os.time(),
            debuff = buff:isDebuff()
        }
        self:sendExtendedOpcode(ExtendedOPCodes.CODE_BUFF, json.encode({action = "add", data = buffData}))
    end
end

function Creature:onBuffUpdated(buff)
    if self:isPlayer() then
        local buffData = {
            id = buff:getId(),
            icon = buff:getIcon(),
            stacks = buff:getStacks(),
            ticks = buff:getTicks(),
            endTime = buff:getEndTime(),
            server_time = os.time(),
            debuff = buff:isDebuff()
        }
        self:sendExtendedOpcode(ExtendedOPCodes.CODE_BUFF, json.encode({action = "update", data = buffData}))
    end
end

function Creature:onBuffRemoved(buff)
    if self:isPlayer() then
        local buffData = {
            id = buff:getId(),
            debuff = buff:isDebuff()
        }
        self:sendExtendedOpcode(ExtendedOPCodes.CODE_BUFF, json.encode({action = "remove", data = buffData}))
    end
end