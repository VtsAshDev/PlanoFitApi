<?php

namespace App\Config;

use Dotenv\Dotenv;

class GeminiConfig
{
    public static function getApiKey(): string
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->safeLoad();

        $apiKey = $_ENV['GEMINI_API_KEY'] ?? null;
        return $apiKey ?: 'Chave da api não encontrada';
    }
}
