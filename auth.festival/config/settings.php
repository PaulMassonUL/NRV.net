<?php

return [
    'log.auth.name' => 'auth',
    'log.auth.file' => __DIR__ . '/../logs/auth.log',
    'log.auth.level' => \Psr\Log\LogLevel::INFO,

    'auth.token.secret' => getenv('AUTH_SECRET'),
    'auth.token.expiration' => 3600,
    'auth.token.issuer' => 'http://localhost:2780/',
];