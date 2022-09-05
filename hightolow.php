<?php
    session_start();
    include('config.php');
    // echo $_SESSION['login_username'];
?>
<?php
  include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="furnish furnitue,">
    <meta name="keywords" content="furnish, furnitue, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Furnish</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
      rel="stylesheet"
    />

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="admin/css/animate.min.css" type="text/css">
  </head>

  <body>
    <!-- Header Section Begin -->
      <?php include 'header.php';?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="hero__categories">
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
                  <input type="text" name="search_text" placeholder="What do yo u need?" />
                  <button type="submit" name="btn_search" class="site-btn">SEARCH</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
      <div class="container">
        <div class="row">
          <!-- <div class="col-lg-3 col-md-5">
            <div class="sidebar">
              <div class="sidebar__item">
                <div class="filter_material">
                    <h4>Material</h4>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="mtr1" name="mtr1">
                        <label class="custom-control-label" for="mtr1">Fabric</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="mtr2" name="mtr2">
                        <label class="custom-control-label" for="mtr2">Leatherette</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="mtr3" name="mtr3">
                        <label class="custom-control-label" for="mtr3">Velvet</label>
                    </div>
                </div>
              </div>
              <div class="sidebar__item">
                <h4>Price</h4>
                <div class="price-range-wrap">
                <?php
                  
                  $result=mysqli_query($con,"select MAX(p_price) from product");
                  while($row = mysqli_fetch_array($result))
                  {
                ?>
               
                  <div
                    class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                    data-min="100"
                    data-max="<?php  echo $row['MAX(p_price)'] ?>"
                  >
                  
                    <div
                      class="ui-slider-range ui-corner-all ui-widget-header"
                    ></div>
                    <span
                      tabindex="0"
                      class="ui-slider-handle ui-corner-all ui-state-default"
                    ></span>
                    <span
                      tabindex="0"
                      class="ui-slider-handle ui-corner-all ui-state-default"
                    ></span>
                  </div>
                  <div class="range-slider">
                    <div class="price-input">
                      <input type="text" id="minamount" />
                      <input type="text" id="maxamount" />
                    </div>
                  </div>
                   <?php
                       }
                  ?>
                </div>

              </div>

              <div class="sidebar__item sidebar__item__color--option">
                <h4>Colors</h4>
                <div class="sidebar__item__color sidebar__item__color--white">
                  <label for="white">
                    White
                    <input type="radio" id="white" />
                  </label>
                </div>
                <div class="sidebar__item__color sidebar__item__color--gray">
                  <label for="gray">
                    Gray
                    <input type="radio" id="gray" />
                  </label>
                </div>
                <div class="sidebar__item__color sidebar__item__color--red">
                  <label for="red">
                    Red
                    <input type="radio" id="red" />
                  </label>
                </div>
                <div class="sidebar__item__color sidebar__item__color--black">
                  <label for="black">
                    Black
                    <input type="radio" id="black" />
                  </label>
                </div>
                <div class="sidebar__item__color sidebar__item__color--blue">
                  <label for="blue">
                    Blue
                    <input type="radio" id="blue" />
                  </label>
                </div>
                <div class="sidebar__item__color sidebar__item__color--green">
                  <label for="green">
                    Green
                    <input type="radio" id="green" />
                  </label>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-lg-9 col-md-7"> -->
          <div class="col-lg-12 col-md-12">
            <div class="filter__item">
              <div class="row">
                <div class="col-lg-4 col-md-5">
                  <div class="filter__sort">
                    <span>Sort By</span>
                    <select onchange="location = this.value;">
                      <option value="hightolow.php">High to Low</option>
                      <option value="lowtohigh.php" >Low to High</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="filter__found">
                  <?php
                    
                    $sql="select p_id from product ORDER BY p_id";
                    $res=mysqli_query($con,$sql);
                    $row=mysqli_num_rows($res);
                  ?>
                    <h6><span><?php echo $row; ?></span> Products found</h6>
                  </div>
                </div>
                <div class="col-lg-4 col-md-3">
                  <div class="filter__option">
                    <span class="icon_grid-2x2"></span>
                    <span class="icon_ul"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
            <?php
               $res=mysqli_query($con,"select * from product order by p_price DESC");
                
                while($row=mysqli_fetch_array($res))
                  {
			      ?>
              <div class="col-lg-3 col-md-6 col-sm-6 animated bounceIn">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="<?php echo './admin/uploads/product/'.$row['p_image']; ?>"
                  >
                    <ul class="product__item__pic__hover">
                      <li>
                        <a href="wishlist.php?id=<?=$row['p_id']?>"><i class="fa fa-heart"></i></a>
                      </li>
                      <li><a href="shop-details.php?id=<?=$row['p_id']?>"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                      <!-- <li>
                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                      </li> -->
                    </ul>
                  </div>
                  <div class="product__item__text">
                    <h6><a href="shop-details.php?id=<?=$row['p_id']?>"><?php echo $row['p_name']; ?></a></h6>
                    <h5>RS <?php echo $row['p_price']; ?></h5>
                  </div>
                </div>
              </div>
           
        <?php
				  }
			  ?>
            </div>
            <div class="product__pagination">
              <a href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#"><i class="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Product Section End -->

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
