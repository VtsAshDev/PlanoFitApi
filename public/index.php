<?php

$allowed_origin = 'https://plano-fit.vercel.app';

if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
    header("Access-Control-Allow-Origin: $allowed_origin");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\PlanoController;



$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$endpoint = basename($uri);

if ($endpoint === 'gerar-plano' && $method === 'POST') {
    $controller = new PlanoController();
    $controller->gerarPlano();
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint não encontrado']);
}
