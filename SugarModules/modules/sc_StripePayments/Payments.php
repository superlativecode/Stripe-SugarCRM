<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
* Comments go here
* Created By Superlative Code
* 1/20/2012
**/

//Require Files
require_once("modules/sc_StripePayments/lib/Stripe.php");
require_once("modules/sc_StripePayments/sc_StripePayments.php");
require_once('data/SugarBean.php');
require_once('modules/Accounts/Account.php');
require_once('modules/Leads/Lead.php');
require_once('modules/Contacts/Contact.php');

//Debug Code


class Payments  {
	/**
	* Definitions
	**/
	var $test_mode = true;
	var $_db;
	var $_bean;
	var $settings;
	var $focus_id;
	var $focus_type;
	var $payment_record_id;
	var $amount = false; //OPTIONAL
	/**
	* Methods
	**/
	
	public function __construct(){
		$this->_bean = new SugarBean();
		$this->_db = $this->_bean->db;
		$this->get_settings();
		Stripe::setApiKey($this->settings['secret_key']);
		if(isset($_REQUEST['focus_id'])){
			$this->focus_id = strtolower($_REQUEST['focus_id']);
		}
		if(isset($_REQUEST['focus_type'])){
			$this->focus_type = strtolower($_REQUEST['focus_type']);
		}
		if(strlen($this->settings['secret_key']) < 1 && strlen($this->settings['publishable_key']) < 1){
			die('You must configure StripePayments with Stripe Credentials.');
		}
		if(strpos($this->settings['secret_key'], '_test_') === false && empty($_SERVER['HTTPS'])){
			die('You must use SSL in Production Mode. Contact <a href="mailto:superlativecode@gmail.com" title="">Superlative Code</a> for questions.');
		}
	}
	
	/**
	* Public
	**/
	
	public function make_charge($data){
		// Use Stripe's bindings...
		try {
			if(isset($data['customer_id']) && strlen($data['customer_id']) > 5){
				var_dump($data['stripeToken']);
				die();
				if(isset($data['update_customer'])){
					$cu = Stripe_Customer::retrieve($data['customer_id']);
					$cu->card = $data['stripeToken'];
					$cu->save();
				}
				$_charge = Stripe_Charge::create(array('customer' => $data['customer_id'], 'amount' => $this->convert_to_cents($data['amount']), 'currency' => $this->settings['currency']));
			}else{
				$customer = Stripe_Customer::create(array(
		        	'card'     => $data['stripeToken']
		        ));
		        $_charge = Stripe_Charge::create(array('customer' => $customer->id, 'amount' => $this->convert_to_cents($data['amount']), 'currency' => $this->settings['currency']));
			}

		} catch(Stripe_CardError $e) {
		  // Since it's a decline, Stripe_CardError will be caught
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_Error $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Exception $e) {
		  // Something else happened, completely unrelated to Stripe
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		}

		
		$string = (string)$_charge;
		$charge = json_decode($string, true);
		//var_dump($charge);
		//die();
		$this->handle_response($charge);
		//Continue Here
		return $this->payment_record_id;
	}
	
	public function make_charge_without_customer($data){
		// Use Stripe's bindings...
		try {

			$_charge = Stripe_Charge::create(array('card' => $data['stripeToken'], 'amount' => $this->convert_to_cents($data['amount']), 'currency' => $this->settings['currency']));

		} catch(Stripe_CardError $e) {
		  // Since it's a decline, Stripe_CardError will be caught
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_Error $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Exception $e) {
		  // Something else happened, completely unrelated to Stripe
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		}

		
		$string = (string)$_charge;
		$charge = json_decode($string, true);
		//var_dump($charge);
		//die();
		$this->handle_response($charge);
		//Continue Here
		return $this->payment_record_id;
	}
	
	public function refund_charge($token){
		// Use Stripe's bindings...
		try {

			$_charge = Stripe_Charge::retrieve($token);

		} catch(Stripe_CardError $e) {
		  // Since it's a decline, Stripe_CardError will be caught
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_Error $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Exception $e) {
		  // Something else happened, completely unrelated to Stripe
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		}

		$_charge->refund();
		$string = (string)$_charge;
		$charge = json_decode($string);
		if($charge->refunded){
			$sp = new sc_StripePayments();
			$sp->retrieve_by_string_fields(array('stripe_id' => $token));
			$sp->name = $sp->name . ' {REFUNDED}';
			$sp->refunded = 1;
			$sp->amount_refunded = $this->convert_cents_to_currency($charge->amount);
			$sp->save();
		}else{
			return array('success' => false, 'code' => '12', 'message' => 'Charge Not Refunded');
		}
		//Continue Here
		return $sp->id;
	}

	
	public function create_charge_api($focus_type, $focus_id, $stripe_token, $amount){
		$this->focus_type = $focus_type;
		$this->focus_id = $focus_id;
		try {

			$_charge = Stripe_Charge::create(array('card' => $stripe_token, 'amount' => $this->convert_to_cents($amount), 'currency' => $this->settings['currency']));

		} catch(Stripe_CardError $e) {
		  // Since it's a decline, Stripe_CardError will be caught
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_Error $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Exception $e) {
		  // Something else happened, completely unrelated to Stripe
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		}
		//die();
		$string = (string)$_charge;
		$charge = json_decode($string, true);
		return array( 'success' => $this->handle_response($charge), 'message' => true );
	}
	
