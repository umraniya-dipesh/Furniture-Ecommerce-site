<?php
	include('config.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	if(isset($_POST['btn']))
	{
		$email=$_POST['inputEmail'];
		$sql=mysqli_query($con,"select * from customer where email='{$email}'");
		$count=mysqli_num_rows($sql);
		$row=mysqli_fetch_array($sql);
		if($count>0)
		{
			$mail = new PHPMailer(true);                                          
            // Passing `true` enables exceptions
			try { 
			    
			    $mail->isSMTP();                                              
                // Set mailer to use SMTP
			    $mail->Host = 'smtp.gmail.com';                              
                // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                                     
                // Enable SMTP authentication
			    // SMTP username                                  
                $mail->Username = 'furniish@gmail.com';  
                // SMTP password          
                $mail->Password = 'Furniish##';  
			    $mail->SMTPSecure = 'tls';                               
                // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 587;                                      
                // TCP port to connect to
			 
			    //Recipients    
                $mail->setFrom('furniish@gmail.com','Furnish Furniture');
			    $mail->addAddress($email,$email);     
                // Add a recipient
			    $body = "<h2> Hi $email <br> Your Password is {$row['password']}.</h3>"; 
			    //$body = "<h3>Your Password is '".$res."'</h3>"; 
			    $mail->isHTML(true);             // Set email format to HTML
			    $mail->Subject = 'Forget Password';
			    $mail->Body    = $body;
			    $mail->AltBody = strip_tags($body);
			    $message="your Password has been sent  Successfully";
			    $mail->send();
			    echo "<script type='text/javascript'>alert('Your password has been sent on your EMAIL ID Now Login .');window.location.href='login_register.php'</script>";
			    
				}
				catch (Exception $e) {
				    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}
				return false;
			//echo $row['password'];
		}
		else
		{
			echo "<script type='text/javascript'>alert('Email Not Found.');</script>";
		}
		
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="furnish furnitue,">
    <meta name="keywords" content="furnish, furnitue, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Furnish | Forget Password</title>

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
                        <h2>Forget Password</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Forget Password</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Foreget Password Form start -->
    <div class="container spad">
        <div class="row bg-light">
		    <div class="col-md-12">
				<p class="forgotten-password pl-3">Enter the e-mail address associated with your account. Click submit to have your password e-mailed to you.</p>
				<div class="forgotten">
					<form name="forget_pswd" method="POST" class="form-horizontal">
						<div class="form-group">
						<label class="control-label col-md-4 " for="inputEmail"><font color="black"><h4 class="text-dark">E-mail Address</h4>  </font></label>
							<div class="col-md-8">
								<input type="email" id="inputEmail" name="inputEmail" placeholder="Email" class="form-control shadow-none">
							</div>
						</div>
					
						<p class="pl-3">
						<button class="btn primary-btn" type="submin" name="btn" id="btn">Continue</button>
						</p>
					</form>
				</div>
			</div>
		</div>
    </div>
    
    <!-- Foreget Password Form End -->

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