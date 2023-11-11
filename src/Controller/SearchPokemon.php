<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\PokeAPI\NamedAPIResource;
use App\Form\SearchPokemonType;
use App\Service\GetImagePokemon;
use App\Service\GetTypePokemon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchPokemon extends AbstractController
{
    public function __construct(
        private readonly PokeAPI $pokeApi,
        private readonly GetImagePokemon $getImagePokemon,
        private readonly GetTypePokemon $getTypePokemon,
    ) {
    }

    #[Route('/search_pokemon', name: 'search_pokemon')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(SearchPokemonType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // ポケモンの名前からそのポケモンの情報を取得
            $namedAPIResourceList = $this->pokeApi->fetchPokemon($data['limit']);
            $count = $namedAPIResourceList->getCount();
            if ($count === 0) {
                $this->addFlash('error', 'ポケモンが見つかりませんでした');
            } else {
                foreach ($namedAPIResourceList->getResults() as $pokemon) {
                    $namedAPIResourceList = (new NamedAPIResource())
                        ->setName($pokemon['name'])
                        ->setUrl($pokemon['url'])
                    ;
                    $pokemons = $this->pokeApi->fetchPokemonName($namedAPIResourceList->getName());
                    // ポケモンの情報を取得
                    $pokemonInfo[] = $pokemons;
                    // ポケモンのデフォルト画像を取得
                    $pokemonFrontImage[] = $this->getImagePokemon->getFrontDefaultImage($pokemons['sprites']);
                    // ポケモンのタイプ色を取得
                    $pokemonTypeColor[] = $this->getTypePokemon->getTypeColor($pokemons['types']);
                }

                $this->addFlash('success', 'ポケモンが見つかりました！');
            }
        }

        return $this->render('search_pokemon/index.html.twig', [
            'form' => $form->createView(),
            'pokemonInfo' => $pokemonInfo ?? [],
            'image' => $pokemonFrontImage ?? '',
            'typeColor' => $pokemonTypeColor ?? [],
            'limit' => $data['limit'] ?? '',
            'count' => $count ?? '',
        ]);
    }
}
