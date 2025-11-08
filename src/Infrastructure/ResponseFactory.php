<?php

namespace App\Infrastructure;

use Nyholm\Psr7\Response;

final class ResponseFactory
{
    /**
     * @param array<string, mixed> $data
     * @param array<string, mixed> $headers
     */
    public function createJson(array $data, int $status = 200, array $headers = []): Response
    {
        return new Response($status, headers: ['Content-Type' => 'application/json', ...$headers], body: json_encode($data, JSON_THROW_ON_ERROR));
    }
}
