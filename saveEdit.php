<?php
// isset -> serve para saber se uma variável está definida
include_once('config.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $observacao = $_POST['observacao'];

    $sqlUpdate = "UPDATE usuarios SET nome='$nome',data_nasc='$data_nasc',cpf='$cpf',celular='$celular',email='$email',endereco='$endereco',observacao='$observacao' WHERE id=$id";

    $result = $conexao->query($sqlUpdate);
    print_r($result);
}
header('Location: sistema.php');