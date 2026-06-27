<?php require_once 'engine/init.php'; include 'layout/overall/header_wiki.php'; ?>
<div class="desc-changelog__block flex-ss" style="">
<div class="donate-page__title" style="color:white">Wikipedia</div><br></br></div>

<div class="global-desc flex-sbs prevent-select">
	<div class="global-desc__nav">
		<div class="global-desc__nav-item flex-sc" data-open-tab="server">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_0.png" alt=""></div>
			<div class="global-desc__nav-text">Basic information<span>Server Info</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="mining">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_1.png" alt=""></div>
			<div class="global-desc__nav-text">Mining<span>Mining System</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="woodcutting">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_5.png" alt=""></div>
			<div class="global-desc__nav-text">Woodcutting<span>Woodcutting System</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="herbalist">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_4.png" alt=""></div>
			<div class="global-desc__nav-text">Herbalist<span>Herbalist System</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="ancestral">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_7.png" alt=""></div>
			<div class="global-desc__nav-text">Ancestral<span>Ancestral System</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="dungeons">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_3.png" alt=""></div>
			<div class="global-desc__nav-text">Dungeons<span>Dungeon System</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="azure">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_0.png" alt=""></div>
			<div class="global-desc__nav-text">Azure<span>Azure Portals</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="tiers">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_10.png" alt=""></div>
			<div class="global-desc__nav-text">Tiers<span>Equipment Tiers</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="expansion">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_0.png" alt=""></div>
			<div class="global-desc__nav-text">Expansion<span>Spawns, Zones</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="badges">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_5.png" alt=""></div>
			<div class="global-desc__nav-text">Badges<span>New Badges</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="ship">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_0.png" alt=""></div>
			<div class="global-desc__nav-text">Ship<span>Navigation on Continent</span></div>
		</div>
		<div class="global-desc__nav-item flex-sc" data-open-tab="isles">
			<div class="global-desc__nav-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_7.png" alt=""></div>
			<div class="global-desc__nav-text">The Isles<span>WorldBosses</span></div>
		</div>
		

	</div>
	<div class="global-desc__content">


		<div class="global-desc__content-item" data-name-tab="server">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_0.png" alt=""></div>
				<div class="global-desc__content-title-text">Basic Information<span>Server Info</span></div>
			</div>
			<div class="global-desc__content-box">
				<div class="desc-main">

					<div class="desc-main__header">
						<div class="desc-main__header-info flex-sbs">
							<div class="desc-main__header-date">
								<span class="desc-main__header-date-title"><i class="far fa-clock"></i> Server Start</span>
								<span class="desc-main__header-date-text">Server is Started!</span>
							</div>
						</div>
					</div>
					<div class="desc-margin-30"></div>
					<div class="desc-text">
						<div class="desc-text__title fz_20"><i class="far fa-sparkles"></i> Launch of <span><?php echo $config['site_title'] ?></span>!</div>
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15">
							Dear friends, we have prepared a new custom world called <?php echo $config['site_title'] ?>. Come to discover the unique world constantly updated.
						</div>
					</div>
					<div class="desc-margin-20"></div>
					<div class="desc-sep"></div>
					<div class="desc-sep"></div>
					<div class="desc-margin-20"></div>
					<div class="desc-text">
						<div class="desc-text__title fz_20"><i class="far fa-sparkles"></i> A look on systems</div>
						<div class="desc-margin-10"></div>
					</div>
					
					<div class="desc-bonuses flex-ss">
						<div class="desc-bonuses__item">
							<img src="layout/application/templates/default/images/description/bonuses/mining_system.png" alt="">
							<div class="desc-bonuses__content">
								<div class="desc-bonuses__name" style="color:gold">Mining System</div>
								</div>
						</div>
						<div class="desc-bonuses__item">
							<img src="layout/application/templates/default/images/description/bonuses/waypoints.png" alt="">
							<div class="desc-bonuses__content">
								<div class="desc-bonuses__name" style="color:#ef8757">Waypoints</div>
								</div>
						</div>
						<div class="desc-bonuses__item">
							<img src="layout/application/templates/default/images/description/bonuses/woodcutting_system.png" alt="">
							<div class="desc-bonuses__content">
								<div class="desc-bonuses__name" style="color:lime">Woodcutting</div>
								</div>
						</div>
						<div class="desc-bonuses__item">
							<img src="layout/application/templates/default/images/description/bonuses/ancestral_system.png" alt="">
							<div class="desc-bonuses__content">
								<div class="desc-bonuses__name" style="color:#ff00b3">Ancestral System</div>
								</div>
						</div>
						<div class="desc-bonuses__item">
							<img src="layout/application/templates/default/images/description/bonuses/dungeon_system.png" alt="">
							<div class="desc-bonuses__content">
								<div class="desc-bonuses__name">Dungeons</div>
								</div>
						</div>
					</div>
					<div class="desc-margin-20"></div>
					<div class="desc-text">
						<div class="desc-text__title fz_20"><i class="far fa-book-heart"></i>And not only this!</div>
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15">
							There is also, <span style="color:orange">Herbalist</span>, <span style="color:orange">Crafting</span>, <span style="color:orange">Ancestral System</span>, <span style="color:orange">Azure Portals</span>, <span style="color:orange">Expansions (Map & Quests)</span>, <span style="color:orange">Tiers System</span>, <span style="color:orange">Badges System</span>, <span style="color:orange">Deck System</span>, <span style="color:orange">Ship ( Navigation on Continent with a ship )</span>, <span style="color:orange">Isles with Worldbosses</span> and much more!
						</div>
					</div>
					<div class="desc-margin-20"></div>
					<div class="desc-sep"></div>
					<div class="desc-margin-20"></div>
					<div class="desc-text">
						<div class="desc-text__title fz_20"><i class="far fa-book-heart"></i>Briefly about the concept of the server!</div>
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15">
							We decided to create an unique world, custom and RPG as possible. <?php echo $config['site_title'] ?> 
                            Is a fully alive world, full of mysteries, things to do, quests, evolution, discovery, and much more!
							<div class="desc-margin-10"></div>
							The server will start slowly, so that all players can take the time to discover the new things that will come with each expansion. Play at your own pace, have fun with your friends, challenge the greatest bosses of all time and gain supreme power.
						</div>
					</div>
				</div>
			</div>
		</div>

	
		<div class="global-desc__content-item" data-name-tab="mining">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_1.png" alt=""></div>
				<div class="global-desc__content-title-text">Mining<span>Custom Mining</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Minner's Forge:</div>
	</div>
	<div class="desc-margin-20"></div>
    <div style="margin-left:auto;margin-right:auto"><img src="layout/application/templates/default/images/description/mining/minners_forge.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;"><br></br><p style="text-align:center"><i>Crafting on Minner's Forge</i></p></div>
     <div style="margin-left:auto;margin-right:auto"><img src="layout/application/templates/default/images/description/mining/craft_effect.gif" alt="" style="    border-radius: 12px;
    border: 1px solid #56423d;"><br></br><p style="text-align:center"><i>Mining around the world</i></p></div>
     <div style="margin-left:auto;margin-right:auto"><img src="layout/application/templates/default/images/description/mining/mining_effect.gif" alt="" style="    border-radius: 12px;
    border: 1px solid #56423d;"><br></br><p style="text-align:center"><i>Gif program records with low pixels, some colors can be looked as washed.</i></p></div>
    <div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
							<b>Minner's Forge</b> is located at south of <b>Mordragor</b>, here you will find npc <b class="tooltip-item">Elyotrope<span class="tooltiptext">Elyotrope Sells the first pickaxe to start mining.</span></b> he sells the first pick for start mining around the world. Bought it, collect pieces , craft small and big ingots and sell it to <b>Elyotrope</b>.
							<div class="desc-margin-10"></div>
							As expansions come, small and big ingots will most likely be used in a craft, for now they can be sold on Elyotrope.
						</div>
					</div>
	</div>
    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
    <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
							Mining System can be started at south of <b> Mordragor </b> talking to NPC <b> Elyotrope</b> bought the <b class="tooltip-item">beginner's pickaxe <span class="tooltiptext">Beginner's Pickaxe allows you to start mining on bronze veins.</span></b> and start collecting pieces from veins.
							<div class="desc-margin-10"></div>
							You will find 7 differents veins around the world:
						</div>
					</div>
	<div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Picks:</div>
	</div>
	<div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-boss__blocks flex-ss">


<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/mining/beginners_pickaxe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Beginner's Pickaxe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/mining/beginners_pickaxe.png">
					<div class="desc-margin-10"></div>
        	        Elyotrope Sells the first pickaxe to start mining. Meet Elyotrope at South of Mordragor. You can start mining on Bronze Veins.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Beginner's Pickaxe
        	</div>
        	<div class="desc-enchant__line"><b>Obtention:</b> Bought from Elyotrope.</div>
        	<div class="desc-enchant__line"><b>Can mine:</b> Bronze Veins.</div>
    	</div>
	</div>
</div>

<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/mining/apprentices_pickaxe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Apprentice's Pickaxe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/mining/apprentices_pickaxe.png">
					<div class="desc-margin-10"></div>
        	        This pick can be crafted on minner's forge. You can mine on bronze and silver veins.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
			Apprentice's Pickaxe
        	</div>
        	<div class="desc-enchant__line"><b>Obtention:</b> Bought from Elyotrope.</div>
        	<div class="desc-enchant__line"><b>Can mine:</b> Bronze Veins.</div>
    	</div>
	</div>
</div>
<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/mining/miners_pickaxe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Miner's Pickaxe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/mining/miners_pickaxe.png">
					<div class="desc-margin-10"></div>
					This pick can be crafted on minner's forge. You can mine on bronze, silver and Sapphire Veins.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
			Miner's Pickaxe
        	</div>
        	<div class="desc-enchant__line"><b>Obtention:</b> Crafted on Minner's Forge.</div>
        <div class="desc-enchant__line"><b>Can mine:</b>  Bronze, Silver and Sapphire Veins.</div>
    	</div>
	</div>
</div>
		</div>
		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/mining/experts_pickaxe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Expert's Pickaxe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/mining/experts_pickaxe.png">
					<div class="desc-margin-10"></div>
        	        This pick can be crafted on minner's forge. You can mine on bronze, silver, sapphire and gold veins.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Expert's Pickaxe
        	</div>
        	<div class="desc-enchant__line"><b>Obtention:</b> Crafted on Minner's Forge.</div>
        <div class="desc-enchant__line"><b>Can mine:</b>  Bronze, Silver, Sapphire and Gold Veins.</div>
    	</div>
	</div>
</div>
		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/mining/masters_pickaxe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Master's Pickaxe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/mining/masters_pickaxe.png">
					<div class="desc-margin-10"></div>
        	       This pick can be crafted on minner's forge. You can mine on bronze, silver, sapphire, gold, amethyst, ruby and emerald veins.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Master's Pickaxe
        	</div>
        	 <div class="desc-enchant__line"><b>Obtention:</b> Crafted on Minner's Forge.</div>
        <div class="desc-enchant__line"><b>Can mine:</b>  Bronze, Silver, Sapphire, Gold, Amethyst, Ruby and Emerald Veins.</div>
    	</div>
	</div>
</div>
		</div>
	</div>
<div class="desc-margin-20"></div>
<div class="desc-margin-20"></div>
	<div class="desc-boss__blocks flex-ss">
		<div class="desc-enchant__block flex-ss">
       <img src="layout/application/templates/default/images/description/mining/bronze_vein.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__icon"></div>
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Bronze Vein</div>
				<div class="desc-enchant__line"><b>Color:</b> Bronze (Brown).</div>
				<div class="desc-enchant__line"><b>Mining Skill Required:</b> 0</div>
				<div class="desc-enchant__line"><b>Description:</b> This is the first vein that can be minned.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/silver_vein.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Silver Vein</div>
				<div class="desc-enchant__line"><b>Color:</b> Silver (Gray).</div>
				<div class="desc-enchant__line"><b>Mining Skill Required:</b> 5</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be minned with <b>apprentice's pickaxe</b> crafted on Minner's Forge.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/sapphire_vein.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Sapphire Vein</div>
				<div class="desc-enchant__line"><b>Color:</b> Sapphire (Blue).</div>
				<div class="desc-enchant__line"><b>Mining Skill Required:</b> 15</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be minned with <b>miner's pickaxe</b> crafted on Minner's Forge.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/gold_vein.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Gold Vein</div>
				<div class="desc-enchant__line"><b>Color:</b> Gold (Yellow).</div>
				<div class="desc-enchant__line"><b>Mining Skill Required:</b> 25</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be minned with <b>expert's pickaxe</b> crafted on Minner's Forge.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/amethyst_vein.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Amethyst Vein</div>
				<div class="desc-enchant__line"><b>Color:</b> Amethyst (Purple/Pink).</div>
				<div class="desc-enchant__line"><b>Mining Skill Required:</b> 40</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be minned with <b>master's pickaxe</b> crafted on Minner's Forge.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/ruby_vein.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Ruby Vein</div>
				<div class="desc-enchant__line"><b>Color:</b> Ruby (Red).</div>
				<div class="desc-enchant__line"><b>Mining Skill Required:</b> 60</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be minned with <b>master's pickaxe</b> crafted on Minner's Forge.</div>
			</div>
		</div>
        <div class="desc-enchant__block flex-ss">
		<img src="layout/application/templates/default/images/description/mining/emerald_vein.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Emerald Vein</div>
				<div class="desc-enchant__line"><b>Color:</b> Emerald (Green).</div>
				<div class="desc-enchant__line"><b>Mining Skill Required:</b> 80</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be minned with <b>master's pickaxe</b> crafted on Minner's Forge.</div>
			</div>
		</div>
    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
	<div class="desc-margin-20"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Recipe Loots:</div>
	</div>
</div>

