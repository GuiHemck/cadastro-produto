<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="favicon/logo_carro.ico" type="image/x-icon">
</head>
<body>
<header>
        <h1>Cadastro Produtos</h1>
    </header>
    <section>
        <form action="resultCadProdutos.php" method="post">
            <label for="idproduto">Identificador do produto:</label>
            <input type="text" name="idenproduto" id="idproduto">

            <label for="idnome">Nome do produto:</label>
            <input type="text" name="nomepro" id="idnome">

            <label for="idvalor">Valor:</label>
            <input type="text" name="preco" id="idvalor">
            

            <form action="resultCadProdutos.php" method="post">

            <input type="submit" value="Cadastrar">
            
            
        </form>
    </section>
    <main>
        <form action="logado.php" method= "post">
            <input type="submit" value="Voltar">
        </form>
    </main>

</body>
</html>