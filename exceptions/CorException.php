<?php

class CorException
{
    protected $mensagem;

    public function getMensagem(){
        return $this->mensagem;
    }

    public function corJaExiste(){
        $this->mensagem = "<div class='alert alert-danger text-center mt-3'>O código dessa cor já existe</div>";
    }
}