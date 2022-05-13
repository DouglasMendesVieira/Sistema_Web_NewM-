<?php

$dbHost = 'localhost:3306';
$dbUsername = 'root';
$dbPassword = 'teste123';
$dbName = 'newm';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

/*
//Teste
if ($conexao->connect_errno) {
    echo "Erro";
} else {
    echo "Conexão efetuada com sucesso";
}
*/