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
       
    
    <main>
        <form action="logado.php" method= "post">
            <input type="submit" value="Voltar">
        </form>
    </main>
    
    
</body>
</html>