<?php
date_default_timezone_set('Asia/Kolkata');

function getUserCart()
{
  global $conn;
  $arr = array();
  $id = $_SESSION['ATECHFOOD_USER_ID'];
  $res = mysqli_query($conn, "select * from cart where user_id='$id'");
  while ($row = mysqli_fetch_assoc($res)) {
    $arr[] = $row;
  }
  return $arr;
}

function checkSuperAdminSession()
{
    if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['store'] == '100') {
        return true;
    } else {
        return false;
    }
}

function checkAdminSession()
{
    if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['store'] == '99') {
        return true;
    } else {
        return false;
    }
}


function checkDCMSession()
{
    if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['store'] == '2') {
        return true;
    } else {
        return false;
    }
}

function checkArunachalSession()
{
    if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['store'] == '1') {
        return true;
    } else {
        return false;
    }
}

function manageUserCart($uid, $qty, $attr)
{
  global $conn;
  $res = mysqli_query($conn, "select * from cart where user_id='$uid' and dish_detail_id='$attr'");
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $cid = $row['ID'];
    mysqli_query($conn, "update cart set qty='$qty' where ID=$cid");
  } else {
    $added_on = date("Y-m-d h:i:s");
    $sql = "INSERT into `cart` (
                user_id,
                dish_detail_id,
                qty,
                added_on
                )
                VALUES (
                '$uid',
                '$attr',
                '$qty',
                '$added_on'
                )";

    $result  = mysqli_query($conn, $sql);
  }
}




function getdishdetailstatus($ID)
{
  global $conn;
  $res = mysqli_query($conn, "select status from dish_details where ID='$ID'");
  $row = mysqli_fetch_assoc($res);
  return $row['status'];
}

function getcartTotalPrice()
{
  $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

  // Calculate the total quantity of items in the cart
  $totalPrice = 0;

  foreach ($cart as $item) {
    $totalPrice += $item['quantity'] * $item['price'];
  }

  return $totalPrice;
}

function getTotalCartCount()
{
  if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $totalQty = 0;

    // Calculate the total quantity of items in the cart
    foreach ($cart as $item) {
      $totalQty += $item['quantity'];
    }

    return $totalQty;
  } else {
    return 0; // Cart is empty
  }
}

// function getUserFullCart($attr_id = '')
// {
//   $cartArr = array();
//   if (isset($_SESSION['ATECHFOOD_USER_ID'])) {
//     $getUserCart = getUserCart();
//     $cartArr = array();
//     foreach ($getUserCart as $list) {
//       $getdishdetailstatus = getdishdetailstatus($list['dish_detail_id']);
//       if ($getdishdetailstatus == 1) {
//         $cartArr[$list['dish_detail_id']]['qty'] = $list['qty'];
//         $getDishDetail = getDishDetailById($list['dish_detail_id']);
//         $cartArr[$list['dish_detail_id']]['price'] = $getDishDetail['price'];
//         $cartArr[$list['dish_detail_id']]['attribute'] = $getDishDetail['attribute'];
//         $cartArr[$list['dish_detail_id']]['dish'] = $getDishDetail['dish'];
//         $cartArr[$list['dish_detail_id']]['image'] = $getDishDetail['image'];
//       } else {
//         removeDishFromCartByid($list['dish_detail_id']);
//       }
//     }
//   } else {
//     if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
//       foreach ($_SESSION['cart'] as $key => $val) {
//         $getdishdetailstatus = getdishdetailstatus($key);
//         if ($getdishdetailstatus == 1) {
//           $cartArr[$key]['qty'] = $val['qty'];
//           $getDishDetail = getDishDetailById($key);
//           $cartArr[$key]['price'] = $getDishDetail['price'];
//           $cartArr[$key]['dish'] = $getDishDetail['dish'];
//           $cartArr[$key]['image'] = $getDishDetail['image'];
//           $cartArr[$key]['attribute'] = $getDishDetail['attribute'];
//         } else {
//           removeDishFromCartByid($key);
//         }
//       }
//     }
//   }
//   if ($attr_id != '') {
//     return $cartArr[$attr_id]['qty'];
//   } else {
//     return $cartArr;
//   }
// }

function getDishDetailById($id)
{
  global $conn;
  $res = mysqli_query($conn, "select dish.dish,dish.image,dish_details.price,dish_details.attribute
  FROM dish
  JOIN dish_details 
  ON dish.ID=dish_details.dish_id
  where dish_details.ID='$id' and dish.ID=dish_details.dish_id");
  $row = mysqli_fetch_assoc($res);
  return $row;
}

function removeDishFromCartByid($id)
{
  if (isset($_SESSION['ATECHFOOD_USER_ID'])) {
    global $conn;
    $res = mysqli_query($conn, "delete from cart where dish_detail_id='$id' and user_id=" . $_SESSION['ATECHFOOD_USER_ID']);
  } else {
    unset($_SESSION['cart'][$id]);
  }
}


function emptyCart()
{
  if (isset($_SESSION['ATECHFOOD_USER_ID'])) {
    global $conn;
    $res = mysqli_query($conn, "delete from cart where user_id=" . $_SESSION['ATECHFOOD_USER_ID']);
  } else {
    unset($_SESSION['cart']);
  }
}


function formatDate($date)
{
    $formattedDate = date("F j, Y", strtotime($date));
    return $formattedDate;
}

function formatDateTime($date)
{
  $formattedDate = date("M j, Y h:i A", strtotime($date));
  return $formattedDate;
}
function getUserDetailsByid()
{
  global $conn;
  $data['name'] = '';
  $data['email'] = '';
  $data['mobile'] = '';
  $data['referral_code'] = '';

  if (isset($_SESSION['ATECHFOOD_USER_ID'])) {
    $row = mysqli_fetch_assoc(mysqli_query($conn, "select * from users where ID ='" . $_SESSION['ATECHFOOD_USER_ID'] . "'"));
    $data['name'] = $row['name'];
    $data['email'] = $row['email'];
    $data['mobile'] = $row['mobile'];
    $data['address'] = $row['address'];
    $data['appartment'] = $row['appartment'];
    $data['postcode'] = $row['postcode'];
    $data['city'] = $row['city'];
    $data['referral_code'] = $row['referral_code'];
  }
  return $data;
}
function getImg($img)
{
  global $conn;
  $myArray = explode(',', $img);
  $myArray = preg_replace('/\s+/', '', $myArray);
  //to remove last array value (,)
  $myArray = array_slice($myArray, 0, count($myArray) - 1);
  $image = $myArray[0];
  return $image;
}

function getAllImg($dish_id)
{
  global $conn;
  $data = array();
  $res = mysqli_query($conn, "select * from images where dish_id='$dish_id'");
  //  echo "select * from images where dish_id='$dish_id'";

  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
  // echo $data;
}


function send_email($email, $html, $subject, $smtp_email, $smtp_password)
{
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->SMTPSecure = "tls";
  $mail->SMTPAuth = true;
  $mail->Username = "$smtp_email";
  $mail->Password = "$smtp_password";
  $mail->SetFrom("$smtp_email");
  $mail->addAddress($email);
  $mail->IsHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $html;
  $mail->SMTPOptions = array('ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => false
  ));
  if ($mail->send()) {
    //echo "done";
  } else {
    //echo "Error occur";
  }
}

function getorderdetails($conn, $uid)
{
  $sql = "SELECT * from orders JOIN order_details ON orders.ID=order_details.order_id 

  WHERE orders.id = $uid ";




  // $sql="select order_details.price,order_details.qty,dish_details.attribute,dish.dish
  // from order_details,dish_details,dish
  // WHERE
  // order_details.order_id=$uid AND
  // order_details.dish_details_id=dish_details.ID AND
  // dish_details.dish_id=dish.ID";


  // echo $sql;
  $data = array();

  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}


function getDishslugbyDishName($conn, $dish)
{
  $sql = "select slug from dish where dish='$dish'";
  // echo $sql;
  $data = array();
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}

function get_populardishcart($conn)
{
  $sql = "select * from dish where is_popular='1'";
  // echo $sql;
  $data = array();
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}
function getDishIdbySlug($conn, $slug)
{
  $sql = "select ID from dish where slug='$slug'";
  // echo $sql;

  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $data = $row;
  }
  return $data;
}

function getDishIdbyDishName($conn, $dish)
{
  $sql = "select ID from dish where dish='$dish'";
  // echo $sql;

  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $data = $row;
  }
  return $data;
}


function getOrderById($conn, $oid)
{
  $sql = "select * from orders where ID='$oid'";
  // echo $sql;
  $data = array();
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}
function getOrderByUserId($conn, $oid)
{
  $sql = "Select * from  orders INNER JOIN order_details  ON order_details.order_id=orders.ID  INNER JOIN dish  ON dish.ID=order_details.dish_order_id INNER JOIN order_status  ON orders.order_status=order_status.order_status_id where user_id='$oid' GROUP BY order_details.invoice_order_id ORDER BY orders.ID DESC  ";
  //  echo $sql;
  $data = array();
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}

