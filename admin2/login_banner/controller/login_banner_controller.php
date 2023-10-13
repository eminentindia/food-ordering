<?php
function getlogin_banner($conn)
{
	$response = array();
	$sql = "Select * from  login_banner ORDER BY ID desc";
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

function getsinglelogin_banner($conn,$ID)
{
	$response = array();
	$sql = "Select * from  login_banner WHERE ID='$ID'";
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




function get_login_banner($conn, $type=''){
	$sql="select * from login_banner ";
	   
   
   if($type=='login')
   {
	   $sql.="WHERE type='login'";
   }
   if($type=='register')
   {
	   $sql.="WHERE type='register'";
   }

    // echo $sql;
   $res=mysqli_query($conn,$sql);
	   $data=array();
	   while($row=mysqli_fetch_assoc($res)){
		   $data[]=$row;
	   }
	   return $data;
   }
?>