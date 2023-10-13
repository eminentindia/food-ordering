<?php
require('Razorpay.php');
require('config.php');
// Payment ID to be checked
$paymentId = 'pay_LyD5Ix7EQ11vBb';
// Initialize the Razorpay API client
$api = new \Razorpay\Api\Api($keyId, $keySecret);
try {
    // Fetch the payment details
    $payment = $api->payment->fetch($paymentId);
    // Access the payment attributes
    echo  $paymentId = $payment->id;
    echo '<br>';
    echo  $status = $payment->status;
    echo '<br>';
    echo  $status = $payment->order_id;
    echo '<br>';
    echo  $amount = $payment->amount;
    echo '<br>';
    echo  $currency = $payment->currency;
    if ($status === 'captured') {
    } else {
    }
    exit;
} catch (\Exception $e) {
    $error = $e->getMessage();
    exit;
}
