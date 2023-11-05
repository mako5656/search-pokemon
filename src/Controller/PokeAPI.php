<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\PokeAPI\NamedAPIResourceList;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PokeAPI extends AbstractController
{
    private Client $client;

    protected int $limit = 20;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://pokeapi.co/api/v2/',
        ]);
    }

    public function fetchPokemon(
        int $limit = null,
        int $offset = null
    ): NamedAPIResourceList {
        $response = $this->client->request('GET', 'pokemon/', [
            'query' => [
                'limit' => $this->limit($limit),
                'offset' => $offset,
            ],
        ]);

        $responseJson = json_decode($response->getBody()->getContents(), true);

        $namedAPIResourceList = new NamedAPIResourceList();
        $namedAPIResourceList->setCount($responseJson['count']);
        $namedAPIResourceList->setNext($responseJson['next']);
        $namedAPIResourceList->setPrevious($responseJson['previous']);
        $namedAPIResourceList->setResults($responseJson['results']);

        return $namedAPIResourceList;
    }

    public function fetchPokemonName(string $name)
    {
        try {
            $response = $this->client->request('GET', 'pokemon/' . $name);
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }

        return json_decode($response->getBody()->getContents(), true)['weight'];
    }

    public function fetchPokemonId(int $id): array
    {
        $response = $this->client->request('GET', 'pokemon/' . $id);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function limit(int $limit = null): int
    {
        if ($limit !== null) {
            return $limit;
        }
        return $this->limit;
    }
}