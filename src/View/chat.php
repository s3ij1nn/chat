<?php

namespace App\View;

class chat 
{
    public function __construct()
    {
        $PATH = __DIR__ . '/../Template';

        $loader = new \Twig\Loader\FilesystemLoader($PATH);

        $twig = new \Twig\Environment($loader);

        echo $twig->render('chat.html.twig', [
            'room'      =>  $_POST['room'],
            'username'  =>  $_POST['username']
        ]);
        exit;
    }
}