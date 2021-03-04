<?php 

session_start();

$conn = require_once 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $id = $data['delId'];

    $sql = "DELETE FROM usuarios WHERE id = '{$id}'";

    $resultDel = $conn->query($sql);

    if ($resultDel) {
        $_SESSION['alert'] = "Usuario removido com sucesso!";
    } else {
        die('Você está tentando remover um usuario que não existe!');
    }
}

return header('Location: /index.php');