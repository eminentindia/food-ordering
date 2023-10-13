<?php require("../includes/top.php"); ?>
<?php

include('../controller/common-controller.php');
include('controller/dish-controller.php');
$conn = _connectodb();
error_reporting(0);
$getdish = getdish($conn);
$getdish = json_decode($getdish, true);
include('../setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../controller/constant.inc.php');
include('../../function.inc.php');
?>
<?php
$i = 1;
$query = "SELECT * FROM dish ORDER BY ID DESC";
$con = mysqli_query($conn, $query);
if (isset($_GET['action']) && $_GET['action'] == 'active' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE dish SET status=0 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-dish.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'deactive' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE dish SET status=1 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-dish.php");
}


if (isset($_GET['action']) && $_GET['action'] == 'in' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE dish SET is_available=0 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-dish.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'out' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE dish SET is_available=1 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-dish.php");
}

if (isset($_GET['action']) && $_GET['action'] == 'pop' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    echo $query = "UPDATE dish SET is_popular=0 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-dish.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'nopop' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    echo  $query = "UPDATE dish SET is_popular=1 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:view-dish.php");
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
                    <h4 class="page-title">View Dish</h4>
                    <a href="add-dish.php"><button type="button" class="btn btn-md btn-outline-info waves-effect waves-dark shadow-none " id="ts-info">Add New</button></a>
                </div>



                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Dishes</li>
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
                <form id="dishview" method="post">
                    <table class="display responsive nowrap stipe" width="100%" id="zero_config">
                        <thead>
                            <tr>
                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <th><strong> <input type="checkbox" name="" id="deleteall" onclick="selectAll()" class="mt-3">
                                            <span> <a href="javascript:void(0)" class=" text-danger mt-1 mb-5 pb-5" id="trash" onclick="deleteall()"> <i class="fa fa-trash"></i> </a></span>
                                        </strong>
                                    </th>
                                <?php } ?>
                                <th> <strong>S.No</strong></th>
                                <th> <strong>Category</strong></th>
                                <th> <strong>Type</strong></th>
                                <th> <strong>Dish Name</strong></th>
                                <th> <strong>Image</strong></th>
                                <th> <strong>Added On</strong></th>
                                <th> <strong>Status</strong></th>
                                <th> <strong>Is Popular</strong></th>
                                <th> <strong>Is Available</strong></th>
                                <th> <strong>Feedbacks</strong></th>
                                <th> <strong>Action</strong></th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($getdish as $dish) {

                            $ID  = $dish['ID'];
                            $status  = $dish['status'];
                            $is_popular  = $dish['is_popular'];
                            $is_available  = $dish['is_available'];
                            $image  = $dish['image'];

                        ?>
                            <tr id="box<?php echo $dish['ID'] ?>">
                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <td><input type="checkbox" name="checkbox[]" id="<?php echo $dish['ID'] ?>" value="<?php echo $dish['ID'] ?>"></td>
                                <?php } ?>
                                <td><?php echo $i++; ?></td>

                                <td><?php
                                    $cat_name_by_id = cat_name_by_id($dish['category_id']);
                                    $Cname = $cat_name_by_id['category'];
                                    echo $Cname ?></td>



                                <td><?php echo $dish['type'] ?></td>
                                <td><?php echo $dish['dish'] ?></td>
                                <td> <img src="../media/dish/<?php echo $image; ?>" width="80px" alt="" onclick="dish('<?php echo $image; ?>')"></td>
                                <td><?php $date = $dish['added_on'];
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
                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <td>
                                        <?php if ($is_popular == '0') { ?>
                                            <a href="?action=nopop&ID=<?php echo $ID; ?>" class="btn btn-warning btn-sm shadow-none waves-effect waves-warning" title=" Make Popular" data-toggle="tooltip">
                                            NO <i class="fa fa-times" aria-hidden="true"></i></a>
                                            </a>
                                        <?php } else { ?>
                                            <a href="?action=pop&ID=<?php echo $ID; ?>" class="btn btn-success btn-sm shadow-none waves-effect waves-dark" title="Click to Remove" data-toggle="tooltip">
                                            YES <i class="fa fa-check" aria-hidden="true"></i></a>
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
                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <td>
                                        <?php if ($is_available == '0') { ?>
                                            <a href="?action=out&ID=<?php echo $ID; ?>" class="btn btn-warning btn-sm shadow-none waves-effect waves-warning" title="Click to Available" data-toggle="tooltip">
                                                NO <i class="fa fa-times" aria-hidden="true"></i></a>
                                            </a>
                                        <?php } else { ?>
                                            <a href="?action=in&ID=<?php echo $ID; ?>" class="btn btn-success btn-sm shadow-none waves-effect waves-dark" title="Click to Out Of Stock" data-toggle="tooltip">
                                                YES <i class="fa fa-check" aria-hidden="true"></i></a>
                                            </a>
                                        <?php } ?>
                                    </td>
                                <?php } else {
                                ?>
                                    <td>
                                        <a onclick="rolecheck()" class="btn btn-success btn-sm shadow-none waves-effect waves-dark" title="Click to  Out Of Stock" data-toggle="tooltip">
                                            YES</a>
                                        </a>
                                    </td>
                                <?php }

                                ?>
                                <td>
                                   <a target="blank" href="view-feedback.php?dish_id=<?php echo $ID ?>"> <button type="button" class="btn btn-sm btn-primary">VIEW <i class="fa fa-comments" aria-hidden="true"></i></button></a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a class="link btn btn-warning  btn-sm border-top border-bottom dropdown-item text-warning" href="update-dish.php?dish_id=<?php echo $ID ?>"><i class="fas fa-pen    "></i></a>

                                        <?php
                                        if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                        ?>
                                            <input type="hidden" class="delete_id_value" value="<?php echo $ID ?>">
                                            <input type="hidden" class="delete_image" value="<?php echo $image ?>">
                                            <a class="link btn btn-success btn-sm  border-top border-bottom dropdown-item deletedish text-danger" href="javascript:void(0)" type="button"><i class="fas fa-trash    "></i></a>
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
                </form>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.deletedish').click(function(e) {
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
                                url: "action/delete-dish.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleted,
                                    "delete_image": deleteimage,
                                },
                                success: function(response) {
                                    delete_msg("Dish Deleted !", "success", "1000");
                                    $('#box' + deleted + '').fadeOut();
                                }
                            });
                        }
                    })
                });
            });
        </script>


        <?php

        if (isset($_SESSION["dishadd"])) {
            echo '<script> validation_msg("Dish Added !", "success","2000");</script>';
            unset($_SESSION["dishadd"]);
        }
        if (isset($_SESSION["updatedish"])) {
            echo '<script> validation_msg("Dish Updated !", "success","2000");</script>';
            unset($_SESSION["updatedish"]);
        }

        ?>
        <!-- ------------------------------------------------>
    </div>
    <script>
        function dish(dish) {
            var url = "../media/dish/" + dish;
            window.open(url, 'Documents', ['menubar=yes,scrollbars=yes,controlbox=yes', 'top=10,left=150,width=1050,height=650']);
            return;
        }
    </script>

    <script>
        function selectAll() {
            if ($('#deleteall').prop("checked")) {

                $('input[type=checkbox]').each(function() {
                    $('#' + this.id).prop('checked', true);
                });
            } else {
                $('input[type=checkbox]').each(function() {
                    $('#' + this.id).prop('checked', false);

                });
            }
        }

        function deleteall() {
            if ($('#deleteall').prop("checked")) {

                $.ajax({
                    type: "post",
                    url: "action/delete-dish.php",
                    data: $('#dishview').serialize(),
                    success: function(response) {
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
                                $('input[type=checkbox]').each(function() {
                                    if ($('#' + this.id).prop("checked")) {
                                        $('#box' + this.id).hide(1000);
                                    }
                                });
                            }
                        })

                    }



                });
            }

        }
    </script>


    <?php include('../includes/footer.php'); ?>