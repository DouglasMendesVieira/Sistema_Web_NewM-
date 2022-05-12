<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tela de login</title>
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

.tela-login {
    background-color: rgba(0, 0, 0, 0.6);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 50px;
    border-radius: 15px;
    color: white;
}

input {
    padding: 10px;
    border: none;
    outline: none;
    font-size: 15px;
}

.inputSubmit {
    background-color: deepskyblue;
    border: none;
    padding: 15px;
    width: 100%;
    border-radius: 10px;
    color: white;
    font-size: 15px;
}

.inputSubmit:hover {
    background-color: dodgerblue;
    cursor: pointer;
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
            <a href="home.php" class="btn btn-danger me-3">Voltar</a>
        </div>
    </nav>
    <div class="tela-login">
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>

</html>