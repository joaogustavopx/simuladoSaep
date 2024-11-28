<?php

include 'DB.php';


if($_SERVER['REQUEST_METHOD']=="POST"){

    $nome = $_POST['Nome'];
    $preco = $_POST['Preco'];
    $desc = $_POST['Descricao'];

    $sql = "INSERT INTO produto (Nome,Preco,Descricao) VALUES (:Nome,
    :Preco, :Descricao)";

    $stmt =  $conn->prepare($sql);

    $stmt->bindParam(':Nome',$nome);
    $stmt->bindParam(':Preco',$preco);
    $stmt->bindParam(':Descricao',$desc);

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
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
        <a href="index.php">Registrar Venda</a>
        <a href="registrovenda.php">Visualizar Venda</a>
        <a href="comprador.php">Cadastrar Comprador</a>
    </nav>

    <h1>Cadastro de Produto</h1>
    <form action="produto.php" method="POST">
    <label for="Nome">Nome do Produto:</label>
    <input type="text" name="Nome" id="Nome" required><br>

    <label for="Preco">Preço:</label>
    <input type="number" id="Preco" name="Preco" required><br>

    <label for="Descricao">Descrição:</label>
    <input type="text" id="Descricao" name="Descricao" required><br>

    <button type="submit">Cadastrar Produto</button>
    </form>
</body>