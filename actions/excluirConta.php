<?php
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$usuarioID = $_SESSION['Usuario']['UsuarioID'];

// 2. Deletar usuário do banco
$sql = "DELETE FROM usuarios WHERE UsuarioID = $usuarioID";
$ok = mysqli_query($conexao, $sql);

header("Content-Type: application/json");

if ($ok) {
    echo json_encode(["status" => "ok"]);
} else {
    echo json_encode(["status" => "erro"]);
}

exit;