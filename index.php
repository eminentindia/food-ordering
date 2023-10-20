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
        


        // while ($row = mysqli_fetch_assoc($res)) {
        //     $BannerImage = $row['image'];
        //     $bannerAlt = $row['alt'];
        //     if ($i == 0) {
        //         $li .= ' <li data-target="#demo" data-slide-to="' . $i . '" class="active"></li>';
        //         $div .= ' <div class="carousel-item active">
        // <img src="' . ADMIN_SITE_PATH . 'media/banner/' . $BannerImage . '" alt="' . $bannerAlt . '" class="w-100">';
        //     } else {
        //         $li .= ' <li data-target="#demo" data-slide-to="' . $i . '"></li>';
        //         $div .= ' <div class="carousel-item">
        // <img src="' . ADMIN_SITE_PATH . 'media/banner/' . $BannerImage . '" alt="' . $bannerAlt . '" class="w-100">';
        //     }
        //     $i++;
        //     $div .= '</div>';
        // }
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
    <style>





    </style>

    <script>
        //tiffin tab
        $(document).ready(function() {
            // Function to switch tabs
            $(".nav-link").click(function() {
                $(".nav-link").removeClass("active");
                $(this).addClass("active");
                var tabId = $(this).attr("href");
                $(".tab-pane").removeClass("show active");
                $(tabId).addClass("show active");
            });
        });
    </script>
    <style>
        .slider {
            height: 400px;
        }

        .mulAttributediv {
            z-index: 99999;
            background-color: #fff;
            box-shadow: 0 5px 40px 0 rgb(40 44 63 / 33%);
            position: fixed;
            left: 50%;
            top: -100%;
            /* Start off-screen at the bottom */
            transform: translate(-50%, -50%);
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid lightgray;
            border-radius: 10px;
            opacity: 0;
            display: none;
            transition: all .3s ease-in-out;
            width: 35%;
            /* Add smooth transition for opacity and top property */
        }

        .mulAttributediv.active {
            top: -50%;
            opacity: 1;
            display: block;
        }



        .popscroller {
            overflow: auto;
            display: block;
            /* flex-wrap: wrap;
            justify-content: start;
            gap: 20px; */
        }

        .multiplelabel .attribute-label {
            width: 90%;
        }

        .multiplelabel input[type="radio"]:checked+.attribute-label,
        .multiplelabel input[type="checkbox"]:checked+.attribute-label {
            width: 100%;
            transition: .7s width ease-in;
        }

        .closeadditionpop {
            position: fixed;
            cursor: pointer;
            right: 10px;
            top: 10px;
            border: 1px solid lightgrey;
            width: 30px;
            height: 30px;
            text-align: center;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .closeadditionpop:hover {
            background: lightgrey;
        }

        .mulAttributediv label {
            display: block !important;
        }



        .mulAttributediv-content .multiplelabel {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            /* border: 1px dashed #d1d1d1; */
            padding: 2px 10px;
        }

        @media only screen and (max-width: 900px) {
            .slider {
                height: 20vh;
            }

            .mulAttributediv {
                width: 95%;

            }

            .popscroller {
                overflow: auto;
                display: block;
                height: 310px;
                margin-bottom: 50px;
            }

            #tiffin .image-button2 img {
                width: 50px;
                height: 50px;
            }

            #tiffin .image-button2 {
                width: 50px;
                height: 50px;
            }

            .closeadditionpop {
                left: 10px;
                top: 20px;
            }
        }
    </style>
    <script>
        function openpopup(id) {
            const $element = $('#' + id);
            if ($element.hasClass('active')) {
                // Element is already visible, just hide it with animation
                $element.removeClass('active');
                // Remove the 'active' class after the animation is complete
                setTimeout(function() {
                    $element.css({
                        'top': '-100%', // Slide down to hide
                        'opacity': '0',
                    });
                    document.body.classList.remove('overlay-active');
                }, 300); // Adjust the time to match your CSS transition time
            } else {
                // Apply the slide-up animation and show the element
                $element.css({
                    'top': '50%', // Slide up to center
                    'opacity': '1',
                    'display': 'block',
                });
                // Add a class to the body to create an overlay effect
                document.body.classList.add('overlay-active');
                // Add the 'active' class to indicate that the element is visible
                setTimeout(function() {
                    $element.addClass('active');
                }, 0); // Use a very short delay (0 milliseconds) for the class addition
            }
        }
    </script>


    <style>
        .fixed-div {
            position: fixed;
            user-select: none;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #5d8ed5;
            color: #fff;
            text-align: center;
            padding: 10px;
            transition: bottom 0.3s ease;
            z-index: 99;
            border-radius: 30px;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, .3), 0 2px 1px 0 rgba(93, 141, 213, .2);
            font-weight: 600;
            font-size: .93rem;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .menu-items.active {
            display: flex;
            opacity: 1;
            transition: .4s all ease-in-out;
        }

        .menu-items {
            display: none;
            z-index: 999 !important;
            opacity: 0;
            transition: opacity 0.3s ease;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            position: fixed;
            bottom: 8dvh;
            /* Adjust this value to position the menu */
            left: 50%;
            transform: translateX(-50%);
            width: max-content;
            margin-bottom: 30px;
            border-radius: 20px;

            /* flex-direction: column; */
            justify-content: center;
            gap: 20px;
            align-items: center;
        }

        .menu-items ul {
            display: flex
        }

        .bottommenu img {
            width: 25px;
        }

        @media only screen and (max-width: 700px) {
            .fixed-div {
                font-size: .63rem;
                bottom: 40px;
            }

            .fixed-div img {
                width: 20px;
            }

            #menuItems {
                bottom: 65px;
                padding: 0;
                border-radius: 20px !important;
                margin-bottom: 40px;
                bottom: 65px;
                border-radius: 0;
                margin-bottom: 30px;
            }

            .max-content {
                width: 100%;
            }



            #menuItems .tiffinmaindiv {
                flex-direction: column !important;
                border: 0 !important;
                gap: 7px;
            }

            #menuItems .tiffinmaindiv .nav-link {
                justify-content: left;
                font-size: .7rem;
            }

            #menuItems .tiffinmaindiv .nav-link {
                box-shadow: 0 3px 10px 0px rgb(0 0 0 / 8%);
            }

            .stickytiffin {
                display: none;
            }
        }
    </style>
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
                        <img class="img-icon-tiffin" src="<?php echo SITE_PATH ?>images/beverages-icon.png" alt=""> <span>Beverages/ Noodles</span>
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
    <script>
        const fixedDiv = document.getElementById('fixedDiv');
        const menuItems = document.getElementById('menuItems');
        let isMenuVisible = false;
        let isScrolling = false;

        fixedDiv.addEventListener('click', toggleMenu);

        // Check for mobile devices and use appropriate event
        const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        // const scrollEvent = isMobile ? 'touchmove' : 'scroll';
        const scrollEvent = isMobile ? 'scroll' : 'scroll';
        window.addEventListener(scrollEvent, handleScroll);

        function toggleMenu() {
            if (isMenuVisible) {
                menuItems.style.opacity = '0';
                menuItems.style.display = 'none';
                $('#fixedDiv').html('<img src="images/browse_dish.png" width="30px" alt="BROWSE MENU"><span class="ml-2 ">BROWSE MENU</span>')
            } else {
                menuItems.style.display = 'block';
                menuItems.style.opacity = '1';
                $('#fixedDiv').html('<img src="images/closee.png" width="30px" style=" filter: invert(100%);" alt="BROWSE MENU">')
            }
            isMenuVisible = !isMenuVisible;
        }

        function handleScroll() {
            if (!isScrolling) {
                window.requestAnimationFrame(() => {
                    // Use both window.scrollY and window.pageYOffset
                    const scrollY = window.scrollY || window.pageYOffset;
                    const windowHeight = window.innerHeight;

                    // Adjust the threshold as needed
                    const scrollThreshold = windowHeight - 50;

                    if (scrollY >= scrollThreshold) {
                        fixedDiv.style.display = 'block';
                    } else {
                        fixedDiv.style.display = 'none';
                        menuItems.style.display = 'none';
                        isMenuVisible = false;
                    }

                    isScrolling = false;
                });

                isScrolling = true;
            }
        }
    </script>
    <script>
        document.querySelectorAll('.nav-link').forEach(linkItem => {
            linkItem.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default link behavior
                var breakpoint = 768; // Set your desired breakpoint here
                var scrollToPosition = 0; // Default position for larger screens

                if (window.innerWidth < breakpoint) {
                    scrollToPosition = 100; // Position to scroll for mobile
                } else {
                    scrollToPosition = 900; // Position to scroll for larger screens
                }

                window.scrollTo({
                    top: scrollToPosition,
                    behavior: 'smooth' // Smooth scrolling
                });
            });
        });

        document.querySelectorAll('.navitem2').forEach(linkItem => {

            // nav-link text-uppercase active

            linkItem.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default link behavior
                var breakpoint = 768; // Set your desired breakpoint here
                var scrollToPosition = 0; // Default position for larger screens

                if (window.innerWidth < breakpoint) {
                    scrollToPosition = 600; // Position to scroll for mobile
                } else {
                    scrollToPosition = 900; // Position to scroll for larger screens
                }

                window.scrollTo({
                    top: scrollToPosition,
                    behavior: 'smooth' // Smooth scrolling
                });
            });
        });
    </script>



</body>

</html>