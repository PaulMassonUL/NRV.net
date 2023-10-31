<?php

namespace festochshop\shop\app\action\shop;

use festochshop\shop\domaine\service\commande\iCommand;
use festochshop\shop\domaine\service\commande\ServiceCommandeNotFoundException;
use festochshop\shop\domaine\service\evening\iServiceUser;
use festochshop\shop\domaine\service\evening\ServiceUserNotFoundException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpNotFoundException;

class GetCommandByUser
{

    private iCommand $command;

    public function __construct(iCommand $commander)
    {
        $this->command = $commander;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        $mail = $args['mail_client'] ?? 0;
        try {
            $service = $this->command;
            $commandsDto = $service->getAllCommandsByUser($mail);
            $commands = [];
            foreach ($commandsDto as $commandDTO) {
                $commands = $commandDTO->toArray();
            }
        } catch (ServiceCommandeNotFoundException $e) {
            throw new HttpNotFoundException($rq, $e->getMessage());
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            throw new HttpNotFoundException($rq, $e->getMessage());
        }

        $responseJson = [
            'type' => 'resource',
            'commands' => $commands
        ];

        $rs->getBody()->write(json_encode($responseJson));

        return $rs->withHeader('Content-Type', 'application/json')->withStatus(200);
    }

}