<div class="desc-boss__blocks flex-ss">
		<div class="desc-enchant__block flex-ss">
       <img src="layout/application/templates/default/images/description/mining/small_bronze_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__icon"></div>
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Recipe: Small Bronze Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Cyclops, Barbarian Bloodwalker, Elf Arcanis, Elf Scout.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/small_silver_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Small Silver Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Dragon Lord, Warlock, Sea Serpent, Hydra.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/small_sapphire_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Recipe: Small Sapphire Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Hellspawn, Destroyer, Grim Reaper.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/small_gold_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Small Gold Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Wereboar, Vile Grandmaster, Behemoth.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/small_amethyst_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Recipe: Small Amethyst Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Fury, Diabolic Imp, Hellfire Fighter.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/small_ruby_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Small Ruby Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Demon, Lizard Chose, Wyrms.</b></div>
			</div>
		</div>
        <div class="desc-enchant__block flex-ss">
		<img src="layout/application/templates/default/images/description/mining/small_emerald_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Small Emerald Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Lava Golem, Giant Spider, Reality Reaver.</b></div>
			</div>
		</div>


		<div class="desc-enchant__block flex-ss">
       <img src="layout/application/templates/default/images/description/mining/big_bronze_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__icon"></div>
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Recipe: Big Bronze Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Dawnfire Asura, Serpent Spawn.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/big_silver_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Big Silver Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Minotaur Amazon, Minotaur Hunter, Worm Priestess.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/big_sapphire_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Recipe: Big Sapphire Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Rustheap Golem, Hellhound, Ironblight.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/big_gold_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Big Gold Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Juggernault, Dark Torturer, Frazzlemaw.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/big_amethyst_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Recipe: Big Amethyst Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Draken Spellweaver, Draken Elite, Ghastly Dragon.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/mining/big_ruby_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Big Ruby Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Retching Horror, Sight of Surrender.</b></div>
			</div>
		</div>
        <div class="desc-enchant__block flex-ss">
		<img src="layout/application/templates/default/images/description/mining/big_emerald_ingot.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Big Emerald Ingot</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Vexclaw, Terrorsleep, Deepling Tyrant.</b></div>
			</div>
		</div>
    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
</div>
			
		</div>

	<div class="global-desc__content-item" data-name-tab="woodcutting">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_5.png" alt=""></div>
				<div class="global-desc__content-title-text">Woodcutting<span>Custom Woodcutting</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Woodcutter's Forge:</div>
	</div>
	<div class="desc-margin-20"></div>
    <div style="margin-left:auto;margin-right:auto"><img src="layout/application/templates/default/images/description/woodcutting/woodcutter_craft.gif" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;width:1100px"><br></br><p style="text-align:center"><i>Cutting Trees around the world</i></p></div>
     <div style="margin-left:auto;margin-right:auto"><img src="layout/application/templates/default/images/description/woodcutting/woodcutter.gif" alt="" style="    border-radius: 12px;
    border: 1px solid #56423d;"><br></br></div>
    <div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
							<b>Woodcutter's Forge</b> is located at the south west exit of <b>Falanaar</b>, here you will find npc <b>Rostock</b> he sells the first axe for start cutting tree's around the world. Bought it, collect wood , craft some planks and sell it to <b>Rostock</b>.
							<div class="desc-margin-10"></div>
							As expansions come, planks will most likely be used in a craft, for now they can be sold on Rostock, also new ressource will come on this job.
						</div>
					</div>
	</div>
    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
    <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
							Woodcutting System can be started at south west exit of <b>Falanaar</b> talking to NPC <b> Rostock</b> bought the <b>beginner's axe</b> and start collecting wood from tree's.
							<div class="desc-margin-10"></div>
							You will find 5 differents tree around the world:
						</div>
					</div>
	<div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Axe's:</div>
	</div>
	<div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-boss__blocks flex-ss">
	
	<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/woodcutting/begginers_axe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Beginner's Axe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/woodcutting/begginers_axe.png">
					<div class="desc-margin-10"></div>
        	       Rostock Sells the first Axe to start Woodcutting.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Beginner's Axe
        	</div>
        	 <div class="desc-enchant__line"><b>Obtention:</b> Bought from Rostock.</div>
        <div class="desc-enchant__line"><b>Can cut:</b> Big Trees.</div>
    	</div>
	</div>
</div>
		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/woodcutting/apprentices_axe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Apprentice's Axe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/woodcutting/apprentices_axe.png">
					<div class="desc-margin-10"></div>
        	       This axe can be crafted on woodcutting forge. You can cut Big Trees and Ash Trees.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Apprentice's Axe
        	</div>
        	 <div class="desc-enchant__line"><b>Obtention:</b>  Crafted on Woodcutter's Forge.</div>
        <div class="desc-enchant__line"><b>Can cut:</b> Big Trees and Ash Tree.</div>
    	</div>
	</div>
</div>
		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/woodcutting/lumberjacks_axe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Lumberjack's Axe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/woodcutting/lumberjacks_axe.png">
					<div class="desc-margin-10"></div>
        	       This axe can be crafted on woodcutting forge. You can cut Big Trees and Ash Trees.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Lumberjack's Axe
        	</div>
        	<div class="desc-enchant__line"><b>Obtention:</b>  Crafted on Woodcutter's Forge.</div>
        <div class="desc-enchant__line"><b>Can cut:</b> Big Trees, Ash Tree and Chestnut Tree.</div>
    	</div>
	</div>
</div>
		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/woodcutting/experts_axe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Expert's Axe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/woodcutting/experts_axe.png">
					<div class="desc-margin-10"></div>
        	       This axe can be crafted on woodcutting forge. You can cut Big Trees, Ash Trees, Chestnut Trees and Olive Trees.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Expert's Axe
        	</div>
        	<div class="desc-enchant__line"><b>Obtention:</b>  Crafted on Woodcutter's Forge.</div>
        <div class="desc-enchant__line"><b>Can cut:</b> Big Trees, Ash Tree, Chestnut Tree and Olive Tree.</div>
    	</div>
	</div>
</div>
		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/woodcutting/masters_axe.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Master's Axe</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/woodcutting/masters_axe.png">
					<div class="desc-margin-10"></div>
        	       This axe can be crafted on woodcutting forge. You can cut Big Trees, Ash Trees, Chestnut Trees, Olive Trees and Cherry Trees.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Master's Axe
        	</div>
        	 <div class="desc-enchant__line"><b>Obtention:</b>  Crafted on Woodcutter's Forge.</div>
        <div class="desc-enchant__line"><b>Can cut:</b> Big Trees, Ash Tree, Chestnut Tree, Olive Tree and Cherry Tree.</div>
    	</div>
	</div>
</div>

<div class="desc-margin-20"></div>
<div class="desc-sep"></div>
<div class="desc-margin-20"></div>
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Tree's:</div>
	</div>
	<div class="desc-margin-20"></div>
	<div class="desc-boss__blocks flex-ss">
		<div class="desc-enchant__block flex-ss">
       <img src="layout/application/templates/default/images/description/woodcutting/big_tree.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__icon"></div>
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Big Tree</div>
				<div class="desc-enchant__line"><b>Color:</b> Green.</div>
				<div class="desc-enchant__line"><b>Woodcutting Skill Required:</b> 0</div>
				<div class="desc-enchant__line"><b>Description:</b> This is the first tree that can be cutted.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/woodcutting/ash_tree.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Ash Tree</div>
				<div class="desc-enchant__line"><b>Color:</b> Green.</div>
				<div class="desc-enchant__line"><b>Woodcutting Skill Required:</b> 5</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be cutted with <b>apprentice's axe</b> crafted on Woodcutter's Forge.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/woodcutting/chestnut_tree.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Chestnut Tree</div>
				<div class="desc-enchant__line"><b>Color:</b> Green (Some Chestnuts).</div>
				<div class="desc-enchant__line"><b>Woodcutting Skill Required:</b> 15</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be cutted with <b>lumberjack's axe</b> crafted on Woodcutter's Forge.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/woodcutting/olive_tree.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Olive Tree</div>
				<div class="desc-enchant__line"><b>Color:</b> Green (Some Olives).</div>
				<div class="desc-enchant__line"><b>Woodcutting Skill Required:</b> 25</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be cutted with <b>expert's axe</b> crafted on Woodcutter's Forge.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/woodcutting/cherry_tree.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Cherry Tree</div>
				<div class="desc-enchant__line"><b>Color:</b> Red.</div>
				<div class="desc-enchant__line"><b>Woodcutting Skill Required:</b> 40</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be cutted with <b>master's axe</b> crafted on Woodcutter's Forge.</div>
			</div>
		</div>
    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
	<div class="desc-margin-20"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Recipe Loots:</div>
	</div>
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-enchant__block flex-ss">
       <img src="layout/application/templates/default/images/description/woodcutting/big.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__icon"></div>
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Recipe: Big Piece of Wood</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Giant Spider, Dragon Hatchling.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/woodcutting/ash_plank.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Ash Plank</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Nightmare, Nightmare Scion, Frost Giant.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/woodcutting/chestnut_plank.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Recipe: Chestnut Plank</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Spitter, Grimeleech, Plaguesmith.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/woodcutting/olive_plank.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Olive Plank</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Marid, Stone Devourer, Killer Caiman.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/woodcutting/cherry_plank.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Recipe: Cherry Plank</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Hellflayer, Death Dragon.</b></div>
			</div>
		</div>

</div>

    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
</div>
			
		</div>
	</div>


	
	</div>
	<div class="global-desc__content-item" data-name-tab="herbalist">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_4.png" alt=""></div>
				<div class="global-desc__content-title-text">Herbalist<span>Custom Herbalist</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Herbalist's Crafting:</div>
	</div>
	<div class="desc-margin-20"></div>
    <div style="margin-left:auto;margin-right:auto"><img src="layout/application/templates/default/images/description/herbalist/herbalist_craft.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;width:1100px"><br></br><p style="text-align:center"><i>Harvesting Plants / Mushrooms around the world</i></p></div>
     <div style="margin-left:auto;margin-right:auto"><img src="layout/application/templates/default/images/description/herbalist/herbalist_gif.gif" alt="" style="    border-radius: 12px;
    border: 1px solid #56423d;"><br></br></div>
    <div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
							<b>Herbalist's Forge</b> is located at the norht of <b>Dolwatha</b>, here you will find npc <b>Elyria</b> she sells the first scissor's for start harvesting plant's around the world. Bought it, collect plants and mushrooms then craft potions.
							<div class="desc-margin-10"></div>
							Potions are useful, sell it on the market or use it to help you on battle's.
						</div>
					</div>
	</div>
    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
    <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
							<div class="desc-margin-10"></div>
							You will find 6 differents plant's, flower and mushroom around the world:
						</div>
					</div>
	<div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Scissor's:</div>
	</div>
	<div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-boss__blocks flex-ss">
	
	<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/herbalist/begginers_scissor.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Beginner's Scissor</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/herbalist/begginers_scissor.png">
					<div class="desc-margin-10"></div>
        	      Elyria Sells the first begginer's scissor at north of Dolwatha.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Beginner's Scissor
        	</div>
        	 <div class="desc-enchant__line"><b>Obtention:</b> Bought from Elyria.</div>
        <div class="desc-enchant__line"><b>Can Harvest:</b> Canterbury Bells.</div>
    	</div>
	</div>
</div>


		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/herbalist/apprentices_scissor.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Apprentice's Scissor</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/herbalist/apprentices_scissor.png">
					<div class="desc-margin-10"></div>
        	      This scissors can be crafted on herbalist table. You can harvest Canterbury Bells and Gentiana.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Apprentice's Scissor
        	</div>
        	 <div class="desc-enchant__line"><b>Obtention:</b>  Crafted on Herbalist's Table.</div>
        <div class="desc-enchant__line"><b>Can Harvest:</b> Canterbury Bells and Gentiana.</div>
    	</div>
	</div>
</div>
		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/herbalist/herbalists_scissor.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Herbalist's Scissor</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/herbalist/herbalists_scissor.png">
					<div class="desc-margin-10"></div>
        	       This scissors can be crafted on herbalist table. You can harvest Canterbury Bells, Gentiana and Scarlet Sage.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Herbalist's Scissor
        	</div>
        	  <div class="desc-enchant__line"><b>Obtention:</b>  Crafted on Herbalist's Table.</div>
        <div class="desc-enchant__line"><b>Can Harvest:</b> Canterbury Bells, gentiana and Scarlet Sage.</div>
    	</div>
	</div>
</div>
		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/herbalist/experts_scissor.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Expert's Scissor</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/herbalist/experts_scissor.png">
					<div class="desc-margin-10"></div>
        	                     This scissors can be crafted on herbalist table. You can harvest Canterbury Bells, Gentiana, Scarlet Sage and Camellia.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Expert's Scissor
        	</div>
        	 <div class="desc-enchant__line"><b>Obtention:</b>  Crafted on Herbalit's Table.</div>
        <div class="desc-enchant__line"><b>Can harvest:</b> Canterbury Bells, Gentiana, Scarlet Sage and Camellia.</div>
    	</div>
	</div>
	</div>
		<div class="desc-enchant__block flex-ss">
    <img src="layout/application/templates/default/images/description/herbalist/masters_scissor.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;">
	<div class="tooltip">
    	<span class="tooltip-span">
	<div class="whtt-name">Master's Scissor</div>
		<div class="desc-margin-10"></div>
                	<img class="image" src="layout/application/templates/default/images/description/herbalist/masters_scissor.png">
					<div class="desc-margin-10"></div>
        	                      This scissors can be crafted on herbalist table. You can harvest Canterbury Bells, gentiana, Scarlett Sage, Camellia, Russula Emetica and Anemone.
    	</span>
    	<div class="desc-enchant__info">
        	<div class="desc-enchant__title">
            	Master's Scissor
        	</div>
        	<div class="desc-enchant__line"><b>Obtention:</b>  Crafted on Herbalit's Table.</div>
        <div class="desc-enchant__line"><b>Can harvest:</b> Canterbury Bells, gentiana, Scarlett Sage, Camellia, Russula Emetica and Anemone.</div>
    	</div>
	</div>
	</div>

