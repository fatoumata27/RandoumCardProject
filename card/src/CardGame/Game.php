<?php

namespace App\CardGame;

class Game implements GameInterface
{
    const STATUS_NOT_STARTED = -1;
    const STATUS_PLAYING = 1;
    const STATUS_GAME_OVER = 0;

    private $handGenarator;

    private $handSorted;

    private $handNotSorted;

    private $status;

    /**
     * HandGenerator constructor.
     */
    public function __construct(HandGenerator $handGenerator)
    {
        $this->handGenerator = $handGenerator;
        $this->status = self::STATUS_NOT_STARTED;
    }

    public function start(): void
    {
        $this->status = self::STATUS_PLAYING;

        $handDrawed = $this->handGenerator->drawCards(); // On tire au sort

        $this->handNotSorted = $this->handGenerator->shuffle($handDrawed); // On melange

        $this->handSorted = $this->handGenerator->sort($this->handNotSorted); // On trie
    }

    public function stop(): array
    {
        $this->status = self::STATUS_GAME_OVER;

        return [
            'not-sorted' => $this->handNotSorted->getCards(),
            'sorted' => $this->handSorted->getCards(),
        ];
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}
