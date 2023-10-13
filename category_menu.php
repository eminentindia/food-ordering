<?php include('includes/header.php');  ?>

<body class="template-collection belle">
    <?php include('includes/navbar.php') ?>
    <!--Body Content-->
    <div id="page-content">
        <!--Collection Banner-->
        <!--End Collection Banner-->
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <div class="productList mt-3">
                        <!--Toolbar-->
                        <div class="toolbar">
                            <div class="filters-toolbar-wrapper">
                                <div class="row">
                                    <div class="col-8 col-md-8 col-lg-8  filters-toolbar__item filters-toolbar__item--count">
                                        <span class="filters-toolbar__product-count"> <a href="index.php"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> Categories
                                            
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4 text-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="grid-products grid--view-items">
                        <?php include('includes/category-slider.php');  ?>
                        </div>
                    </div>

                </div>
                <!--End Main Content-->
            </div>
        </div>

    </div>
  
    <!-- for category checkbox -->
    <form method="get" id="formcatdish">
        <input type="hidden" name="cat_dish" id="cat_dish" value="<?php echo $cat_dish; ?>">
        <!-- for category -->
        <input type="hidden" name="type" id="type" value="<?php echo $type; ?>">
        <!-- for veg/nonveg/both -->
    </form>
    <!-- --------- -->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>



    <!-- ------------ -->
</body>

</html>