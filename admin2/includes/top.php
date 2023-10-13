<?php
@session_start();

$CurStr = $_SERVER['SCRIPT_FILENAME'];
$curArr = explode('/', $CurStr);
$cur_path = $curArr[count($curArr) - 1];

$page_title = '';
if ($cur_path == '' || $cur_path == 'admin-dashboard.php') {
    $page_title = 'Admin Dashboard';
} elseif ($cur_path == 'view-category.php') {
    $page_title = 'View Categories';
} elseif ($cur_path == 'add-category.php') {
    $page_title = 'Add Category';
} elseif ($cur_path == 'update-category.php') {
    $page_title = 'Update Category';
} elseif ($cur_path == 'view-enquiries.php') {
    $page_title = 'Enquiries';
} elseif ($cur_path == 'view-product.php') {
    $page_title = 'View Products';
} elseif ($cur_path == 'view-users.php') {
    $page_title = 'Users';
} elseif ($cur_path == 'view-coupon.php') {
    $page_title = 'Coupons';
} elseif ($cur_path == 'add-coupon.php') {
    $page_title = 'Add Coupon';
} elseif ($cur_path == 'update-coupon.php') {
    $page_title = 'Update Coupon';
} elseif ($cur_path == 'view-reviews.php') {
    $page_title = 'User Reviews';
} elseif ($cur_path == 'view-brand.php') {
    $page_title = 'Brands';
} elseif ($cur_path == 'add-brand.php') {
    $page_title = 'Add Brand';
} elseif ($cur_path == 'orders.php') {
    $page_title = 'Total Orders';
} elseif ($cur_path == 'today-orders.php') {
    $page_title = 'Today Orders';
} elseif ($cur_path == 'view_delievery_boy.php') {
    $page_title = 'Delievery Boys';
} elseif ($cur_path == 'add_delievery_boy.php') {
    $page_title = 'Add Delievery Boy';
} elseif ($cur_path == 'update_delievery_boy.php') {
    $page_title = 'Update Delievery Boy';
} elseif ($cur_path == 'add-product.php') {
    $page_title = 'Add product';
} elseif ($cur_path == 'view-dish.php') {
    $page_title = 'Dishes';
} elseif ($cur_path == 'add-dish.php') {
    $page_title = 'Add Dish';
} elseif ($cur_path == 'update-dish.php') {
    $page_title = 'Update Dish';
} elseif ($cur_path == 'users.php') {
    $page_title = 'Users';
} elseif ($cur_path == 'view-order.php') {
    $page_title = 'View Orders';
} elseif ($cur_path == 'update-order.php') {
    $page_title = ' Update Order';
} elseif ($cur_path == 'subscriptions.php') {
    $page_title = 'Subscriptions';
} elseif ($cur_path == 'order-detail.php') {
    $page_title = 'Order Detail';
} elseif ($cur_path == 'settings.php') {
    $page_title = ' Settings';
} elseif ($cur_path == 'about.php') {
    $page_title = ' Update About';
} elseif ($cur_path == 'view-faq.php') {
    $page_title = ' FAQs';
} elseif ($cur_path == 'add-faq.php') {
    $page_title = 'Add FAQ';
} elseif ($cur_path == 'update-faq.php') {
    $page_title = 'Update FAQ';
}

elseif ($cur_path == 'banner.php') {
    $page_title = 'Banner';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>