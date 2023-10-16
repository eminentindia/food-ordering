<?php include('includes/header.php');  ?>
<?php

$category_id = '';
$type = '';
$category_id_arr = array();

$category_id_arr = array();
if (isset($_GET['category_id'])) {
    $category_id = safe_value($conn, $_GET['category_id']);

    $catQuery = "select ID from category where slug='$category_id' ";
    $catRes = mysqli_query($conn, $catQuery);
    $category = mysqli_fetch_assoc($catRes);
    $category_id = $category['ID'];

    $category_id_arr = array_filter(explode(':', $category_id));
    // array filter is used to remove empty array
    $category_id_str = implode(",", $category_id_arr);
    $getcategoryedish = getcategoryedish($conn, $category_id);
    $getcategoryedish = json_decode($getcategoryedish, true);
}
if ($category_id != '') {
    $query1 = "select * from dish where category_id in ($category_id_str) AND status='1' ";
    // echo $query1;
}
if ($type != '' && $type != 'both') {
    $query1 = "select * from dish where type='$type' AND status=1 ";
}

$catdishsel = mysqli_query($conn, $query1);
if ($catdishsel == '') {
    echo '<script>window.location.href="' . SITE_PATH . '404";</script>';
}


$cat_dish = '';
$type = '';
$cat_dish_arr = array();

if (isset($_GET['cat_dish'])) {
    $cat_dish = safe_value($conn, $_GET['cat_dish']);
    $cat_dish_arr = array_filter(explode(':', $cat_dish));
    // array filter is used to remove empty array
    $cat_dish_str = implode(",", $cat_dish_arr);
}
if (isset($_GET['type'])) {
    $type = safe_value($conn, $_GET['type']);
}
$arrType = array("veg", "non-veg", "both");


?>

<body class="template-collection belle">
    <?php include('includes/navbar.php') ?>
    <!--Body Content-->
    <div id="page-content">
        <!--Collection Banner-->
        <!--End Collection Banner-->
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <div class="productList mt-3">
                        <!--Toolbar-->
                        <div class="toolbar">
                            <div class="filters-toolbar-wrapper">
                                <div class="row">
                                    <div class="col-8 col-md-8 col-lg-8  filters-toolbar__item filters-toolbar__item--count">
                                        <span class="filters-toolbar__product-count"> <a href="index.php"><i class="fa fa-home"></i></a>
                                            <a href="<?php echo SITE_PATH ?>category_menu"> <i class="fa fa-angle-right"></i> Categories <i class="fa fa-angle-right"></i></a>

                                            <?php
                                            $catsel = "select category from category where ID='$category_id'";
                                            $cat = mysqli_query($conn, $catsel);
                                            $catres = mysqli_fetch_assoc($cat);
                                            echo $catres['category'];
                                            ?>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4 text-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="grid-products grid--view-items">
                            <div class="row">
                                <?php
                                while ($row = mysqli_fetch_assoc($catdishsel)) {
                                    $ID = $row['ID'];
                                    $image = $row['image'];
                                    $dish = $row['dish'];
                                    $type = $row['type'];
                                ?>
                                    <div class="col-6 col-sm-3 col-md-3 col-lg-3 item">
                                        <div class="product-image">
                                            <a <?php
                                                if ($website_close == 0) {
                                                ?> href="<?php echo SITE_PATH ?>dish/<?php echo $row['slug']; ?>" ; <?php } else {
                                                                                                                    ?> onclick="websiteclose()" <?php
                                                                                                                                            }
                                                                                                                                                ?> class="grid-view-item__link">

                                                <img class="primary blur-up lazyload" data-src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" alt="image" title="<?php echo $row['dish']; ?>">
                                                <img class="hover blur-up lazyload" data-src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" alt="image" title="<?php echo $row['dish']; ?>">
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
                                                        echo '  <img src="' . SITE_PATH . 'images/veg.png" alt="">';
                                                    } else {
                                                        echo '  <img src="' . SITE_PATH . 'images/non-veg.png" alt="">';
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

                                                <?php  ?>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!--End Main Content-->
            </div>
        </div>

    </div>

    <!-- for category checkbox -->
    <form method="get" id="formcatdish">
        <input type="hidden" name="cat_dish" id="cat_dish" value="<?php echo $cat_dish; ?>">
        <!-- for category -->
        <input type="hidden" name="type" id="type" value="<?php echo $type; ?>">
        <!-- for veg/nonveg/both -->
    </form>
    <!-- --------- -->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>


    <!-- for category checkbox -->
    <script>
        function set_checkbox(id) {
            var cat_dish = jQuery('#cat_dish').val();
            var check = cat_dish.search(":" + id);
            if (check != -1) {
                cat_dish = cat_dish.replace(":" + id, '');
            } else {
                cat_dish = cat_dish + ":" + id;
            }

            jQuery('#cat_dish').val(cat_dish);
            jQuery('#formcatdish')[0].submit();
        }



        function food_type(type) {
            jQuery('#type').val(type);
            jQuery('#formcatdish')[0].submit();
        }
    </script>

    <!-- ------------ -->
</body>

</html>