<?php 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$usuarioID = $_SESSION['Usuario']['UsuarioID'];

$sql = "SELECT * FROM usuario_preferencia WHERE UsuarioID = " .$usuarioID;
$resultado = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($resultado);

header('Content-Type: application/json');

echo json_encode([
    "dados" => $dados
]);
exit($dados);
?>