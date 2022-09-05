<?php
include('config.php');
require_once("cart_session.php");
require_once("cartdb.php");


$result=mysqli_query($con,"select * from product where `p_id`=".$_GET['id']);
$rows=mysqli_fetch_assoc($result);
  

    $baseUrl = "http://localhost/Furnish/shop-details.php?id=";
    $slug=$rows['p_id'];
    $title=$rows['p_name'];
    $tags=$rows['p_description'];
    $fimage='./admin/uploads/product/'.$rows['p_image'];
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="furnish furnitue,">
    <meta name="keywords" content="furnish, furnitue, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- sharing on social media Start-->
     <meta property="og:title" content="<?php echo $title; ?>">
     <meta property="og:description" content="<?php echo $tags; ?>">
    <meta property="og:image" content="<?php echo $fimage; ?>">
    <meta property="og:url" content="<?php echo $baseUrl.$slug;?>">
    <meta property="og:site_name" content="Furnish Furniture">
    <!-- sharing on social media end -->
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
    <link rel="stylesheet" href="admin/css/animate.min.css" type="text/css">
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
                        <h2>Product Details</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <!-- <a href="#">Product Details</a> -->
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row product-info">
          
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="./admin/uploads/product/<?php echo $rows["p_image"] ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="./admin/uploads/product/<?php echo $rows["p_image"] ?>"
                                src="./admin/uploads/product/<?php echo $rows["p_image"] ?>" alt="">
                            <!-- <img data-imgbigurl="img/3.jpg"
                                src="img/3.jpg" alt="">
                            <img data-imgbigurl="img/4.jpg"
                                src="img/4.jpg" alt=""> -->
                            <!-- <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="img/product/details/thumb-4.jpg" alt=""> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="hidden" id="p_id" value="<?=$rows['p_id']?>">
					<input type="hidden" id="p_image" value="<?=$rows['p_image']?>">
					<input type="hidden" id="p_name" value="<?=$rows['p_name']?>">
                    <div class="product__details__text">
                        <h3><?php echo $rows['p_name'] ?></h3>
                        <!-- <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div> -->
                        Price <del><span class="strike"><?=intval($rows['p_price'])+200?></span></del>
                        <div class="product__details__price">Rs <?php echo $rows['p_price'] ?></div>
                        <p><?php echo $rows['p_description'] ?></p>
                        <!-- <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                        <!-- checking start -->
                        <?php
					
						$flag=0;
						if(isset($_SESSION['login_userid'])){
								$cart_details=fetch_cart($_SESSION['login_userid'],$_GET['id']);
								$cart_details=json_decode($cart_details,1);
								if($cart_details['is_null']==false){
									foreach ($cart_details['cart'] as $row) {
										if($row['p_id']==$_GET['id']){
											$flag=1;
										}
									}
								}
							}
							else{
								$cart_details=cart_fetch_session();
								$cart_details=json_decode($cart_details,1);
								if($cart_details['is_null']==false){
									foreach ($cart_details['cart'] as $row) {
										if($row['p_id']==$_GET['id']){
											$flag=1;
										}
									}
								}
							}
						if($flag==0){
					?>
					<form class="form-inline" id="addcart">
						<input type="hidden" name="p_price" value="<?=$rows['p_price']?>">
                        <?php
                           if ($rows['p_quantity']>0) {
                        ?>
						<button class="btn  primary-btn animated pulse" id="addToCart" class="addToCart" type="button">Add to Cart</button> &nbsp
						<label><b> Qty : &nbsp</b></label> <input type="number" id="qty" placeholder="1" class="" min="1" max="<?php echo $rows['p_quantity'];?>" maxlength="">
                        <a href="wishlist.php?id=<?=$rows['p_id']?>" class="heart-icon" style="margin-left: 20px; margin-right: 20px;"><span class="icon_heart_alt"></span></a>
                        <?php
                           }
                           else{
                            echo "<img src='./img/out-of-stock.png' alt='Out Of Stock' height='140px'>";
                            
                           }
                        ?>
					</form>
					<?php }else{ ?>
					<form class="form-inline">
						<a class="btn btn-primary primary-btn" href="./shoping-cart.php">Go to Cart</a>
                        <a href="wishlist.php?id=<?=$rows['p_id']?>" class="heart-icon" style="margin-left: 20px; margin-right: 20px;"><span class="icon_heart_alt"></span></a>
					</form>
					<?php }  ?>
                        <!-- checking end -->
                        <ul>
                            <li><b>Colour</b> <span><?php echo $rows['p_colour'] ?></span></li>
                            <li><b>Dimensions</b> <span><?php echo $rows['p_dimension'] ?></span></li>
                           
                            <?php
                                if ($rows['p_quantity']==0) {
                                    echo "<li><b>Availability</b> <span class=' text-danger font-weight-bold' >Out of Stock</span></li>";
                                }
                                else{
                                    echo "<li><b>Availability</b> <span>In Stock</span></li>";
                                }
                            ?>
                            

                            <li><b>Share on</b>
                            
                                <div class="share">
                                    <a href="https://www.facebook.com/sharer.php?u=<?php echo $baseUrl.$slug;?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.twitter.com/share?text=<?php echo $title;?>&url=<?php echo $baseUrl.$slug;?> &hashtags=<?php echo $tags;?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/sharer.php?u=<?php echo $baseUrl.$slug;?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                    <a href="https://www.pinterest.com/pin/create/button/?&url=<?php echo $baseUrl.$slug;?>" target="_blank"><i class="fa fa-pinterest"></i></a>  <a href="https://api.whatsapp.com/send?phone=&text=<?php urlencode($baseUrl)?><?php echo $baseUrl.$slug;?> " target="_blank"><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
               </div>
           </div>
       </section>

       

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

    <script>
//Add Product To Carts
$(document).on('click','#addToCart',function (e){
	e.preventDefault();
	var p_id=$(".product-info #p_id").val();
	var p_image=$(".product-info #p_image").val();
	var p_name=$(".product-info #p_name").val();
	var p_price=$( "form input:hidden" ).val();
	var qty=$( "form #qty" ).val();

	$.ajax({
	  url: "cart_session.php",
	  method: "POST",
	  data: { id : p_id ,name : p_name ,price : p_price , p_image : p_image ,qty : qty , flag : "addtocart"},
	  success:function(data){
	  	var html='<a class="btn primary-btn" href="./shoping-cart.php">Go to Cart</a>';
	  	console.log(data);
	  	$( "form label" ).remove();
	  	$( "form #qty" ).remove();
	  	$( "#addcart" ).append(html);
	  	$( "form #addToCart" ).remove();
	  }
	});
});
</script>

</body>

</html>