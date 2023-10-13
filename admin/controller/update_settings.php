<?php
include('../controller/common-controller.php');
include('../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['param']) && $_POST['param'] === 'company_update') {
    // Sanitize input
    $portalName = sanitizeInput($_POST['portal_name']);
    $WebsitePath = sanitizeInput($_POST['website_path']);

    // Validate uploaded file
    if (isset($_FILES['logo']['error']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $tempFile = $_FILES['logo']['tmp_name'];
        $originalFileName = $_FILES['logo']['name'];
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

        // Generate a unique and secure filename
        $newFileNameSave = 'media/upload/setting/' . generateUniqueFileName($portalName, $fileExtension, 'logo');
        $newFileName = '../' . $newFileNameSave;

        // Check if logo exists in the database and delete the old one
        $logoExistsInDatabase = checkImageExistsInDatabase($conn, 'setting', 'logo');
        if ($logoExistsInDatabase) {
            $old_img = getImageNameInDatabase($conn, 'setting', 'logo');
            unlink('../' . $old_img); // Remove the old file
        }

        // Move uploaded file to the destination
        if (move_uploaded_file($tempFile, $newFileName)) {
            // Update the database with the new logo path
            $updateLogoQuery = "UPDATE setting SET logo = '$newFileNameSave'";
            $conn->query($updateLogoQuery);
        }
    }



    if (isset($_FILES['fav']['error']) && $_FILES['fav']['error'] === UPLOAD_ERR_OK) {
        $tempFile = $_FILES['fav']['tmp_name'];
        $originalFileName = $_FILES['fav']['name'];
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

        // Generate a unique and secure filename
        $newFileNameSave = 'media/upload/setting/' . generateUniqueFileName($portalName, $fileExtension, 'fav');
        $newFileName = '../' . $newFileNameSave;

        // Check if fav exists in the database and delete the old one
        $favExistsInDatabase = checkImageExistsInDatabase($conn, 'setting', 'fav');
        if ($favExistsInDatabase) {
            $old_img = getImageNameInDatabase($conn, 'setting', 'fav');
            unlink('../' . $old_img); // Remove the old file
        }

        // Move uploaded file to the destination
        if (move_uploaded_file($tempFile, $newFileName)) {
            // Update the database with the new logo path
            $updateLogoQuery = "UPDATE setting SET fav = '$newFileNameSave'";
            $conn->query($updateLogoQuery);
        }
    }



    // Update portal name in the database
    $updatePortalNameQuery = "UPDATE setting SET portal_name = '$portalName', website_path = '$WebsitePath'";
    $conn->query($updatePortalNameQuery);

    // Response
    $response = array(
        'status' => 'success',
        'message' => 'Update successful !!'
    );
}





if (isset($_POST['param']) && $_POST['param'] === 'color_update') {
    // Create an array to hold the values and fields for the update
    $updates = array(
        'themecolor' => mysqli_real_escape_string($conn, $_POST['themecolor']),
        'mainbtn' => mysqli_real_escape_string($conn, $_POST['mainbtn']),
        'secondarybtn' => mysqli_real_escape_string($conn, $_POST['secondarybtn']),
        'mobilenav' => mysqli_real_escape_string($conn, $_POST['mobilenav']),
        'mobilenavtxt' => mysqli_real_escape_string($conn, $_POST['mobilenavtxt']),
        'mobilenavlight' => mysqli_real_escape_string($conn, $_POST['mobilenavlight'])
    );

    // Create an SQL query with placeholders
    $sql = "UPDATE setting SET themecolor=?, mainbtn=?, secondarybtn=?, mobilenav=?, mobilenavtxt=?, mobilenavlight=?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Create an array of types to bind the parameters
        $types = 'ssssss';
        $params = array($updates['themecolor'], $updates['mainbtn'], $updates['secondarybtn'], $updates['mobilenav'], $updates['mobilenavtxt'], $updates['mobilenavlight']);

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, $types, ...$params);

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
}





if (isset($_POST['param']) && $_POST['param'] === 'design_update') {
    $preloader = $_POST['preloader'];
    $sql = "UPDATE setting SET  preloader = ?"; // Add your WHERE clause here
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $preloader);
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
}


if (isset($_POST['param']) && $_POST['param'] === 'contact_update') {
    // Establish a database connection here using $conn

    $site_address = mysqli_real_escape_string($conn, $_POST['site_address']);
    $site_phone = mysqli_real_escape_string($conn, $_POST['site_phone']);
    $site_email = mysqli_real_escape_string($conn, $_POST['site_email']);
    $opening_hours = mysqli_real_escape_string($conn, $_POST['opening_hours']);
    $tagline = mysqli_real_escape_string($conn, $_POST['tagline']);

    // Update query
    $update_query = "UPDATE setting SET site_address=?, site_phone=?, site_email=?, opening_hours=?, tagline=?";
    
    if ($stmt = mysqli_prepare($conn, $update_query)) {
        mysqli_stmt_bind_param($stmt, "sssss", $site_address, $site_phone, $site_email, $opening_hours, $tagline);
        
        if (mysqli_stmt_execute($stmt)) {
            $response['status'] = 'success';
            $response['message'] = 'Update successful !!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Something Went Wrong !!';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Unable To Update !!';
    }
}



if (isset($_POST['param']) && $_POST['param'] === 'social_update') {
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $twitter = mysqli_real_escape_string($conn, $_POST['twitter']);
    $youtube = mysqli_real_escape_string($conn, $_POST['youtube']);
    $sql = "UPDATE setting SET instagram=?, facebook=?, twitter=?, youtube=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $instagram, $facebook, $twitter, $youtube);
        if (mysqli_stmt_execute($stmt)) {
            $response['status'] = 'success';
            $response['message'] = 'Update successful !!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Something Went Wrong !!';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Unable To Update !!';
    }
}


if (isset($_POST['param']) && $_POST['param'] == 'connected_account') {
    $googleswitch = $_POST['googleswitch'];
    $infobip = $_POST['infobip'];
    $twofactor = $_POST['twofactor'];
    // Update setting in the database
    $sql = "UPDATE setting SET google_login = ?, is_infobip_connected = ?, two_factor = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $googleswitch, $infobip, $twofactor);
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
}

if (isset($_POST['param']) && $_POST['param'] == 'maintenance') {
    $maintenance = $_POST['maintenance'];
    $sql = "UPDATE setting SET on_maintenance = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $maintenance);
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
}




// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
