<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\Controller\PokeAPI;

$request = new PokeAPI();

//$pokemonInfo = $request->fetchPokemonName('ditto');
//$pokemonInfo = $request->fetchPokemonId(6);

$pokemonInfo = $request->fetchPokemon(5, 0);

var_dump($pokemonInfo);