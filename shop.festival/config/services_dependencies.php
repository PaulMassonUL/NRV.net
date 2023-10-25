<?php

return [

    'logger' => function(\Psr\Container\ContainerInterface $c) {
        $log = new \Monolog\Logger($c->get('log.festival.name'));
        $log->pushHandler(new \Monolog\Handler\StreamHandler($c->get('log.festival.file'), $c->get('log.festival.level')));
        return $log;
    },

    'ServiceShow' => function (\Psr\Container\ContainerInterface $container) {
        return new \festochshop\shop\domaine\service\show\ServiceShow($container->get('logger'));
    },

    'ServiceEvening' => function (\Psr\Container\ContainerInterface $container) {
        return new \festochshop\shop\domaine\service\evening\ServiceEvening($container->get('logger'));
    },

];