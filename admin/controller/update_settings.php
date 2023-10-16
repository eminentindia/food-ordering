<?php
include('../controller/common-controller.php');
include('../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();


// print_r($_POST);
// die();


if (isset($_POST['param']) && $_POST['param'] === 'company_update') {
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


if (isset($_GET['param']) &&  decryptpost($conn, $_GET['param']) === 'get_faq') {
    try {

        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }

        if (isset($_GET['pages_per_page']) && $_GET['pages_per_page'] != "") {
            $pages_per_page = $_GET['pages_per_page'];
        } else {
            $pages_per_page = 3; // Default number of pages to display
        }
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

        $offset = ($page_no - 1) * $pages_per_page;
        // Get the sorting parameters
        $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'faq_id';
        $sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';

        // Query to retrieve data for the current page
        $query = "SELECT * FROM `faq` WHERE `a` LIKE '%$searchQuery%' OR `q` LIKE '%$searchQuery%' ORDER BY $sortColumn $sortOrder  LIMIT $offset, $pages_per_page";
        $result = mysqli_query($conn, $query);

        $data = '';
        $p = 1;
        while ($row = mysqli_fetch_array($result)) {
            $data .= "<tr>
                <td>" . $p++ . "</td>
                <td>" . $row['a'] . "</td>
                <td>" . $row['q'] . "</td>
                <td>
                    <i class='fas fa-edit text-warning ms-3 me-3 cursor-pointer' onclick=\"edit_faq('" . $row['faq_id'] . "')\"></i>
                    <i class='fas fa-trash text-danger cursor-pointer' onclick=\"delete_faq('" . $row['faq_id'] . "')\"></i>
                </td>
            </tr>";
        }
        

        if (empty($data)) {
            $data = "<tr>
        <td colspan='4'>No records found</td>
    </tr>";
        }

        // Query to calculate total records
        $total_records_query = "SELECT COUNT(*) As total_records FROM `faq`";
        $total_records_result = mysqli_query($conn, $total_records_query);
        $total_records = mysqli_fetch_array($total_records_result);
        $total_records = $total_records['total_records'];

        $total_no_of_pages = ceil($total_records / $pages_per_page);

        $pagination_links = '';

        if ($total_no_of_pages > 1) {
            $pagination_links .= "<li class='page-item " . (($page_no == 1) ? 'disabled' : '') . " first'><a class='page-link' href='?page_no=1'>&laquo;&laquo;</a></li>";

            if ($page_no > 4) {
                $pagination_links .= "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
                $pagination_links .= "<li class='page-item'><a class='page-link'>...</a></li>";
            }

            for ($i = max(1, $page_no - 2); $i <= min($page_no + 2, $total_no_of_pages); $i++) {
                $active = ($i == $page_no) ? 'active' : '';
                $pagination_links .= "<li class='page-item $active'><a class='page-link' href='?page_no=$i'>$i</a></li>";
            }

            if ($page_no < $total_no_of_pages - 3) {
                $pagination_links .= "<li class='page-item'><a class='page-link'>...</a></li>";
                $pagination_links .= "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
            }

            $pagination_links .= "<li class='page-item " . (($page_no == $total_no_of_pages) ? 'disabled' : '') . " last'><a class='page-link' href='?page_no=$total_no_of_pages'>&raquo;&raquo;</a></li>";

            // Add "Previous" and "Next" buttons
            $prev_page = ($page_no > 1) ? $page_no - 1 : 1;
            $next_page = ($page_no < $total_no_of_pages) ? $page_no + 1 : $total_no_of_pages;

            $pagination_links = "<li class='page-item " . (($page_no == 1) ? 'disabled' : '') . " prev'><a class='page-link' href='?page_no=$prev_page'>&laquo;</a></li>" .
                $pagination_links .
                "<li class='page-item " . (($page_no == $total_no_of_pages) ? 'disabled' : '') . " next'><a class='page-link' href='?page_no=$next_page'>&raquo;</a></li>";
        }

        $response = [
            'data' => $data,
            'total_pages' => $total_no_of_pages,
            'page_no' => $page_no,
            'pagination_links' => $pagination_links
        ];
    } catch (\Throwable $th) {
        include('../notfound.html');
        $html2 = ob_get_clean();
        $response['status'] = 'success';
        $response['data'] = $html2;
    }
}


if (isset($_POST['param']) && $_POST['param'] === 'about_update') {
    $description =  $_POST['description'];
    $about_heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $sql = "UPDATE about SET description = ?, heading = ? ";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $description, $about_heading);
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
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid Parameters !!';
}


if (isset($_POST['param']) && $_POST['param'] === 'faq_add') {
    $q = mysqli_real_escape_string($conn, $_POST['q']);
    $a = mysqli_real_escape_string($conn, $_POST['answer']);
    $display_priority = mysqli_real_escape_string($conn, $_POST['display_priority']);

    $dataToInsert = array(
        'q' => $q,
        'a' => $a,
        'display_priority' => $display_priority,
    );
    $response = addkro($conn, 'faq', $dataToInsert);
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



if (isset($_POST['param']) && $_POST['param'] == 'delete_faq') {
    try {
        $id = $_POST['id'];

        $deletekro = deletekro($conn, 'faq', 'WHERE faq_id="' . $id . '"');
        if ($deletekro) {
            $response['status'] = 'success';
            $response['message'] = 'SUCCESS !!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'FAILED TO DELETE !!';
        }
    } catch (\Throwable $th) {
        $response['status'] = 'error';
        $response['message'] = 'FAILED TO DELETE !!';
    }
}


// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
