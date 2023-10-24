<?php

use festochshop\shop\app\action\GetShowsAction;
use festochshop\shop\app\action\GetShowByIdAction;
use Psr\Container\ContainerInterface;

return [

    GetShowsAction::class => function (ContainerInterface $container){
        return new GetShowsAction($container->get('ServiceShow'));
    },

    GetShowByIdAction::class => function (ContainerInterface $container){
        return new GetShowByIdAction($container->get('ServiceShow'));
    }

];