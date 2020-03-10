<?php

namespace Joke;

class Base
{
    public $jokes;

    public function __construct()
    {
        $this->jokes = $this->getJokeConfig();
    }

    // Get routes from config file
    // Could be obtained from a DB in a real project
    protected function getJokeConfig()
    {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/../config/jokes.php';
        return !empty($jokes) ? $jokes : [];
    }

    // Shuffle joke DB and return the requested amount
    public function getJokes(int $amount = 1)
    {
        $jokes = $this->jokes;
        shuffle($jokes);

        $result = array_slice($jokes, 0, $amount);

        // Return first array item if there is only one joke
        // or array of jokes if more than one
        return count($result) == 1 ? $result[0] : $result;
    }
}
