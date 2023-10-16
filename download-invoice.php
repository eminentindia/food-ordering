<?php
session_start();
include('admin/controller/common-controller.php');

$conn = _connectodb();
include('smtp/PHPMailerAutoload.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
	extract($getsinglesetting);
	//  print_r($getsetting);
	//  die();
}
include('admin/controller/constant.inc.php');
include('function.inc.php');
include('vendor/autoload.php');
if (isset($_SESSION['ADMIN_LOGIN_ID'])) {
} else {
	if (!isset($_SESSION['ATECHFOOD_USER_ID'])) {
		echo '<script>window.location.href="' . SITE_PATH . '";</script>';
	}
}
// Define DOMPDF_ENABLE_REMOTE constant
define("DOMPDF_ENABLE_REMOTE", true);
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);


if (isset($_GET['id'])  && $_GET['id'] > 0) {
	$Oid = safe_value($conn, $_GET['id']);

	$res = mysqli_query($conn, "select * from orders where ID='$Oid'");
	if (isset($_SESSION['ADMIN_LOGIN_ID'])) {
		$row = mysqli_fetch_assoc($res);
		$uid = $row['user_id'];
		$order_id = $row['order_id'];
		$coupon_code = $row['coupon_code'];
		$otp = $row['otp'];
	} else {
		$check = mysqli_fetch_assoc($res);

		if ($check['user_id'] != $_SESSION['ATECHFOOD_USER_ID']) {
			echo '<script>window.location.href="' . SITE_PATH . '";</script>';
		}
		$uid = $_SESSION['ATECHFOOD_USER_ID'];
	}

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
			$count = 0;
			$i = 1;

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
			$GSTNUMBER = '07AAFCE3528B1Z2';
			$payment_type = $row['payment_type'];
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
			$invoice_detail = '<div style="text-align:left"><h3>Invoice Details</h3>
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


	$html = '
	<!DOCTYPE html>
	<html>
	   <head>
		   <meta charset="utf-8" />
		   <title>Foodieez Order</title>
		   <link rel="shortcut icon" type="image/png" href="./favicon.png" />
		   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
		   <style>
		   * {
		   box-sizing: border-box;
           font-family: "Noto Sans", sans-serif;

	   }
	   
	
			   .table-bordered td,
			   .table-bordered th {
				   border: 1px solid #ddd;
				   padding: 10px;
				   word-break: break-all;
				   font-weight:normal
			   }
			   body {
				   
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
	// echo $html;
	// die();
	$dompdf->setBasePath('img/');

	$dompdf->loadHtml($html);
	$dompdf->render();
	$dompdf->stream('order-invoice.pdf');
	$dompdf->output('document.pdf', 'F');
}
