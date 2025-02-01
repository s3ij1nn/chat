<?php

namespace App\Model;

class Post extends Database
{
    private $room, $username, $message;

    public function __construct()
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');
        
        parent::__construct();
        $this->validation();
        $this->save_message();
    }

    private function validation()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if (empty($data['room']) || empty($data['username']) || empty($data['message'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid parameters']);
            exit;
        }

        $this->room     = $data['room'];
        $this->username = $data['username'];
        $this->message  = $data['message'];
    }

    private function save_message()
    {
        parent::insert('messages', [
            'room'      =>  $this->room,
            'username'  =>  $this->username,
            'message'   =>  $this->message,
            'timestamp' =>  parent::raw("datetime('now', 'localtime')")
        ]);

        echo json_encode(['status' => 'success']);
        exit;
    }
    
}