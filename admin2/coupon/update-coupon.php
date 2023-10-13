<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/coupon-controller.php');
$conn = _connectodb();
$ID = $_GET['coupon_id'];

$getcoupon = getsinglecoupon($conn, $ID);
$getcoupon = json_decode($getcoupon, true);
foreach ($getcoupon as $key => $getsinglecoupon) {
    extract($getsinglecoupon);
}
include('../setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../controller/constant.inc.php');
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Update coupon</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo ADMIN_SITE_PATH; ?>coupon/view-coupon.php">View Categories</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update coupon</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="container-fluid">
        <!-- -------------Content Here------------- -->
        <div class="card">
            <form class="form-horizontal" action="action/update-coupon.php" method="POST" enctype="multipart/form-data" onsubmit="return Updatecoupon()">
                <div class="card-body">
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Coupon Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="coupon_code" id="coupon_code" value="<?php echo $coupon_code; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Coupon Value</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="coupon_value" id="coupon_value" value="<?php echo $coupon_value; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Cart Min Value</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="cart_min_value" id="cart_min_value" value="<?php echo $cart_min_value; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Coupon Type</label>
                        <div class="col-sm-9">

                            <?php
                            if ($coupon_type == 'P') {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="coupon_type" id="customControlValidation1" name="radio-stacked" required="" value="P" checked>
                                    <label class="form-check-label mb-0" for="customControlValidation1">Percent</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="coupon_type" id="customControlValidation1" name="radio-stacked" required="" value="F">
                                    <label class="form-check-label mb-0" for="customControlValidation1">Number</label>
                                </div>
                            <?php       } else {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="coupon_type" id="customControlValidation1" name="radio-stacked" required="" value="P" checked>
                                    <label class="form-check-label mb-0" for="customControlValidation1">Percent</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="coupon_type" id="customControlValidation1" name="radio-stacked" required="" checked value="f">
                                    <label class="form-check-label mb-0" for="customControlValidation1">Number</label>
                                </div>
                            <?php   }

                            ?>


                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Expired On</label>


                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker" data-date-format='yyyy-mm-dd' placeholder="yyyy-mm-dd" name="expired_on" id="expired_on" value="<?php echo $expired_on; ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text h-100"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                        </div>
                    </div>
            </form>
        </div>

        <!-- ------------------------------------------------>
    </div>
    <script>
        function Updatecoupon() {

            var coupon_code = document.getElementById("coupon_code").value;
            var coupon_value = document.getElementById("coupon_value").value;
            var cart_min_value = document.getElementById("cart_min_value").value;
            var expired_on = document.getElementById("expired_on").value;
            
            if (coupon_code == "") {
                validation_msg("Coupon Name is Required !", "question", "2000");
                return false;
            }
            if (coupon_value == "") {
                validation_msg("Coupon Value is Required !", "question", "2000");
                return false;
            }
            if (cart_min_value == "") {
                validation_msg("Cart Minimum Value is Required !", "question", "2000");
                return false;
            }
            if (expired_on == "") {
                validation_msg("Coupon Minimum Value is Required !", "question", "2000");
                return false;
            }   

        }
    </script>
    <?php

    if (isset($_SESSION["couponexist"])) {
        echo '<script> validation_msg("Coupon Already Exist !", "question","2000");</script>';
        unset($_SESSION["couponexist"]);
    }
    ?>
    <?php include('../includes/footer.php'); ?>