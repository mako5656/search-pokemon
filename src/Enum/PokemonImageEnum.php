<?php

declare(strict_types=1);

namespace App\Enum;

enum PokemonImageEnum: string
{
    case デフォルト = 'Front-Default';
    case ドリームワールド = 'Dream-World';
    case ホーム = 'Home';
    case アートワーク = 'Official-Artwork';

    public function getMethodSuffix(): string
    {
        return str_replace('-', '', $this->value);
    }
}
