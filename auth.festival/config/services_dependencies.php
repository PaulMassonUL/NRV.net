<?php

return [

    'logger' => function(\Psr\Container\ContainerInterface $c) {
        $log = new \Monolog\Logger($c->get('log.auth.name'));
        $log->pushHandler(new \Monolog\Handler\StreamHandler($c->get('log.auth.file'), $c->get('log.auth.level')));
        return $log;
    },

    'JwtManager' => function(\Psr\Container\ContainerInterface $c) {
        $manager = new \festochshop\auth\domaine\manager\JwtManager($c->get('auth.token.secret'), $c->get('auth.token.expiration'));
        $manager->setIssuer($c->get('auth.token.issuer'));
        return $manager;
    },

    'AuthProvider' => function(\Psr\Container\ContainerInterface $c) {
        return new \festochshop\auth\domaine\provider\AuthProvider($c->get('logger'));
    },

    'AuthService' => function(\Psr\Container\ContainerInterface $c) {
        return new \festochshop\auth\domaine\service\AuthService($c->get('JwtManager'), $c->get('AuthProvider'), $c->get('logger'));
    },

];