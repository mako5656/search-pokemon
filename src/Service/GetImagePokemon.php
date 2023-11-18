<?php

declare(strict_types=1);

namespace App\Service;

use App\Enum\PokemonImageEnum;

class GetImagePokemon
{
    public function getImageUrl(array $pokemonSprites, PokemonImageEnum $imageType): string
    {
        $methodName = 'get' . $imageType->getMethodSuffix() . 'ImageUrl';

        if (method_exists($this, $methodName)) {
            return $this->$methodName($pokemonSprites);
        }

        throw new \InvalidArgumentException('Invalid image type specified.');
    }

    public function getFrontDefaultImageUrl(array $pokemonSprites): string
    {
        return $pokemonSprites['front_default'];
    }

    public function getDreamWorldImageUrl(array $pokemonSprites): string
    {
        return $pokemonSprites['other']['dream_world']['front_default'];
    }

    public function getHomeImageUrl(array $pokemonSprites): string
    {
        return $pokemonSprites['other']['home']['front_default'];
    }

    public function getOfficialArtworkImageUrl(array $pokemonSprites): string
    {
        return $pokemonSprites['other']['official-artwork']['front_default'];
    }
}
