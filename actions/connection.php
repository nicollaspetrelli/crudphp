<?php 

// Criar a conexão
$localhost = "127.0.0.1";
$username = "root";
$password = "123456";
$dbname = "crud_php1";

$conn = new mysqli($localhost, $username, $password, $dbname);

// Checar a conexão
if ($conn->connect_error) {
    die("Erro: $conn->connect_error");
} else {
    echo "<script>console.log(' " . "Conectado com sucesso no banco!" . " ' );</script>";
}

return $conn;

// É uma boa prática regulamentada pela PHP-FIG.org não fechar a tag PHP assim como deixar a ultima linha vazia! 😉
