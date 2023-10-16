
<?php
session_start();
include('../admin/controller/common-controller.php');
$conn = _connectodb();
setTimeZone();
include('../function.inc.php');
include('../smtp/PHPMailerAutoload.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('../admin/controller/constant.inc.php');

define("DOMPDF_ENABLE_REMOTE", true);
require_once '../dompdf/autoload.inc.php';
require 'vendor\autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Dompdf\Dompdf;

date_default_timezone_set("Asia/Calcutta");
if (isset($_POST['finalcheckout'])) {
    if ($_POST['payment_type'] = 'cod') {
        $delieverytype = $_POST['delieverytype'];
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        if ($delieverytype == 'Takeaway') {
            $address = '';
            $apartment = '';
            $zip = '';
        } else if ($delieverytype == 'Dinein') {
            $address = '';
            $apartment = '';
            $zip = '';
        } else if ($delieverytype == 'Delivery') {
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $apartment = mysqli_real_escape_string($conn, $_POST['apartment']);
            $zip = mysqli_real_escape_string($conn, $_POST['zip']);
        }
        $city = $_POST['city'];
        $userdetail = getUserDetailsByid();
        $uaddress = $userdetail['address'];
        $coupon_code = mysqli_real_escape_string($conn, $_POST['couponcode']);

        if ($uaddress == '') {
            $iaddress = $address;
        } else {
            $iaddress = $uaddress;
        }
        $uappartment = $userdetail['appartment'];
        if ($uappartment == '') {
            $iappartment = $apartment;
        } else {
            $iappartment = $uappartment;
        }
        $upostcode = $userdetail['postcode'];
        if ($upostcode == '') {
            $ipostcode = $zip;
        } else {
            $ipostcode = $upostcode;
        }
        $ucity = $userdetail['city'];
        if ($ucity == '') {
            $icity = $city;
        } else {
            $icity = $ucity;
        }

        $insertu = "UPDATE `users` SET `address`='$iaddress', `appartment`='$iappartment', `postcode`='$ipostcode', `city`='$icity' ,`email`='$email' WHERE `ID`='" . $_SESSION['ATECHFOOD_USER_ID'] . "'";
        $mysqliins = mysqli_query($conn, $insertu);
        //user insertion done 
        $delievery_date = mysqli_real_escape_string($conn, $_POST['delievery_date']);
        $payment_method = mysqli_real_escape_string($conn, $_POST['payment_type']);
        $otp = rand(1000, 9999);
        $order_id = 'FOOD_' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 5));
        if ($delievery_date == '') {
            $delievery_date = date('Y-m-d');
        }
        $time_slot = mysqli_real_escape_string($conn, $_POST['time_slot']);
        $store = mysqli_real_escape_string($conn, $_POST['store']);
        $sql = "INSERT INTO orders (user_id,name,  address,appartment, city, postcode,phone, email,delieverytype, delievery_date, delievery_time,store,order_id,otp,payment_type,paymentstatus,coupon_code) VALUES ('" . $_SESSION['ATECHFOOD_USER_ID'] . "','$fname', '$address', '$apartment', '$city', '$zip', '$phone','$email', '$delieverytype', '$delievery_date', '$time_slot', '$store', '$order_id','$otp','$payment_method','created','$coupon_code')";
        // echo $sql;
        $result  = mysqli_query($conn, $sql);
        $last_order_id = mysqli_insert_id($conn);
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        foreach ($cart as $item) {
            $item_name = mysqli_real_escape_string($conn, $item['dish_name']);
            $dishID = mysqli_real_escape_string($conn, $item['dishID']);
            $sku = mysqli_real_escape_string($conn, $item['sku']);
            $price = mysqli_real_escape_string($conn, $item['price']);
            $qty = mysqli_real_escape_string($conn, $item['quantity']);
            $attributeID = mysqli_real_escape_string($conn, $item['attributeID']);
            $plan = mysqli_real_escape_string($conn, $item['tiffin']);
            if ($attributeID == '') {
                $attributeID = '';
            }
            if ($plan == '') {
                $plan = '';
            }
            $sql = "INSERT INTO order_details (invoice_order_id,name, sku, price, qty,order_id,attributeID,plan,dish_order_id) VALUES ('$order_id','$item_name', '$sku', '$price', '$qty','$last_order_id','$attributeID','$plan','$dishID')";
            $result = mysqli_query($conn, $sql);
        }
        //send order email 
        $sql = "select *, order_details.name AS order_name
     from order_details JOIN orders ON order_details.order_id=orders.ID where order_details.invoice_order_id='" . $order_id . "'";
        $result = mysqli_query($conn, $sql);
        // get number of rows returned by query
        $num_rows = mysqli_num_rows($result);
        // check if any rows are returned
        $items = '';
        $invoice_detail = '';
        $total = 0;
        $store = '';
        if (mysqli_num_rows($result) > 0) {
            // loop through each row
            $count = 0;
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                // process each row
                $name = $row['order_name'];
                $sku = $row['sku'];
                $price = $row['price'];
                $qty = $row['qty'];
                $address = $row['address'];
                $t_slot = $row['delievery_time'];
                $d_date = $row['delievery_date'];
                $apartment = $row['appartment'];
                $city = $row['city'];
                $zip = $row['postcode'];
                $phone = $row['phone'];
                $fname = $row['name'];
                $email = $row['email'];
                $option = '';
                if ($row['attributeID'] != '') {
                    $attrID = $row['attributeID'];
                    $selattr = "SELECT * FROM dish_details WHERE dish_detail_id='$attrID'";
                    $sql1attr = mysqli_query($conn, $selattr);
                    $sql2Attr = mysqli_fetch_assoc($sql1attr);
                    $attri = $sql2Attr['attribute']; // Assign the attribute value

                    // Check if $attri is not empty before appending badges
                    if (!empty($attri)) {
                        $attributes = explode(',', $attri); // Assuming attributes are comma-separated
                        foreach ($attributes as $attribute) {
                            // Append Bootstrap 5 badge elements to $attri
                            $option .= ' <span class="badge badge-success ml-3 p-2">' . $attribute . '</span>';
                        }
                    }
                }
                $store = $row['store'];
                $delieverytype = $row['delieverytype'];
                $payment_type = $row['payment_type'];
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

                if ($delieverytype == 'Dinein' || $delieverytype == 'Takeaway') {
                    if ($delieverytype == 'Dinein') {
                        $delieverytype = "DINE-IN";
                    } else if ($delieverytype == 'Delivery') {
                        $delieverytype = "DELIVERY";
                    } else if ($delieverytype == 'Takeaway') {
                        $delieverytype = "TAKE-AWAY";
                    }
                    $showAdd = "Order Type : $delieverytype ";
                } else {
                    $showAdd = " Deliever Address : $address $apartment $city ,  $zip  ";
                }
                $invoice_detail = '<div style="text-align:left"><h3>Invoice Detais</h3>
                <div style="margin: 8px auto;"> <p style="">
				' . $showAdd . ' 
				</p>
				<p>Payment Type: <span class="text-uppercase text-bold" style="font-weight:bold !important; text-transform:uppercase !important">' . $payment_type . '</span></p>
				<p>Time Slot: ' . $t_slot . '</p>
				<p>Serve Date: ' . $d_date . '</p></div>
       <p>
           <b>User Name:</b> ' . $fname . '
       </p>
       <p>
       <b>Phone:</b> ' . $phone . '
   </p>
       <p>
           <b>Email:</b> ' . $email . '
       </p></div>';
                $items .= ' <tr class="invoice-items">
       <td>' . $i++ . '</td>
       <td>' . $name .  ' ' . ($option !== '' ? ' </br>( ' . $option . ' )' : '') . ' </br>  <span style="font-size: .8rem;">[' . $sku . ']</span> </td>
       <td>' . $qty . '</td>
       <td style="text-align: right;">Rs. ' . $price . ' X ' . $qty . '</td>
   </tr>';
                // perform any other operations on the row data
                // ...
                $total += $row['qty'] * $row['price'];
                $count++;
            }
        } else {
            die();
        }
        $res = mysqli_query($conn, "select * from coupon where coupon_code='$coupon_code' and status='1'");
        $check = mysqli_num_rows($res);
        $foot = '';
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);

            if ($row !== null) { // Check if $row is not null
                $cart_min_value = $row['cart_min_value'];
                $coupon_type = $row['coupon_type'];
                $coupon_value = $row['coupon_value'];
                $expired_on = strtotime($row['expired_on']);
                $cur_time = strtotime(date('Y-m-d'));

                if ($total > $cart_min_value) {
                    if ($cur_time > $expired_on) {
                        $coupon_code_apply = 0;
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

                // Define $foot here, don't declare it again
                $foot = '';

                if ($row['coupon_code'] != '' || $row['coupon_code'] > 0) {
                    $foot .= ' <tr>
            <th>S.Total</th>
            <th>&nbsp;</th>
            <th style="text-align: right;">Rs. ' . $total . '</th>
            </tr><tr>
            <th>Coupon</th>
            <th>&nbsp;</th>
            <th style="text-align: right;">Rs. ' . ($camt) . '</th>
            </tr><tr>
            <th>Total</th>
            <th>&nbsp;</th>
            <th style="text-align: right;">Rs. ' . ($coupon_code_apply) . '</th>
            </tr>';
                } else {
                    $foot .= ' <tr>
            <th>Total</th>
            <th>&nbsp;</th>
            <th style="text-align: right;">Rs. ' . $total . '</th>
            </tr>
            ';
                }
            }
        } else {
            $foot .= ' <tr>
            <th>Total</th>
            <th>&nbsp;</th>
            <th style="text-align: right;">Rs. ' . $total . '</th>
            </tr>
            ';
        }




        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->setOptions($options);

        $html = '
<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Foodieez Order</title>
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
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
               font-family: "Noto Sans", sans-serif;
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
                  line-height: 1.2;
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
               ' . $invoice_detail . '
               <h1   style="background:#729a1b; padding:8px; justify-content: center;text-align:center;color:white;font-size:1rem;display:flex;align-items:center;justify-content: center;">
                   ORDER ID: ' . $order_id . '</h1>

                   <p class="text-center mt-3 mb-4" style="margin-bottom: 30px;
                   margin-top: 30px;">Confirmation OTP <br> <strong class="text-center d-flex justify-content-center" style="    font-size: 1.5rem;
   margin-top: 10px;
   color: #e74a27;
   letter-spacing: 3px;
   opacity: .8;">' . $otp . '</strong></p>

           </div>
           <table style="width: 100%;  table-layout: fixed; margin-bottom:16px">
               <thead>
                   <tr>
                       <th >Sn.</th>
                       <th >Item Name</th>
                       <th>QTY</th>
                       <th style="text-align:right; float:right">Price</th>
                   </tr>
               </thead>
               <tbody>
                  ' . $items . '
               </tbody>
           </table>
           <table style="width: 100%;
             background: #dbdbdb4f;
             border-radius: 4px;">
               <thead>
               <tr class="mb-1" style="    font-size: 13px;">
                       <th style="font-weight:noraml !important">CGST (2.5%)</th>
                       <th>&nbsp;</th>
                       <th style="text-align: right; font-weight:noraml !important">Rs. ' . round($total / 105 * 2.5, 2) . '</th>
                   </tr>
                   <tr class="mb-1" style="    font-size: 13px; border-bottom: 1px solid #8080801c;">
                       <th style="font-weight:noraml !important">SGST (2.5%)</th>
                       <th>&nbsp;</th>
                       <th style="text-align: right; font-weight:noraml !important">Rs. ' . round($total / 105 * 2.5, 2) . '</th>
                   </tr>
                   ' . $foot . '
               </thead>
           </table>
       </section>
   </body>
</html>
';
        $html2 = '
<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
       <meta charset="utf-8" />
       <title>Foodieez Order</title>
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
               font-family: "Noto Sans", sans-serif;
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
                  line-height: 1.2;
                 font-size: 14px;
                 color: #4a4a4a;
                 ">
                 <div style="display:flex; justify-content:center;  align-items:center;margin:0 auto" class="topdiv">
                 <img src="https://foodieez.co.in/wp-content/uploads/2021/12/logo-transparent.png" width="140px" style="margin-bottom:18px;text-align:center;margin:0 auto">
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
               ' . $invoice_detail . '
               <h1   style="background:#729a1b; padding:8px; justify-content: center;text-align:center;color:white;font-size:1rem;display:flex;align-items:center;justify-content: center;">
                   ORDER ID: ' . $order_id . '</h1>
           </div>
           <table style="width: 100%;  table-layout: fixed; margin-bottom:16px">
               <thead>
                   <tr>
                       <th >Sn.</th>
                       <th >Item Name</th>
                       <th>QTY</th>
                       <th style="text-align:right; float:right">Price</th>
                   </tr>
               </thead>
               <tbody>
                  ' . $items . '
               </tbody>
           </table>
           <table style="width: 100%;
             background: #dbdbdb4f;
             border-radius: 4px;">
               <thead>
               <tr class="mb-1" style="    font-size: 13px;">
                       <th style="font-weight:noraml !important">CGST (2.5%)</th>
                       
                       <th>&nbsp;</th>
                       <th style="text-align: right; font-weight:noraml !important">Rs. ' . round($total / 105 * 2.5, 2) . '</th>
                   </tr>
                   <tr class="mb-1" style="    font-size: 13px; border-bottom: 1px solid #8080801c;">
                       <th style="font-weight:noraml !important">SGST (2.5%)</th>
                    
                       <th>&nbsp;</th>
                       <th style="text-align: right; font-weight:noraml !important">Rs. ' . round($total / 105 * 2.5, 2) . '</th>
                   </tr>
                  ' . $foot . '
               </thead>
           </table>
       </section>
   </body>
</html>
';
        $mobile = $phone;
        $customer_name = $fname;
        $order_number = $order_id;
        $delivery_otp = $otp;
        // include('vendor\confirm.php');
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
                    ['name' => 'subject', 'contents' => 'Order Confirmation !'],
                    ['name' => 'html', 'contents' => $html],
                ],
            ]
        );
        $response = $client->request(
            'POST',
            'email/2/send',
            [
                RequestOptions::MULTIPART => [
                    ['name' => 'from', 'contents' => "FD_Order@foodieez.co.in"],
                    ['name' => 'to', 'contents' => "atechseva@gmail.com"],
                    ['name' => 'subject', 'contents' => 'New Order !'],
                    ['name' => 'html', 'contents' => $html2],
                ],
            ]
        );


        echo $order_id;
        $_SESSION['ORDER_ID'] = $order_id;
        unset($_SESSION['cart']);
    } else {
        die();
    }
}
