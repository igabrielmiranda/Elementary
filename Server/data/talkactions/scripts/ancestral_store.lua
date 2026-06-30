local ancestralStoreProducts = {
    ["1:6"] = {itemId = 26653, price = 25},
    ["1:7"] = {itemId = 26650, price = 25},
    ["1:8"] = {itemId = 26652, price = 35},
    ["1:9"] = {itemId = 26651, price = 45},
    ["1:10"] = {itemId = 26649, price = 60},
    ["2:1"] = {itemId = 26644, price = 25},
    ["2:2"] = {itemId = 26648, price = 25},
    ["2:3"] = {itemId = 26645, price = 35},
    ["2:4"] = {itemId = 26647, price = 45},
    ["2:5"] = {itemId = 26646, price = 60},
    ["3:11"] = {itemId = 27761, price = 25},
    ["3:12"] = {itemId = 27762, price = 25},
    ["3:13"] = {itemId = 27763, price = 25},
    ["3:14"] = {itemId = 27764, price = 25},
    ["3:15"] = {itemId = 27765, price = 25},
    ["3:16"] = {itemId = 27766, price = 25},
    ["3:17"] = {itemId = 27767, price = 25},
    ["3:18"] = {itemId = 27768, price = 90},
    ["3:19"] = {itemId = 27769, price = 90},
    ["3:20"] = {itemId = 27770, price = 90},
    ["3:21"] = {itemId = 27771, price = 90},
    ["3:22"] = {itemId = 27772, price = 90},
    ["3:23"] = {itemId = 27773, price = 90},
    ["3:24"] = {itemId = 27774, price = 90},
    ["3:25"] = {itemId = 27775, price = 750},
    ["3:26"] = {itemId = 27776, price = 750},
    ["3:27"] = {itemId = 27777, price = 750},
    ["3:28"] = {itemId = 27778, price = 750},
    ["3:29"] = {itemId = 27779, price = 750},
    ["3:30"] = {itemId = 27780, price = 750},
    ["3:31"] = {itemId = 27781, price = 750},
}

local function getStoreProduct(categoryId, productId)
    return ancestralStoreProducts[string.format("%d:%d", categoryId, productId)]
end

local function canReceiveStoreItem(player, itemId)
    local backpack = player:getSlotItem(CONST_SLOT_BACKPACK)
    if not backpack then
        return false, "You don't have a backpack."
    end

    if backpack:getEmptySlots(true) <= 0 then
        return false, "You don't have enough space in backpack."
    end

    local itemType = ItemType(itemId)
    if player:getFreeCapacity() < itemType:getWeight(1) then
        return false, "You don't have enough capacity."
    end

    return true
end

function onSay(player, words, param)
    local split = param:splitTrimmed(",")
    local categoryId = tonumber(split[1])
    local productId = tonumber(split[2])

    if not categoryId or not productId then
        player:sendCancelMessage("Use !ancestralstore categoryId, productId.")
        return false
    end

    local offer = getStoreProduct(categoryId, productId)
    if not offer then
        player:sendCancelMessage("This ancestral store offer does not exist.")
        return false
    end

    local itemType = ItemType(offer.itemId)
    if not itemType or itemType:getId() == 0 then
        player:sendCancelMessage("This ancestral store item is not configured correctly.")
        return false
    end

    local playerPoints = taskPoints_get(player)
    if playerPoints < offer.price then
        sendAncestralPointsBalance(player)
        player:sendTextMessage(MESSAGE_EVENT_ADVANCE, "You don't have the required " .. offer.price .. " ancestral points to buy this.")
        return false
    end

    local canReceive, receiveError = canReceiveStoreItem(player, offer.itemId)
    if not canReceive then
        player:sendCancelMessage(receiveError)
        return false
    end

    if not player:addItem(offer.itemId, 1, false) then
        player:sendCancelMessage("Something went wrong, item couldn't be added.")
        return false
    end

    local newTotal = taskPoints_remove(player, offer.price) or taskPoints_get(player)
    player:sendTextMessage(
        MESSAGE_EVENT_ADVANCE,
        string.format(
            "You have purchased %s for %d ancestral points. Remaining: %d.",
            itemType:getName(),
            offer.price,
            newTotal
        )
    )
    return false
end
