<?php 

// Replace with your MySQL server settings
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "unitop_db_place"; 

// Create connection
// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Set utf8 charset
mysqli_set_charset($conn, "utf8");