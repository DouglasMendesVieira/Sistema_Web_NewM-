<?php
if (!empty($_GET['id'])) {

    include_once('../configs/config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['nome'];
            $data_nasc = $user_data['data_nasc'];
            $cpf = $user_data['cpf'];
            $celular = $user_data['celular'];
            $email = $user_data['email'];
            $endereco = $user_data['endereco'];
            $observacao = $user_data['observacao'];
        }
        //print_r($nome);
    } else {
        header('Location: sistema.php');
    }
} else {
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
    <link rel="stylesheet" type="text/css" href="../css/edit.css" media="screen" />
    <title>Cadastro NewM</title>
</head>

<body>
    <button class="voltar"><a href="sistema.php">Voltar</a></button>
    <div class="box">
        <form name="formuser" action="../utils/saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar cliente</b></legend>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>">
                    <label for="nome" class="labelInput">Nome completo</label>
                </div><br>
                <label for="data_nascimento" class="labelNascimento">Data de nascimento:</label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nasc ?>">
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf ?>"
                        onblur="validarCPF(this)">
                    <label for="cpf" class="labelInput">CPF</label>
                </div><br><br>
                <div class="inputBox">
                    <input type="tel" name="celular" id="celular" class="inputUser" value="<?php echo $celular ?>">
                    <label for="tel" class="labelInput">Celular</label>
                </div><br><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email ?>">
                    <label for="email" class="labelInput">Email</label>
                </div><br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>">
                    <label for="endereco" class="labelInput">Endereço</label>
                </div><br>
                <div class="inputBox">
                    <label for="observacao" class="labelObservacao" value="<?php echo $observacao ?>">Observação</label>
                    <br>
                    <textarea name="observacao" id="observacao" class="textarea" rows="4" cols="20"
                        style="resize: none"> </textarea>
                </div><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input onclick="return Validar()" type="submit" name="update" id="update" value="Editar">
            </fieldset>
        </form>
    </div>
</body>

</html>