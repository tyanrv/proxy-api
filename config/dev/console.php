<?php

declare(strict_types=1);

//use App\Console\FixturesLoadCommand;
//use Doctrine\Migrations\Tools\Console\Command\DiffCommand;
//use Doctrine\Migrations\Tools\Console\Command\GenerateCommand;
//use Doctrine\Migrations\Tools\Console\Command\VersionCommand;
//use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand;
//use Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand;
//use Psr\Container\ContainerInterface;

return [
//    FixturesLoadCommand::class => static function (ContainerInterface $container) {
//        /**
//         * @psalm-suppress MixedArrayAccess
//         * @psalm-var array{fixture_paths:string[]} $config
//         */
//        $config = $container->get('config')['console'];
//        /** @var EntityManagerInterface $em */
//        $em = $container->get(EntityManagerInterface::class);
//
//        return new FixturesLoadCommand($em, $config['fixture_paths']);
//    },
//
//    'config' => [
//        'console' => [
//            'commands' => [
//                FixturesLoadCommand::class,
//
//                DropCommand::class,
//                UpdateCommand::class,
//
//                GenerateCommand::class,
//                DiffCommand::class,
//
//                VersionCommand::class,
//            ],
//            'fixture_paths' => [
//                __DIR__ . '/../../tests/Functional/Api/Transformer/GoodsTransformer/Fixture',
//                __DIR__ . '/../../tests/Functional/Api/Transformer/UserTransformer/Fixture',
//                __DIR__ . '/../../tests/Functional/Api/OAuth',
//            ]
//        ]
//    ]
];
