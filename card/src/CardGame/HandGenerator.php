<?php

namespace App\CardGame;

class HandGenerator
{
    private $cardFactory;

    private $handSorter;

    /**
     * HandGenerator constructor.
     */
    public function __construct(CardFactory $cardFactory, HandSorter $handSorter)
    {
        $this->cardFactory = $cardFactory;
        $this->handSorter = $handSorter;
    }

    public function drawCards(): Hand
    {
        $hand = new Hand();

        for ($i = 0; $i < Hand::MAX_CARD; ++$i) {
            $hand->addCard($this->cardFactory->createInstance());
        }

        return $hand;
    }

    public function shuffle(Hand $hand): Hand
    {
        $cards = $hand->getCards();

        shuffle($cards);

        $hand->setCards($cards);

        return $hand;
    }

    public function sort(Hand $hand): Hand
    {
        return $this->handSorter->sort($hand);
    }
}
