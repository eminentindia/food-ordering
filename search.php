<?php include('includes/header.php');  ?>
<?php

$str = safe_value($conn, $_GET['str']);
if ($str != '') {
    $searchDish = searchDish($conn, $str);
    // print_r($searchDish);
} else {
    echo '<script>window.location.href="index";</script>';
}

?>

<body class="template-collection belle">
    <?php include('includes/navbar.php') ?>
    <!--Body Content-->
    <div id="page-content">

        <div class="collection-header">
            <div class="collection-hero">
                <div class="collection-hero__image"><img class="blur-up lazyload" data-src="images/dish-back.jpg" src="images/dish-back.jpg" alt="Dishes" title="Dishes" /></div>
                <div class="collection-hero__title-wrapper">
                    <h1 class="collection-hero__title page-width">Search For ' <i><?php echo strtolower($str)  ?></i> '</h1>
                    <h4 style="font-size: 1.5em;
position: absolute;
color: #cecc29;
width: 100%;
text-align: center;
left: 0;
right: 0;
top: 70%;
text-transform: capitalize;"> <?php echo count($searchDish) ?> Item Found</h4>
                </div>
            </div>
        </div>

        <div class="container">

            <!--End Toolbar-->
            <div class="grid-products grid--view-items">
                <div class="row">
                    <?php
                    foreach ($searchDish as $row) {
                        $ID = $row['ID'];
                        $image = $row['image'];
                        $dish = $row['dish'];
                    ?>
                        <div class="col-6 col-sm-2 col-md-3 col-lg-3 item">
                            <div class="product-image">
                                <a <?php
                                    if ($website_close == 0) {
                                    ?> href="<?php echo SITE_PATH ?>dish/<?php echo $row['slug']; ?>" ; <?php } else {
                                                                                                        ?> onclick="websiteclose()" <?php
                                                                                                                                }
                                                                                                                                    ?> class="grid-view-item__link">

                                    <img class="primary blur-up lazyload" data-src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" alt="image" title="product">
                                    <img class="hover blur-up lazyload" data-src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" alt="image" title="product">
                                    <?php if ($row['is_available'] == '0') {
                                    ?>
                                        <div class="outfstock">
                                            OUT OF STOCK
                                        </div>
                                    <?php }
                                    if ($row['is_popular'] == '1') {
                                    ?>
                                        <div class="light2">
                                            POPULAR
                                        </div>
                                    <?php }
                                    ?>
                                </a>
                                <div class="variants add">
                                    <a <?php
                                        if ($website_close == 0) {
                                        ?> href="<?php echo SITE_PATH ?>dish/<?php echo $row['slug']; ?>" ; <?php } else {
                                                                                                            ?> onclick="websiteclose()" <?php
                                                                                                                                    }
                                                                                                                                        ?>> <button class="btn btn-addto-cart" type="button">Details</button></a>

                                </div>

                            </div>
                            <div class="product-details ">
                                <div class="product-name">
                                    <a <?php
                                        if ($website_close == 0) {
                                        ?> href="<?php echo SITE_PATH ?>dish/<?php echo $row['slug']; ?>" ; <?php } else {
                                                                                                            ?> onclick="websiteclose()" <?php
                                                                                                                                    }
                                                                                                                                        ?>><?php echo $row['dish'] ?></a>
                                    <span style="float: right;">

                                        <?php
                                        if ($row['type'] == 'veg') {
                                            echo '  <img src="images/veg.png" alt="">';
                                        } else {
                                            echo '  <img src="images/non-veg.png" alt="">';
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <?php
                                    $dish_attr_sql = mysqli_query($conn, "SELECT MIN(`price`) AS `lowest` FROM `dish_details` where dish_id='" . $row['ID'] . "'");
                                    $dish_attr_row = mysqli_fetch_assoc($dish_attr_sql);
                                    $lowestprice = $dish_attr_row['lowest'];

                                    ?>
                                    <span class="price">Starting at <i class="fa fa-rupee"></i>
                                        <?php echo $lowestprice; ?></span>

                                    <?php  ?>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
    <!-- --------- -->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>

    <!-- ------------ -->
</body>

</html>