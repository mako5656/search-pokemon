<?php

declare(strict_types=1);

namespace App\DTO\PokeAPI;

// https://pokeapi.co/docs/v2#namedapiresource
class NamedAPIResource
{
    private string $name;
    private string $url;

    function getName(): string
    {
        return $this->name;
    }

    function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    function getUrl(): string
    {
        return $this->url;
    }

    function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}