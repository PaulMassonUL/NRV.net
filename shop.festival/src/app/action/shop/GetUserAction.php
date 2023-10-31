<?php

namespace festochshop\shop\app\action\shop;

use festochshop\shop\app\action\Action;
use festochshop\shop\domaine\dto\auth\TokenDTO;
use festochshop\shop\domaine\service\auth\iAuth;
use festochshop\shop\domaine\service\user\iServiceUser;
use festochshop\shop\domaine\service\user\ServiceUserNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class GetUserAction extends Action
{

    private iAuth $serviceAuth;
    private iServiceUser $serviceUser;

    public function __construct(iAuth $serviceAuth, iServiceUser $serviceUser)
    {
        $this->serviceAuth = $serviceAuth;
        $this->serviceUser = $serviceUser;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        $token = $rq->getHeader('Authorization')[0];
        $token = str_replace('Bearer ', '', $token);

        $userDTO = $this->serviceAuth->validate(new TokenDTO($token));

        try {
            $userDTO = $this->serviceUser->getUserById($userDTO->email);

            $data = [
                'email' => $userDTO->email,
                'first_name' => $userDTO->first_name,
                'last_name' => $userDTO->last_name,
                'commands' => $userDTO->commands,
            ];

            $rs->getBody()->write(json_encode($data));
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(200);

        } catch (ServiceUserNotFoundException) {
            return $rs->withHeader('Content-Type', 'application/json')->withStatus(404);
        }

    }

}