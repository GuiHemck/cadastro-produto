<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon">
</head>
<body>
<header>
        <h1>Cadastro Clientes</h1>
    </header>
    <section>
        <form action="resultcadclientes.php" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="idnome">
            <label for="sabrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="idsobrenome">
            <label for="Login">Login</label>
            <input type="text" name="Login" id="idlogin">
            <label for="Email">Email</label>
            <input type="email" name="Email" id="idemail">
            <form action="resultCadClient.php" method="get">
            <input type="submit" value="cadastrar">
            
            
        </form>
    </section>
    <main>
        <form action="acesso.php" method= "get">
            <input type="submit" value="Voltar">
        </form>
    </main>

</body>
</html>