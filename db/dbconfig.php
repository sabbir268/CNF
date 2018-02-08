<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$dbname = "cnf_db";
// Create connection
$conn = new mysqli("$servername", "$username","", "$dbname");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>