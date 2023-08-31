<?php

namespace Api\Models;

class ValidateCampanha {

    private $dadosNaoEncontradosObrigatorios = [
        "nome" => true,
        "orcamento" => true,
        "publico" => true
    ];
    
   public function validate($params){

        foreach ($params as $key => $value) {
            if($key === 'nome'){
                $this->validaNome($value);
            }

            if($key === 'orcamento'){
                $this->validaOrcamento($value);
            }

            if($key === 'publico'){
                $this->validaPublico($value);
            }
        }

        $obrigatoriosNaoPrenchidos = [];
        foreach ($this->dadosNaoEncontradosObrigatorios as $key => $value) {
            if($value)
                $obrigatoriosNaoPrenchidos[] = $key;
        }

        if(count($obrigatoriosNaoPrenchidos) > 0)
            throw new \Exception("Campos obrigatórios não preenchidos: ".implode(',',$obrigatoriosNaoPrenchidos));

   }

   private function validaPublico($value){
        $this->dadosNaoEncontradosObrigatorios['publico'] = false;

        if(strlen($value) > 20){
            throw new \Exception("O campo publico deve conter no máximo 20 caracteres.");
        }

    }

   private function validaOrcamento($value){
        $this->dadosNaoEncontradosObrigatorios['orcamento'] = false;

        if(!is_numeric($value)){
            throw new \Exception("O valor do campo orçamento não é um número válido: ".$value);
        }

        if(!is_float(floatval($value))){
            throw new \Exception("O valor do campo orçamento é inválido: ".$value);
        }

    }

   private function validaNome($value){
        $this->dadosNaoEncontradosObrigatorios['nome'] = false;

        if(strlen($value) > 200){
            throw new \Exception("O nome deve conter no máximo 200 caracteres.");
        }

   }
}