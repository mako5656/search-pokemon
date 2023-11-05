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

    function setId(int $id): void
    {
        $this->id = $id;
    }

    function getName(): string
    {
        return $this->name;
    }

    function setName(string $name): void
    {
        $this->name = $name;
    }

    function getIsMainSeries(): bool
    {
        return $this->isMainSeries;
    }

    function setIsMainSeries(bool $isMainSeries): void
    {
        $this->isMainSeries = $isMainSeries;
    }

    function getGeneration(): array
    {
        return $this->generation;
    }

    function setGeneration(array $generation): void
    {
        $this->generation = $generation;
    }

    function getNames(): array
    {
        return $this->names;
    }

    function setNames(array $names): void
    {
        $this->names = $names;
    }

    function getEffectEntries(): array
    {
        return $this->effectEntries;
    }

    function setEffectEntries(array $effectEntries): void
    {
        $this->effectEntries = $effectEntries;
    }

    function getEffectChanges(): array
    {
        return $this->effectChanges;
    }

    function setEffectChanges(array $effectChanges): void
    {
        $this->effectChanges = $effectChanges;
    }

    function getFlavorTextEntries(): array
    {
        return $this->flavorTextEntries;
    }

    function setFlavorTextEntries(array $flavorTextEntries): void
    {
        $this->flavorTextEntries = $flavorTextEntries;
    }

    function getPokemon(): array
    {
        return $this->pokemon;
    }

    function setPokemon(array $pokemon): void
    {
        $this->pokemon = $pokemon;
    }
}