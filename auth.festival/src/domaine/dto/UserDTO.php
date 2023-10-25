<?php

namespace festochshop\auth\domaine\dto;

class UserDTO
{
    public string $email;
    public string $password;
    public string $first_name;
    public string $last_name;
    public string $active;
    public string $activation_token;
    public string $activation_token_date;
    public string $refresh_token;
    public string $refresh_token_expiration_date;
    public string $reset_passwd_token;
    public string $reset_passwd_token_expiration_date;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}