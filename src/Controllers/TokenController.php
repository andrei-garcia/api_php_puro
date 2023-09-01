<?php

namespace Api\Controllers;

use Api\Models\TokenModels;

class TokenController {

    public static function post($params){
        $campanha = new TokenModels;
        return $campanha->create($params);
    }

}