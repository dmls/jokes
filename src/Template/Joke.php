<?php

namespace Template;

use Template\Base as Base;

class Joke extends Base
{
    protected $joke;

    public function __construct()
    {
        $this->template = 'joke';
    }
}
