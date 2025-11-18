<?php
include_once '../includes/conexao.php';

// captura os dados
$nome_completo = $_POST['nome_completo'];
$user = $_POST['user'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$senha = $_POST['senha'];

$enderecoCompleto = $endereco . ", " . 
                    $numero . ", " . 
                    $cidade . " - " . 
                    $estado . ", Brasil";

// Codifica para URL
$enderecoURL = urlencode($enderecoCompleto);

// Monta URL da API Nominatim
$url = "https://nominatim.openstreetmap.org/search?format=json&q={$enderecoURL}&limit=1";

// Cabeçalho obrigatório (User-Agent)
$opts = [
    "http" => [
        "header" => "User-Agent: MeuSistemaGeolocalizacao/1.0\r\n"
    ]
];

$context = stream_context_create($opts);

// Obter resultado
$resposta = @file_get_contents($url, false, $context);
$data = json_decode($resposta, true);

// Valores padrão caso falhe
$lat = null;
$lng = null;

// Se encontrou resultado
if (!empty($data)) {
    $lat = $data[0]["lat"];
    $lng = $data[0]["lon"];
}

// Agora faz **um único INSERT** com TODOS os dados
$sql = "INSERT INTO usuarios 
(Nome_completo, Usuario, Email, CEP, Estado, Cidade, Endereco, Numero, Senha, Latitude, Longitude) 
VALUES 
('{$nome_completo}', '{$user}', '{$email}', '{$cep}', '{$estado}', '{$cidade}', '{$endereco}', '{$numero}', '{$senha}', '{$lat}', '{$lng}')";

// executar no banco
mysqli_query($conexao, $sql);

// redireciona
header('Location: ../cadastro.php');
exit();

?>
