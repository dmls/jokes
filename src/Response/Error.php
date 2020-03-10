<?php

namespace Response;

class Error
{
    public function __construct(string $error = '')
    {
        echo json_encode(['error' => $error]);
        exit;
    }
}
