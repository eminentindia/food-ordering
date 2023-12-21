<?php
$page_title = "New Orders";
include('connect/head.php'); ?>
<?php include('connect/menu-nav.php');
?>
<style>

</style>

<?php
require('../razorpay/Razorpay.php');
require('../razorpay/config.php');

use Razorpay\Api\Api;

if (checkSuperAdminSession()) {
    $filter = " ";
} else {
    $filter = "AND orders.store='" . $_SESSION['store'] . "'";
}

$sql = "Select * from  orders JOIN order_status  ON orders.order_status=order_status.order_status_id WHERE orders.paymentstatus!='' $filter ORDER BY order_added_on DESC";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);
$data = array();
if ($result->num_rows > 0) {
    $i = 1;
    while ($order = $result->fetch_assoc()) {
        $ID = $order['ID'];
        $razorpayOrderId = $order['razorpayOrderId'];
        $razorpayPaymentId = $order['razorpayPaymentId'];
        $paymentStatus = $order['paymentstatus'];
        $addedOnDate = date('Y-m-d', strtotime($order['order_added_on']));

        if (($paymentStatus == 'failed' || $paymentStatus == 'created' || $paymentStatus == "voided" || $paymentStatus == "expired" || $paymentStatus == 'authorized' || $paymentStatus == 'expired' ||  $paymentStatus == "disputed" || $paymentStatus == NULL || $paymentStatus == 'pending' || $paymentStatus == 'refunded') && $addedOnDate == date('Y-m-d')) {

            //check status api razorpay
            $api = new Api($keyId, $keySecret);
            $payments = $api->payment->all(array('order_id' => $razorpayOrderId));

            foreach ($payments->items as $payment) {
                $status = $payment->status;
                $as = "UPDATE orders set paymentstatus='$status' WHERE razorpayOrderId='$razorpayOrderId' AND razorpayPaymentId='$razorpayPaymentId' AND order_id='" . $order['order_id'] . "'";
                mysqli_query($conn, $as);
            }
        }
    }
}


?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class=" container-xxl " id="kt_content_container">
        <div class="card card-xl-stretch mb-xl-8">
            <form method="post">
                <div class="card-header  borderBottom1">
                    <div class="card-title">
                        <div class="d-flex align-items-center themeColor text-upper position-relative my-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
                            </svg>&nbsp; List Of <?php echo $page_title; ?>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="me-3 btnbars btnbarsuccess btn btn-sm btn-success active" data-order="order">New /Pending Order</button>
                            <button type="button" class="me-3 btnbars btnbarwarning btn btn-sm btn-warning" data-order="complete">Complete Order</button>
                            <button type="button" class="me-3 btnbars btnbarsecondary btn btn-sm btn-secondary" data-order="cancel">Cancel Order</button>

                        </div>
                    </div>
                </div>
                <div class="card-body p-1">
                    <table id="maketable" class=" table display nowrap table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th> <strong>#</strong></th>
                                <th> <strong>Order ID</strong></th>
                                <th> <strong>Name/ Email/ Phone</strong></th>
                                <th> <strong>Ordered On</strong></th>
                                <th> <strong>Delivery Date (TIME) </strong></th>
                                <th> <strong>Type</strong></th>
                                <?php
                                echo '<th><strong>STORE</strong></th>';
                                ?>
                                <th> <strong>Order Status</strong></th>
                                <th> <strong>Payment</strong></th>
                                <th> <strong>Mode </strong></th>
                                <th> <strong>OTP</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <?php include('connect/copyrights.php'); ?>
    <?php include('connect/footer-script.php'); ?>
    <script>
        // ------------------------------------ FOR DATATABLE -----------------------------------------------------
        function rowCreationFunction(nRow, aData, iDataIndex) {
            if (aData[11] == 'complete') {
                nRow.style.backgroundColor = 'rgb(210 255 198)';
            }
        }
        $(document).ready(function() {
            initializeDynamicDataTable('maketable', 'connect/listdata.php?show=<?php echo 'order' ?>', 2, 1, rowCreationFunction);
            $('.btnbars').on('click', function() {
                const orderValue = $(this).data('order');
                $('.btnbars').removeClass('active');
                $(this).addClass('active');
                table.destroy(); // Destroy the existing DataTable
                initializeDynamicDataTable('maketable', `connect/listdata.php?show=${orderValue}`, 2, 1, rowCreationFunction);
            });
        });
    </script>

    <?php include('connect/footer-end.php'); ?>