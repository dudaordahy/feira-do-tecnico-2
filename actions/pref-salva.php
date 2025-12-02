<?php 
// executa a conexao com o banco de dados 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

// pega as preferencias
$UsuarioID = $_SESSION['Usuario']['UsuarioID'];
$preferencias = $_POST['preferencia'];

if(count($preferencias) == 10){

    $sql = "DELETE FROM usuarios_preferencias WHERE UsuarioID = $UsuarioID;";
    mysqli_query($conexao, $sql);

    // salva as preferencias do usuario
    foreach($preferencias as $posicao=>$preferencia){
        $sql = "INSERT INTO usuarios_preferencias (UsuarioID, PreferenciaID, Ordem) VALUES ($UsuarioID, $preferencia,$posicao);";
        mysqli_query($conexao, $sql);
    }
    // rediceriona para pagina index
    header('Location: ../index.php');
    exit();
}
?>