<?php

function getdish($conn)
{
	$response = array();
	$sql = "Select * from  dish ORDER BY ID desc";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			extract($row);
			array_push($response, $row);
		}
	}
	return json_encode($response);
}

function cat_name_by_id($id)
{
	global $conn;
	$res = mysqli_query($conn, "select category from category where ID='$id'");
	while ($row = mysqli_fetch_assoc($res)) {
		$name = $row;
	}
	return $name;
}

function getsingledish($conn, $ID)
{
	$response = array();
	$sql = "Select * from  dish WHERE ID='$ID'";
	// echo $sql;
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			extract($row);
			array_push($response, $row);
		}
	}
	return json_encode($response);
}
function getSingleSlugDish($conn, $slug)
{
    $response = array();
    $sql = "SELECT * FROM dish WHERE slug='$slug'";
    $result_dish = mysqli_query($conn, $sql);

    while ($row_dish = mysqli_fetch_assoc($result_dish)) {
        $dish_id = $row_dish['ID'];
        $sql_details = "SELECT * FROM dish_details WHERE dish_id = '$dish_id'";
        $result_details = mysqli_query($conn, $sql_details);

        $details_arr = array();

        while ($row_details = mysqli_fetch_assoc($result_details)) {
            $details_arr[] = $row_details;
        }

        $row_dish['details'] = $details_arr;
        $response[] = $row_dish; // Push the modified dish record to the response array
    }

    return json_encode($response);
}


function getcategoryedish($conn, $ID)
{
	$response = array();
	$sql = "Select * from  dish WHERE slug='$ID'";
	//  echo $sql;
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			extract($row);
			array_push($response, $row);
		}
	}
	return json_encode($response);
}


function get_dish($conn, $type = '', $limit = '5', $cat_id = '', $ID = '', $search_str = '', $subcategory = '', $brand = '')
{
	$sql = "select * from dish where dish.status='1'";

	if ($type == 'popular') {
		$sql .= "and type='popular' ORDER BY dish.ID DESC";
	}
	if ($type == 'trending') {
		$sql .= "and type='trending' ORDER BY dish.ID DESC";
	}

	if ($type == 'featured') {
		$sql .= "and type='featured' ORDER BY dish.ID DESC";
	}

	if ($limit != '') {
		$sql .= " LIMIT $limit";
	}

	if ($ID != '') {
		$sql .= " and dish.ID= '$ID'";
	}
	if ($search_str != '') {
		$sql .= " and (dish.name like '%$search_str%' or dish.description like '%$search_str%' or dish.meta_keywords like '%$search_str%' or dish.type like '%$search_str%') ";
	}
	if ($cat_id != '') {
		$sql .= " and dish.category_id='$cat_id' ";
	}
	if ($subcategory != '') {
		$sql .= " and dish.subcategory_id='$subcategory'";
	}
	if ($brand != '') {
		$sql .= " and dish.brand='$brand'";
	}
	//  echo $sql;

	$res = mysqli_query($conn, $sql);
	$data = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$data[] = $row;
	}
	return $data;
}
