<?php include('includes/header.php');  ?>

<?php
if (!isset($_SESSION['ORDER_ID'])) {
    echo '<script>window.location.href="' . SITE_PATH . '";</script>';
}
?>

<body class="page-template belle">
    <?php include('includes/navbar.php') ?>

    <!--Body Content-->
    <div id="page-content">

        <section>
            <div class="container-fluid" style="display: flex;
    padding-top: 44px;
    margin: 0 auto;
    justify-content: center; margin-bottom: 35px;">
                <div class="row">
                    <div class="col-md-12 thanks">
                        <img src="images/delievery.gif" width="280px" style="    display: flex;
    justify-content: center;
    margin: 0 auto; " class="mb-3" alt="">
                        <h4 class="text-center" style="    color: #8ebe43;
    font-size: 16px;
    letter-spacing: 1px;">Your Order Has Placed Successfully !</h4>
                        <p>OTP : <?php echo $_SESSION['otp'] ?></p>
                        <p style=" background: #fde65f;
    display: flex;
    justify-content: center;
    margin: 0 auto;
    padding: 10px;
    color: #a38b00;
    border: 2px dashed;
    font-size: 1rem;
    text-transform: uppercase;">Order Id <?php echo $_GET['ORDER_ID'] ?></p>



                        <ul style="border-top: 1px solid #e9e9e9;
    display: inline-flex;
    border-bottom: 1px solid #e9e9e9; margin-top: 25px;
">
                            <li style="margin: 5px 25px;"> <a href="<?= SITE_PATH ?>orders"> <img src="images/order.png" alt=""> &nbsp; Orders </a></li>

                            <li style="margin: 5px 25px;"> <a href="<?= SITE_PATH ?>dishes"> <img src="images/store.png" width="35px" alt="explore dish"> &nbsp; Shop More </a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <!--End Body Content-->
        <?php
        // unset($_SESSION['ORDER_ID']);
        include('includes/footer.php');  ?>
        <?php include('includes/scripts.php');  ?>


</body>

</html>