<?php
include('controller/common-controller.php');

include('session.php');
include('../function.inc.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('controller/constant.inc.php');
if ($_SESSION['ADMIN_ROLE'] == 'test') {
} else if ($on_maintenance == '1') {
    redirect("maintanance.php");
}
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$domain = $_SERVER['HTTP_HOST'];
$base_url = $protocol . '://' . $domain;
$currentURL = $base_url . $_SERVER['REQUEST_URI'];
$canonicalURL = $base_url . parse_url($currentURL, PHP_URL_PATH);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo $page_title; ?> | <?php echo $portal_name; ?></title>
    <meta name="keywords" content="<?php echo $page_title; ?> | Portal | <?php echo $portal_name; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="EIPL Portal - <?php echo $page_title; ?>  | <?php echo $portal_name; ?>" />
    <meta property="og:url" content="<?php echo $base_url ?>" />
    <meta property="og:site_name" content="<?php echo $portal_name; ?> | <?php echo $page_title; ?> Page" />
    <?php echo '<link rel="canonical" href="' . $canonicalURL . '" />'; ?>
    <link rel="shortcut icon" href="<?php echo ADMIN_SITE_PATH . $fav ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,600&family=Poppins:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Raleway:ital,wght@0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>