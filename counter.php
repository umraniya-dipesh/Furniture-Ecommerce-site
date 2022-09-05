<?php
session_start();
include 'config.php';
if (isset($_SESSION['login_userid'])) {
    $sql = "SELECT COUNT(cart_id) FROM `cart` WHERE cust_id='" . $_SESSION['login_userid'] . "'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    // print_r($row);
    $tt = 0;
    foreach ($row as $value) {
        $tt += $value;
    }
    echo $tt;
} else {
    echo $tt = 0;
}
