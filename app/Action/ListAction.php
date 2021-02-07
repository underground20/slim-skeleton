<?php

namespace App\Action;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpNotFoundException;
use Twig\Environment;

class ListAction implements RequestHandlerInterface
{
    private $em;
    private $view;

    public function __construct(EntityManagerInterface $em, Environment $view)
    {
        $this->em = $em;
        $this->view = $view;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $userRepo = $this->em->getRepository(User::class);
        $users = $userRepo->findAll();
        $response = new Response();
        $view = $this->view->render('list.twig', [
            'users' => $users
        ]);
        $response->getBody()->write($view);
        return $response;
    }
}