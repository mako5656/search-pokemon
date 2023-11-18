<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\DTO\PokeAPI\NamedAPIResource;
use App\DTO\PokeAPI\PokemonType;
use App\Service\GetTypePokemon;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class GetTypePokemonTest extends TestCase
{
    use ProphecyTrait;

    private array $data = [];

    protected function setUp(): void
    {
        $this->data =
            [
                [
                    'slot' => 1,
                    'type' => [
                        'name' => 'fire',
                        'url' => 'https://pokeapi.co/api/v2/type/10/',
                    ],
                ],
                [
                    'slot' => 2,
                    'type' => [
                        'name' => 'flying',
                        'url' => 'https://pokeapi.co/api/v2/type/3/',
                    ],
                ],
            ];
    }

    public function test_getTypeColor(): void
    {
        $SUT = new GetTypePokemon();
        $expected = ['#EE8130', '#A98FF3'];
        $this->assertSame($expected, $SUT->getTypeColor($this->data));
    }

    public function test_getTypeName(): void
    {
        $SUT = new GetTypePokemon();
        $namedAPIResource = (new NamedAPIResource)
            ->setName('flying');
        $expected = (new PokemonType)
            ->setType($namedAPIResource);
        $this->assertSame($expected->getType()->getName(), $SUT->getTypeName($this->data)[1]->getType()->getName());

    }
}
