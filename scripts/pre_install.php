<?php

function pre_install(){
	
	require_once('data/SugarBean.php');
	$focus = new SugarBean();
	
	$query = "SHOW TABLES LIKE 'accounts_cstm'";
	$results = $focus->db->query($query, true);
	while($row = $focus->db->fetchByAssoc($results)){
		$_query = "SHOW COLUMNS FROM `accounts_cstm`";
		$_results = $focus->db->query($_query, true);
		while($_row = $focus->db->fetchByAssoc($_results)){
			if($_row['Field'] == 'stripe_customer_id_c'){
				$query2 = "ALTER TABLE  `accounts_cstm` DROP  `stripe_customer_id_c`";
				$focus->db->query($query2, true);
				$query3 = "DELETE FROM `fields_meta_data` WHERE `fields_meta_data`.`id` = 'Accountsstripe_customer_id_c'";
				$focus->db->query($query3);
			}
		}	
	}
	$query = "SHOW TABLES LIKE 'contacts_cstm'";
	$results = $focus->db->query($query, true);
	while($row = $focus->db->fetchByAssoc($results)){
		$_query = "SHOW COLUMNS FROM `contacts_cstm`";
		$_results = $focus->db->query($_query, true);
		while($_row = $focus->db->fetchByAssoc($_results)){
			if($_row['Field'] == 'stripe_customer_id_c'){
				$query2 = "ALTER TABLE  `contacts_cstm` DROP  `stripe_customer_id_c`";
				$focus->db->query($query2, true);
				$query3 = "DELETE FROM `fields_meta_data` WHERE `fields_meta_data`.`id` = 'Contactsstripe_customer_id_c'";
				$focus->db->query($query3);
			}
		}	
	}
	$query = "SHOW TABLES LIKE 'leads_cstm'";
	$results = $focus->db->query($query, true);
	while($row = $focus->db->fetchByAssoc($results)){
		$_query = "SHOW COLUMNS FROM `leads_cstm`";
		$_results = $focus->db->query($_query, true);
		while($_row = $focus->db->fetchByAssoc($_results)){
			if($_row['Field'] == 'stripe_customer_id_c'){
				$query2 = "ALTER TABLE  `leads_cstm` DROP  `stripe_customer_id_c`";
				$focus->db->query($query2, true);
				$query3 = "DELETE FROM `fields_meta_data` WHERE `fields_meta_data`.`id` = 'Leadsstripe_customer_id_c'";
				$focus->db->query($query3);
			}
		}	
	}
	
}

?>