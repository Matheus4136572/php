<?php

// Iniciando ou continuando uma sessão
session_start();

// Verificando se o usuário está logado
if (!isset($_SESSION["Nome"])) {
    header("Location: login.html");
    exit;
}

// Mostrando o conteúdo da página protegida
echo "Bem-vindo, " . $_SESSION["Nome"] . "!";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>IAe burro funcionava </h1>
</body>
</html>