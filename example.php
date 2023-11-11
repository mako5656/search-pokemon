<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\Service\PokeAPI;

$request = new PokeAPI();

//$pokemonInfo = $request->fetchPokemonName('ditto');
$pokemonInfo = $request->fetchPokemonId(6);

//$pokemonInfo = $request->fetchPokemon(5, 0);
$result = $pokemonInfo['types'];
//foreach ($result as $key => $value) {
//    $result[$key] = $request->fetchPokemonName($value['name']);
//}

var_dump($result);
