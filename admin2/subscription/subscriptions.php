<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/subscription-controller.php');
$conn = _connectodb();
$getsubscription = getsubscription($conn);
$getsubscription = json_decode($getsubscription, true);
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
                <h4 class="page-title">Subscriptions</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Subscriptions</li>
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
                            <th> <strong>Email</strong></th>
                            <th> <strong>Added On</strong></th>
                            <th> <strong>Action</strong></th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($getsubscription as $subscription) {
                        $ID  = $subscription['ID'];
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $subscription['email'] ?></td>
                            <td><?php $date = $subscription['added_on'];
                                $date = str_replace('-', '/', $date);
                                echo date('d-M-Y', strtotime($date));
                                ?>
                            </td>
                            <td>
                                <input type="hidden" class="delete_id_value" value="<?php echo $ID ?>">
                              
                                <a class="btn btn-warning btn-sm deletesubscription shadow-none waves-effect waves-dark" href="javascript:void(0)" type="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.deletesubscription').click(function(e) {
                    e.preventDefault();
                    var deleted = $(this).closest("tr").find('.delete_id_value').val();      
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "action/delete-subscription.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleted,
                                   
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Subscription Deleted !',
                                        'success'
                                    )

                                    setTimeout(function() {
                                        location.reload(true);
                                    }, 1000);
                                }
                            });
                        }
                    })
                });
            });
        </script>

        <!-- ------------------------------------------------>
    </div>

    <?php include('../includes/footer.php'); ?>