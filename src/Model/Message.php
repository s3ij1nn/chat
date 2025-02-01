<?php

namespace App\Model;



class Message extends Database
{
    private $room;
    public function __construct()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        parent::__construct();
        $this->validation();
        $this->get_message();

        exit;
    }

    private function validation()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if(empty($data['room'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Room parameter required']);
            exit;
        }
        $this->room = $data['room'];
    }

    public function get_message()
    {
        
        echo json_encode(parent::select('messages', '*', [
            'room'  =>  $this->room,
            'ORDER' => ['id' => 'DESC'],
            'LIMIT' =>  100
        ]));

        exit;
    }

}