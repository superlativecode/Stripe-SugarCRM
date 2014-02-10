<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

if(isset($_POST['submit_config'])){

	$data = array(
		'publishable_key' => $_POST['publishable_key'], 
		'secret_key' => $_POST['secret_key'], 
		'currency' => $_POST['currency']
	);
	file_put_contents('modules/sc_StripePayments/config.php', json_encode($data));
	$response = "Successfully Set Config Items";
}else{
	$response = '';
}

$json = file_get_contents('modules/sc_StripePayments/config.php');
$settings = json_decode($json, true);

?>
<br />
<br />
<div align="center">
	<h1>Set Stripe Configutation</h1>
	<span style="color: green; font-size: 18px;"><?php echo $response ?></span>
	<form action="index.php?module=sc_StripePayments&action=config_action" method="POST">
		<p><label for="publishable_key">Publishable Key</label></p>
		<p><input type="text" name="publishable_key" id="publishable_key" value="<?php if(isset($settings['publishable_key'])): echo $settings['publishable_key']; else: echo ""; endif; ?>" style="width: 300px;" /></p>
		<p><label for="secret_key">Secret Key</label></p>
		<p><input type="text" name="secret_key" id="secret_key" value="<?php if(isset($settings['secret_key'])): echo $settings['secret_key']; else: echo ""; endif; ?>" style="width: 300px;" /></p>
		<p><label for="currency">Currency:  (3-letter ISO currency code) </label></p>
		<p><input type="text" name="currency" id="currency" value="<?php if(isset($settings['currency'])): echo $settings['currency']; else: echo "usd"; endif; ?>" style="width: 50px;" /></p>
		<p><input type="submit" value="Set Config Items" name="submit_config" /></p>
	</form>
</div>