<?php
// executa a conexao com o banco de dados 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

// upload da foto
$target_dir = "../contents/perfil/";
$target_file = $target_dir . basename($_FILES["fotoPerfil"]["name"]);
move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $target_file);

// capturar a distancia
$distancia = $_POST['raioDistancia'];

// dados do usuario
$UsuarioID = $_SESSION['Usuario']['UsuarioID'];

// atualizar dados do usuario no banco
$sql = "UPDATE usuarios SET Distancia = '$distancia', Imagem = '$target_file' WHERE UsuarioID = " . $_SESSION['Usuario']['UsuarioID'];
mysqli_query($conexao, $sql);

// pega as preferencias
$preferencias = $_POST['preferencia'];

// salva as preferencias do usuario
foreach($preferencias as $preferencia){
    $sql2 = "INSERT INTO usuarios_preferencias (UsuarioID, PreferenciaID) VALUES ($UsuarioID, $preferencia)";
    mysqli_query($conexao, $sql2);
}

// rediceriona para pagina index
header('Location: ../index.php');
exit();
?>