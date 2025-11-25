<?php
// executa a conexao com o banco de dados 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

// upload da foto
$target_dir = "../contents/perfil/";
$target_file = $target_dir . basename($_FILES["fotoPerfil"]["name"]);
move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $target_file);

$sql = "UPDATE usuarios SET Imagem = '$target_file' WHERE UsuarioID = " . $_SESSION['Usuario']['UsuarioID'];
mysqli_query($conexao, $sql);

header('Location: ../index.php');
exit();
?>