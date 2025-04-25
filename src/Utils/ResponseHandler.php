<?php

namespace App\Utils;

trait ResponseHandler
{
    public function sendJsonResponse(string $status, string $message, mixed $data): void
    {
        if (!headers_sent()) {
            header('Content-Type: application/json');
        }

        $response = [
            'timestamp' => date('Y-m-d H:i:s'),
            'status' => $status,
            'message' => $message,
            'code' => http_response_code(),
            'data' => $data,
        ];

      echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function sucess(string $message, mixed $data = null): void
    {
        $this->sendJsonResponse('success', $message, $data);
    }

    public function error(string $message, mixed $data = null): void
    {
        $this->sendJsonResponse('error', $message, $data);
    }

}
