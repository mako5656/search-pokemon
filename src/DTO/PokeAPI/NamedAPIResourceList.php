<?php

declare(strict_types=1);

namespace App\DTO\PokeAPI;

// https://pokeapi.co/docs/v2#resource-listspagination-section
class NamedAPIResourceList
{
    private int $count;
    private ?string $next = null;
    private ?string $previous = null;
    private array $results;

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getNext(): ?string
    {
        return $this->next;
    }

    public function setNext(?string $next): self
    {
        $this->next = $next;

        return $this;
    }

    public function getPrevious(): ?string
    {
        return $this->previous;
    }

    public function setPrevious(?string $previous): self
    {
        $this->previous = $previous;

        return $this;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function setResults(array $results): self
    {
        $this->results = $results;

        return $this;
    }
}
