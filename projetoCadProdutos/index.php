<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Consultar Estoque</h1>
    </header>

        <main>
        <form action="index.php" method="post">

            <label for="idproduto">Id Produto</label>
            <input type="number" name="produto" id="idproduto">
            
            <input type="submit" value="Consultar">
        </form>
        
        </main>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produto'])) {
try {
    $conn = new PDO("mysql:host=localhost;dbname=controle_estoque", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificando se a chave 'produto' está definida no array $_GET antes de acessá-la
    $id_produto = isset($_POST['produto']) ? $_POST['produto'] : null;

    if ($id_produto !== null) {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_produto, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Valor: " . $row["valor"]. "<br>";
            }
         }else{
            echo "<p>Nenhum produto encontrado.</p>";
         }
    }
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}


        
        // Fechando a conexão
        $conn = null;
}
        
        ?>
    
    <form action="cadProdutos.php" method="post">
       
        <input type="submit" value="Cadastrar Produtos">
    </form>
    <form action="alterarProdutos.php" method="post">
       
        <input type="submit" value="Alterar Produtos">
    </form>
    
    

    

    
</body>
</html>