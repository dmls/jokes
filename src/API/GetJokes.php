<?php

namespace API;

class GetJokes
{
    public function run()
    {
        $jokeBase = new \Joke\Base;
        $availJokeCount = count($jokeBase->jokes);
        
        $count = !empty($_GET['count']) ? $_GET['count'] : null;
        if (!$count) {
            new \Response\Error('Missing query parameter "count". Please specify a desired number of jokes between 1 and ' . $availJokeCount);

        }

        if ($count > count($jokeBase->jokes)) {
            new \Response\Error('Requested joke count exceeds available number of jokes. Max is ' . $availJokeCount);
        }

        echo json_encode($jokeBase->getJokes($count));
        exit;
    }
}