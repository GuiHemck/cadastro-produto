<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logado</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon">
</head>
<body>

    <h1>Bem vindo ao InventárioWEB</h1>
    <main>
        <form action="consultaestoque.php" method= "post">
            <input type="submit" value="Consultar Estoque">
        </form>
    </main>
    <main>
        <form action="gerarcdb.php" method= "post">
            <input type="submit" value="Gerar código de barras">
        </form>
    </main>
    <main>
        <form action="alterarProdutos.php" method= "post">
            <input type="submit" value="Alterar cadastro">
        </form>
    </main>
    <main>
        <form action="cadProdutos.php" method= "post">
            <input type="submit" value="Cadastrar Produtos">
        </form>
    </main>
</body>
</html>