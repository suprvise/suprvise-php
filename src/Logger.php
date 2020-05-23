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
        if (! Suprvise::key()) {
            throw new \InvalidArgumentException('Suprvise Authentication Error: Suprvise key is missing (hint: \Suprvise\Suprvise::key(\'suprvise-key-xxx\')');
        }

        if (! Suprvise::secret()) {
            throw new \InvalidArgumentException('Suprvise Authentication Error: Suprvise secret is missing (hint: \Suprvise\Suprvise::secret(\'suprvise-secret-xxx\')');
        }

        if (! Suprvise::origin()) {
            throw new \InvalidArgumentException('Suprvise Error: Suprvise origin is missing (hint: \Suprvise\Suprvise::origin(\'https://my-monitored-website.com\')');
        }

        $endpoint = Suprvise::api('/logger');

        $headers = ['Content-Type' => 'application/json'];

        $payload = [
            'key'     => Suprvise::key(),
            'secret'  => Suprvise::secret(),
            'origin'  => Suprvise::origin(),
            'code'    => $exception->getCode(),
            'message' => $exception->getMessage(),
            'file'    => $exception->getFile(),
            'line'    => $exception->getLine(),
            'trace'   => $exception->getTraceAsString(),
        ];

        if (Suprvise::debug()) {
            dump(['endpoint' => $endpoint, 'payload' => $payload]);
        }

        $response = (new Http)->request('POST', $endpoint, [
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