function orderemail($conn, $oid)
{
  $getUserDetailsBy = getUserDetailsByid();
  $getsettings = getSITEsettings($conn);
  $facebook = $getsettings['facebook'];
  $instagram = $getsettings['instagram'];
  $twitter = $getsettings['twitter'];
  $youtube = $getsettings['youtube'];
  $logo = $getsettings['logo'];
  $site_address = $getsettings['site_address'];
  $site_email = $getsettings['site_email'];
  $website_path = $getsettings['website_path'];
  $name = $getUserDetailsBy['name'];
  $email = $getUserDetailsBy['email'];
  $getOrderById = getOrderById($conn, $oid);
  $order_id = $getOrderById[0]['ID'];
  $added_on = $getOrderById[0]['added_on'];
  $total_amount = $getOrderById[0]['total_price'];
  $address = $getOrderById[0]['address'];
  $city = $getOrderById[0]['city'];
  $appartment = $getOrderById[0]['appartment'];
  $postcode = $getOrderById[0]['postcode'];
  $payment_type = $getOrderById[0]['payment_type'];
  $getorderdetails = getorderdetails($conn, $oid);
  $image = $getorderdetails[0]['image'];


  $coupon_code = $getOrderById[0]['coupon_code'];


  if ($coupon_code == '') {
    $coupon_value = '0';
  } else {
    $couponsel = "select coupon_value from coupon where coupon_code='$coupon_code'";
    $Res = mysqli_query($conn, $couponsel);
    $cRow = mysqli_fetch_assoc($Res);
    $coupon_value = $cRow['coupon_value'];
  }



  $html = '<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
  
      <style type="text/css" data-premailer="ignore">
          html, body {
          Margin: 0 auto !important;
          padding: 0 !important;
          width: 100% !important;
            height: 100% !important;
          }
  
          * {
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
          text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
          }
         
          .ExternalClass {
          width: 100%;
          }
      
          div[style*="Margin: 16px 0"] {
            Margin:0 !important;
          }
        
          table,
          th {
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          }
          
          .ExternalClass,
          .ExternalClass * {
          line-height: 100% !important;
          }
          
          table {
          border-spacing: 0 !important;
          border-collapse: collapse !important;
          border: none;
          Margin: 0 auto;
          }
          div[style*="Margin: 16px 0"] {
            Margin:0 !important;
          }
         
          img {
          -ms-interpolation-mode:bicubic;
          }
      
          .yshortcuts a {
          border-bottom: none !important;
          }
          
          *[x-apple-data-detectors],  /* iOS */
          .x-gmail-data-detectors,    /* Gmail */
          .x-gmail-data-detectors *,
          .aBn {
            border-bottom: none !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
          }
        
          .a6S {
            display: none !important;
            opacity: 0.01 !important;
          }
          img.g-img + div {
            display:none !important;
          }
         
          a,
          a:link,
          a:visited {
            color: #a1ff9e;
            text-decoration: none !important;
          }
          .header a {
            color: #c3c3c3;
            text-decoration: none;
            text-underline: none;
          }
          .main a {
            color: #a1ff9e;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
          }
          .main .section.customer_and_shipping_address a,
          .main .section.shipping_address_and_fulfillment_details a {
            color: #666363;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
          }
          .footer a {
            color: #a1ff9e;
            text-decoration: none;
            text-underline: none;
          }
        
          img {
          border: none !important;
          outline: none !important;
          text-decoration:none !important;
          }
         
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Playfair Display"] {
            font-family: "Playfair Display",Georgia,serif !important;
          }
          td.menu_bar_1 a:hover,
          td.menu_bar_6 a:hover {
          color: #a1ff9e !important;
          }
          th.related_product_wrapper.first {
          border-right: 13px solid #ffffff;
          padding-right: 6px;
          }
          th.related_product_wrapper.last {
          border-left: 13px solid #ffffff;
          padding-left: 6px;
          }
      </style>
    
      <link href="https://fonts.googleapis.com/css?family=Karla:400,700%7CPlayfair+Display:700,400%7CKarla:700,400%7CKarla:700,700" rel="stylesheet" type="text/css" data-premailer="ignore">
      <!--<![endif]-->
        <style type="text/css" data-premailer="ignore">
        /* Media Queries */
          /* What it does: Removes right gutter in Gmail iOS app */
          @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
            .container {
              min-width: 375px !important;
            }
          }
          /* Main media query for responsive styles */
          @media only screen and (max-width:480px) {
          
            .email-container {
            width: 100% !important;
            min-width: 100% !important;
            }
            .section > th {
            padding: 13px 26px 13px 26px !important;
            }
            .section.divider > th {
            padding: 26px 26px !important;
            }
            .main .section:first-child > th,
            .main .section:first-child > td {
              padding-top: 26px !important;
            }
            .main .section:nth-last-child(2) > th,
            .main .section:nth-last-child(2) > td {
              padding-bottom: 52px !important;
            }
            .section.recommended_products > th,
            .section.discount > th {
              padding: 26px 26px !important;
            }
            /* What it does: Forces images to resize to the width of their container. */
            img.fluid,
            img.fluid-centered {
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            height: auto !important;
            Margin: auto !important;
            box-sizing: border-box;
            }
            /* and center justify these ones. */
            img.fluid-centered {
            Margin: auto !important;
            }
        
            /* What it does: Forces table cells into full-width rows. */
            th.stack-column,
            th.stack-column-left,
            th.stack-column-center,
            th.related_product_wrapper,
            .column_1_of_2,
            .column_2_of_2 {
            display: block !important;
            width: 100% !important;
            min-width: 100% !important;
            direction: ltr !important;
            box-sizing: border-box;
            }
            /* and left justify these ones. */
            th.stack-column-left {
            text-align: left !important;
            }
            /* and center justify these ones. */
            th.stack-column-center,
            th.related_product_wrapper {
            text-align: center !important;
            border-right: none !important;
            border-left: none !important;
            }
            .column_button,
            .column_button > table,
            .column_button > table th {
            width: 100% !important;
            text-align: center !important;
            Margin: 0 !important;
            }
            .column_1_of_2 {
            padding-bottom: 26px !important;
            }
            .column_1_of_2 th {
              padding-right: 0 !important;
            }
            .column_2_of_2 th {
              padding-left:  0 !important;
            }
            .column_text_after_button {
            padding: 0 13px !important;
            }
            /* Adjust product images */
            th.table-stack {
            padding: 0 !important;
            }
            th.product-image-wrapper {
              padding: 26px 0 13px 0 !important;
            }
            img.product-image {
              width: 240px !important;
              max-width: 240px !important;
            }
            tr.row-border-bottom th.product-image-wrapper {
            border-bottom: none !important;
            }
            th.related_product_wrapper.first,
            th.related_product_wrapper.last {
            padding-right: 0 !important;
            padding-left: 0 !important;
            }
            .text_banner th.banner_container {
            padding: 13px !important;
            }
            .mobile_app_download .column_1_of_2 .image_container {
            padding-bottom: 0 !important;
            }
            .mobile_app_download .column_2_of_2 .image_container {
            padding-top: 0 !important;
            }
          }
        </style>
        <style type="text/css" data-premailer="ignore">
        /* Custom Media Queries */
          @media only screen and (max-width:480px) {
          .column_logo {
            display: block !important;
            width: 100% !important;
            min-width: 100% !important;
            direction: ltr !important;
            text-align: center !important;
          }
          p,
          .column_1_of_2 th p,
          .column_2_of_2 th p,
          .order_notes *,
          .invoice_link * {
            text-align: center !important;
          }
          .line-item-description p {
            text-align: left !important;
          }
          .line-item-price p,
          .line-item-qty p,
          .line-item-line-price p {
            text-align: right !important;
          }
          h1, h2, h3,
          .column_1_of_2 th,
          .column_2_of_2 th {
            text-align: center !important;
          }
          td.order-table-title {
            text-align: center !important;
          }
          .footer .column_1_of_2 {
            border-right: 0 !important;
            border-bottom: 0 !important;
          }
          .footer .section_wrapper_th {
            padding: 0 17px;
          }
          }
        </style>
      </head>
      <body class="body" id="body" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#a1ff9e" style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;">
        <!--[if !mso 9]><!-->
        <div style="display: none; overflow: hidden; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; mso-hide: all;">
          We have got your order! Your world is about to look a whole lot better.We will drop you another email when your order ships.
        </div>
      
        <table class="container container_full" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse: collapse; min-width: 100%;" role="presentation" bgcolor="#a1ff9e">
          <tbody>
          <tr>
            <th valign="top" style="mso-line-height-rule: exactly;">
            <center style="width: 100%;">
              <table border="0" width="600" cellpadding="0" cellspacing="0" align="center" style="width: 600px; min-width: 600px; max-width: 600px; margin: auto;" class="email-container" role="presentation">
              <tbody><tr>
                <th valign="top" style="mso-line-height-rule: exactly;">
                <!-- BEGIN : SECTION : HEADER -->
                <table class="section_wrapper header" data-id="header" id="section-header" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                  <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly; padding-top: 52px; padding-bottom: 26px;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                    <tbody><tr>
                      <th class="column_logo" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px;" align="center" bgcolor="#ffffff">
                      <!-- Logo : BEGIN -->
                      <a href="' . $website_path . '" target="_blank" style="color: #c3c3c3; text-decoration: none !important; text-underline: none;">
                        <img src="' . $website_path . 'images/logo/' . $logo . '" class="logo " width="96" border="0" style="width: 96px; height: auto !important; display: block; text-align: center; margin: auto;">
                      </a>
                      <!-- Logo : END -->
                      </th>
                    </tr>
                    </tbody></table>
                  </td>
                  </tr>
                </tbody></table>
                <!-- END : SECTION : HEADER -->
                <!-- BEGIN : SECTION : MAIN -->
                <table class="section_wrapper main" data-id="main" id="section-main" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                  <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" id="mixContainer" role="presentation">
                    <!-- BEGIN SECTION: Heading -->
                    <tbody><tr id="section-1468266" class="section heading">
                      <th style="mso-line-height-rule: exactly; color: #4b4b4b; padding: 26px 52px 13px;" bgcolor="#ffffff">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation" style="color: #4b4b4b;" bgcolor="#ffffff">
                        <tbody><tr style="color: #4b4b4b;" bgcolor="#ffffff">
                        <th style="mso-line-height-rule: exactly; color: #4b4b4b;" bgcolor="#ffffff" valign="top">
                          <h1 data-key="1468266_heading" style="font-family: Georgia,serif,"Playfair Display"; font-size: 28px; line-height: 46px; font-weight: 700; color: #4b4b4b; text-transform: none; background-color: #ffffff; margin: 0;">Order Confirmation</h1>
                        </th>
                        </tr>
                      </tbody></table>
                      </th>
                    </tr>
                    <!-- END SECTION: Heading -->
                    <!-- BEGIN SECTION: Introduction -->
                    <tr id="section-1468267" class="section introduction">
                      <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                      
                        <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0 0 13px;" align="center">
                        <span data-key="1468267_greeting_text" style="text-align: center; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363;">
                          Hey
                        </span>
                        ' . $name . ',
                        </p>
                      
                      
                      <p data-key="1468267_introduction_text" class="text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;" align="center">
                      </p>
                      <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;" align="center">We have got your order! Your world is about to look a whole lot better.</p>
                      <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;" align="center">We will drop you another email when your order ships.</p>
                      </th>
                    </tr>
                    <!-- END SECTION: Introduction -->
                    <!-- BEGIN SECTION: Order Number And Date -->
                    <tr id="section-1468270" class="section order_number_and_date">
                      <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                      <h2 style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #4b4b4b; font-size: 20px; line-height: 26px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="center">
                        <span data-key="1468270_order_number">Order ID</span> ' . $order_id . '
                      </h2>
                      <p class="muted" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 26px; font-weight: normal; color: #bdbdbd; margin: 0;" align="center">' . $added_on . '</p>
                      </th>
                    </tr>
                    <!-- END SECTION: Order Number And Date -->
                    <!-- BEGIN SECTION: Products With Pricing -->
                    <tr id="section-1468271" class="section products_with_pricing">
                      
                      <!-- Bold 1 -->
                      
                      
                      
                      <!-- end Bold 1 -->
                      <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                        <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                        <tbody><tr>
                          <th class="product-table" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                          <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                            <tbody><tr>
                            <th colspan="2" class="product-table-h3-wrapper" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                              <h3 data-key="1468271_item" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Items ordered</h3>
                            </th>
                            </tr>
                         
                            
                            ';
  $total_price = 0;
  foreach ($getorderdetails as $list) {
    $item_price = $list['qty'] * $list['price'];
    $total_price = $total_price + $item_price;
    $html .= '<tr>
                              <th class="table-stack product-image-wrapper stack-column-center" width="1" style="mso-line-height-rule: exactly; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; padding: 13px 13px 13px 0;" bgcolor="#ffffff" valign="middle">
    <img width="140" class="product-image" src="' . $website_path . 'admin/media/dish/' . $image . '" alt="DIsh Image" style="vertical-align: middle; text-align: center; width: 140px; max-width: 140px; height: auto !important; border-radius: 1px; padding: 0px;">
                              </th>
                              <th class="product-details-wrapper table-stack stack-column" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;" bgcolor="#ffffff" valign="middle">
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                                <tbody><tr>
                                
                                <th class="line-item-description" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 6px 13px 0;" align="left" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">
                                  <a href="https://us.tens.co/tools/emails/click/order-confirmation/1/product/link?url=https%3A%2F%2Fus.tens.co%2Fproducts%2Ftravel-case" target="_blank" style="color: #666363; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: left !important; font-weight: bold;">
                                  ' . $list['dish'] . '
                                  </a>
                                  <br>
                                  <span class="muted" style="text-align: center; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 26px; font-weight: normal; color: #bdbdbd; word-break: break-all;">
                                    
                                  ' . $list['attribute'] . '
                                      </span>
                                  </p>
                                  </th>
                                  
                                  <th style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top"></th>
                                  
                                  <th class="right line-item-qty" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 13px;" align="right" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                    ×&nbsp;1
                                  </p>
                                  </th>
                                  <th class="right line-item-line-price" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 26px;" align="right" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                    Rs. ' . $item_price . '
                                  </p>
                                  </th>
                                </tr>
                                </tbody></table>
                              </th>
                              </tr>
                              
                              <tr>
                                <th colspan="2" class="product-empty-row" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top"></th>
                              </tr>
                            ';
  }
  $html .= '<tr class="row-border-bottom">
                            </tbody></table>
                          </th>
                          </tr>
                          <tr>

';

  if ($getOrderById[0]['coupon_code'] != '') {
    $html .= '<th class="pricing-table" style="mso-line-height-rule: exactly; padding: 13px 0;" bgcolor="#ffffff" valign="top">
    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
    
      <tbody>
      <tr class="pricing-table-total-row">
      <th class="table-title" data-key="1468271_total" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Sub Total</th>
      <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">Rs .' . $total_price . '</th>
      </tr>
      
      
      <tr>
      <th class="table-title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">
        <span data-key="1468271_discount" style="font-weight: bold;">Discount</span> (' . $getOrderById[0]['coupon_code'] . ')</th>
        <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">-' . $coupon_value . '</th>
      </tr>
     
      
      <tr class="pricing-table-total-row">
      <th class="table-title" data-key="1468271_total" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Total</th>
      <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">Rs.' . $getOrderById[0]['final_price'] . '</th>
      </tr>
      
      
      
      
      
    </tbody></table>
    </th>
  </tr>
  </tbody></table>
</th>';
  }

  $html .= '
                      </tr>
                      <!-- END SECTION: Products With Pricing -->
                      <!-- BEGIN SECTION: Payment Info -->
                      <tr id="section-1468272" class="section payment_info">
                        <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                        <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                          <!-- PAYMENT INFO -->
                          
                          
                          
                          
                          
                          <tbody><tr>
                            <th colspan="2" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                            <h3 data-key="1468272_payment_info" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 0; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Payment Info</h3>
                            </th>
                          </tr>
                          
                            
                                <!-- PAYMENT METHOD IMAGE -->
                              
                                <tr>
                                  <th class="table-title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">
                                  <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%; font-weight: bold;" role="presentation">
                                    <tbody><tr style="font-weight: bold;">
                                   
                                    <th style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;" align="left" bgcolor="#ffffff" valign="middle">
                                      
                                      ' . strtoupper($payment_type) . '
                                      
                                      
                                    
                                    </th>
                                    </tr>
                                  </tbody></table>
                                  </th>
                                  <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 13px 0;" align="right" bgcolor="#ffffff" valign="middle">
                                  Rs.' . $getOrderById[0]['final_price'] . '
                                  </th>
                                  </tr>
                                
                                
                              </tbody></table>
                              </th>
                            </tr>
                            <!-- END SECTION: Payment Info -->
                            <!-- BEGIN SECTION: Customer And Shipping Address -->
                            <tr id="section-1468273" class="section customer_and_shipping_address">
                              <!-- BEGIN : 2 COLUMNS : BILL_TO -->
                              <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                                <tbody><tr>
                                <!-- BEGIN : Column 1 of 2 : BILL_TO -->
                                <th width="50%" class="column_1_of_2 column_bill_to " style="mso-line-height-rule: exactly;" align="left" bgcolor="#ffffff" valign="top">
                                  <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%;" role="presentation">
                                  <tbody><tr>
                                    <th style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                    <h3 data-key="1468273_bill_to" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="left">Billing Info</h3>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th class="billing_address " style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                    <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">' . $name . '<br>
                                     ' . $address . ' <br>
                                                  ' . $appartment . ', ' . $city . '<br>
                                     ' . $postcode . '<br>
                                     <br>
                                      <a href="mailto:" style="color: #69d766; text-decoration: none !important; text-underline: none; word-wrap: break-word;" target="_blank">' . $email . '</a></p>
                                    </th>
                                  </tr>
                                  </tbody></table>
                                </th>
                                
                                </tr>
                              </tbody></table>
                              </th>
                              <!-- END : 2 COLUMNS : SHIP_TO -->
                            </tr>
                            <!-- END SECTION: Customer And Shipping Address -->
                            <!-- BEGIN SECTION: Divider -->
                            <tr id="section-1468275" class="section divider">
                              <th style="mso-line-height-rule: exactly; padding: 26px 52px;" bgcolor="#ffffff">
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation">
                                <tbody><tr>
                                <th style="mso-line-height-rule: exactly; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid;" bgcolor="#ffffff" valign="top">
                                </th>
                                </tr>
                              </tbody></table>
                              </th>
                            </tr>
                            <!-- END SECTION: Divider -->
                            <!-- BEGIN SECTION: Closing Text -->
                            <tr id="section-1468276" class="section closing_text">
                              <th data-key="1468276_closing_text" class="text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 52px 52px;" align="center" bgcolor="#ffffff">
                              <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363;  padding:15px !important;" align="center">If you need help with anything please dont hesitate to drop us an email: ' . $site_email . ' :)</p>
                              </th>
                            </tr>
                            <!-- END SECTION: Closing Text -->
                            <tr data-id="link-list">
                              <td class="menu_bar menu_bar_6" style="mso-line-height-rule: exactly; padding: 26px 0;" bgcolor="#ffffff">
                              <table class="table_menu_bar" border="0" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tbody><tr>
                                <th class="menu_bar_item first" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #aed767; border-right-color: #dadada; border-right-style: solid; border-left-color: #dadada; border-left-style: none; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                  <a href="' . $website_path . 'dishes" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  Shop
                                  </a>
                                </th>
                                <th class="menu_bar_item" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #aed767; border-right-color: #dadada; border-right-style: solid; border-left-color: #dadada; border-left-style: solid; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                <a href="' . $website_path . 'about-us" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  About Us
                                  </a>
                                </th>
                                <th class="menu_bar_item last" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #bdbdbd; border-right-color: #dadada; border-right-style: none; border-left-color: #dadada; border-left-style: solid; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                <a href="' . $website_path . 'contact-us" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  Contact
                                  </a>
                                </th>
                                </tr>
                              </tbody></table>
                              </td>
                            </tr>
                            </tbody></table>
                          </td>
                          </tr>
                        </tbody></table>
                        <!-- END : SECTION : MAIN -->
                        <!-- BEGIN : SECTION : FOOTER -->
                        <table class="section_wrapper footer" data-id="footer" id="section-footer" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                          <tbody><tr>
                          <td class="section_wrapper_th" style="mso-line-height-rule: exactly; padding: 0 52px;" bgcolor="#ffffff">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                            <!-- BEGIN : 2 COLUMNS : SOCIAL_BLOCK -->
                            <tbody><tr><th style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                              <tbody><tr>
                                <!-- BEGIN : Column 1 of 2 : SOCIAL_BLOCK -->
                                <th width="50%" class="column_1_of_2 column_social_block " style="mso-line-height-rule: exactly; padding-top: 26px; padding-bottom: 26px; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; border-right-width: 2px; border-right-color: #dadada; border-right-style: solid;" align="center" bgcolor="#ffffff" valign="top">
                                <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; text-align: center;" role="presentation">
                                  <!-- Social heading : BEGIN -->
                                  <tbody><tr style="" align="center">
                                  <th class="column_footer_title " width="100%" style="mso-line-height-rule: exactly; padding-right: 5%; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;" align="center" bgcolor="#ffffff" valign="top">
                                    <p data-key="section_footer_title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none; margin: 0 0 13px;" align="center">Lets hang out?</p>
                                  </th>
                                  </tr>
                                  <!-- Social heading : END -->
                                  <!-- Store Address : BEGIN -->
                                  <tr style="" align="center">
                                  <th class="column_shop_social_icons " width="100%" style="mso-line-height-rule: exactly; padding-right: 5%;" align="center" bgcolor="#ffffff" valign="top">
                                    <a class="social-link" href="' . $facebook . '" target="_blank" title="Facebook" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Facebook" src="https://orderlyemails.com/facebook_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0 0px;">
                                    </a>
                                    <a class="social-link" href="' . $twitter . '" target="_blank" title="Twitter" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Twitter" src="https://orderlyemails.com/twitter_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;">
                                    </a>
                                    <a class="social-link" href="' . $instagram . '" target="_blank" title="Instagram" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Instagram" src="https://orderlyemails.com/instagram_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;">
                                    </a>
                                    <a class="social-link" href="' . $youtube . '" target="_blank" title="YouTube" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="YouTube" src="https://orderlyemails.com/youtube_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 0px 0 6px;">
                                    </a>
                                  </th>
                                  </tr>
                                </tbody></table>
                                </th>
                                <!-- END : Column 1 of 2 : SOCIAL_BLOCK -->
                                <!-- BEGIN : Column 2 of 2 : SHOP_BLOCK -->
                                <th width="50%" class="column_2_of_2 column_shop_block " style="mso-line-height-rule: exactly; padding-top: 26px; padding-bottom: 26px; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;" align="center" bgcolor="#ffffff" valign="top">
                                <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; text-align: center;" role="presentation">
                                  <!-- Store Address : BEGIN -->
                                  <tbody><tr style="" align="center">
                                  <th class="column_shop_block2 " data-key="section_shop_block2" width="100%" style="mso-line-height-rule: exactly; padding-left: 5%; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;" align="center" bgcolor="#ffffff" valign="top">
                                    <br style="text-align: center;">
                                    ' . $site_address . '
                                  </th>
                                  </tr>
                                  <!-- Store Address : END -->
                                </tbody></table>
                                </th>
                                <!-- END : Column 2 of 2 : SHOP_BLOCK -->
                              </tr>
                              </tbody></table>
                            </th>
                            <!-- END : 2 COLUMNS : SHOP_BLOCK -->
                            </tr><tr>
                              <th data-id="store-info" style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Store Website : BEGIN -->
                                <tbody><tr>
                                <th class="column_shop_block1 " width="100%" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none; padding-bottom: 13px; padding-top: 26px;" align="center" bgcolor="#ffffff">
                                  <a href="' . $website_path . '" target="_blank" data-key="section_shop_block1" style="color: #69d766; text-decoration: none !important; text-underline: none; font-size: 14px; font-weight: 400; text-transform: none;">Food Ordering</a>
                                </th>
                                </tr>
                                <!-- Store Website : END -->
                              </tbody></table>
                              </th>
                            </tr>
                            
                            </tbody></table>
                          </td>
                          </tr>
                        </tbody></table>
                        <!-- END : SECTION : FOOTER -->
                        </th>
                      </tr>
                      </tbody></table>
                    </center>
                    </th>
                  </tr>
                  </tbody>
                </table>
    
  </body>
  </html>
  ';
  return $html;
}

