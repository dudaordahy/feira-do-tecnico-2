<?php
// inicia a sessao
session_start();
// torna a sessao vazia
$_SESSION['Usuario'] = '';
// destroi a sessao do usuario
session_destroy();
// redireciona no logoff    
header('Location: ../cadastro.php');
?>