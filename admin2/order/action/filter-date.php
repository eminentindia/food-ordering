<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();

$columns = array('ID', 'name', 'address', 'payment_type', 'payment_status','added_on');

// $query = "SELECT * FROM tbl_order WHERE ";

$query = "Select * from  orders WHERE";
	

if($_POST["is_date_search"] == "yes")
{
 $query .= 'added_on BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (ID LIKE "%'.$_POST["search"]["value"].'%" 
  OR name LIKE "%'.$_POST["search"]["value"].'%" 
  OR address LIKE "%'.$_POST["search"]["value"].'%" 
  OR payment_type LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY ID DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["ID"];
 $sub_array[] = $row["name"];
 $sub_array[] = $row["address"];
 $sub_array[] = $row["payment_type"];
 $sub_array[] = $row["added_on"];
 $data[] = $sub_array;
}

function get_all_data($conn)
{
//  $query = "SELECT * FROM tbl_order";
 $query = "Select * from  orders ";
	
 $result = mysqli_query($conn, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>