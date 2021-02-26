<?php

namespace App\CardGame;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class CardFactory
{
    const DATA_CARDS = '/config/card.yaml';

    private $rootPath;

    public function __construct(string $rootPath)
    {
        $this->rootPath = $rootPath;
    }

    public function createInstance()
    {
        try {
            $data = Yaml::parseFile($this->rootPath.self::DATA_CARDS);
            $indexColor = array_rand($data['colors'], 1);
            $indexValue = array_rand($data['values'], 1);

            $card = (new Card())
                ->setColor($data['colors'][$indexColor])
                ->setValue($data['values'][$indexValue])
                ->setRank($indexValue);

            return $card;
        } catch (ParseException $exception) {
            printf('Unable to create card object: %s', $exception->getMessage());

            return null;
        }
    }
}
