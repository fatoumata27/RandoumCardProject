<?php

namespace App\Controller;

use App\CardGame\Game;
use App\CardGame\GameInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CardGameController extends AbstractController
{
    /**
     * @Route("/play", name="play")
     */
    public function playGame(GameInterface $game)
    {
        if (Game::STATUS_PLAYING !== $game->getStatus()) {
            $game->start();
        }

        $results = $game->stop();

        return new JsonResponse($results);
    }
}
