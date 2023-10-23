<?php

return function (\Slim\App $app) {
    $app->get('/', function ($rq, $rs) {
        $rs->getBody()->write("hello world !");
       return $rs;
    });
};