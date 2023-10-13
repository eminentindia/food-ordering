<?php
session_start();
include('../../connection.php');
include('../../functions.php');
include('../../../functions.inc.php');
if ($_SESSION['admin_user_type'] != 1) {
    $sql = "SELECT * FROM attendence
    INNER JOIN admin ON attendence.emp_id = admin.admin_empid WHERE emp_id='" . $_SESSION['admin_empid'] . "' and id='" . $_POST['id'] . "'";
} else {
    $sql = "SELECT * FROM attendence
            INNER JOIN admin ON attendence.emp_id = admin.admin_empid WHERE  id='" . $_POST['id'] . "'";
}
$execute = mysqli_query($link, $sql);
$reviewAdded = '';
$hr_acknowledgement = '';
if ($execute->num_rows == 1) {
    $row = $execute->fetch_assoc();
    $reviewAdded = $row['review'];
    $hr_acknowledgementAdded = $row['hr_acknowledgement'];
}
$showSubhead = '';
$showSubmitBtn = '';
$showAckSubmitBtn = '';
if ($row['review'] == null) {
    $showSubhead = '<small id="review" class="form-text text-muted mb-2 reviewsmall">Please Add Geniune Review !!</small>';
    $showSubmitBtn = '<button type="submit" class="btn btn-primary btn-sm mt-3"><i class="fa-solid fa-plus"></i> Add</button>';
}
if ($row['hr_acknowledgement'] == null) {
    $showAckSubhead = '<small id="hr_acknowledgement" class="form-text text-muted mb-2 reviewsmall">Please Add Acknowledgement !!</small>';
    $showAckSubmitBtn = '<button type="button" id="acknowledged" class="btn btn-warning btn-sm mt-3"><i class="fa-solid fa-plus"></i> Add</button>';
}
if (checkOnlyAdminSession()) {
    $showAckSubmitBtn = '<button type="button" id="acknowledged" class="btn btn-warning btn-sm mt-3"><i class="fa-solid fa-plus"></i> Add</button>';
}
$isReview = '';
$submittedOn = '';
$updated_on = '';
$AttendenceDate = strtotime($row['AttendenceDate']);
$updated_on = strtotime($row['updated_on']);
$added_on = date('d-M-Y (l)', $AttendenceDate);
$updated_on = date('d-M-Y (l)', $updated_on);

$ishr_acknowledgementReview = '';
if ($row['review'] != '' or $row['review'] != null) {
    $isReview = 'disabled';
    $submittedOn = '<span class="text-muted"> [ ' . $added_on . ' ]</span>';
    $updated_on = '<span class="text-muted"> [ ' . $updated_on . ' ]</span>';
}
$ishrshow = false;
if ($row['hr_acknowledgement'] != '' or $row['hr_acknowledgement'] != null) {
    $ishr_acknowledgementReview = 'disabled';
    $ishrshow = true;
}
if ($row['duration'] == '0:0 Hrs') {
    $late = '';
} else {
    $time = $row['duration'];
    $late = '<div class="mb-5">
    <label for="" class="btn badge-danger border-danger text-light border btn-sm badge-sm" style="font-size:12px;"><span class="badge rounded-pill bg-light text-dark ms-3"> ' . $time . '</span></label>
    </div>';
}

$output = ' <div class="mb-3">Current Status : <span class="fw-bold">' . $row['currentstatus'] . '</span></div> <form class="ReviewForm" method="POST" name="ReviewForm" id="ReviewForm" style="background-image: url(assets/images/top-nav.png);background-repeat: no-repeat;"><div class="form-group">
<div class="d-flex gap-4 mb-2">
<label for="" class="btn badge-light border-dark text-dark border btn-sm badge-sm" style="font-size:12px;">In-Time : ' .  date('h:i A', strtotime($row['in_time']))
    . '</label>
<label for="" class="btn badge-light border-dark text-dark border btn-sm badge-sm" style="font-size:12px;">Out-Time : ' . date('h:i A', strtotime($row['out_time']))
    . '</label>
</div>
' . $late . '
<label for="reviewField" class="mt-3">Review ' . $submittedOn . '</label>
<input type="hidden" value="' . $_POST['id'] . '" id="ajaxEmpID" />
<textarea style="border-radius:0" class="form-control reviewTextarea" name="review" id="empreview" ' . $isReview . '>' . $reviewAdded . '</textarea><p class="successReview mt-2 text-success" style="display:none"></p>
' . $showSubmitBtn . '  


' . (checkOnlyAdminSession() ? '
  <label for="reviewField" class="mt-5">Acknowledged </label>
  <textarea style="border-radius:0"  class="form-control hr_acknowledgement" name="hr_acknowledgement" id="hr_acknowledgement">' . $hr_acknowledgementAdded . '</textarea>
  <p class="hrsuccessReview mt-2 text-success" style="display:none"></p>
  ' . $showAckSubmitBtn . '
