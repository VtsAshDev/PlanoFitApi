<?php

namespace App\Router;

use App\Controller\PlanoController;

class Router
{
  private $routes = [];

  public function add($method, $path, $callback)
 {
    $this->routes[] = [
      'method' => $method,
      'path' => $path,
      'callback' => $callback
    ];
  }

}
