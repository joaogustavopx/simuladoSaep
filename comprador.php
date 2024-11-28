<?php

include 'DB.php';


if($_SERVER['REQUEST_METHOD']=="POST"){

    $nome = $_POST['Nome'];
    $telefone = $_POST['Telefone'];
    $endereco = $_POST['Endereco'];

    $sql = "INSERT INTO comprador (Nome,Telefone,Endereco) VALUES (:Nome,
    :Telefone, :Endereco)";

    $stmt =  $conn->prepare($sql);

    $stmt->bindParam(':Nome',$nome);
    $stmt->bindParam(':Telefone',$telefone);
    $stmt->bindParam(':Endereco',$endereco);

    $stmt->execute();

    header('location: index.php');
    exit; 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Comprador</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
        <a href="index.php">Registrar Venda</a>
        <a href="registrovenda.php">Visualizar Venda</a>
        <a href="comprador.php">Cadastrar Comprador</a>
    </nav>

    <h1>Cadastro de Comprador</h1>
    <form action="comprador.php" method="POST">
    <label for="Nome">Nome do Comprador:</label>
    <input type="text" name="Nome" id="Nome" required><br>

    <label for="Telefone">Telefone:</label>
    <input type="text" id="Telefone" name="Telefone" required><br>

    <label for="Endereco">Endereço:</label>
    <input type="text" id="Endereco" name="Endereco" required><br>

    <button type="submit">Cadastrar Comprador</button>
    </form>
</body>