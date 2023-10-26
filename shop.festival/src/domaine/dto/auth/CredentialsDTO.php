<?php

namespace festochshop\shop\domaine\dto\auth;

use festochshop\shop\domaine\dto\DTO;

class CredentialsDTO extends DTO
{
    public string $email, $password, $first_name, $last_name;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password= $password;
    }
}