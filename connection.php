<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "branders";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?>




