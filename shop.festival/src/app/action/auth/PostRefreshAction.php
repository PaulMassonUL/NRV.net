<?php

namespace festochshop\shop\app\action\auth;

use festochshop\shop\app\action\Action;
use festochshop\shop\domaine\dto\auth\TokenDTO;
use festochshop\shop\domaine\service\auth\AuthServiceInvalidTokenException;
use festochshop\shop\domaine\service\auth\iAuth;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpBadRequestException;

class PostRefreshAction extends Action
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
            $credentials = str_replace('Bearer ', '', $credentials);

            $tokenDTO = $this->serviceAuth->refresh(new TokenDTO(null, $credentials));

            $rs->getBody()->write($tokenDTO->toJson());

            return $rs->withStatus(201);
        } catch (AuthServiceInvalidTokenException $e) {
            throw new HttpBadRequestException($rq, $e->getMessage());
        }
    }

}