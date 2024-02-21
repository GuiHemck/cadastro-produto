<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>finalizado</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon">
</head>
<body>
<header>
        <h1>Resultado do Cadastro</h1>
    </header>
    <main>
        <?php 

if (!empty($_GET["nome"]) && !empty($_GET["sobrenome"]) && !empty($_GET["Login"]) && !empty($_GET["Email"])) {
    $nome = $_GET["nome"];
    $sobrenome = $_GET["sobrenome"];
    $logim = $_GET["Login"];
    $email = $_GET["Email"];

    $conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

    // Verificar se o perfil já está cadastrado
    $stmtVerificar = $conn->prepare("SELECT * FROM cad_usuarios WHERE nome = :nome AND sobrenome = :sobrenome AND logim = :logim AND email = :email");
    $stmtVerificar->bindParam(":nome", $nome);
    $stmtVerificar->bindParam(":sobrenome", $sobrenome);
    $stmtVerificar->bindParam(":logim", $logim);
    $stmtVerificar->bindParam(":email", $email);
    $stmtVerificar->execute();

    $qtdRegistros = $stmtVerificar->rowCount();

    if ($qtdRegistros > 0) {
        echo "Erro: Este perfil já está cadastrado.";
    } else {
        // Se não existir, realizar o cadastro
        $stmtCadastro = $conn->prepare("INSERT INTO cad_usuarios (nome, sobrenome, logim, email) VALUES (:nome, :sobrenome, :logim, :email)");
        $stmtCadastro->bindParam(":nome", $nome);
        $stmtCadastro->bindParam(":sobrenome", $sobrenome);
        $stmtCadastro->bindParam(":logim", $logim);
        $stmtCadastro->bindParam(":email", $email);
        $stmtCadastro->execute();

        echo "Seja bem vindo, <strong>$nome $sobrenome</strong>! Cadastro realizado. Confirme seu logim em:";
    }
} else {
    echo "Erro: Todos os campos devem ser preenchidos.";
}
         
       
        ?>
        <p><a href="acesso.php">Voltar para a pagina de logim</a></p>
    </main>
</body>
</html>
