<?php
function getdelievery_boy($conn)
{
	$response = array();
	$sql = "Select * from  delievery_boy";
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

function getactivedelievery_boy($conn)
{
	$response = array();
	$sql = "Select * from  delievery_boy where status='1'";
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

function getsingledelievery_boy($conn,$ID)
{
	$response = array();
	$sql = "Select * from  delievery_boy WHERE ID='$ID'";
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

?>