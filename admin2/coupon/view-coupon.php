<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/coupon-controller.php');
$conn = _connectodb();
$getcoupon = getcoupon($conn);
$getcoupon = json_decode($getcoupon, true);
include('../setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../controller/constant.inc.php');
?>
<?php
$i = 1;
$query = "SELECT * FROM coupon ORDER BY ID DESC";
$con = mysqli_query($conn, $query);
if (isset($_GET['action']) && $_GET['action'] == 'active' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE coupon SET status=0 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-coupon.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'deactive' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE coupon SET status=1 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-coupon.php");
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">


                <div class="d-flex align-items-center gap-3">
                    <h4 class="page-title">Coupons</h4>
                    <a href="add-coupon.php"><button type="button" class="btn btn-md btn-outline-info waves-effect waves-dark shadow-none " id="ts-info">Add New</button></a>
                </div>


                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Coupons</li>
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
            <div class="card-body">
                <table class="display responsive nowrap stipe" width="100%" id="zero_config">
                    <thead>
                        <tr>
                            <th> <strong>S.No</strong></th>
                            <th> <strong>Code</strong></th>
                            <th> <strong>Type</strong></th>
                            <th> <strong>Value</strong></th>
                            <th> <strong>Cart Min Value</strong></th>
                            <th> <strong>Expired On</strong></th>
                            <th> <strong>Added On</strong></th>
                            <th> <strong>Status</strong></th>
                            <th> <strong>Action</strong></th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($getcoupon as $coupon) {
                        $ID  = $coupon['ID'];
                        $status  = $coupon['status'];
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $coupon['coupon_code'] ?></td>
                            <td><?php echo $coupon['coupon_type'] ?></td>
                            <td><?php echo $coupon['coupon_value'] ?></td>
                            <td><?php echo $coupon['cart_min_value'] ?></td>
                            <td><?php $date = $coupon['expired_on'];
                                $date = str_replace('-', '/', $date);
                                echo date('d-M-Y', strtotime($date));
                                ?>
                            </td>
                            <td><?php $date = $coupon['added_on'];
                                $date = str_replace('-', '/', $date);
                                echo date('d-M-Y', strtotime($date));
                                ?>
                            </td>
                            <td>
                                <?php if ($status == 0) { ?>
                                    <a href="?action=deactive&ID=<?php echo $ID; ?>" class="btn btn-dark btn-sm shadow-none waves-effect waves-dark" title="Click to active" data-toggle="tooltip">
                                        Deactive</a>
                                    </a>
                                <?php } else { ?>
                                    <a href="?action=active&ID=<?php echo $ID; ?>" class="btn btn-success btn-sm shadow-none waves-effect waves-dark" title="Click to Deactive" data-toggle="tooltip">
                                        Active</a>
                                    </a>
                                <?php } ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle shadow-none waves-effect waves-dark" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu">
                                        <a class="link border-top dropdown-item" href="update-coupon.php?coupon_id=<?php echo $ID ?>">Edit</a>
                                        <input type="hidden" class="delete_id_value" id="deletecat" value="<?php echo $ID ?>">
                                        <a class="link border-top dropdown-item deletecoupon" href="javascript:void(0)" type="button">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.deletecoupon').click(function(e) {
                    e.preventDefault();
                    var deleted = $(this).closest("tr").find('.delete_id_value').val();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#5d6',
                        cancelButtonColor: '#F0754F',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "action/delete-coupon.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleted,
                                },
                                success: function(response) {
                                    validation_msg("Coupon Deleted !", "success", "2000")
                                    setTimeout(function() {
                                        location.reload(true);
                                    }, 2000);
                                }
                            });
                        }
                    })
                });
            });
        </script>
        <?php

        if (isset($_SESSION["Addcoupon"])) {
            echo '<script> validation_msg("Category Added !", "success","2000");</script>';
            unset($_SESSION["Addcoupon"]);
        }
        if (isset($_SESSION["Updatecoupon"])) {
            echo '<script> validation_msg("Category Updated !", "success","2000");</script>';
            unset($_SESSION["Updatecoupon"]);
        }
        ?>

        <!-- ------------------------------------------------>
    </div>

    <?php include('../includes/footer.php'); ?>