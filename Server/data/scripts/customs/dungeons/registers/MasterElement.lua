local MasterElement = Dungeon()

-- Basic info
MasterElement:setTitle("MasterElement")
MasterElement:setDuration(60 * 60 * 1000)
MasterElement:setMapFile("MasterElement")
MasterElement:setStartPosition(Position(116, 34, 7))
MasterElement:setRequiredParty(1, 5)

-- Boss
MasterElement:setBoss("Master of the Elements", Position(131, 256, 7))
MasterElement:setKillPercent(80)

-- Requirements
MasterElement:setRequiredLevel(300)
MasterElement:setRequiredGold(2 * 100 * 100) -- 1cc

-- Boss Loot
MasterElement:addReward(28033, 2, 8)
MasterElement:addReward(28058, 2, 6)
MasterElement:addReward(27177, 1, 38)
MasterElement:addReward(24774, 10, 5)
MasterElement:addReward(26779, 8, 10)
MasterElement:addReward(27179, 1, 10)
MasterElement:addReward(27178, 1, 10)
MasterElement:addReward(27170, 1, 10)
MasterElement:addReward(27163, 1, 10)
MasterElement:addReward(26738, 8, 10)
MasterElement:addReward(26735, 8, 10)


MasterElement:addChallenge(ChallengesIndex.MASTER_ELEMENTS_HUNTER)
MasterElement:addChallenge(ChallengesIndex.MASTER_ELEMENTS_FINISH)


-- Instances
MasterElement:addInstance(Position(10300, 10300, 0))


MasterElement:register()
