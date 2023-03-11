<?php
    $serverName = "DELL\\SQLEXPRESS";
    $connectionInfo = array("Database" => "store");
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>