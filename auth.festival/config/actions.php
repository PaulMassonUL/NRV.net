<?php

use festochshop\auth\app\action\PostAuthAction;
use Psr\Container\ContainerInterface;

return [

    PostAuthAction::class => function (ContainerInterface $container){
        return new PostAuthAction($container->get('AuthService'));
    },

];