<div class="desc-margin-20"></div>
<div class="desc-sep"></div>
<div class="desc-margin-20"></div>
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Plant's:</div>
	</div>
	<div class="desc-margin-20"></div>
	<div class="desc-boss__blocks flex-ss">
		<div class="desc-enchant__block flex-ss">
       <img src="layout/application/templates/default/images/description/herbalist/canterbury_bells.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__icon"></div>
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Canterbury Bells</div>
				<div class="desc-enchant__line"><b>Color:</b> Violet.</div>
				<div class="desc-enchant__line"><b>Herbalist Skill Required:</b> 0</div>
				<div class="desc-enchant__line"><b>Description:</b> This is the first tree that can be harvested.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/gentiana.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Gentiana</div>
				<div class="desc-enchant__line"><b>Color:</b> Gray.</div>
				<div class="desc-enchant__line"><b>Herbalist Skill Required:</b> 5</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be harvested with <b>apprentice's scissor</b> crafted on Herbalist Table.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/scarlet_sage.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Scarlet Sage</div>
				<div class="desc-enchant__line"><b>Color:</b> Red Tips, green.</div>
				<div class="desc-enchant__line"><b>Herbalist Skill Required:</b> 15</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be harvested with <b>herbalist's scissor</b> crafted on Herbalist Table.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/camellia.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Camellia</div>
				<div class="desc-enchant__line"><b>Color:</b> White.</div>
				<div class="desc-enchant__line"><b>Herbalist Skill Required:</b> 25</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be harvested with <b>expert's scissor</b> crafted on Herbalist Table.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/russula_emetica_plant.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Russula Emetica</div>
				<div class="desc-enchant__line"><b>Color:</b> Red.</div>
				<div class="desc-enchant__line"><b>Herbalist Skill Required:</b> 40</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be harvested with <b>master's scissor</b> crafted on Herbalist Table.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/anemone_plant.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Russula Emetica</div>
				<div class="desc-enchant__line"><b>Color:</b> Violet.</div>
				<div class="desc-enchant__line"><b>Herbalist Skill Required:</b> 55</div>
				<div class="desc-enchant__line"><b>Description:</b> Can be harvested with <b>master's scissor</b> crafted on Herbalist Table.</div>
			</div>
		</div>
    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
	<div class="desc-margin-20"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Recipe Loots:</div>
	</div>
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-enchant__block flex-ss">
       <img src="layout/application/templates/default/images/description/herbalist/recipe_nimble_life_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__icon"></div>
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Recipe: Nimble Life Potion</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Quara Hydromancer, Bog Raider.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/recipe_nimble_mana_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Nimble Mana Potion</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Blood Beast, Glooth Anemone.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/recipe_hazel_life_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Recipe: Hazel Life Potion</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Feversleep, Armadile.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/recipe_hazel_mana_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Recipe: Hazel Mana Potion</div>
				<div class="desc-enchant__line"><b>Monsters:</b></div>
				<div class="desc-enchant__line"><b>Medusa, Stone Devourer.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/recipe_tumble_life_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Recipe: Tumble Life Potion</div>
				<div class="desc-enchant__line"><b>Boss:</b></div>
				<div class="desc-enchant__line"><b>Plagirath.</b></div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/recipe_tumble_mana_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
            <div class="desc-enchant__title">Recipe: Tumble Mana Potion</div>
				<div class="desc-enchant__line"><b>Boss:</b></div>
				<div class="desc-enchant__line"><b>Abyssador.</b></div>
			</div>
		</div>

</div>
<div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
	<div class="desc-margin-20"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Potions:</div>
	</div>
	<div class="desc-margin-20"></div>
	<div class="desc-text__text fz_15" style="font-size:17px">
							Potions give <b>Empty Flasks</b> that you can sell to npc Alaistar, Xodet or Asnarus.<br></br>
							Nimble: 8 gps, Hazel: 11 gps and Tumble: 15 gps.
						</div>
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-enchant__block flex-ss">
       <img src="layout/application/templates/default/images/description/herbalist/nimble_life_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__icon"></div>
			<div class="desc-enchant__info">
				<div class="desc-enchant__title">Nimble Life Potion</div>
				<div class="desc-enchant__line"><b>Health:</b> 515 - 685</div>
				<div class="desc-enchant__line"><b>Level:</b> 100 </div>
				<div class="desc-enchant__line"><b>Vocations:  </b> Paladin's and Knight's.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/hazel_life_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Hazel Life Potion</div>
				<div class="desc-enchant__line"><b>Health:</b> 750 - 920</div>
				<div class="desc-enchant__line"><b>Level:</b> 150 </div>
				<div class="desc-enchant__line"><b>Vocations:  </b> Paladin's and Knight's.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/tumble_life_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Tumble Life Potion</div>
				<div class="desc-enchant__line"><b>Health:</b> 890 - 1050</div>
				<div class="desc-enchant__line"><b>Level:</b> 200 </div>
				<div class="desc-enchant__line"><b>Vocations: </b> Knight's.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/nimble_mana_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Nimble Mana Potion</div>
				<div class="desc-enchant__line"><b>Mana:</b> 160 - 235</div>
				<div class="desc-enchant__line"><b>Level:</b> 100 </div>
				<div class="desc-enchant__line"><b>Vocations:  </b> Paladins, Sorcerer's and Druid's.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/hazel_mana_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Hazel Mana Potion</div>
				<div class="desc-enchant__line"><b>Mana:</b> 280 - 425</div>
				<div class="desc-enchant__line"><b>Level:</b> 150 </div>
				<div class="desc-enchant__line"><b>Vocations: </b> Paladin's, Sorcerer's and Druid's.</div>
			</div>
		</div>
		<div class="desc-enchant__block flex-ss">
        <img src="layout/application/templates/default/images/description/herbalist/tumble_mana_potion.png" alt="" style="    border-radius: 8px;
    border: 1px solid #56423d;">
			<div class="desc-enchant__info">
			<div class="desc-enchant__title">Tumble Mana Potion</div>
				<div class="desc-enchant__line"><b>Mana:</b> 500 - 795</div>
				<div class="desc-enchant__line"><b>Level:</b> 200 </div>
				<div class="desc-enchant__line"><b>Vocations: </b> Sorcerer's and Druid's.</div>
			</div>
		</div>

</div>

    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
</div>
			
		</div>
	</div>

	
				
	<div class="global-desc__content-item" data-name-tab="ancestral">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_7.png" alt=""></div>
				<div class="global-desc__content-title-text">Ancestral<span>Ancestral System</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Ancestral System ( Tasks, Points, Rank, Store and more ! ):</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<b>Ancestral System</b> is based on tasks, complete tasks with npc <b class="tooltip-item">Armin<span class="tooltiptext">Armin Npc Can be founded in each city, on temple or near depot ( upper depot also ).</span></b> available on each city and earn <b class="tooltip-item">Ancestral Points<span class="tooltiptext">Ancestral Points are earned by finishing tasks, this points can be used on Ancestral Store in game, in future this points will be used for more things.</span></b> to spend on Ancestral Store, but also <b class="tooltip-item">Ancestral Rank Points<span class="tooltiptext">Ancestral Points are adquired doing Tasks, each task give different amount of Ancestral Rank Points.</span></b> to grow your Ancestral Ranking.
						<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/ancestral/armin_npc.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-10"></div>
							Slowly will come many things attached to the Ancestral System, so keep an eye on the wiki!
							<div class="desc-margin-10"></div>
							You can check your status on Ancestral System using the command <b>!Ancestral</b> you will see your Ranking, Points, and Tasks that you have accepted, current statuts, etc.
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/ancestral/ancestral_talkaction.png" style="    border-radius: 8px;"></center>
						</div>
					</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-20"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Ancestral Store:</div>
	</div>
	<div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						Ancestral Store can be opened in game pressing  <img src="layout/application/templates/default/images/description/ancestral/ancestral_icon.png"> you will find a store.
						<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/ancestral/Ancestral_store.png" style="    border-radius: 8px;"></center>
					</div>
						
						</div>
					</div>
					

	<div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Ancestral Ranks</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__text fz_15" style="font-size:17px">
							Doing Tasks for <b>Armin</b> you will earn <b>Ancestral Rank Points</b> this points will upgrade your ranking depeding your points, see the table below.
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/ancestral/ancestral_players.png" style="    border-radius: 8px;"></center>
							<center><i>You can check the Rank for every player doing a double click on the character.</i>
						</div>
							<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Rookie</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">1 - 40</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Bronze</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">41 - 100</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Silver</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">101 - 250</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Gold</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">251 - 470</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Platinum</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">471 - 770</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Diamond</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">771 - 1220</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Ancestral</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">1221 - 1820</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Mystic</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">1821 - 2820</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Abyssal</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">2821 - 4320</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Ascending</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">4321 - 6320</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Chaos</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">6321 - 9999</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title">Awakening</div>
							<div class="desc-rate__rates-item-desc">Ancestral Rank Points</div>
							<div class="desc-rate__rates-item-value">10000+</div>
						</div>
					</div>
	
					<div class="desc-margin-20"></div>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Ancestral Tasks</div>
		<div class="desc-margin-20"></div>
		<div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<center>Normal Ancestral Task List</center>
						<div class="desc-margin-10"></div>
						<center>Ask to <b>Armin</b> to see the list, you will find a list of Normal Tasks that can be repeated, to start a task say the name of the Task.</center>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/ancestral/normal_tasks.png" style="    border-radius: 8px;"></center>
						</div>
						<div class="desc-margin-20"></div>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<center>Daily Ancestral Task List</center>
						<div class="desc-margin-10"></div>
						<center>Ask to <b>Armin</b> to see the daily list, you will find a list of Daily Tasks that can be done only per day, to start a task say the name of the Task.</center>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/ancestral/daily_tasks.png" style="    border-radius: 8px;"></center>
						</div>
					</div>
	</div>

    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
 
</div>
</div>
<div class="global-desc__content-item" data-name-tab="dungeons">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_3.png" alt=""></div>
				<div class="global-desc__content-title-text">Dungeons<span>Dungeons System</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Dungeons</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<b>Dungeons</b> we introduced a new dungeon called <b>Bones Dungeon</b> where you will fight <b class="tooltip-item">Prince Skeletal<span class="tooltiptext">Prince Skeletal is the boss from Bones Dungeon, defeat Prince Skeletal to get Skeletal Set ( Helmet, Armor, Legs and Boots ) some of this parts will give new attributes, crafting, woodcutting or mining skill.</span></b>, this dungeon is quite easy to do and requires up a team of 2 players of level 150 minimum to enter on the dungeon. The dungeon can be started on <b>Temple of Mordragor</b>.
						<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/dungeons/dungeon_portal.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-10"></div>
							<center>Slowly will come more dungeons and access from various citys.</center>
							<center><img src="layout/application/templates/default/images/description/dungeons/dungeon_bones.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-10"></div>
							<center>On Dungeons you will find monsters with levels, but also bosses. Monsters and bosses, have better experience, loot, damage and life depending the level. Also a skull will identify the level of the creature. <br><i>This picture is an example.</i></center>
						</div>
					</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-20"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Dungeons Availables:</div>
	</div>
	<div class="desc-margin-20"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-boss__blocks flex-ss">
		<div class="desc-enchant__block flex-ss">
			<div class="tooltip-item">
    <div class="desc-enchant__info">
        <div class="desc-enchant__title">
            Bones Dungeon
        </div>
		<div class="desc-enchant__line"><b>Party Required:</b> 2 Players.</div>
		<div class="desc-enchant__line"><b>Level Required:</b> 150.</div>
		<div class="desc-enchant__line"><b>Time:</b> 30 minuts to make the dungeon, mechanic and reach boss.</div>
		<div class="desc-enchant__line"><b>Cooldown dungeon:</b> 1 Hour.</div>
        <div class="desc-enchant__line"><b>Monsters:</b> Bone Archer, Bone Berserker, Bone Mage, Bone Scarvenger, Bone Ruthless, Bone Warrior, Bone Knight, Bone Master, Bone Master.</div>
		<div class="desc-enchant__line"><b>Monster Levels:</b> 1-50.</div>
        <div class="desc-enchant__line"><b>Boss:</b> Prince Skeletal</div>
		<div class="desc-enchant__line"><b>Boss Level</b> 1-10.</div>
		<div class="desc-enchant__line"><b>Rewards:</b> Skeletal Set from Prince Skeletal Boss.</div>
    </div>
	<div class="desc-enchant__info">
        <div class="desc-enchant__title">
            Master of Elements Dungeon
        </div>
		<div class="desc-enchant__line"><b>Party Required:</b> 2 Players.</div>
		<div class="desc-enchant__line"><b>Level Required:</b> 200.</div>
		<div class="desc-enchant__line"><b>Time:</b> 30 minuts to make the dungeon, mechanic and reach boss.</div>
		<div class="desc-enchant__line"><b>Cooldown dungeon:</b> 1 Hour.</div>
        <div class="desc-enchant__line"><b>Monsters:</b> Bulltauren Alchemist, Bulltauren Brute, Bulltauren Forgepriest, Mega Dragon, Mitmah Vanguard, Tauren Herk, Tornado, Wardragon.</div>
		<div class="desc-enchant__line"><b>Monster Levels:</b> None.</div>
        <div class="desc-enchant__line"><b>Boss:</b> Master of the Elements</div>
		<div class="desc-enchant__line"><b>Boss Level</b> 1-10.</div>
		<div class="desc-enchant__line"><b>Rewards:</b> Star Extractor, Star Inlay Stones that can be used on new sets bought on Taerar inside Azure Portal.</div>
    </div>
</div>
		</div>
		
		</div>
	</div>
</div>
 
</div>