function getSITEsettings($conn)
{
  $sql = "select * from setting";
  // echo $sql;

  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $data = $row;
  }
  return $data;
}
function getDishImgByID($conn, $ID)
{
  $sql = "select image from dish where ID='$ID'";
  // echo $sql;
  $data = array();
  $res = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}
function send_complete_order_email($conn, $oid)
{
  $getUserDetailsBy = getUserDetailsByid();
  $getsettings = getSITEsettings($conn);
  $facebook = $getsettings['facebook'];
  $instagram = $getsettings['instagram'];
  $twitter = $getsettings['twitter'];
  $youtube = $getsettings['youtube'];
  $logo = $getsettings['logo'];
  $site_address = $getsettings['site_address'];
  $site_email = $getsettings['site_email'];
  $website_path = $getsettings['website_path'];
  // print_r($getUserDetailsBy);
  $name = $getUserDetailsBy['name'];
  $email = $getUserDetailsBy['email'];
  $getOrderById = getOrderById($conn, $oid);
  //  print_r($getOrder);
  $order_id = $getOrderById[0]['ID'];
  $added_on = $getOrderById[0]['added_on'];
  $total_amount = $getOrderById[0]['total_price'];
  $address = $getOrderById[0]['address'];
  $delievered_on = $getOrderById[0]['delievered_on'];
  $city = $getOrderById[0]['city'];
  $appartment = $getOrderById[0]['appartment'];
  $postcode = $getOrderById[0]['postcode'];
  $payment_type = $getOrderById[0]['payment_type'];
  $getorderdetails = getorderdetails($conn, $oid);
  $image = $getorderdetails[0]['image'];
  $coupon_code = $getOrderById[0]['coupon_code'];

  $couponsel = "select coupon_value from coupon where coupon_code='$coupon_code'";
  $Res = mysqli_query($conn, $couponsel);
  $cRow = mysqli_fetch_assoc($Res);
  $coupon_value = $cRow['coupon_value'];



  $html = '<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
  
      <style type="text/css" data-premailer="ignore">
          html, body {
          Margin: 0 auto !important;
          padding: 0 !important;
          width: 100% !important;
            height: 100% !important;
          }
  
          * {
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
          text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
          }
         
          .ExternalClass {
          width: 100%;
          }
      
          div[style*="Margin: 16px 0"] {
            Margin:0 !important;
          }
        
          table,
          th {
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          }
          
          .ExternalClass,
          .ExternalClass * {
          line-height: 100% !important;
          }
          
          table {
          border-spacing: 0 !important;
          border-collapse: collapse !important;
          border: none;
          Margin: 0 auto;
          }
          div[style*="Margin: 16px 0"] {
            Margin:0 !important;
          }
         
          img {
          -ms-interpolation-mode:bicubic;
          }
      
          .yshortcuts a {
          border-bottom: none !important;
          }
          
          *[x-apple-data-detectors],  /* iOS */
          .x-gmail-data-detectors,    /* Gmail */
          .x-gmail-data-detectors *,
          .aBn {
            border-bottom: none !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
          }
        
          .a6S {
            display: none !important;
            opacity: 0.01 !important;
          }
          img.g-img + div {
            display:none !important;
          }
         
          a,
          a:link,
          a:visited {
            color: #a1ff9e;
            text-decoration: none !important;
          }
          .header a {
            color: #c3c3c3;
            text-decoration: none;
            text-underline: none;
          }
          .main a {
            color: #a1ff9e;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
          }
          .main .section.customer_and_shipping_address a,
          .main .section.shipping_address_and_fulfillment_details a {
            color: #666363;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
          }
          .footer a {
            color: #a1ff9e;
            text-decoration: none;
            text-underline: none;
          }
        
          img {
          border: none !important;
          outline: none !important;
          text-decoration:none !important;
          }
         
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Playfair Display"] {
            font-family: "Playfair Display",Georgia,serif !important;
          }
          td.menu_bar_1 a:hover,
          td.menu_bar_6 a:hover {
          color: #a1ff9e !important;
          }
          th.related_product_wrapper.first {
          border-right: 13px solid #ffffff;
          padding-right: 6px;
          }
          th.related_product_wrapper.last {
          border-left: 13px solid #ffffff;
          padding-left: 6px;
          }
      </style>
    
      <link href="https://fonts.googleapis.com/css?family=Karla:400,700%7CPlayfair+Display:700,400%7CKarla:700,400%7CKarla:700,700" rel="stylesheet" type="text/css" data-premailer="ignore">
      <!--<![endif]-->
        <style type="text/css" data-premailer="ignore">
        /* Media Queries */
          /* What it does: Removes right gutter in Gmail iOS app */
          @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
            .container {
              min-width: 375px !important;
            }
          }
          /* Main media query for responsive styles */
          @media only screen and (max-width:480px) {
          
            .email-container {
            width: 100% !important;
            min-width: 100% !important;
            }
            .section > th {
            padding: 13px 26px 13px 26px !important;
            }
            .section.divider > th {
            padding: 26px 26px !important;
            }
            .main .section:first-child > th,
            .main .section:first-child > td {
              padding-top: 26px !important;
            }
            .main .section:nth-last-child(2) > th,
            .main .section:nth-last-child(2) > td {
              padding-bottom: 52px !important;
            }
            .section.recommended_products > th,
            .section.discount > th {
              padding: 26px 26px !important;
            }
            /* What it does: Forces images to resize to the width of their container. */
            img.fluid,
            img.fluid-centered {
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            height: auto !important;
            Margin: auto !important;
            box-sizing: border-box;
            }
            /* and center justify these ones. */
            img.fluid-centered {
            Margin: auto !important;
            }
        
            /* What it does: Forces table cells into full-width rows. */
            th.stack-column,
            th.stack-column-left,
            th.stack-column-center,
            th.related_product_wrapper,
            .column_1_of_2,
            .column_2_of_2 {
            display: block !important;
            width: 100% !important;
            min-width: 100% !important;
            direction: ltr !important;
            box-sizing: border-box;
            }
            /* and left justify these ones. */
            th.stack-column-left {
            text-align: left !important;
            }
            /* and center justify these ones. */
            th.stack-column-center,
            th.related_product_wrapper {
            text-align: center !important;
            border-right: none !important;
            border-left: none !important;
            }
            .column_button,
            .column_button > table,
            .column_button > table th {
            width: 100% !important;
            text-align: center !important;
            Margin: 0 !important;
            }
            .column_1_of_2 {
            padding-bottom: 26px !important;
            }
            .column_1_of_2 th {
              padding-right: 0 !important;
            }
            .column_2_of_2 th {
              padding-left:  0 !important;
            }
            .column_text_after_button {
            padding: 0 13px !important;
            }
            /* Adjust product images */
            th.table-stack {
            padding: 0 !important;
            }
            th.product-image-wrapper {
              padding: 26px 0 13px 0 !important;
            }
            img.product-image {
              width: 240px !important;
              max-width: 240px !important;
            }
            tr.row-border-bottom th.product-image-wrapper {
            border-bottom: none !important;
            }
            th.related_product_wrapper.first,
            th.related_product_wrapper.last {
            padding-right: 0 !important;
            padding-left: 0 !important;
            }
            .text_banner th.banner_container {
            padding: 13px !important;
            }
            .mobile_app_download .column_1_of_2 .image_container {
            padding-bottom: 0 !important;
            }
            .mobile_app_download .column_2_of_2 .image_container {
            padding-top: 0 !important;
            }
          }
        </style>
        <style type="text/css" data-premailer="ignore">
        /* Custom Media Queries */
          @media only screen and (max-width:480px) {
          .column_logo {
            display: block !important;
            width: 100% !important;
            min-width: 100% !important;
            direction: ltr !important;
            text-align: center !important;
          }
          p,
          .column_1_of_2 th p,
          .column_2_of_2 th p,
          .order_notes *,
          .invoice_link * {
            text-align: center !important;
          }
          .line-item-description p {
            text-align: left !important;
          }
          .line-item-price p,
          .line-item-qty p,
          .line-item-line-price p {
            text-align: right !important;
          }
          h1, h2, h3,
          .column_1_of_2 th,
          .column_2_of_2 th {
            text-align: center !important;
          }
          td.order-table-title {
            text-align: center !important;
          }
          .footer .column_1_of_2 {
            border-right: 0 !important;
            border-bottom: 0 !important;
          }
          .footer .section_wrapper_th {
            padding: 0 17px;
          }
          }
        </style>
      </head>
      <body class="body" id="body" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#a1ff9e" style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;">
       
      
        <table class="container container_full" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse: collapse; min-width: 100%;" role="presentation" bgcolor="#a1ff9e">
          <tbody>
          <tr>
            <th valign="top" style="mso-line-height-rule: exactly;">
            <center style="width: 100%;">
              <table border="0" width="600" cellpadding="0" cellspacing="0" align="center" style="width: 600px; min-width: 600px; max-width: 600px; margin: auto;" class="email-container" role="presentation">
              <tbody><tr>
                <th valign="top" style="mso-line-height-rule: exactly;">
                <!-- BEGIN : SECTION : HEADER -->
                <table class="section_wrapper header" data-id="header" id="section-header" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                  <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly; padding-top: 52px; padding-bottom: 26px;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                    <tbody><tr>
                      <th class="column_logo" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px;" align="center" bgcolor="#ffffff">
                      <!-- Logo : BEGIN -->
                      <a href="' . $website_path . '" target="_blank" style="color: #c3c3c3; text-decoration: none !important; text-underline: none;">
                        <img src="' . $website_path . 'images/logo/' . $logo . '" class="logo " width="96" border="0" style="width: 96px; height: auto !important; display: block; text-align: center; margin: auto;">
                      </a>
                      <!-- Logo : END -->
                      </th>
                    </tr>
                    </tbody></table>
                  </td>
                  </tr>
                </tbody></table>
                <!-- END : SECTION : HEADER -->
                <!-- BEGIN : SECTION : MAIN -->
                <table class="section_wrapper main" data-id="main" id="section-main" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                  <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" id="mixContainer" role="presentation">
                    <!-- BEGIN SECTION: Heading -->
                    <tbody><tr id="section-1468266" class="section heading">
                      <th style="mso-line-height-rule: exactly; color: #4b4b4b; padding: 26px 52px 13px;" bgcolor="#ffffff">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation" style="color: #4b4b4b;" bgcolor="#ffffff">
                        <tbody><tr style="color: #4b4b4b;" bgcolor="#ffffff">
                        <th style="mso-line-height-rule: exactly; color: #4b4b4b;" bgcolor="#ffffff" valign="top">
                          <h1 data-key="1468266_heading" style="font-family: Georgia,serif,"Playfair Display"; font-size: 28px; line-height: 46px; font-weight: 700; color: #4b4b4b; text-transform: none; background-color: #ffffff; margin: 0;">Order Delivered !</h1>
                        </th>
                        </tr>
                      </tbody></table>
                      </th>
                    </tr>
                    <!-- END SECTION: Heading -->
                    <!-- BEGIN SECTION: Introduction -->
                    <tr id="section-1468267" class="section introduction">
                      <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                      
                        <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0 0 13px;" align="center">
                        <span data-key="1468267_greeting_text" style="text-align: center; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363;">
                          Hey
                        </span>
                        ' . $name . ',
                        </p>
                      
                      
                      <p data-key="1468267_introduction_text" class="text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;" align="center">
                      </p>
                      <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;" align="center">Your Dish Deleivered on ' . $delievered_on . '</p>
                       </th>
                    </tr>
                    <!-- END SECTION: Introduction -->
                  
                    <tr id="section-1468271" class="section products_with_pricing">
                      
                      <!-- Bold 1 -->
                      
                      <!-- end Bold 1 -->
                      <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                        <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                        <tbody><tr>
                          <th class="product-table" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                          <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                            <tbody><tr>
                            <th colspan="2" class="product-table-h3-wrapper" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                              <h3 data-key="1468271_item" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Items ordered</h3>
                            </th>
                            </tr>
                         
                            
                            ';
  $total_price = 0;
  foreach ($getorderdetails as $list) {
    $item_price = $list['qty'] * $list['price'];
    $total_price = $total_price + $item_price;
    $html .= '<tr>
                              <th class="table-stack product-image-wrapper stack-column-center" width="1" style="mso-line-height-rule: exactly; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; padding: 13px 13px 13px 0;" bgcolor="#ffffff" valign="middle">
    <img width="140" class="product-image" src="' . $website_path . 'admin/media/dish/' . $image . '" alt="DIsh Image" style="vertical-align: middle; text-align: center; width: 140px; max-width: 140px; height: auto !important; border-radius: 1px; padding: 0px;">
                              </th>
                              <th class="product-details-wrapper table-stack stack-column" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;" bgcolor="#ffffff" valign="middle">
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                                <tbody><tr>
                                
                                <th class="line-item-description" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 6px 13px 0;" align="left" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">
                                  <a href="https://us.tens.co/tools/emails/click/order-confirmation/1/product/link?url=https%3A%2F%2Fus.tens.co%2Fproducts%2Ftravel-case" target="_blank" style="color: #666363; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: left !important; font-weight: bold;">
                                  ' . $list['dish'] . '
                                  </a>
                                  <br>
                                  <span class="muted" style="text-align: center; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 26px; font-weight: normal; color: #bdbdbd; word-break: break-all;">
                                    
                                  ' . $list['attribute'] . '
                                      </span>
                                  </p>
                                  </th>
                                  
                                  <th style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top"></th>
                                  
                                  <th class="right line-item-qty" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 13px;" align="right" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                    ×&nbsp;1
                                  </p>
                                  </th>
                                  <th class="right line-item-line-price" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 26px;" align="right" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                    Rs. ' . $item_price . '
                                  </p>
                                  </th>
                                </tr>
                                </tbody></table>
                              </th>
                              </tr>
                              
                              <tr>
                                <th colspan="2" class="product-empty-row" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top"></th>
                              </tr>
                            ';
  }
  $html .= '<tr class="row-border-bottom">
                            </tbody></table>
                          </th>
                          </tr>
                          <tr>

