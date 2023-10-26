<?php

namespace festochshop\shop\app\action\shop;

use festochshop\shop\app\action\Action;
use festochshop\shop\domaine\service\evening\iServiceEvening;
use festochshop\shop\domaine\service\evening\ServiceEveningNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class GetAllDatesEveningAction extends Action
{

    private iServiceEvening $serviceEvening;

    public function __construct(iServiceEvening $serviceEvening)
    {
        $this->serviceEvening = $serviceEvening;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        try {
            $dates = $this->serviceEvening->getAllDates();

            $data = [
                'type' => 'resource',
                'dates' => $dates,
            ];

            $rs->getBody()->write(json_encode($data));
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(200);

        } catch (ServiceEveningNotFoundException) {
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

    }

}