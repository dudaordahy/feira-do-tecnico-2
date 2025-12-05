<?php
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$UsuarioID = $_SESSION['Usuario']['UsuarioID'];

// ----------------------------
// FOTO
// ----------------------------
$nomeFoto = $_SESSION['Usuario']['Imagem']; // mantém caso não troque

if (!empty($_FILES['fotoPerfil']['name'])) {
    $target_dir = "../contents/perfil/";
    $nomeFoto = basename($_FILES["fotoPerfil"]["name"]);
    $target_file = $target_dir . $nomeFoto;
    move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $target_file);
}

// ----------------------------
// USERNAME
// ----------------------------
$user = $_POST["username"] ?? $_SESSION['Usuario']['Usuario'];

// remove o @
$user = ltrim($user, '@');

// ----------------------------
// DISTANCIA
// ----------------------------
$distancia = $_POST["distance"] ?? $_SESSION['Usuario']['Distancia'];

// ----------------------------
// ATUALIZA NO BANCO
// ----------------------------
$sql = "UPDATE usuarios 
        SET Usuario = '$user', Imagem = '$nomeFoto', Distancia = '$distancia'
        WHERE UsuarioID = $UsuarioID";

mysqli_query($conexao, $sql);
?>
