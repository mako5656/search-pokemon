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
     * @return list<Pokemon, bool>
     */
    public function filterPokemon(Pokemon $pokemon, ?string $name, ?PokemonTypeEnum $type): array
    {
        // $nameが存在する場合は、$pokemonの名前と一致するか確認する
        if ($name && $pokemon->getName() !== $name) {
            // 存在しない場合は、$pokemonを空にして返す
            $pokemon = new Pokemon();
            return [$pokemon, false];
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
            // 一致しない場合は、$pokemonを空にして返す
            if (!$isMatch) {
                $pokemon = new Pokemon();
                return [$pokemon, false];
            }
        }

        return [$pokemon, true];
    }
}
