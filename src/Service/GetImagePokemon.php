<?php

declare(strict_types=1);

namespace App\Service;

class GetImagePokemon
{
    public function getFrontDefaultImageUrl(array $pokemonSprites): string
    {
        return $pokemonSprites['front_default'];
    }
}
