<?php
// keys define URIs that can be handled
// and not return a 404
$routes = [[
    'keys' => [
        'random',
        'new-joke',
        'funny'
    ],
    'handler' => '\Template\Joke'
], [
    'keys' => [
        'api/jokes'
    ],
    'handler' => '\API\GetJokes'
]];
