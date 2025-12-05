<?php
include_once './includes/conexao.php';
include_once './includes/logado.php';
include_once './includes/header.php';
?>
<div class="container_escolhas" id="container">
    <form id="form1" method="POST" action="./actions/foto-salva.php">
        <h1 class="txt_escolhas">Escolha sua foto de perfil</h1>
        <span class="escolher_img" onclick="document.getElementById('fileInput').click();">Escolher imagem</span>
        <input type="file" name="fotoPerfil" id="fileInput">
        <div id="preview"></div>
        <button id="btn1" type="submit"><img src="./assets/img/proximo.png" alt="proximo"></button>
    </form>

    <form id="form2" action="./actions/pref-salva.php" method="POST" style="display: none;">
        <h1 class="txt_escolhas">Escolha suas preferencias</h1>
        <ul id="listaPreferencias"></ul>
        <button type="submit" id="btn2"><img src="./assets/img/proximo.png" alt=""></button>
    </form> 

    <form action="./actions/distancia-salva.php" method="post" id="form3" style="display: none;">
        <h1 class="txt_escolhas">Escolha a distância</h1>
        <input type="range" name="raioDistancia" id="range" min="1000" max="10000" value="100">
        <button id="btn3" type="submit"><img src="./assets/img/proximo.png" alt=""></button>
    </form>

</div>

<div class="nav_bar_inline">
    <div class="cidade">
        <?php
        $cidade = $_SESSION['Usuario']['Cidade'];
        echo "<h1 id='txt_cidade'>$cidade</h1>";
        ?>
    </div>
    <div class="perfil">
        <button class="profile-circle"  id="openSidebar"><img id="img_perfil" src="./assets/img/user.png" alt=""></button>
    </div>
     <!-- Arrow q ao clicar fecha a sidebar -->
     <div class="sidebar" id="sidebar">
            <div class="arrow" id="closeSidebar">←</div>

            <!-- Foto de perfil e função trocar imagem -->
            <div class="circle" id="circle">
                <img src="Imagens/upload.png" class="upload-icon" id="icon-default" alt="Upload Icon">
                <img id="profile-img" alt="Foto" class="profile-img">
                <div class="overlay-text">Trocar imagem</div>
                <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file">
            </div>

            <!-- Input username -->
            <div class="form-group">
                <input type="text" id="username" placeholder="Seu nome..." class="username-input">
            </div>

            <!-- Big box preferências -->
            <div class="big-box">
                <ul>
                <li>
                    
                </li>
                </ul>
            </div>

            <!-- Bottom box distância -->
            <div class="form-group">
                <input type="number" id="distance" placeholder="Distância..." class="distance-input">
            </div>
            
            <!-- Footer box salvar alterações -->
            <div class="footer-box">
                <button id="saveChanges" class="save-btn">Salvar alterações</button>
            </div>
        </div>
    
</div>

<div class="nav_bar_coluna">
    <div class="direct">
        <a href="#" id="direct"><img src="./assets/img/direct.png" alt=""></a>
    </div>
    <div class="config">
        <a href="./configuracao.php" id="config"><img src="./assets/img/config.png" alt=""></a>
    </div>
</div>

<div class="card" id="card" style="display: none;">
    <img id="foto_perfil" src="">
    <p id="user"></p>
    <p id="preferencias"></p>
    <div id="button">
        <button type="submit" id="match"><img src="./assets/img/match.png"></button>
        <button type="submit" id="recusar"><img src="./assets/img/recusar.png"></button>
    </div>
</div>

<div id="map"></div>

<?php
include_once './includes/footer.php';
?>