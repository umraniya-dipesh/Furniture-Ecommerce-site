<?php
    include('config.php');
    // $rs=$con->query("select *from subcategory");
 print ($_GET['chkbox']);
 $id=$_GET['chkbox'];
  $rsc=$con->query("select *from product where p_id='$id'");
  $rdc=$rsc->fetch_assoc();
    // $con=mysqli_connect('localhost','root','');
    // $db=mysqli_select_db($con,'deluxfurniture');

    if(isset($_POST['updatebtn']))
    {
        $key=$_GET['chkbox'];
        $pname=$_POST['pname'];
        $price=$_POST['pprice'];
        $qnty=$_POST['pquantity'];
        $desc=$_POST['pdesc'];
        $dimension=$_POST['pdim'];
        $colour=$_POST['pcolour'];
        // $image=$_POST['pimage'];
       
           $sql="update product set p_name='$pname',p_price='$price',p_quantity='$qnty',p_description='$desc',p_colour='$colour',p_dimension='$dimension' where p_id='$key'";

            $res=mysqli_query($con,$sql);
            echo "<script type='text/javascript'>alert('Record Update');location.href='view_product.php';</script>";
       
     


        $extension = strtolower(pathinfo($_FILES["product_image"]["name"],PATHINFO_EXTENSION));
        $uploadOk = 1;
        
        // Check if image file is a actual image or fake image
       // var_dump($_FILES['product_image']);
        $check = getimagesize($_FILES["product_image"]["tmp_name"]);
        
        // if($check !== false) {
        //     $uploadOk = 1;
        //     if ($_FILES["product_image"]["size"] < 90000000) {
        //         if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "gif" ) {
        //                 $target_dir = "uploads/product/";
        //                 $img_name = basename($_FILES["product_image"]["name"]).time().".".$extension;
        //                 $target_file = $target_dir .$img_name ;

        //                 if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        //                     $uploadOk=1;
        //                     $image;
        //                     //datebase insert query
        //                     // $sql="insert into product(p_name,p_price,p_quantity,p_image,p_colour,p_description)values('".$pname."','".$price."','".$qnty."','".$img_name."','".$colour."','".$desc."')";
        //                     $sql="update product set p_name='$pname',p_price='$price',p_quantity='$qnty',p_description='$desc',p_colour='$colour',p_image='$img_name',p_dimension='$dimension' ";

        //                     $res=mysqli_query($con,$sql);
        //                     if(isset($res))
        //                     {
        //                          echo "<script type='text/javascript'>alert('Product Update');location.href='view_product.php';</script>";
        //                     }
        //                     else
        //                     {
        //                          echo "<script type='text/javascript'>alert('Product Not Update');</script>";
        //                     }
        //                 } else {
        //                     $message =  "Sorry, there was an error uploading your file.";
        //                     $uploadOk=0;
        //                 }
        //             }else{
        //                 $message =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //                 $uploadOk = 0;
        //             }
        //     }else{
        //         $message = "Sorry, your file is too large.";
        //         $uploadOk = 0;
        //     } 
            
        // } else {
        //     $message = "File is not an image.";
        //     $uploadOk = 0;
        //     // return false;
        // }
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
    <title>Update Product </title>
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
                                <h2>Update Product</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="add_product_form" method="POST" enctype="multipart/form-data"
                                    class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">Name
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="pname" name="pname"
                                                value='<?php echo $rdc["p_name"]; ?>'
                                                class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pprice">Price
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="pprice" name="pprice"
                                                value='<?php echo $rdc["p_price"]; ?>'
                                                class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pprice">Quantity
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="pquantity" name="pquantity"
                                                value='<?php echo $rdc["p_quantity"]; ?>'
                                                class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pdesc">Description
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="pdesc" name="pdesc"
                                                value='<?php echo $rdc["p_description"]; ?>'
                                                class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pdesc">Dimension
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="pdim" name="pdim"
                                                value='<?php echo $rdc["p_dimension"]; ?>'
                                                class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pcolour">colour
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="pcolour" name="pcolour"
                                                value='<?php echo $rdc["p_colour"]; ?>'
                                                class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Image</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <img height=60px width=100px src="uploads/product/<?php echo $rdc['p_image']?>" <img 
                                                src=<?php echo "uploads/product/$rdc[p_image];" ?>alt=img>
                                                <?php echo $rdc["p_image"]; ?>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <!-- <input type="file" id="product_image" class="col-md-7 col-xs-12" name="product_image" value=''> -->
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" id="updatebtn" name="updatebtn"
                                                class="btn btn-primary form-control">Update Product</button>
                                        </div>
                                    </div>
                                    <?php if(isset($message) && !empty($message)){
                                            echo "<p class='alert alert-danger'>".$message."</p>";
                                        }else if(isset($uploadOk) && $uploadOk==1){
                                            echo "<p class='alert alert-success'>file has been uploaded successfully.</p>";
                                        }
                                         ?>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>

    <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
    <!-- <script src="js/jquery.validate.min.js"></script> -->
    <script>
        $("#add_product_form").validate({
            rules: {
                pname: "required",
                pprice: "required",
                pquantity: "required",
                pdesc: "required",
                pcolour: "required",
            },
            messages: {
                pname: {
                    required: "Please Enter Product Name",
                },
                pprice: {
                    required: "Please Enter Price",
                },
                pquantity: {
                    required: "Please Enter Quantity",
                },
                pdesc: {
                    required: "Please Enter Description",
                },
                pcolour: {
                    required: "Please Enter colour",
                },
            }
        });
    </script>

</body>

</html>