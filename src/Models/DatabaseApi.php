<?php

namespace Api\Models;

use Medoo\Medoo;

class DatabaseApi extends Medoo{
    
    public function __construct()
    {
        parent::__construct($GLOBALS['con'][BANCO_API]);
    }
}