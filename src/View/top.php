<?php

namespace App\View;

class top {

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Template');

        $twig = new \Twig\Environment($loader);

        echo $twig->render('index.html.twig');
        exit;
    }

}