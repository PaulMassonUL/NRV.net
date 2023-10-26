<?php

namespace festochshop\shop\domaine\middlewares;

use festochshop\shop\domaine\dto\auth\TokenDTO;
use festochshop\shop\domaine\service\auth\AuthServiceExpiredTokenException;
use festochshop\shop\domaine\service\auth\AuthServiceInvalidTokenException;
use festochshop\shop\domaine\service\auth\iAuth;
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

        if (!$request->hasHeader('Authorization'))
            throw new HttpUnauthorizedException($request, 'No authorization token provided');

        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();

        try {
            $token = $request->getHeader('Authorization')[0];
            $token = str_replace('Bearer ', '', $token);

            $userDTO = $this->authService->validate(new TokenDTO($token));

        } catch (AuthServiceInvalidTokenException) {
            // Le serveur répond avec un code 401 et une url de redirection vers l'authentification

            return $next->handle($request)->withStatus(401)->withHeader('Location', $routeParser->urlFor('postAuthSignin'));
        } catch (AuthServiceExpiredTokenException) {
            // Lorsque l'access token n'est plus valide, le client utilise le refresh token pour obtenir un nouvel access token

            return $next->handle($request)->withStatus(401)->withHeader('Location', $routeParser->urlFor('postRefresh'));
        }

        return $next->handle($request);
    }
}