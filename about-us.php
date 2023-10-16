<?php include('includes/header.php');  ?>
<?php
$getabout = getabout($conn);
$getabout = json_decode($getabout, true);
foreach ($getabout as $getabout) {
    extract($getabout);
}
?>
<style>
    #page-content p{
        line-height: 35px !important;
    }
</style>
<body class="contact-template page-template belle">
    <?php include('includes/navbar.php') ?>

    <div id="page-content">
        <!--Page Title-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>About Us</span>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <img src="<?= ADMIN_SITE_PATH ?>media/about/<?= $image; ?>" alt="about us">
                </div>
                <div class="col-md-6">
                    <h1 class="text-uppercase"><?= $heading; ?></h1>
                    <p style="line-height: 25px;"> <?= $description; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!--End Body 
        <?php include('includes/footer.php');  ?>
        <?php include('includes/scripts.php');  ?>

</body>

</html>