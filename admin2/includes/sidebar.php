<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <?php
                if ($_SESSION['STORE'] == '100' or $_SESSION['STORE'] == '0') {
                ?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php" aria-expanded="false"><i class="fas fa-chart-line"></i><span class="hide-menu">Dashboard</span></a></li>
                <?php } ?>

                <?php
                if ($_SESSION['STORE'] == '100') {
                ?>

                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-list-ul"></i><span class="hide-menu">Category </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?php echo ADMIN_SITE_PATH; ?>category/view-category.php" class="sidebar-link"><i class="mdi mdi-eye"></i><span class="hide-menu"> View Category
                                    </span></a></li>
                            <li class="sidebar-item"><a href="<?php echo ADMIN_SITE_PATH; ?>category/add-category.php" class="sidebar-link"><i class="mdi mdi-playlist-plus"></i><span class="hide-menu"> Add Category
                                    </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-bicycle"></i><span class="hide-menu">Delievery Boy </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?php echo ADMIN_SITE_PATH; ?>delievery_boy/view_delievery_boy.php" class="sidebar-link"><i class="mdi mdi-eye"></i><span class="hide-menu"> View Delievery Boys
                                    </span></a></li>
                            <li class="sidebar-item"><a href="<?php echo ADMIN_SITE_PATH; ?>delievery_boy/add_delievery_boy.php" class="sidebar-link"><i class="mdi mdi-playlist-plus"></i><span class="hide-menu"> Add Delievery Boy
                                    </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-ticket-alt"></i>
                            <span class="hide-menu">Coupon </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?php echo ADMIN_SITE_PATH; ?>coupon/view-coupon.php" class="sidebar-link"><i class="mdi mdi-eye"></i><span class="hide-menu"> View Coupon
                                    </span></a></li>
                            <li class="sidebar-item"><a href="<?php echo ADMIN_SITE_PATH; ?>coupon/add-coupon.php" class="sidebar-link"><i class="mdi mdi-playlist-plus"></i><span class="hide-menu"> Add Coupon
                                    </span></a></li>
                        </ul>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-utensils "></i><span class="hide-menu">Dishes </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?php echo ADMIN_SITE_PATH; ?>dish/view-dish.php" class="sidebar-link"><i class="mdi mdi-eye"></i><span class="hide-menu"> View Dish
                                    </span></a></li>
                            <li class="sidebar-item"><a href="<?php echo ADMIN_SITE_PATH; ?>dish/add-dish.php" class="sidebar-link"><i class="mdi mdi-playlist-plus"></i><span class="hide-menu"> Add Dish
                                    </span></a></li>
                        </ul>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo ADMIN_SITE_PATH; ?>gallery/gallery.php" aria-expanded="false"><i class="fa fa-film"></i><span class="hide-menu">Gallery</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo ADMIN_SITE_PATH; ?>banner/banner.php" aria-expanded="false"><i class="far fa-image"></i><span class="hide-menu">Banner</span></a></li>
                <?php }
                ?>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo ADMIN_SITE_PATH; ?>order/orders.php" aria-expanded="false"><i class="far fa-bell"></i><span class="hide-menu">Orders</span></a></li>
                <?php
                if ($_SESSION['STORE'] == '100') {
                ?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo ADMIN_SITE_PATH; ?>subscription/subscriptions.php" aria-expanded="false"><i class="far fa-envelope"></i><span class="hide-menu">Subscription</span></a></li>

                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-file "></i><span class="hide-menu">Pages </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item has-arrow"><a href="<?php echo ADMIN_SITE_PATH; ?>faq/view-faq.php" class="sidebar-link"><i class="mdi mdi-eye"></i><span class="hide-menu"> FAQ
                                    </span></a></li>
                            <li class="sidebar-item has-arrow"><a href="<?php echo ADMIN_SITE_PATH; ?>pages/about.php" class="sidebar-link"><i class="mdi mdi-playlist-plus"></i><span class="hide-menu"> About Us
                                    </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo ADMIN_SITE_PATH; ?>setting/settings.php" aria-expanded="false"><i class="fa fa-cog fa-spin"></i><span class="hide-menu">Settings</span></a></li>



                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo ADMIN_SITE_PATH; ?>admin/view-admin.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Admin</span></a></li>
                <?php } ?>
                <?php
                if ($_SESSION['STORE'] == '100' or $_SESSION['STORE'] == '0') {
                ?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo ADMIN_SITE_PATH; ?>users/users.php" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Users</span></a></li>
                <?php } ?>

                <li class="sidebar-item  d-lg-none d-md-block d-sm-block"><a class="  w-100
                    btn btn-primary
                    d-flex
                    align-items-center
                    text-white sidebar-link waves-effect waves-dark sidebar-link logout" type="button" href="<?php echo ADMIN_SITE_PATH ?>logout.php" aria-expanded="false"><i class="fa fa-power-off"></i><span class="hide-menu">Logout</span></a></li>
            </ul>
        </nav>

    </div>
</aside>