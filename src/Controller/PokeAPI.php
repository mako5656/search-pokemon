<?php

declare(strict_types=1);

namespace App\Controller;

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

    public function fetchPokemonName(string $name): array
    {
        $response = $this->client->request('GET', 'pokemon/' . $name);
        $responseJson = json_decode($response->getBody()->getContents(), true);

        $pokemon = new Pokemon;
        $pokemon->setId($responseJson['id']);
        $pokemon->setName($responseJson['name']);
        $pokemon->setBaseExperience($responseJson['base_experience']);
        $pokemon->setHeight($responseJson['height']);
        $pokemon->setIsDefault($responseJson['is_default']);
        $pokemon->setOrder($responseJson['order']);
        $pokemon->setWeight($responseJson['weight']);
        $pokemon->setAbilities($responseJson['abilities']);
        $pokemon->setForms($responseJson['forms']);
        $pokemon->setGameIndices($responseJson['game_indices']);
        $pokemon->setHeldItems($responseJson['held_items']);
        $pokemon->setLocationAreaEncounters($responseJson['location_area_encounters']);
        $pokemon->setMoves($responseJson['moves']);
        $pokemon->setPostTypes($responseJson['past_types']);
        $pokemon->setSprites($responseJson['sprites']);
        $pokemon->setSpecies($responseJson['species']);
        $pokemon->setStats($responseJson['stats']);
        $pokemon->setTypes($responseJson['types']);

        return $pokemon->jsonSerialize();
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