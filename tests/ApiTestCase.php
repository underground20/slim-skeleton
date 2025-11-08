<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Slim\App;

class ApiTestCase extends TestCase
{
    private App $app;
    private ContainerInterface $container;

    protected function setUp(): void
    {
        $this->container = require __DIR__  . '/../config/container.php';
        $this->app = (require __DIR__. '/../config/app.php')($this->container);
    }

    protected function request(string $method, string $uri, array $serverParams = []): ResponseInterface
    {
        /** @var ServerRequestFactoryInterface $factory */
        $factory = $this->container->get(ServerRequestFactoryInterface::class);
        $request = $factory->createServerRequest($method, $uri, $serverParams);

        return $this->app->handle($request);
    }

    /** @return array<string, mixed> */
    protected function getResponseContent(ResponseInterface $response): array
    {
        $content = $response->getBody()->getContents();

        return json_decode($content, true, 512, JSON_THROW_ON_ERROR);
    }
}
