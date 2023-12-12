<?php

declare(strict_types=1);

namespace PathfinderMediaGroup\VgwortMetisApi\Client;

use GuzzleHttp\Client;

class VgwortClient extends Client
{
    public function __construct(string $apiKey)
    {
        parent::__construct([
            'base_uri' => 'https://tom.vgwort.de/api/external/metis/rest/',
            'headers' => [
                'Content-Type' => 'application/json',
                'api_key' => $apiKey,
            ],
        ]);
    }
}
