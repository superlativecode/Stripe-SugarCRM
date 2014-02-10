<?php
// created: 2013-03-04 16:34:56
$dictionary["sc_stripepayments_contacts"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'sc_stripepayments_contacts' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'sc_StripePayments',
      'rhs_table' => 'sc_stripepayments',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'sc_stripepayments_contacts_c',
      'join_key_lhs' => 'sc_stripepayments_contactscontacts_ida',
      'join_key_rhs' => 'sc_stripepayments_contactssc_stripepayments_idb',
    ),
  ),
  'table' => 'sc_stripepayments_contacts_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'sc_stripepayments_contactscontacts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'sc_stripepayments_contactssc_stripepayments_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'sc_stripepayments_contactsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'sc_stripepayments_contacts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'sc_stripepayments_contactscontacts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'sc_stripepayments_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'sc_stripepayments_contactssc_stripepayments_idb',
      ),
    ),
  ),
);