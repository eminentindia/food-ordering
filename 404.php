<?php include('includes/header.php');  ?>


<body class="page-template belle">
    <?php include('includes/navbar.php') ?>

    <!--Body Content-->
    <div id="page-content">
        <div class="container page-template lookbook-template error-page belle">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="empty-page-content text-center">
                        <h1>404 Page Not Found</h1>
                        <p>The page you requested does not exist.</p>
                        <p class="mt-3"><a href="<?php echo SITE_PATH ?>dishes" class="btn btn--has-icon-after btn-secondary">Continue shopping <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Lookbook Start -->
    </div>
    </div>
    <!--End Body Content-->
    <?php
    unset($_SESSION['ORDER_ID']);
    include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>


</body>

</html>
<