<?php 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$usuarioID = $_SESSION['Usuario']['UsuarioID'];

$sql = 'SELECT Imagem FROM usuarios WHERE UsuarioID = '.$usuarioID;
$resultado = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($resultado);

// Se a imagem não existir, retorna string vazia
$foto_perfil = $dados['Imagem'] ?? ""; 

header('Content-Type: application/json');

echo json_encode([
    "foto_perfil" => $foto_perfil
]);
exit;
?>

