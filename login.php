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
    $senha = $_POST["Senha"];

    // Consultando as informações do usuário no banco de dados
    $sql = "SELECT * FROM inserir WHERE Nome = '$nome' AND Senha = '$senha'";
    $result = mysqli_query($conn, $sql);

    // Verificando se as credenciais são válidas
    if (mysqli_num_rows($result) > 0) {
        // Iniciando uma sessão
        session_start();

        // Armazenando o nome de usuário na sessão
        $_SESSION["Nome"] = $nome;
        
        // Redirecionando o usuário para a página protegida
        header("Location: home.php");
        exit;
    } else {
        echo "Nome de usuário ou senha inválidos.";
    }
}

// Fechando a conexão com o banco de dados
mysqli_close($conn);

?>
