<?php

declare(strict_types=1);

namespace App\Service;

class GetImagePokemon
{
    public function getFrontDefaultImage(array $pokemonSprites): string
    {
        return $pokemonSprites['front_default'];
    }
}
