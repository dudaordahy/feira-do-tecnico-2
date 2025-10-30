<?php
// se a sessao estiver vazia e ela nao for criada
if( empty($_SESSION['Usuario']) && !isset($_SESSION['Usuario'])){
    header('Location: ./cadastro.php?');
}
?>