<?php
// executa a conexao com o banco de dados 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

// upload da foto
$target_dir = "../contents/perfil/";
$target_file = $target_dir . basename($_FILES["fotoPerfil"]["name"]);
move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $target_file);

// capturar a distancia

// dados do usuario
$UsuarioID = $_SESSION['Usuario']['UsuarioID'];
$distancia = $_POST['raioDistancia'];
// atualizar dados do usuario no banco
$sql = "UPDATE usuarios SET Distancia = $distancia, Imagem = '$target_file' WHERE UsuarioID = " . $_SESSION;
$resultado = mysqli_query($conexao, $sql);

// pega as preferencias

// excluir as preferencias do usuario

// salva as preferencias do usuario

// rediceriona para pagina index

?>