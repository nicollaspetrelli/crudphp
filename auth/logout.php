<?php 

session_start();

$user = $_SESSION['user'];

if(isset($user)){
    session_destroy();
    unset($user);
}

header('Location: ../index.php');
exit();
