<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Web NewM</title>
</head>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(45deg, cyan, blue);
    text-align: center;
    color: white;
}

.box {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.6);
    padding: 30px;
    border-radius: 15px;
}

.button {
    text-decoration: none;
    color: white;
    border: 3px solid dodgerblue;
    border-radius: 10px;
    padding: 10px;
}

button:hover {
    background-color: dodgerblue;
}
</style>

<body>
    <div class="box">
        <a href="login.php" class="button">Login</a>
        <a href="cadastro.php" class="button">Cadastre-se</a>
    </div>
</body>

</html>