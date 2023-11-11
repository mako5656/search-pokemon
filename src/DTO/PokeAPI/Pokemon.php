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
    /**
     * @var list<Ability> $abilities
     */
    private array $abilities = [];
    /**
     * @var list<NamedAPIResource> $forms
     */
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
    /**
     * @var list<PokemonSprites> $sprites
     */
    private array $sprites = [];
    /**
     * @var list<NamedAPIResource> $species
     */
    private array $species = [];
    // PokemonStat[] $stats
    private array $stats = [];
    /**
     * @var list<PokemonType> $types
     */
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

    /**
     * @return list<Ability>
     */
    public function getAbilities(): array
    {
        return $this->abilities;
    }

    /**
     * @param list<Ability> $abilities
     */
    public function setAbilities(array $abilities): self
    {
        $this->abilities = $abilities;

        return $this;
    }

    /**
     * @return list<NamedAPIResource>
     */
    public function getForms(): array
    {
        return $this->forms;
    }

    /**
     * @param list<NamedAPIResource> $forms
     */
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

    /**
     * @return list<PokemonSprites>
     */
    public function getSprites(): array
    {
        return $this->sprites;
    }

    /**
     * @param list<PokemonSprites> $sprites
     */
    public function setSprites(array $sprites): self
    {
        $this->sprites = $sprites;

        return $this;
    }

    /**
     * @return list<NamedAPIResource>
     */
    public function getSpecies(): array
    {
        return $this->species;
    }

    /**
     * @param list<NamedAPIResource> $species
     */
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

    /**
     * @return list<PokemonType>
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param list<PokemonType> $types
     */
    public function setTypes(array $types): self
    {
        $this->types = $types;

        return $this;
    }
}
