<?php

if (!isset($_GET['endereco'])) {
    echo json_encode(["status" => "erro", "msg" => "Endereço não enviado"]);
    exit;
}

$endereco = urlencode($_GET['endereco']);

$url = "https://nominatim.openstreetmap.org/search?format=json&q={$endereco}&addressdetails=1&limit=1";

$opts = [
    "http" => [
        "header" => "User-Agent: MeuSistemaGeocode/2.0 (contato@exemplo.com)\r\n"
    ]
];

$context = stream_context_create($opts);

$resposta = @file_get_contents($url, false, $context);

if ($resposta === FALSE) {
    echo json_encode(["status" => "erro", "msg" => "Erro ao conectar com a API"]);
    exit;
}

$data = json_decode($resposta, true);

if (!empty($data)) {
    echo json_encode([
        "status" => "ok",
        "lat" => $data[0]["lat"],
        "lng" => $data[0]["lon"]
    ]);
} else {
    echo json_encode(["status" => "erro", "msg" => "Nenhum resultado encontrado"]);
}
?>
