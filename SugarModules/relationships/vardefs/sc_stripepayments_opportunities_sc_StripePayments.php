<?php
// created: 2013-01-20 19:26:38
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_opportunities"] = array (
  'name' => 'sc_stripepayments_opportunities',
  'type' => 'link',
  'relationship' => 'sc_stripepayments_opportunities',
  'source' => 'non-db',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'sc_stripepayments_opportunitiesopportunities_ida',
);
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_opportunities_name"] = array (
  'name' => 'sc_stripepayments_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'sc_stripepayments_opportunitiesopportunities_ida',
  'link' => 'sc_stripepayments_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_opportunitiesopportunities_ida"] = array (
  'name' => 'sc_stripepayments_opportunitiesopportunities_ida',
  'type' => 'link',
  'relationship' => 'sc_stripepayments_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_OPPORTUNITIES_FROM_SC_STRIPEPAYMENTS_TITLE',
);
