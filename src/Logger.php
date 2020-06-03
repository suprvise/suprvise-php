<?php

namespace Suprvise;

use Suprvise\Suprvise;
use GuzzleHttp\Client as Http;

class Logger
{
    public static function listen()
    {
        set_exception_handler([static::class, 'catch']);
    }

    public static function catch($exception)
    {
        $dsn = Suprvise::dsn('logger');

        if (! $dsn) {
            throw new \InvalidArgumentException('Suprvise Authentication Error: Suprvise Logger DSN is missing (hint: \Suprvise\Suprvise::dsn(\'logger\', \'your-dsn-url\')');
        }

        $headers = ['Content-Type' => 'application/json'];

        $payload = [
            'origin'  => Suprvise::origin(),
            'code'    => $exception->getCode(),
            'message' => $exception->getMessage(),
            'file'    => $exception->getFile(),
            'line'    => $exception->getLine(),
            'trace'   => $exception->getTraceAsString(),
        ];

        if (Suprvise::debug()) {
            dump(['dsn' => $dsn, 'payload' => $payload]);
        }

        $response = (new Http)->request('POST', $dsn, [
            'headers' => $headers,
            'json'    => $payload,
        ]);

        $body = json_decode((string) $response->getBody());

        if (Suprvise::debug()) {
            dump($body);
        }

        return $body;
    }
}
