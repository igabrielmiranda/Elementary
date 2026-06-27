local ec = EventCallback

ec.onDropLoot = function(self, corpse)
    local mType = self:getType()
    local player = Player(corpse:getCorpseOwner())
    if not player or player:getStamina() > 840 then      
        if math.random(1, 100) <= 5 then
            local quantity28343 = math.random(1, 5)
            local specialItem1 = corpse:addItem(28343, quantity28343)
            if specialItem1 then
            else
                Spdlog.warn(string.format("[3][Monster:onDropLoot] - Could not add special loot item 28343 to monster: %s, from corpse id: %d.", self:getName(), corpse:getId()))
            end

            local quantity28344 = math.random(1, 3)
            local specialItem2 = corpse:addItem(28344, quantity28344)
            if specialItem2 then
            else
                Spdlog.warn(string.format("[3][Monster:onDropLoot] - Could not add special loot item 28344 to monster: %s, from corpse id: %d.", self:getName(), corpse:getId()))
            end
			return true
        end
    end
end

ec:register()
