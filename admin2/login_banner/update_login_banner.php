<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/login_banner_controller.php');
$conn = _connectodb();
$ID = $_GET['login_banner_id'];


$getlogin_banner = getsinglelogin_banner($conn, $ID);
$getlogin_banner = json_decode($getlogin_banner, true);
foreach ($getlogin_banner as $key => $getsinglelogin_banner) {
    extract($getsinglelogin_banner);
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Update Login Banner</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $backendURL; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $backendURL; ?>login_banner/view-login_banner.php">View Bannerss</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Banner</li>
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
            <form class="form-horizontal" action="action/update_login_banner.php" method="POST" enctype="multipart/form-data" onsubmit="return Updatelogin_banner()">

                <div class="card-body">

                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                   
                    <div class="form-group row">
                        <label for="Image" class="col-sm-3 control-label col-form-label">Image</label>
                        <div class="col-sm-9">
                            <img src="../media/banners/<?php echo $image; ?>" width="60px" alt="" onclick="login_banner('<?php echo $image; ?>')">
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">TYPE</label>
                        <div class="col-sm-9">

                            <?php
                            if ($type == 'login') {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" id="customControlValidation1" name="radio-stacked"  value="login" checked>
                                    <label class="form-check-label mb-0" for="customControlValidation1">Login</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" id="customControlValidation1" name="radio-stacked" value="register">
                                    <label class="form-check-label mb-0" for="customControlValidation1" >Register</label>
                                </div>
                            <?php       } else {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" id="customControlValidation1" name="radio-stacked"  value="login" >
                                    <label class="form-check-label mb-0" for="customControlValidation1" >Login</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" id="customControlValidation1" name="radio-stacked" value="register"  checked>
                                    <label class="form-check-label mb-0" for="customControlValidation1" >Register</label>
                                </div>
                            <?php   }

                            ?>


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
        function Updatelogin_banner() {

            var login_banner = document.getElementById("login_banner").value;

            if (login_banner == "") {
                Swal.fire({
                    title: 'Opps',
                    text: "Please Enter login_banner Name!",
                    icon: 'warning',

                })
                return false;
            }

        }
    </script>
   
    <script>
        function login_banner(login_banner) {
            var url = "../media/banners/" + login_banner;
            window.open(url, 'Documents', ['menubar=yes,scrollbars=yes,controlbox=yes', 'top=10,left=150,width=1050,height=650']);
            return;
        }
    </script>

    <?php include('../includes/footer.php'); ?>