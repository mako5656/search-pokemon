<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\SearchPokemonType;
use App\Repository\ListInfoPokemon;
use App\Service\GetListInfoPokemon;
use App\Service\PokeAPI;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchPokemon extends AbstractController
{
    private int $limit = 20;

    public function __construct(
        private readonly PokeAPI $pokeApi,
        private readonly GetListInfoPokemon $getListInfoPokemon,
    ) {
    }

    #[Route('/search_pokemon', name: 'search_pokemon')]
    #[Template('/search_pokemon/index.html.twig')]
    public function index(Request $request, ListInfoPokemon $listInfoPokemon): Response
    {
        $form = $this->createForm(SearchPokemonType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // ポケモンの名前からそのポケモンの情報を取得
            $limit = $this->limit;
            $namedAPIResourceList = $this->pokeApi->fetchPokemon($limit);
            $count = $namedAPIResourceList->getCount();
            if ($count === 0) {
                $this->addFlash('error', 'ポケモンが見つかりませんでした');
            } else {
                $listInfoPokemon = $this->getListInfoPokemon->resultToInfo($namedAPIResourceList->getResults(), $data);

                $this->addFlash('success', 'ポケモンが見つかりました！');
            }
        }

        return $this->render('search_pokemon/index.html.twig', [
            'form' => $form->createView(),
            'name' => $listInfoPokemon->getName() ?? [],
            'image' => $listInfoPokemon->getImage() ?? [],
            'typeColor' => $listInfoPokemon->getTypeColor() ?? [],
            'count' => count($listInfoPokemon->getId()) ?? 0,
        ]);
    }
}
