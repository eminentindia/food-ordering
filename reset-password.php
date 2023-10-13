<?php include('includes/header.php');  ?>

<?php


if(!isset($_SESSION['reset']))
{
    echo '<script>window.location.href="'.SITE_PATH.'login.php";</script>';
}
unset($_SESSION['reset']);
?>

<body class="page-template belle">
    <?php include('includes/navbar.php') ?>

    <!--Body Content-->
    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">New Password</h1>


                </div>
            </div>
        </div>
        <!--End Page Title-->

        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 main-col offset-md-4">
                    <div class="mb-4">
                        <form method="post" id="resetform" class="contact-form">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="Email">New Password</label>
                                        <input type="password" id="reset_password" name="reset_password" placeholder="Enter password">
                                    </div>
                                </div>

                            </div>
                            <div class="error_field"></div>
                            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                            <div class="row">
                                <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">

                                    <input class="btn mb-3 w-100 btn-secondary" type="submit" name="resetpass" value="Submit" id="resetpass">
                                    <p id="forgotemail"></p>
                                    <p id="forgotsuccess"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End Body Content-->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>
    <script src="<?php echo SITE_PATH ?>js/reset-forgot-password.js"></script>

</body>

</html>