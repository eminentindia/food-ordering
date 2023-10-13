<?php require("../includes/top.php"); ?>
<?php require("../../function.inc.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/order-controller.php');
$conn = _connectodb();
$getorder = getcancelorder($conn);
$getorder = json_decode($getorder, true);
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
                <a href="<?= ADMIN_SITE_PATH ?>order/orders.php">
                    <h4 class="btn btn-outline-secondary2 waves-effect waves-dark" style="margin-right: 25px;">All Orders</h4>
                </a>
                <a href="<?= ADMIN_SITE_PATH ?>order/today-order.php">
                    <h4 class="btn btn-outline-primary waves-effect waves-dark" style="margin-right: 25px;"> Today Orders</h4>
                </a>
                <a href="<?= ADMIN_SITE_PATH ?>order/pending-order.php">
                    <h4 class="btn btn-outline-dark waves-effect waves-light"  style="margin-right: 25px;"> Pending Orders</h4>
                </a>
                <a href="<?= ADMIN_SITE_PATH ?>order/cancel-order.php">
                    <h4 class="btn btn-danger waves-effect waves-light"> Cancel Orders</h4>
                </a>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="container-fluid">

        <!-- -------------Content Here------------- -->
        <div class="card">
            <div class="card-body ">
                <div class="row">
                <table class="display responsive nowrap stipe" width="100%" id="zero_config">
                        <thead>
                            <tr>
                                <th> <strong>Order ID</strong></th>
                                <th> <strong>Name/ Email/ Phone</strong></th>
                                <th> <strong>Ordered On</strong></th>
                                <th> <strong>Delivery Date (TIME) </strong></th>
                                <th> <strong>Type</strong></th>
                                <?php
                                if ($_SESSION['STORE'] == 0 or $_SESSION['STORE'] == 100) {
                                    echo '<th><strong>STORE</strong></th>';
                                }
                                ?>
                                <th> <strong>Order Status</strong></th>
                                <th> <strong>Payment</strong></th>
                                <th> <strong>Mode </strong></th>
                                <th> <strong>OTP</strong></th>

                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($getorder as $key => $order) {
                            $ID  = $order['ID'];
                        ?>

                            <tr>
                                <td><a href="order-detail.php?id=<?php echo $ID ?>"><?php echo  $order['order_id'] ?> &nbsp; <i class="fas fa-eye"></i></a></td>

                                <td><?php echo $order['name'] ?> <br> <?php echo $order['email'] ?><br><?php echo $order['phone'] ?></td>

                             

                                <td><?php $date = $order['order_added_on'];
                                    $date = str_replace('-', '/', $date);
                                    echo formatDateTime($date);
                                    ?>
                                </td>
                                <td>
                                    <?php $date = $order['delievery_date'];
                                    $date = str_replace('-', '/', $date);
                                    echo date('d-M-Y', strtotime($date));
                                    ?> (
                                    <?php echo $order['delievery_time'] ?>)
                                </td>
                                <td class="text-uppercase">
                                    <?php echo $order['delieverytype']; ?>
                                </td>
                                <?php
                                if ($_SESSION['STORE'] == 0 or $_SESSION['STORE'] == 100) {
                                ?>
                                    <td class="text-uppercase">
                                        <?php if ($order['store'] == 1) {
                                        ?>
                                            <span class="badge rounded-pill bg-primary">Arunachal</span>
                                        <?php } else {

                                        ?>
                                            <span class="badge rounded-pill bg-primary">DCM</span>
                                        <?php } ?>
                                    </td>
                                <?php }
                                ?>


                                <td><?php echo ucwords($order['status'])  ?></td>

                                <td class="text-uppercase">
                                    <?php if ($order['paymentstatus'] == 'authorized' || $order['paymentstatus'] == 'captured') {
                                    ?>
                                        <span class="badge rounded-pill bg-success"><?php echo $order['paymentstatus']; ?></span>
                                    <?php } else {
                                    ?>
                                        <span class="badge rounded-pill bg-danger"><?php echo $order['paymentstatus']; ?></span>
                                    <?php }
                                    ?>
                                </td>
                                <td class="text-uppercase">
                                    <?php if ($order['payment_type'] == 'cod') {
                                    ?>
                                        <span class="badge rounded-pill bg-secondary" style="background:#d760eb !important"><?php echo $order['payment_type']; ?></span>
                                    <?php } else {
                                    ?>
                                        <span class="badge rounded-pill bg-secondary" style="background:#d760eb !important">Online</span>

                                    <?php } ?>
                                </td>
                                <td class="text-uppercase">
                                    <?php if ($order['otp_validate'] == 1) {
                                    ?>
                                        <span class="cursor-pointer text-success" title="UPDATE ON: <?php echo $order['updated_on'] ?>"> <i class="fas fa-check-circle    "></i></span>
                                    <?php } else {

                                    ?>
                                        <span class="cursor-pointer text-danger" title="UPDATE ON: <?php echo $order['updated_on'] ?>"><i class="fas fa-times-circle    "></i></span>
                                    <?php } ?>
                                </td>



                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <!-- ------------------------------------------------>
        </div>

        <?php include('../includes/footer.php'); ?>