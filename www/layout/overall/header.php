<?php
	require_once 'layout/layout_config.php';
	$launch_seconds = (strtotime($countDown) - time());
	$delay_hide = $launch_seconds + $countDown_hide;

    // Fetch data from database
    $data = array(
        'newPlayer' => mysql_select_single("SELECT `name` FROM `players` ORDER BY `id` DESC LIMIT 1"),
        'bestPlayer' => mysql_select_single("SELECT `name`, `level` FROM `players` ORDER BY `experience` DESC LIMIT 1"),
        'playerCount' => mysql_select_single("SELECT COUNT(`id`) as `count` FROM `players`"),
        'accountCount' => mysql_select_single("SELECT COUNT(`id`) as `count` FROM `accounts`"),
        'guildCount' => mysql_select_single("SELECT COUNT(`id`) as `count` FROM `guilds`")
    );

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- title -->
	<title>Custom Tibia Mmorpg</title>
	
	<!-- meta -->
<meta name="keywords" content="Tibia, mmorpg, custom rpg, tibia custom, experience, dungeons, fight, pvp" />
<meta name="description" content="New Lineage 2 High Five Servers. Lineage 2 Private Project. Lineage 2 Remastered" />
<meta property="og:title" content="New Custom Tibia Rpg">
<meta property="og:type" content="website">
<meta property="og:description" content="Tibia RPG Custom Unique Experience.">
<meta property="og:site_name" content="Exodus">

<!-- favicon -->
<link href="layout/application/templates/default/images/hellgrave_icono.png" rel="shortcut icon" type="image/x-icon">

<!-- style -->
<link rel="stylesheet" href="layout/application/templates/default/css/style.css">
<link rel="stylesheet" href="layout/application/templates/default/fonts/fontawesome/css/font-awesome.css">
<link rel="stylesheet" href="layout/application/templates/default/fonts/rpgawesome/css/rpg-awesome.css">

</head>
<body>

	<div class="messages"></div>

	
	<!-- wrapper -->
	<div class="wrapper">

		<!-- header -->
		<!-- navigation -->
<nav class="navigation">
	<div class="content-area flex-sbc">
		
		<!-- logo -->
		
		<!-- end logo -->
 <style>
/* Hide submenus by default */
.navigation__drop-box {
    width: 270px;
  position: absolute;
  top: 20px;
  left: 0px;
  display: none;
}

/* Show submenus when hovering over the trigger element */
.navigation__link:hover .navigation__drop-box {
    display: block;
}


/* Style submenus as needed */
.navigation__drop-box-items {
    width: 100%;
  background: #130d0c;
  border: 1px solid #2b2120;
  border-radius: 3px;
  position: relative;
  -webkit-transition: -webkit-transform .3s ease-in-out;
  transition: -webkit-transform .3s ease-in-out;
  -o-transition: transform .3s ease-in-out;
  transition: transform .3s ease-in-out;
  transition: transform .3s ease-in-out, -webkit-transform .3s ease-in-out;
  margin-top: 11px;
}
.navigation__drop-box-items a {
  width: 100%;
  padding: 15px 15px;
  font-family: 'Roboto', sans-serif;
  font-size: 15px;
  color: #8a7f7c;
  -webkit-transition: color .3s ease-in-out;
  -o-transition: color .3s ease-in-out;
  transition: color .3s ease-in-out;
  cursor: pointer;
}

/* Show submenus on hover or click */
.submenu-trigger:hover .navigation__drop-box,
.submenu-trigger:focus-within .navigation__drop-box {
    display: block;
}</style>
<script>
// Delay before hiding submenu
const submenuHideDelay = 300; // You can adjust the delay (in milliseconds) as needed

// jQuery code to close submenus when clicking outside
$(document).on('click', function (e) {
    if (!$(e.target).closest('.submenu-trigger').length) {
        $('.navigation__drop-box').hide();
    }
});

// jQuery code to prevent submenu from closing when clicking inside
$('.submenu-trigger').on('click', function (e) {
    e.stopPropagation();
});

// jQuery code to handle submenu hover
$('.submenu-trigger').on('mouseenter', function () {
    const submenu = $(this).find('.navigation__drop-box');
    clearTimeout(submenu.data('hideTimeout'));
    submenu.show();
}).on('mouseleave', function () {
    const submenu = $(this).find('.navigation__drop-box');
    const hideTimeout = setTimeout(function () {
        submenu.hide();
    }, submenuHideDelay);
    submenu.data('hideTimeout', hideTimeout);
});

