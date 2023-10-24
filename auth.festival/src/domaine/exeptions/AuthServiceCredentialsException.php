<?php

namespace festochshop\auth\domaine\service;

use Exception;

class AuthServiceCredentialsException extends Exception
{

    /**
     * @param string $getMessage
     */
    public function __construct(string $getMessage)
    {
    }
}