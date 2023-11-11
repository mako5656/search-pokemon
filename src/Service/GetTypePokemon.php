<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\PokeAPI\NamedAPIResource;
use App\DTO\PokeAPI\PokemonType;

class GetTypePokemon
{
    /**
     * @param array $pokemonTypes
     * @return list<PokemonType>
     */
    public function getTypeName(array $pokemonTypes): array
    {
        // 複数のタイプがある場合を考慮しforeachで回す
        $pokemonTypeList = [];
        foreach ($pokemonTypes as $pokemonType) {
            $namedAPIResourceList = (new NamedAPIResource())
                ->setName($pokemonType['type']['name'])
                ->setUrl($pokemonType['type']['url'])
            ;
            $pokemonTypeList[] = (new PokemonType())
                ->setSlot($pokemonType['slot'])
                ->setType($namedAPIResourceList)
            ;
        }
        return $pokemonTypeList;
    }

    /**
     * @param array $pokemonTypes
     * @return list<string>
     */
    public function getTypeColor(array $pokemonTypes): array
    {
        $pokemonTypeList = $this->getTypeName($pokemonTypes);
        $typeName = [];
        foreach ($pokemonTypeList as $pokemonType)
            $typeName[] = $this->typeToColor($pokemonType->getType()->getName()
        );
        return $typeName;
    }

    private function typeToColor(string $type): string
    {
        $typeColor = [
            'normal' => '#A8A77A',
            'fire' => '#EE8130',
            'water' => '#6390F0',
            'electric' => '#F7D02C',
            'grass' => '#7AC74C',
            'ice' => '#96D9D6',
            'fighting' => '#C22E28',
            'poison' => '#A33EA1',
            'ground' => '#E2BF65',
            'flying' => '#A98FF3',
            'psychic' => '#F95587',
            'bug' => '#A6B91A',
            'rock' => '#B6A136',
            'ghost' => '#735797',
            'dragon' => '#6F35FC',
            'dark' => '#705746',
            'steel' => '#B7B7CE',
            'fairy' => '#D685AD',
        ];
        return $typeColor[$type];
    }
}