<div class="global-desc__content-item" data-name-tab="azure">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_0.png" alt=""></div>
				<div class="global-desc__content-title-text">Azure<span>Azure Portals</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Azure Portals: New Monsters & Boss</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<b>Azure Portals</b> are random portals appearing on <b>Freewind</b>, <b>Dolwatha</b>, <b>Death Valley</b> and <b>Rivendell</b> (Arkeron).<br>
						Before enter, you can find a new Npc called <b>Estherya</b> she trade
                    <img src="layout/application/templates/default/images/description/azurePortals/nightmare_coin.png" style="top:-10px">, 
                <b>Nightmare Coins</b> are obtained by killing Azure Boss or doing Ancestral Tasks about Azure Portals, for the new outfits <b>small angel</b> and <b> everblight</b>.
						<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/azurePortals/estherya.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>
							Azure Portals are for strong players, inside you will find depth creatures and for the most stronger players he can reach the central room, where you need find out how to open the door and enter for fight with Azure.
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/azurePortals/monsters.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>
							Monsters have level from 1 to 10. They have a low probability to loot an Ancestral Coin <img src="layout/application/templates/default/images/description/azurePortals/ancestral_coin.png" style="    border-radius: 8px;"> that can be used to obtain 1 ancestral point to use on Ancestral Store.
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/azurePortals/central_room.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-10"></div>
							Find a way to open the door, then defeat Terror Spider, it will transform to Deep Necromancer, defeat Deep Necromancer will transform to Azure Boss, fight and kill it, you will obtain <img src="layout/application/templates/default/images/description/azurePortals/azure_coin.png" style="    border-radius: 8px;"> <b>Azure Coins</b> that can be used on Taerar Npc located on Azure Entrance and Exchange it for the new items set.
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/azurePortals/azure.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/azurePortals/taerar.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-10"></div>

						</div>
					</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> New Items</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__text fz_15" style="font-size:17px">
							There is 4 new sets, Netherwave ( sorcerers & druids ), Varruth & Seetheras ( for Knight ) both are same, but visual differently and Felsinger ( paladins ).<br>
							Exchange <b> Azure Coins </b> to <b> Taerar </b> Npc at the entrance of Azure Portals.<br></br>
							<i><b>Azure Boss</b> has a small probability to loot on of this items.</i>
						</div>
							<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/varruth_helmet.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Varruth Helmet</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/varruth_armor.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Varruth Armor</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/varruth_legs.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Varruth Legs</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/varruth_boots.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Varruth Boots</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/varruth_sword.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Varruth Sword</div>
						</div>
					</div>

					<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/seetheras_helmet.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Seetheras Helmet</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/seetheras_armor.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Seetheras Armor</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/seetheras_legs.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Seetheras Legs</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/seetheras_boots.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Seetheras Boots</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/seetheras_sword.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Seetheras Sword</div>
						</div>
					</div>

					<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/netherwave_helmet.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Netherwave Helmet</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/netherwave_armor.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Netherwave Armor</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/netherwave_legs.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Netherwave Legs</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/netherwave_boots.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Netherwave Boots</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/frozen_wand.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Frozen Wand</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/venom_rod.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Venom Rod</div>
						</div>
					</div>

					<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/felsinger_helmet.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Felsinger Helmet</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/felsinger_armor.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Felsinger Armor</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/felsinger_legs.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Felsinger Legs</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/felsinger_boots.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Felsinger Boots</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/lazering_bow.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Lazering Bow</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/exowing_bow.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Exowing Bow</div>
						</div>
					</div>
	
					<div class="desc-margin-20"></div>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> New Outfits</div>
		<div class="desc-margin-20"></div>
		<div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<center>Small Angel</center>
						<div class="desc-margin-10"></div>
						<center>Exchange <b> Nightmare Coins </b> with Npc <b> Estherya </b> located outside of the Azure Portal.</center>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/azurePortals/small_angel.png" style="    border-radius: 8px;"></center>
						</div>
						<div class="desc-margin-20"></div>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<center>Everblight</center>
						<div class="desc-margin-10"></div>
						<center>Exchange <b> Nightmare Coins </b> with Npc <b> Estherya </b> located outside of the Azure Portal.</center>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/azurePortals/everblight.png" style="    border-radius: 8px;"></center>
						</div>
					</div>
	</div>

    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
 
</div>
</div>
</div>

<div class="global-desc__content-item" data-name-tab="tiers">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_10.png" alt=""></div>
				<div class="global-desc__content-title-text">Tiers<span>Equipment Tiers</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
    <div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Tier System</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<b>Tier System</b> is based on custom equipments, that allows you to use an <b>Star Inlay Stone</b> in order to insert 3 empty stars to the equipment.<br>
						Once you have inserted 3 Empty stars, you can insert a star stone following the rarity:<br>
						-<b> Common (green)</b><br>
						-<b> Rare (blue)</b><br>
						-<b> Very Rare (gold)</b><br>
						-<b> Epic (purple)</b><br>
						-<b> Legendary (red)</b><br></br>
						
                   Each Tier, has <b>1, 2 or 3 Stars</b>.<br>
				   <b>First Star</b>, will take the base stats of the previous upgrade ( it means 1 star, no primary or secundary stats are incremented )<br>
				   <b>Second Star</b> will increment secundary stats ( Resistance, Speed, Etc )<br>
				   <b>Thirst Star</b> will increment first stats (Skills: Axe, distance..., Armor...)<br><br>
                To start adding a tier to a custom equipment, first you need defeat <b>Master of The Elements</b> and obtain <b>Star Inlay Stone</b>, using it on allowed equipment ( Netherwave, Skeletal, Varruth, Seetheras or Felsinger ) , Helmet, Armor, Legs and Boots only you will be able to start inlay a stone, try your chance in order to get the best Inlay Stone to increase your stats.<br></br>
				After adding a stone, for example 2 Blue Stars ( Rare ), to an equipment and you will loot for example an Epic or Legendary, and you wish add it to your equipment, you will need use <b>Star Extractor</b> on your equipment in order to extract the stone incrusted to your equipment, your item will become again with 3 Empty stars and able to insert the new one. You will receive the stone incrusted to the equipment after extract it, but you will lose the star extractor.
						<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/tiers/insert_extraction.gif" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>
							<center>Inlay or extract, doesn't fail.</center>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/tiers/monsters.gif" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>
							<center><b><u>New Monsters</u>:</b><br>
							<b>- Bulltauren Alchemist<br>
							- Bulltauren Brute<br>
							- Bulltauren Forgepriest<br>
							- Mega Dragon<br>
							- Mitmah Vanguard<br>
							- Tauren Herk<br>
							- Wardragon</b><br></br>
							</center>
							<div class="desc-margin-20"></div>
							<center><img src="layout/application/templates/default/images/description/tiers/masterofthelements.gif" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>
							<center><b><u>New Boss</u>:<br>
							- Master of the Elements</b><br>
							<div class="desc-margin-20"></div>
							The New Monsters & Boss, are located on the new <b>Dungeon</b> called <b>Master of The Elements</b>, you will need a party up to 2 Players and level 200 in order to enter on the dungeon.
							<br>
							Monsters will have a probability to loot:<br>
							- Star Extractor
							- Common & Rare Inlay Stones ( 1, 2, 3)<br>
							- New Ressources<br>
							- Some Items<br></br>
							Boss will have a probability to loot: <br>
							- Very Rare, Epic, Legendary Inlay Stones ( 1, 2, 3)<br>
							- Star Extractor<br>
							- Star Inlay Stone<br>
							- Werewolf Helmet ( For all classes, do not use moonlight crystals now, later we will work on it).<br>
							- New Ressources<br></br>
							Some Pictures:
							<div class="desc-margin-20"></div>
							<center><img src="layout/application/templates/default/images/description/tiers/set.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>
							<div class="desc-margin-20"></div>
							<center><img src="layout/application/templates/default/images/description/tiers/stars_tier.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>
						</div>
					</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-sep"></div>
	<div class="desc-margin-10"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> New Tiers Stones</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__text fz_15" style="font-size:17px">
							Inlay Stones, Star Extractor.
						</div>
							<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24477_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24493_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Star Extractor</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24478_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Common Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24479_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Common Two Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24480_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Common Three Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24481_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Rare Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24482_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Rare Two Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24483_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Rare Three Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24484_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Very Rare Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24485_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Very Rare Two Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24486_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Very Rare Three Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24487_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Epic Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24488_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Epic Two Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24489_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Epic Three Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24490_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Legendary Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24491_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Legendary Two Star Inlay Stone</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24492_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Legendary Three Star Inlay Stone</div>
						</div>
					</div>
					<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> New Ressources</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__text fz_15" style="font-size:17px">
							New Ressources from Monsters & Boss
						</div>
					<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24494_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Lesser Guardian Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24495_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Guardian Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24496_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Greater Guardian Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24497_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Lesser Marksman Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24498_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Marksman Gem</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24499_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Greater Marksman Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24500_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Lesser Sage Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24501_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Sage Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24502_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Greater Sage Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24503_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Lesser Mystic Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24504_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Mystic Gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24505_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Greater Mystic Gem</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24506_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Splintered Mitmah gem</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24507_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Atab's Mitmah helmet</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24508_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Bulltaur Horn</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24509_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Bulltaur Hoof</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24510_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Bulltaur Armor Scrap</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24511_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Strange Substance</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24512_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Staff Piece</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24513_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Idol of the forge</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24514_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Nimmersatt's seal</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24515_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Molten dragon essence</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24516_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Mega dragon heart</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24517_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Strange Eye</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24518_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Strange poison gland</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24519_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Tauren Claw</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24520_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Tauren Tooth</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24521_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Exalted Seal</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24522_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Gold-scaled sentinel</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/tiers/item_24523_.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Crystallised blood</div>
						</div>
					</div>

	
					<div class="desc-margin-20"></div>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>
	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> New Outfits</div>
		<div class="desc-margin-20"></div>
		<div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<center>Herald</center>
						<div class="desc-margin-10"></div>
						<center>Exchange <b> Nightmare Coins </b> with Npc <b> Estherya </b> located outside of the Azure Portal.<br>
						<b>Master of the Elements</b> also will loot <b>Nightmare Coins</b><br>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/tiers/herald.png" style="    border-radius: 8px;"></center>
						</div>
						<div class="desc-margin-20"></div>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>
					</div>
	</div>

    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
 
</div>
</div>



<div class="global-desc__content-item" data-name-tab="expansion">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_0.png" alt=""></div>
				<div class="global-desc__content-title-text">Expansion<span>New Zones, New Spawns</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Expansion Map</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__text fz_15" style="font-size:17px">
							Here you will find new Extension Zones added on the world.
						</div>
							<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Secret Library</div>
							<div class="desc-rate__rates-item-desc">Acess: North Mordragor (Barbarian Camp)</div>
							<div class="desc-rate__rates-item-value">Level: 250+</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Falcon Bastion</div>
							<div class="desc-rate__rates-item-desc">Acess: North Falanaar (Deepling Grounds)</div>
							<div class="desc-rate__rates-item-value">Level: 200+</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Cobra Bastion</div>
							<div class="desc-rate__rates-item-desc">Acess: North Dolwatha (Near Azure Portal Apparition)</div>
							<div class="desc-rate__rates-item-value">Level: 200+</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Grave Danger Bosses</div>
							<div class="desc-rate__rates-item-desc">Acess: Underground Mordragor Death Cave</div>
							<div class="desc-rate__rates-item-value">Level: 200+</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Bruster Spectres, Lions, Deep Desert</div>
							<div class="desc-rate__rates-item-desc">Acess: From any Boat to Kilmaresh (north Kilmaresh)</div>
							<div class="desc-rate__rates-item-value">Level: 160+</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Bounac</div>
							<div class="desc-rate__rates-item-desc">Acess: From any Boat</div>
							<div class="desc-rate__rates-item-value">Level: 220+</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Soul War</div>
							<div class="desc-rate__rates-item-desc">Acess: From any Boat to Kilmaresh (Central Top Mountain)</div>
							<div class="desc-rate__rates-item-value">Level: 300+</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Kilmaresh, Urmahlullu's</div>
							<div class="desc-rate__rates-item-desc">Acess: From any Boat to Kilmaresh Central Under Kilmaresh</div>
							<div class="desc-rate__rates-item-value">Level: 250+</div>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title">Rotten Blood</div>
							<div class="desc-rate__rates-item-desc">Acess: From any Boat to Kilmaresh (South Kilmaresh, Portal)</div>
							<div class="desc-rate__rates-item-value">Level: 300+</div>
						</div>
						
					</div>
					</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-sep"></div>
	
					<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Items Information</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__text fz_15" style="font-size:17px">
						</div>

					<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/azurePortals/nightmare_coin.png" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Nightmare Coin, Obtained from Bosses of Extensions Map with <b>Estherya</b> Npc, located outside of Azure Portal Apparition.</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/Sturdy_Book.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Sturdy Book, 5 are required to obtain First Battle Mage Addon with Estherya.</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/Epaulette.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Epaulette, 20 are required to obtain Second Battle Mage Addon with Estherya.</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/Library_Ticket.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Library Ticket: Use it on a Flying book to get a Fleeting Knowledge mount.</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/Red_Silk_Flower.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Red Silk Flower: Use it on a White Lion to get a white lion mount.</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/The_Skull_of_a_Beast.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">The Skull of a Beast: Exchange it with Npc Estherya to obtain second addon of Revenant. (Base outfit can be adquired with Nightmare Coins)</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/Bracelet_of_Strengthening.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Bracelet of Strengthening: Exchange it with Npc Estherya to obtain first addon of Revenant. (Base outfit can be adquired with Nightmare Coins)</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/Spectral_Horseshoe.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Spectral Horseshoe: Use 4 Spectral Horseshoes, a Spectral Horse Tack and Spectral Saddle to obtain Phantasmal Jade mount.</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/Final_Judgement.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Final Judgement: Exchange it with Npc Estherya to obtain first addon of Hand of Inquisition outfit.</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/Shadow_Cowl.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Shadow Cowl: Exchange it with Npc Estherya to obtain second addon of Hand of Inquisition outfit.</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/The_Regalia_of_Suon.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Regalia of Suon: Use it on a Gryphon to obtain Gryphon Mount. (Can be obtained assembling the 4 parts to Npc Yonan at Central Kilmaresh near the Lagoon)</div>
						</div>
						<div class="desc-rate__rates-item">
						<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/extension/Spectral_Scrap_of_Cloth.gif" style="    border-radius: 8px;"></div>
							<div class="desc-rate__rates-item-desc">Spectral Scrap of Cloth: Use it to obtain Haze mount.</div>
						</div>
					</div>

	
					<div class="desc-margin-20"></div>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>

	<div class="desc-text">
		<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> New Extensions</div>
		<div class="desc-margin-20"></div>
		<div class="desc-text">
		<div class="desc-margin-10"></div>
						<center><div class="desc-text__title fz_20">Secret Library</div></center><br>
						<center>Secret Library Can be accessed from north-west <b>Mordragor</b> on the Barbarian Camp, talk to <b>Librarian</b> and ask a passage to the Isle of the Kings, use a <b>Scythe</b> to the <b>Monument</b> in order to acess to the Secret Library.</center><br>
							<center><img src="layout/application/templates/default/images/description/extension/the_scourge_of_oblivion.gif" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>
							
							<div class="desc-margin-20"></div>
							<center><div class="desc-text__title fz_20"></i> Falcon Bastion</div></center><br>
							<center>Falcon Bastion can be accessed from North <b>Falanaar</b> on Deepling Grounds, Use the boat to enter on the Falcon Bastion. Near Deepling grounds also there is a new raid, Brokul.<br> Falcons introduce new items , Falcons Items and some new ressources.</center><br>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/extension/falcon_bastion.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>

							<div class="desc-margin-20"></div>
							<center><div class="desc-text__title fz_20"></i> Cobra Bastion (custom)</div></center><br>
							<center>Cobra Bastion can be accessed from North <b>Dolwatha</b> where Azure portal Appears, accessed from stairs. Sarlett Etzel has the same mechanic.<br> Cobra introduce new items , Cobra Items and some new ressources.</center><br>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/extension/cobra.png" style="    border-radius: 8px;"></center>

							<div class="desc-margin-20"></div>
							<center><div class="desc-text__title fz_20"></i> Grave Danger Bosses</div></center><br>
							<center>Grave Danger, King Zelos and Minibosses can be founded on Mordragor Caves, around the cave, there is no any hard mechanic, for king zelos, simply kill every mini boss on the room before access to King Zelos.</center><br>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/extension/grave_danger.png" style="    border-radius: 8px;"></center>

							<div class="desc-margin-20"></div>
							<center><div class="desc-text__title fz_20"></i> Bounac</div></center><br>
							<center>Bounac can be accessed from any Boat. Drume appears as Raid.</center><br>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/extension/bounac.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>

							<div class="desc-margin-20"></div>
							<center><div class="desc-text__title fz_20"></i> Kilmaresh</div></center><br>
							<center>Kilmaresh can be accessed from any Boat. North of Kilmaresh (cave): Bruster Spectres, Lions (Werelioness, Werelion and Minibosses), Deep Desert (Undead Gladiators and Skeleton Elite Warrior, Furious Scorpion), Central Kilmaresh: Under: Urmahlullu's boss, Top Mountain: Soul War acess (Thais Mirror, Rotten Wasteland, Ebb & Flow, Claustrophobic Inferno, Furious Crater) in order to kill Megalomania, you need kill every Goshnar's Bosses before access it. Current Floor: Fear Feaster, Flimsys and Bosses. Kilmaresh Lagoon: Yonan Npc, exchanging some idol items for the Regalia of Suon.</center><br>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/extension/kilmaresh_monsters.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-10"></div>
							<center><div class="desc-text__title fz_20"></i> Claustrophobic Inferno, Rotten Wasteland, Furious Crater, Nightmare Mirror...</div></center><br>
							<center></center><br>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/extension/claustrophobic.png" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/furious_crater.png" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/thais_nightmare.png" style="    border-radius: 8px;"></center>
							<div class="desc-margin-20"></div>
							<div class="desc-margin-20"></div>
							<center><div class="desc-text__title fz_20"></i> Rotten Blood</div></center><br>
							<center>New Monsters, New Bosses, Bakragore loots Sanguine items, in order to get Grand Sanguine items, you need defeat minibosses (Ichgahal, Murcion, Vemiath and Chagorz) to obtain Essence, use the essences on Devourer Essence in order to obtain 5% chance for each essence to loot a Grand Sanguine Item. If you get 20% and you didn't loot any Grand Sanguine item , you will save your chance until you loot one Grand Sanguine Item.</center><br>
							<div class="desc-margin-10"></div>
							<center><img src="layout/application/templates/default/images/description/extension/sanguine_items.gif" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/monsters.png" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/vemiath.png" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/chagorz.png" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/ichagahal.png" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/murcion.png" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/bakragore_lever.png" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/essence.png" style="    border-radius: 8px;"></center>
							<center><img src="layout/application/templates/default/images/description/extension/bakragore.png" style="    border-radius: 8px;"></center>
						</div>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>
					</div>
	</div>

    <div class="desc-margin-20"></div>
    <div class="desc-sep"></div>
 
