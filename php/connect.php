<?php
    $serverName = "DELL\\SQLEXPRESS";
    $connectionInfo = array("Database" => "ezgo");
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if (!$conn) {
        die("Connection failed: " . sqlsrv_errors());
    }
?>