<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\PokeAPI\NamedAPIResourceList;
use App\DTO\PokeAPI\Pokemon;
use GuzzleHttp\Client;
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
        ?int $limit = null,
        ?int $offset = null,
    ): NamedAPIResourceList {
        $response = $this->client->request('GET', 'pokemon/', [
            'query' => [
                'limit' => $this->limit($limit),
                'offset' => $offset,
            ],
        ]);

        $responseJson = json_decode($response->getBody()->getContents(), true);

        return (new NamedAPIResourceList())
            ->setCount($responseJson['count'])
            ->setNext($responseJson['next'])
            ->setPrevious($responseJson['previous'])
            ->setResults($responseJson['results']);
    }

    public function fetchPokemonName(string $name): Pokemon
    {
        $response = $this->client->request('GET', 'pokemon/' . $name);
        $responseJson = json_decode($response->getBody()->getContents(), true);

        return (new Pokemon)
            ->setId($responseJson['id'])
            ->setName($responseJson['name'])
            ->setBaseExperience($responseJson['base_experience'])
            ->setHeight($responseJson['height'])
            ->setIsDefault($responseJson['is_default'])
            ->setOrder($responseJson['order'])
            ->setWeight($responseJson['weight'])
            ->setAbilities($responseJson['abilities'])
            ->setForms($responseJson['forms'])
            ->setGameIndices($responseJson['game_indices'])
            ->setHeldItems($responseJson['held_items'])
            ->setLocationAreaEncounters($responseJson['location_area_encounters'])
            ->setMoves($responseJson['moves'])
            ->setPostTypes($responseJson['past_types'])
            ->setSprites($responseJson['sprites'])
            ->setSpecies($responseJson['species'])
            ->setStats($responseJson['stats'])
            ->setTypes($responseJson['types']);
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
