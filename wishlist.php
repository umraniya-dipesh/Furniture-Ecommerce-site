<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
    session_start();
    include('config.php');
    if(!isset($_SESSION['login_userid'])){
        echo "
        <script>
            window.addEventListener('load', function () {
                swal({
                    title: 'You have to LOGIN first..',
                    icon: 'warning',
                    dangerMode: true,
                }).then(function () {
                window.location.href = 'login_register.php';
            })
            });
        </script>";
    }
    else{
        $c_id = $_SESSION['login_userid'];
        $p_id = $_GET['id'];
        // echo  $p_id; 
        // echo  $c_id; 
        // $sqlCheck = "INSERT into wishlist(user_id,product_id) VALUES ('$c_id','$p_id')";
        $sqlCheck = "SELECT * FROM wishlist where p_id= $p_id AND cust_id=$c_id";
        $result_check = mysqli_query($con,$sqlCheck);
        if (mysqli_num_rows($result_check) == 1) {
            echo "<script>
                window.addEventListener('load', function () {
                    swal({
                        title: 'Already added into wishlist',
                        icon: 'warning',
                        dangerMode: true,
                        timer:5000,
                    }).then(function () {
                        window.location.href ='view_wishlist.php';
                    })
                });
            </script>";

        } else {
            $insertWishist = "INSERT into wishlist(cust_id,p_id) VALUES ('$c_id','$p_id')";
            if (mysqli_query($con,$insertWishist)) {
                echo "<script>
                    window.addEventListener('load', function () {
                        swal({
                            title: 'Added to wishlist',
                            icon: 'success',
                            button: 'OK',
                        }).then(function () {
                        window.location.href = 'view_wishlist.php';
                    })
                    });
                </script>";

            }
        }
        
    }
?>