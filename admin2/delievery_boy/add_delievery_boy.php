<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/delievery_boy_controller.php');
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
    <style>
        .fa-eye:before {
            position: absolute;
            right: 0;
            margin-top: -40px;
            margin-right: 35px;
        }

        .fa-eye-slash:before,
        .fa-user:before {
            position: absolute;
            right: 0;
            margin-top: -40px;
            margin-right: 35px;
        }
    </style>

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Add Delievery Boy</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo ADMIN_SITE_PATH; ?>delievery_boy/view_delievery_boy.php">View Delievery Boy's</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Delievery Boy</li>
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
            <form class="form-horizontal" action="action/add_delievery_boy.php" method="POST" enctype="multipart/form-data" onsubmit="return AddBoy()">
                <div class="card-body">

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="mobile" id="mobile">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Password</label>
                        <div class="col-sm-9">


                            <input id="password" type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password icon-append"></span>



                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>

                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" name="submit" class="btn btn-primary waves-effect waves-dark shadow-none">Add</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- ------------------------------------------------>
    </div>
    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    <script>
        function AddBoy() {
            var name = document.getElementById("name").value;
            var mobile = document.getElementById("mobile").value;
            var password = document.getElementById("password").value;
            var image = document.getElementById("image").value;
            if (name == "") {
                validation_msg("Name is Required !", "question", "2000");
                $('#name').focus();
                return false;
            }
            if (mobile == "") {
                validation_msg("Mobile Number is Required !", "question", "2000");
                $('#mobile').focus();
                return false;
            }
            if (password == "") {
                validation_msg("Password is Required !", "question", "2000");
                $('#password').focus();
                return false;
            }
            if (image == "") {
                validation_msg("Image is Required !", "question", "2000");
                $('#image').focus();
                return false;
            }

        }
    </script>


    <?php include('../includes/footer.php'); ?>