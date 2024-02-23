<?php



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produto'])) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=controle_estoque", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Verificando se a caixa recebeu dados para nao exibir um array vazio
        $id_produto = isset($_POST['produto']) ? $_POST['produto'] : null;
    
        if ($id_produto !== null) {
            $sql = "SELECT * FROM produtos WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id_produto, PDO::PARAM_INT);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    echo $generator->getBarcode('$row',
                            $generator::TYPE_CODE_128);

                }
             }
        }
    } catch(PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
    
            
            $conn = null;
    }



