<?php

namespace App\Router;

class Router
{

    private $HTTP_METHOD, $URI;

    public function __construct()
    {
        $this->HTTP_METHOD      = $_SERVER['REQUEST_METHOD'];
        $this->URI              = $_SERVER['REQUEST_URI'];
    }

    public function Parse()
    {
        $uris = explode("/", $this->URI);

        return $uris[1];
    }

    public function View($method, $Object, $uri = '')
    {
        if(($method == $this->HTTP_METHOD) && ($this->Parse() === $uri)){
            new $Object;
        }
    }

    public function notfound()
    {
        http_response_code(404);
        echo "404 Not Found";
        exit(0);
    }
}