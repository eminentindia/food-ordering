<!--New Arrivals-->
<div class="product-rows section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2">Popular <span>Meals</span></h2>
                    <p class="subitalic">You May Like It !</p>
                </div>
            </div>
        </div>
        <div class="grid-products">
            <div class="row">

                <?php
                $query = "select * from dish WHERE is_available='1' ORDER BY RAND() LIMIT 12";
                $sel = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($sel)) {
                ?>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-3 item">
                        <!-- start product image -->
                        <div class="product-image">
                            <!-- start product image -->
                            <a <?php
                                if ($website_close == 0) {
                                ?> href="<?php echo SITE_PATH ?>dish/<?php echo $row['slug']; ?>" ; <?php } else {
                                                                                                    ?> onclick="websiteclose()" <?php
                                                                                                                            }
                                                                                                                                ?> class="grid-view-item__link">
                                <!-- image -->
                                <img class="primary blur-up lazyload" data-src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" alt="image" title="<?php echo $row['dish'] ?>">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="hover blur-up lazyload" data-src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" alt="image" title="<?php echo $row['dish'] ?>">
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
                            <!-- end product image -->

                            <!-- Start product button -->
                            <form class="variants add" method="post">
                                <a <?php
                                    if ($website_close == 0) {
                                    ?> href="<?php echo SITE_PATH ?>dish/<?php echo $row['slug']; ?>" ; <?php } else {
                                                                                                        ?> onclick="websiteclose()" <?php
                                                                                                                                }
                                                                                                                                    ?>><button class="btn btn-addto-cart" type="button" tabindex="0">Details</button></a>
                            </form>

                        </div>
                        <!-- end product image -->

                        <!--start product details -->
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
                                        echo '  <img src="images/veg.png" alt="' . $row['dish'] . '">';
                                    } else {
                                        echo '  <img src="images/non-veg.png" alt="' . $row['dish'] . '">';
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="product-price">
                                <?php
                                if ($row['is_attribute_product'] == 0) {
                                    $dish_attr_sql = mysqli_query($conn, "SELECT MIN(`selling_price`) AS `lowest` FROM `dish` where ID='" . $row['ID'] . "'");
                                    $dish_attr_row = mysqli_fetch_assoc($dish_attr_sql);
                                    $lowestprice = $dish_attr_row['lowest'];
                                } else {
                                    $dish_attr_sql = mysqli_query($conn, "SELECT MIN(`price`) AS `lowest` FROM `dish_details` where dish_id='" . $row['ID'] . "'");
                                    $dish_attr_row = mysqli_fetch_assoc($dish_attr_sql);
                                    $lowestprice = $dish_attr_row['lowest'];
                                }
                                ?>
                                <span class="price">Starting at <i class="fa fa-rupee"></i>
                                    <?php echo $lowestprice; ?></span>

                                <?php  ?><?php if ($row['price_tagline'] != '') {
                                            ?>
                                <span class="mainprice_tagline2"><?php echo $row['price_tagline']  ?></span>
                            <?php } ?>
                            </div>

                        </div>
                        <!-- End product details -->


                    </div>
                <?php } ?>

            </div>
            <a href="<?= SITE_PATH ?>dishes"><button class="d-flex m-auto btn btn-success">View All</button></a>
        </div>
    </div>
</div>
<!--End Featured Product-->