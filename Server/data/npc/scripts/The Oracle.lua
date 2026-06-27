local keywordHandler = KeywordHandler:new()
local npcHandler = NpcHandler:new(keywordHandler)
NpcSystem.parseParameters(npcHandler)

local vocation = {}
local town = {}

local config = {

	towns = {
		["venore"] = 1,
		["thais"] = 2,
		["carlin"] = 4
	},

	vocations = {
		["sorcerer"] = {
			text = "A Sorcerer! Are you sure? this decision is irreversible! {Yes}",
			vocationId = 1,
		},

		["druid"] = {
			text = "A Druid! Are you sure? this decision is irreversible! {Yes}",
			vocationId = 2,
		},

		["paladin"] = {
			text = "A Paladin! Are you sure? this decision is irreversible! {Yes}",
			vocationId = 3,
		},

		["knight"] = {
			text = "A Knight! Are you sure? this decision is irreversible! {Yes}",
			vocationId = 4,
		}
	}
}

function onCreatureAppear(cid) npcHandler:onCreatureAppear(cid) end
function onCreatureDisappear(cid) npcHandler:onCreatureDisappear(cid) end
function onCreatureSay(cid, type, msg) npcHandler:onCreatureSay(cid, type, msg) end
function onThink() npcHandler:onThink() end

local function greetCallback(cid)
	local player = Player(cid)
	local level = player:getLevel()
	if level < 8 then
		npcHandler:say("Child! Come back when you grown up!", cid)
		npcHandler:resetNpc(cid)
		return false
	elseif level > 999 then
		npcHandler:say(player:getName() ..", I can't let you leave - You are too strong already! You can only leave with level 999 or lower.", cid)
		npcHandler:resetNpc(cid)
		return false
	elseif player:getVocation():getId() > 0 then
		npcHandler:say("You already have a Vocation!", cid)
		npcHandler:resetNpc(cid)
		return false
	else
		npcHandler:setMessage(MESSAGE_GREET, player:getName() ..", Are you prepared to face your destiny? {Yes}")
	end
	return true
end

local function creatureSayCallback(cid, type, msg)
	if not npcHandler:isFocused(cid) then
		return false
	end

	local player = Player(cid)
	if npcHandler.topic[cid] == 0 then
		if msgcontains(msg, "yes") then
			npcHandler:say("You will live in: {THAIS}", cid)
			npcHandler.topic[cid] = 1
		end
	elseif npcHandler.topic[cid] == 1 then
		local cityTable = config.towns[msg:lower()]
		if cityTable then
			town[cid] = cityTable
			npcHandler:say("In ".. string.upper(msg) .."! And what profession have you chosen: {KNIGHT}, {PALADIN}, {SORCERER}, OR {DRUID}?", cid)
			npcHandler.topic[cid] = 2
		else
			npcHandler:say("You will live in: {THAIS}", cid)
		end
	elseif npcHandler.topic[cid] == 2 then
		local vocationTable = config.vocations[msg:lower()]
		if vocationTable then
			npcHandler:say(vocationTable.text, cid)
			npcHandler.topic[cid] = 3
			vocation[cid] = vocationTable.vocationId
		else
			npcHandler:say("{KNIGHT}, {PALADIN}, {SORCERER}, OR {DRUID}?", cid)
		end
	elseif npcHandler.topic[cid] == 3 then
		if msgcontains(msg, "yes") then
			npcHandler:say("So be it!", cid)
			player:setVocation(Vocation(vocation[cid]))
			player:setTown(Town(town[cid]))
			player:getPosition():sendMagicEffect(CONST_ME_TELEPORT)
			player:teleportTo(Town(town[cid]):getTemplePosition())
			player:getPosition():sendMagicEffect(CONST_ME_TELEPORT)
		else
			npcHandler:say("Then what? {KNIGHT}, {PALADIN}, {SORCERER}, OR {DRUID}?", cid)
			npcHandler.topic[cid] = 2
		end
	end
	return true
end

local function onAddFocus(cid)
	town[cid] = 0
	vocation[cid] = 0
end

local function onReleaseFocus(cid)
	town[cid] = nil
	vocation[cid] = nil
end

npcHandler:setCallback(CALLBACK_ONADDFOCUS, onAddFocus)
npcHandler:setCallback(CALLBACK_ONRELEASEFOCUS, onReleaseFocus)

npcHandler:setCallback(CALLBACK_GREET, greetCallback)
npcHandler:setMessage(MESSAGE_FAREWELL, "Come back when you are prepared to face your destiny!")
npcHandler:setMessage(MESSAGE_WALKAWAY, "Come back when you are prepared to face your destiny!")
npcHandler:setCallback(CALLBACK_MESSAGE_DEFAULT, creatureSayCallback)
npcHandler:addModule(FocusModule:new())