</div>



<div class="global-desc__content-item" data-name-tab="badges">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_5.png" alt=""></div>
				<div class="global-desc__content-title-text">Badges<span>New Equipment</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
					<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Information</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__text fz_20" style="font-size:17px">
						</div>
						<center>
							Badges, are new equipment that can be equipped on new slot badges, under ammo slot.
							<br></br>
							<img src="layout/application/templates/default/images/description/badges/slot_badge.png">
							<br></br>
							Badges can be obtained by killing world bosses, see <b style="color:orange">The Isles - World Bosses</b> tab to find a world boss to kill around the continent.<br></br>
							There is 9 different badges, that each one can be upgraded to the last tier. To upgrade a badge you will need an <b style="color:orange">Amplifier</b> that using on the correct badge it will upgrade it to the next tier. Badges can fail when upgrade but they are not destroyed.
							</center><br></br>
						<div class="desc-margin-10"></div>
						
						
						
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Exiled Spirit Badge</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25147_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Raging Exiled Spirit Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25147_.png">
						<div class="desc-margin-10"></div>
						Absorb Death: 5%<br>
						Magic Level: +1<br>
						Armor: 2
						</span>
							<div class="desc-rate__rates-item-desc">Raging Exiled Spirit Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: World Bosses.</div>
							<div class="desc-rate__rates-item-desc">Loot rate: 2,5%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Exiled Amplifier Catalyst [1]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25187_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25187_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Exiled Amplifier Catalyst [1].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25148_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Furious Exiled Spirit Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25148_.png">
						<div class="desc-margin-10"></div>
						Absorb Death: 6%<br>
						Magic Level: +2<br>
						Mana Points: +50<br>
						Armor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Furious Exiled Spirit Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Exiled Amplifier Catalyst [2]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25188_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25188_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Exiled Amplifier Catalyst [2].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25149_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Exiled Spirit Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25149_.png">
						<div class="desc-margin-10"></div>
						Absorb Death: 6%<br>
						Magic Level: +3<br>
						Mana Points: +100<br>
						Mana Leech Chance: 5%<br>
						Mana Leech Amount: 3%<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Exiled Spirit Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Exiled Amplifier Catalyst [3]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25189_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25189_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Exiled Amplifier Catalyst [3].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25150_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Blazing Exiled Spirit Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25150_.png">
						<div class="desc-margin-10"></div>
						Absorb Death: 8%<br>
						Magic Level: +4<br>
						Mana Points: +150<br>
						Mana Leech Chance: 8%<br>
						Mana Leech Amount: 5%<br>
						Armor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Blazing Exiled Spirit Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier Badge.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Fury Badge</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25151_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Raging Fury Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25151_.png">
						<div class="desc-margin-10"></div>
						Absorb Energy: 5%<br>
						Skill Sword: +1<br>
						Skill Axe: +1<br>
						Skill Club: +1<br>
						Armor: 2
						</span>
							<div class="desc-rate__rates-item-desc">Raging Fury Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: World Bosses.</div>
							<div class="desc-rate__rates-item-desc">Loot rate: 2,5%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Fury Amplifier Catalyst [1]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25190_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25190_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Fury Amplifier Catalyst [1].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25152_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Furious Fury Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25152_.png">
						<div class="desc-margin-10"></div>
						Absorb Energy: 6%<br>
						Skill Sword: +2<br>
						Skill Axe: +2<br>
						Skill Club: +2<br>
						Life Points: +50<br>
						Armor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Furious Fury Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Fury Amplifier Catalyst [2]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25191_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25191_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Fury Amplifier Catalyst [2].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25153_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Fury Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25153_.png">
						<div class="desc-margin-10"></div>
						Absorb Energy: 7%<br>
						Skill Sword: +3<br>
						Skill Axe: +3<br>
						Skill Club: +3<br>
						Life Points: +100<br>
						Life Leech Chance: 5%<br>
						Life Leech Amount: 3%<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Fury Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Fury Amplifier Catalyst [3]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25192_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25192_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Fury Amplifier Catalyst [3].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25154_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Blazing Fury Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25154_.png">
						<div class="desc-margin-10"></div>
						Absorb Energy: 8%<br>
						Skill Sword: +4<br>
						Skill Axe: +4<br>
						Skill Club: +4<br>
						Life Points: +150<br>
						Life Leech Chance: 8%<br>
						Life Leech Amount: 5%<br>
						Armor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Blazing Fury Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier Badge.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Moon Badge</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25155_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Raging Moon Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25155_.png">
						<div class="desc-margin-10"></div>
						Skill Mining: +1<br>
						Skill Woodcuting: +1<br>
						Skill Herbalist: +1<br>
						Skill Crafting: +1<br>
						Armor: 2
						</span>
							<div class="desc-rate__rates-item-desc">Raging Moon Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: World Bosses.</div>
							<div class="desc-rate__rates-item-desc">Loot rate: 2,5%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Moon Amplifier Catalyst [1]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25193_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25193_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Moon Amplifier Catalyst [1].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25156_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Furious Moon Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25156_.png">
						<div class="desc-margin-10"></div>
						Skill Mining: +2<br>
						Skill Woodcuting: +2<br>
						Skill Herbalist: +2<br>
						Skill Crafting: +2<br>
						Armor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Furious Moon Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Moon Amplifier Catalyst [2]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25194_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25194_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Moon Amplifier Catalyst [2].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25157_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Moon Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25157_.png">
						<div class="desc-margin-10"></div>
						Skill Mining: +3<br>
						Skill Woodcuting: +3<br>
						Skill Herbalist: +3<br>
						Skill Crafting: +3<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Moon Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Moon Amplifier Catalyst [3]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25195_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25195_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Moon Amplifier Catalyst [3].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25158_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Moon Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25158_.png">
						<div class="desc-margin-10"></div>
						Skill Mining: +4<br>
						Skill Woodcuting: +4<br>
						Skill Herbalist: +4<br>
						Skill Crafting: +4<br>
						Armor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Moon Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Moon Amplifier Catalyst [4]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25196_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25196_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Moon Amplifier Catalyst [4].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25159_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Eternal Moon Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25159_.png">
						<div class="desc-margin-10"></div>
						Skill Mining: +5<br>
						Skill Woodcuting: +5<br>
						Skill Herbalist: +5<br>
						Skill Crafting: +5<br>
						Container: 10 Slots<br>
						Armor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Eternal Moon Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier Badge.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Night Seeker Badge</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25160_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Raging Night Seeker Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25160_.png">
						<div class="desc-margin-10"></div>
						Absorb All: 2%<br>
						Life Points: +25<br>
						Mana Points: +25<br>
						Armor: 2
						</span>
							<div class="desc-rate__rates-item-desc">Raging Night Seeker Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: World Bosses.</div>
							<div class="desc-rate__rates-item-desc">Loot rate: 2,5%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Night Seeker Amplifier Catalyst [1]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25197_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25197_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Night Seeker Amplifier Catalyst [1].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25161_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Furious Night Seeker Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25161_.png">
						<div class="desc-margin-10"></div>
						Absorb All: 2%<br>
						Life Points: +50<br>
						Mana Points: +50<br>
						Armor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Furious Night Seeker Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Night Seeker Amplifier Catalyst [2]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25198_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25198_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Night Seeker Amplifier Catalyst [2].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25162_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Night Seeker Spirit Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25162_.png">
						<div class="desc-margin-10"></div>
						Absorb All: 3%<br>
						Life Points: +100<br>
						Mana Points: +100<br>
						Critical Hit Amount: 5%<br>
						Critical Hit Chance: 5%<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Night Seeker Spirit Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Night Seeker Amplifier Catalyst [3]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25199_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25199_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Night Seeker Amplifier Catalyst [3].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25163_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Blazing Night Seeker Spirit Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25163_.png">
						<div class="desc-margin-10"></div>
						Absorb All: 4%<br>
						Life Points: +200<br>
						Mana Points: +200<br>
						Critical Hit Amount: 10%<br>
						Critical Hit Chance: 10%<br>
						Armor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Blazing Night Seeker Spirit Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Night Seeker Amplifier Catalyst [4]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25200_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25200_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Night Seeker Amplifier Catalyst [4].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25164_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Eternal Night Seeker Spirit Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25164_.png">
						<div class="desc-margin-10"></div>
						Absorb All: 5%<br>
						Life Points: +300<br>
						Mana Points: +300<br>
						Critical Hit Amount: 15%<br>
						Critical Hit Chance: 15%<br>
						Armor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Eternal Night Seeker Spirit Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier Badge.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Earthshade Spirit Badge</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25165_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Raging Earthshade Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25165_.png">
						<div class="desc-margin-10"></div>
						Absorb Energy: 5%<br>
						Absorb Holy: 5%<br>
						Absorb Ice: 5%<br>
						Absorb Fire: 5%<br>
						Armor: 2
						</span>
							<div class="desc-rate__rates-item-desc">Raging Earthshade Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: World Bosses.</div>
							<div class="desc-rate__rates-item-desc">Loot rate: 2,5%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Earthshade Amplifier Catalyst [1]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25201_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25201_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Earthshade Amplifier Catalyst [1].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25166_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Furious Earthshade Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25166_.png">
						<div class="desc-margin-10"></div>
						Absorb Energy: 7%<br>
						Absorb Holy: 7%<br>
						Absorb Ice: 7%<br>
						Absorb Fire: 7%<br>
						Armor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Furious Earthshade Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Earthshade Amplifier Catalyst [2]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25202_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25202_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Earthshade Amplifier Catalyst [2].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25167_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Earthshade Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25167_.png">
						<div class="desc-margin-10"></div>
						Absorb Energy: 9%<br>
						Absorb Holy: 9%<br>
						Absorb Ice: 9%<br>
						Absorb Fire: 9%<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Earthshade Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Earthshade Amplifier Catalyst [3]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25203_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25203_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Earthshade Amplifier Catalyst [3].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25168_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Blazing Earthshade Spirit Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25168_.png">
						<div class="desc-margin-10"></div>
						Absorb Energy: 12%<br>
						Absorb Holy: 12%<br>
						Absorb Ice: 12%<br>
						Absorb Fire: 12%<br>
						Armor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Blazing Earthshade Spirit Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier Badge.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Reborn Badge</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25169_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Raging Reborn Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25169_.png">
						<div class="desc-margin-10"></div>
						Absorb Physical: +5%<br>
						Mana Points: +25<br>
						Life Points: +25<br>
						Armor: 2
						</span>
							<div class="desc-rate__rates-item-desc">Raging Reborn Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: World Bosses.</div>
							<div class="desc-rate__rates-item-desc">Loot rate: 2,5%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Reborn Amplifier Catalyst [1]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25204_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25204_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Reborn Amplifier Catalyst [1].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25170_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Furious Reborn Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25170_.png">
						<div class="desc-margin-10"></div>
						Absorb Physical: +8%<br>
						Mana Points: +50<br>
						Life Points: +50<br>
						Armor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Furious Reborn Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Reborn Amplifier Catalyst [2]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25205_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25205_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Reborn Amplifier Catalyst [2].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25171_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Reborn Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25171_.png">
						<div class="desc-margin-10"></div>
						Absorb Physical: +11%<br>
						Mana Points: +100<br>
						Life Points: +100<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Reborn Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Reborn Amplifier Catalyst [3]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25206_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25206_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Reborn Amplifier Catalyst [3].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25172_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Blazing Reborn Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25172_.png">
						<div class="desc-margin-10"></div>
						Absorb Physical: +14%<br>
						Mana Points: +200<br>
						Life Points: +200<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Blazing Reborn Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Reborn Amplifier Catalyst [4]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25207_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25207_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Reborn Amplifier Catalyst [4].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25173_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Eternal Reborn Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25173_.png">
						<div class="desc-margin-10"></div>
						Absorb Physical: +18%<br>
						Mana Points: +300<br>
						Life Points: +300<br>
						Armor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Eternal Reborn Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier Badge.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Chaosfiend Badge</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25174_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Raging Chaosfiend Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25174_.png">
						<div class="desc-margin-10"></div>
						Life Points: +350<br>
						Mana Points: +100<br>
						Armor: 2
						</span>
							<div class="desc-rate__rates-item-desc">Raging Chaosfiend Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: World Bosses.</div>
							<div class="desc-rate__rates-item-desc">Loot rate: 2,5%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Chaosfiend Amplifier Catalyst [1]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25208_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25208_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Chaosfiend Amplifier Catalyst [1].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25175_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Furious Chaosfiend Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25175_.png">
						<div class="desc-margin-10"></div>
						Life Points: +700<br>
						Mana Points: +200<br>
						Armor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Furious Chaosfiend Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Chaosfiend Amplifier Catalyst [2]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25209_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25209_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Chaosfiend Amplifier Catalyst [2].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25176_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Chaosfiend Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25176_.png">
						<div class="desc-margin-10"></div>
					    Life Points: +1400<br>
						Mana Points: +300<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Chaosfiend Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Chaosfiend Amplifier Catalyst [3]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25210_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25210_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Chaosfiend Amplifier Catalyst [3].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25177_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Blazing Chaosfiend Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25177_.png">
						<div class="desc-margin-10"></div>
						Life Points: +2800<br>
						Mana Points: +400<br>
						Armor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Blazing Chaosfiend Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier Badge.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Veins Badge</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25178_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Raging Veins Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25178_.png">
						<div class="desc-margin-10"></div>
						Skill Distance: +1<br>
						Absorb Holy: 10%<br>
						Armor: 2
						</span>
							<div class="desc-rate__rates-item-desc">Raging Veins Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: World Bosses.</div>
							<div class="desc-rate__rates-item-desc">Loot rate: 2,5%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Veins Amplifier Catalyst [1]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25211_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25211_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Veins Amplifier Catalyst [1].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25179_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Furious Veins Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25179_.png">
						<div class="desc-margin-10"></div>
						Skill Distance: +2<br>
						Absorb Ice: 10%<br>
						Armor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Furious Veins Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Veins Amplifier Catalyst [2]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25212_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25212_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Veins Amplifier Catalyst [2].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25180_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Veins Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25180_.png">
						<div class="desc-margin-10"></div>
						Skill Distance: +3<br>
						Absorb Energy: 10%<br>
						Life Leech Chance: 5%<br>
						Life Leech Amount: 3%<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Veins Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Veins Amplifier Catalyst [3]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25213_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25213_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Veins Amplifier Catalyst [3].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25181_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Blazing Veins Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25181_.png">
						<div class="desc-margin-10"></div>
						Skill Distance: +4<br>
						Absorb Fire: 10%<br>
						Life Leech Chance: 8%<br>
						Life Leech Amount: 5%<br>
						Armor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Blazing Veins Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier Badge.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Daybreak Badge</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25182_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Raging Daybreak Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25182_.png">
						<div class="desc-margin-10"></div>
						Life Leech Chance: +3%<br>
						Life Leech Amount: +3%<br>
						Mana Leech Chance: +3%<br>
						Mana Leech Amount: +3%<br>
						Amor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Raging Daybreak Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: World Bosses.</div>
							<div class="desc-rate__rates-item-desc">Loot rate: 2,5%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Daybreak Amplifier Catalyst [1]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25214_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25214_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Daybreak Amplifier Catalyst [1].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25183_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Furious Daybreak Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25183_.png">
						<div class="desc-margin-10"></div>
						Life Leech Chance: +5%<br>
						Life Leech Amount: +5%<br>
						Mana Leech Chance: +5%<br>
						Mana Leech Amount: +5%<br>
						Amor: 3
						</span>
							<div class="desc-rate__rates-item-desc">Furious Daybreak Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Daybreak Amplifier Catalyst [2]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25215_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25215_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Daybreak Amplifier Catalyst [2].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25184_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tempest Daybreak Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25184_.png">
						<div class="desc-margin-10"></div>
						Life Leech Chance: +7%<br>
						Life Leech Amount: +7%<br>
						Mana Leech Chance: +7%<br>
						Mana Leech Amount: +7%<br>
						Critical Hit Chance: +3%<br>
						Critical Hit Amount: +3%<br>
						Amor: 4
						</span>
							<div class="desc-rate__rates-item-desc">Tempest Daybreak Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Daybreak Amplifier Catalyst [3]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25216_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25216_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Daybreak Amplifier Catalyst [3].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25185_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Blazing Daybreak Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25185_.png">
						<div class="desc-margin-10"></div>
						Life Leech Chance: +9%<br>
						Life Leech Amount: +9%<br>
						Mana Leech Chance: +9%<br>
						Mana Leech Amount: +9%<br>
						Critical Hit Chance: +5%<br>
						Critical Hit Amount: +5%<br>
						Amor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Blazing Daybreak Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br><br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Daybreak Amplifier Catalyst [4]</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25217_.png">
						<div class="desc-margin-10"></div>
						Use the amplifier on the badge to try upgrade it to next tier.<br>
						Obtention: World Bosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/badges/item_25217_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Daybreak Amplifier Catalyst [4].<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/badges/item_25186_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Eternal Daybreak Badge</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/badges/item_25186_.png">
						<div class="desc-margin-10"></div>
						Life Leech Chance: +15%<br>
						Life Leech Amount: +10%<br>
						Mana Leech Chance: +15%<br>
						Mana Leech Amount: +10%<br>
						Critical Hit Chance: +10%<br>
						Critical Hit Amount: +8%<br>
						Amor: 5
						</span>
							<div class="desc-rate__rates-item-desc">Eternal Daybreak Badge.</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier Badge.</div>
						</div>	
						<br>
						</div>
						
					</div>

	
					<div class="desc-margin-20"></div>
						
	</div>

    <div class="desc-margin-20"></div>

 
