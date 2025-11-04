<?php
include_once './includes/conexao.php';
include_once './includes/logado.php';
include_once './includes/header.php';
?>
<form action="./actions/perfil-salvar.php" method="post"  enctype="multipart/form-data">
<h1>Escolha foto de perfil</h1>
<input type="file" name="fotoPerfil" id="fotoPerfil">

<h1>Escolha suas preferências</h1>
<?php
// sql que consulta os dados no banco
$sql = 'SELECT * FROM preferencias';
// executa o comando e retorna as informacoes
$resultado = mysqli_query($conexao,$sql);
// laco de repeticao que percorre todos os dados do resultado
while ($dados = mysqli_fetch_assoc($resultado)) {
    // imprimi na tela o input com os dados do banco
    echo '<input type="checkbox" value="'.$dados['PreferenciaID'].'" name="preferencia[]" id="">'.$dados['Nome'].'<br>';    
}
?>
<h1>Escolha a distancia</h1>
<input type="range" name="raioDistancia" id="">
<button type="submit">Enviar</button>
</form>
<?php
include_once './includes/footer.php';
?>