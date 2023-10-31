<?php

namespace festochshop\shop\app\action\shop;

use festochshop\shop\app\action\Action;
use festochshop\shop\domaine\service\evening\iServiceUser;
use festochshop\shop\domaine\service\evening\ServiceUserNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class GetAllThematicAction extends Action
{

    private iServiceUser $serviceEvening;

    public function __construct(iServiceUser $serviceUser)
    {
        $this->serviceEvening = $serviceUser;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        try {
            $thematics = $this->serviceEvening->getAllThematics();

            $data = [
                'type' => 'resource',
                'thematics' => $thematics,
            ];

            $rs->getBody()->write(json_encode($data));
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(200);

        } catch (ServiceUserNotFoundException) {
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

    }

}