<?php

$dbHost = 'localhost:3306'; 
$dbUsername = 'root'; 
$dbPassword = 'Georges116'; 
$dbName = 'NESTLY'; 

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "Connected successfully"; 
}

$connection->set_charset("utf8");
?>
