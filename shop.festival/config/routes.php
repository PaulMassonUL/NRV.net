<?php

declare(strict_types=1);

use festochshop\shop\app\action\GetEveningByIdAction;
use festochshop\shop\app\action\GetShowsAction;

return function (\Slim\App $app) {

    $app->get('/shows[/]', GetShowsAction::class)->setName('getShows');

    $app->get('/evening/{id}[/]', GetEveningByIdAction::class)->setName('getEveningById');

//    $app->get('/evening[/]', GetEveningsAction::class)->setName('getEvenings');


};