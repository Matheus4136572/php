<?php

// Dados de conexão com o banco de dados
$host = "localhost";
$username = "root";
$password = "";
$db_name = "newsitelogin";

// Criando a conexão com o banco de dados
$conn = mysqli_connect($host, $username, $password, $db_name);

// Verificando se a conexão foi bem-sucedida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verificando se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturando os dados enviados pelo formulário
    $nome = $_POST["Nome"];
    $email = $_POST["Email"];
    $senha = $_POST["Senha"];

    // Criando a consulta SQL para inserir os dados
    $sql = "INSERT INTO inserir (Nome, Email, Senha)
    VALUES ('$nome', '$email', '$senha')";

    // Executando a consulta e verificando se foi bem-sucedida
    if (mysqli_query($conn, $sql)) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conn);
    }
}

// Fechando a conexão com o banco de dados
mysqli_close($conn);

?>
