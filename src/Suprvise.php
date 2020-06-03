<?php

namespace Suprvise;

class Suprvise
{
    public static $dsn = [
        'logger' => '',
    ];

    public static $origin = '';

    public static $debug = false;

    public static function dsn(string $key = '', ?string $value = ''): string
    {
        if ($value) {
            static::$dsn[$key] = $value;
        }

        return static::$dsn[$key] ?? '';
    }

    public static function origin(?string $origin = ''): string
    {
        if ($origin) {
            static::$origin = $origin;
        }

        return static::$origin;
    }

    public static function debug(?bool $debug = false): bool
    {
        if ($debug) {
            static::$debug = $debug;
        }

        return static::$debug;
    }
}
