<?php
if (!empty($_GET['id'])) {

    include_once('./config.php');

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
<script src="./verificaCPF.js"></script>
<script src="./jquery-3.6.0.min.js"></script>
<script src="./jquery.mask.js"></script>
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
    <title>Cadastro NewM</title>
</head>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(0deg, cyan, blue);
    background-attachment: fixed;
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
    border: none;
    border-bottom: 5px solid white;
    outline: none;
    color: black;
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

#update {
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 5px;
    background-color: deepskyblue;
}

#update:hover {
    background-color: dodgerblue;
    cursor: pointer;
}

.voltar {
    position: fixed;
    top: 0px;
    right: 0px;
    background-color: #DC3545;
    margin: 10px;
    height: 40px;
    width: 65px;
    padding: 0 7px;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    border: none;

}

a {
    text-decoration: none;
    color: white;
}
</style>

<body>
    <button class="voltar"><a href="sistema.php">Voltar</a></button>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar cliente</b></legend>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser"
                        pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" value="<?php echo $nome ?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <label for="data_nascimento" class="labelNascimento">Data de nascimento:</label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nasc ?>"
                    required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf ?>" required
                        maxlength="14" onblur="validarCPF(this)">
                    <label for="cpf" class="labelInput">CPF</label>
                </div><br>
                <div class="inputBox">
                    <input type="tel" name="celular" id="celular" class="inputUser" value="<?php echo $celular ?>"
                        required>
                    <label for="tel" class="labelInput">Celular</label>
                </div><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>"
                        required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <div class="inputBox">
                    <label for="observacao" class="labelObservacao"
                        value="<?php echo $observacao ?>">Observação</label><br><br>
                    <textarea name="observacao" id="observacao" class="textarea" rows="4" cols="20" maxlength="300"
                        style="resize: none"> </textarea>
                </div><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
</body>

</html>