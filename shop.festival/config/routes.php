<?php

declare(strict_types=1);

use festochshop\shop\app\action\auth\PostAuthSigninAction;
use festochshop\shop\app\action\auth\PostAuthSignupAction;
use festochshop\shop\app\action\auth\PostRefreshAction;
use festochshop\shop\app\action\shop\GetAllDatesEveningAction;
use festochshop\shop\app\action\shop\GetAllNameSpotsAction;
use festochshop\shop\app\action\shop\GetAllSpotsAction;
use festochshop\shop\app\action\shop\GetAllThematicAction;
use festochshop\shop\app\action\shop\GetEveningByIdAction;
use festochshop\shop\app\action\shop\GetNbPlaceAction;
use festochshop\shop\app\action\shop\GetShowsAction;
use festochshop\shop\domaine\middlewares\Jwt;

return function (\Slim\App $app) {

    $JwtVerification = new Jwt($app->getContainer()->get('AuthService'));

    $app->get('/shows[/]', GetShowsAction::class)->setName('getShows');

    $app->get('/evening/{id}[/]', GetEveningByIdAction::class)->setName('getEveningById');

    $app->get('/thematics_evening[/]', GetAllThematicAction::class)->setName('getAllThematic');

    $app->get('/dates_evening[/]', GetAllDatesEveningAction::class)->setName('getAllDatesEvening');

    $app->get('/spots_evening[/]', GetAllSpotsAction::class)->setName('getAllSpotsEvening');

    $app->get('/name_spots[/]', GetAllNameSpotsAction::class)->setName('getAllNameSpots');

    $app->get('/places/{id}[/]', GetNbPlaceAction::class)->setName('getNbPlace');

    // exemple pour ajouter le controle du middleware sur une route :
    //     $app->get('/maroute', MaClasse::class)->setName('name')->add($JwtVerification);


    // AUTH

    $app->post('/auth/signin[/]', PostAuthSigninAction::class)->setName('postAuthSignin');

    $app->post('/auth/signup[/]', PostAuthSignupAction::class)->setName('postAuthSignup');

    $app->post('/refresh[/]', PostRefreshAction::class)->setName('postRefresh');

};