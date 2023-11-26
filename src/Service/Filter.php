<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\PokeAPI\Pokemon;
use App\Enum\PokemonTypeEnum;

class Filter
{
    /**
     * @param Pokemon $pokemon
     * @param string|null $name
     * @param PokemonTypeEnum|null $type
     * @return Pokemon|null $pokemon
     */
    public function filterPokemon(Pokemon $pokemon, ?string $name, ?PokemonTypeEnum $type): ?Pokemon
    {
        // $nameが存在する場合は、$pokemonの名前と一致するか確認する
        if ($name && $pokemon->getName() !== $name) {
            // 存在しない場合は、nullで返す
            return null;
        }

        // $typeが存在する場合は、$pokemonのタイプと一致するか確認する
        if (!is_null($type)) {
            // $pokemonのタイプを取得する
            $getTypePokemon = new GetTypePokemon();
            $pokemonTypes = $getTypePokemon->getTypeName($pokemon->getTypes());
            // $typeと一致するタイプが存在するか確認する
            $isMatch = false;
            foreach ($pokemonTypes as $pokemonType) {
                if ($pokemonType->getType()->getName() === $type->value) {
                    $isMatch = true;
                    break;
                }
            }
            // 一致しない場合は、nullにして返す
            if (!$isMatch) {
                return null;
            }
        }

        return $pokemon;
    }
}
