<?php
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
?>