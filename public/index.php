<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;

http_response_code(500);

/** @psalm-suppress MissingFile */
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../', '.env');
$dotenv->load();

/**
 * @psalm-suppress MissingFile
 * @var ContainerInterface $container
 */
$container = require_once __DIR__ . '/../config/container.php';

/**
 * @psalm-suppress MissingFile
 * @var App $app
 */
$app = (require_once __DIR__ . '/../config/app.php')($container);
$app->run();
