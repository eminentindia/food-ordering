<?php
session_start();
include('../../connection.php');
include('../../functions.php');
if (isset($_POST['oldstatus'])) {
    $status = $_POST['oldstatus'];
    $attendence_exeDate = $_POST['attendence_exeDate'];
    
    $emp_id = $_SESSION['admin_empid'];


    if ($status == 'CASUALLEAVE') {
        // from attendence_exe
        $year = date('Y');
        $a = "SELECT * FROM attendence_exe WHERE YEAR(attendence_exeDate) ={$year}  AND emp_id='$emp_id'";
        $b = mysqli_query($link, $a);
        $attendence_exe_count_casual_leave = 0;
        while ($c = mysqli_fetch_assoc($b)) {
            if ($c['currentstatus'] == 'CASUALLEAVE') {
                $attendence_exe_count_casual_leave++;
            }
        }
        $currentMonth = date('m'); // Get the current month
        $casualLeaveQuery = "SELECT COUNT(*) AS leave_count FROM attendence_exe WHERE currentstatus = 'CASUALLEAVE' AND MONTH(attendence_exeDate) = '$currentMonth' AND emp_id='$emp_id'";
        $result = mysqli_query($link, $casualLeaveQuery);
        $row = mysqli_fetch_assoc($result);
        $attendence_exe_count_casual_leave = $row['leave_count'];
        if ($attendence_exe_count_casual_leave == 0) {
            $sql = "INSERT INTO attendence_exe(attendence_exeDate,emp_id,updatedstatus,currentstatus) VALUES('" . $attendence_exeDate . "'," . $emp_id . "','" . $status . "','" . $status . "')";
            mysqli_query($link, $sql);
            echo 'done';
            die();
        } else {
            echo "casual_error";
            die();
        }
    } else if ($status == 'SICKLEAVE') {
        $year = date('Y');
        $a = "SELECT * FROM attendence_exe WHERE YEAR(attendence_exeDate) ={$year}  AND emp_id='$emp_id'";
        $b = mysqli_query($link, $a);
        $attendence_exe_count_sick_leave = 0;
        while ($c = mysqli_fetch_assoc($b)) {
            if ($c['currentstatus'] == 'SICKLEAVE') {
                $attendence_exe_count_sick_leave++;
            }
        }
        $allot_sick_leave = 3;
        if ($allot_sick_leave == $attendence_exe_count_sick_leave) {
            echo "sick_error";
            die();
        } else {
            $sql = "INSERT INTO attendence_exe(emp_id,updatedstatus,currentstatus) VALUES('" . $emp_id . "','" . $status . "','" . $status . "')";
            mysqli_query($link, $sql);
            echo 'done';
            die();
        }
    } else {
        $sql = "INSERT INTO attendence_exe(emp_id,updatedstatus,currentstatus) VALUES('" . $emp_id . "','" . $status . "','" . $status . "')";
        mysqli_query($link, $sql);
        echo 'done';
        die();
    }
}
