<?php include('includes/header.php');  ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$single_dish = $_GET['dishid'];
$getdish = getsingleslugdish($conn, $single_dish);
$getdish = json_decode($getdish, true);


foreach ($getdish as $key => $getsingledish) {
    extract($getsingledish);
}

$getDishIdbySlug = getDishIdbySlug($conn, $single_dish);
$DISH_id = $getDishIdbySlug['ID'];
$dish_name_underscore = str_replace(' ', '_', $dish);
$mulImg = getAllImg($DISH_id);
$mainImg = []; // Initialize the $mainImg array
if ($mulImg !== null && count($mulImg) > 0) {
    $mainImg = $mulImg[0]['image'];
} else {
    $mainImg = $image;
}
if (count($getdish) == '') {
    echo '<script>window.location.href="' . SITE_PATH . '404";</script>';
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<style>
    .radio-box {
        display: inline-block;
        border: 1px solid #ccc;
        margin-right: 10px;
        cursor: pointer;
        border-radius: 20px;
        position: relative;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .check-box {
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        margin-right: 10px;
        cursor: pointer;
        position: relative;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .radio-box:hover {
        background-color: #f4f4f4;
        border-color: #999;
    }

    .check-box:hover {
        background-color: #f4f4f4;
        border-color: #999;
    }

    .radio-box input[type="radio"],
    .check-box input[type="checkbox"] {
        display: none;
    }


    .radio-box input[type="radio"]:checked+.radio-box-content {
        background-color: #e0ff9e;
        color: #4f6d0e;
        border: 1px dashed #4f6d0e !important;
        font-weight: bold;
    }

    .check-box input[type="checkbox"]:checked+.check-box-content {
        background-color: #e0ff9e;
        color: #4f6d0e;
        border: 1px dashed #4f6d0e !important;
        font-weight: bold;
    }

    .radio-box-content {
        display: inline-block;
        vertical-align: middle;
        padding: 10px;
        border-radius: 20px;

        transition: background-color 0.3s;
    }

    .check-box-content {
        display: flex;
        vertical-align: middle;
        padding: 5px 10px;
        transition: background-color 0.3s;
        align-items: center;
        gap: 10px;
        justify-content: center;
    }

    .check-box .dishbadge {
        position: static !Important;
    }
</style>
<style>
    .owl-prev span:hover,
    .owl-next span:hover {
        color: #8199A3;
    }

    .owl-prev,
    .owl-next:hover {
        background: none !important;
        color: black;
    }

    .owl-prev,
    .owl-next {
        position: absolute;
        top: 0;
        height: 100%;
    }

    .owl-prev {
        left: 7px;
    }

    .owl-next {
        right: 7px;
    }

    .owl-carousel .owl-item img {
        display: block;
        width: 100%;
        height: 100% !important;
    }

    .multipleswatch {
        font-size: 15px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
</style>

<body class="template-product belle">
    <?php include('includes/navbar.php') ?>
    <!--Body Content-->
    <div id="page-content">
        <!--MainContent-->
        <div id="MainContent" class="main-content" role="main">
            <!--Breadcrumb-->
            <div class="bredcrumbWrap">
                <div class="container breadcrumbs">
                    <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span><?php echo $dish ?></span>
                </div>
            </div>
            <!--End Breadcrumb-->
            <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
                <form method="post" enctype="multipart/form-data" style="border-bottom: 1px dashed #b7b7b7;">
                    <div class="product-single">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div style="    position: sticky;top: 50px;">
                                    <div class="product-details-img">
                                        <div class="zoompro-wrap product-zoom-right pl-20">
                                            <div class="zoompro-span pro-large-img img-zoom" id="bigImg">
                                                <img class="img-zoom img-fluid img-thumbnail" style="justify-content: center;display: flex;margin: 0 auto; height: 50% !important;width: 100%  !important;" src="<?= SITE_DISH_IMAGE . $mainImg ?>">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="your-class owl-carousel owl-theme mb-4">

                                        <?php

                                        foreach ($mulImg as $mulImg) {
                                        ?>
                                            <img src="<?= SITE_DISH_IMAGE . $mulImg['image'] ?>" data-src="<?= SITE_DISH_IMAGE . $mulImg['image'] ?>" class="img-fluid img-thumbnail" onclick="showMultipleImg('<?= SITE_DISH_IMAGE . $mulImg['image'] ?>')">
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-single__meta">
                                    <h1 class="product-single__title"><?php echo $dish; ?></h1>
                                    <?php
                                    if (count($details) > 4) {
                                        $st = "style='margin:0;padding:0;line-height: 0;'";
                                    } else {
                                        $st = "";
                                    }
                                    ?>
                                    <div class="prInfoRow" <?php echo $st ?>>
                                        <?php
                                        if ($is_available == '1') {
                                            // echo "<span>Available</span>";
                                            $additem = "AddToCart('" . $getDishIdbySlug['ID'] . "','quantity_regular" . $getDishIdbySlug['ID'] . "','regular');";
                                        } else {
                                            echo "  <div class='product-stock'><span class='text-danger'>Currently Unavailable</span> </div>";
                                            $additem = "unavailable()";
                                        }
                                        ?>
                                        <p class="product-single__price product-single__price-product-template" <?php echo $st ?>>
                                            <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single p-0">
                                                <?php
                                                $dish_attr_sql = mysqli_query($conn, "select price from dish_details where dish_id='" . $getsingledish['ID'] . "'");
                                                $dish_attr_row = mysqli_fetch_assoc($dish_attr_sql)
                                                ?>
                                                <span id="dishmainprice" style="font-weight: bold;">
                                                    <?php
                                                    if (count($details) > 4) {
                                                    } else {
                                                    ?>
                                                        <?php
                                                        if ($is_attribute_product == '0') {
                                                        ?>
                                                            <span class="price">
                                                                <i class="fa fa-inr" aria-hidden="true"></i>
                                                                <?php
                                                                if ($category_discount) {
                                                                    $discount_percent = $category_discount; // Assuming $category_discount is in percentage.
                                                                    $discounted_price = $selling_price - ($selling_price * ($discount_percent / 100));
                                                                    echo '<span id="price_regular' . $DISH_id . '" data-price="' . $discounted_price . '" data-sku="' . $main_sku . '">' . $discounted_price . ' <span class="pricelinethrough">' . $selling_price . '</span></span>  ';
                                                                } else if ($selling_price != $mrp) {

                                                                    $discount = $mrp - $selling_price;

                                                                    // Calculate the discount percentage
                                                                    $discount_percent = round(($discount / $mrp) * 100, 1);

                                                                    echo '<span id="price_regular' . $DISH_id . '" data-price="' . $selling_price . '" data-sku="' . $main_sku . '">' . $selling_price . ' <span class="pricelinethrough">' . $mrp . '</span></span>  ';
                                                                } else {
                                                                    echo '<span id="price_regular' . $DISH_id . '" data-price="' . $selling_price . '" data-sku="' . $main_sku . '">' . $selling_price . '</span>';
                                                                }
                                                                ?>
                                                            </span>
                                                        <?php } else {
                                                        ?>
                                                            <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_regular<?php echo $dish_name_underscore; ?>"></span></span>
                                                        <?php }
                                                        ?>
                                                        <?php }
                                                        ?><?php if ($price_tagline != '') {
                                                            ?>
                                                        <br>
                                                        <span class="mainprice_tagline2"><?php echo $price_tagline  ?></span>
                                                    <?php } ?>
                                                </span></span>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="product-single__description rte shortdesclineheight ">
                                        <?php echo $short_description; ?>
                                    </div>
                                    <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                        <div class="product-form__item">

                                            <div class="swatch-element l available multipleswatch" style="font-size: 15px;">
                                                <?php
                                                $firstItemChecked = true; //
                                                $dish_attr_sql = mysqli_query($conn, "select * from dish_details where dish_id='" . $getsingledish['ID'] . "' and status='1' ORDER BY price ASC");
                                                foreach ($dish_attr_sql as $index => $dish_attr_row) {
                                                    $attribute = $dish_attr_row['attribute'];
                                                    $attr_id = $dish_attr_row['dish_detail_id'];
                                                    $sku = $dish_attr_row['sku'];
                                                    $price = $dish_attr_row['price'];
                                                    $attribute_name = $attribute . '_' . $attr_id; // Concatenate attribute and attr_id
                                                    $attribute_id = 'attribute_regular' . $index . '_' . $sku . '_' . $attribute; // Create a unique attribute ID
                                                    $uniqueqty = $dish_name_underscore . '_' . $sku;
                                                    // Determine whether to check the item
                                                    $isChecked = $firstItemChecked ? 'checked' : '';

                                                    if (count($details) > 4) {
                                                        echo '<label class="check-box">';
                                                        echo "<input  type='checkbox' " . $isChecked . " name='attribute_regular" . $DISH_id . "[]' value='" . $attr_id . "' id='" . $attribute_id . "' data-price='" . $price . "' data-sku='" . $sku . "'  />";
                                                        echo '<div class="check-box-content">';
                                                        echo '<span class="attrlabel badge dishbadge">' . $dish_attr_row['attribute'] . '</span>';
                                                        echo "<span class='price'> <i class='fa fa-inr' aria-hidden='true'></i>" . $dish_attr_row['price'] . "</span>";
                                                        echo '</div>';
                                                        echo '<div class="quantity-controls smallControl">
                                                    <button class="quantity-decrement" style="width:35px;height:35px">-</button>
                                                        <input type="text" class="quantity-input" name="quantity_regular' . $DISH_id . '' . $sku . '" value="1">
                                                        <button class="quantity-increment" style="width:35px;height:35px">+</button>
                                                    </div>';
                                                        echo '</label>';
                                                    } else {
                                                        echo '<label class="radio-box">';
                                                        echo "<input onchange='changeprice(" . $dish_attr_row['price'] . ")'  type='radio' " . $isChecked . " name='attribute_regular" . $DISH_id . "[]' value='" . $attr_id . "' id='" . $attribute_id . "' data-price='" . $price . "' data-sku='" . $main_sku . "'  />";
                                                        echo '<div class="radio-box-content">';
                                                        echo '<span class="attrlabel badge dishbadge">' . $dish_attr_row['attribute'] . '</span>';
                                                        // echo "<span class='price'> <i class='fa fa-inr' aria-hidden='true'></i>" . $dish_attr_row['price'] . "</span>";
                                                        echo '</div>';
                                                        echo '</label>';
                                                    }

                                                    // Set the flag to false after the first item is checked
                                                    $firstItemChecked = false;
                                                }

                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Action -->
                                    <div class="product-action clearfix">
                                        <?php
                                        if (count($details) < 4) {
                                        ?>
                                            <div class="product-form__item--quantity">
                                                <div class="wrapQtyBtn">
                                                    <div class="quantity-controls smallControl">
                                                        <button class="quantity-decrement" style="width:35px;height:35px">-</button>
                                                        <input type="text" class="quantity-input" name="quantity_regular<?php echo $DISH_id ?><?php echo $main_sku; ?>" value="1">
                                                        <button class="quantity-increment" style="width:35px;height:35px">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else if (count($details) <= 0) {
                                        ?>
                                            <div class="product-form__item--quantity">
                                                <div class="wrapQtyBtn">
                                                    <div class="quantity-controls smallControl">
                                                        <button class="quantity-decrement" style="width:35px;height:35px">-</button>
                                                        <input type="text" class="quantity-input" name="quantity_regular<?php echo $DISH_id ?><?php echo $main_sku; ?>" value="1">
                                                        <button class="quantity-increment" style="width:35px;height:35px">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php                                      }
                                        ?>

                                        <div class="row">
                                            <div class="col-12 col-md-12 col-sm-12 col-lg-6">
                                                <div class="product-form__item--submit">
                                                    <button type="button" onclick="<?php echo $additem ?>" class="btn product-form__cart-submit btn-success">
                                                        <span>Add to cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>



                                        <?php
                                        if ($is_attribute_product == '1') {
                                        ?>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    // Initialize the price when the page loads
                                                    const initialPrice_regular<?php echo $dish_name_underscore; ?> = parseFloat('<?php echo $details[0]['price']; ?>');
                                                    const price_regular<?php echo $dish_name_underscore; ?> = document.getElementById('price_regular<?php echo $dish_name_underscore; ?>');

                                                    if (price_regular<?php echo $dish_name_underscore; ?> !== null) {
                                                        price_regular<?php echo $dish_name_underscore; ?>.textContent = initialPrice_regular<?php echo $dish_name_underscore; ?>.toFixed(0);
                                                    }

                                                    // JavaScript to update the price when a radio button is clicked
                                                    const radioButtons_<?php echo $dish_name_underscore; ?> = document.querySelectorAll('input[name="attribute_regular<?php echo $ID ?>"]');

                                                    radioButtons_<?php echo $dish_name_underscore; ?>.forEach(function(radio) {
                                                        radio.addEventListener('change', function() {
                                                            const selectedPrice = parseFloat(this.getAttribute('data-price'));
                                                            if (price_regular<?php echo $dish_name_underscore; ?> !== null) {
                                                                price_regular<?php echo $dish_name_underscore; ?>.textContent = selectedPrice.toFixed(0);
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                        <?php } ?>
                                    </div>
                </form>
                <div class="display-table-cell text-right">
                    <div class="social-sharing">
                        <a target="_blank" href="https://facebook.com/share.php?u=<?php echo $meta_url ?>" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                        </a>
                        <a target="_blank" href="https://twitter.com/share?text=<?php echo $dish ?>&url=<?php echo $meta_url ?>" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                            <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                        </a>

                        <a href="https://api.whatsapp.com/send?text=<?php echo $dish; ?> <?php echo $meta_url ?>" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share On Whatsapp" target="_blank">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Whatsapp</span>
                        </a>
                    </div>
                </div>

                <div class="prFeatures">

                    <div class="row mb-0 pb-0">
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 nowrap no-wrap feature card py-3 shadow-sm">
                            <img src="<?php echo SITE_PATH ?>images/delicious.png" alt="Delicious" title="Delicious" />
                            <div class="details">
                                <h3>Delicious Food</h3>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 nowrap no-wrap feature card py-3 shadow-sm">
                            <img src="<?php echo SITE_PATH ?>images/credit-card.png" alt="Safe Payment" title="Safe Payment" />
                            <div class="details">
                                <h3>Safe Payment</h3>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 nowrap no-wrap feature card py-3 shadow-sm">
                            <img src="<?php echo SITE_PATH ?>images/worldwide.png" alt="Worldwide Delivery" title="Worldwide Delivery" />
                            <div class="details">
                                <h3>Fast Delivery</h3>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

    </div>
    <?php
    if ($dish_detail != '') {
    ?>
        <div class="tabs-listing">
            <ul class="product-tabs">
                <li rel="tab1"><a class="tablink">Product Details</a></li>

            </ul>
            <div class="tab-container">
                <div id="tab1" class="tab-content">
                    <div class="product-description rte">
                        <?php echo $dish_detail; ?>
                    </div>
                </div>

            </div>
        </div>
    <?php  }
    ?>

    </div>
    </div>
    <!--End Related Product Slider-->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>
    <script src="<?= SITE_PATH ?>js/zoom.js"></script>
    <script>
        // image zoom effect
        $('.img-zoom').zoom();
    </script>
    <script>
        function changeprice(id) {
            $("#dishmainprice").html('<i class="fa fa-inr" aria-hidden="true"></i> ' + id);
        }
    </script>
    <script>
        const cards = document.querySelectorAll('.feature');
        let currentCardIndex = 0;

        function zoomInOut() {
            if (cards.length > 0) {
                cards.forEach((card, index) => {
                    if (index === currentCardIndex) {
                        if (card) {
                            card.style.transform = 'scale(1.2)';
                            card.style.zIndex = '9';
                        }
                    } else {
                        if (card) {
                            card.style.transform = 'scale(1)';
                            card.style.zIndex = '1';

                        }
                    }
                });

                setTimeout(() => {
                    if (cards[currentCardIndex]) {
                        cards[currentCardIndex].style.transform = 'scale(1)';
                        currentCardIndex = (currentCardIndex + 1) % cards.length;
                    }
                }, 500);
            }
        }

        setInterval(zoomInOut, 1000);
    </script>
    <script>
        function showMultipleImg(imgSrc) {
            var $bigImg = $("#bigImg");

            // Hide the container first
            $bigImg.hide();

            // Set the HTML content and image source
            $bigImg.html('<img class="img-zoom img-thumbnail img-fluid" src="' + imgSrc + '" alt="" style="justify-content: center;display: flex;margin: 0 auto; height: 50% !important;width: 100%  !important;">');

            // Apply fadeIn effect when showing the container
            $bigImg.fadeIn();

            // Initialize zoom on the image
            $('.img-zoom').zoom();
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $('.your-class').owlCarousel({
            items: 5,
            loop: true,
            autoplay: false,
            margin: 10,
            nav: true,
            dots: false,
            navText: ['<span class="fa fa-angle-left fa-2x"></span>', '<span class="fa fa-angle-right fa-2x"></span>'],
            responsive: {

                0: {
                    items: 4
                },

                480: {
                    items: 5
                },

                640: {
                    items: 5
                },

                990: {
                    items: 5
                },

                1140: {
                    items: 5
                }
            }
        });
    </script>

</body>

</html>