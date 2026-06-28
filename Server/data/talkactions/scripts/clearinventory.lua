local function countInventoryItem(item)
	if not item then
		return 0
	end

	local total = 1
	if item:isContainer() then
		for _, childItem in ipairs(item:getItems() or {}) do
			total = total + countInventoryItem(childItem)
		end
	end

	return total
end

local function clearPlayerInventory(target)
	local removedItems = 0

	for slot = CONST_SLOT_HEAD, CONST_SLOT_AMMO do
		local item = target:getSlotItem(slot)
		if item then
			removedItems = removedItems + countInventoryItem(item)
			item:remove()
		end
	end

	return removedItems
end

function onSay(player, words, param)
	if not player:getGroup():getAccess() then
		return true
	end

	local target = player
	local targetName = player:getName()
	param = param and param:trim() or ""

	if param ~= "" then
		target = Player(param)
		if not target then
			player:sendCancelMessage("Player not found.")
			return false
		end

		if target ~= player and target:getGroup():getAccess() then
			player:sendCancelMessage("You cannot clear this player's inventory.")
			return false
		end

		targetName = target:getName()
	end

	local removedItems = clearPlayerInventory(target)
	target:getPosition():sendMagicEffect(CONST_ME_MAGIC_RED)

	if target == player then
		player:sendTextMessage(MESSAGE_STATUS_CONSOLE_BLUE, string.format("Inventory cleared. Removed %d item(s).", removedItems))
	else
		player:sendTextMessage(MESSAGE_STATUS_CONSOLE_BLUE, string.format("Inventory of %s cleared. Removed %d item(s).", targetName, removedItems))
		target:sendTextMessage(MESSAGE_STATUS_CONSOLE_BLUE, string.format("Your inventory was cleared by %s.", player:getName()))
	end

	return false
end
