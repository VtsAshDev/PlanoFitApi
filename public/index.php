<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\PlanoController;
use App\Routes\Router;

$rotas = new Router();
$rotas->add(
    "POST",
    "gerar-plano",
[new PlanoController(),'gerarPlano']
);

$rotas->dispatch($_SERVER['REQUEST_METHOD'],
 $_SERVER['REQUEST_URI']);
