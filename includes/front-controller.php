<?php
session_start();
include('admin/controller/common-controller.php');
$conn = _connectodb();
// include('admin/dish/controller/dish-controller.php');
// include('admin/category/controller/category-controller.php');
// include('admin/setting/controller/setting-controller.php');



$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('admin/controller/constant.inc.php');
include('function.inc.php');
$getactivecategory = getactivecategory($conn);
$getactivecategory = json_decode($getactivecategory, true);
?>