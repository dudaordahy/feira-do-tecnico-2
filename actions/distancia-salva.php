<?php 

$distancia = $_POST['raioDistancia'];

$sql = "UPDATE usuarios SET Distancia = '$distancia'" . $_SESSION['Usuario']['UsuarioID'];
mysqli_query($conexao, $sql);
?>


