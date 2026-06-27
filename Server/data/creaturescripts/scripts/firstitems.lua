local config = {
    [0] = { -- None
        items = {
            {2456, 1},  -- bow
			{2544, 50},  -- 50 arrows
        },
        container = {
            {2120, 1},  -- rope
			{2554, 1},  -- shovel
			{7618, 3},  -- health potion
			{7620, 3},  -- mana potion
        }
    },
}
function onLogin(player)
    if player:getLastLoginSaved() == 0 then
        local vocationId = player:getVocation():getId()

        if config[vocationId] then
            local vocationConfig = config[vocationId]

            -- Give items
            for _, item in ipairs(vocationConfig.items) do
                player:addItem(item[1], item[2])
            end

            -- Create a container and add items to it
            local container = player:addItem(1988, 1)
            for _, containerItem in ipairs(vocationConfig.container) do
                container:addItem(containerItem[1], containerItem[2])
            end
        end
    end
    return true
end





