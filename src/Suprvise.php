<?php

namespace Suprvise;

class Suprvise
{
    public static $key = '';

    public static $secret = '';

    public static $api = 'https://suprvise.com/api';

    public static $origin = 'https://example.com';

    public static $debug = false;

    public static function key(?string $key = ''): string
    {
        if ($key) {
            static::$key = $key;
        }

        return static::$key;
    }

    public static function secret(?string $secret = ''): string
    {
        if ($secret) {
            static::$secret = $secret;
        }

        return static::$secret;
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

    public static function api(string $endpoint): string
    {
        return static::$api . $endpoint;
    }
}
