<?php
session_start();
include('../admin/controller/common-controller.php');
include('../function.inc.php');


$conn = _connectodb();
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../admin/controller/constant.inc.php');
$perPage = 6; // Display 6 dishes at a time
$start = ($_POST['page'] - 1) * $perPage;
$type = '';
$f = '';
$category = '';
$sorting = '';

// Check if 'type' is set in POST data
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    if ($type == 'veg') {
        $f = " AND dish.type='veg'";
    } else if ($type == 'non-veg') {
        $f = " AND dish.type='non-veg'";
    }
}

// Check if 'category' is set in POST data
$category = $_POST['category'];
if (!empty($category)) {
    $categories = explode(",", $category);
    $categoryConditions = implode("', '", $categories);
    $f .= " AND dish.category_id IN ('$categoryConditions')";
}

$sorting = $_POST['sorting'];
$sortingClause = 'ORDER BY dish_details.price ASC , dish.selling_price ASC';
if (!empty($sorting)) {
    $sortingClause = " ORDER BY dish_details.price $sorting , dish.selling_price  $sorting";
}

// Construct the SQL query with table aliases
$query = "
    SELECT dish.*, dish_details.*
    FROM dish
    LEFT JOIN (
        SELECT dish_id, MAX(price) AS max_price
        FROM dish_details
        GROUP BY dish_id
    ) AS aggregated_details ON dish.ID = aggregated_details.dish_id
    LEFT JOIN dish_details ON dish.ID = dish_details.dish_id AND dish_details.price = aggregated_details.max_price
    WHERE dish.status = '1' $f AND dish.is_combo='1' GROUP BY dish.dish
    $sortingClause 
    LIMIT $start, $perPage";

$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_assoc($query_run)) {
?>
        <div class="col-6 col-sm-3 col-md-3 col-lg-3 item">
            <div class="product-image">
                <a <?php if ($website_close == 0) { ?> href="<?php echo SITE_PATH ?>dish/<?php echo $row['slug']; ?>" <?php } else { ?> onclick="websiteclose()" <?php } ?> class="grid-view-item__link">
                    <img class="primary blur-up lazyload" data-src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" alt="image" title="<?php echo $row['dish']; ?>">
                    <img class="hover blur-up lazyload" data-src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" src="<?php echo SITE_DISH_IMAGE . $row['image']; ?>" alt="image" title="<?php echo $row['dish']; ?>">

                    <?php if ($row['is_available'] == '0') {
                    ?>
                        <div class="outfstock">
                            OUT OF STOCK
                        </div>
                    <?php }
                    if ($row['is_popular'] == '1') {
                    ?>
                        <div class="light2">
                            POPULAR
                        </div>
                    <?php }
                    ?>
                </a>
                <div class="variants add">
                    <a <?php if ($website_close == 0) { ?> href="<?php echo SITE_PATH ?>dish/<?php echo $row['slug']; ?>" <?php } else { ?> onclick="websiteclose()" <?php } ?>>
                        <button class="btn btn-addto-cart" type="button">Details</button>
                    </a>
                </div>
            </div>
            <div class="product-details">
                <div class="product-name">
                    <a <?php if ($website_close == 0) { ?> href="<?php echo SITE_PATH ?>dish/<?php echo $row['slug']; ?>" <?php } else { ?> onclick="websiteclose()" <?php } ?>><?php echo $row['dish'] ?></a>
                    <span style="float: right;">
                        <?php if ($row['type'] == 'veg') {
                            echo '  <img class="typeImage" src="' . SITE_PATH . 'images/veg.png" alt="veg">';
                        } else {
                            echo '  <img class="typeImage" src="' . SITE_PATH . 'images/non-veg.png" alt="non-veg">';
                        } ?>
                    </span>
                </div>
                <div class="product-price">
                    <?php
                    if ($row['is_attribute_product'] == 0) {
                        $dish_attr_sql = mysqli_query($conn, "SELECT MIN(`selling_price`) AS `lowest` FROM `dish` where ID='" . $row['ID'] . "'");
                        $dish_attr_row = mysqli_fetch_assoc($dish_attr_sql);
                        $lowestprice = $dish_attr_row['lowest'];
                    } else {
                        $dish_attr_sql = mysqli_query($conn, "SELECT MIN(`price`) AS `lowest` FROM `dish_details` where dish_id='" . $row['ID'] . "'");
                        $dish_attr_row = mysqli_fetch_assoc($dish_attr_sql);
                        $lowestprice = $dish_attr_row['lowest'];
                    }
                    ?>
                    <span class="price">Starting at <i class="fa fa-rupee"></i> <?php echo $lowestprice; ?></span>
                </div>
            </div>
        </div>

<?php }
} else {
    
    die();
}
