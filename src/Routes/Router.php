<?php

namespace App;

class Router
{
  private array $routes = [];

  public function get(string $path, callable $callback): void
  {
    $this->routes['GET'][$path] = $callback;
  }

  public function dispatch(string $path, callable $callback): void
  {
    $this->routes['POST'][$path] = $callback;
  }
}