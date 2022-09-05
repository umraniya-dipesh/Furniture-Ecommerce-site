<?php
session_start();
include 'config.php';
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
              include 'fetch_category.php';
            ?>
            <!-- fetch category  end-->

          </div>
        </div>
        <div class="col-lg-9">
          <div class="row">
            <?php
                $res = mysqli_query($con, "select * from product p,sub_category s where p.scategory_id=s.scategory_id and s.category_id='" . $_GET['id'] . "'");
                // $scq=";";
                while ($row = mysqli_fetch_array($res)) {
            ?>

            <div class="col-lg-4 col-md-6 col-sm-6 animated bounceIn">
              <div class="product__item">
                <div class="product__item__pic set-bg"
                  data-setbg="<?php echo 'admin/uploads/product/' . $row['p_image']; ?>">
                  <ul class="product__item__pic__hover">
                    <li>
                      <a href="wishlist.php?id=<?=$row['p_id']?>"><i class="fa fa-heart"></i></a>
                    </li>
                    <li>
                      <a href="shop-details.php?id=<?=$row['p_id']?>"><i class="fa fa-eye"
                          aria-hidden="true"></i></i></a>
                    </li>
                  </ul>
                </div>
                <div class="product__item__text">
                  <h6><a href="shop-details.php?id=<?=$row['p_id']?>">
                      <?php echo $row['p_name']; ?>
                    </a></h6>
                  <h6><a href="shop-details.php?id=<?=$row['p_id']?>">
                      <?php echo $row['scategory_name']; ?>
                    </a></h6>
                  <h5>
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
      </div>
    </div>
  </section>
  <!-- Hero Section End -->



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