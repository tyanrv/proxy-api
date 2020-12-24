<?php

declare(strict_types=1);

namespace App\Http\Action\Auth;

use App\Http\JsonResponse;
use App\Http\Middleware\OAuthClientMiddleware;
use Dflydev\FigCookies\FigResponseCookies;
use Dflydev\FigCookies\SetCookie;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use stdClass;

class AuthAction implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var string $authData */
        $authData = $request->getAttribute(OAuthClientMiddleware::OAUTH_RESPONSE_ATTRIBUTE);

        if ($authData) {
            $cookieData = base64_encode($authData);

            $response = FigResponseCookies::set(
                new JsonResponse([]),
                SetCookie::create('auth')->withValue($cookieData)
            );

            return $response;
        }

        return new JsonResponse(new stdClass());
    }
}
