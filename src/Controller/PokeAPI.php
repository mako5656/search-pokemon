<?php

declare(strict_types=1);

namespace App\Controller;

use GuzzleHttp\Client;

class PokeAPI
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://pokeapi.co/api/v2/',
        ]);
    }

    public function fetchPokemon(string $name): array
    {
        $response = $this->client->request('GET', 'pokemon/' . $name);

        return json_decode($response->getBody()->getContents(), true);
    }
}