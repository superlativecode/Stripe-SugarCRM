<?php
$module_name = 'sc_StripePayments';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'CC_ADDRESS_POSTALCODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CC_ADDRESS_POSTALCODE',
    'width' => '10%',
    'default' => true,
  ),
  'CC_LAST_FOUR' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CC_LAST_FOUR',
    'width' => '10%',
    'default' => true,
  ),
  'STRIPE_CREATED_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_STRIPE_CREATED_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
