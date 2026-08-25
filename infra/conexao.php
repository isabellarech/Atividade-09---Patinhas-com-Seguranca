<?php

$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "patinhas_com_seguranca_db";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco: " . $conexao->connect_error);
};

$conexao->set_charset("utf8mb4");

?>