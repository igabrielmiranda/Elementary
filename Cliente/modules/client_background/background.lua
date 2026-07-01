-- private variables
local background
local dailyMonstersPanel
local clientVersionLabel
local hoverWindow

-- public functions
function init()
  background = g_ui.displayUI('background')
  background:lower()

  dailyMonstersPanel = background:getChildById("dailyMonsters")

  clientVersionLabel = background:getChildById('clientVersionLabel')
  clientVersionLabel:setText('Hellgrave Exodus / Discord')
  
  if not g_game.isOnline() then
    addEvent(function() g_effects.fadeIn(clientVersionLabel, 1500) end)
  end

  connect(g_game, { onGameStart = hide })
  connect(g_game, { onGameEnd = show })
end

function terminate()
  disconnect(g_game, { onGameStart = hide })
  disconnect(g_game, { onGameEnd = show })

  g_effects.cancelFade(background:getChildById('clientVersionLabel'))
  background:destroy()

  Background = nil
end

function hide()
  background:hide()
end

function show()
  background:show()
end

function hideVersionLabel()
  background:getChildById('clientVersionLabel'):hide()
end

function setVersionText(text)
  clientVersionLabel:setText(text)
end

function getBackground()
  return background
end

function getImageClip(id)
	if not id then
		return "0 0 19 19"
	end

	return (((id - 1) % 8) * 19) .. " " .. ((math.ceil(id / 8) - 1) * 19) .. " 19 19"
end

function setIconImageType(widget, id)
	if not id then
		return false
	end

	widget:setImageClip(getImageClip(id))
end

function onHoverChange(self, hovered)
  if not hovered then
    if hoverWindow then
      hoverWindow:destroy()
      hoverWindow = nil
    end

    return true
  end

  local pos = self:getPosition()
  pos.x = pos.x - 82
  pos.y = pos.y - 112

  hoverWindow = g_ui.displayUI("dailybonus")
  hoverWindow:setPosition(pos)

  for k, v in pairs(self.data) do
    local iconId = 0
    local description = ""
    if k == "damage" then
      iconId = 19
      description = v .. "% More Damage"
    elseif k == "health" then
      iconId = 27
      description = v .. "% More Maximum Health"
    elseif k == "experience" then
      iconId = 49
      description = v .. "% More Experience"
    elseif k == "loot" then
      iconId = 15
      description = v .. "% Higher Drop Chance"
    elseif k == "spawn" then
      iconId = 38
      description = v .. "% Faster Spawn Rate"
    end

    if iconId ~= 0 then
      local widget = g_ui.createWidget("DailyMultiplierLabel", hoverWindow:getChildById("list"))
      setIconImageType(widget:getChildById("icon"), iconId)
      widget:setText(description)
    end
  end
end

function updateDailyMonsters(dailyMonsters)
  if not dailyMonstersPanel then
    return
  end

  for i = 1, #dailyMonsters do
    local widget = g_ui.createWidget("DailyMonster", dailyMonstersPanel)
    widget:getChildById("creature"):setOutfit(dailyMonsters[i][2])
    widget:getChildById("name"):setText(dailyMonsters[i][1].name)
    widget.data = dailyMonsters[i][1]
    widget.onHoverChange = onHoverChange
  end

  dailyMonstersPanel:setWidth((#dailyMonsters * 128) + ((#dailyMonsters - 1) * 4))
end
