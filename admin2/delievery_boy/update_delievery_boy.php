<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/delievery_boy_controller.php');
$conn = _connectodb();
$ID = $_GET['delievery_boy_id'];

$getdelievery_boy = getsingledelievery_boy($conn, $ID);
$getdelievery_boy = json_decode($getdelievery_boy, true);
foreach ($getdelievery_boy as $key => $getsingledelievery_boy) {
    extract($getsingledelievery_boy);
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
                <h4 class="page-title">Update Delievery Boy</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo ADMIN_SITE_PATH; ?>delievery_boy/view_delievery_boy.php">View Delievery Boys</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Delievery Boy</li>
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
            <form class="form-horizontal" action="action/update_delievery_boy.php" method="POST" enctype="multipart/form-data" onsubmit="return Updatedelievery_boy()">
                <div class="card-body">
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $mobile; ?>">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Image</label>
                        <div class="col-sm-9">
                            <img src="../media/delievery_boy/<?php echo $image; ?>" width="80px" alt="" onclick="delievery_boy('<?php echo $image; ?>')">
                            <input type="file" class="form-control" name="image" id="image">
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
        function delievery_boy(delievery_boy) {
            var url = "../media/delievery_boy/" + delievery_boy;
            window.open(url, 'Documents', ['menubar=yes,scrollbars=yes,controlbox=yes', 'top=10,left=150,width=1050,height=650']);
            return;
        }
    </script>

    <script>
        function Updatedelievery_boy() {
            var name = document.getElementById("name").value;
            var mobile = document.getElementById("mobile").value;
            var password = document.getElementById("password").value;
           
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
           

        }
    </script>
   
    <?php include('../includes/footer.php'); ?>