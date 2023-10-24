<?php

declare(strict_types=1);

use festochshop\shop\app\action\GetShowsAction;
use festochshop\shop\app\action\GetShowByIdAction;

return function (\Slim\App $app) {

    $app->get('/', function ($rq, $rs) {
        $rs->getBody()->write("hello world !");
       return $rs;
    });

    $app->get('/shows[/]', GetShowsAction::class)->setName('getShows');

    $app->get('/show/{id}[/]', GetShowByIdAction::class)->setName('getShowById');

};