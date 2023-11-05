<?php

declare(strict_types=1);

namespace App\DTO\PokeAPI;

// https://pokeapi.co/docs/v2#pokemon
class Pokemon
{
    private int $id;
    private string $name;
    private int $baseExperience;
    private int $height;
    private bool $isDefault;
    private int $order;
    private int $weight;
    // Ability[] $abilities
    private array $abilities = [];
    // NamedAPIResource(PokemonForm)[] $forms
    private array $forms = [];
    // VersionGameIndex[] $gameIndices
    private array $gameIndices = [];
    // PokemonHeldItem[] $heldItems
    private array $heldItems = [];
    private string $locationAreaEncounters;
    // PokemonMove[] $moves
    private array $moves = [];
    // PokemonTypePast[] $pastTypes
    private array $pastTypes = [];
    // PokemonSprites[] $sprites
    private array $sprites = [];
    // NamedAPIResource(PokemonSpecies)[] $species
    private array $species = [];
    // PokemonStat[] $stats
    private array $stats = [];
    // PokemonType[] $types
    private array $types = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBaseExperience(): int
    {
        return $this->baseExperience;
    }

    public function setBaseExperience(int $baseExperience): void
    {
        $this->baseExperience = $baseExperience;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): void
    {
        $this->isDefault = $isDefault;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    public function getAbilities(): array
    {
        return $this->abilities;
    }

    public function setAbilities(array $abilities): void
    {
        $this->abilities = $abilities;
    }

    public function getForms(): array
    {
        return $this->forms;
    }

    public function setForms(array $forms): void
    {
        $this->forms = $forms;
    }

    public function getGameIndices(): array
    {
        return $this->gameIndices;
    }

    public function setGameIndices(array $gameIndices): void
    {
        $this->gameIndices = $gameIndices;
    }

    public function getHeldItems(): array
    {
        return $this->heldItems;
    }

    public function setHeldItems(array $heldItems): void
    {
        $this->heldItems = $heldItems;
    }

    public function getLocationAreaEncounters(): string
    {
        return $this->locationAreaEncounters;
    }

    public function setLocationAreaEncounters(string $locationAreaEncounters): void
    {
        $this->locationAreaEncounters = $locationAreaEncounters;
    }

    public function getMoves(): array
    {
        return $this->moves;
    }

    public function setMoves(array $moves): void
    {
        $this->moves = $moves;
    }

    public function getPastTypes(): array
    {
        return $this->pastTypes;
    }

    public function setPostTypes(array $pastTypes): void
    {
        $this->pastTypes = $pastTypes;
    }

    public function getSprites(): array
    {
        return $this->sprites;
    }

    public function setSprites(array $sprites): void
    {
        $this->sprites = $sprites;
    }

    public function getSpecies(): array
    {
        return $this->species;
    }

    public function setSpecies(array $species): void
    {
        $this->species = $species;
    }

    public function getStats(): array
    {
        return $this->stats;
    }

    public function setStats(array $stats): void
    {
        $this->stats = $stats;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'base_experience' => $this->baseExperience,
            'height' => $this->height,
            'is_default' => $this->isDefault,
            'order' => $this->order,
            'weight' => $this->weight,
            'abilities' => $this->abilities,
            'forms' => $this->forms,
            'game_indices' => $this->gameIndices,
            'held_items' => $this->heldItems,
            'location_area_encounters' => $this->locationAreaEncounters,
            'moves' => $this->moves,
            'past_types' => $this->pastTypes,
            'sprites' => $this->sprites,
            'species' => $this->species,
            'stats' => $this->stats,
            'types' => $this->types,
        ];
    }
}