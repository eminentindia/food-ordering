<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/faq-controller.php');
$conn = _connectodb();
$getfaq = getfaq($conn);
$getfaq = json_decode($getfaq, true);
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
                <h4 class="page-title">FAQ</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">View FAQ's</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="container-fluid">

        <a href="add-faq.php"><button type="button" class="btn btn-md btn-outline-info waves-effect waves-dark shadow-none mb-3" id="ts-info">Add New</button></a>
        <!-- -------------Content Here------------- -->
        <div class="card">
            <div class="card-body">

                <table class="display responsive nowrap stipe" width="100%" id="zero_config">
                    <thead>
                        <tr>
                            <th> <strong>S.No</strong></th>
                            <th> <strong>Question</strong></th>
                            <th> <strong>Answer</strong></th>
                            <th> <strong>Display Priority</strong></th>
                            <th> <strong>Action</strong></th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($getfaq as $faq) {
                        $ID  = $faq['faq_id'];
                    ?>
                        <tr id="faq_<?= $ID ?>">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $faq['q'] ?></td>
                            <td><?php echo $faq['a'] ?></td>
                            <td><?php echo $faq['display_priority'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle shadow-none waves-effect waves-dark" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu">
                                        <a class="link border-top dropdown-item" href="update-faq.php?faq_id=<?php echo $ID ?>">Edit</a>
                                        <input type="hidden" class="delete_id_value"  value="<?php echo $ID ?>">
                                        
                                        <?php
                                        if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                        ?>
                                           
                                            <a class="link border-top dropdown-item deletefaq" href="javascript:void(0)" type="button">Delete</a>
                                        <?php } else {
                                        ?>
                                            <a class="link border-top dropdown-ite" onclick="rolecheck()">Delete</a>
                                        <?php } ?>

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
                $('.deletefaq').click(function(e) {
                    // alert('r');
                    e.preventDefault();
                    var deleted = $(this).closest("tr").find('.delete_id_value').val();
                    Swal.fire({
                        title: 'Are you sure?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#5d6',
                        cancelButtonColor: '#F0754F',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "action/delete-faq.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleted,
                                },
                                success: function(response) {
                                    delete_msg("FAQ Deleted !", "success", "1000");
                                    $('#faq_' + deleted + '').fadeOut();
                                }
                            });
                        }
                    })
                });
            });
        </script>
        <?php
        if (isset($_SESSION["Addfaq"])) {
            echo '<script> validation_msg("FAQ Added !", "success","2000");</script>';
            unset($_SESSION["Addfaq"]);
        }
        if (isset($_SESSION["Updatefaq"])) {
            echo '<script> validation_msg("FAQ Updated !", "success","2000");</script>';
            unset($_SESSION["Updatefaq"]);
        }
        ?>
        <!-- ------------------------------------------------>
    </div>
    <?php include('../includes/footer.php'); ?>