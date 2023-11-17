<?php

declare(strict_types=1);

namespace App\Repository;

class ListInfoPokemon
{
    /*
     * @var list<int>
     */
    private array $id = [];
    /*
     * @var list<string>
     */
    private array $name = [];
    /*
     * @var list<string>
     */
    private array $image = [];
    /*
     * @var list<list<string>>
     */
    private array $typeColor = [];

    public function getId(): array
    {
        return $this->id;
    }

    public function addId(int $id): self
    {
        $this->id[] = $id;

        return $this;
    }

    public function getName(): array
    {
        return $this->name;
    }

    public function addName(string $name): self
    {
        $this->name[] = $name;

        return $this;
    }

    public function getImage(): array
    {
        return $this->image;
    }

    public function addImage(string $image): self
    {
        $this->image[] = $image;

        return $this;
    }

    public function getTypeColor(): array
    {
        return $this->typeColor;
    }

    public function addTypeColor(array $typeColor): self
    {
        $this->typeColor[] = $typeColor;

        return $this;
    }
}
