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

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBaseExperience(): int
    {
        return $this->baseExperience;
    }

    public function setBaseExperience(int $baseExperience): self
    {
        $this->baseExperience = $baseExperience;

        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): self
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getAbilities(): array
    {
        return $this->abilities;
    }

    public function setAbilities(array $abilities): self
    {
        $this->abilities = $abilities;

        return $this;
    }

    public function getForms(): array
    {
        return $this->forms;
    }

    public function setForms(array $forms): self
    {
        $this->forms = $forms;

        return $this;
    }

    public function getGameIndices(): array
    {
        return $this->gameIndices;
    }

    public function setGameIndices(array $gameIndices): self
    {
        $this->gameIndices = $gameIndices;

        return $this;
    }

    public function getHeldItems(): array
    {
        return $this->heldItems;
    }

    public function setHeldItems(array $heldItems): self
    {
        $this->heldItems = $heldItems;

        return $this;
    }

    public function getLocationAreaEncounters(): string
    {
        return $this->locationAreaEncounters;
    }

    public function setLocationAreaEncounters(string $locationAreaEncounters): self
    {
        $this->locationAreaEncounters = $locationAreaEncounters;

        return $this;
    }

    public function getMoves(): array
    {
        return $this->moves;
    }

    public function setMoves(array $moves): self
    {
        $this->moves = $moves;

        return $this;
    }

    public function getPastTypes(): array
    {
        return $this->pastTypes;
    }

    public function setPostTypes(array $pastTypes): self
    {
        $this->pastTypes = $pastTypes;

        return $this;
    }

    public function getSprites(): array
    {
        return $this->sprites;
    }

    public function setSprites(array $sprites): self
    {
        $this->sprites = $sprites;

        return $this;
    }

    public function getSpecies(): array
    {
        return $this->species;
    }

    public function setSpecies(array $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getStats(): array
    {
        return $this->stats;
    }

    public function setStats(array $stats): self
    {
        $this->stats = $stats;

        return $this;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function setTypes(array $types): self
    {
        $this->types = $types;

        return $this;
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