<?php

namespace festochshop\shop\domaine\service\commande;

use PHPUnit\Framework\Exception;

class ServiceCommandeNotFoundException extends Exception
{

    /**
     * @param string $string
     */
    public function __construct(string $string)
    {
    }
}