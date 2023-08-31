<?php

namespace Api\Controlers;

use Api\Models\CampanhaModels;
class CampanhaControler {
    
    public static function get($id){
        $campanha = new CampanhaModels;
        return $campanha->select($id);
    }

    public static function post($params){
        $campanha = new CampanhaModels;
        return $campanha->insert($params);
    }

    public function delete(){

    }

    public function update(){

    }
}