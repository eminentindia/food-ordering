<?php 


$servername = "localhost";$dbusername ="root";$password = "";
$dbname = "food_ordering";
error_reporting(E_ALL);
function _connectodb()
{
	global $dbname;
	global $servername;
	global $dbusername;
	global $password;
	$connect = new mysqli($servername,$dbusername,$password,$dbname);
	if($connect->connect_error) 
	{
		print_r("Connection Error: " . $connect->connect_error);
		return false;
	}
	else
	{
		return $connect;
	}
}
$conn=_connectodb();



function setTimeZone()
{
	date_default_timezone_set('Asia/Kolkata');
}

function safe_value($conn,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($conn,$str);
	}
}

function getcoupon($conn)
{
	$response = array();
	$sql = "Select * from  coupon";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}

function getactivecoupon($conn)
{
	$response = array();
	$sql = "Select * from  coupon where status='1'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}

function getsinglecoupon($conn,$ID)
{
	$response = array();
	$sql = "Select * from  coupon WHERE ID='$ID'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}

function getusers($conn)
{
	$response = array();
	$sql = "Select * from  users";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}

function getsubscription($conn)
{
	$response = array();
	$sql = "Select * from  subscription ORDER BY ID desc";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}


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


function getcategory($conn)
{
	$response = array();
	$sql = "Select * from  category ORDER BY RAND()";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}

function getactivecategory($conn)
{
	$response = array();
	$sql = "Select * from  category where status='1' ORDER BY RAND()";
	// echo $sql;
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}

function getsinglecategory($conn,$ID)
{
	$response = array();
	$sql = "Select * from  category WHERE ID='$ID'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}

function getsetting($conn)
{
	$response = array();
	$sql = "Select * from  setting";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}



function developer()
{
    if ($_SESSION['admin_user_type'] == '0') {
        return true;
    } else {
        return false;
    }
}
function admin()
{
    if ($_SESSION['admin_user_type'] == '1') {
        return true;
    } else {
        return false;
    }
}
function user()
{
    if ($_SESSION['admin_user_type'] == '2') {
        return true;
    } else {
        return false;
    }
}
function get_profile($conn)
{
    $response = array();
    $sql = 'select *  from admin_info INNER JOIN admin ON admin_info.emp_id = admin.admin_empid WHERE emp_id="' . $_SESSION['admin_empid'] . '"';
    // echo  $sql;
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            extract($row);
            array_push($response, $row);
        }
    }
    return json_encode($response);
}
function generateAvatar($name)
{
    $first_name = explode(' ', $name)[0];
    $last_name = explode(' ', $name)[count(explode(' ', $name)) - 1];
    $initials = strtoupper(substr($first_name, 0, 1) . substr($first_name, 1, 1) . substr($last_name, 0, 1));
    $image = 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&size=200&background=random&color=fff&font-size=0.4&length=2&bold=true&rounded=true&uppercase=true&initials=' . $initials;
    return $image;
}
function generateAvatarOne($name)
{
    $nameParts = explode(' ', $name);
    $firstName = $nameParts[0];
    $firstLetter = substr($firstName, 0, 1);
    $image = 'https://ui-avatars.com/api/?name=' . urlencode($firstLetter) . '&size=200&background=random&color=fff&font-size=0.4&length=1&bold=true&rounded=true&uppercase=true&initials=' . $firstLetter;
    return $image;
}
function get_emp_des($conn)
{
    $data = '';
    $nowmonth = date('m');
    $nowday = date('d');
    $sql = "SELECT * FROM admin RIGHT JOIN admin_info ON admin_info.emp_id = admin.admin_empid WHERE admin_empid='" . $_SESSION['admin_empid'] . "' ";
    $res = $conn->query($sql);
    $row = mysqli_fetch_assoc($res);
    return $row['emp_des'];
}
// function getsetting($conn)
// {
//     $response = array();
//     $sql = "Select * from  setting";
//     $result = mysqli_query($conn, $sql);
//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             extract($row);
//             array_push($response, $row);
//         }
//     }
//     return json_encode($response);
// }


function redirect($url)
{
    header("Location: " . $url);
    exit; // Terminate the script to prevent further execution
}
function isUnderMaintenance($conn)
{
    $sql = "SELECT is_under_maintenance FROM site_maintance ";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['is_under_maintenance'] == 1;
    }
    return false;
}

