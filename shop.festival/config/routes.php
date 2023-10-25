<?php

declare(strict_types=1);

use festochshop\shop\app\action\GetEveningByIdAction;
use festochshop\shop\app\action\GetShowsAction;
use festochshop\shop\app\action\GetShowsFilterByDateAction;

return function (\Slim\App $app) {

    $app->get('/shows[/]', GetShowsAction::class)->setName('getShows');

    $app->get('/evening/{id}[/]', GetEveningByIdAction::class)->setName('getEveningById');


};