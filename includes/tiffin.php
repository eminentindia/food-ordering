<style>
    .attribute-label {
        display: flex;
        align-items: center;
        flex-direction: row;
    }

    .multiplelabel .attribute-label {
        margin: 0;
        display: flex;
        align-items: baseline;
    }
</style>
<div id="tiffin">
    <div class="container p-0 tiffincont" style="box-shadow: 0px 0px 30px #729a1b26;">
        <div class="section-header text-center" style="margin-bottom: 0;">
            <h2 class="h2">Food <span>Menu</span></h2>
            <p class="subitalic">Tiffin By Foodieez</p>
        </div>
        <div class="stickytiffin">
            <ul class="nav nav-tabs tiffinmaindiv" id="tiffinmaindiv">
                <li class="w-100">
                    <div class="max-content w-100"> <a class="nav-link text-uppercase" data-toggle="tab" href="#breakfast">
                            <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/breakfast-icon.png" alt=""> <span>Breakfast</span>
                        </a>
                    </div>
                </li>
                <li class="w-100">
                    <div class="max-content w-100"> <a class="nav-link text-uppercase active" data-toggle="tab" href="#lunch">
                            <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/lunch-icon.png" alt=""> <span>Lunch/Dinner</span>
                        </a>
                    </div>
                </li>
                <li class="w-100">
                    <div class="max-content w-100"> <a class="nav-link text-uppercase" data-toggle="tab" href="#noodles">
                            <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/dinner-icon.png" alt=""> <span>Noodles</span>
                        </a>
                    </div>
                </li>
                <li class="w-100">
                    <div class="max-content w-100"> <a class="nav-link text-uppercase" data-toggle="tab" href="#beverages">
                            <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/beverages-icon.png" alt=""> <span>Beverages/ </br> Noodles</span>
                        </a>
                    </div>
                </li>
                <li class="w-100">
                    <div class="max-content w-100"> <a class="nav-link text-uppercase" data-toggle="tab" href="#monthlyplan">
                            <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/plan-icon.png" alt=""> <span>MONTHLY PLAN</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content" style=" ">
            <div class="tab-pane container fade" id="breakfast">
                <?php
                $not_detailed_dish = get_not_detailed_dish_breakfast($conn);
                foreach ($not_detailed_dish as $dish) {
                    $details = $dish['details'];
                    $dish_name_underscore = str_replace(' ', '_', $dish['dish']);
                    $uniqueqty = $dish_name_underscore . '_' . $dish['main_sku'];
                ?>
                    <div class="item-container">
                        <div class="details-container">
                            <div aria-hidden="true">
                                <?php
                                if ($dish['type'] == 'veg') {
                                ?>
                                    <img src="images/veg.png" alt="" class="typeicon">
                                <?php } else {
                                ?>
                                    <img src="images/non-veg.png" alt="" class="typeicon">
                                <?php }
                                ?>
                            </div>
                            <div class="item-name" aria-hidden="true">
                                <h3 class="item-name-text"><?php echo $dish['dish'] ?></h3>
                            </div>
                            <div class="item-price-container" aria-hidden="true">
                                <?php
                                if (count($details) > 4) {
                                } else {
                                ?>
                                    <?php
                                    if ($dish['is_attribute_product'] == '0') {
                                    ?>
                                        <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_breakfast<?php echo $dish['ID']; ?>" data-price="<?php echo $dish['selling_price']; ?>" data-sku="<?php echo $dish['main_sku']; ?>"><?php echo $dish['selling_price'] ?></span></span>

                                    <?php } else {
                                    ?>
                                        <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_breakfast<?php echo $dish_name_underscore; ?>"></span></span>
                                    <?php }
                                    ?>
                                <?php }
                                ?>
                                <?php if ($dish['price_tagline'] != '') {
                                ?>
                                    <span class="mainprice_tagline"><?php echo $dish['price_tagline']  ?></span>
                                <?php } ?>
                            </div>
                            <div class="item-description" aria-hidden="true" style="width: 100%;">
                                <?php
                                if ($dish['short_description'] != '') {
                                ?>
                                    <?php echo $dish['short_description'] ?>
                                <?php } ?>
                            </div>

                            <?php if ($dish['is_available'] == '1') {
                            ?>
                                <?php
                                if ($dish['is_attribute_product'] == '1') {
                                ?>
                                    <div class="attributes-container">
                                        <?php

                                        $firstItemChecked = true; // Flag to check the first item
                                        foreach ($details as $index => $detail) {
                                            $attribute = $detail['attribute'];
                                            $attr_id = $detail['dish_detail_id'];
                                            $sku = $detail['sku'];
                                            $price = $detail['price'];
                                            $attribute_name = $attribute . '_' . $attr_id; // Concatenate attribute and attr_id
                                            $attribute_id = 'attribute_breakfast' . $index . '_' . $sku . '_' . $attribute; // Create a unique attribute ID
                                            $uniqueqty = $dish_name_underscore . '_' . $sku;
                                            // Determine whether to check the item
                                            $isChecked = $firstItemChecked ? 'checked' : '';
                                            echo '<input type="hidden" name="sku_' . $sku . '" value="' . $sku  . '">';
                                        ?>
                                            <label class="attribute-box">
                                                <?php
                                                if (count($details) > 4) {
                                                ?>
                                                    <div class="attribute-label multiplelabel">
                                                        <input type="checkbox" name="attribute_breakfast<?php echo $dish['ID'] ?>[]" value="<?php echo $attr_id; ?>" id="<?php echo $attribute_id; ?>" <?php echo $isChecked; ?> data-price="<?php echo $price; ?>" data-sku="<?php echo $sku; ?>">
                                                        <span class="attribute-label"><?php echo $attribute; ?><span class="gappricemul ml-2"> @<?php echo $price; ?></span></span>
                                                        <div class="quantity-controls smallControl">
                                                            <!-- Quantity increment and decrement elements -->
                                                            <button class="quantity-decrement">-</button>
                                                            <input type="text" class="quantity-input" name="quantity_breakfast<?php echo $dish['ID'] ?><?php echo $sku; ?>" value="1">
                                                            <button class="quantity-increment">+</button>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="radio" name="attribute_breakfast<?php echo $dish['ID'] ?>" value="<?php echo $attr_id; ?>" id="<?php echo $attribute_id; ?>" <?php echo $isChecked; ?> data-sku="<?php echo $dish['main_sku']; ?>" data-price="<?php echo $price; ?>">
                                                    <span class="attribute-label"><?php echo $attribute; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </label>
                                        <?php
                                            // Set the flag to false after the first item is checked
                                            $firstItemChecked = false;
                                        }
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                if (count($details) < 4) {
                                ?>
                                    <div class="quantity-controls smallControl">
                                        <!-- Quantity increment and decrement elements -->
                                        <button class="quantity-decrement">-</button>
                                        <input type="text" class="quantity-input" name="quantity_breakfast<?php echo $dish['ID'] ?><?php echo $dish['main_sku']; ?>" value="1">
                                        <button class="quantity-increment">+</button>
                                    </div>
                                <?php }
                                ?>
                            <?php } ?>
                        </div>
                        <div class="image-container">
                            <div aria-hidden="true">
                                <button class="image-button" aria-label="<?php echo $dish['slug'] ?>" style="background: rgb(246 246 246);">
                                    <img alt="<?php echo $dish['slug'] ?>" class="item-image" loading="lazy" width="256" src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $dish['image'] ?>">
                                    <?php if ($dish['is_available'] == '0') {
                                    ?>
                                        <div class="outfstock">
                                            OUT OF STOCK
                                        </div>
                                    <?php }
                                    if ($dish['is_popular'] == '1') {
                                    ?>
                                        <div class="light">
                                            POPULAR
                                        </div>
                                    <?php }
                                    ?>
                                </button>
                            </div>

                            <?php if ($dish['is_available'] == '1') {
                            ?>
                                <div class="add-button <?php echo $dish['ID']; ?>">
                                    <div class="add-button-inner">
                                        <div class="add-button-text" onclick="AddToCart('<?php echo $dish['ID']; ?>','quantity_breakfast<?php echo $uniqueqty ?>','breakfast');">
                                            <span class="text">ADD</span>
                                            <span class="custom-loader d-none">
                                                <!-- Use your custom loader class name here -->
                                                <div class="addtocartloading">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    if ($dish['is_attribute_product'] == '1') {
                    ?>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Initialize the price when the page loads
                                const initialPrice_breakfast<?php echo $dish_name_underscore; ?> = parseFloat('<?php echo $details[0]['price']; ?>');
                                const price_breakfast<?php echo $dish_name_underscore; ?> = document.getElementById('price_breakfast<?php echo $dish_name_underscore; ?>');

                                if (price_breakfast<?php echo $dish_name_underscore; ?> !== null) {
                                    price_breakfast<?php echo $dish_name_underscore; ?>.textContent = initialPrice_breakfast<?php echo $dish_name_underscore; ?>.toFixed(0);
                                }

                                // JavaScript to update the price when a radio button is clicked
                                const radioButtons_<?php echo $dish_name_underscore; ?> = document.querySelectorAll('input[name="attribute_breakfast<?php echo $dish['ID'] ?>"]');

                                radioButtons_<?php echo $dish_name_underscore; ?>.forEach(function(radio) {
                                    radio.addEventListener('change', function() {
                                        const selectedPrice = parseFloat(this.getAttribute('data-price'));
                                        if (price_breakfast<?php echo $dish_name_underscore; ?> !== null) {
                                            price_breakfast<?php echo $dish_name_underscore; ?>.textContent = selectedPrice.toFixed(0);
                                        }
                                    });
                                });
                            });
                        </script>
                    <?php } ?>

                <?php
                }
                ?>
            </div>
            <div class="tab-pane container show active" id="lunch">
                <?php
                $not_detailed_dish = get_not_detailed_dish_lunch($conn);
                foreach ($not_detailed_dish as $dish) {
                    $details = $dish['details'];
                    $dish_name_underscore = str_replace(' ', '_', $dish['dish']);
                    $uniqueqty = $dish_name_underscore . '_' . $dish['main_sku'];
                ?>
                    <div class="item-container">
                        <div class="details-container">
                            <div aria-hidden="true">
                                <?php
                                if ($dish['type'] == 'veg') {
                                ?>
                                    <img src="images/veg.png" alt="" class="typeicon">
                                <?php } else {
                                ?>
                                    <img src="images/non-veg.png" alt="" class="typeicon">
                                <?php }
                                ?>
                            </div>
                            <div class="item-name" aria-hidden="true">
                                <h3 class="item-name-text"><?php echo $dish['dish'] ?></h3>
                            </div>
                            <div class="item-price-container" aria-hidden="true">
                                <?php
                                if (count($details) > 4) {
                                } else {
                                ?>
                                    <?php
                                    if ($dish['is_attribute_product'] == '0') {
                                    ?>
                                        <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_lunch<?php echo $dish['ID']; ?>" data-price="<?php echo $dish['selling_price']; ?>" data-sku="<?php echo $dish['main_sku']; ?>"><?php echo $dish['selling_price'] ?></span></span>

                                    <?php } else {
                                    ?>
                                        <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_lunch<?php echo $dish_name_underscore; ?>"></span></span>
                                    <?php }
                                    ?>
                                <?php }
                                ?>
                                <?php if ($dish['price_tagline'] != '') {
                                ?>
                                    <span class="mainprice_tagline"><?php echo $dish['price_tagline']  ?></span>
                                <?php } ?>

                            </div>
                            <div class="item-description" aria-hidden="true" style="width: 100%;">
                                <?php
                                if ($dish['short_description'] != '') {
                                ?>
                                    <?php echo $dish['short_description'] ?>
                                <?php } ?>
                            </div>
                            <?php if ($dish['is_available'] == '1') {
                            ?>
                                <?php
                                if ($dish['is_attribute_product'] == '1') {
                                ?>
                                    <div>

                                        <div id="dish_<?php echo $dish['ID'] ?>" class="attributes-container <?php if (count($details) > 4) {
                                                                                                                    echo "mulAttributediv";
                                                                                                                } ?>">
                                            <?php if (count($details) > 4) { ?>
                                                <div style="position: fixed;width: 100%;margin: 0 auto;display: flex;justify-content: center;    height: 0;padding: 11px 16px; background-color: #60b246;" class="pb-5 add-button <?php echo $dish['ID']; ?>">
                                                    <div class="add-button-inner">
                                                        <div class="add-button-text" style="box-shadow: none  !important;" onclick="AddToCart('<?php echo $dish['ID']; ?>','quantity_lunch<?php echo $uniqueqty ?>','lunch');"><span class="text">ADD</span>
                                                            <span class="custom-loader d-none"> <!-- Use your custom loader class name here -->

                                                                <div class="addtocartloading">
                                                                    <span></span>
                                                                    <span></span>
                                                                    <span></span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if (count($details) > 4) {
                                            ?>
                                                <div class="closeadditionpop cursor-pointer" onclick="openpopup('dish_<?php echo $dish['ID']; ?>')">X</div>
                                                <div style="    display: flex;align-items: center;flex-direction: column;margin-bottom: 20px;">
                                                    <div aria-hidden="true">
                                                        <?php
                                                        if ($dish['type'] == 'veg') {
                                                        ?>
                                                            <img src="images/veg.png" alt="" class="typeicon">
                                                        <?php } else {
                                                        ?>
                                                            <img src="images/non-veg.png" alt="" class="typeicon">
                                                        <?php }
                                                        ?>
                                                    </div>
                                                    <div class="item-name mb-2" aria-hidden="true" style="    border-bottom: 1px dashed #b7b7b7; padding-bottom: 10px;">
                                                        <h3 class="item-name-text"><?php echo $dish['dish'] ?></h3>
                                                    </div>
                                                    <div aria-hidden="true">
                                                        <button class="image-button image-button2" aria-label="<?php echo $dish['slug'] ?>" style="background: rgb(246 246 246);">
                                                            <img alt="<?php echo $dish['slug'] ?>" class="item-image" loading="lazy" width="256" src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $dish['image'] ?>">
                                                            <?php if ($dish['is_available'] == '0') {
                                                            ?>
                                                                <div class="outfstock">
                                                                    OUT OF STOCK
                                                                </div>
                                                            <?php }
                                                            if ($dish['is_popular'] == '1') {
                                                            ?>
                                                               
                                                            <?php }

                                                            ?>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="popscroller">
                                                <?php } ?>
                                                <?php
                                                $firstItemChecked = true; // Flag to check the first item
                                                foreach ($details as $index => $detail) {
                                                    $attribute = $detail['attribute'];
                                                    $attr_id = $detail['dish_detail_id'];
                                                    $sku = $detail['sku'];
                                                    $price = $detail['price'];
                                                    $attribute_name = $attribute . '_' . $attr_id; // Concatenate attribute and attr_id
                                                    $attribute_id = 'attribute_lunch' . $index . '_' . $sku . '_' . $attribute; // Create a unique attribute ID
                                                    $uniqueqty = $dish_name_underscore . '_' . $sku;
                                                    // Determine whether to check the item
                                                    $isChecked = $firstItemChecked ? 'checked' : '';
                                                    echo '<input type="hidden" name="sku_' . $sku . '" value="' . $sku  . '">';
                                                ?>
                                                    <label class="attribute-box ">
                                                        <?php
                                                        if (count($details) > 4) {
                                                        ?>
                                                            <div class="mulAttributediv-content">
                                                                <div class="">
                                                                    <div class="multiplelabel">
                                                                        <input type="checkbox" name="attribute_lunch<?php echo $dish['ID'] ?>[]" value="<?php echo $attr_id; ?>" id="<?php echo $attribute_id; ?>" <?php echo $isChecked; ?> data-price="<?php echo $price; ?>" data-sku="<?php echo $sku; ?>" onchange="showhidediv('<?php echo $attr_id . '_' . $sku ?>')">
                                                                        <span class="attribute-label"><?php echo $attribute; ?><span class="gappricemul ml-2"> @<?php echo $price; ?></span></span>

                                                                        <div class="quantity-controls smallControl <?php echo $attr_id . '_' . $sku ?>" <?php if ($index > 0) {
                                                                                                                                                            echo 'style="display:none;"';
                                                                                                                                                        } ?>>
                                                                            <!-- Quantity increment and decrement elements -->
                                                                            <button class="quantity-decrement">-</button>
                                                                            <input type="text" class="quantity-input" name="quantity_lunch<?php echo $dish['ID'] ?><?php echo $sku; ?>" value="1">
                                                                            <button class="quantity-increment">+</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <input type="radio" name="attribute_lunch<?php echo $dish['ID'] ?>" value="<?php echo $attr_id; ?>" id="<?php echo $attribute_id; ?>" <?php echo $isChecked; ?> data-sku="<?php echo $dish['main_sku']; ?>" data-price="<?php echo $price; ?>">
                                                            <span class="attribute-label"><?php echo $attribute; ?></span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </label>
                                                <?php
                                                    // Set the flag to false after the first item is checked
                                                    $firstItemChecked = false;
                                                }
                                                ?>
                                                <?php if (count($details) > 4) {
                                                    echo ' </div>';
                                                } ?>
                                                </div>
                                        </div>
                                    <?php
                                }
                                    ?>

                                    <?php
                                    if (count($details) < 4) {
                                    ?>
                                        <div class="quantity-controls smallControl">
                                            <!-- Quantity increment and decrement elements -->
                                            <button class="quantity-decrement">-</button>
                                            <input type="text" class="quantity-input" name="quantity_lunch<?php echo $dish['ID'] ?><?php echo $dish['main_sku']; ?>" value="1">
                                            <button class="quantity-increment">+</button>
                                        </div>
                                    <?php }
                                    ?>
                                <?php } ?>
                                    </div>
                                    <div class="image-container">
                                        <div aria-hidden="true">
                                            <button class="image-button" aria-label="<?php echo $dish['slug'] ?>" style="background: rgb(246 246 246);">
                                                <img alt="<?php echo $dish['slug'] ?>" class="item-image" loading="lazy" width="256" src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $dish['image'] ?>">
                                                <?php if ($dish['is_available'] == '0') {
                                                ?>
                                                    <div class="outfstock">
                                                        OUT OF STOCK
                                                    </div>
                                                <?php }
                                                if ($dish['is_popular'] == '1') {
                                                ?>
                                                    <div class="light">
                                                        POPULAR
                                                    </div>
                                                <?php }
                                                ?>
                                            </button>
                                        </div>
                                        <?php if ($dish['is_available'] == '1') {
                                        ?>

                                            <?php
                                            if (count($details) < 4) {
                                            ?>
                                                <div class="add-button <?php echo $dish['ID']; ?>">
                                                    <div class="add-button-inner">
                                                        <div class="add-button-text" onclick="AddToCart('<?php echo $dish['ID']; ?>','quantity_lunch<?php echo $uniqueqty ?>','lunch');"><span class="text">ADD</span>
                                                            <span class="custom-loader d-none"> <!-- Use your custom loader class name here -->

                                                                <div class="addtocartloading">
                                                                    <span></span>
                                                                    <span></span>
                                                                    <span></span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {
                                            ?>
                                                <div class="add-button <?php echo $dish['ID']; ?>">
                                                    <div class="add-button-inner">
                                                        <div class="add-button-text" onclick="openpopup('dish_<?php echo $dish['ID']; ?>')"><span class="text">CUSTOMIZE</span>
                                                            <span class="custom-loader d-none"> <!-- Use your custom loader class name here -->

                                                                <div class="addtocartloading">
                                                                    <span></span>
                                                                    <span></span>
                                                                    <span></span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
                                        <?php }
                                        ?>
                                    </div>
                        </div>
                        <?php
                        if ($dish['is_attribute_product'] == '1') {
                        ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Initialize the price when the page loads
                                    const initialPrice_lunch<?php echo $dish_name_underscore; ?> = parseFloat('<?php echo $details[0]['price']; ?>');
                                    const price_lunch<?php echo $dish_name_underscore; ?> = document.getElementById('price_lunch<?php echo $dish_name_underscore; ?>');

                                    if (price_lunch<?php echo $dish_name_underscore; ?> !== null) {
                                        price_lunch<?php echo $dish_name_underscore; ?>.textContent = initialPrice_lunch<?php echo $dish_name_underscore; ?>.toFixed(0);
                                    }

                                    // JavaScript to update the price when a radio button is clicked
                                    const radioButtons_<?php echo $dish_name_underscore; ?> = document.querySelectorAll('input[name="attribute_lunch<?php echo $dish['ID'] ?>"]');

                                    radioButtons_<?php echo $dish_name_underscore; ?>.forEach(function(radio) {
                                        radio.addEventListener('change', function() {
                                            const selectedPrice = parseFloat(this.getAttribute('data-price'));
                                            if (price_lunch<?php echo $dish_name_underscore; ?> !== null) {
                                                price_lunch<?php echo $dish_name_underscore; ?>.textContent = selectedPrice.toFixed(0);
                                            }
                                        });
                                    });
                                });
                            </script>
                        <?php } ?>

                    <?php
                }
                    ?>
                    </div>
                    <div class="tab-pane container show active" id="noodles">
                        <?php
                        $not_detailed_dish = get_not_detailed_dish_noodles($conn);
                        foreach ($not_detailed_dish as $dish) {
                            $details = $dish['details'];
                            $dish_name_underscore = str_replace(' ', '_', $dish['dish']);
                            $uniqueqty = $dish_name_underscore . '_' . $dish['main_sku'];
                        ?>
                            <div class="item-container">
                                <div class="details-container">
                                    <div aria-hidden="true">
                                        <?php
                                        if ($dish['type'] == 'veg') {
                                        ?>
                                            <img src="images/veg.png" alt="" class="typeicon">
                                        <?php } else {
                                        ?>
                                            <img src="images/non-veg.png" alt="" class="typeicon">
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="item-name" aria-hidden="true">
                                        <h3 class="item-name-text"><?php echo $dish['dish'] ?></h3>
                                    </div>
                                    <div class="item-price-container" aria-hidden="true">
                                        <?php
                                        if (count($details) > 4) {
                                        } else {
                                        ?>
                                            <?php
                                            if ($dish['is_attribute_product'] == '0') {
                                            ?>
                                                <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_noodles<?php echo $dish['ID']; ?>" data-price="<?php echo $dish['selling_price']; ?>" data-sku="<?php echo $dish['main_sku']; ?>"><?php echo $dish['selling_price'] ?></span></span>

                                            <?php } else {
                                            ?>
                                                <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_noodles<?php echo $dish_name_underscore; ?>"></span></span>
                                            <?php }
                                            ?>
                                        <?php }
                                        ?>
                                        <?php if ($dish['price_tagline'] != '') {
                                        ?>
                                            <span class="mainprice_tagline"><?php echo $dish['price_tagline']  ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="item-description" aria-hidden="true" style="width: 100%;">
                                        <?php
                                        if ($dish['short_description'] != '') {
                                        ?>
                                            <?php echo $dish['short_description'] ?>
                                        <?php } ?>
                                    </div>


                                    <?php if ($dish['is_available'] == '1') {
                                    ?>

                                        <?php
                                        if ($dish['is_attribute_product'] == '1') {
                                        ?>
                                            <div class="attributes-container">
                                                <?php
                                                $firstItemChecked = true; // Flag to check the first item
                                                foreach ($details as $index => $detail) {
                                                    $attribute = $detail['attribute'];
                                                    $attr_id = $detail['dish_detail_id'];
                                                    $sku = $detail['sku'];
                                                    $price = $detail['price'];
                                                    $attribute_name = $attribute . '_' . $attr_id; // Concatenate attribute and attr_id
                                                    $attribute_id = 'attribute_noodles' . $index . '_' . $sku . '_' . $attribute; // Create a unique attribute ID
                                                    $uniqueqty = $dish_name_underscore . '_' . $sku;
                                                    // Determine whether to check the item
                                                    $isChecked = $firstItemChecked ? 'checked' : '';
                                                    echo '<input type="hidden" name="sku_' . $sku . '" value="' . $sku  . '">';
                                                ?>
                                                    <label class="attribute-box">
                                                        <?php
                                                        if (count($details) > 4) {
                                                        ?>
                                                            <div class="attribute-label multiplelabel">
                                                                <input type="checkbox" name="attribute_noodles<?php echo $dish['ID'] ?>[]" value="<?php echo $attr_id; ?>" id="<?php echo $attribute_id; ?>" <?php echo $isChecked; ?> data-price="<?php echo $price; ?>" data-sku="<?php echo $sku; ?>">
                                                                <span class="attribute-label"><?php echo $attribute; ?><span class="gappricemul ml-2"> @<?php echo $price; ?></span></span>
                                                                <div class="quantity-controls smallControl">
                                                                    <!-- Quantity increment and decrement elements -->
                                                                    <button class="quantity-decrement">-</button>
                                                                    <input type="text" class="quantity-input" name="quantity_noodles<?php echo $dish['ID'] ?><?php echo $sku; ?>" value="1">
                                                                    <button class="quantity-increment">+</button>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <input type="radio" name="attribute_noodles<?php echo $dish['ID'] ?>" value="<?php echo $attr_id; ?>" id="<?php echo $attribute_id; ?>" <?php echo $isChecked; ?> data-sku="<?php echo $dish['main_sku']; ?>" data-price="<?php echo $price; ?>">
                                                            <span class="attribute-label"><?php echo $attribute; ?></span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </label>
                                                <?php
                                                    // Set the flag to false after the first item is checked
                                                    $firstItemChecked = false;
                                                }
                                                ?>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (count($details) < 4) {
                                        ?>
                                            <div class="quantity-controls smallControl">
                                                <!-- Quantity increment and decrement elements -->
                                                <button class="quantity-decrement">-</button>
                                                <input type="text" class="quantity-input" name="quantity_noodles<?php echo $dish['ID'] ?><?php echo $dish['main_sku']; ?>" value="1">
                                                <button class="quantity-increment">+</button>
                                            </div>
                                        <?php }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="image-container">
                                    <div aria-hidden="true">
                                        <button class="image-button" aria-label="<?php echo $dish['slug'] ?>" style="background: rgb(246 246 246);">
                                            <img alt="<?php echo $dish['slug'] ?>" class="item-image" loading="lazy" width="256" src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $dish['image'] ?>">
                                            <?php if ($dish['is_available'] == '0') {
                                            ?>
                                                <div class="outfstock">
                                                    OUT OF STOCK
                                                </div>
                                            <?php } else if ($dish['is_popular'] == '1') {
                                            ?>
                                                <div class="light">
                                                    POPULAR
                                                </div>
                                            <?php }
                                            ?>
                                        </button>
                                    </div>

                                    <?php if ($dish['is_available'] == '1') {
                                    ?>
                                        <div class="add-button <?php echo $dish['ID']; ?>">
                                            <div class="add-button-inner">
                                                <div class="add-button-text" onclick="AddToCart('<?php echo $dish['ID']; ?>','quantity_noodles<?php echo $uniqueqty ?>','noodles');"><span class="text">ADD</span>
                                                    <span class="custom-loader d-none"> <!-- Use your custom loader class name here -->

                                                        <div class="addtocartloading">
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                            if ($dish['is_attribute_product'] == '1') {
                            ?>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Initialize the price when the page loads
                                        const initialPrice_noodles<?php echo $dish_name_underscore; ?> = parseFloat('<?php echo $details[0]['price']; ?>');
                                        const price_noodles<?php echo $dish_name_underscore; ?> = document.getElementById('price_noodles<?php echo $dish_name_underscore; ?>');

                                        if (price_noodles<?php echo $dish_name_underscore; ?> !== null) {
                                            price_noodles<?php echo $dish_name_underscore; ?>.textContent = initialPrice_noodles<?php echo $dish_name_underscore; ?>.toFixed(0);
                                        }

                                        // JavaScript to update the price when a radio button is clicked
                                        const radioButtons_<?php echo $dish_name_underscore; ?> = document.querySelectorAll('input[name="attribute_noodles<?php echo $dish['ID'] ?>"]');

                                        radioButtons_<?php echo $dish_name_underscore; ?>.forEach(function(radio) {
                                            radio.addEventListener('change', function() {
                                                const selectedPrice = parseFloat(this.getAttribute('data-price'));
                                                if (price_noodles<?php echo $dish_name_underscore; ?> !== null) {
                                                    price_noodles<?php echo $dish_name_underscore; ?>.textContent = selectedPrice.toFixed(0);
                                                }
                                            });
                                        });
                                    });
                                </script>
                            <?php } ?>

                        <?php
                        }
                        ?>
                    </div>
                    <div class="tab-pane container fade" id="beverages">
                        <?php
                        $not_detailed_dish = get_not_detailed_dish_beverages($conn);
                        foreach ($not_detailed_dish as $dish) {
                            $details = $dish['details'];
                            $dish_name_underscore = str_replace(' ', '_', $dish['dish']);
                            $uniqueqty = $dish_name_underscore . '_' . $dish['main_sku'];

                        ?>
                            <div class="item-container">
                                <div class="details-container">
                                    <div aria-hidden="true">
                                        <?php
                                        if ($dish['type'] == 'veg') {
                                        ?>
                                            <img src="images/veg.png" alt="" class="typeicon">
                                        <?php } else {
                                        ?>
                                            <img src="images/non-veg.png" alt="" class="typeicon">
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="item-name" aria-hidden="true">
                                        <h3 class="item-name-text"><?php echo $dish['dish'] ?></h3>
                                    </div>
                                    <div class="item-price-container" aria-hidden="true">
                                        <?php
                                        if (count($details) > 4) {
                                        } else {
                                        ?>
                                            <?php
                                            if ($dish['is_attribute_product'] == '0') {
                                            ?>
                                                <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_beverages<?php echo $dish['ID']; ?>" data-price="<?php echo $dish['selling_price']; ?>" data-sku="<?php echo $dish['main_sku']; ?>"><?php echo $dish['selling_price'] ?></span></span>

                                            <?php } else {
                                            ?>
                                                <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_beverages<?php echo $dish_name_underscore; ?>"></span></span>
                                            <?php }
                                            ?>
                                        <?php }
                                        ?>
                                        <?php if ($dish['price_tagline'] != '') {
                                        ?>
                                            <span class="mainprice_tagline"><?php echo $dish['price_tagline']  ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="item-description" aria-hidden="true" style="width: 100%;">
                                        <?php
                                        if ($dish['short_description'] != '') {
                                        ?>
                                            <?php echo $dish['short_description'] ?>
                                        <?php } ?>
                                    </div>
                                    <?php if ($dish['is_available'] == '1') {
                                    ?>
                                        <?php
                                        if ($dish['is_attribute_product'] == '1') {
                                        ?>
                                            <div class="attributes-container">
                                                <?php
                                                $firstItemChecked = true; // Flag to check the first item
                                                foreach ($details as $index => $detail) {
                                                    $attribute = $detail['attribute'];
                                                    $attr_id = $detail['dish_detail_id'];
                                                    $sku = $detail['sku'];
                                                    $price = $detail['price'];
                                                    $attribute_name = $attribute . '_' . $attr_id; // Concatenate attribute and attr_id
                                                    $attribute_id = 'attribute_beverages' . $index . '_' . $sku . '_' . $attribute; // Create a unique attribute ID
                                                    $uniqueqty = $dish_name_underscore . '_' . $sku;
                                                    // Determine whether to check the item
                                                    $isChecked = $firstItemChecked ? 'checked' : '';
                                                    echo '<input type="hidden" name="sku_' . $sku . '" value="' . $sku  . '">';
                                                ?>
                                                    <label class="attribute-box">
                                                        <?php
                                                        if (count($details) > 4) {
                                                        ?>
                                                            <div class="attribute-label multiplelabel">
                                                                <input type="checkbox" name="attribute_beverages<?php echo $dish['ID'] ?>[]" value="<?php echo $attr_id; ?>" id="<?php echo $attribute_id; ?>" <?php echo $isChecked; ?> data-price="<?php echo $price; ?>" data-sku="<?php echo $sku; ?>">
                                                                <span class="attribute-label"><?php echo $attribute; ?><span class="gappricemul ml-2"> @<?php echo $price; ?></span></span>
                                                                <div class="quantity-controls smallControl">
                                                                    <!-- Quantity increment and decrement elements -->
                                                                    <button class="quantity-decrement">-</button>
                                                                    <input type="text" class="quantity-input" name="quantity_beverages<?php echo $dish['ID'] ?><?php echo $sku; ?>" value="1">
                                                                    <button class="quantity-increment">+</button>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <input type="radio" name="attribute_beverages<?php echo $dish['ID'] ?>" value="<?php echo $attr_id; ?>" id="<?php echo $attribute_id; ?>" <?php echo $isChecked; ?> data-sku="<?php echo $dish['main_sku']; ?>" data-price="<?php echo $price; ?>">
                                                            <span class="attribute-label"><?php echo $attribute; ?></span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </label>
                                                <?php
                                                    // Set the flag to false after the first item is checked
                                                    $firstItemChecked = false;
                                                }
                                                ?>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if (count($details) < 4) {
                                        ?>
                                            <div class="quantity-controls smallControl">
                                                <!-- Quantity increment and decrement elements -->
                                                <button class="quantity-decrement">-</button>
                                                <input type="text" class="quantity-input" name="quantity_beverages<?php echo $dish['ID'] ?><?php echo $dish['main_sku']; ?>" value="1">
                                                <button class="quantity-increment">+</button>
                                            </div>
                                        <?php }
                                        ?>
                                    <?php }
                                    ?>
                                </div>
                                <div class="image-container">
                                    <div aria-hidden="true">
                                        <button class="image-button" aria-label="<?php echo $dish['slug'] ?>" style="background: rgb(246 246 246);">
                                            <img alt="<?php echo $dish['slug'] ?>" class="item-image" loading="lazy" width="256" src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $dish['image'] ?>">
                                            <?php if ($dish['is_available'] == '0') {
                                            ?>
                                                <div class="outfstock">
                                                    OUT OF STOCK
                                                </div>
                                            <?php } else if ($dish['is_popular'] == '1') {
                                            ?>
                                                <div class="light">
                                                    POPULAR
                                                </div>
                                            <?php }
                                            ?>
                                        </button>
                                    </div>
                                    <?php if ($dish['is_available'] == '1') {
                                    ?>
                                    <div class="add-button <?php echo $dish['ID']; ?>">
                                        <div class="add-button-inner">
                                            <div class="add-button-text" onclick="AddToCart('<?php echo $dish['ID']; ?>','quantity_beverages<?php echo $uniqueqty ?>','beverages');"><span class="text">ADD</span>
                                                <span class="custom-loader d-none"> <!-- Use your custom loader class name here -->

                                                    <div class="addtocartloading">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                            if ($dish['is_attribute_product'] == '1') {
                            ?>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Initialize the price when the page loads
                                        const initialPrice_beverages<?php echo $dish_name_underscore; ?> = parseFloat('<?php echo $details[0]['price']; ?>');
                                        const price_beverages<?php echo $dish_name_underscore; ?> = document.getElementById('price_beverages<?php echo $dish_name_underscore; ?>');

                                        if (price_beverages<?php echo $dish_name_underscore; ?> !== null) {
                                            price_beverages<?php echo $dish_name_underscore; ?>.textContent = initialPrice_beverages<?php echo $dish_name_underscore; ?>.toFixed(0);
                                        }

                                        // JavaScript to update the price when a radio button is clicked
                                        const radioButtons_<?php echo $dish_name_underscore; ?> = document.querySelectorAll('input[name="attribute_beverages<?php echo $dish['ID'] ?>"]');

                                        radioButtons_<?php echo $dish_name_underscore; ?>.forEach(function(radio) {
                                            radio.addEventListener('change', function() {
                                                const selectedPrice = parseFloat(this.getAttribute('data-price'));
                                                if (price_beverages<?php echo $dish_name_underscore; ?> !== null) {
                                                    price_beverages<?php echo $dish_name_underscore; ?>.textContent = selectedPrice.toFixed(0);
                                                }
                                            });
                                        });
                                    });
                                </script>
                            <?php } ?>

                        <?php
                        }
                        ?>
                    </div>
                    <div class="tab-pane container fade" id="monthlyplan">
                        <?php
                        $not_detailed_dish = get_not_detailed_dish_monthlyplan($conn);
                        foreach ($not_detailed_dish as $dish) {
                            $dish_name_underscore = str_replace(' ', '_', $dish['dish']);
                            $uniqueqty = $dish_name_underscore . '_' . $dish['main_sku'];

                        ?>
                            <div class="item-container">
                                <div class="details-container">
                                    <div aria-hidden="true">
                                        <?php
                                        if ($dish['type'] == 'veg') {
                                        ?>
                                            <img src="images/veg.png" alt="" class="typeicon">
                                        <?php } else {
                                        ?>
                                            <img src="images/non-veg.png" alt="" class="typeicon">
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="item-name" aria-hidden="true">
                                        <h3 class="item-name-text"><?php echo $dish['dish'] ?></h3>
                                    </div>
                                    <div class="item-price-container" aria-hidden="true">
                                        <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_monthlyplan<?php echo $dish['ID']; ?>" data-price="<?php echo $dish['selling_price']; ?>" data-sku="<?php echo $dish['main_sku']; ?>"><?php echo $dish['selling_price'] ?></span></span>

                                        <?php if ($dish['price_tagline'] != '') {
                                        ?>
                                            <span class="mainprice_tagline"><?php echo $dish['price_tagline']  ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="item-description" aria-hidden="true" style="width: 100%;">
                                        <?php
                                        if ($dish['short_description'] != '') {
                                        ?>
                                            <?php echo $dish['short_description'] ?>
                                        <?php } ?>
                                    </div>

                                    <div class="quantity-controls smallControl">
                                        <!-- Quantity increment and decrement elements -->
                                        <button class="quantity-decrement">-</button>
                                        <input type="text" class="quantity-input" name="quantity_monthlyplan<?php echo $dish['ID'] ?><?php echo $dish['main_sku']; ?>" value="1">
                                        <button class="quantity-increment">+</button>
                                    </div>

                                </div>
                                <div class="image-container">
                                    <div aria-hidden="true">
                                        <button class="image-button" aria-label="<?php echo $dish['slug'] ?>" style="background: rgb(246 246 246);">
                                            <img alt="<?php echo $dish['slug'] ?>" class="item-image" loading="lazy" width="256" src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $dish['image'] ?>">

                                        </button>
                                    </div>

                                    <div class="add-button <?php echo $dish['ID']; ?>">
                                        <div class="add-button-inner">
                                            <div class="add-button-text" onclick="AddToCartPlan('<?php echo $dish['ID']; ?>','quantity_monthlyplan<?php echo $uniqueqty ?>','monthlyplan');"><span class="text">ADD</span>
                                                <span class="custom-loader d-none"> <!-- Use your custom loader class name here -->

                                                    <div class="addtocartloading">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
            </div>
        </div>
    </div>

    <script>
        function showhidediv(id) {
            $('.' + id).fadeToggle(500);
        }
    </script>