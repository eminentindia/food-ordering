<!--Footer-->
<footer id="footer" class="footer-2">
    <div class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
                    <div class="display-table">
                        <div class="display-table-cell footer-newsletter">
                            <div class="section-header text-center">
                                <label class="h2"><span>sign up for </span>newsletter</label>
                            </div>

                            <form method="POST" id="newsletterform">
                                <div class="input-group">
                                    <input type="email" class="input-group__field pb-0 mb-0 newsletter__input" name="newsletter_email" id="newsletter_email" placeholder="Email address" required="">
                                    <span class="input-group__btn">
                                        <button type="Submit" id="newsletter_submit" class="btn newsletter__submit shadow-none"> <span class="newsletter__submit-text--large">Subscribe</span> </button>
                                    </span>
                                </div>
                                <span id="newsemail" class="err_msg"></span>
                                <span id="newssuccess" class="success_msg"></span>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex p-0 m-0">
                    <div class="footer-social">
                        <ul class="list--inline site-footer__social-icons social-icons">
                            <li><a class="social-icons__link" href="<?php echo $facebook; ?>" target="_blank" title="Food Ordering Facebook"><i class="icon icon-facebook"></i></a></li>
                            <li><a class="social-icons__link" href="<?php echo $twitter; ?>" target="_blank" title="Food Ordering Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                            <li><a class="social-icons__link" href="<?php echo $instagram; ?>" target="_blank" title="Food Ordering Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                            <li><a class="social-icons__link" href="<?php echo $youtube; ?>" target="_blank" title="Food Ordering YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer">
        <div class="container">
            <!--Footer Links-->
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Quick Shop</h4>
                        <ul class="position-relative">
                            <?php
                            $query = "SELECT * FROM category  ORDER BY order_number ASC";
                            $sel = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($sel)) {
                                $slug = $row['slug'];
                                $category = $row['category'];
                                $discount = $row['discount'];

                                $discountHTML = $discount ? '<div class="light offdiscountPillFooter">' . $discount . '% Off</div>' : '';

                                echo '<li><a href="' . SITE_PATH . 'category/' . $slug . '" class="site-nav">' . $category . ' ' . $discountHTML . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Informations</h4>
                        <ul>
                            <li><a href="<?php echo SITE_PATH ?>about-us">About us</a></li>
                            <li><a href="javascript:void(0)">Careers</a></li>
                            <li><a href="<?php echo SITE_PATH ?>privacy-policy.php">Privacy policy</a></li>
                            <li><a href="<?php echo SITE_PATH ?>refund-policy.php">Refund policy</a></li>
                            <li><a href="<?php echo SITE_PATH ?>terms-conditions.php">Terms &amp; condition</a></li>

                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Customer Services</h4>
                        <ul>

                            <li><a href="faq">FAQ's</a></li>
                            <li><a href="contact-us">Contact Us</a></li>
                            <li><a href="<?php echo SITE_PATH ?>login">My Account</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                        <h4 class="h4">Contact Us</h4>
                        <ul class="addressFooter">
                            <li><i class="icon anm anm-map-marker-al"></i>
                                <p><?php echo $site_address ?></p>
                            </li>
                            <li class="phone"><i class="icon anm anm-phone-s"></i>
                                <p><?php echo $site_phone ?></p>
                            </li>
                            <li class="email"><i class="icon anm anm-envelope-l"></i>
                                <p><?php echo $site_email ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-center"><span></span> <a href="<?php echo SITE_PATH; ?>">Made <i class="fa fa-heart" style="color: #fd4b4b; animation: animateHeart 0.5s infinite;"></i> in India</a> All Rights Reserved | Developed by <a href="https://www.eminent-india.com/" target="_blank">Eminent India Pvt Ltd</a> </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php

function decryptData($data)
{
    $key = "woefjiow394ru3049jfweiofnio2orj2309ufjw0ejiiowehrf9230ufjwe9u30f9jwio";
    $data = base64_decode($data);
    $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = substr($data, openssl_cipher_iv_length('aes-256-cbc'));
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}
if (isset($_COOKIE["ATECHFOOD_USER_ID"])) {
    $_SESSION["ATECHFOOD_USER_ID"] = decryptData($_COOKIE["ATECHFOOD_USER_ID"]);
}
if (isset($_COOKIE["ATECHFOOD_USER"])) {
    $_SESSION["ATECHFOOD_USER"] = decryptData($_COOKIE["ATECHFOOD_USER"]);
}

if (isset($_COOKIE["name"])) {
    $_SESSION["name"] = decryptData($_COOKIE["name"]);
}

if (isset($_COOKIE["ATECHFOOD_USER_MOBILE"])) {
    $_SESSION["ATECHFOOD_USER_MOBILE"] = decryptData($_COOKIE["ATECHFOOD_USER_MOBILE"]);
}


?>
<!-- <div id="mySlideInModal">
    <div class="dishdaytitle">Dish Of The Day</div>
    <div class="item-containerday d-flex align-items-center">
        <div class="details-containerday">
            <div class="dishtitileday">
                <img src="images/veg.png" alt="" class="typeicon">
                <h3 class="item-name-textday mb-0">Chole Rice</h3>
            </div>

            <div class="item-priceday-containerday" aria-hidden="true">
                <span class="priceday">
                    <i class="fa fa-inr" aria-hidden="true"></i>
                    <span id="priceday_lunch12" data-priceday="99" data-sku="RICE-3">99</span>
                </span>
            </div>
        </div>
        <div class="image-containerday">
            <div aria-hidden="true">
                <button class="image-buttonday" aria-label="chole-rice">
                    <img alt="chole-rice" class="item-imageday" loading="lazy" src="http://localhost/food-ordering/admin/media/dish/chole-rice2023-9472.png">
                </button>
            </div>
        </div>
    </div>
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
        margin-bottom: 15px;
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
</style> -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Trigger the animation after the page has loaded
        var modal = document.getElementById('mySlideInModal');
        modal.style.left = '0'; // Slide into the viewport
    });
