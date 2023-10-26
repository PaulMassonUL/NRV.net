<?php

namespace festochshop\shop\app\action\shop;

use festochshop\shop\app\action\Action;
use festochshop\shop\domaine\service\evening\ServiceEveningNotFoundException;
use festochshop\shop\domaine\service\spot\iServiceSpot;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class GetAllSpotsAction extends Action
{

    private iServiceSpot $serviceEvening;

    public function __construct(iServiceSpot $serviceEvening)
    {
        $this->serviceEvening = $serviceEvening;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        try {
            $spots = $this->serviceEvening->getSpots();

            $data = [
                'type' => 'resource',
                'spots' => $spots,
            ];

            $rs->getBody()->write(json_encode($data));
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(200);

        } catch (ServiceEveningNotFoundException) {
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

    }

}