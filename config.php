<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
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