<?php

require_once('modules/sc_StripePayments/Payments.php'); 

if(isset($_GET['method']) && $_GET['method'] == 'refund' && !empty($_GET['token'])){
	refund_charge();
}else{
	process_form();
}
  
function process_form(){
	
	$payments = new Payments();
	$data = $_POST;
	$record_id = $payments->make_charge($data);
	//die($record_id);
	if(!is_array($record_id)){
		header('Location: index.php?module=sc_StripePayments&action=DetailView&record='.$record_id);
		die();
	}else{
		die($record_id['message']);
	}
	
}

function refund_charge(){
	$payments = new Payments();
	$token = $_GET['token'];
	$record_id = $payments->refund_charge($token);
	//die($record_id);
	if(!is_array($record_id)){
		header('Location: index.php?module=sc_StripePayments&action=DetailView&record='.$record_id);
		die();
	}else{
		die($record_id['message']);
	}

}

?>