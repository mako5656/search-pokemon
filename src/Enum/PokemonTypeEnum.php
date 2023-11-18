<?php

declare(strict_types=1);

namespace App\Enum;

enum PokemonTypeEnum: string
{
    case ノーマル = 'normal';
    case ほのお = 'fire';
    case みず = 'water';
    case でんき = 'electric';
    case くさ = 'grass';
    case こおり = 'ice';
    case かくとう = 'fighting';
    case どく = 'poison';
    case じめん = 'ground';
    case ひこう = 'flying';
    case エスパー = 'psychic';
    case むし = 'bug';
    case いわ = 'rock';
    case ゴースト = 'ghost';
    case ドラゴン = 'dragon';
    case あく = 'dark';
    case はがね = 'steel';
    case フェアリー = 'fairy';
}
