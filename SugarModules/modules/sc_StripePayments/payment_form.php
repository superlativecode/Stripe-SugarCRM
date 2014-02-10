<section id="StripePayments">
<h2>Stripe Payment</h2>
<p>Make Credit Card Charge.</p>
<p id="payment_errors"></p>
<form action="index.php?module=sc_StripePayments&action=process_forms" method="post" id="payment_form">
	<h4>Use Stripe Customer Data:</h4>
	<input type="checkbox" name="use_customer" class="use_customer" value="0" />
<!--
	@TODO!!!
	<h4>Update Stripe Customer Data:</h4>
	<input type="checkbox" name="update_customer" class="update_customer" value="1" />
-->
	<h3>Credit Card Info</h3>
	<div class="twothirds">
		<label for="cc_number">Card Number:</label><br />
		<input type="text" name="cc_number" class="cc_number" style="width: 200px;" />
	</div>
	<div class="onethird">
		<label for="cc_exp">Expires</label><br />
		<input type="text" name="cc_exp_month" class="cc_exp_month" placeholder="MM" style="width: 20px;"/>
		<input type="text" name="cc_exp_year" class="cc_exp_year" placeholder="YY" style="width: 20px;"/>
	</div>
	<div class="twothirds">
		<label for="cc_name">Name on Card:</label><br />
		<input type="text" name="cc_name" class="cc_name" style="width: 200px;" />
	</div>
	<div class="onethird">
		<label for="cc_cvc">Card Code:</label><br />
		<input type="text" name="cc_cvc" class="cc_cvc" placeholder="CVC" style="width: 60px;" />
	</div>
	<div class="full">
		<label for="amount">Amount (In Dollars):</label><br />
		<input type="text" name="amount" class="amount" />
	</div>
	<h3>Address</h3>
	<div class="full">
		<label for="address">Street:</label><br />
		<input type="text" name="address_line1" class="address_line1" style="width: 330px;" />
	</div>
	<div class="full">
		<label for="address_zip">City:</label><br />
		<input type="text" name="address_city" class="address_city" style="width: 155px;"/>
	</div>
	<div class="half">
		<label for="address_zip">Zip:</label><br />
		<input type="text" name="address_zip" class="address_zip" style="width: 155px;"/>
	</div>
	<div class="half">
		<label for="address_state">State:</label><br />
		<input type="text" name="address_state" class="address_state" style="width: 155px;" />
	</div>
	<div class="full">
		<label for="address_country">Country:</label><br />
		<input type="text" name="address_country" class="address_country" style="width: 155px;" />
	</div>
	<br /><br />
	<div class="full" align="center">
		<input type="hidden" name="focus_type" id="focus_type" value="<?php echo $_REQUEST['focus_type']; ?>" />
		<input type="hidden" name="focus_id" id="focus_id" value="<?php echo $_REQUEST['focus_id']; ?>" />
		<input type="hidden" name="customer_id" class="customer_id" value="" />
		<input type="button" name="make_payment" class="make_payment" value="Charge Credit Card" style="width: 145px;" />
	</div>
</form>
</section>