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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <a href="./shoping-cart.php">Shopping Cart</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div> -->
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <!-- id="billing_form" -->
                <form action="pay.php" method="POST" >
               
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="fname" id="fname">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text">
                            </div> -->
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="address" id="address">
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city" id="city">
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" name="state" id="state">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="pin" id="pin" maxlength="6">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" maxlength="10" name="contact" id="contact">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" id="email">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div> -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                
                                <div class="checkout__order__products">Products  <span >Total</span></div>
                                <?php

                                    if ($cart['is_null'] == false) {
                                    foreach ($cart['cart'] as $row) {
                                        $totalamount = intval($row['total']) + $totalamount;
                                        ?>
                                <ul>
                                <input type="hidden" id="p_id" name="p_id" value="<?=$row['p_id']?>">
                                <input type="hidden" id="p_name" name="p_name" value="<?=$row['p_name']?>">
                                    <li><?= print_r($row['p_name']);?> <span ><?=$row['total']?></span></li>
                                    <!-- <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li> -->
                                </ul>
                                <!-- hidden field passed to pay.php -->
                                <input type="hidden" id="cart_id" value="<?=$row['cart_id']?>">
                                
                                
                                <input type="hidden" size="1" value="<?=$totalamount?>" name="amount" id="post_total_amount">
                                <input type="hidden" name="firstname" value="<?=$_SESSION['login_username']?>">
                                <input type="hidden" name="user_id" value="<?=$_SESSION['login_userid']?>">
                                <!-- <input type="hidden" name="email" value="umraniyadipeshk@gmail.com"> -->
                                <input type="hidden" name="phone" value="9979880672">
                                <!-- hidden field  ended -->
                                <?php
                                        }
                                    }
                                ?>
                                <div class="checkout__order__subtotal">Subtotal <span><?=$totalamount?></span></div>
                                <div class="checkout__order__total">Total <span><?=$totalamount?></span></div>
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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
    <script src="js/jquery.validate.min.js"></script>
    <!-- <script src="js/jquery.min.js"></script> -->

    <!-- validation form -->
    <script>
		$( "#billing_form" ).validate({
		  rules: {
			fname: "required",
		    address: "required",
		    city: "required",
		    state: "required",
		    pin: "required",
		    contact: "required",
		    email: "required",
        
		  },
		  messages:{
            fname: {
		      required: "Please Enter Full Name"
		    },
			address: {
		      required: "Please Fill Address", 
		    },
            city: {
		      required: "Please Fill City",
		    },
            state: {
		      required: "Please Fill state", 
		    },
            pin: {
		      required: "Please Fill PIN/ZIP code",  
		    },
            contact: {
		      required: "Please Fill Contact Number", 
		    },	 
            email: {
		      required: "Please Fill Email Address", 
		    },	    
		  }
		});
	</script>


</body>

</html>