';

  if ($getOrderById[0]['coupon_code'] != '') {
    $html .= '<th class="pricing-table" style="mso-line-height-rule: exactly; padding: 13px 0;" bgcolor="#ffffff" valign="top">
    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
    
      <tbody>
      <tr class="pricing-table-total-row">
      <th class="table-title" data-key="1468271_total" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Sub Total</th>
      <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">Rs .' . $total_price . '</th>
      </tr>
      
      
      <tr>
      <th class="table-title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">
        <span data-key="1468271_discount" style="font-weight: bold;">Discount</span> (' . $getOrderById[0]['coupon_code'] . ')</th>
        <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">-' . $coupon_value . '</th>
      </tr>
     
      
      <tr class="pricing-table-total-row">
      <th class="table-title" data-key="1468271_total" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Total</th>
      <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">Rs.' . $getOrderById[0]['final_price'] . '</th>
      </tr>
      
      
      
      
      
    </tbody></table>
    </th>
  </tr>
  </tbody></table>
</th>';
  }

  $html .= '
                      </tr>
                      <!-- END SECTION: Products With Pricing -->
                      <!-- BEGIN SECTION: Payment Info -->
                      <tr id="section-1468272" class="section payment_info">
                        <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                        <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                          <!-- PAYMENT INFO -->
                          
                          
                          
                          
                          
                          <tbody><tr>
                            <th colspan="2" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                            <h3 data-key="1468272_payment_info" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 0; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Payment Info</h3>
                            </th>
                          </tr>
                          
                            
                                <!-- PAYMENT METHOD IMAGE -->
                              
                                <tr>
                                  <th class="table-title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">
                                  <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%; font-weight: bold;" role="presentation">
                                    <tbody><tr style="font-weight: bold;">
                                   
                                    <th style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;" align="left" bgcolor="#ffffff" valign="middle">
                                      
                                      ' . strtoupper($payment_type) . '
                                      
                                      
                                    
                                    </th>
                                    </tr>
                                  </tbody></table>
                                  </th>
                                  <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 13px 0;" align="right" bgcolor="#ffffff" valign="middle">
                                  Rs.' . $getOrderById[0]['final_price'] . '
                                  </th>
                                  </tr>
                                
                                
                              </tbody></table>
                              </th>
                            </tr>
                            <!-- END SECTION: Payment Info -->
                            <!-- BEGIN SECTION: Customer And Shipping Address -->
                            <tr id="section-1468273" class="section customer_and_shipping_address">
                              <!-- BEGIN : 2 COLUMNS : BILL_TO -->
                              <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                                <tbody><tr>
                                <!-- BEGIN : Column 1 of 2 : BILL_TO -->
                                <th width="50%" class="column_1_of_2 column_bill_to " style="mso-line-height-rule: exactly;" align="left" bgcolor="#ffffff" valign="top">
                                  <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%;" role="presentation">
                                  <tbody><tr>
                                    <th style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                    <h3 data-key="1468273_bill_to" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="left">Billing Info</h3>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th class="billing_address " style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                    <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">' . $name . '<br>
                                     ' . $address . ' <br>
                                                  ' . $appartment . ', ' . $city . '<br>
                                     ' . $postcode . '<br>
                                     <br>
                                      <a href="mailto:" style="color: #69d766; text-decoration: none !important; text-underline: none; word-wrap: break-word;" target="_blank">' . $email . '</a></p>
                                    </th>
                                  </tr>
                                  </tbody></table>
                                </th>
                                
                                </tr>
                              </tbody></table>
                              </th>
                              <!-- END : 2 COLUMNS : SHIP_TO -->
                            </tr>
                            <!-- END SECTION: Customer And Shipping Address -->
                            <!-- BEGIN SECTION: Divider -->
                            <tr id="section-1468275" class="section divider">
                              <th style="mso-line-height-rule: exactly; padding: 26px 52px;" bgcolor="#ffffff">
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation">
                                <tbody><tr>
                                <th style="mso-line-height-rule: exactly; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid;" bgcolor="#ffffff" valign="top">
                                </th>
                                </tr>
                              </tbody></table>
                              </th>
                            </tr>
                            <!-- END SECTION: Divider -->
                            <!-- BEGIN SECTION: Closing Text -->
                            <tr id="section-1468276" class="section closing_text">
                              <th data-key="1468276_closing_text" class="text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 52px 52px;" align="center" bgcolor="#ffffff">
                              <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363;  padding:15px !important;" align="center">If you need help with anything please dont hesitate to drop us an email: ' . $site_email . ' :)</p>
                              </th>
                            </tr>
                            <!-- END SECTION: Closing Text -->
                            <tr data-id="link-list">
                              <td class="menu_bar menu_bar_6" style="mso-line-height-rule: exactly; padding: 26px 0;" bgcolor="#ffffff">
                              <table class="table_menu_bar" border="0" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tbody><tr>
                                <th class="menu_bar_item first" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #aed767; border-right-color: #dadada; border-right-style: solid; border-left-color: #dadada; border-left-style: none; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                  <a href="' . $website_path . 'dishes" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  Shop
                                  </a>
                                </th>
                                <th class="menu_bar_item" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #aed767; border-right-color: #dadada; border-right-style: solid; border-left-color: #dadada; border-left-style: solid; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                <a href="' . $website_path . 'about-us" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  About Us
                                  </a>
                                </th>
                                <th class="menu_bar_item last" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #bdbdbd; border-right-color: #dadada; border-right-style: none; border-left-color: #dadada; border-left-style: solid; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                <a href="' . $website_path . 'contact-us" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  Contact
                                  </a>
                                </th>
                                </tr>
                              </tbody></table>
                              </td>
                            </tr>
                            </tbody></table>
                          </td>
                          </tr>
                        </tbody></table>
                        <!-- END : SECTION : MAIN -->
                        <!-- BEGIN : SECTION : FOOTER -->
                        <table class="section_wrapper footer" data-id="footer" id="section-footer" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                          <tbody><tr>
                          <td class="section_wrapper_th" style="mso-line-height-rule: exactly; padding: 0 52px;" bgcolor="#ffffff">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                            <!-- BEGIN : 2 COLUMNS : SOCIAL_BLOCK -->
                            <tbody><tr><th style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                              <tbody><tr>
                                <!-- BEGIN : Column 1 of 2 : SOCIAL_BLOCK -->
                                <th width="50%" class="column_1_of_2 column_social_block " style="mso-line-height-rule: exactly; padding-top: 26px; padding-bottom: 26px; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; border-right-width: 2px; border-right-color: #dadada; border-right-style: solid;" align="center" bgcolor="#ffffff" valign="top">
                                <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; text-align: center;" role="presentation">
                                  <!-- Social heading : BEGIN -->
                                  <tbody><tr style="" align="center">
                                  <th class="column_footer_title " width="100%" style="mso-line-height-rule: exactly; padding-right: 5%; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;" align="center" bgcolor="#ffffff" valign="top">
                                    <p data-key="section_footer_title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none; margin: 0 0 13px;" align="center">Lets hang out?</p>
                                  </th>
                                  </tr>
                                  <!-- Social heading : END -->
                                  <!-- Store Address : BEGIN -->
                                  <tr style="" align="center">
                                  <th class="column_shop_social_icons " width="100%" style="mso-line-height-rule: exactly; padding-right: 5%;" align="center" bgcolor="#ffffff" valign="top">
                                    <a class="social-link" href="' . $facebook . '" target="_blank" title="Facebook" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Facebook" src="https://orderlyemails.com/facebook_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0 0px;">
                                    </a>
                                    <a class="social-link" href="' . $twitter . '" target="_blank" title="Twitter" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Twitter" src="https://orderlyemails.com/twitter_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;">
                                    </a>
                                    <a class="social-link" href="' . $instagram . '" target="_blank" title="Instagram" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Instagram" src="https://orderlyemails.com/instagram_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;">
                                    </a>
                                    <a class="social-link" href="' . $youtube . '" target="_blank" title="YouTube" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="YouTube" src="https://orderlyemails.com/youtube_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 0px 0 6px;">
                                    </a>
                                  </th>
                                  </tr>
                                </tbody></table>
                                </th>
                                <!-- END : Column 1 of 2 : SOCIAL_BLOCK -->
                                <!-- BEGIN : Column 2 of 2 : SHOP_BLOCK -->
                                <th width="50%" class="column_2_of_2 column_shop_block " style="mso-line-height-rule: exactly; padding-top: 26px; padding-bottom: 26px; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;" align="center" bgcolor="#ffffff" valign="top">
                                <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; text-align: center;" role="presentation">
                                  <!-- Store Address : BEGIN -->
                                  <tbody><tr style="" align="center">
                                  <th class="column_shop_block2 " data-key="section_shop_block2" width="100%" style="mso-line-height-rule: exactly; padding-left: 5%; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;" align="center" bgcolor="#ffffff" valign="top">
                                    <br style="text-align: center;">
                                    ' . $site_address . '
                                  </th>
                                  </tr>
                                  <!-- Store Address : END -->
                                </tbody></table>
                                </th>
                                <!-- END : Column 2 of 2 : SHOP_BLOCK -->
                              </tr>
                              </tbody></table>
                            </th>
                            <!-- END : 2 COLUMNS : SHOP_BLOCK -->
                            </tr><tr>
                              <th data-id="store-info" style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Store Website : BEGIN -->
                                <tbody><tr>
                                <th class="column_shop_block1 " width="100%" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none; padding-bottom: 13px; padding-top: 26px;" align="center" bgcolor="#ffffff">
                                  <a href="' . $website_path . '" target="_blank" data-key="section_shop_block1" style="color: #69d766; text-decoration: none !important; text-underline: none; font-size: 14px; font-weight: 400; text-transform: none;">Food Ordering</a>
                                </th>
                                </tr>
                                <!-- Store Website : END -->
                              </tbody></table>
                              </th>
                            </tr>
                            
                            </tbody></table>
                          </td>
                          </tr>
                        </tbody></table>
                        <!-- END : SECTION : FOOTER -->
                        </th>
                      </tr>
                      </tbody></table>
                    </center>
                    </th>
                  </tr>
                  </tbody>
                </table>
    
  </body>
  </html>
  ';
  return $html;
}
function send_cancel_order_email($conn, $oid)
{
  $getUserDetailsBy = getUserDetailsByid();
  $getsettings = getSITEsettings($conn);
  $facebook = $getsettings['facebook'];
  $instagram = $getsettings['instagram'];
  $twitter = $getsettings['twitter'];
  $youtube = $getsettings['youtube'];
  $logo = $getsettings['logo'];
  $site_address = $getsettings['site_address'];
  $site_email = $getsettings['site_email'];
  $website_path = $getsettings['website_path'];
  // print_r($getUserDetailsBy);
  $name = $getUserDetailsBy['name'];
  $email = $getUserDetailsBy['email'];
  $getOrderById = getOrderById($conn, $oid);
  //  print_r($getOrder);
  $order_id = $getOrderById[0]['ID'];
  $added_on = $getOrderById[0]['added_on'];
  $total_amount = $getOrderById[0]['total_price'];
  $address = $getOrderById[0]['address'];
  $delievered_on = $getOrderById[0]['delievered_on'];
  $city = $getOrderById[0]['city'];
  $appartment = $getOrderById[0]['appartment'];
  $postcode = $getOrderById[0]['postcode'];
  $payment_type = $getOrderById[0]['payment_type'];
  $order_cancelAt = $getOrderById[0]['order_cancelAt'];
  $getorderdetails = getorderdetails($conn, $oid);
  $image = $getorderdetails[0]['image'];
  $coupon_code = $getOrderById[0]['coupon_code'];
  $couponsel = "select coupon_value from coupon where coupon_code='$coupon_code'";
  $Res = mysqli_query($conn, $couponsel);
  $cRow = mysqli_fetch_assoc($Res);
  $coupon_value = $cRow['coupon_value'];

  $html = '<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
  
      <style type="text/css" data-premailer="ignore">
          html, body {
          Margin: 0 auto !important;
          padding: 0 !important;
          width: 100% !important;
            height: 100% !important;
          }
  
          * {
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
          text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
          }
         
          .ExternalClass {
          width: 100%;
          }
      
          div[style*="Margin: 16px 0"] {
            Margin:0 !important;
          }
        
          table,
          th {
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          }
          
          .ExternalClass,
          .ExternalClass * {
          line-height: 100% !important;
          }
          
          table {
          border-spacing: 0 !important;
          border-collapse: collapse !important;
          border: none;
          Margin: 0 auto;
          }
          div[style*="Margin: 16px 0"] {
            Margin:0 !important;
          }
         
          img {
          -ms-interpolation-mode:bicubic;
          }
      
          .yshortcuts a {
          border-bottom: none !important;
          }
          
          *[x-apple-data-detectors],  /* iOS */
          .x-gmail-data-detectors,    /* Gmail */
          .x-gmail-data-detectors *,
          .aBn {
            border-bottom: none !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
          }
        
          .a6S {
            display: none !important;
            opacity: 0.01 !important;
          }
          img.g-img + div {
            display:none !important;
          }
         
          a,
          a:link,
          a:visited {
            color: #a1ff9e;
            text-decoration: none !important;
          }
          .header a {
            color: #c3c3c3;
            text-decoration: none;
            text-underline: none;
          }
          .main a {
            color: #a1ff9e;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
          }
          .main .section.customer_and_shipping_address a,
          .main .section.shipping_address_and_fulfillment_details a {
            color: #666363;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
          }
          .footer a {
            color: #a1ff9e;
            text-decoration: none;
            text-underline: none;
          }
        
          img {
          border: none !important;
          outline: none !important;
          text-decoration:none !important;
          }
         
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Playfair Display"] {
            font-family: "Playfair Display",Georgia,serif !important;
          }
          td.menu_bar_1 a:hover,
          td.menu_bar_6 a:hover {
          color: #a1ff9e !important;
          }
          th.related_product_wrapper.first {
          border-right: 13px solid #ffffff;
          padding-right: 6px;
          }
          th.related_product_wrapper.last {
          border-left: 13px solid #ffffff;
          padding-left: 6px;
          }
      </style>
    
      <link href="https://fonts.googleapis.com/css?family=Karla:400,700%7CPlayfair+Display:700,400%7CKarla:700,400%7CKarla:700,700" rel="stylesheet" type="text/css" data-premailer="ignore">
      <!--<![endif]-->
        <style type="text/css" data-premailer="ignore">
        /* Media Queries */
          /* What it does: Removes right gutter in Gmail iOS app */
          @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
            .container {
              min-width: 375px !important;
            }
          }
          /* Main media query for responsive styles */
          @media only screen and (max-width:480px) {
          
            .email-container {
            width: 100% !important;
            min-width: 100% !important;
            }
            .section > th {
            padding: 13px 26px 13px 26px !important;
            }
            .section.divider > th {
            padding: 26px 26px !important;
            }
            .main .section:first-child > th,
            .main .section:first-child > td {
              padding-top: 26px !important;
            }
            .main .section:nth-last-child(2) > th,
            .main .section:nth-last-child(2) > td {
              padding-bottom: 52px !important;
            }
            .section.recommended_products > th,
            .section.discount > th {
              padding: 26px 26px !important;
            }
            /* What it does: Forces images to resize to the width of their container. */
            img.fluid,
            img.fluid-centered {
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            height: auto !important;
            Margin: auto !important;
            box-sizing: border-box;
            }
            /* and center justify these ones. */
            img.fluid-centered {
            Margin: auto !important;
            }
        
            /* What it does: Forces table cells into full-width rows. */
            th.stack-column,
            th.stack-column-left,
            th.stack-column-center,
            th.related_product_wrapper,
            .column_1_of_2,
            .column_2_of_2 {
            display: block !important;
            width: 100% !important;
            min-width: 100% !important;
            direction: ltr !important;
            box-sizing: border-box;
            }
            /* and left justify these ones. */
            th.stack-column-left {
            text-align: left !important;
            }
            /* and center justify these ones. */
            th.stack-column-center,
            th.related_product_wrapper {
            text-align: center !important;
            border-right: none !important;
            border-left: none !important;
            }
            .column_button,
            .column_button > table,
            .column_button > table th {
            width: 100% !important;
            text-align: center !important;
            Margin: 0 !important;
            }
            .column_1_of_2 {
            padding-bottom: 26px !important;
            }
            .column_1_of_2 th {
              padding-right: 0 !important;
            }
            .column_2_of_2 th {
              padding-left:  0 !important;
            }
            .column_text_after_button {
            padding: 0 13px !important;
            }
            /* Adjust product images */
            th.table-stack {
            padding: 0 !important;
            }
            th.product-image-wrapper {
              padding: 26px 0 13px 0 !important;
            }
            img.product-image {
              width: 240px !important;
              max-width: 240px !important;
            }
            tr.row-border-bottom th.product-image-wrapper {
            border-bottom: none !important;
            }
            th.related_product_wrapper.first,
            th.related_product_wrapper.last {
            padding-right: 0 !important;
            padding-left: 0 !important;
            }
            .text_banner th.banner_container {
            padding: 13px !important;
            }
            .mobile_app_download .column_1_of_2 .image_container {
            padding-bottom: 0 !important;
            }
            .mobile_app_download .column_2_of_2 .image_container {
            padding-top: 0 !important;
            }
          }
        </style>
        <style type="text/css" data-premailer="ignore">
        /* Custom Media Queries */
          @media only screen and (max-width:480px) {
          .column_logo {
            display: block !important;
            width: 100% !important;
            min-width: 100% !important;
            direction: ltr !important;
            text-align: center !important;
          }
          p,
          .column_1_of_2 th p,
          .column_2_of_2 th p,
          .order_notes *,
          .invoice_link * {
            text-align: center !important;
          }
          .line-item-description p {
            text-align: left !important;
          }
          .line-item-price p,
          .line-item-qty p,
          .line-item-line-price p {
            text-align: right !important;
          }
          h1, h2, h3,
          .column_1_of_2 th,
          .column_2_of_2 th {
            text-align: center !important;
          }
          td.order-table-title {
            text-align: center !important;
          }
          .footer .column_1_of_2 {
            border-right: 0 !important;
            border-bottom: 0 !important;
          }
          .footer .section_wrapper_th {
            padding: 0 17px;
          }
          }
        </style>
      </head>
      <body class="body" id="body" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#a1ff9e" style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;">
       
      
        <table class="container container_full" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse: collapse; min-width: 100%;" role="presentation" bgcolor="#a1ff9e">
          <tbody>
          <tr>
            <th valign="top" style="mso-line-height-rule: exactly;">
            <center style="width: 100%;">
              <table border="0" width="600" cellpadding="0" cellspacing="0" align="center" style="width: 600px; min-width: 600px; max-width: 600px; margin: auto;" class="email-container" role="presentation">
              <tbody><tr>
                <th valign="top" style="mso-line-height-rule: exactly;">
                <!-- BEGIN : SECTION : HEADER -->
                <table class="section_wrapper header" data-id="header" id="section-header" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                  <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly; padding-top: 52px; padding-bottom: 26px;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                    <tbody><tr>
                      <th class="column_logo" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px;" align="center" bgcolor="#ffffff">
                      <!-- Logo : BEGIN -->
                      <a href="' . $website_path . '" target="_blank" style="color: #c3c3c3; text-decoration: none !important; text-underline: none;">
                        <img src="' . $website_path . 'images/logo/' . $logo . '" class="logo " width="96" border="0" style="width: 96px; height: auto !important; display: block; text-align: center; margin: auto;">
                      </a>
                      <!-- Logo : END -->
                      </th>
                    </tr>
                    </tbody></table>
                  </td>
                  </tr>
                </tbody></table>
                <!-- END : SECTION : HEADER -->
                <!-- BEGIN : SECTION : MAIN -->
                <table class="section_wrapper main" data-id="main" id="section-main" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                  <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" id="mixContainer" role="presentation">
                    <!-- BEGIN SECTION: Heading -->
                    <tbody><tr id="section-1468266" class="section heading">
                      <th style="mso-line-height-rule: exactly; color: #4b4b4b; padding: 26px 52px 13px;" bgcolor="#ffffff">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation" style="color: #4b4b4b;" bgcolor="#ffffff">
                        <tbody><tr style="color: #4b4b4b;" bgcolor="#ffffff">
                        <th style="mso-line-height-rule: exactly; color: #4b4b4b;" bgcolor="#ffffff" valign="top">
                          <h1 data-key="1468266_heading" style="font-family: Georgia,serif,"Playfair Display"; font-size: 28px; line-height: 46px; font-weight: 700; color: #4b4b4b; text-transform: none; background-color: #ffffff; margin: 0;">Order Cancelled !</h1>
                        </th>
                        </tr>
                      </tbody></table>
                      </th>
                    </tr>
                    <!-- END SECTION: Heading -->
                    <!-- BEGIN SECTION: Introduction -->
                    <tr id="section-1468267" class="section introduction">
                      <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                      
                        <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0 0 13px;" align="center">
                        <span data-key="1468267_greeting_text" style="text-align: center; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363;">
                          Hey
                        </span>
                        ' . $name . ',
                        </p>
                      
                      
                      <p data-key="1468267_introduction_text" class="text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;" align="center">
                      </p>
                      <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 13px 0;" align="center">Your Dish Cancelled at ' . $order_cancelAt . '</p>
                       </th>
                    </tr>
                    <tr>
                        <img src="' . $website_path . 'images/cancel-order.png" width="85" border="0" style="width: 85px; height: auto !important; display: block; text-align: center; margin: auto;">
                        </tr>
                    <!-- END SECTION: Introduction -->
                  
                    <tr id="section-1468271" class="section products_with_pricing">
                      
                      <!-- Bold 1 -->
                      
                      <!-- end Bold 1 -->
                      <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                        <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                        <tbody>
                        <tr>
                          <th class="product-table" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                          <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                            <tbody>
                            
                            <tr>
                            <th colspan="2" class="product-table-h3-wrapper" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                              <h3 data-key="1468271_item" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Items ordered</h3>
                            </th>
                            </tr>
                         
                            
                            ';
  $total_price = 0;
  foreach ($getorderdetails as $list) {
    $item_price = $list['qty'] * $list['price'];
    $total_price = $total_price + $item_price;
    $html .= '<tr>
                              <th class="table-stack product-image-wrapper stack-column-center" width="1" style="mso-line-height-rule: exactly; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; padding: 13px 13px 13px 0;" bgcolor="#ffffff" valign="middle">
    <img width="140" class="product-image" src="' . $website_path . 'admin/media/dish/' . $image . '" alt="DIsh Image" style="vertical-align: middle; text-align: center; width: 140px; max-width: 140px; height: auto !important; border-radius: 1px; padding: 0px;">
                              </th>
                              <th class="product-details-wrapper table-stack stack-column" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;" bgcolor="#ffffff" valign="middle">
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                                <tbody><tr>
                                
                                <th class="line-item-description" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 6px 13px 0;" align="left" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">
                                  <a href="https://us.tens.co/tools/emails/click/order-confirmation/1/product/link?url=https%3A%2F%2Fus.tens.co%2Fproducts%2Ftravel-case" target="_blank" style="color: #666363; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: left !important; font-weight: bold;">
                                  ' . $list['dish'] . '
                                  </a>
                                  <br>
                                  <span class="muted" style="text-align: center; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 26px; font-weight: normal; color: #bdbdbd; word-break: break-all;">
                                    
                                  ' . $list['attribute'] . '
                                      </span>
                                  </p>
                                  </th>
                                  
                                  <th style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top"></th>
                                  
                                  <th class="right line-item-qty" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 13px;" align="right" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                    ×&nbsp;1
                                  </p>
                                  </th>
                                  <th class="right line-item-line-price" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 26px;" align="right" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                    Rs. ' . $item_price . '
                                  </p>
                                  </th>
                                </tr>
                                </tbody></table>
                              </th>
                              </tr>
                              
                              <tr>
                                <th colspan="2" class="product-empty-row" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top"></th>
                              </tr>
                            ';
  }
  $html .= '<tr class="row-border-bottom">
                            </tbody></table>
                          </th>
                          </tr>
                          <tr>

