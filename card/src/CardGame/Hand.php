<?php

namespace App\CardGame;

class Hand
{
    const MAX_CARD = 10;
    const NOT_SORTED = 'not-sorted';
    const SORTED = 'sorted';

    private $cards = [];

    public function addCard(Card $card): void
    {
        if (!$this->exists($card) && $this->getSize() <= self::MAX_CARD) {
            $this->cards[] = $card;
        }
    }

    public function exists($card): bool
    {
        return in_array($card, $this->cards);
    }

    public function getSize(): int
    {
        return count($this->cards);
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function setCards(array $cards)
    {
        $this->cards = $cards;
    }
}
