<?php

namespace festochshop\auth\domaine\middleware;

use festochshop\auth\domaine\dto\TokenDTO;
use festochshop\auth\domaine\service\AuthServiceExpiredTokenException;
use festochshop\auth\domaine\service\AuthServiceInvalidTokenException;
use festochshop\auth\domaine\service\iAuth;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpUnauthorizedException;

class Jwt
{
    private iAuth $authService;

    public function __construct(iAuth $authService)
    {
        $this->authService = $authService;
    }

    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $next)
    {
        // middleware jwt qui vérifie si l'acces est autorisé avec le token
        // si oui, on continue
        // si non, on renvoie une erreur 401

//        try {
//            if (!$request->hasHeader('Authorization'))
//                throw new HttpUnauthorizedException($request, 'No authorization token provided');
//            $token = $request->getHeader('Authorization')[0];
//            $token = str_replace('Bearer ', '', $token);
//
//            $userDTO = $this->authService->validate(new TokenDTO($token));
//
//        } catch (AuthServiceExpiredTokenException $e) {
//            throw new HttpUnauthorizedException($request, 'Expired authorization token');
//        } catch (AuthServiceInvalidTokenException $e) {
//            throw new HttpUnauthorizedException($request, 'Invalid authorization token');
//        }
        return $next->handle($request);
    }
}