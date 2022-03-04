<?php

namespace App\Action;

use App\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpNotFoundException;

class IndexAction implements RequestHandlerInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');
        $userRepo = $this->em->getRepository(User::class);
        if ($user = $userRepo->find($id)) {
            return new JsonResponse(['user' => $user->getName()]);
        }
        throw new HttpNotFoundException($request);
    }
}
