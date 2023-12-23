<div id="mySlideInModal">
    <div class="dishdaytitle">Dish Of The Day</div>

    <?php
    $not_detailed_dish = get_dish_of_the_day($conn);
    foreach ($not_detailed_dish as $dish) {
        $details = $dish['details'];
        $dish_name_underscore = str_replace(' ', '_', $dish['dish']);
        $uniqueqty = $dish_name_underscore . '_' . $dish['main_sku'];
    ?>
        <div class="item-containerday d-flex align-items-center">
            <div class="details-containerday">
                <div class="dishtitileday ">
                    <?php
                    if ($dish['type'] == 'veg') {
                    ?>
                        <img src="<?php echo SITE_PATH ?>images/veg.png" alt="" class="typeicon">
                    <?php } else {
                    ?>
                        <img src="<?php echo SITE_PATH ?>images/non-veg.png" alt="" class="typeicon">
                    <?php }
                    ?>
                    <h3 class="item-name-textday mb-0"><?php echo $dish['dish'] ?> </h3>
                </div>

                <div class="item-priceday-containerday">
                    <span class="priceday" style="justify-content: space-between;">
                        <div>
                            <span id="priceday_lunch12" data-priceday="99" data-sku="RICE-3">
                                <?php
                                if ($dish['is_attribute_product'] == '0') {
                                ?>
                                    <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_breakfast<?php echo $dish['ID']; ?>" data-price="<?php echo $dish['selling_price']; ?>" data-sku="<?php echo $dish['main_sku']; ?>"><?php echo $dish['selling_price'] ?></span></span>

                                <?php } else {
                                ?>
                                    <span class="price"> <i class="fa fa-inr" aria-hidden="true"></i> <span id="price_breakfast<?php echo $dish_name_underscore; ?>"></span></span>
                                <?php }
                                ?>

                            </span>
                        </div>
                        <div>
                            <a <?php if ($website_close == 0) : ?> href="<?php echo SITE_PATH ?>dish/<?php echo $dish['slug']; ?>" <?php else : ?> onclick="websiteclose()" <?php endif; ?>>
                                <button class="badge-dark bg-dark badge badge-sm">Order Now <i class="fa fa-shopping-cart" aria-hidden="true"></i>
</button>
                            </a>

                        </div>
                    </span>
                </div>
            </div>
            <div class="image-containerday">
                <div>
                    <button class="image-buttonday" aria-label="chole-rice" style="width: 100%;">
                        <img alt="chole-rice" class="item-imageday" loading="lazy" src="http://localhost/food-ordering/admin/media/dish/chole-rice2023-9472.png">
                    </button>
                </div>
            </div>
        </div>

    <?php } ?>
</div>
<style>
    #mySlideInModal {
        height: max-content;
        box-shadow: 0 0 20px 2px #729a1bb5;
        width: max-content;
        background: white;
        position: fixed;
        top: 50%;
        left: -400px;
        /* Center horizontally */
        transform: translate(0, -50%);
        /* Center vertically and horizontally */
        z-index: 9999;
        transition: left 1s ease-in-out;
    }

    .item-containerday {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-direction: column-reverse;
        margin-bottom: 2px;
        width: 100%;
        /* padding-right: 30px; */
        justify-content: start;
        align-items: flex-start !important;
        ;
    }

    .dishtitileday {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .details-containerday {
        flex: 1;
        padding: 0 15px;
        width: 100%;
    }

    .details-containerday img.typeicon {
        width: 25px;
    }

    .item-name-textday {
        margin-bottom: 0;
        white-space: nowrap !important;
    }

    .item-priceday-containerday {
        font-size: 1.3rem;
        margin-top: 10px;
        color: #0c800c;
    }

    .priceday {
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .image-containerday {
        flex: 1;
    }

    .image-buttonday {
        background: rgb(246, 246, 246);
        width: 200px;
        padding: 0;
    }

    .item-imageday {
        width: 256px;
    }

    .dishdaytitle {
        position: absolute;
        top: -20px;
        white-space: nowrap;
        left: 50%;
        transform: translate(-50%, 0);
        background: #729a1b;
        padding: 10px;
        color: white;
        font-weight: 700;
        border-radius: 10px
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Trigger the animation after the page has loaded
        var modal = document.getElementById('mySlideInModal');
        modal.style.left = '0'; // Slide into the viewport
    });
</script>