<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conexão com o banco de dados
    $servername = "localhost";
    $username_db = "higor07";
    $password_db = "sabonete03";
    $dbname = "banco_dev";

    try {
        $conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para validar o login
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = :francisco24 AND password = :senha123");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Verifica se o usuário existe
        if ($stmt->rowCount() > 0) {
            // Redirecionar para a página desejada
            header("Location: imoveis.html");
            exit();
        } else {
            // Lidar com erro de login
            echo "Usuário ou senha inválidos.";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    $conn = null;
}
?>
