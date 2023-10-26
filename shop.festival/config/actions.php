<?php

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
use Psr\Container\ContainerInterface;

return [

    GetShowsAction::class => function (ContainerInterface $container){
        return new GetShowsAction($container->get('ServiceShow'));
    },

    GetEveningByIdAction::class => function (ContainerInterface $container){
        return new GetEveningByIdAction($container->get('ServiceEvening'));
    },

    GetAllThematicAction::class => function (ContainerInterface $container){
        return new GetAllThematicAction($container->get('ServiceEvening'));
    },

    GetAllDatesEveningAction::class => function (ContainerInterface $container){
        return new GetAllDatesEveningAction($container->get('ServiceEvening'));
    },

    GetAllSpotsAction::class => function (ContainerInterface $container){
        return new GetAllSpotsAction($container->get('ServiceSpot'));
    },

    GetAllNameSpotsAction::class => function (ContainerInterface $container){
        return new GetAllNameSpotsAction($container->get('ServiceSpot'));
    },

    GetNbPlaceAction::class => function (ContainerInterface $container){
        return new GetNbPlaceAction($container->get('ServiceEvening'));
    },

    PostAuthSigninAction::class => function (ContainerInterface $container){
        return new PostAuthSigninAction($container->get('AuthService'));
    },

    PostAuthSignupAction::class => function (ContainerInterface $container){
        return new PostAuthSignupAction($container->get('AuthService'));
    },

    PostRefreshAction::class => function (ContainerInterface $container){
        return new PostRefreshAction($container->get('AuthService'));
    },

];