<?php

namespace festochshop\shop\app\action\auth;

use festochshop\shop\app\action\Action;
use festochshop\shop\domaine\dto\auth\CredentialsDTO;
use festochshop\shop\domaine\service\auth\AuthServiceCredentialsException;
use festochshop\shop\domaine\service\auth\iAuth;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PostAuthSignupAction extends Action
{

    private iAuth $serviceAuth;

    public function __construct(iAuth $serviceAuth)
    {
        $this->serviceAuth = $serviceAuth;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        try {
            $infos = $rq->getParsedBody();
//            $email = isset($infos['email']) ? htmlspecialchars($infos['email']) : null;
//            $password = isset($infos['password']) ? htmlspecialchars($infos['password']) : null;
//            $first_name = isset($infos['first_name']) ? htmlspecialchars($infos['first_name']) : null;
//            $last_name = isset($infos['last_name']) ? htmlspecialchars($infos['last_name']) : null;
            $email = htmlspecialchars($infos['email']);
            $password = htmlspecialchars($infos['password']);
            $first_name = htmlspecialchars($infos['first_name']);
            $last_name = htmlspecialchars($infos['last_name']);

            if (empty($email) || empty($password) || empty($first_name) || empty($last_name)) return $rs->withStatus(400);

            $credentialsDTO = new CredentialsDTO($email, $password);
            $credentialsDTO->first_name = $first_name;
            $credentialsDTO->last_name = $last_name;

            $userDTO = $this->serviceAuth->signup($credentialsDTO);

            $rs->getBody()->write($userDTO->toJson());
            return $rs->withStatus(201);
        } catch (AuthServiceCredentialsException) {
            return $rs->withStatus(401);
        }
    }

}