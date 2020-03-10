<?php

class Router 
{
    protected $routes;

    public function __construct()
    {
        $this->routes = $this->getRoutes();
    }

    // Get routes from config file
    // Could be obtained from a DB in a real project
    protected function getRoutes()
    {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/../config/routes.php';
        return !empty($routes) ? $routes : [];
    }

    public function route()
    {
        $handler = null;
        
        // Remove leading/trailing slashes and url parameters
        $requestURI = rtrim(strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?'), '/');

        // Check if request URI matches any available route keys
        foreach ($this->routes as $route) {
            $keys = !empty($route['keys']) ? $route['keys'] : [];
            if (!in_array($requestURI, $keys)) {
                continue;
            }

            $handler = !empty($route['handler']) ? $route['handler'] : null;
            break;
        }

        if (!$handler) {
            $handler = '\Template\NotFound';
        }

        $handler = (new $handler)->run();
    }
}
