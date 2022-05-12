<?php
session_start();
include_once('config.php');
//print_r($_SESSION);
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$logado = $_SESSION['email'];

$sql = "SELECT * FROM usuarios ORDER BY id ASC";

$result = $conexao->query($sql);

//print_r($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sistema Web NewM</title>
</head>
<style>
body {
    background-image: linear-gradient(45deg, cyan, blue);
    color: white;
    text-align: center;
}

html,
body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

.table-bg {
    background: rgba(0, 0, 0, 0.4);
    border-radius: 15px 15px 0 0;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema Web NewM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-3">Sair</a>
        </div>
    </nav>
    <br>
    <?php
    echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Email</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Observação</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['id'] . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['data_nasc'] . "</td>";
                    echo "<td>" . $user_data['cpf'] . "</td>";
                    echo "<td>" . $user_data['celular'] . "</td>";
                    echo "<td>" . $user_data['email'] . "</td>";
                    echo "<td>" . $user_data['endereco'] . "</td>";
                    echo "<td>" . $user_data['observacao'] . "</td>";
                    echo "<td>açoes</td>";
                    echo "<tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>