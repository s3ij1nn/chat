<?php

namespace App\Model;

class Database extends \Medoo\Medoo
{

    public function __construct()
    {
        parent::__construct([
            'type'      =>  'sqlite',
            'database'  =>  __DIR__ . '/../../database/chat.db'
        ]);
        $this->boot();
    }

    private function boot()
    {
        parent::create('messages',[
            "id"        =>  [
                'INTEGER',
                'PRIMARY KEY',
                'AUTOINCREMENT'
            ],
            'room'      =>  [
                'TEXT',
                'NOT NULL'
            ],
            'username'  =>  [
                'TEXT',
                'NOT NULL'
            ],
            'message'   =>  [
                'TEXT',
                'NOT NULL'
            ],
            'timestamp' =>  [
                'DATETIME',
                'NOT NULL'
            ]
        ]);
    }

}