</div>


<div class="global-desc__content-item" data-name-tab="deck">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_4.png" alt=""></div>
				<div class="global-desc__content-title-text">Deck System<span>Cards</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
					<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Information</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__text fz_20" style="font-size:17px">
						</div>
						<center>
							Deck System, is a new system that make's a vocation possible to be played in another style.<br>
							Under the ring slot you will find the Deck Slot, able to equip Deck's.
							<br></br>
							<img src="layout/application/templates/default/images/description/deck_system/deck_slot.png">
							<br></br>
							There is 3 Decks: Bronze, Silver and Gold. The bronze Deck and Silver can be looted from any monster from Isle, then the Gold Deck can be looted from Wroldbosses, see <b style="color:orange">The Isles - World Bosses</b> tab to find a world boss to kill around the continent.<br></br>
							On The deck's, you can add any type of item, but the most important it's to add Cards, that you can loot from Monsters of The Isles or WorldBosses. <br>
							Each card, can give a bonus to the player or change the element of a spell when activated.<br>
							To activate a card, place the card on the Deck then right click on it, you can also use the talkaction <b style="color:orange">!deck</b> in order to see the cards that you have activated, in case you lost the card or deposited elsewhere. Each player can activate a maximum of 5 cards at same time.
							</center><br></br>
							<center>
							Here a list of available Cards, there is Normal Cards and Legendary Cards. Cards can be upgraded using <b style="color:orange"> Essences </b> Rare Essence, Epic Essence, Mythic or legendary, see the table.
						<div class="desc-margin-10"></div>
						<div class="desc-margin-10"></div>
						<div class="desc-text__title fz_20" style="color:green"> Normal Cards</div>
						<div class="desc-margin-10"></div>
						<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Erasmo Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24826_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Erasmo Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24826_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus: Convert Exori to Earth Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Common Erasmo Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Aeliana, Archon, Baalzebul, Lyrael, Nyxion, Oroniel, Sagittarius, Seraphiel.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24827_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Erasmo Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24827_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus: Convert Exori to Ice Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Erasmo Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Aeliana, Archon, Baalzebul, Lyrael, Nyxion, Oroniel, Sagittarius, Seraphiel.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24828_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Erasmo Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24828_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus: Convert Exori to Death Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Erasmo Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24829_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Erasmo Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24829_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus: Convert Exori to Energy Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Erasmo Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
						
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Demetar Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24830_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Demetar Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24830_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Tera Hur to Fire Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Common Demetar Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Aeliana, Archon, Baalzebul, Lyrael, Nyxion, Oroniel, Sagittarius, Seraphiel.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24831_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Demetar Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24831_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Tera Hur to Holy Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Demetar Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Aeliana, Archon, Baalzebul, Lyrael, Nyxion, Oroniel, Sagittarius, Seraphiel.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24832_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Demetar Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24832_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Tera Hur to Death Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Demetar Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24833_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Demetar Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24833_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Tera Hur to Energy Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Demetar Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Kaishuter Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24834_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Kaishuter Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24834_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Vis Hur to Holy Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Common Kaishuter Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Fangclaw, Lurskin, Scalebreaker, Slinkhide, Sludgejaw.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24835_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Kaishuter Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24835_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Vis Hur to Death Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Kaishuter Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Fangclaw, Lurskin, Scalebreaker, Slinkhide, Sludgejaw.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24836_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Kaishuter Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24836_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Vis Hur to Ice Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Kaishuter Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24837_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Kaishuter Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24837_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Vis Hur to Drown Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Kaishuter Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Enraged Chuo Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24838_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Enraged Chuo Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24838_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Convert Exevo Mas San to Fire Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Common Enraged Chuo Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Fangclaw, Lurskin, Scalebreaker, Slinkhide, Sludgejaw.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24839_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Enraged Chuo Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24839_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Convert Exevo Mas San to Ice Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Enraged Chuo Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Fangclaw, Lurskin, Scalebreaker, Slinkhide, Sludgejaw.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24840_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Enraged Chuo Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24840_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Convert Exevo Mas San to Earth Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Enraged Chuo Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24841_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Enraged Chuo Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24841_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Convert Exevo Mas San to Death Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Enraged Chuo Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Zaika Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24842_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Zaika Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24842_.png">
						<div class="desc-margin-10"></div>
						Vocation: All<br>
						Bonus: Convert Avalanche rune to Fire damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Common Zaika Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Cinderclaw, Scaledrake.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24843_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Zaika Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24843_.png">
						<div class="desc-margin-10"></div>
						Vocation: All<br>
						Bonus: Convert Avalanche rune to Earth damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Zaika Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Cinderclaw, Scaledrake.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24844_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Zaika Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24844_.png">
						<div class="desc-margin-10"></div>
						Vocation: All<br>
						Bonus: Convert Avalanche rune to Energy damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Zaika Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24845_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Zaika Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24845_.png">
						<div class="desc-margin-10"></div>
						Vocation: All<br>
						Bonus: Convert Avalanche rune to Death damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Zaika Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Rictus Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24846_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Rictus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24846_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Gran Mas Frigo to Fire damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Common Rictus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Cinderclaw, Scaledrake.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24847_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Rictus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24847_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Gran Mas Frigo to Holy damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Rictus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Cinderclaw, Scaledrake.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24848_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Rictus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24848_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Gran Mas Frigo to Death damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Rictus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24849_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Rictus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24849_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Gran Mas Frigo to Energy damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Rictus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Globus Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24850_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Globus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24850_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Gran Mas Vis to Holy damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Common Globus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Emerald Mage, Ruby Archer, Sapphire Warrior.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24851_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Globus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24851_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Gran Mas Vis to Earth damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Globus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Emerald Mage, Ruby Archer, Sapphire Warrior.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24852_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Globus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24852_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Gran Mas Vis to Death damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Globus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24853_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Globus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24853_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Gran Mas Vis to Ice damage area.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Globus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Hidaka Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24854_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Hidaka Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24854_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Convert Exori mas to Fire damage.
						</span>
							<div class="desc-rate__rates-item-desc">Common Hidaka Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Emerald Mage, Ruby Archer, Sapphire Warrior.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24855_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Hidaka Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24855_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Convert Exori mas to Earth damage.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Hidaka Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Emerald Mage, Ruby Archer, Sapphire Warrior.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24856_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Hidaka Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24856_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Convert Exori mas to Ice damage.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Hidaka Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24857_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Hidaka Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24857_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Convert Exori mas to Death damage.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Hidaka Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Brelshaza Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24858_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Brelshaza Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24858_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Increase Utito Tempo with Minor Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Common Brelshaza Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Bonecleaver, Fleshcarver, Fleshrend, Mauler.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24859_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Brelshaza Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24859_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Increase Utito Tempo with Major Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Brelshaza Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Bonecleaver, Fleshcarver, Fleshrend, Mauler.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24860_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Brelshaza Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24860_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Increase Utito Tempo with Intense Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Brelshaza Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24861_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Brelshaza Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24861_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Increase Utito Tempo with Powerful Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Brelshaza Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Vairgrys Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24862_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Vairgrys Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24862_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Gran Flam Hur to Ice Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Common Vairgrys Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Bonecleaver, Fleshcarver, Fleshrend, Mauler.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24863_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Vairgrys Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24863_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Gran Flam Hur to Holy Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Vairgrys Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Bonecleaver, Fleshcarver, Fleshrend, Mauler.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24864_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Vairgrys Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24864_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Gran Flam Hur to Death Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Vairgrys Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24865_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Vairgrys Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24865_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: Convert Exevo Gran Flam Hur to Energy Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Vairgrys Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Enviska Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24866_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Enviska Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24866_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Gran Frigo Hur to Fire Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Common Enviska Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Grothar, Grugnor, Krag'lok, Krulmash, Mok'gosh, Thokkar.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24867_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Enviska Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24867_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Gran Frigo Hur to Holy Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Enviska Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Grothar, Grugnor, Krag'lok, Krulmash, Mok'gosh, Thokkar.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24868_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Enviska Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24868_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Gran Frigo Hur to Death Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Enviska Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24869_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Enviska Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24869_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druid<br>
						Bonus: Convert Exevo Gran Frigo Hur to Energy Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Enviska Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Harzal Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24870_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Harzal Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24870_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer, Druid, Paladin<br>
						Bonus: Increase Exura Gran with a Minor Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Common Harzal Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Grothar, Grugnor, Krag'lok, Krulmash, Mok'gosh, Thokkar.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24871_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Harzal Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24871_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer, Druid, Paladin<br>
						Bonus: Increase Exura Gran with a Major Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Harzal Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Grothar, Grugnor, Krag'lok, Krulmash, Mok'gosh, Thokkar.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24872_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Harzal Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24872_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer, Druid, Paladin<br>
						Bonus: Increase Exura Gran with a Intense Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Harzal Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24873_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Harzal Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24873_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer, Druid, Paladin<br>
						Bonus: Increase Exura Gran with a Powerful Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Harzal Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Agaton Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24874_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Agaton Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24874_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Converts Exori San to Fire Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Common Agaton Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Blackblade, Blightbearer, Gorthak, Malevolent, Shadowreaper, Urzog.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24875_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Agaton Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24875_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Converts Exori San to Earth Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Agaton Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Blackblade, Blightbearer, Gorthak, Malevolent, Shadowreaper, Urzog.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24876_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Agaton Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24876_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Converts Exori San to Death Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Agaton Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24877_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Agaton Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24877_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Converts Exori San to Energy Damage.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Agaton Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Lumerus Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24878_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Lumerus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24878_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Minor Increase Distance of Exeta Res.
						</span>
							<div class="desc-rate__rates-item-desc">Common Lumerus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Blackblade, Blightbearer, Gorthak, Malevolent, Shadowreaper, Urzog.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24879_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Lumerus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24879_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Major Increase Distance of Exeta Res.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Lumerus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Blackblade, Blightbearer, Gorthak, Malevolent, Shadowreaper, Urzog.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24880_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Lumerus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24880_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Intense Increase Distance of Exeta Res.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Lumerus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24881_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Lumerus Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24881_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knight<br>
						Bonus: Powerful Increase Distance of Exeta Res.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Lumerus Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20"> Velganos Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24882_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Common Velganos Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24882_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Increase Utito Tempo San with a Minor Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Common Velganos Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Bonelich, Deathrattle, Doombone, Grimbone, Shadow Reaper, Skullshade, Tombwraith.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25047_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Rare Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25047_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Rare Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24883_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Rare Velganos Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24883_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Increase Utito Tempo San with a Major Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Rare Velganos Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Bonelich, Deathrattle, Doombone, Grimbone, Shadow Reaper, Skullshade, Tombwraith.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25048_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Epic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25048_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Epic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24884_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Epic Velganos Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24884_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Increase Utito Tempo San with a Intense Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Epic Velganos Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc"><br></br><br></br><br></br></div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25049_.png">
						<div class="desc-margin-10"></div>
						Use the Essence on the card to upgrade it on Mythic Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25049_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Mythic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24885_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mythic Velganos Card</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24885_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladin<br>
						Bonus: Increase Utito Tempo San with a Powerful Bonus.
						</span>
							<div class="desc-rate__rates-item-desc">Mythic Velganos Card</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrading.</div>
							<div class="desc-rate__rates-item-desc">Last Tier.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-margin-10"></div>
						<div class="desc-margin-10"></div>
						<div class="desc-text__title fz_20" style="color:gold"> Legendary Cards</div>
						<div class="desc-margin-10"></div>
						<center><b style="font-size:16px"><i>Legendary Cards, can looted from Worldbosses, this cards only give's a bonus when they are Level 6.</i></b><br>
						Legendary Cards have 4 Tiers, Each Tier has 6 Levels, the bonus will be on the level 6 of each tier:<br></br>
						<li style="color:green"> Exotic</li><br>
						<li style="color:purple"> Chaos</li><br>
						<li style="color:red"> Abyssal</li><br>
						<li style="color:gold"> Ancestral</li><br></br>
						Each Tier, the bonus will take effect only on level 6. There is 1 Legendary Card per Vocation, that each card, when activated, only certains weapons can activate the bonus while attacking (Majority they are each weapon of level 55 above for each vocation).
						</center>
						<div class="desc-margin-20"></div>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>
						<center> Upgrade of legendary cards:<div class="desc-margin-10"></div><img src="layout/application/templates/default/images/description/deck_system/legendary_upgrade.gif" style="width:700px">
						<div class="desc-margin-10"></div>
						Legendary Cards Summon (Tested with 100% chance for the video) summon will change appareance on each tier.<br>
						<div class="desc-margin-10"></div>
						<img src="layout/application/templates/default/images/description/deck_system/legendary_cards.gif" style="width:700px">
						</center>
						<div class="desc-sep"></div>
						<div class="desc-margin-20"></div>
						<div class="desc-text__title fz_20"> Sorcerers</div>
						<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:green"> Legendary Exotic Ascalon Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24886_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Ascalon Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24886_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Ascalon Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24887_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Ascalon Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24887_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Ascalon Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24888_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Ascalon Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24888_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Ascalon Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24889_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Ascalon Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24889_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Ascalon Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24890_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Ascalon Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24890_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Ascalon Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24891_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Ascalon Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24891_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Ascalon Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">2% Chance to summon a monster that fight's with you during 25 seconds and increase magic level by 3</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:purple"> Legendary Chaos Ascalon Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24892_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Ascalon Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24892_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Ascalon Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.9%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24893_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Ascalon Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24893_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Ascalon Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24894_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Ascalon Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24894_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Ascalon Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24895_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Ascalon Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24895_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Ascalon Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24896_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Ascalon Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24896_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Ascalon Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24897_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Ascalon Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24897_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Ascalon Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">3% Chance to summon a monster that fight's with you during 45 seconds and increase magic level by 6</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:red"> Legendary Abyssal Ascalon Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24898_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Ascalon Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24898_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Ascalon Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24899_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Ascalon Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24899_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Ascalon Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24900_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Ascalon Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24900_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Ascalon Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24901_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Ascalon Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24901_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Ascalon Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24902_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Ascalon Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24902_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Ascalon Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24903_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Ascalon Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24903_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Ascalon Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">4% Chance to summon a monster that fight's with you during 65 seconds and increase magic level by 9</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:gold"> Legendary Ancestral Ascalon Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24904_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Ascalon Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24904_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Ascalon Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.7%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24905_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Ascalon Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24905_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Ascalon Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24906_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Ascalon Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24906_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Ascalon Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24907_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Ascalon Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24907_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Ascalon Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24908_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Ascalon Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24908_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Ascalon Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24909_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Ascalon Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24909_.png">
						<div class="desc-margin-10"></div>
						Vocation: Sorcerer<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Ascalon Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">5% Chance to summon a monster that fight's with you during 90 seconds and increase magic level by 15</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					
					<div class="desc-text__title fz_20"> Druids</div>
						<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:green"> Legendary Exotic Saydon Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24910_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Saydon Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24910_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Saydon Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24911_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Saydon Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24911_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Saydon Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24912_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Saydon Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24912_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Saydon Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24913_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Saydon Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24913_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Saydon Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24914_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Saydon Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24914_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Saydon Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24915_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Saydon Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24915_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase magic level by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Saydon Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">2% Chance to summon a monster that fight's with you during 25 seconds and increase magic level by 3</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:purple"> Legendary Chaos Saydon Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24916_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Saydon Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24916_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Saydon Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.9%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24917_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Saydon Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24917_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Saydon Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24918_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Saydon Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24918_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Saydon Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24919_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Saydon Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24919_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Saydon Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24920_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Saydon Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24920_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Saydon Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24921_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Saydon Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24921_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase magic level by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Saydon Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">3% Chance to summon a monster that fight's with you during 45 seconds and increase magic level by 6</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:red"> Legendary Abyssal Saydon Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24922_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Saydon Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24922_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Saydon Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24923_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Saydon Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24923_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Saydon Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24924_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Saydon Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24924_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Saydon Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24925_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Saydon Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24925_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Saydon Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24926_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Saydon Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24926_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Saydon Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24927_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Saydon Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24927_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase magic level by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Saydon Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">4% Chance to summon a monster that fight's with you during 65 seconds and increase magic level by 9</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:gold"> Legendary Ancestral Saydon Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24928_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Saydon Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24928_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Saydon Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.7%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24929_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Saydon Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24929_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Saydon Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24930_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Saydon Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24930_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Saydon Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24931_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Saydon Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24931_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Saydon Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24932_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Saydon Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24932_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Saydon Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24933_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Saydon Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24933_.png">
						<div class="desc-margin-10"></div>
						Vocation: Druids<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase magic level by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Saydon Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">5% Chance to summon a monster that fight's with you during 90 seconds and increase magic level by 15</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					
					<div class="desc-text__title fz_20"> Paladins</div>
						<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:green"> Legendary Exotic Vercruze Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24934_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Vercruze Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24934_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase distance skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Vercruze Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24935_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Vercruze Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24935_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase distance skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Vercruze Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24936_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Vercruze Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24936_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase distance skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Vercruze Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24937_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Vercruze Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24937_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase distance skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Vercruze Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24938_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Vercruze Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24938_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase distance skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Vercruze Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24939_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Vercruze Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24939_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase distance skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Vercruze Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">2% Chance to summon a monster that fight's with you during 25 seconds and increase distance skill by 3</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:purple"> Legendary Chaos Vercruze Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24940_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Vercruze Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24940_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase distance skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Vercruze Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.9%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24941_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Vercruze Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24941_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase distance skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Vercruze Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24942_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Vercruze Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24942_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase distance skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Vercruze Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24943_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Vercruze Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24943_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase distance skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Vercruze Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24944_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Vercruze Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24944_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase distance skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Vercruze Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24945_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Vercruze Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24945_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase distance skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Vercruze Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">3% Chance to summon a monster that fight's with you during 45 seconds and increase distance skill by 6</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:red"> Legendary Abyssal Vercruze Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24946_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Vercruze Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24946_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase distance skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Vercruze Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24947_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Vercruze Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24947_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase distance skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Vercruze Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24948_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Vercruze Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24948_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase distance skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Vercruze Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24949_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Vercruze Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24949_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase distance skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Vercruze Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24950_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Vercruze Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24950_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase distance skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Vercruze Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24951_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Vercruze Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24951_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase distance skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Vercruze Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">4% Chance to summon a monster that fight's with you during 65 seconds and increase distance skill by 9</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:gold"> Legendary Ancestral Vercruze Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24979_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Vercruze Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24979_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase distance skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Vercruze Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.7%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24980_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Vercruze Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24980_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase distance skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Vercruze Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24981_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Vercruze Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24981_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase distance skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Vercruze Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24982_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Vercruze Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24982_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase distance skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Vercruze Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24983_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Vercruze Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24983_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase distance skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Vercruze Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24984_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Vercruze Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24984_.png">
						<div class="desc-margin-10"></div>
						Vocation: Paladins<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase distance skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Vercruze Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">5% Chance to summon a monster that fight's with you during 90 seconds and increase distance skill by 15</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-text__title fz_20"> Knights</div>
						<div class="desc-margin-10"></div>
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:green"> Legendary Exotic Kaiser Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24952_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Kaiser Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24952_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase melee skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Kaiser Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 1%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24953_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Kaiser Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24953_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase melee skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Kaiser Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24954_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Kaiser Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24954_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase melee skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Kaiser Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24955_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Kaiser Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24955_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase melee skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Kaiser Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_24956_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24956_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Kaiser Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24938_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase melee skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Kaiser Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Exotic Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25043_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25043_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Exotic Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24957_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Exotic Kaiser Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24957_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus: 2% Chance to Summon Monster that Fight's with you for 25 seconds and increase melee skill by 3.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Exotic Kaiser Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">2% Chance to summon a monster that fight's with you during 25 seconds and increase melee skill by 3</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:purple"> Legendary Chaos Kaiser Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24958_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Kaiser Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24958_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase melee skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Kaiser Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.9%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24959_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Kaiser Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24959_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase melee skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Kaiser Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24960_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Kaiser Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24960_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase melee skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Kaiser Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24961_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Kaiser Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24961_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase melee skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Kaiser Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24962_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Kaiser Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24962_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase melee skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Kaiser Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Chaos Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25044_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25044_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Chaos Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24963_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Chaos Kaiser Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24963_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 3% Chance to Summon Monster that Fight's with you for 45 seconds and increase melee skill by 6.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Chaos Kaiser Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">3% Chance to summon a monster that fight's with you during 45 seconds and increase melee skill by 6</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:red"> Legendary Abyssal Kaiser Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24964_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Kaiser Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24964_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase melee skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Kaiser Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.8%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24965_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Kaiser Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24965_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase melee skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Kaiser Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24966_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Kaiser Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24966_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase melee skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Kaiser Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24967_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Kaiser Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24967_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase melee skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Kaiser Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24968_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Kaiser Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24968_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase melee skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Kaiser Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Abyssal Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25045_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25045_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Abyssal Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24969_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Abyssal Kaiser Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24969_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 4% Chance to Summon Monster that Fight's with you for 65 seconds and increase melee skill by 9.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Abyssal Kaiser Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">4% Chance to summon a monster that fight's with you during 65 seconds and increase melee skill by 9</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					
					<div class="desc-rate__rates flex-ss">
							<div class="desc-text__title fz_20" style="color:gold"> Legendary Ancestral Kaiser Card</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24970_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Kaiser Card Lv1</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24970_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase melee skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Kaiser Card Lv1</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
							<div class="desc-rate__rates-item-desc">Loot chance: 0.7%.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span><br>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24971_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Kaiser Card Lv2</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24971_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase melee skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Kaiser Card Lv2</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24972_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Kaiser Card Lv3</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24972_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase melee skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Kaiser Card Lv3</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24973_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Kaiser Card Lv4</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24973_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase melee skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Kaiser Card Lv4</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24974_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Kaiser Card Lv5</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24974_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase melee skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Kaiser Card Lv5</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc">Use Legendary Ancestral Essence to upgrade the card.</div>
						</div>	
						<br></br>
						<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Essence</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_25046_.png">
						<div class="desc-margin-10"></div>
						Use the Legendary Essence on the card to upgrade it on the next Level Tier.<br>
						Obtention: WorldBosses
						</span>
						<div class="desc-rate__rates-item-desc"><img src="layout/application/templates/default/images/description/deck_system/item_25046_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
						<div class="desc-rate__rates-item-desc">Can be Upgraded with Legendary Ancestral Essence.<br>Obtention: World Bosses.</div>
						</div>	
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/deck_system/item_24975_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Legendary Ancestral Kaiser Card Lv6</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/deck_system/item_24975_.png">
						<div class="desc-margin-10"></div>
						Vocation: Knights<br>
						Bonus at Level 6: 5% Chance to Summon Monster that Fight's with you for 90 seconds and increase melee skill by 15.
						</span>
							<div class="desc-rate__rates-item-desc">Legendary Ancestral Kaiser Card Lv6</div>
							<div class="desc-rate__rates-item-desc">Obtention: Upgrade.</div>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Bonus</b>: <b style="color:green">5% Chance to summon a monster that fight's with you during 90 seconds and increase melee skill by 15</b>.</div>
						</div>	
						<br>
						</div>
						
					</div>
					<div class="desc-margin-10"></div>
					<div class="desc-margin-20"></div>
						
	</div>

    <div class="desc-margin-20"></div>

 
