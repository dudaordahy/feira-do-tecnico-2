<?php
include_once './includes/conexao.php';
include_once './includes/header-cadastro.php';
?>
<div class="container">
        <div class="form-box">
            <form action="./actions/login.php" method="post">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Usuário" name="user" required>
                    <img src="./assets/img/usu.novo.jfif" class="usuario">
                </div>

                <div class="input-box">
                    <input type="password" placeholder="Senha" name="senha" required>
                    <img src="./assets/img/cadeado.novo.jfif" class="cadeado">
                </div>

                <button type="submit" class="btn">Login</button>
            
            </form>
        </div>

        <div class="form-box cadastro">
            <form action="./actions/cadastro-usuario.php" method="post">
                <h1>Cadastro</h1>
                 <div class="input-box">
                    <input type="text" placeholder="Nome completo" name="nome_completo" required>
                    <img src="./assets/img/nome.novo.jfif" class="usuario">
                </div>

                <div class="input-box">
                    <input type="text" placeholder="Nome de usuário" name="user"required>
                    <img src="./assets/img/usu.novo.jfif" class="usuario">
                </div>

                <div class="input-box">
                    <input type="email" placeholder="Email" name="email" required>
                     <img src="./assets/img/email.novo.jfif" class="usuario">
                </div>
                
                <div class="input-box">
                    <input type="text" placeholder="CEP" id="cep" name="cep" required>
                     <img src="./assets/img/loca.novo.jfif" class="usuario">
                </div>

                <div class="input-box">
                    <input type="text" placeholder="Estado" id="estado" name="estado" required>
                </div>

                <div class="input-box">
                    <input type="text" placeholder="Cidade" id="cidade" name="cidade" required>
                </div> 

                <div class="input-box">
                    <input type="text" placeholder="Rua" id="rua" name="endereco" required>
                </div>

                <div class="input-box">
                    <input type="number" placeholder="Número" name="numero" required>
                </div>

                <div class="input-box">
                    <input type="password" placeholder="Senha" name="senha" required>
                   <img src="./assets/img/cadeado.novo.jfif" class="cadeado">
                </div>

                <button type="submit" class="btn">Cadastrar</button>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Olá, seja bem-vinda(o)!</h1>
                <p>Não tem uma conta?</p>
                <button class="btn cadastro-btn">Cadastre-se</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Bem-vinda(o) de volta!</h1>
                <p>Já tem uma conta?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
</div>

<?php
include_once './includes/footer-cadastro.php';
?>