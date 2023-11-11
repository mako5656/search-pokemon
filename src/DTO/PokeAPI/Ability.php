<?php

declare(strict_types=1);

namespace App\DTO\PokeAPI;

// https://pokeapi.co/docs/v2#abilities
class Ability
{
    private int $id;
    private string $name;
    private bool $isMainSeries;
    private array $generation;
    private array $names;
    private array $effectEntries;
    private array $effectChanges;
    private array $flavorTextEntries;
    private array $pokemon;

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

    public function getIsMainSeries(): bool
    {
        return $this->isMainSeries;
    }

    public function setIsMainSeries(bool $isMainSeries): self
    {
        $this->isMainSeries = $isMainSeries;

        return $this;
    }

    public function getGeneration(): array
    {
        return $this->generation;
    }

    public function setGeneration(array $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function getNames(): array
    {
        return $this->names;
    }

    public function setNames(array $names): self
    {
        $this->names = $names;

        return $this;
    }

    public function getEffectEntries(): array
    {
        return $this->effectEntries;
    }

    public function setEffectEntries(array $effectEntries): self
    {
        $this->effectEntries = $effectEntries;

        return $this;
    }

    public function getEffectChanges(): array
    {
        return $this->effectChanges;
    }

    public function setEffectChanges(array $effectChanges): self
    {
        $this->effectChanges = $effectChanges;

        return $this;
    }

    public function getFlavorTextEntries(): array
    {
        return $this->flavorTextEntries;
    }

    public function setFlavorTextEntries(array $flavorTextEntries): self
    {
        $this->flavorTextEntries = $flavorTextEntries;

        return $this;
    }

    public function getPokemon(): array
    {
        return $this->pokemon;
    }

    public function setPokemon(array $pokemon): self
    {
        $this->pokemon = $pokemon;

        return $this;
    }
}
