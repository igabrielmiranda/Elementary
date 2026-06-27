<?php require_once 'engine/init.php'; include 'layout/overall/header.php';

if ($config['log_ip']) {
	znote_visitor_insert_detailed_data(3);
}

// Fetch highscore type
$type = (isset($_GET['type'])) ? (int)getValue($_GET['type']) : 7;
if ($type > 9) $type = 7;

// Fetch highscore vocation
$configVocations = $config['vocations'];
//$debug['configVocations'] = $configVocations;

$vocationIds = array_keys($configVocations);

$vocation = 'all';
if (isset($_GET['vocation']) && is_numeric($_GET['vocation'])) {
	$vocation = (int)$_GET['vocation'];
	if (!in_array($vocation, $vocationIds)) {
		$vocation = "all";
	}
}

// Fetch highscore page
$page = getValue(@$_GET['page']);
if (!$page || $page == 0) $page = 1;
else $page = (int)$page;

$highscore = $config['highscore'];
$loadFlags = ($config['country_flags']['enabled'] && $config['country_flags']['highscores']) ? true : false;
$loadOutfits = ($config['show_outfits']['highscores']) ? true : false;

$rows = $highscore['rows'];
$rowsPerPage = $highscore['rowsPerPage'];

function skillName($type) {
	$types = array(
		1 => "Club",
		2 => "Sword",
		3 => "Axe",
		4 => "Distance",
		5 => "Shield",
		6 => "Fish",
		7 => "Experience", // Hardcoded
		8 => "Magic Level", // Hardcoded
		9 => "Fist", // Since 0 returns false I will make 9 = 0. :)
	);
	return $types[(int)$type];
}

function pageCheck($index, $page, $rowPerPage) {
	return ($index < ($page * $rowPerPage) && $index >= ($page * $rowPerPage) - $rowPerPage) ? true : false;
}

$cache = new Cache('engine/cache/highscores');
if ($cache->hasExpired()) {
	$vocGroups = fetchAllScores($rows, $config['ServerEngine'], $highscore['ignoreGroupId'], $configVocations, $vocation, $loadFlags, $loadOutfits);
	$cache->setContent($vocGroups);
	$cache->save();
} else {
	$vocGroups = $cache->load();
}

