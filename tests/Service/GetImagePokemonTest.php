<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Enum\PokemonImageEnum;
use App\Service\GetImagePokemon;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class GetImagePokemonTest extends TestCase
{
    use ProphecyTrait;

    private array $data = [];

    protected function setUp(): void
    {
        $this->data = [
            'front_default' => 'front_default.png',
            'front_shiny' => 'front_shiny.png',
            'other' => [
                'dream_world' => [
                    'front_default' => 'dream_world.png',
                ],
                'home' => [
                    'front_default' => 'home.png',
                ],
                'official-artwork' => [
                    'front_default' => 'official-artwork.png',
                ],
            ],
        ];
    }

    public function test_GetImageUrl_デフォルト(): void
    {
        $SUT = new GetImagePokemon();
        $imageType = PokemonImageEnum::デフォルト;
        $expected = 'front_default.png';
        $this->assertSame($expected, $SUT->getImageUrl($this->data, $imageType));
    }

    public function test_GetImageUrl_ドリームワールド(): void
    {
        $SUT = new GetImagePokemon();
        $imageType = PokemonImageEnum::ドリームワールド;
        $expected = 'dream_world.png';
        $this->assertSame($expected, $SUT->getImageUrl($this->data, $imageType));
    }
}
