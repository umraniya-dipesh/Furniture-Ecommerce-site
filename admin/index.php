<?php
	session_start();
    $_SESSION['role']='admin';

    include('config.php');
	// $con = mysqli_connect('localhost','root','');
	// $db = mysqli_select_db($con,'deluxfurniture');
	if(isset($_POST["login_button"]))
	{
		$uname = $_POST["username"];
		$pass = md5($_POST["password"]);
        $_SESSION['username']=$uname;
        //echo $_SESSION['role'];
       //echo $_SESSION['username'];
		// echo $uname;
		// echo $pass;
		$sql="select a_name,a_password FROM admin WHERE a_name='".$uname."' AND a_password='".$pass."'";
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0)
		{
				header('location:home.php');
		
		}
		else
		{
			$error="username and password is incorrect....";
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
        <title>Admin Login | Furniture Ecommerce site</title>
        <?php include_once 'include-css.php';?>
    </head>
    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                    	 <div>
								<!-- <img src="images/l2.png"  height="60px" width="80px"><b><font face="lemon" color="Black" size="4px">&nbsp Delux Furniture</font></b> -->
                                <a href="./index.php"><img src="./images/LOGO_FINAL.png" alt="" height="100px" width="200px"></a>
                         </div>
                        <form method ="POST"  id ="login_form">
                            <h1>Admin Login </h1>
                            <div>
                                <input type="text"  id="username" name='username' class="form-control" placeholder="Username" />
                            </div>
                            <div>
                                <input type="password" id="password" name='password' class="form-control" placeholder="Password" />
                            </div>
                            <?php 
                            	if(isset($error) && !empty($error))
                            	{
                            		echo "<p class='alert alert-danger'>".$error."</p>";
                            	}
                            ?>
                            <div>
                                <input type ="submit" id="login_button" name="login_button" class="btn btn-primary submit" value="Log in">
                                <a class="reset_pass" href="forgot-password.php">Forgot password?</a>
                            </div>
							<div class="clearfix"></div>
							<div style ="display:none;" id="result"></div>
                            <div class="separator">
                                <div class="clearfix"></div>
                                <br/>
								 <div>
                                    <p>©2020 All Rights Reserved. Furnish.</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
	<script>
$( "#login_form" ).validate({
  rules: {
	username: "required",
    password: "required",
  },
  messages:{
	  username: {
      required: "Please Enter username"
    },
	password: {
      required: "Please password",
	  
    },
  }
});
</script>
</body>
</html>