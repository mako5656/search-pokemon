<?php

declare(strict_types=1);

namespace App\DTO\PokeAPI;

// https://pokeapi.co/docs/v2#abilities
class Ability
{
    const POKEAPI_ENDPOINT = 'ability';

    private int $id;
    private string $name;
    private bool $isMainSeries;
    private array $generation;
    private array $names;
    private array $effectEntries;
    private array $effectChanges;
    private array $flavorTextEntries;
    private array $pokemon;

    function getId(): int
    {
        return $this->id;
    }

    function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    function getName(): string
    {
        return $this->name;
    }

    function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    function getIsMainSeries(): bool
    {
        return $this->isMainSeries;
    }

    function setIsMainSeries(bool $isMainSeries): self
    {
        $this->isMainSeries = $isMainSeries;

        return $this;
    }

    function getGeneration(): array
    {
        return $this->generation;
    }

    function setGeneration(array $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    function getNames(): array
    {
        return $this->names;
    }

    function setNames(array $names): self
    {
        $this->names = $names;

        return $this;
    }

    function getEffectEntries(): array
    {
        return $this->effectEntries;
    }

    function setEffectEntries(array $effectEntries): self
    {
        $this->effectEntries = $effectEntries;

        return $this;
    }

    function getEffectChanges(): array
    {
        return $this->effectChanges;
    }

    function setEffectChanges(array $effectChanges): self
    {
        $this->effectChanges = $effectChanges;

        return $this;
    }

    function getFlavorTextEntries(): array
    {
        return $this->flavorTextEntries;
    }

    function setFlavorTextEntries(array $flavorTextEntries): self
    {
        $this->flavorTextEntries = $flavorTextEntries;

        return $this;
    }

    function getPokemon(): array
    {
        return $this->pokemon;
    }

    function setPokemon(array $pokemon): self
    {
        $this->pokemon = $pokemon;

        return $this;
    }
}