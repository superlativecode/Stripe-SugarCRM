<?php 
$obj = new RecordData();
if(isset($_REQUEST['method']) && $_REQUEST['method'] == 'get_data'){
	$obj->get_data();
}

class RecordData  {

	var $_db;
	var $_bean;

	var $focus_id;
	var $focus_type;
	
	
	public function __construct(){
		$this->_bean = new SugarBean();
		$this->_db = $this->_bean->db;
		$this->focus_id = strtolower($_REQUEST['focus_id']);
		$this->focus_type = strtolower($_REQUEST['focus_type']);
	}
	
	public function get_data(){
		$data = array();
		
				
		if($this->focus_type == 'accounts'){
			require_once('modules/Accounts/Account.php');
			$acc = new Account();
			$acc->retrieve($this->focus_id);
			$data[] = array(
				'name' => 'address_line1',
				'value' => $acc->billing_address_street
			);	
			$data[] = array(
				'name' => 'address_zip',
				'value' => $acc->billing_address_postalcode
			);	
			$data[] = array(
				'name' => 'address_state',
				'value' => $acc->billing_address_state
			);	
			$data[] = array(
				'name' => 'address_country',
				'value' => $acc->billing_address_country
			);
			$data[] = array(
				'name' => 'address_city',
				'value' => $acc->billing_address_city
			);	
			$data[] = array(
				'name' => 'customer_id',
				'value' => $acc->stripe_customer_id_c
			);
			$customer_id = $acc->stripe_customer_id_c;
		}else if($this->focus_type == 'leads'){
			require_once('modules/Leads/Lead.php');
			$lead = new Lead();
			$lead->retrieve($this->focus_id);
			$data[] = array(
				'name' => 'address_line1',
				'value' => $lead->primary_address_street
			);	
			$data[] = array(
				'name' => 'address_zip',
				'value' => $lead->primary_address_postalcode
			);	
			$data[] = array(
				'name' => 'address_state',
				'value' => $lead->primary_address_state
			);	
			$data[] = array(
				'name' => 'address_country',
				'value' =>  $lead->primary_address_country
			);
			$data[] = array(
				'name' => 'address_city',
				'value' =>  $lead->primary_address_city
			);
			$data[] = array(
				'name' => 'customer_id',
				'value' => $lead->stripe_customer_id_c
			);
			$customer_id = $lead->stripe_customer_id_c;
		}else if($this->focus_type == 'contacts'){
			require_once('modules/Contacts/Contact.php');
			$con = new Contact();
			$con->retrieve($this->focus_id);
			$data[] = array(
				'name' => 'address_line1',
				'value' => $con->primary_address_street
			);	
			$data[] = array(
				'name' => 'address_zip',
				'value' => $con->primary_address_postalcode
			);	
			$data[] = array(
				'name' => 'address_state',
				'value' => $con->primary_address_state
			);	
			$data[] = array(
				'name' => 'address_country',
				'value' =>  $con->primary_address_country
			);
			$data[] = array(
				'name' => 'address_city',
				'value' =>  $con->primary_address_city
			);
			$data[] = array(
				'name' => 'customer_id',
				'value' => $con->stripe_customer_id_c
			);
			$customer_id = $con->stripe_customer_id_c;
		}
		if(!empty($customer_id) && (isset($_GET['use_customer']) && $_GET['use_customer'] == '1') ){
			
			require_once('modules/sc_StripePayments/Payments.php'); 
			
			$payments = new Payments();
			$customer = $payments->retrieve_customer($customer_id);
			if(is_array($customer) && count($customer) > 0){
				$data = array();
				$data[] = array(
					'name' => 'address_line1',
					'value' => $customer['active_card']['address_line1']
				);	
				$data[] = array(
					'name' => 'address_zip',
					'value' => $customer['active_card']['address_zip']
				);	
				$data[] = array(
					'name' => 'address_state',
					'value' => $customer['active_card']['address_state']
				);	
				$data[] = array(
					'name' => 'address_country',
					'value' => $customer['active_card']['address_country']
				);
				$data[] = array(
					'name' => 'address_city',
					'value' => $customer['active_card']['address_city']
				);
				$data[] = array(
					'name' => 'cc_exp_month',
					'value' => $customer['active_card']['exp_month']
				);
				$data[] = array(
					'name' => 'cc_exp_year',
					'value' => ltrim($customer['active_card']['exp_year'], '20')
				);	
				$data[] = array(
					'name' => 'cc_name',
					'value' => $customer['active_card']['name']
				);
				$data[] = array(
					'name' => 'cc_number',
					'value' => '**** **** **** ' . $customer['active_card']['last4']
				);
				$data[] = array(
					'name' => 'use_customer',
					'value' => 'checked'
				);
				$data[] = array(
					'name' => 'customer_id',
					'value' => $customer_id
				);
	
				echo json_encode($data);
				die();
			}
	
		}else{
			$data[] = array(
				'name' => 'use_customer',
				'value' => false
			);
		}
		echo json_encode($data);
		die();
	}
}


?>