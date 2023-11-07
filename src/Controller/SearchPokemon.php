<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\SearchPokemonType;
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
    ){
    }

    #[Route('/search_pokemon', name: 'search_pokemon')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(SearchPokemonType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // ポケモンの名前からそのポケモンの情報を取得
            $pokemon = $this->pokeApi->fetchPokemonName($data['pokemonName']);
            if ($pokemon === []) {
                $this->addFlash('error', 'ポケモンが見つかりませんでした');
            } else {
                // ポケモンのデフォルト画像を取得
                $pokemonFrontImage = $this->getImagePokemon->getFrontDefaultImage($pokemon['sprites']);
                // ポケモンのタイプを取得
                $pokemonType = $this->getTypePokemon->getType($pokemon['types'][0]['type']);
                // ポケモンのタイプ色を取得
                $pokemonTypeColor = $this->getTypePokemon->getTypeColor($pokemon['types'][0]['type']);

                $this->addFlash('success', 'ポケモンが見つかりました！');
            }
        }

        return $this->render('search_pokemon/index.html.twig', [
            'form' => $form->createView(),
            'posts' => $pokemon ?? [],
            'image' => $pokemonFrontImage ?? '',
            'type' => $pokemonType ?? '',
            'typeColor' => $pokemonTypeColor ?? '',
        ]);
    }
}