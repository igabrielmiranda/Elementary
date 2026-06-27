<?php require_once 'engine/init.php';
protect_page();
include 'layout/overall/header.php';

// Import from config:
$pagseguro = $config['pagseguro'];
$paypal = $config['paypal'];
$prices = $config['paypal_prices'];

if ($paypal['enabled']) {
?>

<div class="donate-page__title" style="color:white">Donations</div><br></br>
<div class="donate-page__bonuses flex-sbs" style="width:100%;justify-content:start">

<?php
foreach ($prices as $price => $points) {
?>
    <div class="donate-page__bonuses-item dgrade">
        <div class="donate-page__bonuses-icon flex-cc"></div>
        <div class="donate-page__bonuses-title flex-cc">Price: <?php echo $price . '(' . $paypal['currency'] . ')'; ?></div>
        <div class="donate-page__bonuses-title flex-cc">Points: <?php echo $points; ?></div>
        <div class="donate-page__bonuses-text">
            When purchasing from <span><?php echo $price . '(' . $paypal['currency'] . ')'; ?></span> or more in a single payment, you will receive <span><?php
            if ($paypal['showBonus']) {
                echo  calculate_discount(($paypal['points_per_currency'] * $price), $points); // Modify this line as needed for bonus calculation
            }
            ?></span> bonus points. They will be automatically credited to the account!
        </div>
        <div class="donate-page__bonuses-percent">
            <?php
            if ($paypal['showBonus']) {
                echo  calculate_discount(($paypal['points_per_currency'] * $price), $points); // Modify this line as needed for bonus calculation
            }
            ?>
        </div>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="POST">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="<?php echo hhb_tohtml($paypal['email']); ?>">
            <input type="hidden" name="item_name" value="<?php echo $points .' shop points on '. hhb_tohtml($config['site_title']); ?>">
            <input type="hidden" name="item_number" value="1">
            <input type="hidden" name="amount" value="<?php echo $price; ?>">
            <!-- Add other PayPal input fields here -->
            <button type="submit" value="  PURCHASE  " class="btn yellow flex-cc header__info-button" style="right:10px;z-index: 7;">Purchase</button>
        </form>
    </div>
<?php
}
?>
</div>
<?php } ?>

<?php
if ($config['pagseguro']['enabled'] == true) {
?>
	<h2>Buy points using Pagseguro:</h2>
	<form target="pagseguro" action="https://<?=hhb_tohtml($pagseguro['urls']['www'])?>/checkout/checkout.jhtml" method="post">
		<input type="hidden" name="email_cobranca" value="<?=hhb_tohtml($pagseguro['email'])?>">
		<input type="hidden" name="tipo" value="CP">
		<input type="hidden" name="moeda" value="<?=hhb_tohtml($pagseguro['currency'])?>">
		<input type="hidden" name="ref_transacao" value="<?php echo (int)$session_user_id; ?>">
		<input type="hidden" name="item_id_1" value="1">
		<input type="hidden" name="item_descr_1" value="<?=hhb_tohtml($pagseguro['product_name'])?>">
		<input type="number" name="item_quant_1" min="1" step="4" value="1">
		<input type="hidden" name="item_peso_1" value="0">
		<input type="hidden" name="item_valor_1" value="<?=$pagseguro['price']?>">
		<input type="submit" value="  PURCHASE  ">
	</form>
	<br>
<?php } ?>

<?php
if ($config['paygol']['enabled'] == true) {
?>
<!-- PayGol Form using Post method -->
<h2>Buy points using Paygol:</h2>
<?php $paygol = $config['paygol']; ?>
<p><?php echo $paygol['price'] ." ". hhb_tohtml($paygol['currency']) ."~ for ". $paygol['points'] ." points:"; ?></p>
<form name="pg_frm" method="post" action="http://www.paygol.com/micropayment/paynow" >
	<input type="hidden" name="pg_serviceid" value="<?php echo hhb_tohtml($paygol['serviceID']); ?>">
	<input type="hidden" name="pg_currency" value="<?php echo hhb_tohtml($paygol['currency']); ?>">
	<input type="hidden" name="pg_name" value="<?php echo hhb_tohtml($paygol['name']); ?>">
	<input type="hidden" name="pg_custom" value="<?php echo hhb_tohtml($session_user_id); ?>">
	<input type="hidden" name="pg_price" value="<?php echo $paygol['price']; ?>">
	<input type="hidden" name="pg_return_url" value="<?php echo hhb_tohtml($paygol['returnURL']); ?>">
	<input type="hidden" name="pg_cancel_url" value="<?php echo hhb_tohtml($paygol['cancelURL']); ?>">
	<input type="image" name="pg_button" src="https://www.paygol.com/micropayment/img/buttons/150/black_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!">
</form>

<?php }

if (!$config['paypal']['enabled'] && !$config['paygol']['enabled'] && !$config['pagseguro']['enabled']) echo '<h1>Buy Points system disabled.</h1><p>Sorry, this functionality is disabled.</p>';
include 'layout/overall/footer_login.php'; ?>
