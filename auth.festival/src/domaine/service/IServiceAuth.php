<?php

namespace festochshop\auth\domaine\service;

interface IServiceAuth
{
    public function signup(CredentialsDTO $credentialsDTO): UserDTO;
    public function signin(CredentialsDTO $credentialsDTO): TokenDTO;
    public function validate(TokenDTO $tokenDTO): UserDTO;
    public function refresh(TokenDTO $tokenDTO): TokenDTO;
}