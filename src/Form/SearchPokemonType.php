<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchPokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => 'ポケモンのタイプ',
                'choices' => [
                    'ノーマル' => 'normal',
                    'ほのお' => 'fire',
                    'みず' => 'water',
                    'でんき' => 'electric',
                    'くさ' => 'grass',
                    'こおり' => 'ice',
                    'かくとう' => 'fighting',
                    'どく' => 'poison',
                    'じめん' => 'ground',
                    'ひこう' => 'flying',
                    'エスパー' => 'psychic',
                    'むし' => 'bug',
                    'いわ' => 'rock',
                    'ゴースト' => 'ghost',
                    'ドラゴン' => 'dragon',
                    'あく' => 'dark',
                    'はがね' => 'steel',
                    'フェアリー' => 'fairy',
                ],
                'required' => false,
            ])
            ->add('name', TextType::class, [
                'label' => 'ポケモンの名前',
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => '検索',
            ])
        ;
    }
}
