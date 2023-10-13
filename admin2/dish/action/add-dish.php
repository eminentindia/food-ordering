<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');

$conn = _connectodb();
setTimeZone();
// echo '<pre>';
// print_r($_POST);
// print_r($_FILES);


if (isset($_POST['dish']) && isset($_POST['category_id']) &&  isset($_FILES['myimg'])) {
	$added_on = date("Y-m-d");
	$category_id = safe_value($conn, $_POST['category_id']);
	$type = safe_value($conn, $_POST['type']);
	$dish = safe_value($conn, $_POST['dish']);
	$short_description = safe_value($conn, $_POST['short_description']);
	$dish_detail = safe_value($conn, $_POST['dish_detail']);
	$meta_title = safe_value($conn, $_POST['meta_title']);
	$slug = safe_value($conn, $_POST['slug']);
	$is_available = safe_value($conn, $_POST['is_available']);
	$is_attribute_product = safe_value($conn, $_POST['is_attribute_product']);
	$meta_description = safe_value($conn, $_POST['meta_description']);
	$meta_keywords = safe_value($conn, $_POST['meta_keywords']);

	$selectedMeals = $_POST['meal'];
	if ($selectedMeals != '') {
		$mealsString = implode(',', $selectedMeals);
	} else {
		$mealsString = '';
	}

	if (isset($_POST['mrp'])) {
		$mrp = safe_value($conn, $_POST['mrp']);
	} else {
		$mrp = NULL;
	}


	if (isset($_POST['selling_price'])) {
		$selling_price = safe_value($conn, $_POST['selling_price']);
	} else {
		$selling_price = NULL;
	}

	if (isset($_POST['main_sku'])) {
		$main_sku = safe_value($conn, $_POST['main_sku']);
	} else {
		$main_sku = NULL;
	}
	$is_detailed_dish = $_POST['is_detailed_dish'];
	$price_tagline = $_POST['price_tagline'];
	// define Variable 
	$image = '';
	if (isset($_FILES['myimg']['name']) && is_string($_FILES['myimg']['name']) && $_FILES['myimg']['name'] != '') {
		$extn = explode('.', $_FILES["myimg"]["name"]);
		$rand = date('Y') . '-' . rand(1111, 9999);
		$str = str_replace(' ', '-', strtolower($dish));
		$image = $str . $rand . "." . $extn[1];
		$path = "../../media/dish/" . $image;
		move_uploaded_file($_FILES["myimg"]["tmp_name"], $path);
	}
	$sql = "INSERT INTO dish (
		category_id,
		is_detailed_dish,
		price_tagline,
		meal,
		type,
		dish,
		short_description,
		dish_detail,
		slug,
		image,
		meta_title,
		meta_description,
		meta_keywords,
		status,
		is_available,
		mrp,
		selling_price,
		main_sku,
		is_attribute_product,
		added_on
	)
	VALUES (
		'$category_id',
		'$is_detailed_dish',
		'$price_tagline',
		'$mealsString',
		'$type',
		'$dish',
		'$short_description',
		'$dish_detail',
		'$slug',
		'$image',
		'$meta_title',
		'$meta_description',
		'$meta_keywords',
		'1',
		'$is_available',
		'$mrp',
		'$selling_price',
		'$main_sku',
		'$is_attribute_product',
		'$added_on'
	)";
	// echo $sql;
	$result	= mysqli_query($conn, $sql);

	// die();

	//insert attribute
	$mydish_id = mysqli_insert_id($conn);
	$attributeArr = $_POST['attribute'];
	$priceArr = $_POST['price'];
	$skuArr = $_POST['sku']; // Assuming you have an array of SKUs

	foreach ($attributeArr as $key => $val) {
		$attribute = $val;
		$price = $priceArr[$key];
		$sku = $skuArr[$key]; // Get the corresponding SKU for this variant
		mysqli_query($conn, "INSERT INTO dish_details(dish_id, attribute, price, status, sku) VALUES ('$mydish_id', '$attribute', '$price', 1, '$sku')");
	}
	if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
		$file_names = '';
		$total = count($_FILES['file']['name']);
		for ($i = 0; $i < $total; $i++) {
			$filename = $_FILES['file']['name'][$i];
			$extension = pathinfo($filename, PATHINFO_EXTENSION);
			$valid_extensions = array("png", "jpg", "jpeg");
			if (in_array($extension, $valid_extensions)) {
				$new_name = rand() . "." . $extension;
				$path = "../../media/dish/" . $new_name;
				move_uploaded_file($_FILES['file']['tmp_name'][$i], $path);
				// $file_names .= $new_name . " , ";
				$sql = "insert into  images (dish_id,image) values('$mydish_id','$new_name') ";
				if (mysqli_query($conn, $sql)) {
					echo 'true';
				} else {
					echo 'false';
				}
			} else {
				echo 'false';
			}
		}
	}
	$_SESSION["dishadd"] = 'added';
	echo '<script>window.location.href = "../view-dish.php";</script>';
} else {
	echo "All Respective Fields Are Required !!";
}
