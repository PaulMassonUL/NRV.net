<?php

namespace festochshop\auth\app\action;

use festochshop\auth\domaine\dto\CredentialsDTO;
use festochshop\auth\domaine\service\AuthServiceCredentialsException;
use festochshop\auth\domaine\service\iAuth;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;

class PostAuthAction extends Action
{

    private iAuth $serviceAuth;

    public function __construct(iAuth $serviceAuth)
    {
        $this->serviceAuth = $serviceAuth;
    }

    public function __invoke(Request $rq, Response $rs, array $args): Response
    {

        // signin : credentials -> Authorization basic access au format iduser:password encodé en base64
        if (!$rq->hasHeader('Authorization'))
            throw new HttpBadRequestException($rq, 'No credentials provided');

        try {
            $credentials = $rq->getHeader('Authorization')[0];
            $credentials = str_replace('Basic ', '', $credentials);
            $credentials = base64_decode($credentials);
            $credentials = explode(':', $credentials);

            $tokenDTO = $this->serviceAuth->signin(new CredentialsDTO($credentials[0], $credentials[1]));

            $rs->getBody()->write($tokenDTO->toJson());

            return $rs->withStatus(200);
        } catch (AuthServiceCredentialsException $e) {
            throw new HttpBadRequestException($rq, $e->getMessage());
        }
    }

}