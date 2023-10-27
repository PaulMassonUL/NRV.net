<?php

namespace festochshop\shop\domaine\middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpUnauthorizedException;

class Preflight
{
    public function __invoke(Request $rq, Response $rs, array $args): Response
    {
        if (!$rq->hasHeader('Origin')) throw new HttpUnauthorizedException($rq, "missing Origin Header in preflight (cors)");
        if (!$rq->hasHeader('Access-Control-Request-Headers')) throw new HttpUnauthorizedException($rq, "missing Access-Control-Request-Headers Header in preflight (cors)");
        if (!$rq->hasHeader('Access-Control-Request-Method')) throw new HttpUnauthorizedException($rq, "missing Access-Control-Request-Method Header in preflight (cors)");

        return $rs->withHeader('Access-Control-Allow-Origin', $rq->getHeaderLine('Origin'))
            ->withHeader('Access-Control-Allow-Headers', $rq->getHeaderLine('Access-Control-Request-Headers'))
            ->withHeader('Access-Control-Allow-Methods', $rq->getHeaderLine('Access-Control-Request-Method'))
            ->withHeader('Access-Control-Max-Age', 3600);
    }
}