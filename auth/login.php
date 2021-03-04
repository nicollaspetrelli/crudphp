<?php 

session_start();

$conn = require_once '../actions/connection.php';

// Recebe os dados via POST
$data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
extract($data);

$sql = "SELECT * FROM usuarios WHERE `login` = '$email'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {

    $datadb = $result->fetch_assoc();

    if ($datadb['password'] == md5($password)) {

        $_SESSION['user'] = $datadb;
        header('Location: /');
        exit();

    } else {

        $_SESSION['error'] = "Senha incorreta!";
        header('Location: /login.php');
        exit();
    }

}

$_SESSION['error'] = "Usuario não encontrado no Sistema!";
header('Location: /login.php');
exit();