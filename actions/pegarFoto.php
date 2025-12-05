<?php 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$usuarioID = $_SESSION['Usuario']['UsuarioID'];
$sql = 'SELECT Imagem FROM usuarios WHERE UsuarioID = '.$usuarioID;

// executa o comando e retorna as informacoes
$resultado = mysqli_query($conexao,$sql);

// dados
$dados = mysqli_fetch_assoc($resultado);
$foto_perfil = $dados['Imagem'];

// Garante retorno somente JSON
header('Content-Type: application/json');

echo json_encode([
    "foto_perfil" => $foto_perfil
]);
exit;
?>
