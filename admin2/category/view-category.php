<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/category-controller.php');
$conn = _connectodb();
$getcategory = getcategory($conn);
$getcategory = json_decode($getcategory, true);
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
$query = "SELECT * FROM category ORDER BY ID DESC";
$con = mysqli_query($conn, $query);
if (isset($_GET['action']) && $_GET['action'] == 'active' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE category SET status=0 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-category.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'deactive' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE category SET status=1 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-category.php");
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
                    <h4 class="page-title">Categories </h4>
                    <a href="add-category.php"><button type="button" class="btn btn-md btn-outline-info waves-effect waves-dark shadow-none " id="ts-info">Add New</button></a>
                </div>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Categories</li>
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
                            <th> <strong>Category</strong></th>
                            <th> <strong>Display Priority</strong></th>
                            <th> <strong>Image</strong></th>
                            <th> <strong>Added On</strong></th>
                            <th> <strong>Status</strong></th>
                            <th> <strong>Action</strong></th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($getcategory as $category) {
                        $ID  = $category['ID'];
                        $status  = $category['status'];
                        $image  = $category['image'];
                    ?>
                        <tr id="category_<?= $ID ?>">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $category['category'] ?></td>
                            <td><?php echo $category['order_number'] ?></td>
                            <td> <img src="../media/category/<?php echo $category['image']; ?>" width="80px" alt="" onclick="dish('<?php echo $image; ?>')"></td>

                            <td><?php $date = $category['added_on'];
                                $date = str_replace('-', '/', $date);
                                echo date('d-M-Y', strtotime($date));
                                ?>
                            </td>
                            <?php
                            if ($_SESSION['ADMIN_ROLE'] == 'super') {
                            ?>
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
                            <?php } else {
                            ?>
                                <td>
                                    <a onclick="rolecheck()" class="btn btn-success btn-sm shadow-none waves-effect waves-dark" title="Click to deactive" data-toggle="tooltip">
                                        Active</a>
                                    </a>
                                </td>
                            <?php }

                            ?>
                            <td>
                                <div class="d-flex align-items-center" style="width: 50px;">
                                    <a class="link border-top dropdown-item text-warning" href="update-category.php?category_id=<?php echo $ID ?>"><i class="fas fa-pen    "></i></a>
                                    <input type="hidden" class="delete_id_value" id="deletecat" value="<?php echo $ID ?>">
                                    <?php
                                    if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                    ?>
                                        <input type="hidden" class="delete_image" value="<?php echo $image ?>">
                                        <a class="link border-top dropdown-item deletecategory text-danger" href="javascript:void(0)" type="button"><i class="fas fa-trash    "></i></a>
                                    <?php } else {
                                    ?>
                                        <a class="link border-top dropdown-item" href="javascript:void(0)" type="button" onclick="rolecheck()">Delete</a>
                                    <?php }
                                    ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.deletecategory').click(function(e) {
                    e.preventDefault();
                    var deleted = $(this).closest("tr").find('.delete_id_value').val();
                    var deleteimage = $(this).closest("tr").find('.delete_image').val();
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
                                url: "action/delete-category.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleted,
                                    "delete_image": deleteimage,
                                },
                                success: function(response) {
                                    delete_msg("Category Deleted !", "success", "1000");
                                    $('#category_' + deleted + '').fadeOut();
                                }
                            });
                        }
                    })
                });
            });
        </script>
        <?php

        if (isset($_SESSION["AddCategory"])) {
            echo '<script> validation_msg("Category Added !", "success","2000");</script>';
            unset($_SESSION["AddCategory"]);
        }

        if (isset($_SESSION["UpdateCategory"])) {
            echo '<script> validation_msg("Category Updated !", "success","2000");</script>';
            unset($_SESSION["UpdateCategory"]);
        }
        ?>
        <script>
            function dish(dish) {
                var url = "../media/category/" + dish;
                window.open(url, 'Documents', ['menubar=yes,scrollbars=yes,controlbox=yes', 'top=10,left=150,width=1050,height=650']);
                return;
            }
        </script>
        <!-- ------------------------------------------------>
    </div>

    <?php include('../includes/footer.php'); ?>