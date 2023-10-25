<?php

namespace festochshop\auth\domaine\manager;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtManager implements iJwtManager
{
    private string $secret;
    private string $alg;
    private int $expirationTime;

    private string $issuer;

    public function __construct(string $secret, int $expirationTime)
    {
        $this->secret = $secret;
        $this->expirationTime = $expirationTime;
        $this->alg = "HS256";
    }

    public function setIssuer(string $issuer): void
    {
        $this->issuer = $issuer;
    }

    public function create(array $payload): string
    {
        return JWT::encode([
            "iss" => $this->issuer,
            "iat" => time(),
            "exp" => time() + $this->expirationTime,
            "upr" => $payload
        ], $this->secret, $this->alg);
    }

    /**
     * @throws JwtManagerExpiredTokenException
     * @throws JwtManagerInvalidTokenException
     */
    public function validate(string $t): array
    {
        try {
            $jwt = JWT::decode($t, new Key($this->secret, $this->alg));
        } catch (ExpiredException) {
            throw new JwtManagerExpiredTokenException("Expired token");
        } catch (\Exception) {
            throw new JwtManagerInvalidTokenException("Invalid token");
        }
        return (array)$jwt->upr;
    }
}