</div>


<div class="global-desc__content-item" data-name-tab="ship">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_0.png" alt=""></div>
				<div class="global-desc__content-title-text">Boat System<span>Navigation, battles</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Boat System</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__text fz_15" style="font-size:17px">
							From now, each player can start a new mission on Decks, on each city, with <b style="orange">Magnus Blackwater</b><img src="layout/application/templates/default/images/description/boats/magnus.png"> that it asks you for some materials in order to start the construction of your first boat.<br>
							Meet <b style="orange">Shipright Trader</b> at south of Dolwatha , passage to Falanaar, to buy the materials to start the construction of your boat then go back to talk with Magnus.<br></br>
							You will be rewarded with the <b>The Explorer</b> first boat to start navigation around the Continent.<br></br>
							Make sure to be prepared before start navigating, maybe you will find a storm or some Pirates ships that can start fighting against intruders.<br></br>
							A new Slot under Deck slot, can equip Ship's, without a ship you can't navigate.<br></br>
							Boat's doesn't have any bonus, they simple have a different look for now.<br>
							
							You can explore <b style="color:green">9 New Isles</b> see <b style="color:orange">The Isles</b> Tab to check about the Worldbosses that can be founded and new monsters.<br></br>
							Also, you can explore or go to other Cities (Falanaar, Dolwatha, Freewind, Bounac, Arkeron, and much more!) with the boat and also on <b style="color:orange">Kindernia</b> you will find a port to dock and help your friends or new players.
							<center>
							<img src="layout/application/templates/default/images/description/boats/boats.gif">
							<br></br>
							From now, each vocation can use all spells and attacks when still on water, you can also die and take your items back if you remember where you die.<br></br>
							<img src="layout/application/templates/default/images/description/boats/baots_battle.gif">
							<br></br>
							</center>
							<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> Boat's</div>
						</div>
							<div class="desc-margin-10"></div>
							<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/boats/item_25143_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">The Explorer</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/boats/item_25143_.png">
						<div class="desc-margin-10"></div>
						First Boat obtained after completing mission for <b style="color:orange">Magnus Blackwater</b>
						</span>
							<div class="desc-rate__rates-item-desc">The Explorer</div>
							<div class="desc-rate__rates-item-desc">Slot: Ship</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/boats/item_25144_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Whisperwind</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/boats/item_25144_.png">
						<div class="desc-margin-10"></div>
						Obtention: Worldbosses.
						</span>
							<div class="desc-rate__rates-item-desc">Whisperwind</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/boats/item_25145_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Menethil March</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/boats/item_25145_.png">
						<div class="desc-margin-10"></div>
						Obtention: Worldbosses.
						</span>
							<div class="desc-rate__rates-item-desc">Menethil March</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/boats/item_25146_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Shadowmeld</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/boats/item_25146_.png">
						<div class="desc-margin-10"></div>
						Obtention: Worldbosses.
						</span>
							<div class="desc-rate__rates-item-desc">Shadowmeld</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/boats/item_25140_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Scarlet Raven</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/boats/item_25140_.png">
						<div class="desc-margin-10"></div>
						Obtention: Worldbosses.
						</span>
							<div class="desc-rate__rates-item-desc">Scarlet Raven</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/boats/item_25142_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">The Counterspell</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/boats/item_25142_.png">
						<div class="desc-margin-10"></div>
						Obtention: Worldbosses.
						</span>
							<div class="desc-rate__rates-item-desc">The Counterspell</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/boats/item_25141_.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">The Awakener</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/boats/item_25141_.png">
						<div class="desc-margin-10"></div>
						Obtention: Worldbosses.
						</span>
							<div class="desc-rate__rates-item-desc">The Awakener</div>
							<div class="desc-rate__rates-item-desc">Obtention: Worldbosses.</div>
						</div>	
						<br>
						</div>
						
					</div>
					</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	

	</div>	

	</div>
 