</script>
		<!-- links -->
		<div class="navigation__links flex-cc">
    <a href="index.php" class="navigation__link flex-sc"><span><i class="fa fa-external-link-square" aria-hidden="true"></i> HOME</span></a>
    <a href="downloads.php" class="navigation__link flex-sc"><span><i class="fa fa-download" aria-hidden="true"></i> DOWNLOAD</span></a>
    <div class="navigation__link flex-sc submenu-trigger">
        <span class="open-drop-box"><i class="fa fa-book fa-xs"></i> LIBRARY</span><i class="fal fa-angle-down"></i>
        <div class="navigation__drop-box drop-box">
            <div class="navigation__drop-box-items">
                <a href="wiki.php" class="flex-sbc">Wikipedia</a>
                <a href="deaths.php" class="flex-sbc">Deaths</a>
                <a href="highscores.php" class="flex-sbc">Highscores</a>
                <a href="houses.php" class="flex-sbc">Houses</a>
                <a href="killers.php" class="flex-sbc">Killers</a>
                <a href="market.php" class="flex-sbc">Market</a>
                <a href="serverinfo.php" class="flex-sbc">Server Info</a>
            </div>
        </div>
    </div>
    <div class="navigation__link flex-sc submenu-trigger">
        <span class="open-drop-box"><i class="fa fa-book fa-xs"></i> ACCOUNT</span><i class="fal fa-angle-down"></i>
        <div class="navigation__drop-box drop-box">
            <div class="navigation__drop-box-items">
                <a href="register.php" class="flex-sbc">Register</a>
                <a href="myaccount.php" class="flex-sbc">Account</a>
                <a href="helpdesk.php" class="flex-sbc">Contact us</a>
                <a href="support.php" class="flex-sbc">Support</a>
                <a href="forum.php" class="flex-sbc">Forum</a>
            </div>
        </div>
    </div>
    <div class="navigation__link flex-sc submenu-trigger">
        <span class="open-drop-box"><i class="fa fa-book fa-xs"></i> STORE</span><i class="fal fa-angle-down"></i>
        <div class="navigation__drop-box drop-box">
            <div class="navigation__drop-box-items">
                <a href="buypoints.php" class="flex-sbc">Donate <div class="navigation__drop-box-flag">Hot</div></a>
                <a href="shop.php" class="flex-sbc">Store</a>
            </div>
        </div>
    </div>
</div>

		<!-- end links -->
		<?php if (user_logged_in() === true): ?>
			<a href="myaccount.php" class="btn yellow flex-cc navigation__login"><span>ACCOUNT</span></a>
		<!-- button -->
		<?php else: ?>
		<a href="login_1.php" class="btn yellow flex-cc navigation__login"><span>LOGIN</span></a>
		<!-- end button -->
		<?php endif; ?>
		<!-- nav button -->
		<div class="navigation__nav-button flex-cc">
			<i class="fal fa-bars open"></i>
			<i class="fal fa-times cancel"></i>
		</div>
		
		<!-- end nav button -->
	</div>
</nav>
<!-- end navigation -->

<!-- mobile navigation -->
<div class="m-nav">
	<!-- links -->
	<div class="m-nav__links flex-cc">
		<a href="index.php" class="m-nav__link flex-sc"><span><i class="fa fa-external-link-square" aria-hidden="true"></i> HOME</span></a>
		<a href="downloads.php" class="m-nav__link flex-sc"><span><i class="fa fa-download" aria-hidden="true"></i>  DOWNLOAD</span></a>
		<div class="m-nav__link flex-sc">
			<span class="open-drop-box flex-ss"><i class="fa fa-book fa-xs"></i>LIBRARY</span><i class="fal fa-angle-down"></i>
			<div class="m-nav__drop-box drop-box">
				<div class="m-nav__drop-box-items">
				<a href="wiki.php" class="flex-sbc">Wikipedia </a>
						<a href="deaths.php" class="flex-sbc">Deaths </a>
						<a href="guilds.php" class="flex-sbc">Guilds</a>
						<a href="highscores.php" class="flex-sbc">Highscores</a>
						<a href="houses.php" class="flex-sbc">Houses</a>
						<a href="killers.php" class="flex-sbc">Killers</a>
						<a href="market.php" class="flex-sbc">Market</a>
						<a href="serverinfo.php" class="flex-sbc">Server Info</a>
				</div>
			</div>
		</div>
		<div class="m-nav__link flex-sc">
        <span class="open-drop-box"><i class="fa fa-book fa-xs"></i> MAP</span><i class="fal fa-angle-down"></i>
        <div class="navigation__drop-box drop-box">
            <div class="navigation__drop-box-items">
                <a href="map/interactive_map/" class="flex-sbc">Interactive Map</a>
            </div>
        </div>
    </div>
		<div class="m-nav__link flex-sc">
			<span class="open-drop-box flex-ss"><i class="fa fa-book fa-xs"></i>ACCOUNT</span><i class="fal fa-angle-down"></i>
			<div class="m-nav__drop-box drop-box">
				<div class="m-nav__drop-box-items">
				<a href="wiki.php" class="flex-sbc">Wikipedia </a>
				<a href="register.php" class="flex-sbc">Register</a>
						<a href="myaccount.php" class="flex-sbc">Account</a>
						<a href="helpdesk.php" class="flex-sbc">Contact us</a>
						<a href="support.php" class="flex-sbc">Support</a>
						<a href="forum.php" class="flex-sbc">Forum</a>
				</div>
			</div>
		</div>
		<div class="m-nav__link flex-sc">
			<span class="open-drop-box flex-ss"><i class="fa fa-book fa-xs"></i>STORE</span><i class="fal fa-angle-down"></i>
			<div class="m-nav__drop-box drop-box">
				<div class="m-nav__drop-box-items">
				<a href="wiki.php" class="flex-sbc">Wikipedia </a>
				<a href="buypoints.php" class="flex-sbc">Donate <div class="navigation__drop-box-flag">Hot</div></a>
						<a href="shop.php" class="flex-sbc">Store</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end links -->
	
	<!-- button -->
	<a href="register.php" class="btn yellow flex-cc m-nav__login"><span>REGISTER</span></a>
	<!-- end button -->
