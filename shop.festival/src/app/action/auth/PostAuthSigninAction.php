<?php

namespace festochshop\shop\app\action\auth;

use festochshop\shop\app\action\Action;
use festochshop\shop\domaine\dto\auth\CredentialsDTO;
use festochshop\shop\domaine\service\auth\AuthServiceCredentialsException;
use festochshop\shop\domaine\service\auth\iAuth;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpUnauthorizedException;

class PostAuthSigninAction extends Action
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
            $credentials = $rq->getHeader('Authorization')[0];
            $credentials = str_replace('Basic ', '', $credentials);
            $credentials = base64_decode($credentials);
            $credentials = explode(':', $credentials);

            $tokenDTO = $this->serviceAuth->signin(new CredentialsDTO($credentials[0], $credentials[1]));

            $rs->getBody()->write($tokenDTO->toJson());

            return $rs->withStatus(201);
        } catch (AuthServiceCredentialsException $e) {
            throw new HttpUnauthorizedException($rq, $e->getMessage());
        }
    }

}