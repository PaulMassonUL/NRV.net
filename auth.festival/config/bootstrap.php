<?php

use DI\ContainerBuilder;
use festochshop\auth\domaine\service\iAuth;

$builder = new ContainerBuilder();

$builder->addDefinitions(__DIR__ . '/settings.php');
$builder->addDefinitions(__DIR__ . '/services_dependencies.php');
$builder->addDefinitions(__DIR__ . '/actions.php');

$c=$builder->build();

$app = \Slim\Factory\AppFactory::createFromContainer($c);

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, false, false);

$app->add(new \festochshop\auth\domaine\middleware\Jwt($c->get('AuthService')));

$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->forceContentType('application/json');

$capsule = new \Illuminate\Database\Capsule\Manager();

$capsule->addConnection(parse_ini_file("auth.db.ini"), 'auth');
$capsule->setAsGlobal();
$capsule->bootEloquent();

return $app;