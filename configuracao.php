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
        <button type="button" id="voltar"><img src="./assets/img/voltar.png" alt=""></button>
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
                
                <!-- <button type="submit">Salvar</button> -->
            </div>
            <div class="btns">
                <h2 id="txt_sair">Deseja sair do connect?</h2>
                <button type="button" id="excluir">Excluir Conta</button>
                <button type="button" id="sair">Sair</button>
              </div>
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
            <button class="faq-question">1. Como posso alterar meus dados?<button>
            <div class="faq-answer">Você pode editar suas informações pessoais acessando a aba “Conta” no menu principal. Lá é possível atualizar nome, foto, endereço, localização e outras preferências.</div>
          </div>

          <div class="faq-item">
            <button class="faq-question">7. Outros usuários podem ver meu endereço?</button>
            <div class="faq-answer">Não. Seu endereço completo nunca é exibido publicamente. Apenas informações que você habilitar para compartilhar serão mostradas.</div>
          </div>

          <div class="faq-item">
            <button class="faq-question">3. Como excluir minha conta?</button>
            <div class="faq-answer">Dentro das configurações, selecione “Excluir Conta”. Após confirmar, todos os seus dados serão removidos permanentemente do sistema.</div>
          </div>

          <div class="faq-item">
            <button class="faq-question">4. Meus dados estão seguros?</button>
            <div class="faq-answer">Sim. Todas as informações são armazenadas seguindo padrões de segurança e protegidas conforme a LGPD (Lei Geral de Proteção de Dados).</div>
          </div>

          <div class="faq-item">
            <button class="faq-question">5. Como entrar em contato com o suporte?</button>
            <div class="faq-answer">Você pode falar com nossa equipe pelo e-mail: conecta@gmail.com</div>
          </div>
        </div>

      </section>

      <section id="voltar" class="section">Voltar</section>
      <section id="termos" class="section">
      <h1>Política de Privacidade</h1>
    <p>Última atualização: 2025</p>

    <h2>1. Coleta de Dados</h2>
    <p>Nosso site coleta informações fornecidas pelo usuário, incluindo nome completo, endereço, CEP, e-mail, imagem de perfil e mensagens enviadas dentro da plataforma. Também podemos coletar localização, caso o usuário permita.</p>

    <h2>2. Uso dos Dados</h2>
    <p>Os dados são utilizados para criar contas, conectar usuários da mesma cidade, permitir envio de mensagens, exibir perfis públicos e melhorar a segurança e funcionamento do sistema.</p>

    <h2>3. Compartilhamento</h2>
    <p>Os dados não são vendidos. Informações como foto, nome e localização só são exibidas a outros usuários quando o próprio usuário permitir.</p>

    <h2>4. Segurança</h2>
    <p>Tomamos medidas básicas para proteger os dados, evitando acesso não autorizado, mas nenhum sistema é 100% seguro.</p>

    <h2>5. Permissões de Localização</h2>
    <p>A localização só é usada quando o usuário habilita essa função e pode ser desativada a qualquer momento.</p>

    <h2>6. Exclusão de Dados</h2>
    <p>O usuário pode solicitar a exclusão da conta e de seus dados entrando em contato com o suporte.</p>


    <h1>Termos de Uso</h1>

    <h2>1. Uso da Plataforma</h2>
    <p>O usuário concorda em usar a plataforma de forma responsável, sem enviar conteúdo ofensivo, ilegal ou que viole direitos de terceiros.</p>

    <h2>2. Mensagens</h2>
    <p>O site oferece troca de mensagens entre usuários, mas não nos responsabilizamos pelo conteúdo enviado por terceiros.</p>

    <h2>3. Conta do Usuário</h2>
    <p>O usuário é responsável por manter suas informações corretas e proteger seus dados de acesso.</p>

    <h2>4. Modificações</h2>
    <p>Podemos alterar estes termos e políticas a qualquer momento, sempre exibindo a data da última atualização.</p>
  </section>
    </main>
  </div>
<?php
  include_once './includes/footer-configuracao.php';
?>