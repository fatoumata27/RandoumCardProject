<?php

namespace App\Command;

use App\CardGame\Game;
use App\CardGame\GameInterface;
use App\CardGame\Hand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ExecuteCardCommand extends Command
{
    protected static $defaultName = 'game:play';

    private $game;

    public function __construct(GameInterface $game)
    {
        $this->game = $game;

        parent::__construct();
    }

    protected function configure()
    {
        $this
        ->setDescription('Throw a 10 cards hand.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        if (Game::STATUS_PLAYING !== $this->game->getStatus()) {
            $this->game->start();
        }

        $results = $this->game->stop();

        $io->title('Card game not sorted');
        $io->table(['Rank', 'Value', 'Color'], $this->displayHand($results, Hand::NOT_SORTED));

        $io->title('Card game sorted');
        $io->table(['Rank', 'Value', 'Color'], $this->displayHand($results, Hand::SORTED));
    }

    private function displayHand(array $results, string $behaviour): array
    {
        $lines = [];

        $cards = $results[$behaviour];
        foreach ($cards as $card) {
            $lines[] = [$card->getRank(), $card->getValue(), $card->getColor()];
        }

        return $lines;
    }
}
