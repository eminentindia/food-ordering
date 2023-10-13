<?php
require('Razorpay.php');
require('config.php');
// Payment ID to be checked
$orderID = 'pay_LyD5Ix7EQ11vBb';
use Razorpay\Api\Api;
// Initialize the Razorpay API with your key and secret
$api = new Api($keyId, $keySecret);
// Specify the order ID for which you want to fetch the payment details
$orderID = 'order_LyDYzzZEgWqpm3';
$api = new Api($keyId, $keySecret);
try {
    $payments = $api->payment->all(array('order_id' => $orderID));
    foreach ($payments->items as $payment) {
        echo  $paymentID = $payment->id;
        echo '<br>';
        echo  $status = $payment->status;
        echo '<br>';
        echo  $status = $payment->order_id;
        echo '<br>';
        echo   $amount = $payment->amount;
        echo '<br>';
        echo   $currency = $payment->currency;
    }
} catch (\Exception $e) {
    // Handle any errors that occur during the API request
    $errorMessage = $e->getMessage();
    // ... handle the error appropriately
}