if ($vocGroups) {
	$vocGroup = (is_array($vocGroups[$vocation])) ? $vocGroups[$vocation] : $vocGroups[$vocGroups[$vocation]];
	?>
<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:3px"><div class="desc-changelog__block flex-ss" style="">
<div style="margin-left:auto;margin-right:auto">
<div class="donate-page__title" style="color:white">Ranking for <?php echo skillName($type) .", ". (($vocation === 'all') ? 'any vocation' : vocation_id_to_name($vocation)) ?>.</div>
<br></br>
	<div>
	<form action="" method="GET">
        <center>
		<select style="font-size:18px;color:white;background: rgba(14, 9, 8, 0.9);border: 1px solid #2d1f1e;" name="type">
			<option value="7" <?php if ($type == 7) echo "selected"; ?>>Experience</option>
			<option value="8" <?php if ($type == 8) echo "selected"; ?>>Magic</option>
			<option value="5" <?php if ($type == 5) echo "selected"; ?>>Shield</option>
			<option value="2" <?php if ($type == 2) echo "selected"; ?>>Sword</option>
			<option value="1" <?php if ($type == 1) echo "selected"; ?>>Club</option>
			<option value="3" <?php if ($type == 3) echo "selected"; ?>>Axe</option>
			<option value="4" <?php if ($type == 4) echo "selected"; ?>>Distance</option>
			<option value="6" <?php if ($type == 6) echo "selected"; ?>>Fish</option>
			<option value="9" <?php if ($type == 9) echo "selected"; ?>>Fist</option>
		</select>

		<select style="font-size:18px;color:white;background: rgba(14, 9, 8, 0.9);border: 1px solid #2d1f1e;" name="vocation">
			<option value="all" <?php if (!is_int($vocation)) echo "selected"; ?>>Any vocation</option>
			<?php
			foreach ($configVocations as $v_id => $v_data) {
				if ($v_data['fromVoc'] === false) {
					$selected = (is_int($vocation) && $vocation == $v_id) ? " selected $vocation = $v_id" : "";
					echo '<option value="'. $v_id .'"'. $selected .'>'. $v_data['name'] .'</option>';
				}
			}
			?>
		</select>

		<select style="font-size:18px;color:white;background: rgba(14, 9, 8, 0.9);border: 1px solid #2d1f1e;" name="page">
			<?php
			$pages = ($vocGroup[$type] !== false) ? ceil(min(($highscore['rows'] / $highscore['rowsPerPage']), (count($vocGroup[$type]) / $highscore['rowsPerPage']))) : 1;
			for ($i = 0; $i < $pages; $i++) {
				$x = $i + 1;
				if ($x == $page) echo "<option value='".$x."' selected>Page: ".$x."</option>";
				else echo "<option value='".$x."'>Page: ".$x."</option>";
			}
			?>
		</select></center></div>
			<center>
		<button type="submit" value=" View " class="btn yellow flex-cc header__info-button">View</button></center>
	</form></div></div></div>
	<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:3px"><div class="desc-changelog__block flex-ss" style="">
	<div style="margin-left:auto;margin-right:auto">
	<table id="highscoresTable" class="table table-striped table-hover">

		<tr class="yellow">
			<?php if ($loadOutfits) echo "<td><div class='donate-page__bonuses-title flex-cc' style='padding-left:50px'>Outfit</div></td>"; ?>
			<td><div class="donate-page__bonuses-title flex-cc" style="padding-left:28px">Rank</div></td>
			<td><div class="donate-page__bonuses-title flex-cc" style="padding-left:40px">Name</div></td>
			<td><div class="donate-page__bonuses-title flex-cc" style="padding-left:60px">Vocation</div></td>
			<td><div class="donate-page__bonuses-title flex-cc" style="padding-left:80px">Level</div></td>
			<?php if ($type === 7) echo "<td><div class='donate-page__bonuses-title flex-cc' style='padding-left:100px'>Points</div></td>"; ?>
		</tr>

		<?php
		if ($vocGroup[$type] === false) {
			?>
			<tr>
				<td colspan="5">Nothing to show here yet.</td>
			</tr>
			<?php
		} else {
			for ($i = 0; $i < count($vocGroup[$type]); $i++) {
				if (pageCheck($i, $page, $rowsPerPage)) {
					$flag = ($loadFlags === true && strlen($vocGroup[$type][$i]['flag']) > 1) ? '<img src="' . $config['country_flags']['server'] . '/' . $vocGroup[$type][$i]['flag'] . '.png">  ' : '';
					?>
					<tr>
						<?php if ($loadOutfits): ?>
							<td class="outfitColumn"><div class="donate-page__bonuses-title flex-cc" style="padding-left:20px;margin-top:5px"><img src="<?php echo $config['show_outfits']['imageServer']; ?>?id=<?php echo $vocGroup[$type][$i]['type']; ?>&addons=<?php echo $vocGroup[$type][$i]['addons']; ?>&head=<?php echo $vocGroup[$type][$i]['head']; ?>&body=<?php echo $vocGroup[$type][$i]['body']; ?>&legs=<?php echo $vocGroup[$type][$i]['legs']; ?>&feet=<?php echo $vocGroup[$type][$i]['feet']; ?>" alt="img"></div></td>
						<?php endif; ?>
						<td><div class="donate-page__bonuses-title flex-cc" style="padding-left:20px"><?php echo $i+1; ?></div></td>
						<td><div class="donate-page__bonuses-title flex-cc" style="padding-left:40px"><?php echo $flag; ?><a href="characterprofile.php?name=<?php echo $vocGroup[$type][$i]['name']; ?>"><?php echo $vocGroup[$type][$i]['name']; ?></a></div></td>
						<td><div class="donate-page__bonuses-title flex-cc" style="padding-left:60px"><?php echo vocation_id_to_name($vocGroup[$type][$i]['vocation']); ?></div></td>
						<td><div class="donate-page__bonuses-title flex-cc" style="padding-left:80px"><?php echo $vocGroup[$type][$i]['value']; ?></div></td>
						<?php if ($type === 7) echo "<td><div class='donate-page__bonuses-title flex-cc' style='padding-left:100px'>". $vocGroup[$type][$i]['experience'] ."</div></td>"; ?>
					</tr>
					<?php
				}
			}
		}
		?>
	</table><br></br></div></div></div>
	<?php
}
include 'layout/overall/footer_login.php'; ?>
