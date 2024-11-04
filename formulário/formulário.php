<?php
    
if(isset($_POST['submit'])){
    print_r($_POST['nome']);
    print_r($_POST['email']);
    print_r($_POST['telefone']);
    print_r($_POST['tipo']);
    print_r($_POST['data_de_contato']);
    print_r($_POST['estado']);
    print_r($_POST['cidade']);
    print_r($_POST['bairro']);
    print_r($_POST['endereco']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <form action="formulário.php" method="POST">
            <legend><b>Cadastro de Clientes</b></legend>
            <br>
            <div class="inputBox">
                <label for="nome" class="labelInput">Nome Completo</label>
                <input type="text" name="nome" id="nome" class="inputUser" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="inputUser" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="telefone">Telefone</label>
                <input type="tel" name="telefone" id="telefone" class="inputUser" required>
            </div>
            <br>
            <p>Tipo de Cliente:</p>
            <input type="radio" id="comprador" name="tipo" value="Comprador" required>
            <label for="comprador">Comprador</label><br>
            <input type="radio" id="vendedor" name="tipo" value="Vendedor" required>
            <label for="vendedor">Vendedor</label><br>
            <br>
            <label for="data-de-contato"><b>Data de Contato:</b></label>
            <input type="date" name="data_de_contato" id="data_de_contato" required>
            <br>
            <div class="inputBox">
                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado" class="inputUser" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="inputUser" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="inputUser" required>
            </div>
            <br>
            <div class="inputBox">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="inputUser" required>
            </div>
            <br>
            <input type="submit" name="submit" id="submit">
        </form>
    </div>
</body>
</html>


