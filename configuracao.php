<?php 
include_once './includes/conexao.php';
include_once './includes/logado.php';
include_once './includes/header-configuracao.php';
?>
<body class="dark">
  <div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
      <ul>
        <button type="button" id="voltar"><img src="./assets/img/proximo.png" alt=""></button>
        <li data-section="conta" class="active">Conta</li>
        <li data-section="personalizacao">Personalização</li>
        <li data-section="suporte">Suporte</li>
        <li data-section="termos">Termos de Uso</li>
      </ul>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="content">
      <!-- CONTA -->
        <section id="conta" class="section active">
            <h2>Dados de Cadastro</h2>

            <div class="dados">
                <label>Nome completo</label>
                <input type="text" value="<?php
                $nome = $_SESSION['Usuario']['Nome_completo'];
                echo "$nome";
                ?>"/>

                <label>Nome de Usuário</label>
                <input type="text" value="<?php
                $user = $_SESSION['Usuario']['Usuario'];
                echo "$user";
                ?>"/>

                <label>Email</label>
                <input type="text" value="<?php
                $email = $_SESSION['Usuario']['Email'];
                echo "$email";
                ?>"/>

                <label>CEP</label>
                <input type="text" value="<?php
                $cep = $_SESSION['Usuario']['CEP'];
                echo "$cep";
                ?>"/>

                <label>Cidade</label>
                <input type="text" value="<?php
                $cidade = $_SESSION['Usuario']['Cidade'];
                echo "$cidade";
                ?>"/>

                <label>Estado</label>
                <input type="text" value="<?php
                $estado = $_SESSION['Usuario']['Estado'];
                echo "$estado";
                ?>"/>

                <label>Endereço</label>
                <input type="text" value="<?php
                $endereco = $_SESSION['Usuario']['Endereco'];
                echo "$endereco";
                ?>"/>

                <label>Número</label>
                <input type="text" value="<?php
                $numero = $_SESSION['Usuario']['Numero'];
                echo "$numero";
                ?>"/>

                <label>Senha</label>
                <input type="text" value="<?php
                $senha = $_SESSION['Usuario']['Senha'];
                echo "$senha";
                ?>"/>

            </div>
                <h2 class="action">Excluir Conta</h2>
                <h2 class="action">Sair</h2>
        </section>

      <!-- PERSONALIZAÇÃO -->
      <section id="personalizacao" class="section">
        <h2>Personalização</h2>

        <h3>Modo</h3>

        <!-- SWITCH COM IMAGENS -->
        <div class="switch-area custom-switch">
         

          <input type="checkbox" class="checkbox" id="chk" />

          <label class="label" for="chk">
            <div class="ball"></div>
          </label>

         
        </div>

        <!-- Fonte -->
        <div class="personal-item">
          <h3>Tamanho da Fonte<h3>
          <select id="fontSizeSelect">
            <option value="12px">Pequeno</option>
            <option value="14px" selected>Normal</option>
            <option value="16px">Médio</option>
            <option value="18px">Grande</option>
            <option value="20px">Extra Grande</option>
          </select>
        </div>

        <!-- Idioma -->
        <div class="personal-item">
          <h3>Idioma</h3>
          <div id="google_translate_element"></div>
        </div>
      </section>

      <!-- SUPORTE -->
      <section id="suporte" class="section">
        <h2>Central de Suporte</h2>
        <div class="faq-container">
          <div class="faq-item">
            <button class="faq-question">1. Como alterar dados?</button>
            <div class="faq-answer">Na aba “Conta”.</div>
          </div>

          <div class="faq-item">
            <button class="faq-question">2. Esqueci minha senha</button>
            <div class="faq-answer">Clique em “Esqueci minha senha”.</div>
          </div>

          <div class="faq-item">
            <button class="faq-question">3. Excluir conta?</button>
            <div class="faq-answer">Use o botão “Excluir Conta”.</div>
          </div>

          <div class="faq-item">
            <button class="faq-question">4. Meus dados estão seguros?</button>
            <div class="faq-answer">Sim. Protegidos pela LGPD.</div>
          </div>

          <div class="faq-item">
            <button class="faq-question">5. Contato com suporte?</button>
            <div class="faq-answer">Email: suporte@connect.com</div>
          </div>
        </div>
      </section>

      <section id="voltar" class="section">Voltar</section>
      <section id="termos" class="section">Termos de Uso</section>
    </main>
  </div>
<?php
  include_once './includes/footer-configuracao.php';
?>