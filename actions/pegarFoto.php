<?php 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$foto_perfil = $_SESSION['Usuario']['Imagem'];

// Garante retorno somente JSON
header('Content-Type: application/json');

echo json_encode([
    "foto_perfil" => $foto_perfil
]);

exit;
?>
