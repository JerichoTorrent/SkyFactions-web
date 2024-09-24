<?php
// input your MySQL server details here
$servername = "panel.torrentsmp.com:3306";
$username = "u5_BnK7fmIKeb";
$password = "D5dL=BSjd1jYpssUe!ez^O5q";
$dbname = "s5_SkyFactions";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
