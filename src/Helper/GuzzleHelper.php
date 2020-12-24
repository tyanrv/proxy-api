<?php

declare(strict_types=1);

namespace App\Helper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class GuzzleHelper
{
    public static function sendRequest(
        string $username,
        string $password,
        string $method,
        string $uri
    ): ?ResponseInterface {
        $client = new Client(['base_uri' => $uri]);

        try {
            return $client->request(
                $method,
                '',
                [
                    'form_params' => [
                        'username' => $username,
                        'password' => $password,
                        'grant_type' => 'password',
                        'client_id' => 'app',
                        'client_secret' => '',
                        'access_type' => 'offline'
                    ]
                ]
            );
        } catch (GuzzleException $e) {
            return new Response($e->getCode());
        }
    }
}
