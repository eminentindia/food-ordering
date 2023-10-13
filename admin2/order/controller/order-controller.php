<?php
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

function getcancelorder($link)
{
	$response = array();
	if ($_SESSION['STORE'] == 0 || $_SESSION['STORE'] == 100) {
		$show = "WHERE ( paymentstatus='cancelled')  and otp_validate='0' ORDER BY id ASC";
	} else {
		$show = "WHERE  ( paymentstatus='cancelled')  and otp_validate='0' AND store='" . $_SESSION['STORE'] . "' ORDER BY id ASC";
	}
	 $sql = "Select * from  orders JOIN order_status  ON orders.order_status=order_status.order_status_id  $show ";
	$result = mysqli_query($link, $sql);
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
