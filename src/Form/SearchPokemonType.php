<?php

declare(strict_types=1);

namespace App\Form;

use App\Enum\PokemonTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchPokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', EnumType::class, [
                'label' => 'ポケモンのタイプ',
                'class' => PokemonTypeEnum::class,
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
