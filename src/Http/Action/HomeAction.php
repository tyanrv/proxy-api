<?php

declare(strict_types=1);

namespace App\Http\Action;

use App\Http\JsonResponse;
use App\Http\Middleware\OAuthClientMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use stdClass;

class HomeAction implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var string $authData */
        $authData = $request->getAttribute(OAuthClientMiddleware::OAUTH_RESPONSE_ATTRIBUTE);
        if ($authData) {
            return new JsonResponse($authData);
        }
        return new JsonResponse(new stdClass());
    }
}
