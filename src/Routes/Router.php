<?php

namespace App\Routes;

use Dotenv\Dotenv;

class Router
{
    private array $routes = [];

    public function __construct()
    {
      $allowed_origin = $_ENV['APP_URL'] ?? 'http://localhost:5173';

      if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
        header("Access-Control-Allow-Origin: $allowed_origin");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
      }

      if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(204);
        exit;
      }
    }

    public function add(string $method, string $path, mixed $handler): void
    {
        $this->routes[] = compact(
            "method", "path",
            "handler"
        );
    }

    public function dispatch(string $method, string $path): void
    {
        $path = parse_url($path, PHP_URL_PATH);
        $path = basename($path);

        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $route['path'] == $path) {
                call_user_func($route['handler']);
                return;
            }
        }

        http_response_code(404);
        echo json_encode(['error' => 'Endpoint não encontrado']);
    }
}
