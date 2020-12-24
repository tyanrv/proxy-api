<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

require_once __DIR__ . '/../vendor/autoload.php';

/** @var ContainerInterface $container */
$container = require_once __DIR__ . '/../config/container.php';

$cli = new Application('Console');


############## DOCTRINE COMMANDS #######################

//use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;

///** @var EntityManagerInterface $entityManager */
//$entityManager = $container->get(EntityManagerInterface::class);
//
//$cli->getHelperSet()->set(new EntityManagerHelper($entityManager), 'em');
##########################################################

/**
 * @var string[] $commands
 * @psalm-suppress MixedArrayAccess
 */
$commands = $container->get('config')['console']['commands'];
foreach ($commands as $name) {
    /** @var Command $command */
    $command = $container->get($name);
    $cli->add($command);
}

$cli->run(new ArgvInput(), new ConsoleOutput());
