<?php
$module_name = 'sc_StripePayments';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
          /*
            <link rel="stylesheet" href="modules/sc_StripePayments/payment_form.css?v='.time().'"/>
			<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
			<script type="text/javascript">Stripe.setPublishableKey("'.$settings['publishable_key'].'");</script>
			<script type="text/javascript" src="modules/sc_StripePayments/payment_form.js?v='.time().'"></script>
          */
          array(
          	'customCode' => '<input type="button" class="button" value="Refund Charge" onclick="window.location=\'index.php?module=sc_StripePayments&action=process_forms&method=refund&record={$fields.id.value}&token={$fields.stripe_id.value}\'" />' 
          )
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'sc_stripepayments_contacts_name',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'sc_stripepayments_accounts_name',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sc_stripepayments_leads_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'comments',
            'studio' => 'visible',
            'label' => 'LBL_COMMENTS',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'cc_name',
            'label' => 'LBL_CC_NAME',
          ),
          1 => 
          array (
            'name' => 'cc_last_four',
            'label' => 'LBL_CC_LAST_FOUR',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'cc_exp_month',
            'label' => 'LBL_CC_EXP_MONTH',
          ),
          1 => 
          array (
            'name' => 'cc_exp_year',
            'label' => 'LBL_CC_EXP_YEAR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'cc_type',
            'studio' => 'visible',
            'label' => 'LBL_CC_TYPE',
          ),
          1 => 
          array (
            'name' => 'cc_country',
            'label' => 'LBL_CC_COUNTRY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'cc_address_street_check',
            'studio' => 'visible',
            'label' => 'LBL_CC_ADDRESS_STREET_CHECK',
          ),
          1 => 
          array (
            'name' => 'cc_address_zip_check',
            'studio' => 'visible',
            'label' => 'LBL_CC_ADDRESS_ZIP_CHECK',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'cc_address',
            'label' => 'LBL_CC_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'cc_address_city',
            'label' => 'LBL_CC_ADDRESS_CITY',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'cc_address_state',
            'label' => 'LBL_CC_ADDRESS_STATE',
          ),
          1 => 
          array (
            'name' => 'cc_address_postalcode',
            'label' => 'LBL_CC_ADDRESS_POSTALCODE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'cc_address_country',
            'label' => 'LBL_CC_ADDRESS_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'cc_object',
            'label' => 'LBL_CC_OBJECT',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'cc_cvc_check',
            'studio' => 'visible',
            'label' => 'LBL_CC_CVC_CHECK',
          ),
          1 => 
          array (
            'name' => 'cc_fingerprint',
            'label' => 'LBL_CC_FINGERPRINT',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'amount',
            'label' => 'LBL_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'amount_refunded',
            'label' => 'LBL_AMOUNT_REFUNDED',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'fee_amount',
            'label' => 'LBL_FEE_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'fee_application',
            'label' => 'LBL_FEE_APPLICATION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'fee_currency',
            'label' => 'LBL_FEE_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'fee_description',
            'label' => 'LBL_FEE_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'fee_type',
            'label' => 'LBL_FEE_TYPE',
          ),
          1 => 
          array (
            'name' => 'paid',
            'label' => 'LBL_PAID',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'refunded',
            'label' => 'LBL_REFUNDED',
          ),
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'stripe_id',
            'label' => 'LBL_STRIPE_ID',
          ),
          1 => 
          array (
            'name' => 'stripe_created_date',
            'label' => 'LBL_STRIPE_CREATED_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'stripe_object',
            'label' => 'LBL_STRIPE_OBJECT',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'failure_message',
            'label' => 'LBL_FAILURE_MESSAGE',
          ),
          1 => 
          array (
            'name' => 'invoice',
            'label' => 'LBL_INVOICE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'livemode',
            'label' => 'LBL_LIVEMODE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'dispute',
            'label' => 'LBL_DISPUTE',
          ),
          1 => 
          array (
            'name' => 'customer',
            'label' => 'LBL_CUSTOMER',
          ),
        ),
      ),
    ),
  ),
);
?>
