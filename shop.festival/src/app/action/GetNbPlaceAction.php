<?php

namespace festochshop\shop\app\action;

use festochshop\shop\domaine\service\evening\iServiceEvening;
use festochshop\shop\domaine\service\evening\ServiceEveningNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetNbPlaceAction extends Action
{

    private iServiceEvening $serviceEvening;

    public function __construct(iServiceEvening $serviceEvening)
    {
        $this->serviceEvening = $serviceEvening;
    }


    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        try {
            $places = $this->serviceEvening->getPlaceByEvening($args['id']);

            $data = [
                'type' => 'resource',
                'places' => $places,
            ];

            $rs->getBody()->write(json_encode($data));
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(200);

        } catch (ServiceEveningNotFoundException) {
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(404);
        }
    }
}