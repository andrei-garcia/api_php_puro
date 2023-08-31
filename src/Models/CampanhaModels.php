<?php

namespace Api\Models;

use Api\Models\DatabaseApi;
use Api\Models\ValidateCampanha;
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
            throw new \Exception("Nenhuma informação encontrada");

        return json_encode($ret);
    }

    public function insert($params)
    {
        $database = new DatabaseApi();
        $validate = new ValidateCampanha();
        $validate->validate($params);

        $ret = $database->insert($this->table,$params);
        if($ret->rowCount() == 0){
            throw new \Exception("Erro ao inserir campanha");
        }
        return "campanha inserida com sucesso";
    }

}