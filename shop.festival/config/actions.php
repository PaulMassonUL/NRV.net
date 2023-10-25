<?php

use festochshop\shop\app\action\GetShowsAction;
use festochshop\shop\app\action\GetEveningByIdAction;
use festochshop\shop\app\action\GetShowsFilterByDateAction;
use Psr\Container\ContainerInterface;

return [

    GetShowsAction::class => function (ContainerInterface $container){
        return new GetShowsAction($container->get('ServiceShow'));
    },

    GetEveningByIdAction::class => function (ContainerInterface $container){
        return new GetEveningByIdAction($container->get('ServiceEvening'));
    },

    GetShowsFilterByDateAction::class => function (ContainerInterface $container){
        return new GetShowsFilterByDateAction($container->get('ServiceShow'));
    },

];