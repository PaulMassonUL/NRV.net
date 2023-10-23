<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class Action
{
    abstract function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args);
}