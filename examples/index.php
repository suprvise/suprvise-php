<?php

require __DIR__ . '../../vendor/autoload.php';

use Suprvise\Suprvise;
use Suprvise\Logger;

Suprvise::key('suprvise-key-xxx');
Suprvise::secret('suprvise-secret-xxx');
Suprvise::origin('https://example.com'); // Must be a website that has a monitor

Logger::listen();

throw new Exception('Whoops!'); // Captured by Suprvise
