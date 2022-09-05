<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
session_start();
if (isset($_SESSION['login_username'])) {
    // session_destroy();
    unset($_SESSION['login_userid'],$_SESSION['login_username']);
    // echo "<script>alert('You Logged Out Successfully!..');window.location='index.php';</script>";
    echo "<script>
        window.addEventListener('load', function () {
            swal({
                title: 'You Logged Out Successfully!..',
                icon: 'success',
                button: 'OK',
                timer: 3000,
            }).then(function () {
                window.location.href = 'index.php';
            })
        });
    </script>";
}

?>