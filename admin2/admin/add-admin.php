<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/admin-controller.php');
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
                <h4 class="page-title">Add admin</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo ADMIN_SITE_PATH; ?>admin/view-admin.php">View admins</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Add admin</li>
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
            <form class="form-horizontal" action="action/add-admin.php" method="POST" enctype="multipart/form-data" onsubmit="return Addadmin()">
                <div class="card-body">

                    <?php
                    if ($_SESSION['ADMIN_ROLE'] == 'super') {
                    ?>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 control-label col-form-label">Role</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="role" value="super">
                                    <label class="form-check-label mb-0" for="customControlValidation1">Super</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="role" required="" value="test" checked>
                                    <label class="form-check-label mb-0" for="customControlValidation1">Test</label>
                                </div>
                            </div>
                        </div>
                    <?php } else {

                    ?>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 control-label col-form-label">Role</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="role" required="" value="test" checked>
                                    <label class="form-check-label mb-0" for="customControlValidation1">Test</label>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Name" name="registername" id="registername" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" placeholder="Email Address" name="registeremail" id="registeremail" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" placeholder="Password" name="registerpassword" class="form-control" id="registerpassword" required>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" value="Signup" id="registernow" class="btn btn-primary waves-effect waves-dark shadow-none">Add</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- ------------------------------------------------>
    </div>
    <script>
        function Addadmin() {
            var registername = document.getElementById("registername").value;
            var registeremail = document.getElementById("registeremail").value;
            var registerpassword = document.getElementById("registerpassword").value;
            if (registername == "") {
                validation_msg("UserName is Required !", "question", "2000");
                return false;
            }
            if (registeremail == "") {
                validation_msg("Email is Required !", "question", "2000");
                return false;
            }
            if (registerpassword == "") {
                validation_msg("Password is Required !", "question", "2000");
                return false;
            }

        }
    </script>

    <?php include('../includes/footer.php'); ?>