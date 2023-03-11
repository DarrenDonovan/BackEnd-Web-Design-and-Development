<?php
    include('connect.php');
    include('customer.php');

    $cust = new customer();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sub_type = $_POST['submit_type'];
        $username = $_POST['username'];
        $password_get = $_POST['password'];
        $password = strval($password_get);

        if($sub_type === 'login'){
            $cust->login($username, $password);
        }else if($sub_type === 'signup'){
            $nama = $_POST['name'];
            $cust->signin($username, $password, $nama);
        }
    }
?>