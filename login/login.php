<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <form action="processa_login.php" method="post">
            <legend><b>Login</b></legend>
            <br>
            <div class="inputBox">
                <label for="username">Nome de Usuário</label>
                <input type="text" name="username" id="username" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required>
            </div>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </div>
</html>