<?php

use App\Console\TestCommand;
use Symfony\Component\Console\Application;

require __DIR__ . '/../vendor/autoload.php';

$cli = new Application();
$cli->add(new TestCommand());
$cli->run();