';

  if ($getOrderById[0]['coupon_code'] != '') {
    $html .= '<th class="pricing-table" style="mso-line-height-rule: exactly; padding: 13px 0;" bgcolor="#ffffff" valign="top">
    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
    
      <tbody>
      <tr class="pricing-table-total-row">
      <th class="table-title" data-key="1468271_total" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Sub Total</th>
      <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">Rs .' . $total_price . '</th>
      </tr>
      
      
      <tr>
      <th class="table-title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">
        <span data-key="1468271_discount" style="font-weight: bold;">Discount</span> (' . $getOrderById[0]['coupon_code'] . ')</th>
        <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">-' . $coupon_value . '</th>
      </tr>
     
      
      <tr class="pricing-table-total-row">
      <th class="table-title" data-key="1468271_total" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Total</th>
      <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">Rs.' . $getOrderById[0]['final_price'] . '</th>
      </tr>
      
      
      
      
      
    </tbody></table>
    </th>
  </tr>
  </tbody></table>
</th>';
  }

  $html .= '
                      </tr>
                      <!-- END SECTION: Products With Pricing -->
                      <!-- BEGIN SECTION: Payment Info -->
                      <tr id="section-1468272" class="section payment_info">
                        <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                        <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                          <!-- PAYMENT INFO -->
                          
                          
                          
                          
                          
                          <tbody><tr>
                            <th colspan="2" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                            <h3 data-key="1468272_payment_info" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 0; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Payment Info</h3>
                            </th>
                          </tr>
                          
                            
                                <!-- PAYMENT METHOD IMAGE -->
                              
                                <tr>
                                  <th class="table-title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">
                                  <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%; font-weight: bold;" role="presentation">
                                    <tbody><tr style="font-weight: bold;">
                                   
                                    <th style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;" align="left" bgcolor="#ffffff" valign="middle">
                                      
                                      ' . strtoupper($payment_type) . '
                                      
                                      
                                    
                                    </th>
                                    </tr>
                                  </tbody></table>
                                  </th>
                                  <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 13px 0;" align="right" bgcolor="#ffffff" valign="middle">
                                  Rs.' . $getOrderById[0]['final_price'] . '
                                  </th>
                                  </tr>
                                
                                
                              </tbody></table>
                              </th>
                            </tr>
                            <!-- END SECTION: Payment Info -->
                            <!-- BEGIN SECTION: Customer And Shipping Address -->
                            <tr id="section-1468273" class="section customer_and_shipping_address">
                              <!-- BEGIN : 2 COLUMNS : BILL_TO -->
                              <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                                <tbody><tr>
                                <!-- BEGIN : Column 1 of 2 : BILL_TO -->
                                <th width="50%" class="column_1_of_2 column_bill_to " style="mso-line-height-rule: exactly;" align="left" bgcolor="#ffffff" valign="top">
                                  <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%;" role="presentation">
                                  <tbody><tr>
                                    <th style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                    <h3 data-key="1468273_bill_to" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="left">Billing Info</h3>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th class="billing_address " style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                    <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">' . $name . '<br>
                                     ' . $address . ' <br>
                                                  ' . $appartment . ', ' . $city . '<br>
                                     ' . $postcode . '<br>
                                     <br>
                                      <a href="mailto:" style="color: #69d766; text-decoration: none !important; text-underline: none; word-wrap: break-word;" target="_blank">' . $email . '</a></p>
                                    </th>
                                  </tr>
                                  </tbody></table>
                                </th>
                                
                                </tr>
                              </tbody></table>
                              </th>
                              <!-- END : 2 COLUMNS : SHIP_TO -->
                            </tr>
                            <!-- END SECTION: Customer And Shipping Address -->
                            <!-- BEGIN SECTION: Divider -->
                            <tr id="section-1468275" class="section divider">
                              <th style="mso-line-height-rule: exactly; padding: 26px 52px;" bgcolor="#ffffff">
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation">
                                <tbody><tr>
                                <th style="mso-line-height-rule: exactly; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid;" bgcolor="#ffffff" valign="top">
                                </th>
                                </tr>
                              </tbody></table>
                              </th>
                            </tr>
                            <!-- END SECTION: Divider -->
                            <!-- BEGIN SECTION: Closing Text -->
                            <tr id="section-1468276" class="section closing_text">
                              <th data-key="1468276_closing_text" class="text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 52px 52px;" align="center" bgcolor="#ffffff">
                              <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363;  padding:15px !important;" align="center">If you need help with anything please dont hesitate to drop us an email: ' . $site_email . ' :)</p>
                              </th>
                            </tr>
                            <!-- END SECTION: Closing Text -->
                            <tr data-id="link-list">
                              <td class="menu_bar menu_bar_6" style="mso-line-height-rule: exactly; padding: 26px 0;" bgcolor="#ffffff">
                              <table class="table_menu_bar" border="0" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tbody><tr>
                                <th class="menu_bar_item first" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #aed767; border-right-color: #dadada; border-right-style: solid; border-left-color: #dadada; border-left-style: none; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                  <a href="' . $website_path . 'dishes" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  Shop
                                  </a>
                                </th>
                                <th class="menu_bar_item" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #aed767; border-right-color: #dadada; border-right-style: solid; border-left-color: #dadada; border-left-style: solid; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                <a href="' . $website_path . 'about-us" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  About Us
                                  </a>
                                </th>
                                <th class="menu_bar_item last" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #bdbdbd; border-right-color: #dadada; border-right-style: none; border-left-color: #dadada; border-left-style: solid; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                <a href="' . $website_path . 'contact-us" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  Contact
                                  </a>
                                </th>
                                </tr>
                              </tbody></table>
                              </td>
                            </tr>
                            </tbody></table>
                          </td>
                          </tr>
                        </tbody></table>
                        <!-- END : SECTION : MAIN -->
                        <!-- BEGIN : SECTION : FOOTER -->
                        <table class="section_wrapper footer" data-id="footer" id="section-footer" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                          <tbody><tr>
                          <td class="section_wrapper_th" style="mso-line-height-rule: exactly; padding: 0 52px;" bgcolor="#ffffff">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                            <!-- BEGIN : 2 COLUMNS : SOCIAL_BLOCK -->
                            <tbody><tr><th style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                              <tbody><tr>
                                <!-- BEGIN : Column 1 of 2 : SOCIAL_BLOCK -->
                                <th width="50%" class="column_1_of_2 column_social_block " style="mso-line-height-rule: exactly; padding-top: 26px; padding-bottom: 26px; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; border-right-width: 2px; border-right-color: #dadada; border-right-style: solid;" align="center" bgcolor="#ffffff" valign="top">
                                <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; text-align: center;" role="presentation">
                                  <!-- Social heading : BEGIN -->
                                  <tbody><tr style="" align="center">
                                  <th class="column_footer_title " width="100%" style="mso-line-height-rule: exactly; padding-right: 5%; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;" align="center" bgcolor="#ffffff" valign="top">
                                    <p data-key="section_footer_title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none; margin: 0 0 13px;" align="center">Lets hang out?</p>
                                  </th>
                                  </tr>
                                  <!-- Social heading : END -->
                                  <!-- Store Address : BEGIN -->
                                  <tr style="" align="center">
                                  <th class="column_shop_social_icons " width="100%" style="mso-line-height-rule: exactly; padding-right: 5%;" align="center" bgcolor="#ffffff" valign="top">
                                    <a class="social-link" href="' . $facebook . '" target="_blank" title="Facebook" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Facebook" src="https://orderlyemails.com/facebook_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0 0px;">
                                    </a>
                                    <a class="social-link" href="' . $twitter . '" target="_blank" title="Twitter" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Twitter" src="https://orderlyemails.com/twitter_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;">
                                    </a>
                                    <a class="social-link" href="' . $instagram . '" target="_blank" title="Instagram" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Instagram" src="https://orderlyemails.com/instagram_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;">
                                    </a>
                                    <a class="social-link" href="' . $youtube . '" target="_blank" title="YouTube" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="YouTube" src="https://orderlyemails.com/youtube_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 0px 0 6px;">
                                    </a>
                                  </th>
                                  </tr>
                                </tbody></table>
                                </th>
                                <!-- END : Column 1 of 2 : SOCIAL_BLOCK -->
                                <!-- BEGIN : Column 2 of 2 : SHOP_BLOCK -->
                                <th width="50%" class="column_2_of_2 column_shop_block " style="mso-line-height-rule: exactly; padding-top: 26px; padding-bottom: 26px; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;" align="center" bgcolor="#ffffff" valign="top">
                                <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; text-align: center;" role="presentation">
                                  <!-- Store Address : BEGIN -->
                                  <tbody><tr style="" align="center">
                                  <th class="column_shop_block2 " data-key="section_shop_block2" width="100%" style="mso-line-height-rule: exactly; padding-left: 5%; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;" align="center" bgcolor="#ffffff" valign="top">
                                    <br style="text-align: center;">
                                    ' . $site_address . '
                                  </th>
                                  </tr>
                                  <!-- Store Address : END -->
                                </tbody></table>
                                </th>
                                <!-- END : Column 2 of 2 : SHOP_BLOCK -->
                              </tr>
                              </tbody></table>
                            </th>
                            <!-- END : 2 COLUMNS : SHOP_BLOCK -->
                            </tr><tr>
                              <th data-id="store-info" style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Store Website : BEGIN -->
                                <tbody><tr>
                                <th class="column_shop_block1 " width="100%" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none; padding-bottom: 13px; padding-top: 26px;" align="center" bgcolor="#ffffff">
                                  <a href="' . $website_path . '" target="_blank" data-key="section_shop_block1" style="color: #69d766; text-decoration: none !important; text-underline: none; font-size: 14px; font-weight: 400; text-transform: none;">Food Ordering</a>
                                </th>
                                </tr>
                                <!-- Store Website : END -->
                              </tbody></table>
                              </th>
                            </tr>
                            
                            </tbody></table>
                          </td>
                          </tr>
                        </tbody></table>
                        <!-- END : SECTION : FOOTER -->
                        </th>
                      </tr>
                      </tbody></table>
                    </center>
                    </th>
                  </tr>
                  </tbody>
                </table>
    
  </body>
  </html>
  ';
  return $html;
}


