<?php

namespace App\CardGame;

class HandSorter
{
    public function sort(Hand $hand): Hand
    {
        $hand = clone $hand;
        $cards = $hand->getCards();
        usort($cards, function ($cardA, $cardB) {
            return $cardA->getRank() < $cardB->getRank() ? 1 : -1;
        });

        $hand->setCards($cards);

        return $hand;
    }
}
