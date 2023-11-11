<?php

declare(strict_types=1);

namespace App\DTO\PokeAPI;

// https://pokeapi.co/docs/v2#pokemon
class PokemonSprites
{
    private ?string $front_default = null;
    private ?string $front_shiny = null;
    private ?string $front_female = null;
    private ?string $front_shiny_female = null;
    private ?string $back_default = null;
    private ?string $back_shiny = null;
    private ?string $back_female = null;
    private ?string $back_shiny_female = null;

    public function getFrontDefault(): ?string
    {
        return $this->front_default;
    }

    public function setFrontDefault(?string $front_default): self
    {
        $this->front_default = $front_default;

        return $this;
    }

    public function getFrontShiny(): ?string
    {
        return $this->front_shiny;
    }

    public function setFrontShiny(?string $front_shiny): self
    {
        $this->front_shiny = $front_shiny;

        return $this;
    }

    public function getFrontFemale(): ?string
    {
        return $this->front_female;
    }

    public function setFrontFemale(?string $front_female): self
    {
        $this->front_female = $front_female;

        return $this;
    }

    public function getFrontShinyFemale(): ?string
    {
        return $this->front_shiny_female;
    }

    public function setFrontShinyFemale(?string $front_shiny_female): self
    {
        $this->front_shiny_female = $front_shiny_female;

        return $this;
    }

    public function getBackDefault(): ?string
    {
        return $this->back_default;
    }

    public function setBackDefault(?string $back_default): self
    {
        $this->back_default = $back_default;

        return $this;
    }

    public function getBackShiny(): ?string
    {
        return $this->back_shiny;
    }

    public function setBackShiny(?string $back_shiny): self
    {
        $this->back_shiny = $back_shiny;

        return $this;
    }

    public function getBackFemale(): ?string
    {
        return $this->back_female;
    }

    public function setBackFemale(?string $back_female): self
    {
        $this->back_female = $back_female;

        return $this;
    }

    public function getBackShinyFemale(): ?string
    {
        return $this->back_shiny_female;
    }

    public function setBackShinyFemale(?string $back_shiny_female): self
    {
        $this->back_shiny_female = $back_shiny_female;

        return $this;
    }
}
