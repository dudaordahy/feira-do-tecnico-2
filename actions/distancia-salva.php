<?php  
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$UsuarioID = $_SESSION['Usuario']['UsuarioID'];
if (!isset($_POST['raioDistancia'])) {
    die("Erro: distancia não recebida");
}
$distancia = $_POST['raioDistancia'];

$sql = "UPDATE usuarios SET Distancia = '$distancia' WHERE UsuarioID = " . $_SESSION['Usuario']['UsuarioID'];
mysqli_query($conexao, $sql);

header('Location: ../index.php');
exit();
