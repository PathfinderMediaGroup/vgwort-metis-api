<?php

declare(strict_types=1);

namespace PathfinderMediaGroup\VgwortMetisApi\Service;

use PathfinderMediaGroup\VgwortMetisApi\Client\VgwortClient;

class VgwortService
{
    public function __construct(protected VgwortClient $client)
    {
    }

    public function changeApiKey(string $apiKey): void
    {
        $this->client = new VgwortClient($apiKey);
    }

    public function orderPixels(int $amount): array
    {
        $response = $this->client->post('https://tom.vgwort.de/api/cms/metis/rest/pixel/v1.0/order', [
            'json' => [
                'count' => $amount,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function checkPixelStates(array $publicUids): array
    {
        $response = $this->client->post('https://tom.vgwort.de/api/cms/metis/rest/pixel/v1.0/overview', [
            'json' => [
                'publicUIDs' => $publicUids,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true)['pixels'] ?? [];
    }
}
