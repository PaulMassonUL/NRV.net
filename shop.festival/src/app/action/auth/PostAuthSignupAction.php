<?php

namespace festochshop\shop\app\action\auth;

use festochshop\shop\app\action\Action;
use festochshop\shop\domaine\dto\auth\CredentialsDTO;
use festochshop\shop\domaine\service\auth\AuthServiceCredentialsException;
use festochshop\shop\domaine\service\auth\iAuth;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;

class PostAuthSignupAction extends Action
{

    private iAuth $serviceAuth;

    public function __construct(iAuth $serviceAuth)
    {
        $this->serviceAuth = $serviceAuth;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {

        if (!$rq->hasHeader('Authorization'))
            throw new HttpBadRequestException($rq, 'No credentials provided');

        try {
            $infos = $rq->getParsedBody();
            $email = isset($infos['email']) ? htmlspecialchars($infos['email']) : null;
            $password = isset($infos['password']) ? htmlspecialchars($infos['password']) : null;
            $first_name = isset($infos['first_name']) ? htmlspecialchars($infos['first_name']) : null;
            $last_name = isset($infos['last_name']) ? htmlspecialchars($infos['last_name']) : null;

            if (is_null($email) || is_null($password) || is_null($first_name) || is_null($last_name))
                throw new HttpBadRequestException($rq, 'Invalid credentials');

            $credentialsDTO = new CredentialsDTO($email, $password);
            $credentialsDTO->first_name = $first_name;
            $credentialsDTO->last_name = $last_name;

            $userDTO = $this->serviceAuth->signup($credentialsDTO);

            $rs->getBody()->write($tokenDTO->toJson());

            return $rs->withStatus(201);
        } catch (AuthServiceCredentialsException $e) {
            throw new HttpBadRequestException($rq, $e->getMessage());
        }
    }

}