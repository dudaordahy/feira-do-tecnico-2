<?php
// executa a conexao com o banco de dados 
include_once '../includes/conexao.php';

// captura os dados
$nome_completo = $_POST['nome_completo'];
$user = $_POST['user'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$senha = $_POST['senha'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// monta o SQL que será executado no banco de dados
$sql = "INSERT INTO usuarios (Nome_completo, Usuario, Email, CEP, Estado, Cidade, Endereco, Numero, Senha, Latitude, Longitude) VALUES ('{$nome_completo}', '{$user}', '{$email}', '{$cep}', '{$estado}', '{$cidade}', '{$endereco}', '{$numero}', '{$senha}', '{$latitude}','{$longitude}')";

// executar o banco de dados
mysqli_query($conexao, $sql);

// redireciona 
header('Location: ../cadastro.php');
exit();
?>