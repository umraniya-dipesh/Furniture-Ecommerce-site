<?php
// require_once("cart_session.php");
// session_start();
require_once("cart_session.php");
require_once("cartdb.php");
if(isset($_SESSION['login_userid'])){
	$cart=fetch_cart($_SESSION['login_userid']);
	$cart=json_decode($cart,1);
}
else{
	$cart=cart_fetch_session();
	$cart=json_decode($cart,1);
}

$totalamount=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="furnish furnitue,">
    <meta name="keywords" content="furnish, furnitue, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Furnish</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
        <?php include 'header.php';?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <!-- <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th> -->
                                    <th class="image">Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th class="total">Total</th>
                                </tr>
                            </thead>
                            <tbody id="empty_cart_message">

                        <?php 
                      
                        if($cart['is_null']==false){
                        foreach ($cart['cart'] as $row) {	
                        $totalamount=intval($row['total'])+$totalamount;							
                        ?>
                        <tr>

                            <input type="hidden" id="cart_id" value="<?=$row['cart_id']?>">
                            <input type="hidden" id="p_id" value="<?=$row['p_id']?>">
                         
                            <td class="image">
                                <a href="shop-details.php?id=<?=$row['p_id']?>" style="color: black;"><img alt="IMAGE" src="<?php echo'./admin/uploads/product/'.$row['p_image']; ?>" height="100px" width="100px"></a>
                                    
                            </td>
                            <td class="name" >
                                <a href="shop-details.php?id=<?=$row['p_id']?>" style="color: black;"><?= print_r($row['p_name']); ?></a>
                                
                            </td>
                            <!-- <td class="name"><?= print_r($row['p_name']); ?></td> -->
                            <td id="price"><?=$row['p_price']?></td>
                            <td class="quantity">
                                <input type="text" size="1" value="<?=$row['quantity']?>" name="quantity" id="qnty">
                                <input type="hidden" size="1" value="<?=$totalamount?>" name="amount" id="post_total_amount">
                                <input type="hidden" name="firstname" value="<?=$_SESSION['login_username']?>">
                                
                                <input type="hidden" name="email" value="umraniyadipeshk@gmail.com">

                                <input type="hidden" name="phone" value="9979880672">
                                <input type="hidden" name="productinfo" value="good">
                                <input type="hidden" name="service_provider" value="good">							
                                <input type="hidden" name="surl" value="http://localhost/furnish/payment-status.php">
                                <input type="hidden" name="furl" value="http://localhost/funish/payment-status.php">
                                <img title="Update" alt="Update" src="img/update.png" id="update_cart" >
                                <img title="Remove" alt="Remove" src="img/remove.png" id="remove_cart" >
                            </td>
                            <td class="total" id="subtotal"><?=$row['total']?></td>
                        </tr>
                        <?php 
                                } 
                            }
                        ?>
                        </tbody>
                        </table>
                        <div id="cart_empty">
                        <?php
                            if($cart['is_null']==true){
                        ?>
                                <center><p>No product is added to the cart</p></center>
                        <?php
                            }
                        ?>								
				        </div>		
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="./index.html" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div> -->
                <div class="col-lg-6">
                    <!-- <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <!-- <li>Subtotal <span id="ordertotalamount">₹ &nbsp</span></li> -->
                            <li>Total<span id="ordertotalamount"><?=$totalamount?></span></li>
                            
                        </ul>
                        <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                        <!-- <input type="submit" class="btn primary-btn shadow-none" id="checkout" value="Proceed to Checkout">	 -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
        <?php include_once 'footer.php';?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript">
	$(document).on('click','#update_cart',function(){
		var th=this;
		var qnt=parseInt($(th).parent().find('#qnty').val());
		var price=parseInt($(th).parent().siblings('#price').html());
		var cart_id=parseInt($(th).parent().siblings('#cart_id').val());
		var total=$(th).parent().siblings('#subtotal');
		if(qnt>0){
			var subtotal=qnt*price;
			total.html(subtotal);
		}
		$.ajax({
		  url: "cart_session.php",
		  method: "POST",
		  data: { cart_id : cart_id ,qnt : qnt , flag : "update_cart"},
		  success:function(data){
		  	$("#ordertotalamount").html(data);
		  	$("#post_total_amount").val(data);	
		  }
		});
	});

	$(document).on('click','#remove_cart',function(){
		var th=this;
		var p_id=parseInt($(th).parent().siblings('#p_id').val());
		var cart_id=parseInt($(th).parent().siblings('#cart_id').val());
		if(confirm("Are you sure you want to remove the product")){
			$(this).closest("tr").remove();
			$.ajax({
			  url: "cart_session.php",
			  method: "POST",
			  dataType: "json",
			  data: { cart_id : cart_id ,p_id : p_id , flag : "remove_cart"},
			  success:function(data) {
                var rowCount = $('#empty_cart_message tr').length;
                // alert(rowCount);
			  	if(rowCount==0){
			  		$('#cart_empty').html("<center><p>No product is added to the cart</p></center>");			  		
			  	}				
			  	$("#ordertotalamount").html(data[0].totalamount);
				$("#post_total_amount").val(post_total_amount);			  	
			  }
			});
            var th=this;
            var qnt=parseInt($(th).parent().find('#qnty').val());
            var price=parseInt($(th).parent().siblings('#price').html());
            var cart_id=parseInt($(th).parent().siblings('#cart_id').val());
            var total=$(th).parent().siblings('#subtotal');
            if(qnt>0){
                var subtotal=qnt*price;
                total.html(subtotal);
            }
            $.ajax({
            url: "cart_session.php",
            method: "POST",
            data: { cart_id : cart_id ,qnt : qnt , flag : "update_cart"},
            success:function(data){
                $("#ordertotalamount").html(data);
                $("#post_total_amount").val(data);	
            }
            });
		}
	});
	</script>

     
    
</body>

</html>