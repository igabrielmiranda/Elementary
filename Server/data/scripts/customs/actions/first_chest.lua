local config = {
    [1] = { -- Sorcerer
    items = {
    {2189, 1}, -- Wand of Cosmic Energy
    },
    container = {
    {7620, 10} -- mana potion
    }
    },
    [2] = { -- Druid
    items = {
    {2181, 1}, -- Terra Rod
    },
    container = {
    {7620, 10} -- mana potion
    }
    },
    [3] = { -- Paladin
    items = {
    {2389, 5}, -- 5 spears
    },
    container = {
    {2544, 50} -- 50 arrows
    }
    },
    [4] = { -- Knight
    items = {
    {2376, 1}, -- sword
    },
    container = {
    {7618, 10} -- health potion
    }
    },
    [5] = { -- Sorcerer
    items = {
    {2189, 1}, -- Wand of Cosmic Energy
    },
    container = {
    {7620, 10} -- mana potion
    }
    },
    [6] = { -- Druid
    items = {
    {2181, 1}, -- Terra Rod
    },
    container = {
    {7620, 10} -- mana potion
    }
    },
    [7] = { -- Paladin
    items = {
    {2389, 5}, -- 5 spears
    },
    container = {
    {2544, 50} -- 50 arrows
    }
    },
    [8] = { -- Knight
    items = {
    {2376, 1}, -- sword
    },
    container = {
    {7618, 10} -- health potion
    }
    }
    }
    
    local firstItems = Action()

    function firstItems.onUse(player, item, fromPosition, target, toPosition, isHotkey)
    local targetVocation = config[player:getVocation():getId()]
    if not targetVocation then
        return true
    end

    local storage = player:getStorageValue(33735)

    if storage > 0 then
        player:sendTextMessage(MESSAGE_INFO_DESCR, "You already collected this chest.")
        return true
    end

    for i = 1, #targetVocation.items do
        player:addItem(targetVocation.items[i][1], targetVocation.items[i][2])
    end

    local backpack = player:addItem(1988)
    if not backpack then
        return true
    end

    for i = 1, #targetVocation.container do
        backpack:addItem(targetVocation.container[i][1], targetVocation.container[i][2])
    end

    player:setStorageValue(33735, 1) 
    return true
end

firstItems:aid(33735)
firstItems:register()