</div>
<div class="m-nav-bg"></div>
<!-- end mobile navigation -->

<!-- header -->
<header class="header">
	<div class="content-area flex-sc">
		<div class="header__content flex-sbc">
			<div class="header__info">
				<div class="header__info-flag">NEWS</div>
				<div class="header__info-title">Brand <font color="#ffc801">NEW Custom RPG Server</font>!</div>
				<div class="header__info-text"><b><font color="#f2e0c3">Modern Client</font> and improved features!</b></div>
				<div class="header__info-text"><b><font color="#ffc801">JUST OPENED!</font></b></div>
				<div class="header__info-text"><b><font color="#ffc801">Join Today an incredible experience:</font></b></div>
				<a href="register.php" class="btn yellow flex-cc header__info-button"><span>REGISTER</span></a>
			</div>

			<!-- servers -->
			
	<div class="servers flex-cc">
		
	<div class="servers__item flex-cc">
		<div class="servers__item-progress-bg" data-id-progress="1" data-online="1"></div>
		<div class="servers__item-info">
			<div class="servers__item-info-rate"><?php echo user_count_online();?></div>
			<div class="servers__item-info-name" style="font-size:14px"><b>Online</b></div>
			<div class="servers__item-info-status on">Players</div>
		</div>
	</div>

	<div class="servers__item flex-cc">
		<div class="servers__item-progress-bg" data-id-progress="2" data-online="1"></div>
		<div class="servers__item-info">
			<div class="servers__item-info-rate"><?php
            $cache = new Cache('engine/cache/topPlayer_home');
            if ($cache->hasExpired()) {
                $players = mysql_select_multi('SELECT `name`, `level`, `experience`, `looktype`, `lookaddons`, `lookhead`, `lookbody`, `looklegs`, `lookfeet` FROM `players` WHERE `group_id` < ' . $config['highscore']['ignoreGroupId'] . ' ORDER BY `experience` DESC LIMIT 1;');
                $cache->setContent($players);
                $cache->save();
            } else {
                $players = $cache->load();
            }
            if ($players) {
            $count = 1;
            foreach($players as $player) {
            echo '<img style="margin-top: -35px; margin-left: -35px;" src="http://localhost/outfits/animoutfit.php?id='.$player['looktype'].'&addons='.$player['lookaddons'].'&head='.$player['lookhead'].'&body='.$player['lookbody'].'&legs='.$player['looklegs'].'&feet='.$player['lookfeet'].'&g=0&h=3&i=1"></img> <a href="characterprofile.php?name='.$player['name'].'" style="color:white;font-size:10px"></a></strong><br>';
           $count++;
            }
            }
            ?></div>
			<div class="servers__item-info-name" style="color:orange;font-size:14px"><b><?php echo $data['bestPlayer']['name']; ?><br>&ensp;Level:&nbsp;<?php echo $data['bestPlayer']['level']; ?></b>
                </a> </div>
			<div class="servers__item-info-status">Top</div>
		</div>
	</div>

	<div class="servers__item flex-cc">
		<div class="servers__item-progress-bg" data-id-progress="3" data-online="0"></div>
		<div class="servers__item-info">
			<div class="servers__item-info-rate">New</div>
			<div class="servers__item-info-name">Updates</div>
			<div class="servers__item-info-status on" style="font-size:10px">Frequently</div>
		</div>
	</div>

	</div>

			<!-- end servers -->

		</div>
	</div>
</header>
<div class="home-content prevent-select">
			<div class="content-area flex-sbs">
				<!-- include:timeline.tpl -->
				<!-- content -->
<div class="main-content">