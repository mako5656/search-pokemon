<?php

namespace App\DTO;

// https://pokeapi.co/docs/v2#namedapiresource
class NamedAPIResource
{
    private string $name;
    private string $url;

    function getName(): string
    {
        return $this->name;
    }

    function setName(string $name): void
    {
        $this->name = $name;
    }

    function getUrl(): string
    {
        return $this->url;
    }

    function setUrl(string $url): void
    {
        $this->url = $url;
    }
}