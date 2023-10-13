<?php
function getfaq($conn)
{
	$response = array();
	$sql = "Select * from  faq";
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


function getsinglefaq($conn,$ID)
{
	$response = array();
	$sql = "Select * from  faq WHERE faq_id='$ID'";
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