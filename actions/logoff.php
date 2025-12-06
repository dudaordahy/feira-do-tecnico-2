<?php
// inicia a sessao
session_start();
// torna a sessao vazia
$_SESSION['Usuario'] = '';
// destroi a sessao do usuario
$ok = session_destroy();

// redireciona no logoff    
header("Content-Type: application/json");

if ($ok) {
    echo json_encode(["status" => "ok"]);
} else {
    echo json_encode(["status" => "erro"]);
}
?>