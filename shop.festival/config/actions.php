<?php

use festochshop\shop\app\action\GetAllDatesEveningAction;
use festochshop\shop\app\action\GetAllNameSpotsAction;
use festochshop\shop\app\action\GetAllSpotsAction;
use festochshop\shop\app\action\GetAllThematicAction;
use festochshop\shop\app\action\GetEveningByIdAction;
use festochshop\shop\app\action\GetNbPlaceAction;
use festochshop\shop\app\action\GetShowsAction;
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

];