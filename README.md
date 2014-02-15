Overview:

StripePayment Module for SugarCRM. Charge credit card payments, create customers and refund charges on Accounts, Leads, and Contacts. All while remaining PCI Compliant. Requires SugarCRM 6.3 or Higher and a Stripe Account. 

How it works, in the Accounts, Leads, and Contacts module on the Detail View there is a button (next to edit), called "Make Payment." A form pops up and it allows you to fill out the credit card information, including Billing address. This information is also pulled from parent record or the Stripe customer data. Once you press the submit button the credit card will be charged and StripePayments record will be created in sugar. This record contains all of the Stripe Charge information. That Stripe Payments record will also be related to the record that created the payment. 

Stripe Payments also allows you to Refund a charge created in SugarCRM. 
Installation:


1. Download, Clone or Fork this project
2. Zip up the contents using WinZip (A working SugarCRM module compressor)
2. Go into SugarCRM -> admin -> Module Loader
3. Upload the Zip File called StripePayments
4. Install Stripe Payments
5. Agree to the Terms and Conditions
6. Now go in Stripe Payments Module and access the Stripe Config in the Menu
7. Update the Stripe Config and click "Set Config Items"
8. Start Making Payments in the Accounts, Leads, or Contact module by pressing the "Make Payment" button


Need any SugarCRM Integrations? Contact us because we can help!


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/superlativecode/stripe-sugarcrm/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

