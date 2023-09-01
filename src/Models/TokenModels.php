<?php

namespace Api\Models;

use ReallySimpleJWT\Token;
use Api\Models\DatabaseApi;

class TokenModels {

    public static function validateRequest(){
        $headers = apache_request_headers();
        
        if(!isset($headers['Authorization']))
            throw new \Exception("Não foi informado o token de acesso.");
        
        $auth = explode(" ",$headers['Authorization']);
        $token = $auth[1];
        $payload = Token::getPayload($token);
        
        if(!isset($payload['usuario']) || !isset($payload['senha']))
            throw new \Exception("Token com problemas no payload.");

        $database = new DatabaseApi();
        $ret = $database->select('api_key', ["chave"], [
            "usuario[=]" => $payload['usuario'],
            "senha[=]" => $payload['senha']
        ]);

        $key = $ret[0]["chave"];
        $result = Token::validate($token, $key);
        
        if(!$result)
            throw new \Exception("Token inválido.");

        if(!Token::validateExpiration($token) ){
            throw new \Exception("Token expirado.");
        }
       
    }

    public function create($params){

        if(empty($params['api_key']))
            throw new \Exception("O parâmetro api_key não foi informado.");

        $database = new DatabaseApi();

        $ret = $database->select('api_key', ["usuario","senha"], [
            "chave[=]" => $params['api_key']
        ]);

        if(empty($ret))
            throw new \Exception("O parâmetro api_key é inválido.");
       
        $payload = [
            'usuario' => $ret[0]["usuario"],
            'senha' => $ret[0]["senha"],
            'exp' => time() + 3600,
            'iss' => 'localhost'
        ];

        try {
            $token = Token::customPayload($payload, $params['api_key']);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
       
            
        return ['access_token' => $token];
    }
} 