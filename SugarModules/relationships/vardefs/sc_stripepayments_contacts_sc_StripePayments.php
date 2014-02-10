<?php
// created: 2013-03-04 16:34:56
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_contacts"] = array (
  'name' => 'sc_stripepayments_contacts',
  'type' => 'link',
  'relationship' => 'sc_stripepayments_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'sc_stripepayments_contactscontacts_ida',
);
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_contacts_name"] = array (
  'name' => 'sc_stripepayments_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'sc_stripepayments_contactscontacts_ida',
  'link' => 'sc_stripepayments_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["sc_StripePayments"]["fields"]["sc_stripepayments_contactscontacts_ida"] = array (
  'name' => 'sc_stripepayments_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'sc_stripepayments_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SC_STRIPEPAYMENTS_CONTACTS_FROM_SC_STRIPEPAYMENTS_TITLE',
);
