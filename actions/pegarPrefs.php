<?php 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$usuarioID = $_SESSION['Usuario']['UsuarioID'];

$sql = "SELECT PreferenciaID FROM `usuarios_preferencias` WHERE UsuarioID = " . $usuarioID;
$resultado = mysqli_query($conexao, $sql);

while($resultado){
    $dados = mysqli_fetch_assoc($resultado);

    // cria um array
    $colecao = array();

    header('Content-Type: application/json');

    echo json_encode([
    "dados" => $dados
]);
}
exit();
?>