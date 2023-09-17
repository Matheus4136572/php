<?php
$host = "localhost";  // ou "127.0.0.1"
$username = "root";
$password = "";
$dbname = "newsitelogin";

// Criando a conexão
$conn = mysqli_connect($host, $username, $password, $dbname);

// Checando a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
echo "Conexão bem-sucedida";
?>