function send_ontheway_order_email($conn, $oid)
{
  $getUserDetailsBy = getUserDetailsByid();
  $getsettings = getSITEsettings($conn);
  $facebook = $getsettings['facebook'];
  $instagram = $getsettings['instagram'];
  $twitter = $getsettings['twitter'];
  $youtube = $getsettings['youtube'];
  $logo = $getsettings['logo'];
  $site_address = $getsettings['site_address'];
  $site_email = $getsettings['site_email'];
  $website_path = $getsettings['website_path'];
  // print_r($getUserDetailsBy);
  $name = $getUserDetailsBy['name'];
  $email = $getUserDetailsBy['email'];
  $getOrderById = getOrderById($conn, $oid);
  //  print_r($getOrder);
  $order_id = $getOrderById[0]['ID'];
  $added_on = $getOrderById[0]['added_on'];
  $total_amount = $getOrderById[0]['total_price'];
  $address = $getOrderById[0]['address'];
  $delievered_on = $getOrderById[0]['delievered_on'];
  $city = $getOrderById[0]['city'];
  $appartment = $getOrderById[0]['appartment'];
  $postcode = $getOrderById[0]['postcode'];
  $payment_type = $getOrderById[0]['payment_type'];
  $getorderdetails = getorderdetails($conn, $oid);
  $image = $getorderdetails[0]['image'];
  $coupon_code = $getOrderById[0]['coupon_code'];

  $couponsel = "select coupon_value from coupon where coupon_code='$coupon_code'";
  $Res = mysqli_query($conn, $couponsel);
  $cRow = mysqli_fetch_assoc($Res);
  $coupon_value = $cRow['coupon_value'];



  $html = '<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
  
      <style type="text/css" data-premailer="ignore">
          html, body {
          Margin: 0 auto !important;
          padding: 0 !important;
          width: 100% !important;
            height: 100% !important;
          }
  
          * {
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
          text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
          }
         
          .ExternalClass {
          width: 100%;
          }
      
          div[style*="Margin: 16px 0"] {
            Margin:0 !important;
          }
        
          table,
          th {
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          }
          
          .ExternalClass,
          .ExternalClass * {
          line-height: 100% !important;
          }
          
          table {
          border-spacing: 0 !important;
          border-collapse: collapse !important;
          border: none;
          Margin: 0 auto;
          }
          div[style*="Margin: 16px 0"] {
            Margin:0 !important;
          }
         
          img {
          -ms-interpolation-mode:bicubic;
          }
      
          .yshortcuts a {
          border-bottom: none !important;
          }
          
          *[x-apple-data-detectors],  /* iOS */
          .x-gmail-data-detectors,    /* Gmail */
          .x-gmail-data-detectors *,
          .aBn {
            border-bottom: none !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
          }
        
          .a6S {
            display: none !important;
            opacity: 0.01 !important;
          }
          img.g-img + div {
            display:none !important;
          }
         
          a,
          a:link,
          a:visited {
            color: #a1ff9e;
            text-decoration: none !important;
          }
          .header a {
            color: #c3c3c3;
            text-decoration: none;
            text-underline: none;
          }
          .main a {
            color: #a1ff9e;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
          }
          .main .section.customer_and_shipping_address a,
          .main .section.shipping_address_and_fulfillment_details a {
            color: #666363;
            text-decoration: none;
            text-underline: none;
            word-wrap: break-word;
          }
          .footer a {
            color: #a1ff9e;
            text-decoration: none;
            text-underline: none;
          }
        
          img {
          border: none !important;
          outline: none !important;
          text-decoration:none !important;
          }
         
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Karla"] {
            font-family: "Karla",-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif !important;
          }
          [style*="Playfair Display"] {
            font-family: "Playfair Display",Georgia,serif !important;
          }
          td.menu_bar_1 a:hover,
          td.menu_bar_6 a:hover {
          color: #a1ff9e !important;
          }
          th.related_product_wrapper.first {
          border-right: 13px solid #ffffff;
          padding-right: 6px;
          }
          th.related_product_wrapper.last {
          border-left: 13px solid #ffffff;
          padding-left: 6px;
          }
      </style>
    
      <link href="https://fonts.googleapis.com/css?family=Karla:400,700%7CPlayfair+Display:700,400%7CKarla:700,400%7CKarla:700,700" rel="stylesheet" type="text/css" data-premailer="ignore">
      <!--<![endif]-->
        <style type="text/css" data-premailer="ignore">
        /* Media Queries */
          /* What it does: Removes right gutter in Gmail iOS app */
          @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
            .container {
              min-width: 375px !important;
            }
          }
          /* Main media query for responsive styles */
          @media only screen and (max-width:480px) {
          
            .email-container {
            width: 100% !important;
            min-width: 100% !important;
            }
            .section > th {
            padding: 13px 26px 13px 26px !important;
            }
            .section.divider > th {
            padding: 26px 26px !important;
            }
            .main .section:first-child > th,
            .main .section:first-child > td {
              padding-top: 26px !important;
            }
            .main .section:nth-last-child(2) > th,
            .main .section:nth-last-child(2) > td {
              padding-bottom: 52px !important;
            }
            .section.recommended_products > th,
            .section.discount > th {
              padding: 26px 26px !important;
            }
            /* What it does: Forces images to resize to the width of their container. */
            img.fluid,
            img.fluid-centered {
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            height: auto !important;
            Margin: auto !important;
            box-sizing: border-box;
            }
            /* and center justify these ones. */
            img.fluid-centered {
            Margin: auto !important;
            }
        
            /* What it does: Forces table cells into full-width rows. */
            th.stack-column,
            th.stack-column-left,
            th.stack-column-center,
            th.related_product_wrapper,
            .column_1_of_2,
            .column_2_of_2 {
            display: block !important;
            width: 100% !important;
            min-width: 100% !important;
            direction: ltr !important;
            box-sizing: border-box;
            }
            /* and left justify these ones. */
            th.stack-column-left {
            text-align: left !important;
            }
            /* and center justify these ones. */
            th.stack-column-center,
            th.related_product_wrapper {
            text-align: center !important;
            border-right: none !important;
            border-left: none !important;
            }
            .column_button,
            .column_button > table,
            .column_button > table th {
            width: 100% !important;
            text-align: center !important;
            Margin: 0 !important;
            }
            .column_1_of_2 {
            padding-bottom: 26px !important;
            }
            .column_1_of_2 th {
              padding-right: 0 !important;
            }
            .column_2_of_2 th {
              padding-left:  0 !important;
            }
            .column_text_after_button {
            padding: 0 13px !important;
            }
            /* Adjust product images */
            th.table-stack {
            padding: 0 !important;
            }
            th.product-image-wrapper {
              padding: 26px 0 13px 0 !important;
            }
            img.product-image {
              width: 240px !important;
              max-width: 240px !important;
            }
            tr.row-border-bottom th.product-image-wrapper {
            border-bottom: none !important;
            }
            th.related_product_wrapper.first,
            th.related_product_wrapper.last {
            padding-right: 0 !important;
            padding-left: 0 !important;
            }
            .text_banner th.banner_container {
            padding: 13px !important;
            }
            .mobile_app_download .column_1_of_2 .image_container {
            padding-bottom: 0 !important;
            }
            .mobile_app_download .column_2_of_2 .image_container {
            padding-top: 0 !important;
            }
          }
        </style>
        <style type="text/css" data-premailer="ignore">
        /* Custom Media Queries */
          @media only screen and (max-width:480px) {
          .column_logo {
            display: block !important;
            width: 100% !important;
            min-width: 100% !important;
            direction: ltr !important;
            text-align: center !important;
          }
          p,
          .column_1_of_2 th p,
          .column_2_of_2 th p,
          .order_notes *,
          .invoice_link * {
            text-align: center !important;
          }
          .line-item-description p {
            text-align: left !important;
          }
          .line-item-price p,
          .line-item-qty p,
          .line-item-line-price p {
            text-align: right !important;
          }
          h1, h2, h3,
          .column_1_of_2 th,
          .column_2_of_2 th {
            text-align: center !important;
          }
          td.order-table-title {
            text-align: center !important;
          }
          .footer .column_1_of_2 {
            border-right: 0 !important;
            border-bottom: 0 !important;
          }
          .footer .section_wrapper_th {
            padding: 0 17px;
          }
          }
        </style>
      </head>
      <body class="body" id="body" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#a1ff9e" style="-webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0;">
       
      
        <table class="container container_full" cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse: collapse; min-width: 100%;" role="presentation" bgcolor="#a1ff9e">
          <tbody>
          <tr>
            <th valign="top" style="mso-line-height-rule: exactly;">
            <center style="width: 100%;">
              <table border="0" width="600" cellpadding="0" cellspacing="0" align="center" style="width: 600px; min-width: 600px; max-width: 600px; margin: auto;" class="email-container" role="presentation">
              <tbody><tr>
                <th valign="top" style="mso-line-height-rule: exactly;">
                <!-- BEGIN : SECTION : HEADER -->
                <table class="section_wrapper header" data-id="header" id="section-header" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                  <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly; padding-top: 52px; padding-bottom: 26px;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                    <tbody><tr>
                      <th class="column_logo" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px;" align="center" bgcolor="#ffffff">
                      <!-- Logo : BEGIN -->
                      <a href="' . $website_path . '" target="_blank" style="color: #c3c3c3; text-decoration: none !important; text-underline: none;">
                        <img src="' . $website_path . 'images/logo/' . $logo . '" class="logo " width="96" border="0" style="width: 96px; height: auto !important; display: block; text-align: center; margin: auto;">
                      </a>
                      <!-- Logo : END -->
                      </th>
                    </tr>
                    </tbody></table>
                  </td>
                  </tr>
                </tbody></table>
                <!-- END : SECTION : HEADER -->
                <!-- BEGIN : SECTION : MAIN -->
                <table class="section_wrapper main" data-id="main" id="section-main" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                  <tbody><tr>
                  <td class="section_wrapper_th" style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" id="mixContainer" role="presentation">
                    <!-- BEGIN SECTION: Heading -->
                    <tbody><tr id="section-1468266" class="section heading">
                      <th style="mso-line-height-rule: exactly; color: #4b4b4b; padding: 26px 52px 13px;" bgcolor="#ffffff">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation" style="color: #4b4b4b;" bgcolor="#ffffff">
                        <tbody><tr style="color: #4b4b4b;" bgcolor="#ffffff">
                        <th style="mso-line-height-rule: exactly; color: #4b4b4b;" bgcolor="#ffffff" valign="top">
                          <h1 data-key="1468266_heading" style="font-family: Georgia,serif,"Playfair Display"; font-size: 28px; line-height: 46px; font-weight: 700; color: #4b4b4b; text-transform: none; background-color: #ffffff; margin: 0;">On The Way !</h1>
                        </th>
                        
                        </tr>
                        <tr>
                        <img src="' . $website_path . 'images/delievery.gif" width="85" border="0" style="width: 85px; height: auto !important; display: block; text-align: center; margin: auto;">
                        </tr>
                      </tbody></table>
                      </th>
                    </tr>
                    <!-- END SECTION: Heading -->
                    <!-- BEGIN SECTION: Introduction -->
                    <tr id="section-1468267" class="section introduction">
                      <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                      
                        <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0 0 13px;" align="center">
                        <span data-key="1468267_greeting_text" style="text-align: center; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363;">
                          Hey
                        </span>
                        ' . $name . ' Your Order is On The Way,
                        </p>
                      
                       </th>
                    </tr>
                    <!-- END SECTION: Introduction -->
                  
                    <tr id="section-1468271" class="section products_with_pricing">
                      
                      <!-- Bold 1 -->
                      
                      <!-- end Bold 1 -->
                      <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                        <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                        <tbody><tr>
                          <th class="product-table" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                          <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                            <tbody><tr>
                            <th colspan="2" class="product-table-h3-wrapper" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                              <h3 data-key="1468271_item" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Items ordered</h3>
                            </th>
                            </tr>
                         
                            
                            ';
  $total_price = 0;
  foreach ($getorderdetails as $list) {
    $item_price = $list['qty'] * $list['price'];
    $total_price = $total_price + $item_price;
    $html .= '<tr>
                              <th class="table-stack product-image-wrapper stack-column-center" width="1" style="mso-line-height-rule: exactly; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; padding: 13px 13px 13px 0;" bgcolor="#ffffff" valign="middle">
    <img width="140" class="product-image" src="' . $website_path . 'admin/media/dish/' . $image . '" alt="DIsh Image" style="vertical-align: middle; text-align: center; width: 140px; max-width: 140px; height: auto !important; border-radius: 1px; padding: 0px;">
                              </th>
                              <th class="product-details-wrapper table-stack stack-column" style="mso-line-height-rule: exactly; padding-top: 13px; padding-bottom: 13px; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;" bgcolor="#ffffff" valign="middle">
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                                <tbody><tr>
                                
                                <th class="line-item-description" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 6px 13px 0;" align="left" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">
                                  <a href="https://us.tens.co/tools/emails/click/order-confirmation/1/product/link?url=https%3A%2F%2Fus.tens.co%2Fproducts%2Ftravel-case" target="_blank" style="color: #666363; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: left !important; font-weight: bold;">
                                  ' . $list['dish'] . '
                                  </a>
                                  <br>
                                  <span class="muted" style="text-align: center; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 26px; font-weight: normal; color: #bdbdbd; word-break: break-all;">
                                    
                                  ' . $list['attribute'] . '
                                      </span>
                                  </p>
                                  </th>
                                  
                                  <th style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top"></th>
                                  
                                  <th class="right line-item-qty" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 13px;" align="right" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                    ×&nbsp;1
                                  </p>
                                  </th>
                                  <th class="right line-item-line-price" width="1" style="mso-line-height-rule: exactly; white-space: nowrap; padding: 13px 0 13px 26px;" align="right" bgcolor="#ffffff" valign="top">
                                  <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="right">
                                    Rs. ' . $item_price . '
                                  </p>
                                  </th>
                                </tr>
                                </tbody></table>
                              </th>
                              </tr>
                              
                              <tr>
                                <th colspan="2" class="product-empty-row" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top"></th>
                              </tr>
                            ';
  }
  $html .= '<tr class="row-border-bottom">
                            </tbody></table>
                          </th>
                          </tr>
                          <tr>

