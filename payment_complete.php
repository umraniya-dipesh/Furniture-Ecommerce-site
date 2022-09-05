    <!-- sweet alert CDN link -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

session_start();

// echo $_SESSION['total'];
// echo $_SESSION['transaction_id'];
include 'config.php';
include 'cartdb.php';
echo "<br>";
// echo "<h4> Thank You for Shopping....</h4>";
// echo "<pre>";
// print_r($_REQUEST);
echo "<br>";


// echo "<a href='index.php'>Continuee Shopping...</a>";

if (isset($_SESSION['login_userid'])) {
    $cart = fetch_cart($_SESSION['login_userid']);
    $cart = json_decode($cart, 1);
    // print_r($cart);
    $tran_sql="insert into transaction(cust_id,txn_id,payment_id,status,amount) values('".$_SESSION['login_userid']."','".$_REQUEST['payment_id']."','".$_REQUEST['payment_request_id']."','".$_REQUEST['payment_status']."','".$_SESSION['total']."')";
    // print_r($tran_sql);
    $tran_res=mysqli_query($con,$tran_sql);
    // echo "<br>ROW data <br>";
   $i = 0;
    foreach ($cart as $row) {
        $data_count = count($row);
        // echo $data_count;
        while ($i < $data_count){
            $sql = "insert into orders_details (cust_id,p_id,price,quantity,transaction_id) values('" . @$row[$i]['cust_id'] . "','" . @$row[$i]['p_id'] . "','" . @$row[$i]['p_price'] . "','" . @$row[$i]['quantity'] . "','" . $_SESSION['transaction_id'] . "')";
            // echo $sql;
             $res=mysqli_query($con,$sql);
        $cart_rm="delete from cart where cart_id=".@$row[$i]['cart_id'];
        $cart_rm_res=mysqli_query($con,$cart_rm);
            // print_r( $row);
            $i++;
        }
       
        // echo "<script>window.location.href='index.php'</script>";
        echo "<script>
        window.addEventListener('load', function () {
            swal({
                title: 'Thank You For Shopping..',
                icon: 'success',
                button: 'OK',
                timer: 3000,
            }).then(function () {
                window.location.href = 'index.php';
            })
        });
    </script>";
        exit;
       
    }
} else {
    $cart = cart_fetch_session();
    $cart = json_decode($cart, 1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

     <script>
            
                 // The URL that will be redirected too.
           
        </script>

</body>
</html>




