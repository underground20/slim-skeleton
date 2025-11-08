<?php

namespace App\Http;

use App\Infrastructure\ResponseFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class IndexAction implements RequestHandlerInterface
{
    public function __construct(private ResponseFactory $responseFactory)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responseFactory->createJson(['app' => 'Slim']);
    }
}
