<?php
session_start();
include('../admin/controller/common-controller.php');

include('../admin/order/controller/order-controller.php');
$conn = _connectodb();

$getorder = getsingledelieveryorder($conn);
$getorder = json_decode($getorder, true);
include('../admin/setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../admin/controller/constant.inc.php');
include('../function.inc.php');

$getorder = getorder($conn);
$getorder = json_decode($getorder, true);
$orderID = safe_value($conn, $_GET['id']);
?>

<?php require("includes/top.php"); ?>
<?php include('includes/header.php'); ?>

<style>
    .table th,
    .table thead th {
        font-weight: 700;
    }

    .lds-dual-ring.hidden {
        display: none;
    }

    .lds-dual-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 5% auto;
        border-radius: 50%;
        border: 6px solid #fff;
        border-color: #14ff00 transparent #14ff00 transparent;
        position: absolute;
        animation: lds-dual-ring 1.2s linear infinite;
        top: 40%;
        left: 50%;
        margin-left: -25px;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }


    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, .8);
        z-index: 999;
        opacity: 1;
        transition: all 0.5s;
    }
</style>
<!-- Bread crumb and right sidebar toggle -->




<div class="container-fluid mt-5 pt-5">

    <!-- -------------Content Here------------- -->
    <div class="card">
        <div class="card-body table-responsive">
            <a href="<?php echo SITE_PATH ?>delievery-boy/orders.php"><button class="btn btn-warning shadow-none"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Back</button></a>
            <h4 style="float: right; color: #455a21;">Order ID: <?php echo $orderID; ?></h4>

            <?php
            $getsingleorder = getsingleorder($conn, $orderID);
            $getsingleorder = json_decode($getsingleorder, true);
            foreach ($getsingleorder as $getsingleorder) {
                //  print_r($getsingleorder);
                extract($getsingleorder);
            }
            ?>

            <div class="row mt-5 p-3">
                <div class="col-md-6" style="background: #d3f78a;
padding: 70px 50px;">
                    <h4 class="mb-3">User Information</h4>
                    <p> <strong>User Name:</strong> <?php echo ucwords($name) ?></p>
                    <p> <strong>User Email:</strong> <?php echo $email ?></p>
                    <p> <strong>Address:</strong> <?php echo ucwords($address) . ' ' . ucwords($appartment) . ' ' . ucwords($city) . ',' . $postcode ?></p>
                </div>
                <div class="col-md-6" style="border: 2px dashed #d3f78a;
padding: 25px;">
                    <h4 class="mb-3">Order Details</h4>
                    <p> <strong>Payment Type:</strong> <?php echo ucwords($payment_type) ?></p>
                    <p> <strong>Payment Status:</strong> <?php echo ucwords($payment_status) ?></p>
                    <p> <strong>Order Status:</strong> <span id="efwe"><?php echo ucwords($status) ?></span>
                    <form method="POST" id="order_status_update">
                        <select name="order_status" id="updateorderstatus" onchange="update_status()">
                            <option value="">Update Order Status </option>
                            <option value="1">Pending</option>
                            <option value="2">Complete</option>
                            <option value="3">On the Way</option>

                        </select>&nbsp; &nbsp; <span id="ordr_status_success"></span>
                        <input type="hidden" name="order_ID" value="<?php echo $_GET['id'] ?>">
                        <input type="hidden" name="user_email" value="<?php echo $email ?>">
                        <input type="hidden" name="UID" value="<?php echo $user_id ?>">
                    </form>
                    </p>
                    <p> <strong>Order Date:</strong> <?php $date = $getsingleorder['added_on'];
                                                        $date = str_replace('-', '/', $date);
                                                        echo date('d-M-Y h:i', strtotime($date));
                                                        ?></p>
                </div>
                <table class="table table-responsive" style="background: #fff5bf;">
                    <tr>
                        <th>Dish</th>
                        <th>Qty</th>
                        <th>Size</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    $getorderdetails = getorderdetails($conn, $ID);
                    foreach ($getorderdetails as $orderattr) {
                    ?>
                        <tr>
                            <td><?php echo $orderattr['dish'] ?></td>
                            <td><?php echo $orderattr['qty'] ?></td>
                            <td><?php echo $orderattr['attribute'] ?></td>
                            <td><?php echo $orderattr['price'] ?></td>
                        </tr>
                    <?php }
                    ?>

                    <?php
                    if ($getsingleorder['coupon_code'] != '') {
                    ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <strong>Total :</strong> <?php echo $getsingleorder['total_price'] ?> <br>
                            <strong>Coupon Code :</strong> <?php echo $getsingleorder['coupon_code'] ?> <br>
                            <strong>Final Amount :</strong> <?php echo $getsingleorder['final_price'] ?>

                        </td>
                    <?php                  }

                    ?>

                </table>


            </div>
        </div>
    </div>
    <div id="loader" class="lds-dual-ring hidden overlay"></div>


    <?php include('includes/footer.php'); ?>
    <script>
        function update_status() {
            var confirm = window.confirm("Save data?");
            if (confirm) {
                var updateorderstatus = jQuery('#updateorderstatus').val();
                var Orderhtml = $('#updateorderstatus :selected').text();
                if (updateorderstatus != '') {
                    // $("#ordr_status_success").html("process");
                    $.ajax({
                        type: "post",
                        url: "action/update-order-status.php",
                        data: $("#order_status_update").serialize(),
                        beforeSend: function() {
                            $('#loader').removeClass('hidden')
                        },
                        success: function(response) {
                            var response = JSON.parse(response);
                            if (response.success == true) {
                                $("#ordr_status_success").html("Status Updated !");
                                $("#efwe").html(Orderhtml);
                            }
                        },
                        complete: function() {
                            $('#loader').addClass('hidden');
                             window.setTimeout(function() {
                                 window.location = "orders.php";
                             }, 1000);
                        },
                    });
                }
            }

        }
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                responsive: true
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>