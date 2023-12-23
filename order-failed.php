<?php include('includes/header.php'); ?>

<body class="template-index  home2-default ">
    <?php include('includes/navbar.php')
    ?>
    <div id="page-content">
        <?php

        require('razorpay/Razorpay.php');
        require('razorpay/config.php');

        use Razorpay\Api\Api;

        $orderid = mysqli_real_escape_string($conn, $_SESSION['ORDER_ID']);
        if ($orderid == '') {
            echo '<script>window.location = "checkout.php";</script>';
        } else if ($orderid !== $_SESSION['ORDER_ID']) {
            echo '<script>window.location = "checkout.php";</script>';
        } else {
            //check or made or not 
            $order_id = $_SESSION['ORDER_ID'];
            $razorpayOrderId = $_SESSION['razorpay_order_id'];
            $razorpayPaymentId = $_SESSION['razorpay_payment_id'];
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            $phone = $_SESSION['phone'];
            $total = $_SESSION['total'];

            $sql = "Select * from  orders JOIN order_status  ON orders.order_status=order_status.order_status_id WHERE orders.paymentstatus!='' AND email='$email' AND order_id='$order_id' AND razorpayOrderId='$razorpayOrderId'";
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
                            echo '<script>window.location = "success?ORDER_ID="' . $order_id . '"";</script>';
                        }
                    }
                }
            }


        }
        ?>
        <section>
            <div class="container-fluid" style="display: flex;
    padding-top: 54px;
    margin: 0 auto;
    justify-content: center; margin-bottom: 35px;">
                <div class="row bg-white p-5" style="
    box-shadow: 10px 0 75px rgb(114 154 27 / 10%);">
                    <div class="col-md-12 thanks">
                        <img loading="lazy" src="img/Error.webp" width="280px" style="    display: flex;
    justify-content: center;
    margin: 0 auto; " class="mb-3" alt="">
                        <h4 class="text-center" style="    color: #fd7d16;
    font-size: 16px;
    letter-spacing: 1px;">Order Failed !!</h4>
                        <p class="text-center" style="    line-height: 30px; color: #f1493d;">Payment For your Order has been failed due to some technical issues.<br> Kindly retry the payment for your order.</p>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--End Body Content-->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>


</body>

</html>