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
                        <ul>
                            <?php
                            $query = "select * from category ORDER BY RAND()";
                            $sel = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($sel)) {
                                $ID = $row['ID'];
                                $slug = $row['slug'];
                            ?>
                                <li><a href="<?php echo SITE_PATH ?>category/<?php echo $slug; ?>" class="site-nav"><?php echo $row['category']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        <h4 class="h4">Informations</h4>
                        <ul>
                            <li><a href="<?php echo SITE_PATH ?>about-us">About us</a></li>
                            <li><a href="javascript:void(0)">Careers</a></li>
                            <li><a href="javascript:void(0)">Privacy policy</a></li>
                            <li><a href="javascript:void(0)">Terms &amp; condition</a></li>

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
<style>

</style>

<?php
$requestUri = $_SERVER['REQUEST_URI'];
$pageName = basename($requestUri);

if ($pageName == 'cart' || $pageName == 'checkout') {
} else {
?>
    <div class="bottomfilter">
        <div class="atech-sticky-navbar has-ccols ccols-4  fixed">
            <div class="sticky-icon link-home">
                <a href="https://handikart.co.in">
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