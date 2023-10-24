<?php

namespace festochshop\auth\domaine\service;

use Exception;

class AuthServiceSignupException extends Exception
{

    /**
     * @param string $getMessage
     */
    public function __construct(string $getMessage)
    {
    }
}