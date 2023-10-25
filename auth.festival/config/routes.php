<?php

declare(strict_types=1);

use festochshop\auth\app\action\PostAuthAction;

return function (\Slim\App $app) {

    $app->post('/auth[/]', PostAuthAction::class)->setName('postAuth');

    $app->post('/refresh[/]', PostAuthAction::class)->setName('postRefresh');

};