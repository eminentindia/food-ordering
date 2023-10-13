<?php include('includes/header.php');  ?>
<?php
include('admin/faq/controller/faq-controller.php');
$conn = _connectodb();
$getfaq = getfaq($conn);
$getfaq = json_decode($getfaq, true);
?>

<body class="contact-template page-template belle">
    <?php include('includes/navbar.php') ?>

    <div id="page-content">
        <!--Page Title-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Frequently Asked Questions</span>
            </div>
        </div>
        <div class="container" style="background: url(images/faq_bg.png);background-repeat: no-repeat;background-size: contain;background-position: right;">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <div id="accordionExample">
                        <h2 class="title h2">Payment and Returns</h2>
                        <?php
                        $i = 1;
                        foreach ($getfaq as $getfaq) {
                            extract($getfaq);
                            if ($display_priority == '1') {
                                $collapsed = "";
                                $aria = "true";
                                $show = "show";
                            } else {
                                $collapsed = "collapsed";
                                $aria = "false";
                                $show = "";
                            }
                        ?>
                            <div class="faq-body">
                                <h6></h6>
                                <h4 class="panel-title <?= $collapsed ?>" data-toggle="collapse" data-target="#collapse<?= $faq_id ?>" aria-expanded="<?= $aria ?>" aria-controls="collapse<?= $faq_id ?>"><?= $q ?></h4>
                                <div id="collapse<?= $faq_id ?>" class="collapse panel-content <?= $show ?>" data-parent="#accordionExample"><?= $a ?></div>
                            </div>
                        <?php } ?>
                        <!-- <div class="faq-body">
                            <h4 class="panel-title" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Why do we use it?</h4>
                            <div id="collapseTwo" class="collapse panel-content">Cras non gravida urna. Ut venenatis nulla in tellus lobortis, vel mollis lectus condimentum. Duis elementum sapien purus, et sagittis nulla efficitur in. Phasellus vitae eros sed nisi fringilla auctor nec quis nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque rutrum faucibus nibh vitae fermentum. Aliquam commodo sem sit amet malesuada consectetur. Ut sit amet vestibulum diam. Etiam quis dictum turpis, eget condimentum velit. Sed cursus odio dapibus, consectetur massa sit amet, fringilla purus.</div>
                        </div>
                        <div class="faq-body">
                            <h4 class="panel-title" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How to use this template?</h4>
                            <div class="panel-content collapse" id="collapseThree">Duis nec nisi id ligula dapibus maximus nec eu dui. Proin ornare, ipsum vitae tincidunt rutrum, diam neque accumsan turpis, a dignissim nisi libero non lacus. Nulla quis massa nulla. Morbi metus lacus, sagittis sed est vel, aliquet ultrices nibh. Morbi auctor ex eget egestas auctor.</div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End Body 

   

        <?php include('includes/footer.php');  ?>
        <?php include('includes/scripts.php');  ?>

</body>

</html>