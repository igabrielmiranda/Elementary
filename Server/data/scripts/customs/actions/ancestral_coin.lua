local ancestralCoin = Action()

function ancestralCoin.onUse(player, item)
    local points = item:getCount()
    local newTotal = taskPoints_add(player, points) or taskPoints_get(player)

    player:sendTextMessage(MESSAGE_INFO_DESCR, "You received " .. points .. " Ancestral Points. Total: " .. newTotal .. ".")
    item:remove()
    return true
end

ancestralCoin:id(26778)
ancestralCoin:register()