</div>

<div class="global-desc__content-item" data-name-tab="isles">
			<div class="global-desc__content-title flex-sc">
				<div class="global-desc__content-title-icon"><img src="layout/application/templates/default/images/description/navigation/nav_icon_7.png" alt=""></div>
				<div class="global-desc__content-title-text">The Isles<span>New Zones, New Spawns, New Monsters, New WorldBosses</span></div>
			</div>
			<div class="global-desc__content-box">
            <div class="desc-boss__blocks flex-ss">
</div>
<div class="desc-margin-20"></div>
<div class="desc-boss__blocks flex-ss">
		<div class="desc-boss__blocks flex-ss">
		
        <div class="desc-text">
						<div class="desc-margin-10"></div>
						<div class="desc-text__text fz_15" style="font-size:17px">
						<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> The Isles</div>
	</div>	<div class="desc-margin-10"></div>
		<div class="desc-text__title fz_20">New Monsters</div>
							<div class="desc-margin-10"></div>
							There is 47 New Monsters, recommended for levels 200+ that can be founded on new isles.
					
					
					<div class="desc-margin-20"></div>
					<div class="desc-text__title fz_20">New WorldBosses</div>
							<div class="desc-margin-10"></div>
							There is <b style="color:orange">10 New World Bosses</b>, each one is unique, can loot Cards for the new system <b>Deck</b>, new <b>Ships</b> looktype, new items (jungle, eldritch, naga, and new quivers ), <b>Badges</b>, upgrades ressources, <b>new wings</b> and more.
							<br></br>
							The worldbosses appear on a specific day with a specific time, they are extremely strong, we recommend going there only in party at least with 5 players.<br></br>
							From now and go on, a Boss bar that appears on the client each time a Boss or World Boss is near.<br></br>
							<img src="layout/application/templates/default/images/description/isles/boss_bar.png" alt="">
							<br></br>
							<div class="desc-margin-20"></div>
					<div class="desc-text__title fz_20"><i class="far fa-info-circle"></i> World Bosses & Timer</div>
					
					<div class="desc-rate__rates flex-ss">
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/aquatic.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Aquatic Overlord Thalassa</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/aquatic.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle at west of Dwalling (Arkeron).<br>
						Life: 1.000.000<br>
						Average Damage: 5k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Monday at 16:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/azazel.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Azazel The Infernal Seraph</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/azazel.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle at north of Kilmaresh.<br>
						Life: 1.000.000<br>
						Average Damage: 5k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Friday at 20:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/darktul.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Drak'thul The Void Sovereign</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/darktul.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle to the east of Azure Palace (Falanaar).<br>
						Life: 1.000.000<br>
						Average Damage: 5k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Tuesday at 20:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/dreadbone.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Dreadbone The Eternal</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/dreadbone.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle to north west of Mordragor.<br>
						Life: 500.000<br>
						Average Damage: 3k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Saturday at 12:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/mortis.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Mortis The Sovereign</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/mortis.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle to north west of Mordragor.<br>
						Life: 500.000<br>
						Average Damage: 3k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Saturday at 12:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/dreadscale.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Dreadscale The Ancient</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/dreadscale.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle to north of Falcon Bastion.<br>
						Life: 1.000.000<br>
						Average Damage: 5k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Monday at 20:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/gorgul.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Gor'gul The Frienzied</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/gorgul.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle to south of Falanaar.<br>
						Life: 1.000.000<br>
						Average Damage: 5k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Sunday at 20:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/thalador.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Thalador The Stormbringer</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/thalador.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle to south east of Freewind.<br>
						Life: 1.000.000<br>
						Average Damage: 5k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Wednesday at 20:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/tymagron.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Tymagron The Earthshaker</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/tymagron.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle at north of Freewind, on the central of the isle.<br>
						Life: 1.000.000<br>
						Average Damage: 5k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Saturday at 20:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						
						<div class="desc-rate__rates-item">
							<div class="desc-rate__rates-item-title"><img src="layout/application/templates/default/images/description/isles/vorondor.png" alt="" style="    border-radius: 8px;border: 1px solid #56423d;"></div>
							<div class="tooltip">
						<span class="tooltip-span">
						<div class="whtt-name">Vorondor The Eternal Flames</div>
						<div class="desc-margin-10"></div>
							<img class="image" src="layout/application/templates/default/images/description/isles/vorondor.png">
						<div class="desc-margin-10"></div>
						Appears on the Isle at west of Arkeron.<br>
						Life: 1.000.000<br>
						Average Damage: 5k +
						</span>
							<div class="desc-rate__rates-item-desc"><b style="color:orange">Apparition: Thursday at 20:00</b></div>
							<div class="desc-rate__rates-item-desc">Loot: Badges first tier, Cards & Legendary Cards Lv1, Upgrade Ressources, Ships, Wings.</div>
						</div>	
						<br>
						</div>
						
						
					</div><div class="desc-margin-20"></div>
					<div class="desc-text__title fz_20">Some Screens</div>
					<div class="desc-margin-20"></div>
						<center>
						<img class="image" src="layout/application/templates/default/images/description/isles/aquatic_overlord_thalassa.png"><br>
						<img class="image" src="layout/application/templates/default/images/description/isles/azazel_infernal_seraph.png"><br>
						<img class="image" src="layout/application/templates/default/images/description/isles/draktul_the_void_sovereign.png"><br>
						<img class="image" src="layout/application/templates/default/images/description/isles/dread_scale_the_ancient.png"><br>
						<img class="image" src="layout/application/templates/default/images/description/isles/mortis_dreadbone.png"><br>
						<img class="image" src="layout/application/templates/default/images/description/isles/tahalador_the_stormbringer.png"><br>
						<img class="image" src="layout/application/templates/default/images/description/isles/gorgul-boss.png"><br>
						<img class="image" src="layout/application/templates/default/images/description/isles/tymagron-boss.png"><br>
						<img class="image" src="layout/application/templates/default/images/description/isles/vorondor_eternal_flames.png">
						</center
					</div>
					</div>
	</div>
	<div class="desc-margin-10"></div>
	<div class="desc-sep"></div>
	<div class="desc-sep"></div>

	</div>	
					</div>
	</div>
 
</div>

<!---------------------- Fin -------------------------------->	
</div>

</div>	
		</div>
	</div>


	
	</div>
</div>


<style>



.whtt-name {
    color: #f9af75;
	font-size: 20px;
    text-align: center;
	font: small-caps 500 20px Exocet, Verdana, "Open Sans", Arial, "Helvetica Neue", Helvetica, sans-serif;
	margin-top: 20px;
}

.tooltip {
    text-decoration:none;
    position:relative;
	cursor: pointer;
}
.tooltip span {
    width: 250px;
    height: 495px;
    background-image: url('https://i.imgur.com/wi9eF3O.png'); /* Set your default background image here */
    background-size: cover;
    background-repeat: no-repeat;
    background-position: -2px -5px; /* Adjusted background position */
    text-align: center;
    margin-left: 8px;
    margin-right: 8px;
    padding: 13px 19px 13px 16px; /* Add left padding for the image */
    border-radius: 5px;
    position: absolute;
    bottom: 125%;
    left: 50%;
    color: #d9d9d9;
    transform: translateX(-50%);
    font: 16px Arial, "Helvetica Neue", Helvetica, sans-serif;
    color: #f6edd6;
    display: none; /* Hide the tooltip by default */
}

.tooltip .image img {
    display: inline-block;
    width: 32px;
    height: 32px;
    margin-right: 180px; /* Add space between the image and text */
    margin-left: 90px;
    margin-top: 5px;
}

.tooltip:hover span {
    display:block;
    position:fixed;
    overflow:hidden;
	z-index:999
}
</style>


<script>
var tooltipSpans = document.querySelectorAll('.tooltip-span'); // Changed to class

window.onmousemove = function (e) {
    var x = e.clientX,
        y = e.clientY;
    
    tooltipSpans.forEach(function(tooltipSpan) {
        tooltipSpan.style.top = (y + 20) + 'px';
        tooltipSpan.style.left = (x + 20) + 'px';
    });
};


document.addEventListener('contextmenu', event => event.preventDefault());</script>
	<style>
									.prevent-select {
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none; /* Standard syntax */
}

img {
    pointer-events: none;
}
								</style>

<?php
include 'layout/overall/footer_wiki.php'; ?>
