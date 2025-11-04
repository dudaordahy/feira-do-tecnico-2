<?php
session_start();

// configuracoes de acesso
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "connect";

// conexao
$conexao = mysqli_connect($servername, $username, $password, $dbname);

?>