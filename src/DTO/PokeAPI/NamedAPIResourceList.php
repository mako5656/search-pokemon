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

    function setCount(int $count): void
    {
        $this->count = $count;
    }

    function getNext(): ?string
    {
        return $this->next;
    }

    function setNext(?string $next): void
    {
        $this->next = $next;
    }

    function getPrevious(): ?string
    {
        return $this->previous;
    }

    function setPrevious(?string $previous): void
    {
        $this->previous = $previous;
    }

    function getResults(): array
    {
        return $this->results;
    }

    function setResults(array $results): void
    {
        $this->results = $results;
    }
}