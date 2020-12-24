<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Helper\GuzzleHelper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class OAuthClientMiddleware implements MiddlewareInterface
{
    public const OAUTH_RESPONSE_ATTRIBUTE = 'oauth2';

    public static string $BASE_URI = '';

    public function __construct()
    {
        self::$BASE_URI = getenv('OAUTH_BASE_URI') ?? '';
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /**
         * @psalm-var array{
         *      username:string,
         *      password:string
         * } $data
         */
        $data = $request->getQueryParams();

        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';


        $response = GuzzleHelper::sendRequest(
            $username,
            $password,
            'POST',
            self::$BASE_URI . '/oauth/auth'
        );

        if ($response && $response->getStatusCode() === 200) {
            $request = $request->withAttribute(
                self::OAUTH_RESPONSE_ATTRIBUTE,
                (string)$response->getBody()
            );

            return $handler->handle($request);
        }

        return $response;
    }
}
