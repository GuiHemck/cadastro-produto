<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon/logo_carro.ico" type="image/x-icon">
</head>
<body>
<?php 
        try {
            // Criando uma nova conexão PDO
            $conn = new PDO("mysql:host=localhost;dbname=controle_estoque", "root", "");
            // Configurando o PDO para lançar exceções em caso de erros
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Consulta SQL para buscar um produto por ID
            $id_produto = $_GET['produto']; // ID do produto a ser consultado
            $sql = "SELECT * FROM produtos WHERE id = :id";
        
            // Preparando a consulta
            $stmt = $conn->prepare($sql);
        
            // Vinculando parâmetros
            $stmt->bindParam(':id', $id_produto, PDO::PARAM_INT);
        
            // Executando a consulta
            $stmt->execute();
        
            // Verificando se a consulta retornou resultados
            if ($stmt->rowCount() > 0) {
                // Iterando sobre os resultados e exibindo os dados do produto
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Valor: " . $row["valor"]. "<br>";
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
        } catch(PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }


        
        // Fechando a conexão
        $conn = null;
        
        ?>
        <form action="index.php">
            <input type="submit" value="Voltar">
        </form>
</body>
</html>

