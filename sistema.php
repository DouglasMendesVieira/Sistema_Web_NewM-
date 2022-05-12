<?php
include_once('config.php');

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$result_cadastro = "SELECT * FROM usuarios";
$result_cadastros = mysqli_query($conexao, $result_cadastro);

$total_cadastros = mysqli_num_rows($result_cadastros);
$quantidade_pg = 10;
$num_paginas = ceil($total_cadastros / $quantidade_pg);

//redeber a pagina, o numero da pagina
$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
//calcular inicio da visualização
$inicio = ($quantidade_pg * $pagina) - $quantidade_pg;

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id ASC LIMIT $inicio, $quantidade_pg";
} else {
    $sql = "SELECT * FROM usuarios ORDER BY id ASC LIMIT $inicio, $quantidade_pg";
}

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
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(0deg, cyan, blue);
    background-attachment: fixed;
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
    background: rgba(0, 0, 0, 0.3);
}

.box-search {
    display: flex;
    justify-content: center;
    gap: .1%;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema Web NewM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="home.php" class="btn btn-danger me-3">Voltar</a>
        </div>
    </nav>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table table-hover table-bordered text-white table-bg">
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
                    echo "<td>
                    <a class='btn btn-sm btn-warning' href='edit.php?id=$user_data[id]' title='Editar'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg>
                    </a> 
                    <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]' title='Deletar'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                        </svg>
                    </a>
                    </td>";
                    echo "<tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
        //verificar pagina anterior e posterior
        $pagina_anterior = $pagina - 1;
        $pagina_posterior = $pagina + 1;
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <?php
                    if ($pagina_anterior != 0) { ?>
                    <a class="page-link" href="sistema.php?pagina=<?php echo $pagina_anterior; ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    <?php } else { ?>
                    <span aria-hidden="true">&laquo;</span>
                    <?php } ?>
                </li>
                <?php
                //apresentar a paginação
                for ($i = 1; $i < $num_paginas + 1; $i++) { ?>
                <li class="page-item"><a class="page-link"
                        href="sistema.php?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php }
                ?>
                <li class="page-item">
                    <?php
                    if ($pagina_posterior <= $num_paginas) { ?>
                    <a class="page-link" href="sistema.php?pagina=<?php echo $pagina_posterior; ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    <?php } else { ?>
                    <span aria-hidden="true">&raquo;</span>
                    <?php } ?>
                </li>
            </ul>
        </nav>
    </div>
</body>
<script>
var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        searchData();
    }
});

function searchData() {
    window.location = 'sistema.php?search=' + search.value;
}
</script>

</html>