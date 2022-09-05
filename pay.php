<?php
    session_start();
    include('config.php');
    include('cartdb.php');
    $product_id=$_POST['p_id'];
    $product_name=$_POST['p_name'];
    $total=$_POST['amount'];
    $user_id=$_POST['user_id'];
    $user_name=$_POST['firstname'];
    $billing_name=$_POST['fname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $_SESSION['total']=$total;
    // echo $email."<br>Mobile no :- ".$contact."<br> product id:- ".$product_id."<br> user ID:-".$user_id."<br> User Name :- ".$user_name."<br> Product Name :- ".$product_name."<br> Sub Total ".$total."<br> Billing Name :- ".$billing_name;
    // include './instamojo/Instamojo.php';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:test_8d01ff0852117f8011037450035",
                        "X-Auth-Token:test_15aa95b0c9f54f177759c4e38aa"));
        $payload = Array(
            'purpose' => $product_name." Buying from Furnish Furniture",
            // 'amount' => '10',
            'amount' => $total,
            'phone' => $contact,
            'buyer_name' => $billing_name,
            'redirect_url' => 'http://localhost/Furnish/payment_complete.php',
            'send_email' => true,
            'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => $email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 

        echo $response;
        $response=json_decode($response);
        // echo '<pre>';
        // print_r($response);

        $_SESSION['transaction_id']=$response->payment_request->id;
        header('location:'.$response->payment_request->longurl);
        die();
?>
