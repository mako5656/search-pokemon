<?php

declare(strict_types=1);

namespace App\DTO\PokeAPI;

// https://pokeapi.co/docs/v2#pokemon
class PokemonType
{
    private int $slot;
    private NamedAPIResource $type;

    public function getSlot(): int
    {
        return $this->slot;
    }

    public function setSlot(int $slot): self
    {
        $this->slot = $slot;

        return $this;
    }

    public function getType(): NamedAPIResource
    {
        return $this->type;
    }

    public function setType(NamedAPIResource $type): self
    {
        $this->type= $type;

        return $this;
    }
}
