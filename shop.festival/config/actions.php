<?php

use festochshop\shop\app\action\GetShowsAction;
use festochshop\shop\app\action\GetEveningByIdAction;
use Psr\Container\ContainerInterface;

return [

    GetShowsAction::class => function (ContainerInterface $container){
        return new GetShowsAction($container->get('ServiceShow'));
    },

    GetEveningByIdAction::class => function (ContainerInterface $container){
        return new GetEveningByIdAction($container->get('ServiceEvening'));
    }

];