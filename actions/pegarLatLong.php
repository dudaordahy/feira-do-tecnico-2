<?php 
include_once '../includes/conexao.php';
include_once '../includes/logado.php';

$latitude = $_SESSION['Usuario']['Latitude'];
$longitude = $_SESSION['Usuario']['Longitude'];

header('Content-Type: application/json');
echo json_encode([
    "latitude" => floatval($latitude),
    "longitude" => floatval($longitude)
]);
exit;
