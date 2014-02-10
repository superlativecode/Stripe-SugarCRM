<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $mod_strings, $app_strings, $sugar_config;
$module_menu = Array();
/*
if(ACLController::checkAccess('sc_StripePayments','edit',true)){
	$module_menu[]=	Array("index.php?module=sc_StripePayments&action=EditView&return_module=sc_StripePayments&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"sc_StripePayments");
}
*/
if(ACLController::checkAccess('sc_StripePayments','list',true)){
	$module_menu[]=	Array("index.php?module=sc_StripePayments&action=index&return_module=sc_StripePayments&return_action=DetailView", $mod_strings['LNK_LIST'],"sc_StripePayments");
}
$module_menu[]=  Array("index.php?module=sc_StripePayments&action=config_action", $mod_strings['LNK_CONFIG'],"sc_StripePayments");

?>