';

  if ($getOrderById[0]['coupon_code'] != '') {
    $html .= '<th class="pricing-table" style="mso-line-height-rule: exactly; padding: 13px 0;" bgcolor="#ffffff" valign="top">
    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
    
      <tbody>
      <tr class="pricing-table-total-row">
      <th class="table-title" data-key="1468271_total" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Sub Total</th>
      <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">Rs .' . $total_price . '</th>
      </tr>
      
      
      <tr>
      <th class="table-title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">
        <span data-key="1468271_discount" style="font-weight: bold;">Discount</span> (' . $getOrderById[0]['coupon_code'] . ')</th>
        <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">-' . $coupon_value . '</th>
      </tr>
     
      
      <tr class="pricing-table-total-row">
      <th class="table-title" data-key="1468271_total" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">Total</th>
      <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 6px 0;" align="right" bgcolor="#ffffff" valign="middle">Rs.' . $getOrderById[0]['final_price'] . '</th>
      </tr>
      
      
      
      
      
    </tbody></table>
    </th>
  </tr>
  </tbody></table>
</th>';
  }

  $html .= '
                      </tr>
                      <!-- END SECTION: Products With Pricing -->
                      <!-- BEGIN SECTION: Payment Info -->
                      <tr id="section-1468272" class="section payment_info">
                        <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                        <table class="table-inner" cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%;" role="presentation">
                          <!-- PAYMENT INFO -->
                          
                          
                          
                          
                          
                          <tbody><tr>
                            <th colspan="2" style="mso-line-height-rule: exactly;" bgcolor="#ffffff" valign="top">
                            <h3 data-key="1468272_payment_info" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; border-bottom-width: 0; border-bottom-color: #dadada; border-bottom-style: solid; letter-spacing: 1px; margin: 0;" align="left">Payment Info</h3>
                            </th>
                          </tr>
                          
                            
                                <!-- PAYMENT METHOD IMAGE -->
                              
                                <tr>
                                  <th class="table-title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; width: 65%; padding: 6px 0;" align="left" bgcolor="#ffffff" valign="top">
                                  <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width: 100%; font-weight: bold;" role="presentation">
                                    <tbody><tr style="font-weight: bold;">
                                   
                                    <th style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: bold; color: #666363; padding: 8px 0;" align="left" bgcolor="#ffffff" valign="middle">
                                      
                                      ' . strtoupper($payment_type) . '
                                      
                                      
                                    
                                    </th>
                                    </tr>
                                  </tbody></table>
                                  </th>
                                  <th class="table-text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; width: 35%; padding: 13px 0;" align="right" bgcolor="#ffffff" valign="middle">
                                  Rs.' . $getOrderById[0]['final_price'] . '
                                  </th>
                                  </tr>
                                
                                
                              </tbody></table>
                              </th>
                            </tr>
                            <!-- END SECTION: Payment Info -->
                            <!-- BEGIN SECTION: Customer And Shipping Address -->
                            <tr id="section-1468273" class="section customer_and_shipping_address">
                              <!-- BEGIN : 2 COLUMNS : BILL_TO -->
                              <th style="mso-line-height-rule: exactly; padding: 13px 52px;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                                <tbody><tr>
                                <!-- BEGIN : Column 1 of 2 : BILL_TO -->
                                <th width="50%" class="column_1_of_2 column_bill_to " style="mso-line-height-rule: exactly;" align="left" bgcolor="#ffffff" valign="top">
                                  <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%;" role="presentation">
                                  <tbody><tr>
                                    <th style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                    <h3 data-key="1468273_bill_to" style="font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; color: #bdbdbd; font-size: 16px; line-height: 52px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin: 0;" align="left">Billing Info</h3>
                                    </th>
                                  </tr>
                                  <tr>
                                    <th class="billing_address " style="mso-line-height-rule: exactly; padding-right: 5%;" align="left" bgcolor="#ffffff" valign="top">
                                    <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; margin: 0;" align="left">' . $name . '<br>
                                     ' . $address . ' <br>
                                                  ' . $appartment . ', ' . $city . '<br>
                                     ' . $postcode . '<br>
                                     <br>
                                      <a href="mailto:" style="color: #69d766; text-decoration: none !important; text-underline: none; word-wrap: break-word;" target="_blank">' . $email . '</a></p>
                                    </th>
                                  </tr>
                                  </tbody></table>
                                </th>
                                
                                </tr>
                              </tbody></table>
                              </th>
                              <!-- END : 2 COLUMNS : SHIP_TO -->
                            </tr>
                            <!-- END SECTION: Customer And Shipping Address -->
                            <!-- BEGIN SECTION: Divider -->
                            <tr id="section-1468275" class="section divider">
                              <th style="mso-line-height-rule: exactly; padding: 26px 52px;" bgcolor="#ffffff">
                              <table cellspacing="0" cellpadding="0" border="0" width="100%" role="presentation">
                                <tbody><tr>
                                <th style="mso-line-height-rule: exactly; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid;" bgcolor="#ffffff" valign="top">
                                </th>
                                </tr>
                              </tbody></table>
                              </th>
                            </tr>
                            <!-- END SECTION: Divider -->
                            <!-- BEGIN SECTION: Closing Text -->
                            <tr id="section-1468276" class="section closing_text">
                              <th data-key="1468276_closing_text" class="text" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363; padding: 13px 52px 52px;" align="center" bgcolor="#ffffff">
                              <p style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; line-height: 26px; font-weight: 400; color: #666363;  padding:15px !important;" align="center">If you need help with anything please dont hesitate to drop us an email: ' . $site_email . ' :)</p>
                              </th>
                            </tr>
                            <!-- END SECTION: Closing Text -->
                            <tr data-id="link-list">
                              <td class="menu_bar menu_bar_6" style="mso-line-height-rule: exactly; padding: 26px 0;" bgcolor="#ffffff">
                              <table class="table_menu_bar" border="0" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tbody><tr>
                                <th class="menu_bar_item first" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #aed767; border-right-color: #dadada; border-right-style: solid; border-left-color: #dadada; border-left-style: none; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                  <a href="' . $website_path . 'dishes" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  Shop
                                  </a>
                                </th>
                                <th class="menu_bar_item" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #aed767; border-right-color: #dadada; border-right-style: solid; border-left-color: #dadada; border-left-style: solid; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                <a href="' . $website_path . 'about-us" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  About Us
                                  </a>
                                </th>
                                <th class="menu_bar_item last" style="width: 33%; mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; color: #bdbdbd; border-right-color: #dadada; border-right-style: none; border-left-color: #dadada; border-left-style: solid; letter-spacing: 1px; border: 0;" align="center" bgcolor="#ffffff">
                                <a href="' . $website_path . 'contact-us" target="_blank" style="color: #aed767; text-decoration: none !important; text-underline: none; word-wrap: break-word; text-align: center !important; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 16px; font-weight: 400; line-height: 26px; text-transform: uppercase; letter-spacing: 1px;">
                                  Contact
                                  </a>
                                </th>
                                </tr>
                              </tbody></table>
                              </td>
                            </tr>
                            </tbody></table>
                          </td>
                          </tr>
                        </tbody></table>
                        <!-- END : SECTION : MAIN -->
                        <!-- BEGIN : SECTION : FOOTER -->
                        <table class="section_wrapper footer" data-id="footer" id="section-footer" border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation" bgcolor="#ffffff">
                          <tbody><tr>
                          <td class="section_wrapper_th" style="mso-line-height-rule: exactly; padding: 0 52px;" bgcolor="#ffffff">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                            <!-- BEGIN : 2 COLUMNS : SOCIAL_BLOCK -->
                            <tbody><tr><th style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" align="center" style="min-width: 100%;" role="presentation">
                              <tbody><tr>
                                <!-- BEGIN : Column 1 of 2 : SOCIAL_BLOCK -->
                                <th width="50%" class="column_1_of_2 column_social_block " style="mso-line-height-rule: exactly; padding-top: 26px; padding-bottom: 26px; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid; border-right-width: 2px; border-right-color: #dadada; border-right-style: solid;" align="center" bgcolor="#ffffff" valign="top">
                                <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; text-align: center;" role="presentation">
                                  <!-- Social heading : BEGIN -->
                                  <tbody><tr style="" align="center">
                                  <th class="column_footer_title " width="100%" style="mso-line-height-rule: exactly; padding-right: 5%; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;" align="center" bgcolor="#ffffff" valign="top">
                                    <p data-key="section_footer_title" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none; margin: 0 0 13px;" align="center">Lets hang out?</p>
                                  </th>
                                  </tr>
                                  <!-- Social heading : END -->
                                  <!-- Store Address : BEGIN -->
                                  <tr style="" align="center">
                                  <th class="column_shop_social_icons " width="100%" style="mso-line-height-rule: exactly; padding-right: 5%;" align="center" bgcolor="#ffffff" valign="top">
                                    <a class="social-link" href="' . $facebook . '" target="_blank" title="Facebook" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Facebook" src="https://orderlyemails.com/facebook_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0 0px;">
                                    </a>
                                    <a class="social-link" href="' . $twitter . '" target="_blank" title="Twitter" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Twitter" src="https://orderlyemails.com/twitter_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;">
                                    </a>
                                    <a class="social-link" href="' . $instagram . '" target="_blank" title="Instagram" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="Instagram" src="https://orderlyemails.com/instagram_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 6px 0;">
                                    </a>
                                    <a class="social-link" href="' . $youtube . '" target="_blank" title="YouTube" style="color: #a1ff9e; text-decoration: none !important; text-underline: none; font-size: 14px; text-align: center;">
                                    <img width="32" class="social-icons" alt="YouTube" src="https://orderlyemails.com/youtube_3.png" style="width: 32px; height: auto !important; vertical-align: middle; text-align: center; padding: 6px 0px 0 6px;">
                                    </a>
                                  </th>
                                  </tr>
                                </tbody></table>
                                </th>
                                <!-- END : Column 1 of 2 : SOCIAL_BLOCK -->
                                <!-- BEGIN : Column 2 of 2 : SHOP_BLOCK -->
                                <th width="50%" class="column_2_of_2 column_shop_block " style="mso-line-height-rule: exactly; padding-top: 26px; padding-bottom: 26px; border-top-width: 2px; border-top-color: #dadada; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #dadada; border-bottom-style: solid;" align="center" bgcolor="#ffffff" valign="top">
                                <table align="center" border="0" width="100%" cellpadding="0" cellspacing="0" style="min-width: 100%; text-align: center;" role="presentation">
                                  <!-- Store Address : BEGIN -->
                                  <tbody><tr style="" align="center">
                                  <th class="column_shop_block2 " data-key="section_shop_block2" width="100%" style="mso-line-height-rule: exactly; padding-left: 5%; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none;" align="center" bgcolor="#ffffff" valign="top">
                                    <br style="text-align: center;">
                                    ' . $site_address . '
                                  </th>
                                  </tr>
                                  <!-- Store Address : END -->
                                </tbody></table>
                                </th>
                                <!-- END : Column 2 of 2 : SHOP_BLOCK -->
                              </tr>
                              </tbody></table>
                            </th>
                            <!-- END : 2 COLUMNS : SHOP_BLOCK -->
                            </tr><tr>
                              <th data-id="store-info" style="mso-line-height-rule: exactly;" bgcolor="#ffffff">
                              <table border="0" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Store Website : BEGIN -->
                                <tbody><tr>
                                <th class="column_shop_block1 " width="100%" style="mso-line-height-rule: exactly; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Arial,"Karla"; font-size: 14px; line-height: 24px; font-weight: 400; color: #a3a1a1; text-transform: none; padding-bottom: 13px; padding-top: 26px;" align="center" bgcolor="#ffffff">
                                  <a href="' . $website_path . '" target="_blank" data-key="section_shop_block1" style="color: #69d766; text-decoration: none !important; text-underline: none; font-size: 14px; font-weight: 400; text-transform: none;">Food Ordering</a>
                                </th>
                                </tr>
                                <!-- Store Website : END -->
                              </tbody></table>
                              </th>
                            </tr>
                            
                            </tbody></table>
                          </td>
                          </tr>
                        </tbody></table>
                        <!-- END : SECTION : FOOTER -->
                        </th>
                      </tr>
                      </tbody></table>
                    </center>
                    </th>
                  </tr>
                  </tbody>
                </table>
    
  </body>
  </html>
  ';
  return $html;
}


