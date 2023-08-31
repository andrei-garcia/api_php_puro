<?php

namespace Api\Controllers;

use Api\Models\CampanhaModels;
class CampanhaController {
    
    public static function get($id){
        $campanha = new CampanhaModels;
        return $campanha->select($id);
    }

    public static function post($params){
        $campanha = new CampanhaModels;
        return $campanha->insert($params);
    }

    public static function delete($id){
        $campanha = new CampanhaModels;
        return $campanha->delete($id);
    }

    public static function put($params, $id){
        $campanha = new CampanhaModels;
        return $campanha->update($params,$id);
    }
}