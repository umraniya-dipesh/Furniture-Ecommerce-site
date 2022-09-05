<?php
session_start();
require 'cartdb.php';
function session_check(){
	if(!isset($_SESSION['cart'])){ 
		return false;
	}
}

function cart_remove_session($pid){
	$count = 0;
	foreach ($_SESSION['cart'] as $row) {
		if($row['p_id']==$pid){
			unset($_SESSION['cart'][$count]);
		}
		$count+= 1;
	}
	return $count;	
}

function cart_size(){
	$count = 0;
	if(isset($_SESSION['cart'])){
		foreach ($_SESSION['cart'] as $row) {
		$count+= 1;
		}	
	}
	return $count;	
}

function cart_update_session($pid,$qty){
	$count = 0;	
	foreach ($_SESSION['cart'] as $row ) {
		if($row['p_id']==$pid){
			$_SESSION['cart'][$count]['quantity']=intval($qty);
			$_SESSION['cart'][$count]['total']=$qty*$row['p_price'];
		}
		$count+= 1;
	}
	$_SESSION['cart']=array_values($_SESSION['cart']);
}


function cart_fetch_session(){
	$cart_array=array();
	if(isset($_SESSION['cart'])){
		 $cart_array=$_SESSION['cart'];
	}
	$flag=(isset($cart_array) && $cart_array==NULL)?true:false;
	$temp_array['cart']=$cart_array;
	$temp_array['is_null']=$flag;
	return json_encode($temp_array);
}

function cart_insert_session($pid,$name,$price,$qty,$image){
	$count=cart_size();
	$_SESSION['cart'][$count]['p_id']=$pid;
	$_SESSION['cart'][$count]['p_name']=$name;
	$_SESSION['cart'][$count]['p_image']=$image;
	$_SESSION['cart'][$count]['p_price']=$price;
	$_SESSION['cart'][$count]['quantity']=intval($qty);
	$_SESSION['cart'][$count]['total']=$qty*intval($price);
	$_SESSION['cart']=array_values($_SESSION['cart']);
	// print_r($_SESSION['cart']);
}

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['flag']) && $_POST['flag'] == "addtocart" ){
	$qty=($_POST['qty']==NULL)?1:$_POST['qty'];
		if (isset($_SESSION['login_userid'])){	
			insert_cart($_SESSION['login_userid'],$_POST['id'],$qty);
		}else{
			cart_insert_session($_POST['id'],$_POST['name'],$_POST['price'],$qty,$_POST['p_image']);
		}
}


if(isset($_POST['cart_id']) && isset($_POST['qnt']) && isset($_POST['flag']) && $_POST['flag'] == "update_cart" ){
	$totalamount=0;
	if(isset($_SESSION['login_userid'])){
		update_cart($_POST['cart_id'],$_POST['qnt']);
		$cart_details=fetch_cart($_SESSION['login_userid']);
		$cart_details=json_decode($cart_details,1);
		foreach($cart_details['cart'] as $row){
			$totalamount=intval($row['total'])+$totalamount;
		}	
	}
	else{
		cart_update_session($_POST['p_id'],$_POST['qnt']);
		$cart_details=cart_fetch_session();
		$cart_details=json_decode($cart_details,1);
		foreach($cart_details['cart'] as $row){
			$totalamount=intval($row['total'])+$totalamount;
		}	
	}	
	echo $totalamount;
}
if((isset($_POST['p_id'])||isset($_POST['cart_id'])) && isset($_POST['flag']) && $_POST['flag'] == "remove_cart" ){
	$totalamount=0;
	$f=0;
	if(isset($_SESSION['login_userid'])){

		$cart_details=fetch_cart($_SESSION['login_userid']);
		$cart_details=json_decode($cart_details,1);

		if($cart_details['is_null']==false){
			$f=1;
			cart_remove($_POST['cart_id']);
		}

		foreach($cart_details['cart'] as $row){
			$totalamount=intval($row['total'])+$totalamount;
		}
	}
	else{

		$cart_details=cart_fetch_session();
		$cart_details=json_decode($cart_details,1);
		if($cart_details['is_null']==false){
			$f=1;
			cart_remove_session($_POST['p_id']);
		}

		foreach($cart_details['cart'] as $row){
			$totalamount=intval($row['total'])+$totalamount;
		}
	}
	

	$temp[0]['is_null']=$f;
	$temp[0]['totalamount']=$totalamount;
	print_r(json_encode($temp));
}

if(isset($_POST['flag']) && $_POST['flag'] == "logout" ){
	unset($_SESSION['cart']);
	unset($_SESSION['login_userid']);
	unset($_SESSION['login_username']);
}

?>