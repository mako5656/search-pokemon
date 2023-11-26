<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\SearchPokemonType;
use App\Repository\ListInfoPokemon;
use App\Service\AddLimitPokemon;
use App\Service\Filter\Filter;
use App\Service\GetImagePokemon;
use App\Service\GetTypePokemon;
use App\Service\PokeAPI;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchPokemon extends AbstractController
{
    private int $limit = 10;

    public function __construct(
        private readonly AddLimitPokemon $addLimitPokemon,
        private readonly PokeAPI $pokeApi,
        private readonly GetImagePokemon $getImagePokemon,
        private readonly GetTypePokemon $getTypePokemon,
        private readonly Filter $filter,
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

            if ($data['name'] !== null) {
                $pokemon = $this->pokeApi->fetchPokemonName($data['name']);
                $pokemon = $this->filter->filterPokemon($pokemon, $data['type']);
                if (!is_null($pokemon)) {
                    $listInfoPokemon
                        ->addId($pokemon->getId())
                        ->addName($pokemon->getName())
                        ->addImage($this->getImagePokemon->getImageUrl($pokemon->getSprites(), $data['image']))
                        ->addTypeColor($this->getTypePokemon->getTypeColor($pokemon->getTypes()));
                }
            } else {
                for ($i = 1; count($listInfoPokemon->getId()) < $this->limit; $i++) {
                    $listInfoPokemon = $this->addLimitPokemon->addLimitPokemon($listInfoPokemon, $data, $i);
                }
            }

            if ($listInfoPokemon->getId() === []) {
                $this->addFlash('error', 'ポケモンが見つかりませんでした。');
            } else {
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
