<?php

require 'vendor/autoload.php';

$router = new App\Router\Router;

$router->View('GET', 'App\View\top');
$router->View('POST', 'App\View\chat', 'chat');
$router->View('POST', 'App\Model\Message', 'get');
$router->View('POST', 'App\Model\Post', 'post');
$router->notfound();