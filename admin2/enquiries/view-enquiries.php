<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/enquiries-controller.php');
$conn = _connectodb();
$getenquiries = getenquiries($conn);
$getenquiries = json_decode($getenquiries, true);
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
                <h4 class="page-title">Enquiries</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Enquiries</li>
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
                            <th> <strong>Name</strong></th>
                            <th> <strong>Email</strong></th>
                            <th> <strong>Phone</strong></th>
                            <th> <strong>Message</strong></th>
                            <th> <strong>Attachment</strong></th>
                            <th> <strong>Added On</strong></th>
                            <th> <strong>Action</strong></th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($getenquiries as $enquiries) {
                        $ID  = $enquiries['ID'];
                        $attachment=$enquiries['attachment'];

                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $enquiries['name'] ?></td>
                            <td><?php echo $enquiries['email'] ?></td>
                            <td><?php echo $enquiries['phone'] ?></td>
                            <td><?php echo $enquiries['message'] ?></td>
                            <td>
                                <?php
                                if ($enquiries['attachment'] == '') {
                                    echo 'Not Uploaded';
                                } else {
                                ?>
                                    <img src="../media/enquiries/<?php echo $enquiries['attachment'] ?>" width="60px" onclick="enquiries('<?php echo $enquiries['attachment'] ?>')" alt="">
                                <?php                                        }
                                ?>
                            </td>
                            <td><?php $date = $enquiries['added_on'];
                                $date = str_replace('-', '/', $date);
                                echo date('d-M-Y', strtotime($date));
                                ?>
                            </td>



                            <td>
                                <input type="hidden" class="delete_id_value" value="<?php echo $ID ?>">
                                <input type="hidden" class="delete_attachment" value="<?php echo $attachment ?>">
                                <a class="btn btn-warning btn-sm deleteenquiries shadow-none waves-effect waves-dark" href="javascript:void(0)" type="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <script>
            function enquiries(enquiries) {
                var url = "../media/enquiries/" + enquiries;
                window.open(url, 'Documents', ['menubar=yes,scrollbars=yes,controlbox=yes', 'top=10,left=150,width=1050,height=650']);
                return;
            }
        </script>
        <script>
            $(document).ready(function() {
                $('.deleteenquiries').click(function(e) {
                    e.preventDefault();
                    var deleted = $(this).closest("tr").find('.delete_id_value').val();
                    var delete_attachment = $(this).closest("tr").find('.delete_attachment').val();
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
                                url: "action/delete-enquiries.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleted,
                                    "delete_attachment": delete_attachment,
                                },
                                success: function(response) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Enquiry Deleted Succesfully',
                                        'success'
                                    )
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

        <!-- ------------------------------------------------>
    </div>

    <?php include('../includes/footer.php'); ?>