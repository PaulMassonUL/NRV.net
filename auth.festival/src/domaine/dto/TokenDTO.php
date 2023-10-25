<?php

namespace festochshop\auth\domaine\dto;

class TokenDTO extends DTO
{

    public string $access_token;
    public string $refresh_token;

    public function __construct(string $access_token, string $refresh_token = null)
    {
        $this->access_token = $access_token;
        $this->refresh_token = $refresh_token;
    }

}