' : '' . (!$ishrshow ? '
 
' : '
  <label for="reviewField" class="mt-5">Acknowledged </label>
  <textarea style="border-radius:0" ' . $ishr_acknowledgementReview . ' class="form-control hr_acknowledgement" name="hr_acknowledgement" id="hr_acknowledgement">' . $hr_acknowledgementAdded . '</textarea>
  <p class="hrsuccessReview mt-2 text-success" style="display:none"></p>
  ' . $showAckSubmitBtn . '
') . ' ') . '
</div></form>';
if (checkOnlyAdminSession()) {
    $isPresent = '';
    if ($row['currentstatus'] == 'PRESENT') {
        $isPresent = 'checked';
    } else {
        $isPresent = '';
    }
    $isAbsent = '';
    if ($row['currentstatus'] == 'ABSENT') {
        $isAbsent = 'checked';
    } else {
        $isAbsent = '';
    }
    $isfestiveHoliday = '';
    if ($row['currentstatus'] == 'FESTIVEHOLIDAY') {
        $isfestiveHoliday = 'checked';
    } else {
        $isfestiveHoliday = '';
    }
    $isWeeklyOff = '';
    if ($row['currentstatus'] == 'WEEKOFF') {
        $isWeeklyOff = 'checked';
    } else {
        $isWeeklyOff = '';
    }
    $isShortLeave = '';
    if ($row['currentstatus'] == 'SHORTLEAVE') {
        $isShortLeave = 'checked';
    } else {
        $isShortLeave = '';
    }
    $isHalfDay = '';
    if ($row['currentstatus'] == 'HALFDAY') {
        $isHalfDay = 'checked';
    } else {
        $isHalfDay = '';
    }
    $isSick = '';
    if ($row['currentstatus'] == 'SICKLEAVE') {

        $isSick = 'checked';
    } else {
        $isSick = '';
    }
    $isCasual = '';
    if ($row['currentstatus'] == 'CASUALLEAVE') {

        $isCasual = 'checked';
    } else {
        $isCasual = '';
    }

    $output .= '<div class="mt-3" id="changeStatusEmp"  style="    border: 1px dashed #449910;
    overflow: auto;
    padding: 20px;
    background: #85ff0073; margin-top:30px !important"><form method="post" name="changeoldstatus" class="mb-0" style="align-items: center;margin-left: 1px;
    gap: 20px;">
    <input type="hidden" value="' . $_POST['id'] . '" id="ajaxEmpIDStatus" />
    <div class="d-flex  align-items-center" style="flex-wrap: wrap;overflow: auto;flex: 0 0 auto;gap: 20px;">
    <label style="width:auto !Important; cursor:pointer !Important"> <div class="center-radio"> <input type="radio" value="CASUALLEAVE" id="" name="oldstatus" ' . $isCasual . '>Casual Leave</div> </label>
    <label style="width:auto !Important; cursor:pointer !Important"> <div class="center-radio"> <input type="radio" value="SICKLEAVE" id="" name="oldstatus" ' . $isSick . '>Sick Leave</div> </label>
    <label style="width:auto !Important; cursor:pointer !Important"> <div class="center-radio"> <input type="radio" value="PRESENT" id="" name="oldstatus" ' . $isPresent . '>Present</div> </label>
    <label style="width:auto !Important; cursor:pointer !Important"> <div class="center-radio"> <input type="radio" value="ABSENT" id="" name="oldstatus" ' . $isAbsent . '>Absent</div> </label>
    <label style="width:auto !Important; cursor:pointer !Important"> <div class="center-radio"> <input type="radio" value="SHORTLEAVE" id="" name="oldstatus" ' . $isShortLeave . '>Short Leave</div> </label>
   <label style="width:auto !Important; cursor:pointer !Important"> <div class="center-radio"> <input type="radio" value="HALFDAY" id="" name="oldstatus" ' . $isHalfDay . '>Half Day</div> </label>
   <label style="width:auto !Important; cursor:pointer !Important"> <div class="center-radio"> <input type="radio" value="FESTIVEHOLIDAY" id="" name="oldstatus" ' . $isfestiveHoliday . '>Holiday</div> </label>
   <label style="width:auto !Important; cursor:pointer !Important"> <div class="center-radio"> <input type="radio" value="WEEKOFF" id="" name="oldstatus" ' . $isWeeklyOff . '>Weekly Off</div> </label>
    </div>
    <button type="submit" class="btn btn-sm mt-3" style="    background: #598f29;
    color: white;
    font-size: .8rem;" id="update_statuss"><i class="fa fa-refresh text-white" aria-hidden="true"></i>
     Update Status</button>
    </form></div>';
}
echo $output;
