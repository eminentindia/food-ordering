<?php include('includes/header.php');  ?>

<?php
if (!isset($_SESSION['ORDER_ID'])) {
    header('Location:index.php');
}

if (isset($_SESSION['COUPON_CODE'])) {
    unset($_SESSION['COUPON_CODE']);
    unset($_SESSION['FINAL_PRICE']);
}
?>

<body class="page-template belle">
    <?php include('includes/navbar.php') ?>

    <!--Body Content-->
    <div id="page-content">
        <div class="container" style="display: flex;
  justify-content: center;margin-bottom: 100px;
    padding-top: 30px;">
            <div class="row">
                <div class="col-md-12">

                    <div class="card-title text-center">
                        <img src="images/empty-cart.png" alt="" width="250px">
                        <h4 style=" margin-top:25px; font-size: 25px;">Order Failed!</h4>
                        <h6 style="color: #7c7c7c; font-size: 16px;">Order has been failed. Please try after sometime.</h6>

                    </div>


                </div>
            </div>
        </div>


    </div>


    <!--End Body Content-->



    <?php
    unset($_SESSION['ORDER_ID']);
    include('includes/footer.php');  ?>


    <?php include('includes/scripts.php');  ?>


</body>

</html>