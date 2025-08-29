<?php
$servername = "localhost";
$username   = "YOUR_DB_USERNAME";   // yahan apna hosting ka DB username likho
$password   = "YOUR_DB_PASSWORD";   // yahan DB ka password
$dbname     = "YOUR_DB_NAME";       // yahan apna DB name
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
// Debug mode ON (taake error dikhe)
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
 
