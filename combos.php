<?php include('includes/header.php');  ?>
<style>
    .radio-inputs {
        position: relative;
        display: flex;
        border-radius: 0.5rem;
        background-color: #EEE;
        box-sizing: border-box;
        box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
        padding: 0;
        font-size: 10px;
    }

    .radio-inputs .radio {
        font-size: 10px !important;
        margin-bottom: 0 !important;
    }

    li.radio-box {
        width: 100%;
    }

    .radio-inputs .radio {
        flex: 1 1 auto;
        text-align: center;
    }

    .radio-inputs .radio input {
        display: none;
    }

    .radio-inputs .radio .name {
        display: flex;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        border: none;
        padding: .5rem 0;
        color: rgba(51, 65, 85, 1);
        transition: all .15s ease-in-out;
    }

    .radio-inputs .radio input:checked+.name {
        background-color: #769339;
        font-weight: 600;
        color: white;
    }

    .radio-bg {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.3);
        opacity: 0;
        transition: opacity 0.3s;
        pointer-events: none;
    }

    @keyframes bgScale {
        0% {
            transform: scale(1);
            opacity: 0.5;
        }

        100% {
            transform: scale(1.2);
            opacity: 0;
        }
    }

    /* //preloader ajax */

    .preloader {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
    }

    .loader {
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .filterbar {
        background: #f7f7f745;
        padding: 20px 10px;
        box-shadow: 0px 0px 10px #0000001a;
    }
</style>

<body class="template-collection belle">
    <?php include('includes/navbar.php') ?>
    <!--Body Content-->
    <div id="page-content">

        <div class="collection-header">
            <div class="collection-hero">
                <div class="collection-hero__image"><img class="blur-up lazyload" data-src="images/dish-back.jpg" src="images/dish-back.jpg" alt="Combos" title="Combos" /></div>
                <div class="collection-hero__title-wrapper">
                    <h1 class="collection-hero__title page-width">Popular Combos</h1>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-->
                <div class="col-12 col-sm-12 col-md-2 col-lg-2 sidebar filterbar">
                    <div id="mySidebar">
                        <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                        <div class="sidebar_tags" style="box-shadow: none;top: 100px;">
                            <div class="sidebar_widget filterBox filter-widget">
                                <div class="widget-title">
                                    <h2>Categories</h2>
                                </div>
                                <ul>
                                    <li id="clearLink" style="display: none;">
                                        <label for="clear" class="ml-2" style="padding: 0;position: absolute;right: 20px;top: auto;cursor: pointer;color: gray;" onclick="clearCheckboxes()" title="Reset"><i class="fa fa-refresh" aria-hidden="true"></i>
                                        </label>
                                    </li>
                                    <?php
                                    $query = "select * from category WHERE status=1";
                                    $sel = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($sel)) {
                                        $is_checked = ""; // You can set this based on your logic
                                    ?>
                                        <li>
                                            <input type="checkbox" <?php echo $is_checked; ?> onclick="set_category(<?php echo $row['ID']; ?>); toggleClearLink();" name="cat_arr[]" value="<?php echo $row['ID']; ?>" id="<?php echo $row['ID']; ?>">
                                            <label for="<?php echo $row['ID']; ?>"><span><span></span></span><?php echo $row['category']; ?></label>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                            <div class="sidebar_widget filterBox filter-widget size-swacthes">
                                <div class="widget-title">
                                    <h2>Type</h2>
                                </div>
                                <div class="filter-color swacth-list">
                                    <ul class="d-flex" style="gap: 5px;flex-wrap:wrap">
                                        <?php
                                        $type = 'both'; // Set the default selected type here
                                        $arrType = array("veg", "non-veg", "both");
                                        foreach ($arrType as $list) {
                                            $type_selected = ($list == $type) ? 'checked' : '';
                                        ?>
                                            <li class="radio-box">
                                                <div class="radio-inputs">
                                                    <label class="radio">
                                                        <input id="<?php echo $list ?>" type="radio" <?php echo $type_selected; ?> name="type" value="<?php echo $list ?>" onclick="food_type('<?php echo $list ?>')">
                                                        <span class="name"><?php echo strtoupper($list) ?></span>
                                                    </label>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 main-col">
                    <div class="productList">
                        <!--Toolbar-->
                        <div class="toolbar">
                            <div class="filters-toolbar-wrapper">
                                <div class="row justify-content-between">
                                    <div class="col-4 col-md-4 col-lg-4  filters-toolbar__item filters-toolbar__item--count">
                                        <span class="filters-toolbar__product-count"> <a href="<?= SITE_PATH ?>"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> Combos
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-8 text-right justify-content-end d-flex " style="gap: 5px;">
                                        <div class="mobfilterdiv"><i class="fa fa-filter" aria-hidden="true"></i>
                                        </div>
                                        <select id="priceSorting" onchange="sortDishes()">
                                            <option value="asc">Price: Low to High</option>
                                            <option value="desc">Price: High to Low</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="grid-products grid--view-items">
                            <div class="row" id="dish-container">
                                <div id="preloader" class="preloader">
                                    <div class="loader"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>
    <script>
        var currentPage = 1;
        var loading = false;
        var selectedType = 'both'; // Store the selected food type
        var selectedCategory = '';
        var sorting = '';
        var scrollValue = 220; // Default scroll value

        // // Adjust scroll value based on screen size
        // if ($(window).width() < 768) {
        //     scrollValue = 50; // Set a smaller value for smaller screens
        // }

        function loadDishes(page) {
            if (loading) return;
            loading = true;
            $.ajax({
                url: SITE_PATH + 'action/load_combos.php',
                type: 'POST',
                data: {
                    page: page,
                    type: selectedType,
                    category: selectedCategory,
                    sorting: sorting,
                },
                beforeSend: function() {
                    // Show preloader only when a new dish is being loaded
                    if (page > currentPage) {
                        showPreloader();
                    }
                },
                success: function(response) {
                    hidePreloader();
                    if (response !== 'end') {
                        $('#dish-container').append(response);
                        currentPage++;
                        loading = false;
                        $('#dish-container').scrollTop(0);
                    } else {
                        $('#load-more').hide();
                    }
                },
                error: function(error) {
                    console.error('Error loading dishes:', error);
                }
            });
        }

        function showPreloader() {
            $('#preloader').show();
        }

        function hidePreloader() {
            $('#preloader').hide();
        }

        function food_type(type) {
            $('html, body').animate({
                scrollTop: scrollValue
            }, 'fast');
            selectedType = type; // Update the selected food type
            currentPage = 1; // Reset currentPage when changing food type
            $('#dish-container').empty(); // Clear existing dishes
            loadDishes(currentPage); // Load dishes for the new food type
        }




        function sortDishes() {
            var sortingSelect = document.getElementById("priceSorting");
            var sortingvalue = sortingSelect.value;

            $('html, body').animate({
                scrollTop: scrollValue
            }, 'fast');
            sorting = sortingvalue;
            currentPage = 1;
            $('#dish-container').empty();
            loadDishes(currentPage);
        }


        function toggleClearLink() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var clearLink = document.getElementById("clearLink");

            var isAnyCheckboxChecked = Array.from(checkboxes).some(function(checkbox) {
                return checkbox.checked;
            });

            clearLink.style.display = isAnyCheckboxChecked ? "block" : "none";
        }

        function clearCheckboxes() {
            $('html, body').animate({
                scrollTop: scrollValue
            }, 'fast');
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });

            toggleClearLink(); // Hide the "Clear" link after clearing checkboxes

            selectedCategory = ''; // Convert the array to a comma-separated string
            currentPage = 1; // Reset currentPage when changing categories
            $('#dish-container').empty(); // Clear existing dishes
            loadDishes(currentPage); // Load dishes for the new categories
            toggleClearLink(); // Hide the "Clear" link after clearing checkboxes
        }

        // Initial loading of dishes
        loadDishes(currentPage);


        function set_category() {
            $('html, body').animate({
                scrollTop: scrollValue
            }, 'fast');
            var checkboxes = document.getElementsByName("cat_arr[]");
            // Initialize an array to store selected category IDs
            var selectedCategories = [];
            // Loop through all checkboxes to find the selected ones
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    selectedCategories.push(checkboxes[i].value);
                }
            }
            selectedCategory = selectedCategories.join(','); // Convert the array to a comma-separated string
            currentPage = 1; // Reset currentPage when changing categories
            $('#dish-container').empty(); // Clear existing dishes
            loadDishes(currentPage); // Load dishes for the new categories
        }
        var lastScrollPosition = 0;
        $(window).scroll(function() {
            var currentScrollPosition = $(window).scrollTop();

            if (currentScrollPosition > lastScrollPosition) {
                if (currentScrollPosition + $(window).height() >= $('#dish-container').height() - 600) {
                    loadDishes(currentPage); // Load more dishes for the selected type
                }
            }
            lastScrollPosition = currentScrollPosition;
        });

        var lastTouchPosition = 0;
        var lastScrollPosition = 0;

        $(window).on('touchmove', function(e) {
            var currentTouchPosition = e.originalEvent.touches[0].pageY;
            var currentScrollPosition = $(window).scrollTop();

            if (currentTouchPosition > lastTouchPosition) {
                loadDishes(currentPage);
            }

            lastTouchPosition = currentTouchPosition;
            lastScrollPosition = currentScrollPosition;
        });


        var sidebar = document.getElementById("mySidebar");
        var windowHeight = window.innerHeight;

        function updateSidebarPosition() {
            var scrollPosition = window.pageYOffset + windowHeight;

            if (window.pageYOffset > 400) {
                sidebar.style.position = "fixed";
                sidebar.style.top = "100px";
                sidebar.style.width = "14%";
                sidebar.style.zIndex = "1";
            } else if (scrollPosition > 500) {
                sidebar.style.position = "static";
                sidebar.style.width = "auto";
            } else {
                sidebar.style.position = "fixed";
                sidebar.style.top = "100px";
                sidebar.style.width = "14%";
                sidebar.style.zIndex = "9";
            }
        }

        window.addEventListener("scroll", updateSidebarPosition);
    </script>
    <!-- ------------ -->
</body>

</html>