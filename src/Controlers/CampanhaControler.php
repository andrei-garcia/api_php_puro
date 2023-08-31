<?php

namespace Api\Controlers;

use Api\Models\CampanhaModels;
class CampanhaControler {
    
    public static function get($id){
        $campanha = new CampanhaModels;
        return $campanha->select($id);
    }

    public function post(){

    }

    public function delete(){

    }

    public function update(){

    }
}