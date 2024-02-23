<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon">
</head>
<body>
<?php 
 
 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produto'])) {
try {
$conn = new PDO("mysql:host=localhost;dbname=controle_estoque", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificando se a chave produto está definida no array antes de acessá-la
$id_produto = isset($_POST['produto']) ? $_POST['produto'] : null;

if ($id_produto !== null) {
 $sql = "SELECT * FROM produtos WHERE id = :id";
 $stmt = $conn->prepare($sql);
 $stmt->bindParam(':id', $id_produto, PDO::PARAM_INT);
 $stmt->execute();

 if ($stmt->rowCount() > 0) {
     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Valor: " . $row["valor"]. "<br>";
         include "vendor/autoload.php";
                 $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                 echo $generator->getBarcode($row["valor"], $generator::TYPE_CODE_128);
     }
  }else{
     echo "<p>Nenhum produto encontrado.</p>";
  }
}
} catch(PDOException $e) {
echo "Erro de conexão: " . $e->getMessage();
}

 
 $conn = null;
}

?>
 <main>
        <form action="consultaestoque.php" method= "post">
            <input type="submit" value="Voltar">
        </form>
    </main>

</body>
</html>
