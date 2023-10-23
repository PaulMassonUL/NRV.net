<?php

use festochshop\shop\domaine\utils\Eloquent;
use Slim\Factory\AppFactory;

//ajout des dépendances
$settings = require_once __DIR__ . DIRECTORY_SEPARATOR . 'settings.php';
$dependancies = require_once __DIR__ . DIRECTORY_SEPARATOR . 'dependancies.php';
$actions = require_once __DIR__ . DIRECTORY_SEPARATOR . 'actions.php';

// ajoute les dépendances dans un container builder qui va lui les intégrer à l'app
$build = new \DI\ContainerBuilder();
//$build->addDefinitions($settings);
//$build->addDefinitions($dependancies);
//$build->addDefinitions($actions);
$container = $build->build();

//creation de l'app à partir du container
$app =  AppFactory::createFromContainer($container);

//ajout des middleware
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, false, false);
$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->forceContentType('application/json');

//Initiation de Eloquent
//On initie les bases de données pour qu'il y ai une connection
$eloquent = new Eloquent();
$eloquent->init(__DIR__ . DIRECTORY_SEPARATOR . 'auth.db.ini', 'festival_auth');

return $app;