<?php
    include('config.php');
    if(isset($_POST['sub']))
    {
       
       $cname=$_POST['cname'];

       $sql="INSERT INTO category(category_name) VALUES ('".$cname."')";
       $res=mysqli_query($con,$sql);

       if(isset($res))
       {
            echo "<script type='text/javascript'>alert('Category Inserted');</script>";
       }
       else
       {
            echo "<script type='text/javascript'>alert('Category Not Inserted');</script>";
       }  
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | Add Category </title>
        <?php include_once 'include-css.php';?>
    </head>
     <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php include_once 'sidebar.php';?>
                
                <div class="right_col" role="main">
                <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Category</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="add_category_form"  method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" > 
                                   
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cname">Name
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="cname"  name="cname"  class="form-control col-md-7 col-xs-12" required>
                                            </div>  
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" id="submit_btn" name="sub" class="btn btn-primary form-control">Submit</button>
                                            </div>
                                        </div>
                                    </form>                                
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
             </div>
         </div>
  <?php include('footer.php') ?>
   </body>
</html> 