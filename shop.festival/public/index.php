<?php
declare(strict_types=1);

require_once __DIR__ . DIRECTORY_SEPARATOR .'../vendor/autoload.php';

$app = require_once  __DIR__ . DIRECTORY_SEPARATOR . '../config/bootstrap.php';

(require_once __DIR__ . DIRECTORY_SEPARATOR . '../config/routes.php')($app);

$app->run();
