<?php
header('Content-Type: application/json');
include('connect.php');
include('customer.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data["username"];

    $cust = new customer();
    $check = $cust->checkusername($username);
    if ($check == true) {
        echo json_encode(array('exists' => true));
    } else {
        echo json_encode(array('exists' => false));
    }
}
?>
