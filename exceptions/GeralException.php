<?php

class GeralException
{
    protected $mensagem;

    public function getMensagem(){
        return $this->mensagem;
    }

    public function campoVazio(){
        $this->mensagem = "<div class='alert alert-danger text-center mt-3'>Preencha os dados</div>";

    }
}