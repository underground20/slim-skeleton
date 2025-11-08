<?php

namespace App\Infrastructure\Middleware;

use App\Infrastructure\ResponseFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

class ExceptionHandler implements MiddlewareInterface
{
    public function __construct(
        private ResponseFactory $responseFactory,
        private LoggerInterface $logger,
    ) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (\Exception $exception) {
            $this->logger->error('Unhandled app exception', ['exception' => $exception]);

            return $this->responseFactory->createJson(['exception' => $exception->getMessage()], $exception->getCode());
        }
    }
}
