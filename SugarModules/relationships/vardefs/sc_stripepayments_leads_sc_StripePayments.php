<?php
// created: 2013-03-04 16:34:56
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_leads"] = array (
  'name' => 'sc_stripepayments_leads',
  'type' => 'link',
  'relationship' => 'sc_stripepayments_leads',
  'source' => 'non-db',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'sc_stripepayments_leadsleads_ida',
);
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_leads_name"] = array (
  'name' => 'sc_stripepayments_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'sc_stripepayments_leadsleads_ida',
  'link' => 'sc_stripepayments_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_leadsleads_ida"] = array (
  'name' => 'sc_stripepayments_leadsleads_ida',
  'type' => 'link',
  'relationship' => 'sc_stripepayments_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_LEADS_FROM_SC_STRIPEPAYMENTS_TITLE',
);
