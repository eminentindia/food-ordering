<?php include('includes/header.php'); ?>

<body class="template-index  home2-default ">
    <?php include('includes/navbar.php') ?>
    <div id="page-content ">
        <?php
        $sel = "select * from banner";
        $res = mysqli_query($conn, $sel);
        $li = '';
        $i = 0;
        $div = '';
        // 
        while ($row = mysqli_fetch_assoc($res)) {
            $BannerImage = $row['image'];
            $bannerAlt = $row['alt'];
            $banner_link = $row['banner_link'];
            if ($i == 0) {
                $li .= ' <li data-target="#demo" data-slide-to="' . $i . '" class="active"></li>';
                $div .= '<div class="carousel-item active"> <a href="' . SITE_PATH . $banner_link . '">
                <div class="w-100 slider" style="background-image: url(' . ADMIN_SITE_PATH . 'media/banner/' . $BannerImage . ');filter: blur(8px);background-position: center;background-repeat: no-repeat;background-size: cover;"></div>
                <img src="' . ADMIN_SITE_PATH . 'media/banner/' . $BannerImage . '" class="slider" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
                </a></div>';
            } else {
                $li .= ' <li data-target="#demo" data-slide-to="' . $i . '"></li>';
                $div .= ' <div class="carousel-item">
                <a href="' . SITE_PATH . $banner_link . '">
                <div class="w-100 slider" style="background-image: url(' . ADMIN_SITE_PATH . 'media/banner/' . $BannerImage . ');filter: blur(8px);background-position: center;background-repeat: no-repeat;background-size: cover;"></div>
                <img src="' . ADMIN_SITE_PATH . 'media/banner/' . $BannerImage . '" class="slider" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
                </a></div>';
            }
            $i++;
        }
        ?>
        <div id="demo" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
            <ul class="carousel-indicators carousel-fade">
                <?= $li ?>
            </ul>
            <div class="carousel-inner">
                <?= $div ?>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <?php include('includes/category-slider.php');  ?>
        <?php include('includes/festival-popup.php');  ?>
        <?php include('includes/tiffin.php') ?>
        <?php include('includes/products.php');  ?>
    </div>
    <!--End Body Content-->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>
    <link rel="stylesheet" href="<?php echo SITE_PATH ?>css/index.css">
    <div class="fixed-div" id="fixedDiv" style="display: none;">
        <img src="images/browse_dish.png" width="30px" alt="BROWSE MENU">
        <span class="ml-2 ">BROWSE MENU</span>
    </div>
    <div class="menu-items" id="menuItems">
        <ul class="nav nav-tabs tiffinmaindiv mb-0" id="tiffinmaindiv" style="overflow: hidden; border-bottom:0">
            <li class="nav-item navitem2">
                <div class="max-content bottommenu"> <a class="nav-link text-uppercase" data-toggle="tab" href="#breakfast">
                        <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/breakfast-icon.png" alt=""> <span>Breakfast</span>
                    </a>
                </div>
            </li>
            <li class="nav-item navitem2">
                <div class="max-content bottommenu"> <a class="nav-link text-uppercase active" data-toggle="tab" href="#lunch">
                        <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/lunch-icon.png" alt=""> <span>Lunch/Dinner</span>
                    </a>
                </div>
            </li>
            <li class="nav-item navitem2">
                <div class="max-content bottommenu"> <a class="nav-link text-uppercase" data-toggle="tab" href="#noodles">
                        <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/dinner-icon.png" alt=""> <span>Noodles</span>
                    </a>
                </div>
            </li>
            <li class="nav-item navitem2">
                <div class="max-content bottommenu"> <a class="nav-link text-uppercase" data-toggle="tab" href="#beverages">
                        <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/beverages-icon.png" alt=""> <span>Beverages</span>
                    </a>
                </div>
            </li>
            <li class="nav-item navitem2">
                <div class="max-content bottommenu"> <a class="nav-link text-uppercase" data-toggle="tab" href="#monthlyplan">
                        <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/plan-icon.png" alt=""> <span>MONTHLY PLAN</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <script src="<?php echo SITE_PATH ?>js/index.js"></script>
</body>

</html>