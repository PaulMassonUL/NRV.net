<?php

namespace festochshop\shop\app\action\shop;

use festochshop\shop\app\action\Action;
use festochshop\shop\domaine\service\evening\iServiceUser;
use festochshop\shop\domaine\service\evening\ServiceUserNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class GetEveningByIdAction extends Action
{

    private iServiceUser $serviceEvening;

    public function __construct(iServiceUser $serviceUser)
    {
        $this->serviceEvening = $serviceUser;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        try {
            $show = $this->serviceEvening->getEveningById($args['id']);

            $data = [
                'type' => 'resource',
                'evening' => [
                    'id' => $show->id,
                    'name' => $show->name,
                    'thematic' => $show->thematic,
                    'date' => $show->date,
                    'price' => $show->price,
                    'reduced_price' => $show->reduced_price,
                    'spot' => $show->spot,
                    'shows' => $show->shows
                ],
            ];

            $rs->getBody()->write(json_encode($data));
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(200);

        } catch (ServiceUserNotFoundException) {
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

    }

}