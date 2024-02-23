<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon">
</head>
<body>
    <h1>Selecione o Produto</h1>

    <section>
        <form action="alterarProdutos.php" method="post">
            <label for="idpruduto">Digite o ID do produto</label>
            <input type="number" name="idprod" id="idproduto">
            <label for="mudnome">Nome do produto</label>
            <input type="text" name="mudarnome" id="mudnome">
            <label for="mudvalor">valor do produto</label>
            <input type="text" name="mudarvalor" id="mudvalor">
            <input type="submit" value="Alterar">
            
        </form>
        
    </section>
    <?php

    

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idprod']) && isset($_POST['mudarnome']) && isset( $_POST['mudarvalor'])) {
        // ID do produto a ser atualizado
        $id_produto = $_POST['idprod'];

        // Novo produto
        $novo_nome = $_POST['mudarnome'];
        $novo_valor = $_POST['mudarvalor'];
        

        try {
            $conn = new PDO("mysql:host=localhost;dbname=controle_estoque", "root", "");
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $sql = "UPDATE produtos SET nome = :novo_nome, valor = :novo_valor WHERE id = :id_produto";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':novo_nome', $novo_nome);
            $stmt->bindParam(':novo_valor', $novo_valor);
            $stmt->bindParam(':id_produto', $id_produto);

            $stmt->execute();

            echo "Dados atualizados com sucesso!";
        } catch(PDOException $e) {
            echo "Erro ao atualizar dados: " . $e->getMessage();
        }

        $conn = null;
    }
    ?>
  <main>
        <form action="logado.php" method= "post">
            <input type="submit" value="Voltar">
        </form>
    </main>
</body>
</html>