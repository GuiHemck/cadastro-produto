<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Consultar Estoque</h1>
    </header>

        <main>
        <form action="consulta.php" method="post">

            <label for="idproduto">Id Produto</label>
            <input type="number" name="produto" id="idproduto">
            
            <input type="submit" value="Consultar">
        </form>
        
        </main>
       
    
    <form action="cadProdutos.php" method="post">
       
        <input type="submit" value="Cadastrar Produtos">
    </form>
    <form action="alterarProdutos.php" method="post">
       
        <input type="submit" value="Alterar Produtos">
    </form>
    
    

    

    
</body>
</html>