<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/faq-controller.php');
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
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Add FAQ</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo ADMIN_SITE_PATH; ?>faq/view-faq.php">View FAQ's</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Add FAQ</li>
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
            <form class="form-horizontal" action="action/add-faq.php" method="POST" enctype="multipart/form-data" onsubmit="return Addfaq()">
                <div class="card-body">

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Question</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="q" id="q">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Answer</label>
                        <div class="col-sm-9">

                            <textarea class="form-control" name="a" id="a"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Display Priority</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="display_priority" id="display_priority">
                        </div>
                    </div>

                </div>

        </div>
        <div class="border-top">
            <div class="card-body">
                <?php
                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                ?>
                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-dark shadow-none">Add</button>

                <?php } else {
                ?>
                    <button type="button" onclick="rolecheck()" class="btn btn-primary waves-effect waves-dark shadow-none">Add</button>

                <?php }

                ?>
            </div>
        </div>
        </form>
    </div>

    <!-- ------------------------------------------------>
</div>
<script>
    function Addfaq() {
        var q = document.getElementById("q").value;
        var a = document.getElementById("a").value;
        var display_priority = document.getElementById("display_priority").value;
        if (q == "") {
            validation_msg("Please Enter Question !", "question", "2000");
            $('#q').focus();
            return false;
        }
        if (a == "") {
            validation_msg("Please Enter Answer !", "question", "2000");
            $('#a').focus();
            return false;
        }
        if (display_priority == "") {
            validation_msg("Please Enter Display Priority !", "question", "2000");
            $('#display_priority').focus();
            return false;
        }

    }
</script>
<?php

if (isset($_SESSION["display_priorityExist"])) {
    echo '<script> validation_msg("Display Priority Exist !", "question","2000");</script>';
    unset($_SESSION["display_priorityExist"]);
}
?>

<?php include('../includes/footer.php'); ?>
<script>
    ClassicEditor
        .create(document.querySelector('#a'))

        .catch(error => {
            console.error(error);
        });
</script>