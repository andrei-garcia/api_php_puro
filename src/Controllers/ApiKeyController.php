<?php

namespace Api\Controllers;

use Api\Models\ApiKeyModels;
class ApiKeyController {

    public static function post($params){
        $campanha = new ApiKeyModels;
        return $campanha->create($params);
    }

}