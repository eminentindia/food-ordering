<?php
$page_title = "Order Detail";
include('connect/head.php'); ?>
<?php include('connect/menu-nav.php');

?>

<style>
    .lds-dual-ring.hidden {
        display: none;
    }

    .table th,
    .table thead th {
        font-weight: 800;
    }

    .lds-dual-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 5% auto;
        border-radius: 50%;
        border: 6px solid #fff;
        border-color: #14ff00 transparent #14ff00 transparent;
        position: absolute;
        animation: lds-dual-ring 1.2s linear infinite;
        top: 40%;
        left: 50%;
        margin-left: -25px;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }


    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, .8);
        z-index: 999;
        opacity: 1;
        transition: all 0.5s;
    }
</style>




<?php

$getorder = getorder($conn);
$getorder = json_decode($getorder, true);

$orderID = mysqli_real_escape_string($conn, $_GET['id']);
// $getorderdetails=getorderdetails($conn,$ID);
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}



$getsingleorder = getsingleorder($conn, $orderID);
$getsingleorder = json_decode($getsingleorder, true);
foreach ($getsingleorder as $getsingleorder) {
    //  echo'<pre>';
    //  print_r($getsingleorder);
    extract($getsingleorder);
}


require '../action/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

if (isset($_POST['OTP'])) {

    if ($_POST['OTP'] == 'cancel') {
        $sql = "SELECT * FROM orders WHERE order_id='" . $order_id . "' && payment_method = 'cod'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $columnsToUpdate = array(
                'paymentstatus' => 'cancel',
                'order_status' => $order_status,
                'order_cancelBy' => 'admin',
                'order_cancelAt' => '$order_cancelAt'
            );
            $conditionColumn = 'order_id'; // Adjust this to your actual condition column
            $conditionValue = $order_id;
            $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);
            echo ' <meta http-equiv="refresh" content="0">';
        }
    } else  if ($_POST['OTP'] == 'refunded') {
        $sql = "SELECT * FROM orders WHERE order_id='" . $order_id . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $columnsToUpdate = array(
                'paymentstatus' => 'refunded',
                'order_status' => $order_status,
            );
            $conditionColumn = 'order_id'; // Adjust this to your actual condition column
            $conditionValue = $order_id;
            $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);
            echo ' <meta http-equiv="refresh" content="0">';
        }
    } else {
        $sql = "SELECT * FROM orders WHERE order_id='" . $order_id . "' && otp = '" . $_POST['OTP'] . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $d_on = date('Y-m-d h:i:s');
            $columnsToUpdate = array(
                'paymentstatus' => 'captured',
                'otp_validate' => 1,
                'order_status' => 2,
                'delievered_on' => $d_on
            );
            $conditionColumn = 'order_id'; // Adjust this to your actual condition column
            $conditionValue = $order_id;
            $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);
            echo ' <meta http-equiv="refresh" content="0">';

            $validated = true;
            $row = mysqli_fetch_assoc($result);
            $delivery_otp = $_POST['OTP'];
            $mobile =  $row['phone'];
            $customer_name = $row['name'];
            $order_number = $row['order_id'];
            $email = $row['email'];
            $store = $row['store'];
            $delieverytype = $row['delieverytype'];
            $GSTNUMBER = '07AAFCE3528B1Z2';
            if ($store == '1') {
                $store = "07A, G.F. Arunachal Building, Barakhamba Road, Connaught Place";
                $store_email = "cp@foodieez.in";
                $store_phone = "+91 88260 55975";
                $fssai = '13321009000057';
            } else if ($store == '2') {
                $store = "Ground floor DCM Building, Barakhamba Road, Connaught Place";
                $store_email = "dcm@foodieez.in";
                $store_phone = "+91 8130654257";
                $fssai = '13322009000431';
            } else if ($store == '3') {
                $store = "Somdatt Plaza Chamber 2 Bhikaji Cama Place Delhi";
                $store_email = "bcp@foodieez.in";
                $store_phone = "+91 9871257358";
                $fssai = '13322009000663';
            }
            $html = '
                    <!DOCTYPE html>
                    <html>
    
                        <head>
                            <meta charset="utf-8" />
                            <title>Foodieez Order</title>
                            <link rel="shortcut icon" type="image/png" href="./favicon.png" />
                            <style>
                                * {
                                    box-sizing: border-box;
                                }
    
                                .table-bordered td,
                                .table-bordered th {
                                    border: 1px solid #ddd;
                                    padding: 10px;
                                    word-break: break-all;
                                }
    
                                body {
                                    font-family: Arial, Helvetica, sans-serif;
                                    margin: 0;
                                    padding: 0;
                                    font-size: 16px;
                                }
    
                                .h4-14 h4 {
                                    font-size: 12px;
                                    margin-top: 0;
                                    margin-bottom: 5px;
                                }
    
                                .img {
                                    margin-left: "auto";
                                    margin-top: "auto";
                                    height: 30px;
                                }
    
                                pre,
                                p {
                                    /* width: 99%; */
                                    /* overflow: auto; */
                                    /* bpicklist: 1px solid #aaa; */
                                    padding: 0;
                                    margin: 0;
                                }
    
                                table {
                                    font-family: arial, sans-serif;
                                    width: 100%;
                                    border-collapse: collapse;
                                    padding: 1px;
                                }
    
                                .hm-p p {
                                    text-align: left;
                                    padding: 1px;
                                    padding: 5px 4px;
                                }
    
                                td,
                                th {
                                    text-align: left;
                                    padding: 8px 6px;
                                }
    
                                .table-b td,
                                .table-b th {
                                    border: 1px solid #ddd;
                                }
    
                                th {
                                    /* background-color: #ddd; */
                                }
    
                                .hm-p td,
                                .hm-p th {
                                    padding: 3px 0px;
                                }
    
                                .cropped {
                                    float: right;
                                    margin-bottom: 20px;
                                    height: 100px;
                                    /* height of container */
                                    overflow: hidden;
                                }
    
                                .cropped img {
                                    width: 400px;
                                    margin: 8px 0px 0px 80px;
                                }
    
                                .main-pd-wrapper {
                                    box-shadow: 0 0 10px #ddd;
                                    background-color: #fff;
                                    border-radius: 10px;
                                    padding: 30px;
                                }
    
                                .table-bordered td,
                                .table-bordered th {
                                    border: 1px solid #ddd;
                                    padding: 10px;
                                    font-size: 14px;
                                }
    
                                .invoice-items {
                                    font-size: 14px;
                                    border-top: 1px dashed #ddd;
                                }
                    .topdiv{
                        display:flex;
                        justify-content:center;
                        align-items:center;
                    }
                            
                            </style>
                        </head>
                    <body>
                        <section class="main-pd-wrapper" style="width: 550px; margin: auto;box-shadow: 0 0 10px #ddd;border: 1px solid lightgray;">
                    
                                
                        
                        <div style="
                                text-align: center;
                                margin: auto;
                                line-height: 1.5;
                                font-size: 14px;
                                color: #4a4a4a;
                                ">
                                
                                
                                <div style="display:flex; justify-content:center;  align-items:center;margin:0 auto" class="topdiv">
                                <img src="' . SITE_PATH . 'admin/' . $logo . '" width="140px" style="margin-bottom:18px;text-align:center;margin:0 auto">
    
    
                                
                                
                                </div>
                                <div style="    font-size: 12px;">  <p>FSSAI NO. : ' . $fssai . '</p>
                                
                                <p>GSTIN. : ' . $GSTNUMBER . '</p> </div>
    
                                <p style="margin: 15px auto; font-weight: 700;">
                                    ' . $store . '
                                </p>
                                <p style="font-weight: 700;">
                                    <b>Phone:</b> ' . $store_phone . '
                                </p>
                                <p style="font-weight: 700;">
                                    <b>Email:</b> ' . $store_email . '
                                </p>
                                <hr style="border: 1px dashed rgb(131, 131, 131); margin: 25px auto">
                                <p style="margin-top 15px;margin-bottom:15px">
                                Dear ' . $customer_name . ' <br>
                                    Your Order Number <strong>' . $order_number . '</strong> is successfully delivered on ' . date("F j, Y h:i:s A") . '
                                    <br>
                                    Thank you for your order keep ordering ! <a href="https://foodieez.co.in/pre-orders/">https://foodieez.co.in/pre-orders/</a>
                                </p>
                            </div>     
                        </section>
                    </body>
                </html>';


            $client = new Client([
                'base_uri' => "https://yrg6nd.api.infobip.com/",
                'headers' => [
                    'Authorization' => "App 637182ab24357b4396c3763ab0761a8f-385dae8c-4f11-4958-9903-be9e1c5abef9",
                    'Content-Type' => 'multipart/form-data',
                    'Accept' => 'application/json',
                ]
            ]);

            $response = $client->request(
                'POST',
                'email/2/send',
                [
                    RequestOptions::MULTIPART => [
                        ['name' => 'from', 'contents' => "FD_Order@foodieez.co.in"],
                        ['name' => 'to', 'contents' => $email],
                        ['name' => 'subject', 'contents' => 'Order Delivered'],
                        ['name' => 'html', 'contents' => $html],
                    ],
                ]
            );
            // OTP is valid
            echo ' <meta http-equiv="refresh" content="0">';
        } else {
            $notvalidated = true;
            echo ' <meta http-equiv="refresh" content="0">';
        }
    }
}
?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class=" container-xxl " id="kt_content_container">
        <div class="card card-xl-stretch mb-xl-8">
            <form method="post">
                <div class="card-header  borderBottom1">
                    <div class="card-title">
                        <div class="d-flex align-items-center themeColor text-upper position-relative my-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
                            </svg>&nbsp; List Of <?php echo $page_title; ?>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="me-3 btn btn-sm btn-success" data-kt-drawer-show="true" data-kt-drawer-target="#add_order_drawer">ADD</button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">

                    <!-- -------------Content Here------------- -->
                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="../download-invoice.php?id=<?php echo $orderID ?>"><button type="button" class="btn btn-warning"><i class="fa fa-download" aria-hidden="true"></i>
                                            Generate PDF</button></a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div style=" font-size: 1rem;color: white !important;padding: 10px 30px;">
                                        <h4 style=" font-size: 1rem;color: white !important;background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%);" class="badge bg-primary badge-primary text-dark badge mb-0 rounded-pill text-dark">Order ID: <?php echo $order_id; ?></h4>
                                    </div>
                                    <div style=" font-size: .7rem;color: white !important;padding: 10px 30px; background-image: linear-gradient(-45deg, #FFC796 0%, #FF6B95 100%);" class="rounded-pill ">
                                        <div id="countdown"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2 ">
                                <div class="col-md-6">
                                    <div style="    background: #d5fab6; padding: 20px;">
                                        <h4 class="mb-3">User Information</h4>
                                        <p> <strong>User Name:</strong> <?php echo ucwords($name) ?></p>
                                        <p> <strong>User Email:</strong> <?php echo $email ?></p>
                                        <p> <strong>User Phone:</strong> <?php echo $phone ?></p>
                                        <?php
                                        if ($delieverytype == 'Dinein' || $delieverytype == 'Takeaway') {
                                        ?>
                                        <?php } else {
                                        ?>
                                            <p> <strong>Address:</strong>
                                                <?php echo ucwords($address) . ' ' . ucwords($appartment) . ' ' . ucwords($city) . ',' . $postcode ?>
                                            </p>
                                        <?php }
                                        ?>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div style="    background: #ffe7a8;  padding: 20px;">
                                        <h4 class="mb-3">Payment Details</h4>
                                        <p> <strong>Payment Type:</strong> <?php echo $payment_type ?></p>
                                        <p> <strong>Payment Status:</strong> <?php echo $paymentstatus ?></p>
                                        <?php if ($payment_type != 'cod') {
                                        ?>
                                            <p> <strong>Razorpay Payment ID:</strong> <?php echo $razorpayPaymentId ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div style="background: #ceefff;  padding: 20px;">
                                        <h4 class="mb-3">Order Details</h4>
                                        <p style="display: flex;align-items: center;justify-content: start;"> <strong>Outlet:</strong> <?php if ($getsingleorder['store'] == 1) {
                                                                                                                                        ?>
                                                <span class="badge rounded-pill bg-primary" style="    display: block;font-size: 13px;margin-left: 10px;">Arunachal Building</span>
                                            <?php } else {

                                            ?>
                                                <span class="badge rounded-pill bg-primary" style="    display: block;font-size: 13px;margin-left: 10px;">DCM Building</span>
                                            <?php } ?>

                                        <p> <strong>Order Type:</strong> <?php
                                                                            if ($delieverytype == 'Dinein') {
                                                                                echo "DINE-IN";
                                                                            } else if ($delieverytype == 'Delivery') {
                                                                                echo "DELIVERY";
                                                                            } else if ($delieverytype == 'Takeaway') {
                                                                                echo "TAKE-AWAY";
                                                                            }
                                                                            ?></p>

                                        <?php
                                        if ($_SESSION['store'] == '100') {
                                        ?>

                                            <p> <strong>Order Status:</strong> <span id="efwe"><?php echo ucwords($status) ?></span>
                                            <form method="POST" id="order_status_update">
                                                <select name="order_status" class="form-control" id="updateorderstatus" onchange="hi()">
                                                    <option value="">Update Order Status </option>
                                                    <?php
                                                    $orderstatusq = mysqli_query($conn, "select * from order_status");

                                                    while ($row = mysqli_fetch_assoc($orderstatusq)) {
                                                        echo "<option  value=" . $row['order_status_id'] . ">" . ucwords($row['status']) . "</option>";
                                                    }
                                                    ?>
                                                </select>&nbsp; &nbsp; <span id="ordr_status_success"></span>
                                                <input type="hidden" name="order_ID" value="<?php echo $_GET['id'] ?>">
                                                <input type="hidden" name="order_ID" value="<?php echo $_GET['id'] ?>">
                                                <input type="hidden" name="user_email" value="<?php echo $email ?>">
                                                <input type="hidden" name="UID" value="<?php echo $user_id ?>">
                                            </form>
                                            </p>
                                        <?php } ?>
                                        <p> <strong>Order Date:</strong> <?php $date = $getsingleorder['order_added_on'];
                                                                            $date = str_replace('-', '/', $date);
                                                                            echo formatDateTime($date);
                                                                            ?></p>
                                        <p> <strong>Delivery Date:</strong> <?php $date = $getsingleorder['delievery_date'];
                                                                            $date = str_replace('-', '/', $date);
                                                                            echo formatDateTime($date);
                                                                            ?></p>
                                        <p> <strong>Time Slot:</strong> <?php echo $getsingleorder['delievery_time'];  ?></p>
                                    </div>

                                </div>

                                <?php
                                if ($_SESSION['store'] == '100') {
                                ?>
                                    <div class="col-md-6 mt-3">
                                        <div style="background: #ffbfd1;  padding: 20px;">
                                            <form method="POST" id="delivery_boy_update">
                                                <?php
                                                $boynameres = mysqli_query($conn, "select * from delievery_boy where ID='$delievery_boy_id' AND status='1'");
                                                $boyname = mysqli_fetch_assoc($boynameres);

                                                // Check if $boyname is not null before accessing its values
                                                if ($boyname !== null) {
                                                    $delivery_boy_name = ucwords($boyname['name']);
                                                } else {
                                                    $delivery_boy_name = "Not Assigned"; // Default value if no delivery boy found
                                                }
                                                ?>
                                                Order Assigned To: <strong id="delivery_boy_status_name"><?php echo $delivery_boy_name; ?></strong>
                                                <br>
                                                <select name="delivery_boy" id="delieveryboyupdate" onchange="deleivery_update()" class="form-control mt-3">
                                                    <option value="">Update Delivery Boy</option>
                                                    <?php
                                                    $delivery_boyq = mysqli_query($conn, "select * from delievery_boy where status='1'");

                                                    while ($delivery_boyrow = mysqli_fetch_assoc($delivery_boyq)) {
                                                        echo "<option value=" . $delivery_boyrow['ID'] . ">" . ucwords($delivery_boyrow['name']) . "</option>";
                                                    }
                                                    ?>
                                                </select>&nbsp; &nbsp; <span id="delivery_boy_status_success"></span>
                                                <h1><?php echo isset($delivery_boyrow) ? ucwords($delivery_boyrow['name']) : ""; ?></h1>
                                                <input type="hidden" name="order_ID" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ""; ?>">
                                            </form>
                                        </div>
                                    <?php } ?>
                                    <div class="m-2" style="background-image: linear-gradient(to top, #09203f 0%, #537895 100%);  padding: 20px;    border: 2px dashed white;" class="mt-3">
                                        <?php
                                        if ($otp_validate == 0) {
                                        ?>
                                            <div class="my-2" ">
                            <h6 class=" mb-3 text-white" style="text-decoration: underline;">Check OTP </h6>
                                                <div>
                                                    <form method="post">
                                                        <input type="text" class="form-control" name="OTP" id="OTP">
                                                        <input type="submit" value="Submit" class="btn btn-primary mt-2">
                                                    </form>
                                                </div>
                                            </div>
                                        <?php } else {
                                            echo "<span class='text-white'>OTP VALIDATE SUCCESSFULLY !!</span>";
                                        }
                                        ?>
                                    </div>
                                    </div>
                            </div>
                            <div>
                                <table class="table table-responsive table-hover table-bordered table-striped">
                                    <thead style=" background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);;">
                                        <tr>
                                            <th class="text-center">Dish</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $getorderdetails = getorderdetails($conn, $ID);
                                    $total = 0;

                                    foreach ($getorderdetails as $orderattr) {
                                        // echo '<pre>';
                                        // print_r($orderattr);

                                        $price = $orderattr['price'];
                                        $quantity = $orderattr['qty'];
                                        $total += $quantity * $price;

                                        $dish_order_id = $orderattr['dish_order_id'];
                                        $sel = "SELECT * FROM dish WHERE ID='$dish_order_id'";
                                        $sql1 = mysqli_query($conn, $sel);
                                        $sql2 = mysqli_fetch_assoc($sql1);
                                        $myimg = $sql2['image'];
                                        //get attributes
                                        $attriname = '';
                                        if ($orderattr['attributeID'] != '') {
                                            $attrID = $orderattr['attributeID'];
                                            $selattr = "SELECT * FROM dish_details WHERE dish_detail_id='$attrID'";
                                            $sql1attr = mysqli_query($conn, $selattr);
                                            $sql2Attr = mysqli_fetch_assoc($sql1attr);
                                            $attri = $sql2Attr['attribute']; // Assign the attribute value

                                            // Check if $attri is not empty before appending badges
                                            if (!empty($attri)) {
                                                $attributes = explode(',', $attri); // Assuming attributes are comma-separated
                                                foreach ($attributes as $attribute) {
                                                    // Append Bootstrap 5 badge elements to $attri
                                                    $attriname .= ' <span class="badge badge-success bg-success ml-3 p-2">' . $attribute . '</span>';
                                                }
                                            }
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $orderattr['name'] ?> <?php echo $attriname ?></td>
                                            <td><?php echo $orderattr['qty'] ?></td>
                                            <td><?php echo $orderattr['price'] ?></td>
                                            <td><?php echo $orderattr['price'] * $orderattr['qty'] ?></td>

                                        </tr>
                                    <?php }
                                    ?>

                                    <?php
                                    $coupon_code_apply = 0; // Initialize the variable outside the conditional block

                                    if ($coupon_code != '') {
                                        $res = mysqli_query($conn, "select * from coupon where coupon_code='$coupon_code' and status='1'");
                                        $check = mysqli_num_rows($res);

                                        $coupon_code_apply = 0;
                                        $camt = 0;

                                        if ($check > 0) {
                                            $row = mysqli_fetch_assoc($res);
                                            $cart_min_value = $row['cart_min_value'];
                                            $coupon_type = $row['coupon_type'];
                                            $coupon_value = $row['coupon_value'];
                                            $expired_on = strtotime($row['expired_on']);
                                            $cur_time = strtotime(date('Y-m-d'));

                                            if ($total > $cart_min_value) {
                                                if ($cur_time <= $expired_on) {
                                                    if ($coupon_type == 'F') {
                                                        $coupon_code_apply = $total - $coupon_value;
                                                        $camt = 'Rs. ' . $coupon_value;
                                                    } elseif ($coupon_type == 'P') {
                                                        $coupon_code_apply = $total - ($coupon_value / 100) * $total;
                                                        $camt = $coupon_value . '%';
                                                    }
                                                }
                                            } else {
                                                $coupon_code_apply = $total;
                                            }
                                        }
                                    }
                                    ?>

                                    <tr>
                                        <?php if ($coupon_code_apply > 0) { ?>
                                            <div style="border: 2px dashed #ffe493;padding: 15px 20px;margin-top: 20px;background: #fff6db;">
                                                <p> Coupon Applied: <strong><?php echo $coupon_code ?> ( <?php echo $camt ?> )</strong></p>
                                                <p>Final Price: <strong>Rs. <?php echo $coupon_code_apply ?></strong></p>
                                            </div>
                                        <?php } ?>
                                    </tr>

                                </table>
                            </div>






                        </div>
                    </div>

                    <div id="loader" class="lds-dual-ring hidden overlay"></div>
                    <!-- ------------------------------------------------>
                </div>

                <script>
                    function hi() {
                        showConfirmation(function() {
                            $('#overlay').fadeIn();
                            var param = encryptpost('updatestatus_data');
                            var formData = $("#order_status_update").serialize();
                            var requestData = {
                                data: formData,
                                param: param
                            };
                            $.ajax({
                                type: "POST",
                                url: "controller/order/controller.php",
                                data: requestData,
                                success: function(response) {
                                    $('#overlay').fadeOut();
                                    showPopup(response.status, response.message);
                                    location.reload()
                                }
                            });

                        });
                    }
                </script>
                <script>
                    function deleivery_update() {
                        var delieveryboyupdate = jQuery('#delieveryboyupdate').val();
                        var delieveryboyhtml = $('#delieveryboyupdate :selected').text();
                        if (delieveryboyupdate != '') {
                            $.ajax({
                                type: "post",
                                url: "action/update-delievery-boy.php",
                                data: $("#delivery_boy_update").serialize(),
                                success: function(response) {
                                    var response = JSON.parse(response);
                                    if (response.success == true) {
                                        $("#delievery_boy_status_success").html("Assigned Successfully !");
                                        $("#delievery_boy_status_success").delay(4000).fadeOut("slow");
                                        $("#delievery_boy_status_name").html(delieveryboyhtml);

                                    }

                                }
                            });
                        }
                    }
                </script>

            </form>
        </div>
    </div>
    <?php include('connect/copyrights.php'); ?>
    <?php include('connect/footer-script.php'); ?>
    <?php include('connect/footer-end.php'); ?>

    <?php
    $time = explode(' - ', $getsingleorder['delievery_time']);
    $datetime = date('D M d Y', strtotime($getsingleorder['delievery_date'])) . " " . date('H:i:s', strtotime($time[1]));
    $dateTimeObj = new DateTime($datetime);
    $dateTimeObj->modify('-30 minutes');
    $datetime = $dateTimeObj->format('D M d Y H:i:s') . " GMT+0530 (India Standard Time)";
    ?>
    <script>
        function updateCountdown() {
            const deliveryDate = new Date('<?= $datetime ?>');
            const currentDate = new Date();
            const timeDifference = deliveryDate - currentDate;
            // Calculate days, hours, minutes, and seconds
            const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
            const countdownElement = document.getElementById('countdown');
            if (seconds <= 0 && minutes <= 0 && hours <= 0) {
                countdownElement.innerHTML = "Delivery time has passed.";
            } else {
                if (days == 0) {
                    countdownElement.innerHTML = ` ${hours} hours ${minutes} minutes ${seconds} seconds`;
                } else {
                    countdownElement.innerHTML = `${days} days ${hours} hours ${minutes} minutes ${seconds} seconds`;
                }
                setTimeout(updateCountdown, 1000); // Update every 1 second
            }
        }
        // Initial update
        updateCountdown();
    </script>