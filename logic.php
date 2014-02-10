<?php

class SugarLogic {
  
	function add_action_button(){
		if($GLOBALS['app']->controller->action == 'DetailView'){
			$json = file_get_contents('modules/sc_StripePayments/config.php');
			$settings = json_decode($json, true);
			$button_code = "
				<link rel='stylesheet' href='modules/sc_StripePayments/payment_form.css?v=".time()."'/>
				<script type=\"text/javascript\" src=\"https://js.stripe.com/v1/\"></script>
				<script type=\"text/javascript\">Stripe.setPublishableKey('".$settings['publishable_key']."');</script>
				<script type=\"text/javascript\" src=\"modules/sc_StripePayments/payment_form.js?v=".time()."\"></script>
			";
			echo $button_code;
		}
	}
	
}

?>