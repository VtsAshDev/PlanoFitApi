<?php

namespace App\Service;

use App\Config\GeminiConfig;

class GeminiService
{
    private string $apiKey;
    private string $model;
    private string $baseUrl;

    public function __construct()
    {
        $this->apiKey = GeminiConfig::getApiKey();
        $this->model = 'gemini-2.0-flash';
        $this->baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/';
    }

    public function gerarPlano(string $mensagem): array
    {
        $url = $this->baseUrl . $this->model . ':generateContent?key=' . $this->apiKey;

        $body = json_encode([
            "contents" => [
                [
                    "parts" => [
                        ["text" => $mensagem]
                    ]
                ]
            ]
        ]);

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ],
            CURLOPT_POSTFIELDS => $body
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $erro = curl_error($ch);
            curl_close($ch);
            throw new \Exception("Erro ao chamar a API Gemini: $erro");
        }

        curl_close($ch);

        return json_decode($response, true);
    }
}