// function getsale($conn, $start, $end)
// {

//  echo $sql = "select sum(final_price) as price from orders JOIN order_details ON order_details.order_id=orders.ID where added_on between '$start' and '$end'  and order_status='2'";
//   $result = mysqli_query($conn, $sql);
//   while ($row = mysqli_fetch_assoc($result)) {
//     $arr[] = $row;
//     return 'Rs. ' . $row['final_price'];
//   }
// }


function getDashboard_orders($conn, $start, $end)
{
  $arr = array();
  $sql = "select * from orders  where  order_added_on between '$start' and '$end' ";
  //  echo $sql;
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
    // return $row[];
  }
  return $arr;
}
function get_not_detailed_dish_breakfast($conn)
{
  $arr = array();
  // First, select from the "dish" table
  $sql_dish = "SELECT * FROM dish WHERE is_detailed_dish = '0' AND status='1' AND meal LIKE '%breakfast%' ORDER BY is_available DESC";

  $result_dish = mysqli_query($conn, $sql_dish);
  while ($row_dish = mysqli_fetch_assoc($result_dish)) {
    // For each detailed dish, fetch all corresponding details from the "dish_details" table
    $dish_id = $row_dish['ID'];
    $sql_details = "SELECT * FROM dish_details WHERE dish_id = '$dish_id'";
    $result_details = mysqli_query($conn, $sql_details);

    // Create an array to store all details records
    $details_arr = array();

    while ($row_details = mysqli_fetch_assoc($result_details)) {
      // Add each detail record to the details array
      $details_arr[] = $row_details;
    }

    // Assign the details array to the dish record
    $row_dish['details'] = $details_arr;

    // Add the modified dish record to the main array
    $arr[] = $row_dish;
  }
  return $arr;
}

function get_dish_of_the_day($conn)
{
  $arr = array();
  // First, select from the "dish" table
  $sql_dish = "SELECT * FROM dish WHERE is_daydish = '1' AND status='1'";

  $result_dish = mysqli_query($conn, $sql_dish);
  while ($row_dish = mysqli_fetch_assoc($result_dish)) {
    // For each detailed dish, fetch all corresponding details from the "dish_details" table
    $dish_id = $row_dish['ID'];
    $sql_details = "SELECT * FROM dish_details WHERE dish_id = '$dish_id'";
    $result_details = mysqli_query($conn, $sql_details);

    // Create an array to store all details records
    $details_arr = array();

    while ($row_details = mysqli_fetch_assoc($result_details)) {
      // Add each detail record to the details array
      $details_arr[] = $row_details;
    }

    // Assign the details array to the dish record
    $row_dish['details'] = $details_arr;

    // Add the modified dish record to the main array
    $arr[] = $row_dish;
  }
  return $arr;
}


function get_not_detailed_dish_beverages($conn)
{
  $arr = array();
  // First, select from the "dish" table
  $sql_dish = "SELECT * FROM dish WHERE is_detailed_dish = '0' AND status='1' AND meal LIKE '%beverages%' ORDER BY is_available DESC";
  $result_dish = mysqli_query($conn, $sql_dish);
  while ($row_dish = mysqli_fetch_assoc($result_dish)) {
    // For each detailed dish, fetch all corresponding details from the "dish_details" table
    $dish_id = $row_dish['ID'];
    $sql_details = "SELECT * FROM dish_details WHERE dish_id = '$dish_id'";
    $result_details = mysqli_query($conn, $sql_details);

    // Create an array to store all details records
    $details_arr = array();

    while ($row_details = mysqli_fetch_assoc($result_details)) {
      // Add each detail record to the details array
      $details_arr[] = $row_details;
    }

    // Assign the details array to the dish record
    $row_dish['details'] = $details_arr;

    // Add the modified dish record to the main array
    $arr[] = $row_dish;
  }
  return $arr;
}

function get_not_detailed_dish_lunch($conn)
{
  $arr = array();
  // First, select from the "dish" table
  $sql_dish = "SELECT * FROM dish WHERE is_detailed_dish = '0' AND status='1' AND meal LIKE '%lunch%' ORDER BY is_available DESC";

  $result_dish = mysqli_query($conn, $sql_dish);
  while ($row_dish = mysqli_fetch_assoc($result_dish)) {
    // For each detailed dish, fetch all corresponding details from the "dish_details" table
    $dish_id = $row_dish['ID'];
    $sql_details = "SELECT * FROM dish_details WHERE dish_id = '$dish_id'";
    $result_details = mysqli_query($conn, $sql_details);

    // Create an array to store all details records
    $details_arr = array();

    while ($row_details = mysqli_fetch_assoc($result_details)) {
      // Add each detail record to the details array
      $details_arr[] = $row_details;
    }

    // Assign the details array to the dish record
    $row_dish['details'] = $details_arr;

    // Add the modified dish record to the main array
    $arr[] = $row_dish;
  }
  return $arr;
}

function get_not_detailed_dish_noodles($conn)
{
  $arr = array();
  // First, select from the "dish" table
  $sql_dish = "SELECT * FROM dish WHERE is_detailed_dish = '0' AND status='1' AND meal LIKE '%noodles%' ORDER BY is_available DESC";
  $result_dish = mysqli_query($conn, $sql_dish);
  while ($row_dish = mysqli_fetch_assoc($result_dish)) {
    // For each detailed dish, fetch all corresponding details from the "dish_details" table
    $dish_id = $row_dish['ID'];
    $sql_details = "SELECT * FROM dish_details WHERE dish_id = '$dish_id'";
    $result_details = mysqli_query($conn, $sql_details);

    // Create an array to store all details records
    $details_arr = array();

    while ($row_details = mysqli_fetch_assoc($result_details)) {
      // Add each detail record to the details array
      $details_arr[] = $row_details;
    }

    // Assign the details array to the dish record
    $row_dish['details'] = $details_arr;

    // Add the modified dish record to the main array
    $arr[] = $row_dish;
  }
  return $arr;
}

function get_not_detailed_dish_monthlyplan($conn)
{
  $arr = array();
  // First, select from the "dish" table
  $sql_dish = "SELECT * FROM monthly_plan";

  $result_dish = mysqli_query($conn, $sql_dish);
  while ($row_dish = mysqli_fetch_assoc($result_dish)) {
  
    $arr[] = $row_dish;
  }
  return $arr;
}


function get_not_detailed_dish_dinner($conn)
{
  $arr = array();
  // First, select from the "dish" table
  $sql_dish = "SELECT * FROM dish WHERE is_detailed_dish = '0' AND status='1' AND meal LIKE '%dinner%'";

  $result_dish = mysqli_query($conn, $sql_dish);
  while ($row_dish = mysqli_fetch_assoc($result_dish)) {
    // For each detailed dish, fetch all corresponding details from the "dish_details" table
    $dish_id = $row_dish['ID'];
    $sql_details = "SELECT * FROM dish_details WHERE dish_id = '$dish_id'";
    $result_details = mysqli_query($conn, $sql_details);

    // Create an array to store all details records
    $details_arr = array();

    while ($row_details = mysqli_fetch_assoc($result_details)) {
      // Add each detail record to the details array
      $details_arr[] = $row_details;
    }

    // Assign the details array to the dish record
    $row_dish['details'] = $details_arr;

    // Add the modified dish record to the main array
    $arr[] = $row_dish;
  }
  return $arr;
}


function get_dish_Attibutes($conn, $id)
{
  $arr = array();
  // First, select from the "dish" table
  $sql_dish = "SELECT * FROM dish_details WHERE dish_id = '$id'";
  $result_dish = mysqli_query($conn, $sql_dish);
  while ($row_dish = mysqli_fetch_assoc($result_dish)) {

    // Add the modified dish record to the main array
    $arr[] = $row_dish;
  }
  return $arr;
}


function getDashboardtodaycompleteOrders($conn, $start, $end)
{
  if (checkSuperAdminSession()) {
    $filter = " ";
} else {
    $filter = "AND orders.store='" . $_SESSION['store'] . "'";
}
  $arr = array();
  $sql = "select * from orders  where  order_added_on between '$start' and '$end' AND order_status='2' $filter ";
  //  echo $sql;
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
    // return $row[];
  }
  return $arr;
}



function gettodaytotalorder($conn, $start, $end)
{

     if (checkSuperAdminSession()) {
        $filter = " ";
    } else {
        $filter = "AND orders.store='" . $_SESSION['store'] . "'";
    }
  $arr = array();
  $sql = "select * from orders  where  order_added_on between '$start' and '$end' $filter";
  //  echo $sql;
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
    // return $row[];
  }
  return $arr;
}


function getDashboardpendingOrders($conn)
{
    if (checkSuperAdminSession()) {
        $filter = " ";
    } else {
        $filter = "AND orders.store='" . $_SESSION['store'] . "'";
    }
  $arr = array();
  $sql = "select * from orders  where  order_status='1' OR  order_status='3'  $filter";
  //  echo $sql;
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
    // return $row[];
  }
  return $arr;
}

function getDashboardcancelpendingOrders($conn, $start, $end)
{

  if (checkSuperAdminSession()) {
    $filter = " ";
} else {
    $filter = "AND orders.store='" . $_SESSION['store'] . "'";
}

  $arr = array();
  $sql = "select * from orders  where  order_cancelAt between '$start' and '$end' AND  order_status='4' $filter";
  //  echo $sql;
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
    // return $row[];
  }
  return $arr;
}

function searchDish($conn, $search_str = '')
{
  $sql = "select * from dish where dish.status='1'";

  if ($search_str != '') {
    $search_str = strtolower($search_str);
    $sql .= " and (dish.dish like '%$search_str%' or dish.dish_detail like '%$search_str%' or dish.meta_description like '%$search_str%' or dish.meta_keywords like '%$search_str%') ";
  }
  $sql .= " ORDER BY ID DESC";
  // echo $sql;
  $res = mysqli_query($conn, $sql);
  $data = array();
  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
}
