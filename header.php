<?php
    include('config.php');
    if (isset($_SESSION['login_userid'])) {
        // count for wishlist
        $sql_wishlist = "SELECT COUNT(id) FROM `wishlist` WHERE cust_id='" . $_SESSION['login_userid'] . "'";
        $res_wishlist = mysqli_query($con, $sql_wishlist);
        $row_wishlist = mysqli_fetch_assoc($res_wishlist);
        // print_r($row);
        $count_wishlist = 0;
        foreach ($row_wishlist as $values) {
            $count_wishlist += $values;
        }
    } else {
        $count_wishlist = 0;
    }

?>
    <!-- sweet alert CDN link -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/LOGO_FINAL.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span><?php echo $count_wishlist; ?></span></a></li>
                <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i> Cart</a></li>
            </ul>
            <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
            <?php
                        if (isset($_SESSION['login_username'])) {?>
                      		<i class="fa fa-user"></i> Welcome <b><font color="#7fad39">
                      	<?=$_SESSION['login_username']?></font></b>
                           <a href="logout.php"id="logout_user" class="ajax_right"><i class="fa fa-sign-out mt-4" aria-hidden="true"></i>Log Out</a>
						<?php } else {?>
							<a href="./login_register.php"><i class="fa fa-user"></i> Login/Register</a>
						<?php }?>

            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li class=""><a href="./my_orders.php">My Orders</a></li>
                <li><a href="./shop-grid.php">Shop</a></li>
                <li><a href="./about_us.php">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <!-- <a href="#"><i class="fa fa-pinterest-p"></i></a> -->
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> furnish@gmail.com</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/LOGO_FINAL.png" alt="" height="50px" width="200px"></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?php echo (basename($_SERVER['PHP_SELF'])) == "index.php" ? "active" : "" ?>"><a href="./index.php">Home</a></li>

                            <li class="<?php echo (basename($_SERVER['PHP_SELF'])) == "shop-grid.php" ? "active" : "" ?>"><a href="./shop-grid.php">Shop</a></li>

                            <li class="<?php echo (basename($_SERVER['PHP_SELF'])) == "about_us.php" ? "active" : "" ?>"><a href="./about_us.php">About</a> </li>

                            <li class="<?php echo (basename($_SERVER['PHP_SELF'])) == "contact.php" ? "active" : "" ?>"><a href="./contact.php">Contact</a> </li>
                            <?php
if (isset($_SESSION['login_username'])) {?>
                      		<li><b> Welcome <font color="#7fad39">
                      	<?=$_SESSION['login_username']?></font></b>
                            <ul class="header__menu__dropdown">
                                <li><a href="my_orders.php">My orders</a></li>
                                <!-- <li><a href="#">Profile</a></li> -->
                            </ul>
                        </li>
                      		<li><a href="logout.php"id="logout_user" class="ajax_right">Log Out</a></li>
						<?php } else {?>
							 <li class="<?php echo (basename($_SERVER['PHP_SELF'])) == "login_register.php" ? "active" : "" ?>"><a href="./login_register.php"> Login/Sign Up</a></li>
						<?php }?>

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <div class="header__cart">
                        <ul>
                            <li><a href="./view_wishlist.php"><i class="fa fa-heart"></i> <span ><?php echo $count_wishlist; ?></span></a></li>
                            <li><div class="header__cart__price pr-2"><span> <a href="./shoping-cart.php">Cart</a>

                                </span></div><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span id="cart_counter"></span></a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
<script>
    function loadDoc() {
        setInterval(function(){
            var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cart_counter").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "counter.php", true);
        xhttp.send();
        },1000);
        
    }
    loadDoc();
</script>