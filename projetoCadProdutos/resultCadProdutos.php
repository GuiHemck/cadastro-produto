<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>finalizado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <h1>Resultado do Cadastro</h1>
    </header>
    <main>
        <?php 

if (!empty($_POST["idenproduto"]) && !empty($_POST["nomepro"]) && !empty($_POST["preco"])) {
    $idproduto = $_POST["idenproduto"];
    $nomepro = $_POST["nomepro"];
    $preco = $_POST["preco"];

    $conn = new PDO("mysql:host=localhost;dbname=controle_estoque", "root", "");

    // Verificar se o perfil já está cadastrado
    $stmtVerificar = $conn->prepare("SELECT * FROM produtos WHERE id = :idproduto AND nome = :nomepro AND valor = :preco");
    $stmtVerificar->bindParam(":idproduto", $idproduto);
    $stmtVerificar->bindParam(":nomepro", $nomepro);
    $stmtVerificar->bindParam(":preco", $preco);
    $stmtVerificar->execute();

    $qtdRegistros = $stmtVerificar->rowCount();

    if ($qtdRegistros > 0) {
        echo "Erro: Este produto já está cadastrado.";
    } else {
        // Se não existir, realizar o cadastro
        $stmtCadastro = $conn->prepare("INSERT INTO produtos (id, nome, valor) VALUES (:idproduto, :nomepro, :valor)");
        $stmtCadastro->bindParam(":idproduto", $idproduto);
        $stmtCadastro->bindParam(":nomepro", $nomepro);
        $stmtCadastro->bindParam(":valor", $preco);
        $stmtCadastro->execute();

        echo "Você acoboude cadastrar o produto: <strong>$nomepro </strong>!";
    }
} else {
    echo "Erro: Todos os campos devem ser preenchidos.";
}
         
       
        ?>
        <p><a href="index.php">Voltar para a pagina de logim</a></p>
    </main>
</body>
</html>
