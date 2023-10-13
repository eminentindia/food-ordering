<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/admin-controller.php');
$conn = _connectodb();
$getadmin = getadmin($conn);
$getadmin = json_decode($getadmin, true);
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

                <div class="d-flex align-items-center gap-3">
                <h4 class="page-title">Admins</h4>
                <a href="add-admin.php"><button type="button" class="btn btn-md btn-outline-info waves-effect waves-dark shadow-none " id="ts-info">Add New</button></a>
                </div>

                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Admins</li>
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
                            <th> <strong>Username</strong></th>
                            <th> <strong>Email</strong></th>
                            <th> <strong>Role</strong></th>
                            <th> <strong>Added On</strong></th>
                            <th> <strong>Added By</strong></th>
                            <?php
                            if ($_SESSION['ADMIN_ROLE'] == 'super') {
                            ?>
                                <th> <strong>Action</strong></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($getadmin as $admin) {
                        $ID  = $admin['id'];
                    ?>
                        <tr id="admin_<?= $ID ?>">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $admin['admin_username'] ?></td>
                            <td><?php echo $admin['admin_email'] ?></td>
                            <td><?php echo $admin['role'] ?></td>

                            <td><?php $date = $admin['added_on'];
                                $date = str_replace('-', '/', $date);
                                echo date('d-M-Y', strtotime($date));
                                ?>
                            </td>
                            <td><?php echo $admin['added_by'] ?></td>

                            <?php
                            if ($_SESSION['ADMIN_ROLE'] == 'super') {
                            ?>
                                <td>
                                    <input type="hidden" class="delete_id_value" id="deleteadmin" value="<?php echo $ID ?>">
                                    <a class="deleteadmin" href="javascript:void(0)" type="button"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            <?php }
                            ?>


                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
      
        <script>
            $(document).ready(function() {
                $('.deleteadmin').click(function(e) {
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
                                url: "action/delete-admin.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleted,
                                },
                                success: function(response) {
                                    validation_msg("Admin Deleted !", "success", "1000")
                                    $('#admin_' + deleted + '').fadeOut();
                                }
                            });
                        }
                    })
                });
            });
        </script>
        <?php

        if (isset($_SESSION["addadmin"])) {
            echo '<script> validation_msg("Admin Added !", "success","2000");</script>';
            unset($_SESSION["addadmin"]);
        }
        if (isset($_SESSION["Updateadmin"])) {
            echo '<script> validation_msg("Category Updated !", "success","2000");</script>';
            unset($_SESSION["Updateadmin"]);
        }
        ?>

        <!-- ------------------------------------------------>
    </div>

    <?php include('../includes/footer.php'); ?>