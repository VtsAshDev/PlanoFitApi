<?php 

namespace App\Controller;

use App\Service\GeminiService;
use Exception;

class PlanoController
{
  public function gerarPlano($dados)
  {
    $gemini = new GeminiService();
    
    $path = __DIR__ . '/../prompts/plano_alimentar_prompt.txt';
    if (!file_exists($path)) {
      return $this->respostaErro('Arquivo de prompt não encontrado.');
    }
    $template = file_get_contents($path);
    if ($template === false) {
      return $this->respostaErro('Erro ao ler o arquivo de prompt.');
    }
    
    $dados = [
      'idade' => $dados['idade'],
      'altura' => $dados['altura'] ,
      'peso'=> $dados['peso'],
      'objetivo' => $dados['objetivo'],
    ];

    $prompt = strtr($template, [
      '{{idade}}' => $dados['idade'],
      '{{altura}}' => $dados['altura'],
      '{{peso}}' => $dados['peso'],
      '{{objetivo}}' => $dados['objetivo'],
    ]);

    try {
      $resposta = $gemini->gerarPlano($prompt);
      $text = $resposta['candidates'][0]['content']['parts'][0]['text'] ?? 'Nenhum texto encontrado na resposta';
      
      header('Content-Type: application/json');
      echo json_encode([
          'status' => 'sucesso',
          'resposta' => $text
      ]);
      exit;
    } catch (Exception $e) {
      return "Erro: " . $e->getMessage();
    }
  }

  private function respostaSucesso($dados)
  {
    header('Content-Type: application/json');
    echo json_encode([
      'status' => 'success',
      'data' => $dados
    ]);
  }

  private function respostaErro($mensagem)
  {
    header('Content-Type: application/json');
    echo json_encode([
      'status' => 'error',
      'message' => $mensagem
    ]);
  }

}