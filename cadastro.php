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
<script src="./verificaCPF.js"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro NewM</title>
</head>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(45deg, cyan, blue);
}

html,
body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

fieldset {
    border: 3px solid dodgerblue;
}

legend {
    border: 1px solid dodgerblue;
    padding: 10px;
    text-align: center;
    background-color: dodgerblue;
    border-radius: 8px;
}

input:invalid {
    border-color: red;
}

input:valid {
    border-color: green;
}

.box {
    color: white;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.6);
    padding: 15px;
    border-radius: 15px;
    width: 30%;
}

.inputBox {
    position: relative;
}

.inputUser {
    background: none;
    border: none;
    border-bottom: 5px solid white;
    outline: none;
    color: white;
    font-size: 15px;
    width: 100%;
    letter-spacing: 1px;
}

.textarea {
    border-radius: 5px;
    border: none;
    outline: none;
    font-size: 15px;
    width: 100%;
    letter-spacing: 1px;
}

.labelInput {
    position: relative;
    top: -50px;
    pointer-events: none;
    color: dodgerblue;
    font-size: 15px;
}

.labelObservacao {
    color: dodgerblue;
    font-size: 15px;
}

.labelNascimento {
    position: relative;
    pointer-events: none;
    color: dodgerblue;
    font-size: 15px;
}

#data_nascimento {
    border: none;
    padding: 8px;
    border-radius: 5px;
    outline: none;
    font-size: 15px;
}

#submit {
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 5px;
    background-color: deepskyblue;
}

#submit:hover {
    background-color: dodgerblue;
    cursor: pointer;
}
</style>

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