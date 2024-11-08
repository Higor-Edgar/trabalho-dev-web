<?php
session_start(); // Iniciar a sessão

// Cabeçalhos para evitar cache
header("Cache-Control: no-store, no-cache, must-revalidate"); // Evitar cache
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Data no passado para expiração
header("Pragma: no-cache"); // HTTP/1.0

// Destruir a sessão anterior, se existir
if (isset($_SESSION['username'])) {
    session_destroy();
    session_start();
}

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['Nome']) ? trim($_POST['Nome']) : '';
    $password = isset($_POST['Senha']) ? trim($_POST['Senha']) : '';

    // Conexão com o banco de dados
    $servername = "localhost";
    $username_db = "higor07";
    $password_db = "senha";
    $dbname = "banco_dev";

    try {
        $conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para validar o login
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Verifica se o usuário existe
        if ($stmt->rowCount() > 0) {
            // Iniciar a sessão de usuário
            $_SESSION['username'] = $username;
            // Redirecionar para a página desejada
            header("Location: imoveis/imoveis.html");
            exit();
        } else {
            // Definir mensagem de erro
            $error_message = "Usuário ou senha inválidos.";
        }
    } catch(PDOException $e) {
        $error_message = "Erro: " . $e->getMessage();
    }

    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #333;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: white;
        }

        .inputBox {
            margin-bottom: 20px;
            text-align: left;
        }

        .inputBox label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: white;
        }

        .inputBox input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .inputBox input:focus {
            border-color: #007BFF;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <div class="inputBox">
                <label for="Nome">Nome de Usuário</label>
                <input type="text" id="Nome" name="Nome" required>
            </div>
            <div class="inputBox">
                <label for="Senha">Senha</label>
                <input type="password" id="Senha" name="Senha" required>
            </div>
            <input type="submit" value="Login">
        </form>
        <?php
        if ($error_message) {
            echo "<div class='error'>$error_message</div>";
        }
        ?>
    </div>

</body>
</html>

