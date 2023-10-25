<?php

namespace festochshop\auth\domaine\dto;

class CredentialsDTO
{
    public string $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password= $password;
    }
}