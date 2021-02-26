<?php

namespace App\CardGame;

class Card
{
    private $color;

    private $value;

    private $rank;

    public function getColor(): string
    {
        return $this->color;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function setRank(string $rank): self
    {
        $this->rank = $rank;

        return $this;
    }
}
