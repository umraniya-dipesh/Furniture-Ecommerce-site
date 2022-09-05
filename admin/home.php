<?php
session_start();
require 'config.php';
if ($_SESSION['role'] != 'admin') {
    header("location:index.php");
}

$cn = new PDO("mysql:dbname=furnish", "root", "");
$rsc = $cn->query("select * from category");
$rsf = $cn->query("select * from sub_category");
$user = $cn->query("select * from customer");
$order_details = $cn->query("select * from orders_details");
$c = 0;
while ($rdc = $rsc->fetch()) {
    $c++;
}

$f = 0;
while ($rdf = $rsf->fetch()) {
    $f++;
}

$u = 0;
while ($user1 = $user->fetch()) {
    $u++;
}
$order = 0;
while ($oorder = $order_details->fetch()) {
    $order++;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home | Admin</title>
    <?php include_once 'include-css.php';?>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include_once 'sidebar.php';?>
        <div class="right_col" role="main" style="min-height: 700px">
          <br />
          <div class="row">
            <div role="main">
              <!-- top tiles -->
              <h1 style="color: black; font-size: 29px; text-align: center">
                Welcome to Admin Panel
              </h1>
              <hr />
              <div
                class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12"
              >

                <div class="widget">
                  <div class="r3_counter_box">
                  <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                  <div class="stats">
                    <h5>
                      <strong><?php echo $c; ?></strong>
                    </h5>
                    <span>Category</span>
                  </div>
                </div>

                </div>
              </div>
            </div>

            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="widget">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                    <div class="stats">
                      <h5>
                        <strong><?php echo $f; ?></strong>
                      </h5>
                      <span>Sub-Category</span>
                    </div>
                  </div>
              </div>
            </div>

            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="widget">
                <div class="r3_counter_box">
                  <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                  <div class="stats">
                    <h5>
                      <strong><?php echo $u; ?></strong>
                    </h5>
                    <span>Total Users</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="widget">
                <div class="r3_counter_box">
                  <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                  <div class="stats">
                    <h5>
                      <strong><?php echo $order; ?></strong>
                    </h5>
                    <span>Total Orders</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>




        <!-- <div id="top_x_div" style="width: 100%; height: 600px;"></div> -->
      </div>
    </div>
    <?php include_once 'footer.php';?>
  </body>
</html>
