<?php
// created: 2013-03-04 16:34:56
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_accounts"] = array (
  'name' => 'sc_stripepayments_accounts',
  'type' => 'link',
  'relationship' => 'sc_stripepayments_accounts',
  'source' => 'non-db',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'sc_stripepayments_accountsaccounts_ida',
);
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_accounts_name"] = array (
  'name' => 'sc_stripepayments_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'sc_stripepayments_accountsaccounts_ida',
  'link' => 'sc_stripepayments_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_accountsaccounts_ida"] = array (
  'name' => 'sc_stripepayments_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'sc_stripepayments_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_ACCOUNTS_FROM_SC_STRIPEPAYMENTS_TITLE',
);
