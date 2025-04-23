<?php

use PHPUnit\Framework\TestCase;

use App\Config\GeminiConfig;

final class GeminiConfigTest extends TestCase
{
    public function testGetApiKey(): void
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $this->assertNotNull($_ENV['GEMINI_API_KEY'], 'A chave da API não está definida no arquivo .env');

        $apiKey = GeminiConfig::getApiKey();
        $this->assertEquals($_ENV['GEMINI_API_KEY'], $apiKey);
    }
}