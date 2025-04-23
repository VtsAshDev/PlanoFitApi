<?php

use PHPUnit\Framework\TestCase;

use App\Config\GeminiConfig;

use App\Service\GeminiService;


final class GeminiServiceTest extends TestCase
{
    public function testGerarPlano(): void
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $this->assertNotNull($_ENV['GEMINI_API_KEY'], 'A chave da API não está definida no arquivo .env');

        $apiKey = GeminiConfig::getApiKey();
        $this->assertEquals($_ENV['GEMINI_API_KEY'], $apiKey);

        $service = new GeminiService();

        $mensagem = "Crie um plano alimentar";
        $response = $service->gerarPlano($mensagem);

        $this->assertIsArray($response, 'A resposta da API não é um array');
        $this->assertArrayHasKey('candidates', $response, 'A resposta da API não contém a chave "candidates"');
    }
}