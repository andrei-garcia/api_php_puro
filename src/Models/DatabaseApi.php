<?php

namespace Api\Models;

use Medoo\Medoo;

class DatabaseApi extends Medoo{
    
    public function __construct()
    {
        parent::__construct([
            'type' => 'mysql',
            'host' => 'localhost',
            'database' => 'api',
            'username' => 'root',
            'password' => ''
        ]);
    }
}