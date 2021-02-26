<?php

namespace App\CardGame;

interface GameInterface
{
    public function start(): void;

    public function stop(): array;

    public function getStatus(): int;
}
