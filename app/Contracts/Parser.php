<?php

namespace App\Contracts;


interface Parser
{
    public function load(string $url): self;

    public function start(): array;
}
