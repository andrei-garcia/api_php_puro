<?php

namespace Api\Models;

use Api\Models\DatabaseApi;
class CampanhaModels {

    private $table = "campanha";

    public function select($id)
    {
        $database = new DatabaseApi();

        $filtro = [];
        if(is_numeric($id))
            $filtro = [
                "id[=]" => $id
            ];
            
        $ret = $database->select($this->table,"*",$filtro);

        if(empty($ret))
            $ret = "Nenhuma informação encontrada";

        return json_encode($ret);
    }

}