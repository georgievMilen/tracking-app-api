<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class APIResponse
{
    public function __construct(protected bool $success, protected string $message, protected int $httpCode = 200, protected ?array $data = null)
    {
    }

    public static function success(string $message, int $httpCode = 200, ?array $data = null): self
    {
        return new self(true, $message, $httpCode, $data);
    }

    public static function fail(string $message, int $httpCode, ?array $data = null): self
    {
        return new self(false, $message, $httpCode, $data);
    }

    public static function notFound(?array $data = null, string $message = 'Not found'): self
    {
        return new self(false, $message, 404, $data);
    }

    public function json(): JsonResponse
    {
        $response = [
            'message' => $this->message,
        ];

        if ($this->success) {
            $response['data'] = $this->data;
        } else {
            $response['errors'] = $this->data;
        }

        return response()->json($response, $this->httpCode);
    }
}
