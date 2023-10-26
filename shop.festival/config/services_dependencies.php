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

    'ServiceSpot' => function (\Psr\Container\ContainerInterface $container) {
        return new \festochshop\shop\domaine\service\spot\ServiceSpot($container->get('logger'));
    },


    'JwtManager' => function(\Psr\Container\ContainerInterface $c) {
        $manager = new \festochshop\shop\domaine\manager\JwtManager($c->get('auth.token.secret'), $c->get('auth.token.expiration'));
        $manager->setIssuer($c->get('auth.token.issuer'));
        return $manager;
    },

    'AuthProvider' => function(\Psr\Container\ContainerInterface $c) {
        return new \festochshop\shop\domaine\provider\AuthProvider();
    },

    'AuthService' => function(\Psr\Container\ContainerInterface $c) {
        return new \festochshop\shop\domaine\service\auth\AuthService($c->get('JwtManager'), $c->get('AuthProvider'), $c->get('logger'));
    },

];