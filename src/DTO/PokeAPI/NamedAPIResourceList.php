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

    function getCount(): int
    {
        return $this->count;
    }

    function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    function getNext(): ?string
    {
        return $this->next;
    }

    function setNext(?string $next): self
    {
        $this->next = $next;

        return $this;
    }

    function getPrevious(): ?string
    {
        return $this->previous;
    }

    function setPrevious(?string $previous): self
    {
        $this->previous = $previous;

        return $this;
    }

    function getResults(): array
    {
        return $this->results;
    }

    function setResults(array $results): self
    {
        $this->results = $results;

        return $this;
    }
}