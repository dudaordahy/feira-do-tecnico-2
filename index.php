<?php
include_once './includes/conexao.php';
include_once './includes/logado.php';
include_once './includes/header.php';
?>
<div class="container_escolhas">
    <form action="./actions/perfil-salvar.php" method="post" enctype="multipart/form-data">
        <h1>Escolha foto de perfil</h1>
        <span class="btn" onclick="document.getElementById('fileInput').click();">Escolher imagem</span>
        <input type="file" name="fotoPerfil" id="fileInput">
        <div id="preview"></div>
        <button type="submit">Enviar</button>
    </form>




<!-- <ul id="listaPreferencias"></ul> -->





</div>
<?php
include_once './includes/footer.php';
?>