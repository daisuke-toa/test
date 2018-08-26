<?php
/*
Description: API Braintree Payment.
Author: Ziad Tamim
Version: 1.0
Author URI: https://intensifystudio.com
*/

require 'vendor/autoload.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('fvn3qnd8g6y9s2b6');
Braintree_Configuration::publicKey('w2bpn3tnptb8fxyb');
Braintree_Configuration::privateKey('7146a9f582156b947415b92dd27d089d');

// Get the credit card details submitted by the form
$paymentMethodNonce =  $_POST['payment_method_nonce'];
$amount = $_POST['amount'];

$result = Braintree_Transaction::sale([
  'amount' => $amount,
  'paymentMethodNonce' => $paymentMethodNonce,
  'options' => [
    'submitForSettlement' => True
  ]
]);

echo json_encode($result);
?>
