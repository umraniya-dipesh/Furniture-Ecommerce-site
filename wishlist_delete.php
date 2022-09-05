<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
session_start();
include 'config.php';
if (!isset($_SESSION['login_userid'])) {
    echo "<script type='text/javascript'>alert('You have to LOGIN first..');window.location.href='login_register.php'</script>";
    // header('location:login_register.php');
} else {
    $c_id = $_SESSION['login_userid'];
    $p_id = $_GET['pid'];

    $deltWishist = "DELETE FROM wishlist where p_id='$p_id' and cust_id='$c_id'";
    if (mysqli_query($con, $deltWishist)) {
        // echo "<script type='text/javascript'>alert('Delete from wislist');window.location.href='view_wishlist.php'</script>";
        echo "<script>
        window.addEventListener('load', function () {
            swal({
                title: 'Deleted from wishlist',
                icon: 'success',
                button: 'OK',
                timer: 3000,
            }).then(function () {
            window.location.href = 'view_wishlist.php';
        })
        });
    </script>";
    }

}
