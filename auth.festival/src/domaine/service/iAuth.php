<?php

namespace festochshop\auth\domaine\service;

use festochshop\auth\domaine\dto\CredentialsDTO;
use festochshop\auth\domaine\dto\TokenDTO;
use festochshop\auth\domaine\dto\UserDTO;

interface iAuth
{

    public function signup(CredentialsDTO $c) : UserDTO;

    public function signin(CredentialsDTO $c) : TokenDTO;

    public function validate(TokenDTO $t) : UserDTO;

    public function refresh(TokenDTO $t) : TokenDTO;

    public function activate_signup(TokenDTO $t) : void;

    public function reset_password(TokenDTO $t, CredentialsDTO $c, string $newPassword) : void;

}