<?php

declare(strict_types=1);

use festochshop\shop\app\action\GetAllDatesEveningAction;
use festochshop\shop\app\action\GetAllNameSpotsAction;
use festochshop\shop\app\action\GetAllSpotsAction;
use festochshop\shop\app\action\GetAllThematicAction;
use festochshop\shop\app\action\GetEveningByIdAction;
use festochshop\shop\app\action\GetNbPlaceAction;
use festochshop\shop\app\action\GetShowsAction;

return function (\Slim\App $app) {

    $app->get('/shows[/]', GetShowsAction::class)->setName('getShows');

    $app->get('/evening/{id}[/]', GetEveningByIdAction::class)->setName('getEveningById');

    $app->get('/thematics_evening[/]', GetAllThematicAction::class)->setName('getAllThematic');

    $app->get('/dates_evening[/]', GetAllDatesEveningAction::class)->setName('getAllDatesEvening');

    $app->get('/spots_evening[/]', GetAllSpotsAction::class)->setName('getAllSpotsEvening');

    $app->get('/name_spots[/]', GetAllNameSpotsAction::class)->setName('getAllNameSpots');

    $app->get('/places/{id}[/]', GetNbPlaceAction::class)->setName('getNbPlace');

};