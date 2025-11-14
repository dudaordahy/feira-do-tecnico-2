<?php
include_once './includes/conexao.php';
include_once './includes/header.php';
?>
<form action="./actions/login.php" method="post">
    <h1>Login</h1>
    <label for="usuario">Usuário</label><br>
    <input type="text" id="user" name="user"><br>
    <label for="senha">Senha</label><br>
    <input type="password" id="senha" name="senha"><br><br>
    <button type="submit">Enviar</button>
</form>
<hr>
<form action="./actions/cadastro-usuario.php" method="post">
    <h1>Cadastro</h1>
    <label for="nome">Nome</label><br>
    <input type="text" id="nome" name="nome"><br>
    <label for="sobrenome">Sobrenome</label><br>
    <input type="text" id="sobrenome" name="sobrenome"><br>
    <label for="user">Nome de usuário</label><br>
    <input type="text" id="user" name="user"><br>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="cep">CEP</label><br>
    <input type="text" id="cep" name="cep"><br>
    <label for="estado">Estado</label><br>
    <input type="text" id="estado" name="estado"><br>
    <label for="cidade">Cidade</label><br>
    <input type="text" id="cidade" name="cidade"><br>
    <label for="endereco">Endereço</label><br>
    <input type="text" id="endereco" name="endereco"><br>
    <label for="numero">Numero</label><br>
    <input type="number" id="numero" name="numero"><br>
    <label for="complemento">Complemento</label><br>
    <input type="text" id="complemento" name="complemento"><br>
    <label for="senha">Senha</label><br>
    <input type="password" id="senha" name="senha"><br><br>
    <input type="hidden" name="longitude" value="-23.000">
    <input type="hidden" name="latitude" value="23.000">
    <button type="submit">Enviar</button>
</form>


<?php
include_once './includes/footer.php';
?>