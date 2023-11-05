<?php

declare(strict_types=1);

namespace App\Controller;

class GetImagePokemon
{
    public function getImagePokemon(array $pokemon): string
    {
        $pokemonSprites = $pokemon['sprites'];
        return $pokemonSprites['front_default'];
    }
}