<?php

namespace Template;

use Template\Base as Base;

class NotFound extends Base
{
    public function __construct()
    {
        $this->template = 'notfound';
    }
}