<?php

/**
 * Usage
 * =====
 *
 * $ php examples/index.php {dsn}
 */

require __DIR__ . '../../vendor/autoload.php';

use Suprvise\{ Suprvise, Logger };

Suprvise::dsn('logger', $argv[1] ?? die("DSN is required (usage: php examples/index.php {dsn})\n"));
Suprvise::debug(true);

Logger::listen();

throw new Exception('Whoops!'); // Captured by Suprvise
