<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\PokeAPI\NamedAPIResource;
use App\Repository\ListInfoPokemon;

class GetListInfoPokemon
{
    public function __construct(
        private readonly PokeAPI $pokeApi,
        private readonly GetImagePokemon $getImagePokemon,
        private readonly GetTypePokemon $getTypePokemon,
        private readonly Filter $filter,
        private readonly ListInfoPokemon $listInfoPokemon,
    ) {
    }

    public function resultToInfo(array $results, array $data): ListInfoPokemon
    {
        foreach ($results as $pokemonResult) {
            $resultPokemonList = (new NamedAPIResource())
                ->setName($pokemonResult['name'])
                ->setUrl($pokemonResult['url'])
            ;
            $pokemon = $this->pokeApi->fetchPokemonName($resultPokemonList->getName());

            // 入力した項目に一致するポケモンを取得
            $pokemon = $this->filter->filterPokemon($pokemon, $data['name'], $data['type']);
            if (is_null($pokemon)) {
                continue;
            }

            $this->listInfoPokemon
                ->addId($pokemon->getId())
                ->addName($pokemon->getName())
                ->addImage($this->getImagePokemon->getImageUrl($pokemon->getSprites(), $data['image']))
                ->addTypeColor($this->getTypePokemon->getTypeColor($pokemon->getTypes()))
            ;
        }

        return $this->listInfoPokemon;
    }
}
