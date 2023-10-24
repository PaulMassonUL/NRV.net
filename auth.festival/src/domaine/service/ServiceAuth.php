<?php

namespace festochshop\auth\domaine\service;

use festochshop\auth\domaine\provider\AuthProvider;

class ServiceAuth implements IServiceAuth
{

    private AuthProvider $authProvider;
    private JwtManager $jwtManager;
    private LoggerInterface $logger;

    public function __construct(AuthProvider $authProvider, JwtManager $jwtManager, LoggerInterface $logger)
    {
        $this->authProvider = $authProvider;
        $this->jwtManager = $jwtManager;
        $this->logger = $logger;
    }

    /**
     * @throws AuthServiceSignupException
     */
    public function signup(CredentialsDTO $credentialsDTO): UserDTO
    {
        try {
            $this->authProvider->register($credentialsDTO->email, $credentialsDTO->password);
        } catch (AuthProviderSignupException $e) {
            $this->logger->warning($e->getMessage());
            throw new AuthServiceSignupException($e->getMessage());
        }
    }

    /**
     * @throws AuthServiceCredentialsException
     */
    public function signin(CredentialsDTO $credentialsDTO): TokenDTO
    {
        try {
            $this->authProvider->checkCredentials($credentialsDTO->email, $credentialsDTO->password);
        } catch (AuthProviderCredentialsException $e) {
            $this->logger->warning('auth attent failed for '.$credentialsDTO->email.' : '.$e->getMessage());
            throw new AuthServiceCredentialsException($e->getMessage());
        }
    }

    /**
     * @throws AuthServiceValidateException
     */
    public function validate(TokenDTO $tokenDTO): UserDTO
    {
        try {
            $payload = $this->jwtManager->validate($tokenDTO->token);
        } catch (JwtManagerException $e) {
            throw new AuthServiceValidateException("Expired jwt token, try refreshing it");
        }
    }

    public function refresh(TokenDTO $tokenDTO): TokenDTO
    {
        try {
            $this->authProvider->checkToken($tokenDTO->refreshToken);
        } catch (AuthProviderRefreshTokenException $e) {
            $this->logger->warning("failed JWT refresh");
        }
    }
}