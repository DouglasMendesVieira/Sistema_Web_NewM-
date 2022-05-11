<?php
if (isset($_POST['submit'])) {

    /*
    //Teste
    print_r($nome = $_POST['nome']);
    print_r($data_nasc = $_POST['data_nascimento']);
    print_r($cpf = $_POST['cpf']);
    print_r($celular = $_POST['celular']);
    print_r($email = $_POST['email']);
    print_r($endereco = $_POST['endereco']);
    print_r($observacao = $_POST['observacao']);
    */

    include_once('./config.php');

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $data_nasc = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $observacao = $_POST['observacao'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,data_nasc,cpf,celular,email,endereco,observacao) 
    VALUES ('$nome','$senha','$data_nasc','$cpf','$celular','$email','$endereco','$observacao')");

    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<script src="./js/verificaCPF.js"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro NewM</title>
    <link rel="stylesheet" href="./css/cadastro.css" type="text/css">
</head>

<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Clientes</b></legend>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser"
                        pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <label for="data_nascimento" class="labelNascimento">Data de nascimento:</label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required maxlength="14"
                        onblur="validarCPF(this)">
                    <label for="cpf" class="labelInput">CPF</label>
                </div><br>
                <div class="inputBox">
                    <input type="tel" name="celular" id="celular" class="inputUser" required>
                    <label for="tel" class="labelInput">Celular</label>
                </div><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <div class="inputBox">
                    <label for="observacao" class="labelObservacao">Observação</label><br><br>
                    <textarea name="observacao" id="observacao" class="textarea" rows="3" cols="20" maxlength="300"
                        style="resize: none"> </textarea>
                </div><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>