<?php
// executa a conexao com o banco de dados 
include_once '../includes/conexao.php';

// captura os dados
$user = $_POST['user'];
$senha = $_POST['senha'];

// monta o SQL que será executado no banco de dados
$sql = "SELECT UsuarioID, Nome_completo, Email, Usuario, Imagem, CEP, Endereco, Cidade, Estado, Numero, Distancia, Latitude, Longitude FROM usuarios WHERE Usuario = '{$user}' AND Senha = '{$senha}' ";

// executar o banco de dados
$resultado = mysqli_query($conexao, $sql);

// validacao do acesso
if($resultado->num_rows > 0){
    // validacao do usuario - cria a sessao
    $_SESSION['Usuario'] =  mysqli_fetch_assoc($resultado);
    header('Location: ../index.php');
    print_r($_SESSION);
    exit('Usuario cadastrado');
}else{
    header('Location: ../cadastro.php?msg=semusuario');
}
exit();
?>