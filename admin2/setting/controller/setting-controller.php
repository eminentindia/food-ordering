<?php
function getsetting($conn)
{
	$response = array();
	$sql = "Select * from  setting";
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