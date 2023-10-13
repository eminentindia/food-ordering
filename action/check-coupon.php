
<?php
session_start();
include('../admin/controller/common-controller.php');
include('../function.inc.php');
$conn = _connectodb();
setTimeZone();
$response = array();



$coupon_code=safe_value($conn,$_POST['couponcode']);
$res=mysqli_query($conn,"select * from coupon where coupon_code='$coupon_code' and status='1'");
$check=mysqli_num_rows($res);
if($check>0){	
	$row=mysqli_fetch_assoc($res);
    $cart_min_value=$row['cart_min_value'];
	$coupon_type=$row['coupon_type'];
	$coupon_value=$row['coupon_value'];
	$expired_on=strtotime($row['expired_on']);
	$cur_time=strtotime(date('Y-m-d'));
	$getcartTotalPrice=getcartTotalPrice();
	// echo $getcartTotalPrice;
	if($getcartTotalPrice>$cart_min_value){
		if($cur_time>$expired_on){
			$arr=array('status'=>'error','msg'=>'Coupon code expired');	
		}else{
			$coupon_code_apply=0;
			if($coupon_type=='F'){
				$coupon_code_apply=$getcartTotalPrice-$coupon_value;
				$arr=array('status'=>'success','msg'=>'Coupon code applied','value'=>$coupon_value,'coupon_code_apply'=>$coupon_code_apply);
			}if($coupon_type=='P'){
				$coupon_code_apply=$getcartTotalPrice-($coupon_value/100)*$getcartTotalPrice;
				$arr=array('status'=>'percent','msg'=>'Coupon code applied','value'=>$coupon_value,'coupon_code_apply'=>$coupon_code_apply);
			}
			
			$_SESSION['COUPON_CODE']=$coupon_code;
			$_SESSION['FINAL_PRICE']=$coupon_code_apply;
			
			
		}
	}else{
		$arr=array('status'=>'error','msg'=>'Coupon code will be applied for cart value greater then '.$cart_min_value);	
	}
}else{
	$arr=array('status'=>'error','msg'=>'Coupon code not found');	
}
echo json_encode($arr);

?>