<?php
 // created: 2013-03-04 16:34:56
$layout_defs["Accounts"]["subpanel_setup"]['sc_stripepayments_accounts'] = array (
  'order' => 100,
  'module' => 'sc_StripePayments',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_SC_STRIPEPAYMENTS_ACCOUNTS_FROM_SC_STRIPEPAYMENTS_TITLE',
  'get_subpanel_data' => 'sc_stripepayments_accounts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
