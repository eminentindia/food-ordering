<?php
@session_start();

$CurStr = $_SERVER['SCRIPT_FILENAME'];
$curArr = explode('/', $CurStr);
$cur_path = $curArr[count($curArr) - 1];

$page_title = '';
if ($cur_path == 'orders.php') {
    $page_title = 'Orders';
} elseif ($cur_path == 'order-detail.php') {
    $page_title = 'Order Detail';
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="shortcut icon" href="<?php echo SITE_PATH ?>images/<?php echo $fav ?>" />