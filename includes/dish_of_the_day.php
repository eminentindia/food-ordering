<span id="dishButton" class='buttonHOVER'>Dish Of The Day</span>
<div class='popuphoverdiv'>
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
                            <img alt="<?php echo $dish['slug'] ?>" class="item-imageday" loading="lazy" width="100" height="100" src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $dish['image'] ?>">
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<style>
    .buttonHOVER {
        position: fixed;
        top: 50vh;
        transform: rotate(-90deg);
        left: -70px;
        border-radius: 18px;
        display: inline-block;
        text-align: center;
        background-color: #FFC107;
        padding: 10px 30px;
        font-size: 1.1rem;
        transition: all 1s;
        -webkit-transition: background-color 1s;
    }

    .popuphoverdiv {
        position: fixed;
        left: 45px;
        top: 50vh;
        visibility: hidden;
        pointer-events: auto;
        transition: visibility 1s, opacity 1s, margin 0.5s;
        -webkit-transition: visibility 1s, opacity 1s, margin 0.5s;
        background: white;
        box-shadow: 0 0 20px 2px #729a1bb5;
        z-index: 999999;
        opacity: 0;
        margin-left: 0;
        margin-top: -20px;
    }

    #dishButton:hover+.popuphoverdiv {
        margin-left: 5px;
        margin-top: -20px;
        visibility: visible;
        opacity: 1;
    }

    .buttonHOVER:hover {
        background-color: #729a1b;
        cursor: pointer;
        color: white;
    }

    .item-containerday {
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 20px;
        flex-direction: column-reverse;
        margin-bottom: 2px;
        width: 100%;
        justify-content: start;
        align-items: flex-start !important;
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

    @media only screen and (max-width: 700px) {
        .buttonHOVER {
            top: 30vh;
            left: -51px;
            font-size: .7rem;
            transition: all 1s;
            -webkit-transition: background-color 1s;
            padding: 5px 20px;
            text-transform: uppercase;
        }

        .popuphoverdiv {
            top: 30vh;
            left: 31px;
        }
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
        var t = document.getElementById("dishButton"),
            e = t.nextElementSibling;
        t.addEventListener("click", function() {
            e.style.visibility = "visible", e.style.opacity = "1"
        }), t.addEventListener("mouseover", function() {
            e.style.visibility = "visible", e.style.opacity = "1"
        }), document.addEventListener("mouseover", function(i) {
            e.contains(i.target) || i.target === t || (e.style.visibility = "hidden", e.style.opacity = "0")
        })
    });
</script>