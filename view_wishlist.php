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
                        <h2 > My Wishlist</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Wishlist</span>
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
                                    <th class="image">Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                        <?php 
                            if(isset($_SESSION['login_userid'])){

                           
                             $c_id = $_SESSION['login_userid'];
                             $sql ="select * from wishlist JOIN product on product.p_id=wishlist.p_id and wishlist.cust_id='".$_SESSION['login_userid']."'";
                            // $sql="select * from wishlist w,customer c, product p where w.cust_id=c.cust_id and w.cust_id='".$_SESSION["login_userid"]."'";
                             $res=mysqli_query($con,$sql);

                             if (mysqli_num_rows($res)>0) {
                                 while($row=mysqli_fetch_assoc($res)){
                            
                        ?>
                        <tr>
                            <td class="image">
                                <a href="shop-details.php?id=<?=$row['p_id']?>" style="color: black;"><img alt="IMAGE" src="<?php echo'./admin/uploads/product/'.$row['p_image']; ?>" height="100px" width="100px"></a>
                                    
                            </td>
                            
                            <td class="name" >
                                <a href="shop-details.php?id=<?=$row['p_id']?>" style="color: black;"><?= print_r($row['p_name']); ?></a>
                                
                            </td>
                            <td id="price"><?=$row['p_price']?></td>
                           
                           
                            <td> <a href="wishlist_delete.php?pid=<?php echo $row["p_id"]?>&cid=<?php echo $_SESSION['login_userid']?>" style="color: black;"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php 
                                } 
                            }
                        }
                        ?>
                        </tbody>
                        </table>
                        	
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

    
</body>

</html>