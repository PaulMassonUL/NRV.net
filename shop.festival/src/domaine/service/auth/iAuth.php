<?php

namespace festochshop\shop\domaine\service\auth;

use festochshop\shop\domaine\dto\auth\CredentialsDTO;
use festochshop\shop\domaine\dto\auth\TokenDTO;
use festochshop\shop\domaine\dto\auth\UserDTO;

interface iAuth
{

    public function signup(CredentialsDTO $c) : UserDTO;

    public function signin(CredentialsDTO $c) : TokenDTO;

    public function validate(TokenDTO $t) : UserDTO;

    public function refresh(TokenDTO $t) : TokenDTO;

    public function activate_signup(TokenDTO $t) : void;

    public function reset_password(TokenDTO $t, CredentialsDTO $c, string $newPassword) : void;

}