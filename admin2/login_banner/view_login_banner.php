<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/login_banner_controller.php');
$conn = _connectodb();
$getlogin_banner = getlogin_banner($conn);
$getlogin_banner = json_decode($getlogin_banner, true);
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Login Register Banners</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $backendURL; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Login Register Banner</li>
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
            <div class="card-body table-responsive">
                <table class="table" id="zero_config">
                    <thead>
                        <tr>
                            <th> <strong>S.No</strong></th>
                            <th> <strong>Image</strong></th>
                            <th> <strong>Type</strong></th>
                            <th> <strong>Action</strong></th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($getlogin_banner as $login_banner) {
                        $ID  = $login_banner['ID'];
                        $image  = $login_banner['image'];
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>

                            <td> <img src="../media/banners/<?php echo $login_banner['image'] ?>" width="60px" onclick="login_banners('<?php echo $login_banner['image'] ?>')" alt=""> </td>
                            <td><?php echo ucwords($login_banner['type']) ?></td>
                            <td> <button type="button" class="btn btn-warning btn-sm shadow-none waves-effect waves-dark"><a  href="update_login_banner.php?login_banner_id=<?php echo $ID ?>">Edit</a></button></td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>


        <?php

        if (isset($_SESSION["Updatelogin_banner"])) {
            echo "<script>Swal.fire(
             'Success!',
            'Banner Updated Successfully',
         'success'
         )</script>";
            unset($_SESSION["Updatelogin_banner"]);
        }
        ?>
        <!-- ------------------------------------------------>
    </div>
    <script>
        function login_banners(login_banners) {
            var url = "../media/banners/" + login_banners;
            window.open(url, 'Documents', ['menubar=yes,scrollbars=yes,controlbox=yes', 'top=10,left=150,width=1050,height=650']);
            return;
        }
    </script>


    <?php include('../includes/footer.php'); ?>