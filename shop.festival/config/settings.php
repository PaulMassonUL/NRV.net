<?php

return [

    'log.festival.name' => 'commande',
    'log.festival.file' => __DIR__ . '/../logs/festival.log',
    'log.festival.level' => \Psr\Log\LogLevel::ALERT,

    'log.auth.name' => 'auth',
    'log.auth.file' => __DIR__ . '/../logs/auth.log',
    'log.auth.level' => \Psr\Log\LogLevel::ALERT,

    'auth.token.secret' => getenv('AUTH_SECRET'),
    'auth.token.expiration' => 3600,
    'auth.token.issuer' => 'http://localhost:11110/',

];