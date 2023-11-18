<?php

declare(strict_types=1);

namespace App\Form;

use App\Enum\PokemonImageEnum;
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
            ->add('name', TextType::class, [
                'label' => '名前',
                'required' => false,
            ])
            ->add('type', EnumType::class, [
                'label' => 'タイプ',
                'class' => PokemonTypeEnum::class,
                'required' => false,
            ])
            ->add('image', EnumType::class, [
                'label' => '表示画像',
                'class' => PokemonImageEnum::class,
            ])
            ->add('submit', SubmitType::class, [
                'label' => '検索',
            ])
        ;
    }
}
