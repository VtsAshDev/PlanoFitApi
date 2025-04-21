<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controller\PlanoController;

$data = json_decode(file_get_contents('php://input'), true);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$endpoint = basename($uri);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $endpoint === 'gerar-plano') {
    $controller = new PlanoController();
    $controller->gerarPlano($data);
} else {
    header('HTTP/1.1 404 Not Found');
    echo json_encode(['error' => 'Endpoint não encontrado']);
}

