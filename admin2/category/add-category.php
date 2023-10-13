<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/category-controller.php');
$conn = _connectodb();
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
                <h4 class="page-title">Add Category</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo ADMIN_SITE_PATH; ?>category/view-category.php">View Categories</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
            <form class="form-horizontal" action="action/add-category.php" method="POST" enctype="multipart/form-data" onsubmit="return AddCategory()">
                <div class="card-body">

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Category</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="category" id="Category">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Display Priority</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="order_number" id="order_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>

                </div>

                <?php
                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                ?>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-dark shadow-none">Add</button>
                        </div>
                    </div>

                <?php } else {
                ?>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary waves-effect waves-dark shadow-none" onclick="rolecheck()">Add</button>

                        </div>
                    </div>
                <?php } ?>

            </form>
        </div>

        <!-- ------------------------------------------------>
    </div>
    <script>
        function AddCategory() {
            var Category = document.getElementById("Category").value;
            var order_number = document.getElementById("order_number").value;
            var image = document.getElementById("image").value;
            if (Category == "") {
                validation_msg("Category Name is Required !", "question", "2000");
                return false;
            }
            if (order_number == "") {
                validation_msg("Display Priority is Required !", "question", "2000");
                return false;
            }
            if (image == "") {
                validation_msg("Category Image is Required !", "question", "2000");
                return false;
            }

        }
    </script>
    <?php

    if (isset($_SESSION["categoryexist"])) {
        echo '<script> validation_msg("Category Already Exist !", "question","2000");</script>';
        unset($_SESSION["categoryexist"]);
    }
    ?>

    <?php include('../includes/footer.php'); ?>