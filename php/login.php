<?php
    include('connect.php');
    include('customer.php');

    $cust = new customer();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sub_type = $_POST['submit_type'];
        $username = $_POST['username'];
        $password_get = $_POST['password'];
        $password = password_hash($password_get, PASSWORD_DEFAULT);

        if($sub_type === 'login'){
            $cust->login($username, $password);
        }
    }
?>