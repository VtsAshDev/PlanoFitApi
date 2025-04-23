<?php

namespace App\Controller;

use App\Service\GeminiService;
use Exception;

class PlanoController
{
    public function gerarPlano(): void
    {
        $dados = json_decode(file_get_contents('php://input'), true);
        $gemini = new GeminiService();
        $path = __DIR__ . '/../prompts/plano_alimentar_prompt.txt';

        if (!file_exists($path)) {
            $this->respostaErro('Arquivo de prompt não encontrado.');
            return;
        }
          $template = file_get_contents($path);
        if ($template === false) {
            $this->respostaErro('Erro ao ler o arquivo de prompt.');
            return;
        }

        $dados = [
          'idade' => $dados['idade'],
          'altura' => $dados['altura'] ,
          'peso' => $dados['peso'],
          'objetivo' => $dados['objetivo'],
          'tmb' => $dados['tmb'],
        ];

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
            
           $this->respostaSucesso($text);
            exit;
        } catch (Exception $e) {
              $this->respostaErro('Erro ao gerar o plano: ' . $e->getMessage());
              return;
        }
    }

    private function respostaSucesso($dados): void
    {
        header('Content-Type: application/json');
        echo json_encode([
          'status' => 'success',
          'data' => $dados
        ]);
    }

    private function respostaErro($mensagem): void
    {
        header('Content-Type: application/json');
        echo json_encode([
          'status' => 'error',
          'message' => $mensagem
        ]);
    }
}
