<?php
// executa a conexao com o banco de dados 
include_once '../includes/conexao.php';

// captura os dados
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$user = $_POST['user'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$senha = $_POST['senha'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// monta o SQL que será executado no banco de dados
$sql = "INSERT INTO usuarios (Nome, Sobrenome, Usuario, Email, CEP, Estado, Cidade, Endereco, Numero, Complemento, Senha,Latitude,Longitude) VALUES ('{$nome}','{$sobrenome}', '{$user}', '{$email}', '{$cep}', '{$estado}', '{$cidade}', '{$endereco}', '{$numero}', '{$complemento}', '{$senha}', '{$latitude}','{$longitude}')";

// executar o banco de dados
mysqli_query($conexao, $sql);

// redireciona 
header('Location: ../cadastro.php?msg=semerro');
exit();
?>