<?php
// Inclui o arquivo de conexão com o banco de dados
include 'db.php';

// Verifica se o formulário foi enviado para registrar a venda
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comprador = $_POST['Id'];
    $data = $_POST['Data'];
    $produto = $_POST['Produto'];


    // Insere o pedido no banco de dados
    $sql = "INSERT INTO venda (Id, Data, Produto)
            VALUES (:Id, :Data, :Produto)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Id', $comprador);
    $stmt->bindParam(':Data', $data);
    $stmt->bindParam(':produto', $produto);
    
    $stmt->execute();

    header('Location: produto.php');
    exit;
}

// Consulta todos os compradores cadastrados
$sql = "SELECT * FROM comprador";
$stmt = $conn->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venda</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Função para preencher os campos de nome e telefone automaticamente ao selecionar o cliente
        function preencherDadosCliente() {
            var Id = document.getElementById("Id").value;
            var Telefone = document.getElementById("telefone");

            <?php foreach ($comprador as $comprador): ?>
                if (compradorId == <?php echo $comprador['Nome']; ?>) {
                    Telefone.value = "<?php echo $comprador['Telefone']; ?>";
                }
            <?php endforeach; ?>
        }
    </script>
</head>
<body>
    <!-- Menu de Navegação -->
    <nav>
        <a href="index.php">Registrar Venda</a>
        <a href="registrovenda.php">Visualizar Venda</a>
        <a href="comprador.php">Cadastrar Comprador</a>
    </nav>

    <h1>Registrar Pedido</h1>
    <form action="index.php" method="POST">
        <label for="comprador">Selecione o Cliente:</label>
        <select Id="Id_comprador" name="Id_comprador" onchange="preencherDadosCliente()" required>
            <option value="">Escolha o Cliente</option>
            <?php foreach ($comprador as $comprador): ?>
                <option value="<?php echo $comprador['Id_comprador']; ?>"><?php echo $comprador['Id_comprador']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="Nome">Nome do comprador:</label>
        <input type="text" id="Nome" name="Nome" disabled><br>

        <label for="Telefone">Telefone:</label>
        <input type="text" id="Telefone" name="Telefone" disabled><br>

        <label for="venda">Venda:</label>
        <input type="number" id="venda" name="venda" required><br>

        <label for="observacao">Observação:</label>
        <input type="text" id="observacao" name="observacao"><br>

        <button type="submit">Registrar Venda</button>
    </form>
</body>
</html>