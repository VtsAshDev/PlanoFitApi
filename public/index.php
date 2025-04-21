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

$data = json_decode(file_get_contents('php://input'), true);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$endpoint = basename($uri);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new PlanoController();
    $controller->gerarPlano($data);
} else {
    header('HTTP/1.1 404 Not Found');
    echo json_encode(['error' => 'Endpoint não encontrado']);
}

