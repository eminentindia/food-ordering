<?php include('includes/header.php');  ?>

<body class="page-template belle">
    <?php include('includes/navbar.php') ?>

    <!--Body Content-->
    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center p-0 m-0">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">Forgot Password</h1>


                </div>
            </div>
        </div>
        <!--End Page Title-->

      
        <div class="container-fluid" style="    background: url(images/login-bg.jpg);
    background-repeat: no-repeat;
    background-size: cover;">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 main-col offset-md-4" style="    padding: 60px;
    background: #ffffffdb;">
                    <div class="mb-4">
                        <form method="post" id="forgotform" class="contact-form">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" class="bg-white" name="forgot_email" placeholder="Enter Your Registered Email" id="forgot_email">
                                    </div>
                                </div>

                            </div>
                            <div class="error_field"></div>
                            <input type="hidden" name="type" value="forgot_password">
                            <div class="row">
                                <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">

                                    <input type="submit" class="btn mb-3 w-100 btn-success" value="Submit" id="forgotnow">
                                    <p id="forgotemail"></p>
                                    <p id="forgotsuccess" style="text-align: left;
color: #1d9ba8;"></p>
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