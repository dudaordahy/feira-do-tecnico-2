<?php
include_once './includes/conexao.php';
include_once './includes/logado.php';
include_once './includes/header.php';
?>
<div class="container_escolhas">
    <form id="form_foto" action="./actions/foto-salva.php" method="post" enctype="multipart/form-data">
        <h1 id="txt_foto">Escolha sua foto de perfil</h1>
        <span class="btn" onclick="document.getElementById('fileInput').click();">Escolher imagem</span>
        <input type="file" name="fotoPerfil" id="fileInput">
        <div id="preview"></div>
        <button id="proximo" type="submit"><img src="./assets/img/proximo.png" alt=""></button>
    </form>
</div>

<div class="nav_bar_inline">
    <div id="cidade">
        <?php
        $cidade = $_SESSION['Usuario']['Cidade'];
        // Exibe
        echo "<h1 id='txt_cidade'>$cidade</h1>";
        ?>
    </div>
    <div id="perfil">
        <a href="#" id="btn_perfil"><img src="#" alt=""></a>
    </div>
</div>

<div class="nav_bar_coluna">
    <div id="direct">
        <a href="#"><img src="#" alt=""></a>
    </div>
    <div id="config">
        <a href="#"><img src="#" alt=""></a>
    </div>
</div>

    <!-- <ul id="listaPreferencias"></ul> -->
<?php
include_once './includes/footer.php';
?>