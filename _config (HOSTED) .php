<?php

$server = "localhost";
$username = "simsate1_exam";
$password = "GreenparroT123@";
$db = "simsate1_exam";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>