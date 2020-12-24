<?php

declare(strict_types=1);

use App\Http\Action\Auth\AuthAction;
use App\Http\Action\HomeAction;
use App\Http\Middleware\AuthenticatedClientMiddleware;
use App\Http\Middleware\OAuthClientMiddleware;
use Slim\App;

return static function (App $app): void {
    $app->get('/', HomeAction::class)->add(AuthenticatedClientMiddleware::class);
    $app->get('/auth', AuthAction::class)->add(OAuthClientMiddleware::class);
};