	public function retrieve_api($focus_type, $focus_id, $stripe_token, $amount){
		$this->focus_type = $focus_type;
		$this->focus_id = $focus_id;
		$this->amount = $amount;
		try {

			$_charge = Stripe_Charge::retrieve($stripe_token);

		} catch(Stripe_CardError $e) {
		  // Since it's a decline, Stripe_CardError will be caught
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_Error $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Exception $e) {
		  // Something else happened, completely unrelated to Stripe
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		}
		$string = (string)$_charge;
		$charge = json_decode($string, true);
		return array( 'success' => $this->handle_response($charge), 'message' => true );
	}

	
	/**
	* Private
	**/
	
	//TODO
	private function handle_response($charge){
		require_once("modules/sc_StripePayments/ResponseMap.php");
		//CONVERT RESPONSE TO SUGAR FIELDS
		$data = array();
		foreach($charge as $key => $val){
			if($key == 'fee_details'){
				foreach($val[0] as $subkey => $subval){
					if(isset($map[$key . '.' . $subkey])){
						$new_val = $map[$key . '.' . $subkey]['name'];
						$convert_function = $map[$key . '.' . $subkey]['convert_function'];
						if($convert_function !== false && method_exists($this, $convert_function)){
							$data[$new_val] = $this->$convert_function($subval);
						}else{
							$data[$new_val] = $subval;
						}	
					}
				}
			}else if(is_array($val)){
				foreach($val as $subkey => $subval){
					if(isset($map[$key . '.' . $subkey])){
						$new_val = $map[$key . '.' . $subkey]['name'];
						$convert_function = $map[$key . '.' . $subkey]['convert_function'];
						if($convert_function !== false && method_exists($this, $convert_function)){
							$data[$new_val] = $this->$convert_function($subval);
						}else{
							$data[$new_val] = $subval;
						}	
					}
				}
			}else{
				if(isset($map[$key])){
					$new_val = $map[$key]['name'];
					$convert_function = $map[$key]['convert_function'];
					if($convert_function !== false && method_exists($this, $convert_function)){
						$data[$new_val] = $this->$convert_function($val);
					}else{
						$data[$new_val] = $val;
					}	
				}
			}
		}
		$this->save_to_sugar($data);
		return true;
	}
	
	public function retrieve_customer($customer_id){
		try {

			$_customer = Stripe_Customer::retrieve($customer_id);

		} catch(Stripe_CardError $e) {
		  // Since it's a decline, Stripe_CardError will be caught
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Stripe_Error $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		} catch (Exception $e) {
		  // Something else happened, completely unrelated to Stripe
		  $body = $e->getJsonBody();
		  $err  = $body['error'];
		  return array('success' => false, 'code' => '0', 'message' => $err['message']);
		}
		$customer = json_decode((string) $_customer, true);
		return $customer;
	}
	
	private function save_to_sugar($data){
		//USE CONVERTED RESPONSE TO SAVE TO NEW StipePayment Bean
		$sp = new sc_StripePayments();
		$sp->name = 'Payment ' . $data['stripe_id'];
		foreach($data as $field => $value){
			if(!is_null($value) && !empty($value) && property_exists($sp, $field)){
				$sp->{$field} = $value;
			}else{
			}
		}
		if($this->amount !== false){
			//$sp->amount = $this->amount;
		}
		$sp->save();
		$this->payment_record_id = $sp->id;
		if($rel_table = $this->get_rel_table()){
			$sp->load_relationship($rel_table);
			$sp->{$rel_table}->add($this->focus_id);
		}
		ini_set('display_errors', '1');
		
		$focus_name = rtrim(ucfirst($this->focus_type), 's');

		$focus = new $focus_name();
		$focus->retrieve($this->focus_id);
		$focus->stripe_customer_id_c = (string)$data['customer'];
		$focus->save();
		return true;
	}
	
	private function get_rel_table(){
		switch(strtolower($this->focus_type)){
			case 'accounts':
				return 'sc_stripepayments_accounts';
			case 'contacts':
				return 'sc_stripepayments_contacts';
			case 'leads':
				return 'sc_stripepayments_leads';
			default:
			 	return false;		
		}
	}
	
	private function get_settings(){
		$json = file_get_contents('modules/sc_StripePayments/config.php');
		$this->settings = json_decode($json, true);
	}
	
	private function get_settings_db(){
		$sql = trim("
			SELECT
				*
			FROM
				config
			WHERE
				name LIKE 'sc_%'
				AND
				category LIKE 'Stripe'	
		");
		$results = $this->_db->query($sql);
		$settings = array();
		while($row = $this->_db->fetchByAssoc($results)){
			$key = str_ireplace('sc_', '', $row['name']);
			$settings[] = $row['value'];
		}
		return $this->settings = $settings;
	}
	
	//Converts SugarBean MySQL Results to an Array
	private function convert_results_to_array($results){
		$data = array();
		while($row = $this->_db->fetchByAssoc($results)){
			$data[] = $row;
		}
		return $data;
	}
	
	private function convert_to_cents($str){
		$float = (float) preg_replace('/[^0-9.]/', '', $str);
		$cents = round($float * 100);
		return $cents;
	}
	
	private function convert_cents_to_currency($cents){
		$float = (float) $cents;
		$cur = round($float / 100, 2);
		return $cur;
	}
}


?>