</script>


<?php
$requestUri = $_SERVER['REQUEST_URI'];
$pageName = basename($requestUri);

if ($pageName == 'cart' || $pageName == 'checkout') {
} else {
?>
    <div class="bottomfilter">
        <div class="atech-sticky-navbar has-ccols ccols-4  fixed">
            <div class="sticky-icon link-home">
                <a href="">
                    <div class="site-header__search">
                        <a href="<?php echo SITE_PATH ?>" class="">
                            <img src="<?php echo SITE_PATH ?>images/home.png" alt="Home" class="home-icon footerIcon">
                        </a>
                    </div>
                </a>
            </div>
            <div class="sticky-icon link-account" style="    margin-top: 12px;">
                <div class="site-header__search">
                    <div class="site-header__search">
                        <a href="<?php echo SITE_PATH ?>dishes">
                            <img src="<?php echo SITE_PATH ?>images/shop.png" alt="Home" class="home-icon footerIcon">
                        </a>
                    </div>
                </div>
            </div>
            <div class="sticky-icon link-account" style="    margin-top: 12px;">
                <div class="site-header__search">
                    <div class="site-header__search">
                        <button type="button" class="search-trigger"><i class="icon anm anm-search-l footerIcon"></i></button>
                    </div>
                </div>
            </div>

            <?php
            $requestUri = $_SERVER['REQUEST_URI'];
            $pageName = basename($requestUri);

            if ($pageName == 'cart' || $pageName == 'checkout') {
            } else {
            ?>
            <?php }
            ?>
            <div class="sticky-icon link-cart" id="sidebarcartnav" style=" margin:0;   display: flex;flex-direction: column;justify-content: center;align-items: center;">
                <span class="cart-icon cart-button">
                    <div class="site-header__search">
                        <div class="site-cart">
                            <i class="icon anm anm-bag-l footerIcon"></i>
                            <span id="CartCount" class="CartCount site-header__cart-count" data-cart-render="item_count"><?php echo $totalcartcount; ?></span>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>
<?php
}
?>

<?php
include('includes/cart.php');

?>
<!--End Footer-->
<!--Scoll Top-->
<span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
<!--End Scoll Top-->

<script src="<?php echo SITE_PATH ?>js/newsletter.js"></script>

<script>
    function websiteclose() {
        Swal.fire({
            timer: 4000,
            text: "<?php echo $website_close_msg ?>",
            icon: "warning",
            showConfirmButton: false,
            position: "center",
        });
    }

    function loginfirst() {
        Swal.fire({
            timer: 4000,
            text: "Please Login to Continue...",
            icon: "warning",
            showConfirmButton: false,
            position: "center",
        });
    }

    function unavailable() {

        showSweetAlert('error', 'Item is Currently Unavailable !', '', {
            popup: 'swal-error-bg',
            icon: 'swal-error-icon'
        });
    }

    function emptycart() {
        Swal.fire({
            timer: 4000,
            text: "Your Cart Is Empty !",
            icon: "warning",
            dangerMode: true,
            showConfirmButton: false,
            position: "center",
        });
    }
</script>

<!--  -->