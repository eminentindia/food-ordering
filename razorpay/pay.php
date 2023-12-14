<?php
session_start();
include('../admin/controller/common-controller.php');
require('config.php');
require('Razorpay.php');
require_once 'common.php';

// $conn = _connectodb();
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
  extract($getsinglesetting);
  // print_r($getsetting);
}
include('../admin/controller/constant.inc.php');
include('../function.inc.php');

use Razorpay\Api\Api;

date_default_timezone_set("Asia/Calcutta");

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
  echo '<script>window.location = "../index.php";</script>';
  exit;
} else {

  $cart = $_SESSION['cart'] ?? [];
  $total = 0;

  foreach ($cart as $item) {
    $item_name = $item['dish_name'];
    $sku = $item['sku'];
    $price = $item['price'];
    $quantity = $item['quantity'];
    $option = $item['attributeID'] ?? '';
    $plan = $item['tiffin'] ?? '';

    $total += $quantity * $price;
  }

  if (isset($_GET['couponcode'])) {
    $couponcode = $_GET['couponcode'];
    if ($couponcode != '') {
      $res = mysqli_query($conn, "select * from coupon where coupon_code='$couponcode' and status='1'");
      $check = mysqli_num_rows($res);
      if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $cart_min_value = $row['cart_min_value'];
        $coupon_type = $row['coupon_type'];
        $coupon_value = $row['coupon_value'];
        $expired_on = strtotime($row['expired_on']);
        $cur_time = strtotime(date('Y-m-d'));
        // echo $getcartTotalPrice;
        if ($total > $cart_min_value) {
          if ($cur_time > $expired_on) {
            $coupon_code_apply = $total;
            $camt = 0;
          } else {
            $coupon_code_apply = 0;
            $camt = 0;
            if ($coupon_type == 'F') {
              $coupon_code_apply = $total - $coupon_value;
              $camt = $coupon_value;
            }
            if ($coupon_type == 'P') {
              $coupon_code_apply = $total - ($coupon_value / 100) * $total;
              $camt = $coupon_value . '%';
            }
          }
        }
      }
    } else {
      $coupon_code_apply = $total;
    }
  }


  $onlinePay = new MYORDERS();
  $sql9 = $DB_con->prepare("SELECT MAX(ID) AS id FROM orders");
  $sql9->execute();
  $result9 = $sql9->fetch(PDO::FETCH_ASSOC);
  $pID = $result9['id'];
  $mOrderID = "0000" . $pID;
  $api = new Api($keyId, $keySecret);

  $fname = $_GET['fname'];
  $n = strtoupper($fname);
  $email = $_GET['email'];
  $phone = $_GET['phone'];
  $city = $_GET['city'];
  $delieverytype = $_GET['delieverytype'];

  if ($delieverytype == 'Takeaway' || $delieverytype == 'Dinein') {
    $address = $apartment = $zip = '';
  } else if ($delieverytype == 'Delivery') {
    $address = $_GET['address'];
    $apartment = $_GET['apartment'];
    $zip = $_GET['zip'];
  }

  $delievery_date = $_GET['delievery_date'] ?? date('Y-m-d');
  $payment_type = $_GET['payment_type'];
  $paymentId = ($payment_type == 'cod') ? NULL : '';
  $paymentstatus = ($payment_type == 'cod') ? 0 : 1;

  $otp = rand(1000, 9999);
  $_SESSION['otp'] = $otp;

  $delievery_time = $_GET['time_slot'];
  $store = $_GET['store'];
  $razorpayPaymentId = '';
  $paymentstatus = 'pending';

  $_SESSION['name'] = $fname;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;
  $_SESSION['total'] = $total;
  $order_id = $_GET['ORDERID'];
  $_SESSION['ORDER_ID'] = $order_id;
  try {
    $orderData = [
      'receipt'         => $order_id,
      'receipt'         => $mOrderID,
      'amount'          => $total * 100,
      'currency'        => 'INR',
      'payment_capture' => 1 // auto capture
    ];

    $razorpayOrder = $api->order->create($orderData);
    $razorpayOrderId = $razorpayOrder['id'];
    $_SESSION['razorpay_order_id'] = $razorpayOrderId;


    $displayAmount = $amount = $orderData['amount'];
    if ($displayCurrency !== 'INR') {
      $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
      $exchange = json_decode(file_get_contents($url), true);
      $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
    }

    // Callback URL
    $callbackUrl = "" . SITE_PATH . "razorpay/verify.php"; // Replace with your actual callback URL


    $data = [
      "key"               => $keyId,
      "amount"            => $amount,
      "name"              => "FOODIEEZ",
      "description"       => "Foodieez Pre-Order",
      "image"             => "https://foodieez.co.in/pre-orders/img/logo.png",
      "prefill"           => [
        "name"              => $fname,
        "email"             => $email,
        "contact"           => $phone,
      ],
      "notes"             => [
        "address"           => "Online Payments",
        "merchant_order_id" => $mOrderID
      ],
      "theme"             => [
        "color"             => "#72ff0d"
      ],
      "order_id"          => $razorpayOrderId,
      "callback_url" => $callbackUrl,
    ];

    if ($displayCurrency !== 'INR') {
      $data['display_currency']  = $displayCurrency;
      $data['display_amount']    = $displayAmount;
    }
    if ($onlinePay->razorPayOnline($fname, $razorpayOrderId, $razorpayPaymentId, $address, $apartment, $city, $zip, $phone, $email, $delieverytype, $delievery_date, $delievery_time, $store, $order_id, $otp, $paymentstatus, $payment_type)) {
      $json = json_encode($data);
    } else {
      // echo '<script>window.location.href = "../order-failed.php";</script>';
      exit;
    }
  } catch (\Throwable $th) {
    // echo '<script>window.location.href = "../order-failed.php";</script>';
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Foodieez Payment</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <style>
    div {
      justify-content: center;
    }

    .bg {
      background-image: linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%);
      width: 600px;
      overflow: hidden;
      margin: 0 auto;
      box-sizing: border-box;
      padding: 20px;
      margin-top: 40px;
    }

    @media only screen and (max-width: 600px) {
      .bg {
        width: 580px;
      }

      .card__body {
        padding: 10px !important;
      }

      .card__recipient,
      .card__email {
        font-size: 12px !important;
      }

      .card__msg {
        font-size: 14px;
      }

      #timer {
        font-size: 10px;
      }
    }

    @media only screen and (max-width: 500px) {
      .bg {
        width: 480px;
      }
    }

    @media only screen and (max-width: 540px) {
      .bg {
        width: 100%;
      }

      .container-contact100 {
        padding: 0;
      }
    }

    .card {
      background-color: #fff;
      width: 100%;
      float: left;
      border-radius: 5px;
      box-sizing: border-box;
      padding: 40px 30px 25px 30px;
      text-align: center;
      position: relative;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .checkout__order__product {
      margin-top: 30px;
    }

    .card__success {
      position: absolute;
      top: -50px;
      left: 145px;
      width: 100px;
      height: 100px;
      border-radius: 100%;
      background-color: #60c878;
      border: 5px solid #fff;
    }

    .card__success i {
      color: #fff;
      line-height: 100px;
      font-size: 45px;
    }

    .card__msg {
      text-transform: uppercase;
      color: #55585b;
      font-size: 18px;
      font-weight: 500;
    }

    .card__submsg {
      color: #959a9e;
      font-size: 16px;
      font-weight: 400;
      margin-top: 0px;
    }

    .card__body {
      background-color: #f8f6f6;
      border-radius: 4px;
      width: 100%;
      margin-top: 30px;
      float: left;
      box-sizing: border-box;
      padding: 30px;
    }

    .card__avatar {
      width: 50px;
      height: 50px;
      border-radius: 100%;
      display: inline-block;
      margin-right: 10px;
      position: relative;
      top: 7px;
    }


    .card__recipient {
      color: #232528;
      text-align: left;
      margin-bottom: 5px;
      font-weight: 600;
    }

    .card__email {
      color: #838890;
      text-align: left;
      margin-top: 0px;
    }

    .card__price {
      color: #232528;
      font-size: 70px;
      margin-top: 25px;
      margin-bottom: 10px;
      margin-top: 0;
      margin: 0;
      padding: 0;
      line-height: 40px;
    }

    .card__price span {
      font-size: 2rem;
      font-weight: 700;
      color: #4caf50;
    }

    .card__method {
      color: #d3cece;
      text-transform: uppercase;
      text-align: left;
      font-size: 11px;
      margin-bottom: 5px;
    }

    .card__payment {
      background-color: #fff;
      border-radius: 4px;
      width: 100%;
      height: 100px;
      box-sizing: border-box;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card__credit-card {
      width: 50px;
      display: inline-block;
      margin-right: 15px;
    }

    .card__card-details {
      display: inline-block;
      text-align: left;
    }

    .card__card-type {
      text-transform: uppercase;
      color: #232528;
      font-weight: 600;
      font-size: 12px;
      margin-bottom: 3px;
    }

    .card__card-number {
      color: #838890;
      font-size: 12px;
      margin-top: 0px;
    }

    .card__tags {
      clear: both;
      padding-top: 15px;
    }

    .card__tag {
      text-transform: uppercase;
      background-color: #f8f6f6;
      box-sizing: border-box;
      padding: 3px 5px;
      border-radius: 3px;
      font-size: 10px;
      color: #d3cece;
    }

    ul,
    li {
      font-size: 12px;
    }

    #timer {
      padding: 10px;
      border: 1px solid #41ff41;
      background: #41ff410f;
    }
  </style>
</head>

<body>
  <div class="container-contact100">
    <div class="bg">
      <div class="card p-0">
        <div id="timer"></div>

        <h1 class="card__msg pt-3">You are paying <h1 class="card__price"><span>&#8377;<?php echo $coupon_code_apply ?></span></h1>
        </h1>
        <div class="card__body">
          <div class="card__recipient-info">
            <p class="card__recipient">Hi <strong> <?php echo $fname; ?></strong>,</p>
            <p class="card__email">Email: <strong><?php echo $email; ?></strong></p>
            <p class="card__email">Phone: <strong><?php echo $phone; ?></strong></p>
          </div>
          <div>
            <div class="checkout__order__product">
              <ul style=" border: 1px dashed #fd7d16;padding: 10px;line-height: 30px;background: #fffaf6;    text-align: left;    border-bottom: 0;
    padding-bottom: 0;    border-top: 0;
    padding-top: 0;">
                <?php
                $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                $total = 0;
                $i = 1;
                foreach ($cart as $item) {
                  $attriname = '';

                  if ($item['attributeID'] != '') {
                    $attrID = $item['attributeID'];
                    $selattr = "SELECT * FROM dish_details WHERE dish_detail_id='$attrID'";
                    $sql1attr = mysqli_query($conn, $selattr);
                    $sql2Attr = mysqli_fetch_assoc($sql1attr);
                    $attri = $sql2Attr['attribute']; // Assign the attribute value

                    // Check if $attri is not empty before appending badges
                    if (!empty($attri)) {
                      $attributes = explode(',', $attri); // Assuming attributes are comma-separated
                      foreach ($attributes as $attribute) {
                        // Append Bootstrap 5 badge elements to $attri
                        $attriname .= ' <span class="p-2">' . $attribute . '</span>';
                      }
                    }
                  }

                  $html = '<li style="     line-height: 20px;
                  padding-bottom: 10px;    padding-top: 10px;       border-bottom: 1px dashed #fd7d16;
                  border-top: 1px dashed #fd7d16;">' . $i++ . '. ';
                  $html .= $item['dish_name'];
                  if ($item['attributeID'] !== '') {
                    $html .= ' (' . $attriname . ')';
                  }
                  $html .= ' <br><span style="    font-weight: 500;">&#8377; ' . ($item['price']) . ' X ' . $item['quantity'] . '=' . $item['price'] * $item['quantity'] . '</span></li>';
                  $total += $item['quantity'] * $item['price'];
                  echo $html;
                }
                ?>
              </ul>
            </div>
          </div>
          <div class="payment" style=" margin-top: 40px !IMPORTANT;">
            <h5 style="margin-bottom: 30px;">Please wait while we are processing your payment...</h5>
            <form action="verify.php" method="POST" name="member_signu">
              <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>" data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>" data-image="<?php echo $data['image'] ?>" data-description="<?php echo $data['description'] ?>" data-prefill.name="<?php echo $data['prefill']['name'] ?>" data-prefill.email="<?php echo $data['prefill']['email'] ?>" data-prefill.contact="<?php echo $data['prefill']['contact'] ?>" data-notes.shopping_order_id="<?php echo $order_id ?>" data-order_id="<?php echo $data['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?> data-buttontext="PAY">
              </script>
            </form>
            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
            <!-- <input type="hidden" name="shopping_order_id" value="3456">
            <input type="hidden" name="callback_url" value="verify.php">
            <input type="hidden" name="cancel_url" value="verify.php"> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===============================================================================================-->
</body>
<script>
  // This code will be executed once the page loads
  document.addEventListener("DOMContentLoaded", function() {
    // Define the redirection time in milliseconds (5 minutes)
    var delayInMillis = 5 * 60 * 1000;

    // Get the timer element by its ID
    var timerElement = document.getElementById("timer");

    // Function to update the timer display
    function updateTimerDisplay(remainingTime) {
      var minutes = Math.floor(remainingTime / 60000);
      var seconds = Math.floor((remainingTime % 60000) / 1000);
      timerElement.innerHTML = "This Page Expires In " + minutes + " minutes and " + seconds + " seconds";
    }

    // Function to handle the redirection
    function redirectToDestination() {
      // Replace 'destination-page.html' with the actual destination page
      window.location.href = '".SITE_PATH."pre-orders/checkout.php';
    }

    // Show the initial timer display
    updateTimerDisplay(delayInMillis);

    // Use setInterval to update the timer display every second
    var timerInterval = setInterval(function() {
      delayInMillis -= 1000;
      updateTimerDisplay(delayInMillis);

      if (delayInMillis <= 0) {
        // Stop the interval when the countdown is finished
        clearInterval(timerInterval);
        // Perform the redirection
        // redirectToDestination();
      }
    }, 1000);
  });
</script>

</html>