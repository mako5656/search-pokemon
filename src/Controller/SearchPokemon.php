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
                $this->addFlash('error', '検索失敗');
            } else {
                // ポケモンのデフォルト画像を取得
                $pokemonFrontImage = $this->getImagePokemon->getFrontDefaultImage($pokemon['sprites']);
                $this->addFlash('success', '検索成功');
            }
        }

        return $this->render('search_pokemon/index.html.twig', [
            'form' => $form->createView(),
            'posts' => $pokemon ?? [],
            'image' => $pokemonFrontImage ?? '',
        ]);
    }
}