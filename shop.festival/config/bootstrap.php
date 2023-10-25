<?php

use DI\ContainerBuilder;
use festochshop\shop\domaine\middlewares\Cors;

$builder = new ContainerBuilder();

$builder->addDefinitions(__DIR__ . '/settings.php');
$builder->addDefinitions(__DIR__ . '/services_dependencies.php');
$builder->addDefinitions(__DIR__ . '/actions.php');

$c=$builder->build();

$app = \Slim\Factory\AppFactory::createFromContainer($c);

$app->add(new Cors());
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, false, false);

$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->forceContentType('application/json');

$capsule = new \Illuminate\Database\Capsule\Manager();

$capsule->addConnection(parse_ini_file("festival.db.ini"), 'festival');
$capsule->setAsGlobal();
$capsule->bootEloquent();

return $app;