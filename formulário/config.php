<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "higor07";
    $password = "senha";
    $dbname = "banco_dev";

    try {
        $conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recebe dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $tipo = $_POST['tipo'];
        $data_de_contato = $_POST['data_de_contato'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $endereco = $_POST['endereco'];

        // Insere dados na tabela
        $sql = "INSERT INTO clientes (nome, email, telefone, tipo, data_de_contato, estado, cidade, bairro, endereco)
        VALUES (:nome, :email, :telefone, :tipo, :data_de_contato, :estado, :cidade, :bairro, :endereco)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':data_de_contato', $data_de_contato);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':endereco', $endereco);

        $stmt->execute();
        echo "Novo registro criado com sucesso!";
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    $conn = null;
<<<<<<< HEAD
}
=======
}
>>>>>>> 2f5e4df (alterações na página de login, com erro de usuário inválido)
