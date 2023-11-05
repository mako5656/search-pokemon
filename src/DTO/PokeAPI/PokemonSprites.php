<?php

declare(strict_types=1);

namespace App\DTO\PokeAPI;

// https://pokeapi.co/docs/v2#pokemon
class PokemonSprites
{
    private string $front_default;
    private string $front_shiny;
    private string $front_female;
    private string $front_shiny_female;
    private string $back_default;
    private string $back_shiny;
    private string $back_female;
    private string $back_shiny_female;

    public function getFrontDefault(): string
    {
        return $this->front_default;
    }

    public function setFrontDefault(string $front_default): void
    {
        $this->front_default = $front_default;
    }

    public function getFrontShiny(): string
    {
        return $this->front_shiny;
    }

    public function setFrontShiny(string $front_shiny): void
    {
        $this->front_shiny = $front_shiny;
    }

    public function getFrontFemale(): string
    {
        return $this->front_female;
    }

    public function setFrontFemale(string $front_female): void
    {
        $this->front_female = $front_female;
    }

    public function getFrontShinyFemale(): string
    {
        return $this->front_shiny_female;
    }

    public function setFrontShinyFemale(string $front_shiny_female): void
    {
        $this->front_shiny_female = $front_shiny_female;
    }

    public function getBackDefault(): string
    {
        return $this->back_default;
    }

    public function setBackDefault(string $back_default): void
    {
        $this->back_default = $back_default;
    }

    public function getBackShiny(): string
    {
        return $this->back_shiny;
    }

    public function setBackShiny(string $back_shiny): void
    {
        $this->back_shiny = $back_shiny;
    }

    public function getBackFemale(): string
    {
        return $this->back_female;
    }

    public function setBackFemale(string $back_female): void
    {
        $this->back_female = $back_female;
    }

    public function getBackShinyFemale(): string
    {
        return $this->back_shiny_female;
    }

    public function setBackShinyFemale(string $back_shiny_female): void
    {
        $this->back_shiny_female = $back_shiny_female;
    }
}