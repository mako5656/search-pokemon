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

    public function resultToInfo(array $results, $data): ListInfoPokemon
    {
        foreach ($results as $pokemonResult) {
            $resultPokemonList = (new NamedAPIResource())
                ->setName($pokemonResult['name'])
                ->setUrl($pokemonResult['url'])
            ;
            $pokemon = $this->pokeApi->fetchPokemonName($resultPokemonList->getName());

            # TODO: 配列で返すのではなく初期化されたクラスだったら次のポケモンを取得ように処理を変更する
            // 入力した項目に一致するポケモンを取得
            [$pokemon, $isExistence] = $this->filter->filterPokemon($pokemon, $data['name'], $data['type']);
            if (!$isExistence) {
                continue;
            }

            $this->listInfoPokemon
                // ポケモンのIDを取得
                ->addId($pokemon->getId())
                // ポケモンの名前を取得
                ->addName($pokemon->getName())
                // ポケモンのデフォルト画像を取得
                ->addImage($this->getImagePokemon->getFrontDefaultImageUrl($pokemon->getSprites()))
                // ポケモンのタイプ色を取得
                ->addTypeColor($this->getTypePokemon->getTypeColor($pokemon->getTypes()))
            ;
        }

        return $this->listInfoPokemon;
    }
}
