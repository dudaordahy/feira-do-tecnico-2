<?php
include_once './includes/conexao.php';
include_once './includes/logado.php';
include_once './includes/header.php';
?>
<div class="container_escolhas" id="container">
        <form id="form1" action="./actions/foto-salva.php">
            <h1 class="txt_escolhas">Escolha sua foto de perfil</h1>
            <span class="escolher_img" onclick="document.getElementById('fileInput').click();">Escolher imagem</span>
            <input type="file" name="fotoPerfil" id="fileInput">
            <div id="preview"></div>
            <button id="btn1" type="submit"><img src="./assets/img/proximo.png" alt="proximo"></button>
        </form>

        <form id="form2" action="./actions/pref-salva.php" style="display: none;">
            <h1 class="txt_escolhas">Escolha suas preferencias</h1>
            <ul id="listaPreferencias"></ul>
            <button type="submit" id="btn2"><img src="./assets/img/proximo.png" alt=""></button>
        </form>

        <form action="./actions/distancia-salva.php" id="form3" style="display: none;">
            <h1 class="txt_escolhas">Escolha a distância</h1>
            <input type="range" id="range" min="200" max="10000" value="200">
            <button id="btn3" type="submit"><img src="./assets/img/proximo.png" alt=""></button>
        </form>
    </div>

<div class="nav_bar_inline">
    <div id="cidade">
        <?php
        $cidade = $_SESSION['Usuario']['Cidade'];
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

<div id="map"></div>

<?php
include_once './includes/footer.php';
?>