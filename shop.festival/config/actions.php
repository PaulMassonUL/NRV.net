<?php

use festochshop\shop\app\action\GetAllThematicAction;
use festochshop\shop\app\action\GetEveningByIdAction;
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

];