<?php

namespace festochshop\shop\app\action\shop;

use festochshop\shop\domaine\service\commande\iCommand;
use festochshop\shop\domaine\service\commande\ServiceCommandeNotFoundException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Routing\RouteContext;

class GetCommandAction
{
    private iCommand $command;

    public function __construct(iCommand $commander)
    {
        $this->command = $commander;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'] ?? 0;
        try {
            $service = $this->command;
            $commandeDto = $service->accederCommande($id);
        } catch (ServiceCommandeNotFoundException $e) {
            throw new HttpNotFoundException($request, $e->getMessage());
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            throw new HttpNotFoundException($request, $e->getMessage());
        }

        $responseJson = [
            'type' => 'resource',
            'commande' => $commandeDto->toArray()
        ];

        $response->getBody()->write(json_encode($responseJson));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }

}