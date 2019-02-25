<?php 

$servername = "localhost";
$username   = "root";
$password   = "qr@admin";
$dbname     = "leave";
$baseyr	    = 2016;


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
?>
