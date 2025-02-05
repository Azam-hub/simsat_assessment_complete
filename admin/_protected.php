<?php

session_start();

if(!isset($_SESSION['is_adminLoggedIn']) || $_SESSION['is_adminLoggedIn'] != true) {
    header('location: login.php');
}





?>