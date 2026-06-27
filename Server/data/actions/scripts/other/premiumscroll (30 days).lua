local function doPlayerAddPremiumDays(cid, days)
    local player = Player(cid)
    if player then
        player:addPremiumDays(days)
    end
end

function onUse(cid, item, fromPosition, itemEx, toPosition)
    local daysToAdd = 30  -- Number of premium days to add
    doPlayerAddPremiumDays(cid, daysToAdd)
    doPlayerSendTextMessage(cid, MESSAGE_EVENT_ADVANCE, "You have received " .. daysToAdd .. " premium days to your account.")
    doSendMagicEffect(getCreaturePosition(cid), CONST_ME_MAGIC_BLUE)
    doRemoveItem(item.uid, 1)
    return true
end