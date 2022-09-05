<?php
    session_start();
    include('config.php');
    // echo $_SESSION['login_username'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="furnish furnitue" />
    <meta name="keywords" content="furnish, furnitue, creative, html" />
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
              <h2>About Us</h2>
              <div class="breadcrumb__option">
                <a href="./index.php">Home</a>
                <span>About Us</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- about us description start -->
    <div class="container shadow p-3 mb-5 mt-4 bg-white rounded">
      <p class="text-justify">
        <b>Furnish</b> has been bringing the latest designs & fashion to Indian
        homes. It offers the widest and best in class range in furniture, home
        furnishings, home improvement and more. It brings an enjoyable and
        hassle-free homemaking experience to all its valuable customers with
        varying lifestyles and preferences. We promise to facilitate our
        customers with a unique and personalized shopping experience. Our
        commitment to quality and timeless designs has helped us evolve over the
        years and it indeed fills us with pride to be the first choice of many.
      </p>
      <p class="text-justify">
        With a great spread that appeals to the globe-trotting, trendy yet very
        much Indian homemaker, Furnish is known to attract an array of lifestyle
        seeking customers. Being recognized as India’s biggest store in
        homemaking, renovation and decor, our products are exclusively designed
        while keeping durability and comfort at priority.The key differentiator
        between Furnish and others is the Design and Build offering of
        end-to-end interior decoration services, to customers who are interested
        in renovating & upgrading their homes. From classy sofas to chic dining
        sets , we offer everything to beautify your living space. We have
        maintained a strong web presence with prompt online services.
      </p>
    </div>
    <!-- about us description end -->

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
