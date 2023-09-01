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

        return $ret;
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

    public function update($params, $id)
    {
        
        $this->select($id);
        $database = new DatabaseApi();
        $validate = new ValidateCampanha();
        $validate->validate($params);

        $ret = $database->update($this->table,$params,["id[=]" => $id]);
        if($ret->rowCount() == 0){
            throw new \Exception("Erro ao atualizar dados da campanha");
        }
        return "campanha atualizada com sucesso";
    }

    public function delete($id)
    {
        
        $this->select($id);
        $database = new DatabaseApi();

        $ret = $database->delete($this->table,["id[=]" => $id]);
        if($ret->rowCount() == 0){
            throw new \Exception("Erro ao remover dados da campanha");
        }
        return "campanha removida com sucesso";
    }

}