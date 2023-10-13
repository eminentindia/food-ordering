<?php require("../includes/top.php"); ?>
<?php

include('../controller/common-controller.php');
include('controller/dish-controller.php');
$conn = _connectodb();
error_reporting(0);

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
$did = $_GET['dish_id'];
// echo $query = "SELECT * FROM order_details JOIN dish ON dish.ID=order_details.dish_order_id RIGHT JOIN orders ON orders.ID = order_details.order_id RIGHT JOIN users ON users.ID=orders.user_id  WHERE dish.ID=$did ";

$query = "SELECT DISTINCT * FROM orders  LEFT JOIN order_details ON orders.ID = order_details.order_id INNER JOIN dish ON dish.ID=order_details.dish_order_id  RIGHT JOIN users ON users.ID=orders.user_id  WHERE dish.ID=$did AND orders.feedback IS NOT NULL GROUP BY order_details.order_id ";


$con = mysqli_query($conn, $query);

?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div>
                    <h3>FEEDBACK</h3>
                </div>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>dish/view-dish.php">Dish</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Feedback</li>
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
                <div class="row border border-1 p-4">
                    <div class="col-md-8">
                        <form id="dishview" method="post">
                            <table class="display responsive nowrap stipe" width="100%" id="zero_config">
                                <thead>
                                    <tr>
                                        <th> <strong>S.No</strong></th>
                                        <th> <strong>Feedback</strong></th>
                                        <th> <strong>Rating</strong></th>
                                        <th> <strong>User</strong></th>
                                        <th> <strong>Dish Name</strong></th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                foreach ($con as $dish) {
                                    $ID  = $dish['ID'];

                                ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $dish['feedback'] ?></td>
                                        <td><?php echo $dish['feedback_icon'] ?></td>
                                        <td><?php echo $dish['name'] ?> <br> <?php echo $dish['email'] ?><br><?php echo $dish['phone'] ?></td>
                                        <td><?php echo $dish['dish'] ?></td>


                                    <?php } ?>
                            </table>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $query = "SELECT * FROM dish WHERE ID='$did' ";
                        $con = mysqli_query($conn, $query);
                        $r = mysqli_fetch_assoc($con);
                        ?>
                        <h4 class="text-center"><?php echo $r['dish'] ?></h4>
                        <img src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $r['image'] ?>" class="img-fluid img-thumbnail" alt="">
                    </div>
                </div>
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