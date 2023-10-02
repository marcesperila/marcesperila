<?php
$hostname = "localhost";
$userAccount = "root";
$username ="";
$password = "";
$dbname = "db_school";

// Create a connection
$connection = new mysqli($hostname, $userAccount, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
echo "Connected successfully";
?>