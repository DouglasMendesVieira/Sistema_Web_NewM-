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

    include_once('../configs/config.php');

    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $observacao = $_POST['observacao'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,data_nasc,cpf,celular,email,endereco,observacao) VALUES ('$nome','$data_nasc','$cpf','$celular','$email','$endereco','$observacao')");

    header('Location: sistema.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<script src="../js/verificaCPF.js"></script>
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/jquery.mask.js"></script>
<script src="../js/validar.js"></script>
<script>
$(document).ready(function() {
    $('#cpf').mask('000.000.000-00', {
        reverse: true
    });
    var SPMaskBehavior = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('#celular').mask(SPMaskBehavior, spOptions);
})
</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css" media="screen" />
    <title>Cadastro NewM</title>
</head>

<body>
    <button class="voltar"><a href="home.html">Voltar</a></button>
    <div class="box">
        <form name="formuser" action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>Cadastrar novo cliente</b></legend>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser">
                    <label for="nome" class="labelInput">Nome completo</label>
                </div><br>
                <label for="data_nascimento" class="labelNascimento">Data de nascimento:</label>
                <input type="date" name="data_nascimento" id="data_nascimento">
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" onblur="validarCPF(this)">
                    <label for="cpf" class="labelInput">CPF</label>
                </div><br><br>
                <div class="inputBox">
                    <input type="tel" name="celular" id="celular" class="inputUser">
                    <label for="tel" class="labelInput">Celular</label>
                </div><br><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser">
                    <label for="email" class="labelInput">Email</label>
                </div><br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser">
                    <label for="endereco" class="labelInput">Endereço</label>
                </div><br>
                <div class="inputBox">
                    <label for="observacao" class="labelObservacao">Observação</label><br>
                    <textarea name="observacao" id="observacao" class="textarea" rows="4" cols="20"
                        style="resize: none"> </textarea>
                </div><br>
                <input type="submit" name="submit" id="submit" value="Cadastrar" onclick="return Validar()">
            </fieldset>
        </form>
    </div>
</body>

</html>