local function addPoints(player, amount)
	return taskPoints_add(player, amount)
end

function onSay(player, words, param)
	if not player:getGroup():getAccess() then
		return true
	end

	if player:getAccountType() < ACCOUNT_TYPE_GOD then
		return false
	end

	local split = param:splitTrimmed(",")
	local target = player
	local amount

	if not split[1] or split[1] == "" then
		player:sendCancelMessage("Use /addancestralpoints amount ou /addancestralpoints player, amount.")
		return false
	end

	if split[2] then
		target = Player(split[1])
		if not target then
			player:sendCancelMessage("A player with that name is not online.")
			return false
		end

		amount = tonumber(split[2])
	else
		amount = tonumber(split[1])
	end

	if not amount or amount < 1 then
		player:sendCancelMessage("Amount must be a positive number.")
		return false
	end

	amount = math.floor(amount)
	local newTotal = addPoints(target, amount) or taskPoints_get(target)

	target:sendTextMessage(MESSAGE_EVENT_ADVANCE, string.format("You received %d ancestral points. Total: %d.", amount, newTotal))

	if target ~= player then
		player:sendTextMessage(MESSAGE_EVENT_ADVANCE, string.format("Added %d ancestral points to %s. New total: %d.", amount, target:getName(), newTotal))
	end

	return false
end
