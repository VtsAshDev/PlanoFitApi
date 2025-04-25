<?php

namespace App\Controller;

use App\Service\GeminiService;
use App\Utils\ResponseHandler;
use Exception;

class PlanoController
{
    use ResponseHandler;

    public function gerarPlano(): void
    {
        $dados = json_decode(file_get_contents('php://input'), true);
        $gemini = new GeminiService();
        $path = __DIR__ . '/../prompts/plano_alimentar_prompt.txt';

        if (!file_exists($path)) {
            throw new Exception('Erro ao ler o arquivo de prompt.');
            return;
        }
          $template = file_get_contents($path);
        if ($template === false) {
            throw new Exception('Erro ao ler o arquivo de prompt.');
            return;
        }

        $prompt = strtr($template, [
            '{{idade}}' => $dados['idade'],
            '{{altura}}' => $dados['altura'],
            '{{peso}}' => $dados['peso'],
            '{{objetivo}}' => $dados['objetivo'],
            '{{tmb}}' => $dados['tmb'],
            ]);

        try {
            $resposta = $gemini->gerarPlano($prompt);

            $text = $resposta['candidates'][0]['content']['parts'][0]['text'] ?? 'Nenhum texto encontrado na resposta';
            $text = nl2br($text);
            $this->sendJsonResponse('success', 'Plano gerado com sucesso', $text);
            exit;
        } catch (Exception $e) {
              $this->error('Erro ao gerar o plano: ' . $e->getMessage());
              return;
        }
    }
}
