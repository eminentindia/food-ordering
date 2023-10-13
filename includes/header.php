<?php
include('includes/front-controller.php');




//update cart
if (isset($_POST['update'])) {
    foreach ($_POST['qty'] as $key => $val) {
        if (isset($_SESSION['ATECHFOOD_USER_ID'])) {
            if ($val[0] == 0) {
                mysqli_query($conn, "delete from cart where dish_detail_id='$key' and user_id=" . $_SESSION['ATECHFOOD_USER_ID']);
            } else {
                mysqli_query($conn, "update cart set qty='" . $val[0] . "' where dish_detail_id='$key' and user_id=" . $_SESSION['ATECHFOOD_USER_ID']);
            }
        } else {
            if ($val[0] == 0) {
                unset($_SESSION['cart'][$key]['qty']);
            } else {
                $_SESSION['cart'][$key]['qty'] = $val[0];
            }
        }
    }
}

$totalcartcount = getTotalCartCount();
// $totalPrice = 0;
// // echo '<pre>';
// // print_r($cartArr);
// foreach ($cartArr as $list) {
//     $totalPrice = $totalPrice + ($list['qty'] * $list['price']);
// }


//for seo 
//  echo '<pre>';
//  print_r($_SERVER);
$script_name = $_SERVER['REQUEST_URI'];
$script_name_arr = explode('/', $script_name);
$mypage = $script_name_arr[count($script_name_arr) - 1];

// echo $mypage;
$meta_title = "Foodieez Pre-Orders";
$meta_desc = "Foodieez Pre-Orders";
$meta_keyword = "Foodieez Pre-Orders";
$meta_url = SITE_PATH;
$meta_image = "";

$script_name1 = $_SERVER['SCRIPT_FILENAME'];
$script_name_arr1 = explode('/', $script_name1);
$mypage1 = $script_name_arr1[count($script_name_arr1) - 1];

if ($mypage1 == 'single-product.php') {
    $single_dish = $_GET['dishid'];
    $product_meta = mysqli_fetch_assoc(mysqli_query($conn, "select * from dish where slug='$single_dish'"));

    $Dish_ID= $product_meta['ID'];

    $MulImg = mysqli_fetch_assoc(mysqli_query($conn, "select * from images where dish_id='$Dish_ID'"));

    $meta_title = $product_meta['meta_title'];
    $meta_desc = $product_meta['meta_description'];
    $meta_keyword = $product_meta['meta_keywords'];
    $meta_url = SITE_PATH . "dish/" . $single_dish;
    $meta_image = PRODUCT_IMAGE_SITE_PATH . $product_meta['image'];
    
}
if ($mypage == 'dishes') {
    $meta_title = 'Dishes';
}
if ($mypage == 'login') {
    $meta_title = 'Login';
}
if ($mypage == 'register') {
    $meta_title = 'Register';
}
if ($mypage == 'contact-us') {
    $meta_title = 'Contact Us';
}
if ($mypage == 'error') {
    $meta_title = 'Error';
}
if ($mypage == 'success') {
    $meta_title = 'Order Placed !';
}
if ($mypage == 'wallet') {
    $meta_title = 'Wallet';
}
if ($mypage == 'orders') {
    $meta_title = 'Orders';
}
if ($mypage == 'categories') {
    $meta_title = 'Categories';
}
if ($mypage == 'faq') {
    $meta_title = 'FAQ';
}
if ($mypage == 'reset-password') {
    $meta_title = 'New Password';
}
if ($mypage == 'forgot-password') {
    $meta_title = 'Forgot Password';
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo SITE_PATH ?>images/<?php echo $fav ?>" />
    <title><?php echo $meta_title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo SITE_PATH ?>css/plugin.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?php echo SITE_PATH ?>css/style.php">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta name="robots" content="index, follow" />
    <meta name="language" content="en-us" />
    <meta name="distribution" content="global" />
    <meta name="rating" content="general" />
    <meta name="document-type" content="public" />
    <meta name="description" content="<?php echo $meta_desc ?>">
    <meta name="keywords" content="<?php echo $meta_keyword ?>">
    <meta property="og:title" content="<?php echo $meta_title ?>" />
    <meta property="og:image" content="<?php echo $meta_image ?>" />
    <meta property="og:url" content="<?php echo $meta_url ?>" />
    <meta property="og:site_name" content="<?php echo SITE_PATH ?>" />
</head>