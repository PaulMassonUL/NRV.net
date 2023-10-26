<?php

namespace festochshop\shop\domaine\dto\auth;

use festochshop\shop\domaine\dto\DTO;

class TokenDTO extends DTO
{

    public string $access_token;
    public string $refresh_token;

    public function __construct(string $access_token = null, string $refresh_token = null)
    {
        if (!is_null($access_token)) $this->access_token = $access_token;
        if (!is_null($refresh_token)) $this->refresh_token = $refresh_token;
    }
}