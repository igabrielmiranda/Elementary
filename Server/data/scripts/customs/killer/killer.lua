local goldKill = CreatureEvent("goldKill")

function setItemDescription(item, description)
    item:setAttribute(ITEM_ATTRIBUTE_TEXT, description)
end

function goldKill.onKill(player, target, lastHit)
    if player:isPlayer() and target:isPlayer() then
        local itemID = 2229  -- ID del item que se otorga al matar
        local amount = 1     -- Cantidad del item

        player:addItem(itemID, amount)

        local item = player:getItemById(itemID, true)
        if item then
            local killedPlayerName = target:getName()
            item:setAttribute(ITEM_ATTRIBUTE_DESCRIPTION, "This skull belongs to " .. killedPlayerName .. ".")
        end
    end
    return true
end

goldKill:register()