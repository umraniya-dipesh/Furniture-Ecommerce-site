<?php
    session_start();
    include('config.php');
    // echo $_SESSION['login_username'];
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
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories animated flipInY">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <!-- fetch category  begin-->
                        <?php
                            include('fetch_category.php');
                        ?>
                        <!-- fetch category  end-->

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="search.php" method="GET">
                                <div class="hero__search__categories">
                                    All Categories
                                    <!-- <span class="arrow_carrot-down"></span> -->
                                </div>
                                <input type="text" name="search_text" placeholder="What do yo u need?">
                                <button type="submit" name="btn_search" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                   

                    <div id="myslider" class="carousel slide animated zoomIn" data-ride="carousel">
                        <?php
                            $slider_result= $con->query("select * from slider");
                        ?>
                        <ul class="carousel-indicators">
                            <?php
                                $i=0;
                                foreach($slider_result as $row_slider){
                                    $actives='';
                                    if ($i==0) {
                                       $actives='active';
                                    }
                                
                            ?>
                            <li data-target="#myslider" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
                            <?php
                                $i++; }
                            ?>
                        </ul>
                        <div class="carousel-inner">
                        <?php
                                $i=0;
                                foreach($slider_result as $row_slider){
                                    $actives='';
                                    if ($i==0) {
                                       $actives='active';
                                    }
                                
                            ?>
                            <div class="carousel-item <?= $actives; ?>">
                                <img src="./admin/uploads/product/<?=$row_slider['slider_image']; ?>" alt="furniture" width="100%" height="410">
                                <div class="carousel-caption animated zoomIn">
                                    <h2 class="h2Slider"><?= $row_slider['slider_title']; ?></h2><br>
                                    <a href="shop-grid.php" class="primary-btn">SHOP NOW</a>
                                </div>
                            </div>
                            <?php
                                $i++; }
                            ?>
                        </div>
                        <a class="carousel-control-prev" href="#myslider" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#myslider" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php
                        $ress=mysqli_query($con,"SELECT * FROM `product` LIMIT 6;");
                        while($roww=mysqli_fetch_array($ress))
                        {
                    ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg"
                            data-setbg="<?php echo './admin/uploads/product/'.$roww['p_image']; ?>">
                            <h5><a href="shop-details.php?id=<?=$roww['p_id']?>">
                                    <?php echo $roww['short_name'];?>
                                </a></h5>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Shop By Categories</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <!-- <li class="active" data-filter="*">All</li>
                            <li data-filter=".bed">Bed</li>
                            <li data-filter=".chair">Chair</li>
                            <li data-filter=".sofa">Sofa</li>
                            <li data-filter=".table">Table</li> -->
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".sofa">Sofas</li>
                            <li data-filter=".chair">Chair</li>
                            <li data-filter=".recliners">Recliners</li>
                            <li data-filter=".dinning">Dining Sets</li>
                            <li data-filter=".bed">Beds</li>
							<li data-filter=".fastfood">Wardorbes</li>
							<li data-filter=".book">Book Shelves</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter ">
                <?php
                    $res=mysqli_query($con,"select * from product where p_name LIKE '%bed%'");
                    while($row=mysqli_fetch_array($res))
                    {
			    ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix bed">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="<?php echo './admin/uploads/product/'.$row['p_image']; ?>">
                            <ul class="featured__item__pic__hover">
                                <li> <a href="wishlist.php?id=<?=$row['p_id']?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="shop-details.php?id=<?=$row['p_id']?>"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?=$row['p_id']?>">
                                    <?php echo $row['p_name'];?>
                                </a></h6>
                            <h5>RS
                                <?php echo $row['p_price']; ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php
				  }
			    ?>

                <?php
                    $res=mysqli_query($con,"select * from product where p_name LIKE '%chair%'");
                    
                    while($row=mysqli_fetch_array($res))
                    {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix chair">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="<?php echo './admin/uploads/product/'.$row['p_image']; ?>">
                            <ul class="featured__item__pic__hover">
                                <li> <a href="wishlist.php?id=<?=$row['p_id']?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="shop-details.php?id=<?=$row['p_id']?>"><i class="fa fa-eye"
                                            aria-hidden="true"></i></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?=$row['p_id']?>">
                                    <?php echo $row['p_name'];?>
                                </a></h6>
                            <h5>RS
                                <?php echo $row['p_price']; ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php
                  }
                ?>

                <?php
                    $res=mysqli_query($con,"select * from product where p_name LIKE '%sofa%'");
                    
                    while($row=mysqli_fetch_array($res))
                    {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix sofa">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="<?php echo './admin/uploads/product/'.$row['p_image']; ?>">
                            <ul class="featured__item__pic__hover">
                                <li> <a href="wishlist.php?id=<?=$row['p_id']?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="shop-details.php?id=<?=$row['p_id']?>"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?=$row['p_id']?>">
                                    <?php echo $row['p_name'];?>
                                </a></h6>
                            <h5>RS
                                <?php echo $row['p_price']; ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php
                  }
                ?>

                <?php
                    $res=mysqli_query($con,"select * from product where p_name LIKE '%table%'");
                    
                    while($row=mysqli_fetch_array($res))
                    {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix table">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="<?php echo './admin/uploads/product/'.$row['p_image']; ?>">
                            <ul class="featured__item__pic__hover">
                                <li> <a href="wishlist.php?id=<?=$row['p_id']?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="shop-details.php?id=<?=$row['p_id']?>"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?=$row['p_id']?>">
                                    <?php echo $row['p_name'];?>
                                </a></h6>
                            <h5>RS
                                <?php echo $row['p_price']; ?>
                            </h5>
                        </div>
                    </div>
                </div>

                <?php
                  }
                ?>


            </div>
        </div>
    </section>
    <!-- Featured Section End -->



    <!-- Latest Product Section Begin -->
    <!-- <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Sofa</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/sofa1.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/sofa_mast.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/sofa2.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/sofa3.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/chair1.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/chair2.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/diningTable2.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/diningTable1.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/5.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/sofa2.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/diningTable3.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section> -->
    <!-- Latest Product Section End -->


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