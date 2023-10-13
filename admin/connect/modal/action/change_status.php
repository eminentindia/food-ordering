<?php
session_start();
include('../../connection.php');
include('../../functions.php');
if (isset($_POST['oldstatus'])) {
    //check old status 
    $sql = "select currentstatus,emp_id,id from attendence WHERE id='" . $_POST['id'] . "'";
    $res = mysqli_query($link, $sql);
    $records = mysqli_fetch_assoc($res);
    $newupdate = mysqli_real_escape_string($link, $_POST['oldstatus']);
    $currentstatus = $records['currentstatus'];
    $emp_id = $records['emp_id'];
    $id = $records['id'];
    if ($records['currentstatus'] == $newupdate) {
        echo "exist";
    } else {
        if ($newupdate == 'CASUALLEAVE') {
            //from attendence
            $year = date('Y');
            $a = "SELECT * FROM attendence WHERE YEAR(AttendenceDate) ={$year}  AND emp_id='$emp_id'";
            $b = mysqli_query($link, $a);
            $attendence_count_casual_leave = 0;
            while ($c = mysqli_fetch_assoc($b)) {
                if ($c['currentstatus'] == 'CASUALLEAVE') {
                    $attendence_count_casual_leave++;
                }
            }
            $currentMonth = date('m'); // Get the current month
            $casualLeaveQuery = "SELECT COUNT(*) AS leave_count FROM attendence WHERE currentstatus = 'CASUALLEAVE' AND MONTH(AttendenceDate) = '$currentMonth' AND emp_id='$emp_id'";
            $result = mysqli_query($link, $casualLeaveQuery);
            $row = mysqli_fetch_assoc($result);
            $attendence_count_casual_leave = $row['leave_count'];
            if ($attendence_count_casual_leave == 0) {
                $sql = "UPDATE attendence SET updatedstatus='$newupdate', currentstatus='$newupdate', read_review='yes' WHERE id='" . $_POST['id'] . "'";
                mysqli_query($link, $sql);
                $x = "SELECT * FROM admin WHERE admin_empid='$emp_id'";
                $y = mysqli_query($link, $x);
                echo 'done';
                die();
            } else {
                echo "casual_error";
                die();
            }
        } else if ($newupdate == 'SICKLEAVE') {
            $year = date('Y');
            $a = "SELECT * FROM attendence WHERE YEAR(AttendenceDate) ={$year}  AND emp_id='$emp_id'";
            $b = mysqli_query($link, $a);
            $attendence_count_sick_leave = 0;
            while ($c = mysqli_fetch_assoc($b)) {
                if ($c['currentstatus'] == 'SICKLEAVE') {
                    $attendence_count_sick_leave++;
                }
            }
            $allot_sick_leave = 3;
            if ($allot_sick_leave == $attendence_count_sick_leave) {
                echo "sick_error";
                die();
            } else {
                $sql = "UPDATE attendence SET updatedstatus='$newupdate', currentstatus='$newupdate',read_review='yes' WHERE id='" . $_POST['id'] . "'";
                mysqli_query($link, $sql);
                $x = "SELECT * FROM admin WHERE  admin_empid='$emp_id'";
                $y = mysqli_query($link, $x);
                echo 'done';
                die();
            }
        } else if ($newupdate == 'HALFDAY') {
            $sql = "UPDATE attendence SET updatedstatus='$newupdate', currentstatus='$newupdate',read_review='yes' WHERE id='" . $_POST['id'] . "'";
            mysqli_query($link, $sql);
            echo 'done';
            die();
        } else if ($newupdate == 'SHORTLEAVE') {
            $sql = "UPDATE attendence SET updatedstatus='$newupdate', currentstatus='$newupdate',read_review='yes' WHERE id='" . $_POST['id'] . "'";
            mysqli_query($link, $sql);
            echo 'done';
            die();
        } else {
            $sql = "UPDATE attendence SET updatedstatus='$newupdate', currentstatus='$newupdate',read_review='yes' WHERE id='" . $_POST['id'] . "'";
            mysqli_query($link, $sql);
            echo 'done';
            die();
        }
    }
}
