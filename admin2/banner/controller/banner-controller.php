<?php
function getbanner($conn)
{
	$response = array();
	$sql = "Select * from  banner ORDER BY ID desc";
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

function getBannerImg()
{
  global $conn;
  $data = array();
  $res = mysqli_query($conn, "select * from banner");
  //  echo "select * from images where dish_id='$dish_id'";

  while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
  }
  return $data;
  // echo $data;
}
?>