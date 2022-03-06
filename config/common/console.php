<?php

declare(strict_types=1);

use Doctrine\Migrations\Tools\Console\Command\DiffCommand;
use Doctrine\Migrations\Tools\Console\Command\ExecuteCommand;
use Doctrine\Migrations\Tools\Console\Command\GenerateCommand;
use Doctrine\Migrations\Tools\Console\Command\MigrateCommand;
use Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand;
use Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand;

return [
    'config' => [
        'console' => [
            'commands' => [
                ValidateSchemaCommand::class,
                DropCommand::class,
                ExecuteCommand::class,
                DiffCommand::class,
                MigrateCommand::class,
                GenerateCommand::class
            ],
        ]
    ]
];
