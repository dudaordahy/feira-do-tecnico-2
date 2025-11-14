<?php
// executa a conexao com o banco de dados 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

// criar o sql que captura as preferencias 
$sql = 'SELECT * FROM preferencias';

// executa o comando e retorna as informacoes
$resultado = mysqli_query($conexao,$sql);

// cria um array
$colecao = array();

// laco que cria o novo array com os dados
while ($dados = mysqli_fetch_assoc($resultado)) {
    array_push($colecao,$dados);
}

// define como json
header('Content-Type: application/json');

// cria o json
exit( json_encode($colecao));
?>