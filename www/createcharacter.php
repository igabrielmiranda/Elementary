<?php require_once 'engine/init.php';
protect_page();
include 'layout/overall/header.php';

if (empty($_POST) === false) {
	// $_POST['']
	$required_fields = array('name', 'selected_town');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'You need to fill in all fields.';
			break 1;
		}
	}

	// check errors (= user exist, pass long enough
	if (empty($errors) === true) {
		if (!Token::isValid($_POST['token'])) {
			$errors[] = 'Token is invalid.';
		}
		$_POST['name'] = validate_name($_POST['name']);
		if ($_POST['name'] === false) {
			$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Your name can not contain more than 2 words.</div></div>';
		} else {
			if (user_character_exist($_POST['name']) !== false) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Sorry, that character name already exist.</div></div>';
			}
			if (!preg_match("/^[a-zA-Z ]+$/", $_POST['name'])) {
				$errors[] = 'Your name may only contain a-z, A-Z and spaces.';
			}
			if (strlen($_POST['name']) < $config['minL'] || strlen($_POST['name']) > $config['maxL']) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Your character name must be between ' . $config['minL'] . ' - ' . $config['maxL'] . ' characters long.</div></div>';
			}
			// name restriction
			$resname = explode(" ", $_POST['name']);
			$username = $_POST['name'];
			foreach($resname as $res) {
				if(in_array(strtolower($res), $config['invalidNameTags'])) {
						$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Your username contains a restricted word.</div></div>';
				}
				if(strlen($res) == 1) {
					$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Too short words in your name.</div></div>';
				}
			}
			if(in_array(strtolower($username), $config['creatureNameTags'])) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Your username contains a creature name.</div></div>';
			}
			// Validate vocation id
			if (!in_array((int)$_POST['selected_vocation'], $config['available_vocations'])) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Permission Denied. Wrong vocation.</div></div>';
			}
			// Validate town id
			if (!in_array((int)$_POST['selected_town'], $config['available_towns'])) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Permission Denied. Wrong town.</div></div>';
			}
			// Validate gender id
			if (!in_array((int)$_POST['selected_gender'], array(0, 1))) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Permission Denied. Wrong gender.</div></div>';
			}
			if (vocation_id_to_name($_POST['selected_vocation']) === false) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Failed to recognize that vocation, does it exist?</div></div>';
			}
			if (town_id_to_name($_POST['selected_town']) === false) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Failed to recognize that town, does it exist?</div></div>';
			}
			if (gender_exist($_POST['selected_gender']) === false) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Failed to recognize that gender, does it exist?</div></div>';
			}
			// Char count
			$char_count = user_character_list_count($session_user_id);
			if ($char_count >= $config['max_characters'] && !is_admin($user_data)) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Your account is not allowed to have more than '. $config['max_characters'] .' characters.</div></div>';
			}
			if (validate_ip(getIP()) === false && $config['validate_IP'] === true) {
				$errors[] = '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Failed to recognize your IP address. (Not a valid IPv4 address).</div></div>';
			}
		}
	}
}
?>

<div class="donate-page__title" style="color:white">Create Character</div><br></br>
<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo '<div class="global-desc__content" style="width:100%;margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;padding-left:3px;padding-right:13px"><div class="desc-changelog__block flex-ss" style="">Congratulations! Your character has been created. See you in-game!&nbsp; <a href="myaccount.php">Back to your Account</a>.</div></div>';
} else {
	if (empty($_POST) === false && empty($errors) === true) {
		if ($config['log_ip']) {
			znote_visitor_insert_detailed_data(2);
		}
		//Register
		$character_data = array(
			'name'		=>	format_character_name($_POST['name']),
			'account_id'=>	$session_user_id,
			'vocation'	=>	$_POST['selected_vocation'],
			'town_id'	=>	$_POST['selected_town'],
			'sex'		=>	$_POST['selected_gender'],
			'lastip'	=>	getIPLong(),
			'created'	=>	time()
		);

		user_create_character($character_data);
		header('Location: createcharacter.php?success');
		exit();
		//End register

	} else if (empty($errors) === false){
		echo '<font color="red"><b>';
		echo output_errors($errors);
		echo '</b></font>';
	}
	?><center>
	<div class="donate-page__info">
	<div class="donate-page__content" id="donate_form">
	<div class="donate-page__title">Contact Us</div>
	<div class="global-form">
	<form action="" method="post">
		<ul>
			<div class="donate-page__desc">
				Name:<br>
				<input type="text" name="name">
			</div>
			<div class="donate-page__desc">
				<!-- Available vocations to select from when creating character -->
				Vocation:<br>
				<select name="selected_vocation">
				<?php foreach ($config['available_vocations'] as $id) { ?>
				<option value="<?php echo $id; ?>"><?php echo vocation_id_to_name($id); ?></option>
				<?php } ?>
				</select>
			</div>
			<div class="donate-page__desc">
				<!-- Available genders to select from when creating character -->
				Gender:<br>
				<select name="selected_gender">
				<option value="1">Male(boy)</option>
				<option value="0">Female(girl)</option>
				</select>
			</div>
			<?php
			$available_towns = $config['available_towns'];
			if (count($available_towns) > 1):
				?>
				<div class="donate-page__desc">
					<!-- Available towns to select from when creating character -->
					Town:<br>
					<select name="selected_town">
						<?php
						foreach ($available_towns as $tid):
							?>
							<option value="<?php echo $tid; ?>"><?php echo town_id_to_name($tid); ?></option>
							<?php
						endforeach;
						?>
					</select>
				</div>
				<?php
			else:
				?>
				<input type="hidden" name="selected_town" value="<?php echo end($available_towns); ?>">
				<?php
			endif;

			/* Form file */
			Token::create();
			?>
			<div class="donate-page__desc">
				<input type="submit" value="Create Character">
			</div>
		</ul>
	</form></div></div></center>
	<?php
}
include 'layout/overall/footer_login.php'; ?>
