<?php

namespace festochshop\shop\app\action\shop;

use festochshop\shop\domaine\service\commande\iCommand;
use festochshop\shop\domaine\service\commande\ServiceCommandeInvalidException;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;

class PatchValiderCommandeAction

{
    private iCommand $commander;

    public function __construct(iCommand $commander)
    {
        $this->commander = $commander;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args['id_command'] ?? 0;

        $dataJson = [];

        $logger = new Logger('app.logger');
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../../../logs/errors.log', Level::Error));

        try {
            $service = $this->commander;
            $service->validerCommande($id);
        } catch (ServiceCommandeInvalidException $e) {
            if ($e->getCode() == 400) {
                throw new HttpBadRequestException($request, $e->getMessage());
            }
            if ($e->getCode() == 404) {
                throw new HttpNotFoundException($request, $e->getMessage());
            }
        }
        $dataJson['type'] = 'commande';
        $dataJson['status'] = 'success';
        $dataJson['commande'] = $service->accederCommande($id)->toArray();


        $response->getBody()->write(json_encode($dataJson));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);

    }
}