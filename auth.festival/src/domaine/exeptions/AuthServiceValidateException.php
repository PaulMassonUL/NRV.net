<?php

namespace festochshop\auth\domaine\service;

use Exception;

class AuthServiceValidateException extends Exception
{

    /**
     * @param string $string
     */
    public function __construct(string $string)
    {
    }
}