function checkImageExistsInDatabase($conn, $table_name, $column)
{
    $logoExistsQuery = "SELECT COUNT(*) as count FROM $table_name WHERE $column IS NOT NULL";
    $result = $conn->query($logoExistsQuery);
    $row = $result->fetch_assoc();
    $logoCount = $row['count'];
    return $logoCount > 0;
}
function getImageNameInDatabase($conn, $table_name, $column)
{
    $logoExistsQuery = "SELECT $column FROM $table_name WHERE $column IS NOT NULL";
    $result = $conn->query($logoExistsQuery);
    $row = $result->fetch_assoc();
    $image_name = $row['' . $column . ''];
    return $image_name;
}

function getImageNameCondInDatabase($conn, $table_name, $column, $col2)
{
    $logoExistsQuery = "SELECT $column FROM $table_name WHERE $column IS NOT NULL AND $col2";
    $result = $conn->query($logoExistsQuery);
    $row = $result->fetch_assoc();
    $image_name = $row['' . $column . ''];
    return $image_name;
}
function sanitizeInput($input)
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}
function generateUniqueFileName($portalName, $fileExtension, $string)
{
    $portalNameStr = str_replace(' ', '_', strtolower($portalName));
    $uniqueFileName = $portalNameStr . '_' . $string . '' . uniqid() . '.' . $fileExtension;
    return $uniqueFileName;
}
function selectkro($conn, $table_name, $where)
{
    $response = array();
    $sql = "Select * from " .  $table_name . ' ' .   $where;
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            extract($row);
            array_push($response, $row);
        }
    }
    return json_encode($response);
}
function deletekro($conn, $table_name, $where)
{
    $sql = "DELETE FROM " . $table_name . ' ' . $where;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function generateUniqueNumber($num)
{
    $timestamp = microtime(true);
    $random_part = mt_rand(10, 99);
    $data_to_hash = $timestamp . $random_part;
    $unique_number = substr(sha1($data_to_hash), 0, $num);
    return $unique_number;
}

function decryptpost($conn, $post)
{
    return base64_decode(base64_decode(mysqli_real_escape_string($conn, $post)));
}
function simpledecryptpost($post)
{
    return base64_decode(base64_decode($post));
}

function updatekro($conn, $table, $columnsAndValues, $conditionColumn, $conditionValue)
{
    $response = array();
    $sql = "UPDATE $table SET ";
    $placeholders = array();
    $values = array();

    foreach ($columnsAndValues as $column => $value) {
        $sql .= $column . " = ?, ";
        array_push($placeholders, "s");
        array_push($values, $value);
    }

    $sql = rtrim($sql, ', '); // Remove the last comma and space
    $sql .= " WHERE $conditionColumn = ? "; // Adjust the WHERE clause

    array_push($placeholders, "s");
    array_push($values, $conditionValue);

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, implode("", $placeholders), ...$values);

        if (mysqli_stmt_execute($stmt)) {
            $response['status'] = 'success';
            $response['message'] = 'Update successful !!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Something Went Wrong !!';
        }
        mysqli_stmt_close($stmt);
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Unable To Update !!';
    }

    return $response;
}
function addkro($conn, $table, $columnsAndValues)
{
    $response = array();
    $sql = "INSERT INTO $table (";
    $placeholders = array();
    $values = array();
    $valueTypes = ""; // A string to specify the data types of values

    foreach ($columnsAndValues as $column => $value) {
        $sql .= $column . ", ";
        if (is_int($value)) {
            array_push($placeholders, "?");
            array_push($values, $value);
            $valueTypes .= "i"; // i for integer
        } else {
            array_push($placeholders, "?");
            array_push($values, $value);
            $valueTypes .= "s"; // s for string
        }
    }

    $sql = rtrim($sql, ', '); // Remove the last comma and space
    $sql .= ") VALUES (";

    $placeholdersStr = implode(", ", $placeholders);
    $sql .= $placeholdersStr . ")";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Use the $valueTypes string to specify the data types
        mysqli_stmt_bind_param($stmt, $valueTypes, ...$values);

        if (mysqli_stmt_execute($stmt)) {
            $response['status'] = 'success';
            $response['message'] = 'Insertion successful!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong!';
        }
        mysqli_stmt_close($stmt);
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Unable to insert data!';
    }

    return $response;
}


