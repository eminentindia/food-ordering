<?php include('includes/header.php');  ?>

<?php
$msg = "";

if (isset($_GET['token']) && $_GET['token'] != '') {


    $token = safe_value($conn, $_GET['token']);
    mysqli_query($conn, "update users set status='active' where token='$token'");

    $msg = "Email ID Verified";
} else {
    echo '<script>window.location.href="' . SITE_PATH . 'register";</script>';
}

?>

<body class="page-template belle">
    <?php include('includes/navbar.php') ?>
    <!--Body Content-->
    <div id="page-content">
       
        <div class="container page-template lookbook-template error-page belle">
        	<div class="row">
            	<div class="col-12 col-sm-12 col-md-12 col-lg-12">	
        			<div class="empty-page-content text-center">
                        <h1 style="font-size: 40px;
color: #70cc70;"><?php echo $msg; ?></h1>
                       
                        <p class="mt-3"><a href="<?php echo SITE_PATH ?>login" class="btn btn--has-icon-after btn-secondary">Login now... <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                      </div>
        		</div>
        	</div>
        </div>
        <!-- Lookbook Start -->
    </div>

    </div>
    <!--End Body Content-->


    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>

</body>

</html>