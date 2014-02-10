<?php

$map = array(
	'id' => array(
		'name' => 'stripe_id',
		'convert_function' => false
	),
	'object' => array(
		'name' => 'stripe_object',
		'convert_function' => false
	),
	'livemode' => array(
		'name' => 'livemode',
		'convert_function' => false
	),
	'amount' => array(
		'name' => 'amount',
		'convert_function' => 'convert_cents_to_currency'
	),
	'card.object' => array(
		'name' => 'cc_object',
		'convert_function' => false
	),
	'card.exp_month' => array(
		'name' => 'cc_exp_month',
		'convert_function' => false
	),
	'card.exp_year' => array(
		'name' => 'cc_exp_year',
		'convert_function' => false
	),
	'card.fingerprint' => array(
		'name' => 'cc_fingerprint',
		'convert_function' => false
	),
	'card.last4' => array(
		'name' => 'cc_last_four',
		'convert_function' => false
	),
	'card.type' => array(
		'name' => 'cc_type',
		'convert_function' => false
	),
	'card.address_city' => array(
		'name' => 'cc_address_city',
		'convert_function' => false
	),
	'card.address_country' => array(
		'name' => 'cc_address_country',
		'convert_function' => false
	),
	'card.address_line1' => array(
		'name' => 'cc_address',
		'convert_function' => false
	),
	'card.address_line1_check' => array(
		'name' => 'cc_address_street_check',
		'convert_function' => false
	),
	'card.address_state' => array(
		'name' => 'cc_address_state',
		'convert_function' => false
	),
	'card.address_zip_check' => array(
		'name' => 'cc_address_zip_check',
		'convert_function' => false
	),
	//TODO
	'card.country' => array(
		'name' => 'cc_country',
		'convert_function' => false
	),
	'card.cvc_check' => array(
		'name' => 'cc_cvc_check',
		'convert_function' => false
	),
	'card.name' => array(
		'name' => 'cc_name',
		'convert_function' => false
	),
	'created' => array(
		'name' => 'stripe_created_date',
		'convert_function' => 'convert_timestamp_to_date'
	),
	'currency' => array(
		'name' => 'currency',
		'convert_function' => false
	),
	'fee_details.amount' => array(
		'name' => 'fee_amount',
		'convert_function' => 'convert_cents_to_currency'
	),
	'fee_details.currency' => array(
		'name' => 'fee_currency',
		'convert_function' => false
	),
	'fee_details.type' => array(
		'name' => 'fee_type',
		'convert_function' => false
	),
	'fee_details.application' => array(
		'name' => 'fee_application',
		'convert_function' => false
	),
	'fee_details.description' => array(
		'name' => 'fee_description',
		'convert_function' => false
	),
	'paid' => array(
		'name' => 'paid',
		'convert_function' => 'convert_boolean'
	),
	'refunded' => array(
		'name' => 'refunded',
		'convert_function' => 'convert_boolean'
	),
	'amount_refunded' => array(
		'name' => 'amount_refunded',
		'convert_function' => 'convert_cents_to_currency'
	),
	'customer' => array(
		'name' => 'customer',
		'convert_function' => false
	),
	//'dispute' => array(
	//	'name' => 'dispute',
	//	'convert_function' => false
	//),
	'failure_message' => array(
		'name' => 'failure_message',
		'convert_function' => false
	),
	'invoice' => array(
		'name' => 'invoice',
		'convert_function' => false
	),
);


function get_map(){
	global $map;
	return $map;
}
?>