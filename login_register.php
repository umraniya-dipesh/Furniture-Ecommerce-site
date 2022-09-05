<?php
    session_start();
    include('config.php');

    //Define Name spaces
    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

    // Include required phpmailer files
    require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

    // for Login code
    if(isset($_POST["login"]))
	{
		$uname = $_POST["username"];
		$pass = md5($_POST["lpass"]);
		// echo $uname . $pass;
		$sql="select * FROM customer WHERE (uname='".$uname."' or email='".$uname."') and password='".$pass."'";
		$res=mysqli_query($con,$sql);
		$row = $res->fetch_array(MYSQLI_ASSOC);
		if(mysqli_num_rows($res)>0)
		{
				$_SESSION['login_userid']=$row['cust_id'];
				$_SESSION['login_username']=$row['uname'];
				// echo "<script type='text/javascript'>alert('Login Succesfully Done'); window.location.href = 'index.php'</script>";
				echo "<script>
                    window.addEventListener('load', function () {
                        swal({
                            title: 'Login Succesfully Done',
                            icon: 'success',
                            button: 'OK',
                            timer: 3000,
                        }).then(function () {
                            window.location.href = 'index.php';
                        })
                    });
                </script>";
		}
		else
		{
			// <!-- echo "<script type='text/javascript'>alert('Email or password is wrong.');</script>"; -->
			echo "<script>
                window.addEventListener('load', function () {
                    swal({
                        title: 'Email or password is wrong.',
                        icon: 'warning',
                        dangerMode: true,
                    })
                });
            </script>";
		}
	}

    // for Registration
    if (isset($_POST["register"])) {
        // echo "hello Demo button working properly";
        $uname=$_POST['uname'];
		$pass=md5($_POST['rpass']);
		$re_pass=$_POST['repass'];
		$email=$_POST['remail'];
		$contact=$_POST['rcontact'];
		$Address=$_POST['address'];
		$city=$_POST['city'];
		

		$sql="insert into customer(uname,password,email,contact,address,city) values ('".$uname."','".$pass."','".$email."','".$contact."','".$Address."','".$city."')";
		$res=mysqli_query($con,$sql);
		if(isset($res))
		{
            $sql="select * FROM customer WHERE (uname='".$uname."' or email='".$uname."') and password='".$pass."'";
            $res=mysqli_query($con,$sql);
            $row = $res->fetch_array(MYSQLI_ASSOC);
            if(mysqli_num_rows($res)>0)
            {
                    $_SESSION['login_userid']=$row['cust_id'];
                    $_SESSION['login_username']=$row['uname'];
                    
            }
            // $_SESSION['login_userid']=$row['cust_id'];
			// $_SESSION['login_username']=$uname;
            // echo $_SESSION['login_username'];
			
            // create instance of PHPmailer
            $mail = new PHPMailer(true);
            try {
                //set mailer to SMTP use
                $mail->isSMTP();
                //define smtp host
                $mail->Host = 'smtp.gmail.com'; 
                // Enable SMTP authentication
                $mail->SMTPAuth = true;
                // SMTP username                                  
                $mail->Username = 'furniish@gmail.com';  
                // SMTP password          
                $mail->Password = 'Furniish##';  
                // Enable TLS encryption, `ssl` also accepted
                $mail->SMTPSecure = 'tls';                              
                // TCP port to connect to
                $mail->Port = 587;   
                
                 //Recipients    
                 $mail->setFrom('furniish@gmail.com','Furnish Furniture');
                 //  set sender email
                 $mail->addAddress($email, $uname); 
                 $body = "<h3 style='color:#000;'>Welcome ".strtoupper($uname).".<br> Thank you for using our Furnish Furniture website.</h3>"; 
                 // Set email format to HTML
                 $mail->isHTML(true);   
                 $mail->Subject = 'Registration';
                // email body
                $mail->Body    = $body;
			    $mail->AltBody = strip_tags($body);
			    $message="Registration email has been sent Successfully";
			    $mail->send();          
                echo "<script type='text/javascript'>alert('Register Succesfully Done'); window.location.href = 'index.php'</script>";
                // echo "<script>
                //     window.addEventListener('load', function () {
                //         swal({
                //             title: 'Login Succesfully Done',
                //             icon: 'success',
                //             button: 'OK',
                //             timer: 3000,
                //         }).then(function () {
                //             window.location.href = 'index.php';
                //         })
                //     });
                // </script>";
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
            return false;
		}
		else
		{
			echo "<script type='text/javascript'>alert('Not Register. Try Again');</script>";	
			// echo "<script>
            //     window.addEventListener('load', function () {
            //         swal({
            //             title: 'Not Register. Try Again',
            //             icon: 'warning',
            //             dangerMode: true,
            //         })
            //     });
            // </script>";	
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
                        <h2>Login/Register</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Login/register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Login/register section Begin -->
    <div class="container shadow bg-light rounded">
        <div class="row mt-4 mb-4">
            <div class="col-md-6">
                <form class="loginbox form-horizontal" id="login_form" method="POST">
                    <p class="text-dark"><strong>
                            <h3>Login</h3>
                        </strong></p>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="inputEmail" name="username">
                            <font color="black">Username or email</font><span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="username" name="username" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="inputPassword" name="password">
                            <font color="black">Password</font><span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="password" name="lpass" id="lpass" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="site-btn" type="submit" name="login">Login</button>
                            <a href="./forgetpassword.php">
                                <font color="black">Forgot Password?</font>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <form class="loginbox form-horizontal" id="regiser_form" method="POST" name="regiser_form">
                    <p class="text-dark"><strong>
                            <h3>Register</h3>
                        </strong></p>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="inputEmail">
                            <font color="black">Username</font><span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" name="uname" id="uname" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="inputEmail">
                            <font color="black">Email</font><span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="email" id="remail" name="remail" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="inputPassword">
                            <font color="black">Password</font><span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="password" name="rpass" id="rpass" class="form-control shadow-none">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4" for="inputPassword">
                            <font color="black">Re-enter password</font><span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="password" id="repass" name="repass" class="form-control shadow-none">
                            <span id="messages"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="inputcontact">
                            <font color="black">Contact</font><span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="rcontact" name="rcontact" class="form-control shadow-none" 
                                maxlength="10" pattern="[0-9]{10}" required>
                            <!-- <span class="validate_contact"></span> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="inputaddress">
                            <font color="black">Address</font><span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="address" id="address">	</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" for="inputcity">
                            <font color="black">City</font><span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="city" name="city" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="site-btn" type="submit" name="register" id="register">Register</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Login/register section End -->

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
    <script src="js/jquery.validate.min.js"></script>
    <!-- <script src="js/jquery.min.js"></script> -->

    <!-- validation form -->
    <!-- <script>
        $(document).ready(function () {
            $('#rcontact').blur(function (e) {
                if (validatePhone('rcontact')) {
                    $('#validate_contact').html('');
                    $('#validate_contact').css('color', 'green');
                }
                else {
                    $('#validate_contact').html('Enter Valid Mobile Number');
                    $('#validate_contact').css('color', 'red');
                }
            });
        });

        function validatePhone(rcontact) {
            var a = document.getElementById(rcontact).value;
            var filter = /^[0-9-+]+$/;
            if (filter.test(a)) {
                return true;
            }
            else {
                return false;
            }
        }
    </script> -->

    <script>
        $("#login_form").validate({
            rules: {
                username: "required",
                lpass: "required",

            },
            messages: {
                username: {
                    required: "Please Enter username"
                },
                lpass: {
                    required: "Please Enter Password",
                },
            }
        });
    </script>

    <script>
        $(function () {
            $("#register").click(function () {
                var pass = $("#rpass").val();
                var rpass = $("#repass").val();
                if (pass != rpass) {
                    alert("Password Not Match.");
                    return false;
                }
                return true;
            })
        })
    </script>

    <script>
        $("#regiser_form").validate({
            rules: {
                uname: "required",
                rpass: "required",
                remail: "required",
                repass: "required",
                rcontact: "required",
                address: "required",
                city: "required",
            },
            messages: {
                uname: {
                    required: "Please Enter Username"
                },
                rpass: {
                    required: "Please Enter Password",
                },
                remail: {
                    required: "Please Enter Email",
                },
                repass: {
                    required: "Please Enter Re-password",
                },
                rcontact: {
                    required: "Please Enter Contact No.",
                },
                address: {
                    required: "Please Enter Address",
                },
                city: {
                    required: "Please Enter City",
                },
            }
        });
    </script>

</body>

</html>