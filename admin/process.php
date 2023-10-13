<?php
include('controller/common-controller.php');

$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
	extract($getsinglesetting);
}
if ($two_factor == '0' and isset($_POST['email']) and $_POST['password'] != "") {
	$formname = "no-secure-login";
} else if (isset($_POST['email']) and $_POST['password'] != "" and $two_factor == '1') {
	$formname = "secure-login";
} elseif (isset($_POST['otp1'])) {
	$formname = "verify-otp";
} else {
	header('location:index.php?problem=Invalid Credentials');
}
session_start();
switch ($formname) {
	case "no-secure-login":
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$_SESSION['ADMIN_LOGIN_ID'] = $row['id'];
				$_SESSION['admin_email'] = $row['admin_email'];
				$_SESSION['admin_name'] = $row['admin_username'];
				$_SESSION['ADMIN_ROLE'] = $row['role'];
				$_SESSION['admin_mobile'] = $row['admin_mobile'];
				$_SESSION['admin_password'] = $row['admin_password'];
				$_SESSION['store'] = $row['store'];
				$_SESSION['admin_status'] = $row['admin_status'];
				$response['success'] = $row['store'];

				header("location:dashboard.php");
			}
		} else {
			header('location:index.php?problem=Invalid Credentials');
		}
		break;
	case "secure-login":
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$_SESSION['ADMIN_LOGIN_ID'] = $row['id'];
				$_SESSION['admin_email'] = $row['admin_email'];
				$_SESSION['admin_name'] = $row['admin_username'];
				$_SESSION['ADMIN_ROLE'] = $row['role'];
				$_SESSION['admin_mobile'] = $row['admin_mobile'];
				$_SESSION['admin_password'] = $row['admin_password'];
				$_SESSION['store'] = $row['store'];
				$_SESSION['admin_status'] = $row['admin_status'];
				$response['success'] = $row['store'];
				$_SESSION['OTP'] = random_int(100000, 999999);
				if ($whatsapp_active == '1' && $is_infobip_connected == '1') {
					// include('msg/login_otp.php');
				}
				header("location:authentication.php");
			}
		} else {
			header('location:index.php?problem=Invalid Credentials');
		}
		break;
	case "verify-otp":
		$otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'];
		$mobile = $_SESSION['admin_mobile'];
		if ($otp == $_SESSION['OTP']) {
			$sql = "SELECT * FROM admin WHERE admin_email='" . $_SESSION["admin_email"] . "' AND admin_password='" . $_SESSION["admin_password"] . "'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$_SESSION['ADMIN_LOGIN_ID'] = $row['id'];
					$_SESSION['admin_email'] = $row['admin_email'];
					$_SESSION['admin_name'] = $row['admin_username'];
					$_SESSION['ADMIN_ROLE'] = $row['role'];
					$_SESSION['admin_mobile'] = $row['admin_mobile'];
					$_SESSION['admin_password'] = $row['admin_password'];
					$_SESSION['store'] = $row['store'];
					$_SESSION['admin_status'] = $row['admin_status'];
					$response['success'] = $row['store'];
				
					header("location:dashboard.php");
				}
			}
		} else {
			header('location:index.php?problem=Incorrect OTP Please Login Again');
		}
		break;
	default:
		echo "You Don't Have Permission to Do this Action !! Please Contact Administrator.";
}
?>
<script type="text/javascript">
	function preventBack() {
		window.history.forward();
	}
	setTimeout("preventBack()", 0);
	window.onunload = function() {
		null
	};
</script>