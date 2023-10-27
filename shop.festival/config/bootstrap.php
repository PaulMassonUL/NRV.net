<?php

use DI\ContainerBuilder;
use festochshop\shop\domaine\middlewares\Cors;
use festochshop\shop\domaine\middlewares\Preflight;
use Illuminate\Database\Capsule\Manager;
use Slim\Factory\AppFactory;

$builder = new ContainerBuilder();

$builder->addDefinitions(__DIR__ . '/settings.php');
$builder->addDefinitions(__DIR__ . '/services_dependencies.php');
$builder->addDefinitions(__DIR__ . '/actions.php');

$c = $builder->build();

$app = AppFactory::createFromContainer($c);

// gestion des requetes simples
//$app->add(new Cors());

// gestion des requetes controlees avec pre flight
$app->options('/{routes:.+}', Preflight::class);

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, false, false);

$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->forceContentType('application/json');

$capsule = new Manager();

$capsule->addConnection(parse_ini_file("festival.db.ini"), 'festival');
$capsule->addConnection(parse_ini_file("auth.db.ini"), 'auth');
$capsule->setAsGlobal();
$capsule->bootEloquent();

return $app;