function multipleaddkro($conn, $table, $columnsAndValues)
{
    $response = array();
    $sql = "INSERT INTO $table (";
    $placeholders = array();
    $values = array();

    foreach ($columnsAndValues as $column => $value) {
        $sql .= $column . ", ";
        array_push($placeholders, "?");
        array_push($values, $value);
    }

    $sql = rtrim($sql, ', '); // Remove the last comma and space
    $sql .= ") VALUES (";

    $placeholdersStr = implode(", ", $placeholders);
    $sql .= $placeholdersStr . ")";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, str_repeat("s", count($placeholders)), ...$values);

        if (mysqli_stmt_execute($stmt)) {
            $lastInsertId = mysqli_insert_id($conn); // Get the last insert ID

            $response['status'] = 'success';
            $response['message'] = 'Insertion successful!';
            $response['lastInsertId'] = $lastInsertId; // Include the last insert ID in the response
        } else {
            $response['status'] = 'error';
			$response['lastInsertId'] = '';
            $response['message'] = 'Something went wrong!';
        }
        mysqli_stmt_close($stmt);
    } else {
        $response['status'] = 'error';
		$response['lastInsertId'] = '';

        $response['message'] = 'Unable to insert data!';
    }

    return $response;
}
function getgallery($conn,$img)
{
	$response = array();
	$sql = "Select * from  images WHERE  dish_id= '".$img."'ORDER BY image_id desc";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			extract($row);
			array_push($response, $row);
		}
	}
	return json_encode($response);
}



function getorder($conn)
{
	$response = array();
	 $sql = "Select * from  orders JOIN order_status  ON orders.order_status=order_status.order_status_id   ORDER BY orders.ID DESC";
	
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}

function getcancelorder($conn)
{
	$response = array();
	if ($_SESSION['STORE'] == 0 || $_SESSION['STORE'] == 100) {
		$show = "WHERE ( paymentstatus='cancelled')  and otp_validate='0' ORDER BY id ASC";
	} else {
		$show = "WHERE  ( paymentstatus='cancelled')  and otp_validate='0' AND store='" . $_SESSION['STORE'] . "' ORDER BY id ASC";
	}
	 $sql = "Select * from  orders JOIN order_status  ON orders.order_status=order_status.order_status_id  $show ";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			extract($row);
			array_push($response, $row);
		}
	}
	return json_encode($response);
}



function getsingledelieveryorder($conn)
{
	$response = array();
	$sql = "Select * from  orders JOIN order_status  ON orders.order_status=order_status.order_status_id WHERE orders.delievery_boy_id=".$_SESSION['DELIEVERY_BOY_LOGIN_ID']." ORDER BY orders.ID DESC";
	
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}


function getsingleorder($conn,$ID)
{
	$response = array();
	$sql = "Select * from  orders JOIN order_status ON orders.order_status=order_status.order_status_id WHERE orders.ID='$ID'";
	// echo $sql;
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}

function getsingleorderBYuser($conn,$ID)
{
	$response = array();
	$sql = "Select * from  orders JOIN order_status ON orders.order_status=order_status.order_status_id WHERE orders.ID='$ID' AND user_id='".$_SESSION['ATECHFOOD_USER_ID']."'";
	// echo $sql;
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}
function getbanner($conn)
{
	$response = array();
	$sql = "Select * from  banner ORDER BY ID desc";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}





function getBannerImg()
{
  global $conn;
  $data = array();
  $res = mysqli_query($conn, "select * from banner");
  //  echo "select * from images where dish_id='$dish_id'";

  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
  // echo $data;
}

function getfaq($conn)
{
	$response = array();
	$sql = "Select * from  faq";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}


function getsinglefaq($conn,$ID)
{
	$response = array();
	$sql = "Select * from  faq WHERE faq_id='$ID'";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}
function getabout($conn)
{
	$response = array();
	$sql = "Select * from  about";
	$result=mysqli_query($conn,$sql);
	if($result->num_rows>0)	
	{
		while($row = $result->fetch_assoc())
		{
			extract($row);
			array_push($response,$row);
		}
	}
	return json_encode($response);
}