<div id="pre-loader">
    <div class="PREloader">
        <div class="face">
            <div class="circle"></div>
        </div>
        <div class="face">
            <div class="circle"></div>
        </div>
    </div>
</div>

<div class="pageWrapper ">
    <?php
    if ($website_close == 1) {
    ?>
        <div class="notification-bar mobilehide">
            <a href="#" class="notification-bar__message">
                <?php echo $website_close_msg; ?>
            </a>

        </div>
    <?php  }
    ?>
    <div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="<?php echo SITE_PATH ?>search" method="get">

                <div class="d-flex align-content-center justify-content-between">
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" name="str" value="" placeholder="Search Dish..." aria-label="Search" autocomplete="off">
                </div>
            </form>
            <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
        </div>
    </div>
    <!--Top Header-->
    <div class="top-header">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-4 col-sm-4 col-md-5 col-lg-4 ">
                    <!-- d-none d-lg-none d-md-block d-lg-block -->
                    <p class="phone-no"><i class="anm anm-phone-s"></i> <?php echo $site_phone ?></p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-6">
                    <div class="text-center">
                        <marquee class="top-header_middle-text"> <?php echo $tagline ?></marquee>
                    </div>
                </div>
                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right dynamiclogin">
                    <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al text-white" aria-hidden="true"></i></span>
                    <ul class="customer-links list-inline">
                        <?php
                        if (isset($_SESSION['ATECHFOOD_USER_ID'])) {
                            echo " <i class='anm anm-user-al text-white' aria-hidden='true'></i> <li><a href='" . SITE_PATH . "profile'>Hi <span id='foodusername'> " . $_SESSION['name'] . "</span></a></li><li><a href='" . SITE_PATH . "orders'>Orders</a></li><li><a href='" . SITE_PATH . "logout'>Logout</a></li>";
                        } else {
                        ?>
                            <li><a href="<?php echo SITE_PATH ?>login">Login Using Mobile</a></li>
                        <?php }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Top Header-->
    <!--Header-->
    <div class="header-wrap animated d-flex border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!--Desktop Logo-->
                <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                    <a href="<?= SITE_PATH ?>">
                        <img src="<?php echo  SITE_PATH . 'admin/' . $logo ?>" alt="" title="" />
                    </a>
                </div>
                <!--End Desktop Logo-->
                <div class="col-2 col-sm-3 col-md-3 col-lg-8 ">
                    <div class="d-block d-lg-none">
                        <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                            <i class="icon anm anm-times-l"></i>
                            <i class="anm anm-bars-r"></i>
                        </button>
                    </div>
                    <!--Desktop Menu-->
                    <nav class="grid__item" id="AccessibleNav">
                        <!-- for mobile -->
                        <ul id="siteNav" class="site-nav medium center hidearrow">
                            <li class="lvl1 parent"><a href="<?php echo SITE_PATH ?>index">Home <i class="anm anm-angle-down-l"></i></a>

                            </li>
                            <!-- <li class="lvl1 parent"><a href="<?php echo SITE_PATH ?>dishes">Dishes <i class="anm anm-angle-down-l"></i></a>
                            </li> -->

                            <li class="lvl1 parent dropdown"><a href="javascript:void(0)">Category <i class="anm anm-angle-down-l"></i></a>
                                <ul class="dropdown">
                                    <?php
                                    $query = "SELECT * FROM category ORDER BY order_number ASC";
                                    $sel = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_array($sel)) {
                                        $slug = $row['slug'];
                                        $category = $row['category'];
                                        $discount = $row['discount'];

                                        $discountHTML = $discount ? '<div class="light offdiscountPill">' . $discount . '% Off</div>' : '';

                                        echo '<li><a href="' . SITE_PATH . 'category/' . $slug . '" class="site-nav">' . $category . ' ' . $discountHTML . '</a></li>';
                                    }
                                    ?>

                                </ul>
                            </li>
                            <li class="lvl1 parent"><a href="<?php echo SITE_PATH ?>combos">Combos <i class="anm anm-angle-down-l"></i></a>
                            </li>

                            <?php
                            $query = "SELECT * FROM category WHERE category IN ('Sandwich', 'Wrap', 'Thali', 'Biryani', 'Paratha', 'Burger') ORDER BY order_number ASC";

                            // $query = "SELECT * FROM category WHERE category IN ('Sandwich',  'Thali') ORDER BY order_number ASC";

                            $sel = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($sel)) {
                                $slug = $row['slug'];
                                $category = $row['category'];
                                $discount = $row['discount'];

                                $discountHTML = $discount ? '<div class="light offdiscountPill">' . $discount . '% Off</div>' : '';

                                echo '<li><a href="' . SITE_PATH . 'category/' . $slug . '" class="lvl1 parent">' . $category . ' ' . $discountHTML . '</a></li>';
                            }
                            ?>



                            <!-- <li class="lvl1 parent"><a href="<?php echo SITE_PATH ?>contact-us">Contact Us<i class="anm anm-angle-down-l"></i></a> -->
                            </li>
                        </ul>
                    </nav>
                    <!--End Desktop Menu-->
                </div>
                <!--Mobile Logo-->
                <div class="col-8 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                    <div class="logo">
                        <a href="<?= SITE_PATH ?>">
                            <img src="<?php echo  SITE_PATH . 'admin/' .  $logo ?>" alt="logo" title="logo" />
                        </a>
                    </div>
                </div>
                <!--Mobile Logo-->
                <div class="col-0 col-sm-3 col-md-3 col-lg-2 navcartitem">


                    <?php
                    $requestUri = $_SERVER['REQUEST_URI'];
                    $pageName = basename($requestUri);

                    if ($pageName == 'cart' || $pageName == 'checkout') {
                    } else {
                    ?>
                        <div class="site-cart cart-button">
                            <a href="javascript:void(0)" class="site-header__cart" title="Cart">
                                <i class="icon anm anm-bag-l"></i>
                                <span id="CartCount" class="site-header__cart-count CartCount" data-cart-render="item_count"><?php echo $totalcartcount; ?></span>
                            </a>
                            <!--Minicart Popup-->
                        </div>
                    <?php                   }

                    ?>


                    <div class="site-header__search">
                        <button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--End Header-->

    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
        <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">


            <li class="lvl1 parent"><a href="<?php echo SITE_PATH ?>index">Home </a>

            </li>
            <li class="lvl1 parent"><a href="<?php echo SITE_PATH ?>dishes">Dishes</a>

            </li>
            <li class="lvl1 parent dropdown"><a href="#">Category <i class="anm anm-angle-down-l"></i></a>
                <ul class="dropdown">
                    <?php
                    $query = "select * from category  ORDER BY order_number ASC";
                    $sel = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($sel)) {
                        $ID = $row['ID'];
                        $slug = $row['slug'];
                    ?>
                        <li><a href="<?php echo SITE_PATH ?>category/<?php echo $slug; ?>" class="site-nav"><?php echo $row['category']; ?></a></li>
                    <?php } ?>
                </ul>
            </li>


            <?php
            $query = "SELECT * FROM category WHERE category IN ('Sandwich', 'Wrap', 'Thali', 'Biryani', 'Paratha', 'Burger') ORDER BY order_number ASC";

            // $query = "SELECT * FROM category WHERE category IN ('Sandwich',  'Thali') ORDER BY order_number ASC";

            $sel = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($sel)) {
                $slug = $row['slug'];
                $category = $row['category'];
                $discount = $row['discount'];

                $discountHTML = $discount ? '<div class="light offdiscountPill">' . $discount . '% Off</div>' : '';

                echo '<li><a href="' . SITE_PATH . 'category/' . $slug . '" class="site-nav">' . $category . ' ' . $discountHTML . '</a></li>';
            }
            ?>


            <li class="lvl1 parent"><a href="<?php echo SITE_PATH ?>contact-us">Contact</a>
            <li class="lvl1 parent"><a href="<?php echo SITE_PATH ?>faq">FAQ</a>
            </li>
        </ul>
    </div>
    <!--End Mobile Menu-->