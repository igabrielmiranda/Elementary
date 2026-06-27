BUFFS = {
    [BUFF_EXAMPLE] = {
        id = BUFF_EXAMPLE, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Buff Name",
        description = "Buff tooltip description",
        icon = "buff icon in client/data/images/buffs/",
        border = "buff border in client/data/images/buffs/",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = -1 -- in ms, -1 = until removed, > 0 for a duration
    },
	[BUFF_UTANI_HUR] = {
        id = BUFF_UTANI_HUR, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Haste",
        description = "You can run more faster",
        icon = "utani_hur",
        border = "frame-2-gold",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = 33000 -- in ms, -1 = until removed, > 0 for a duration
    },
    [BUFF_UTANI_GRAN_HUR] = {
        id = BUFF_UTANI_GRAN_HUR, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Strong Haste",
        description = "You can run more faster",
        icon = "utani_gran_hur",
        border = "frame-2-gold",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = 22000 -- in ms, -1 = until removed, > 0 for a duration
    },
    [BUFF_UTAMO_VITA] = {
        id = BUFF_UTAMO_VITA, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Magic Shield",
        description = "You are protected by a magic shield",
        icon = "utamo_vita",
        border = "frame-2-gold",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = 200000 -- in ms, -1 = until removed, > 0 for a duration
    },
    [BUFF_UTAMO_TEMPO_SAN] = {
        id = BUFF_UTAMO_TEMPO_SAN, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Swift Foot",
        description = "You are hasted",
        icon = "utamo_tempo_san",
        border = "frame-2-gold",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = 10000 -- in ms, -1 = until removed, > 0 for a duration
    },
    [BUFF_UTURA] = {
        id = BUFF_UTURA, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Recovery",
        description = "You are healing",
        icon = "utura",
        border = "frame-2-gold",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = 3000 -- in ms, -1 = until removed, > 0 for a duration
    },
    [BUFF_UTAMO_TEMPO] = {
        id = BUFF_UTAMO_TEMPO, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Protector",
        description = "You are shielded",
        icon = "utamo_tempo",
        border = "frame-2-gold",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = 13000 -- in ms, -1 = until removed, > 0 for a duration
    },
    [BUFF_UTANA_VID] = {
        id = BUFF_UTANA_VID, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Invisible",
        description = "No one can see you",
        icon = "utana_vid",
        border = "frame-2-gold",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = 200000 -- in ms, -1 = until removed, > 0 for a duration
    },
    [BUFF_UTURA_GRAN] = {
        id = BUFF_UTURA_GRAN, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Intense Recovery",
        description = "You are healing",
        icon = "utura_gran",
        border = "frame-2-gold",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = 3000 -- in ms, -1 = until removed, > 0 for a duration
    },
    [BUFF_UTANI_TEMPO_HUR] = {
        id = BUFF_UTANI_TEMPO_HUR, -- check src/buff.h and add new there and registerEnum in luascript.cpp
        name = "Charge",
        description = "You are hasted",
        icon = "utani_tempo_hur",
        border = "frame-2-gold",
        stacked = false,
        maxStacks = 1, -- max stacks if stacked == true, addBuff(buffId) adds +1 stack and refreshes duration
        ticks = 5000 -- in ms, -1 = until removed, > 0 for a duration
    },
}

DEBUFFS = {
    -- same config as above, buffs here act as debuffs and are displayed in 2nd row in the client
}

for _, buff in pairs(BUFFS) do
    Game.registerBuffType(buff.id, buff.name, buff.description, buff.icon, buff.border, buff.stacked, buff.maxStacks, buff.ticks, false)
end

for _, debuff in pairs(DEBUFFS) do
    Game.registerBuffType(debuff.id, debuff.name, debuff.description, debuff.icon, debuff.border, debuff.stacked, debuff.maxStacks, debuff.ticks, true)
end
