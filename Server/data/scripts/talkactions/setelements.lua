local talk = TalkAction("/setelements")
local infoTalk = TalkAction("/elements")

local function sendUsage(player, words)
	player:sendCancelMessage(string.format("Uso: %s fire air | %s water | %s none", words, words, words))
end

function talk.onSay(player, words, param)
	if not player:getGroup():getAccess() then
		return true
	end

	if player:getAccountType() < ACCOUNT_TYPE_GAMEMASTER then
		return false
	end

	param = param:trim()
	if param == "" then
		sendUsage(player, words)
		return false
	end

	local parts = param:lower():split(" ")
	if #parts > 2 then
		player:sendCancelMessage("Voce so pode escolher ate 2 elementos.")
		return false
	end

	local primaryName = parts[1]
	local secondaryName = parts[2]
	local primary = ElementalistGetElementId(primaryName)

	if not primary then
		player:sendCancelMessage("Elemento invalido.")
		return false
	end

	if primary == ELEMENT_NONE then
		if secondaryName then
			player:sendCancelMessage("Use 'none' sozinho para limpar os elementos.")
			return false
		end

		player:clearElements()
		player:sendTextMessage(MESSAGE_STATUS_CONSOLE_BLUE, "Elementos limpos. Restricoes elementais desativadas para este personagem.")
		return false
	end

	if not secondaryName then
		player:setElements(primary, ELEMENT_NONE)
		player:sendTextMessage(MESSAGE_STATUS_CONSOLE_BLUE, "Elemento definido: " .. ElementalistGetElementName(primary) .. ".")
		return false
	end

	local secondary = ElementalistGetElementId(secondaryName)
	if not secondary or secondary == ELEMENT_NONE then
		player:sendCancelMessage("Elemento invalido.")
		return false
	end

	if primary == secondary then
		player:setElements(primary, ELEMENT_NONE)
		player:sendTextMessage(MESSAGE_STATUS_CONSOLE_BLUE, "Elemento definido: " .. ElementalistGetElementName(primary) .. ".")
		return false
	end

	player:setElements(primary, secondary)
	player:sendTextMessage(MESSAGE_STATUS_CONSOLE_BLUE, string.format("Elementos definidos: %s + %s.", ElementalistGetElementName(primary), ElementalistGetElementName(secondary)))
	return false
end

talk:separator(" ")
talk:register()

function infoTalk.onSay(player, words, param)
	if not player:getGroup():getAccess() then
		return true
	end

	if player:getAccountType() < ACCOUNT_TYPE_GAMEMASTER then
		return false
	end

	player:sendTextMessage(
		MESSAGE_STATUS_CONSOLE_BLUE,
		string.format(
			"Primario: %s\nSecundario: %s\nPrimary storage: %d\nSecondary storage: %d\nInitialized storage: %d",
			ElementalistGetElementName(player:getPrimaryElement()),
			ElementalistGetElementName(player:getSecondaryElement()),
			player:getStorageValue(PlayerStorageKeys.elementPrimary),
			player:getStorageValue(PlayerStorageKeys.elementSecondary),
			player:getStorageValue(PlayerStorageKeys.elementInitialized)
		)
	)
	return false
end

infoTalk:register()
