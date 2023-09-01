<?php

namespace Api\Models;

use Api\Models\DatabaseApi;
class ApiKeyModels {

    private $table = "api_key";

    public function create($params){
        $database = new DatabaseApi();
        $ret = $database->select($this->table, "chave", [
            "usuario[=]" => $params['usuario'],
            "senha[=]" =>  $params['senha']
        ]);
       
        if(empty($ret)){

            
            $apiKey = $this->obtemKeySecret();

            $params["chave"] = $apiKey;
            $ret = $database->insert($this->table,$params);

            if($ret->rowCount() == 0)
                throw new \Exception("Erro ao inserir api key");
            
        }else{
            $apiKey = $ret[0];
        }
        
        return ['api_key' => $apiKey];
    }

    private function obtemKeySecret($tamanho = 12) {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>?';
        $senha = '';
        
        for ($i = 0; $i < $tamanho; $i++) {
            $senha .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }
        
        return $senha;
    }
    
} 