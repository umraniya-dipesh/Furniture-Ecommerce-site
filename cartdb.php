<?php
require 'config.php';


function insert_cart($cid,$pid,$qty){
	$sql="insert into cart(cust_id,p_id,quantity) values('".$cid."','".$pid."','".$qty."')";
	global $con;
	$res=mysqli_query($con,$sql);
}

function fetch_cart($cid,$pid=''){
	global $con;
	$temp=array();
	if(isset($pid) && $pid!=NULL ){
		$sql="Select * from cart where cust_id='".$cid."' and p_id='".$pid."'";
		$sql="select * from cart c inner join product p on c.`p_id` = p.`p_id` where  c.`cust_id` ='".$cid."' and p.p_id='".$pid."' ";
		$res=mysqli_query($con,$sql);
	}
	else{
		$sql="select * from cart c inner join product p on c.`p_id` = p.`p_id` where  c.`cust_id` ='".$cid."' ";
		$res=mysqli_query($con,$sql);
	}
	
	$i=0;
	while ($row = mysqli_fetch_assoc($res)) {
		$temp[$i]['cart_id']=$row['cart_id'];
		$temp[$i]['p_id']=$row['p_id'];
		$temp[$i]['cust_id']=$row['cust_id'];
		$temp[$i]['quantity']=$row['quantity'];
		$temp[$i]['p_name']=$row['p_name'];
		$temp[$i]['p_price']=$row['p_price'];
		$temp[$i]['p_image']=$row['p_image'];
		$temp[$i]['total']=intval($temp[$i]['p_price'])*$temp[$i]['quantity'];
		$i++;
	}
	$flag=(isset($temp) && $temp==NULL)?true:false;
	$temp_array['cart']=$temp;
	$temp_array['is_null']=$flag;
	return json_encode($temp_array);
}

function update_cart($cart_id,$qty){
	global $con;
	$sql="update cart set quantity='".$qty."' where cart_id='".$cart_id."'";
	$res=mysqli_query($con,$sql);
}
function cart_remove($cart_id){
	global $con;
	$sql="delete from cart where cart_id='".$cart_id."'";
	$res=mysqli_query($con,$sql);
}

?>