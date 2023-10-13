<?php
session_start();
require_once('../../connect/connection.php');
require_once('../../connect/functions.php');
$getsetting = getsetting($link);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();
try {
    $selectkro = selectkro($link, 'admin', '');
    $selectkro = json_decode($selectkro, true);
    foreach ($selectkro as $singleselectkro) {
        extract($singleselectkro);
    }
    $html = ' 
<div class="row mb-5">
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="required fs-5 fw-semibold mb-2">First name</label>

        <input type="text" class="form-control form-control-solid" placeholder="" value="' . $admin_name . '" name="first-name">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>

    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="required fs-5 fw-semibold mb-2">Last name</label>

        <input type="text" class="form-control form-control-solid" placeholder="" name="last-name">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
</div>
<div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
    <label class="required fs-5 fw-semibold mb-2">Address Line 1</label>

    <input class="form-control form-control-solid" placeholder="" name="address1">
    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
</div>
<div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
    <label class="required fs-5 fw-semibold mb-2">Address Line 2</label>

    <input class="form-control form-control-solid" placeholder="" name="address2">
    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
</div>
<div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
    <label class="fs-5 fw-semibold mb-2">Town</label>

    <input class="form-control form-control-solid" placeholder="" name="city">
    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
</div>
<div class="row g-9 mb-5">
    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="fs-5 fw-semibold mb-2">State / Province</label>

        <input class="form-control form-control-solid" placeholder="" name="state">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>

    <div class="col-md-6 fv-row fv-plugins-icon-container">
        <label class="fs-5 fw-semibold mb-2">Post Code</label>

        <input class="form-control form-control-solid" placeholder="" name="postcode">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
</div>
<div class="fv-row mb-5">
    <div class="d-flex flex-stack">
        <div class="me-5">
            <label class="fs-5 fw-semibold">Use as a billing adderess?</label>

            <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
        </div>

        <label class="form-check form-switch form-check-custom form-check-solid">
            <input class="form-check-input" name="billing" type="checkbox" value="1" checked="checked">

            <span class="form-check-label fw-semibold text-muted">
                Yes
            </span>
        </label>
    </div>';
    $response['status'] = 'success';
    $response['message'] = $html;
} catch (\Throwable $th) {

    include('../../notfound.html');
    $html2 = ob_get_clean();
    $response['status'] = 'success';
    $response['message'] = $html2;
}

// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
