<?php 

session_start();

$user = $_SESSION['user'];

if(empty($user)) {
    header('Location: login.php');
    exit();
}