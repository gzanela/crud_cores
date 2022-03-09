<?php

class UsuarioException
{
    protected $mensagem;

    public function getMensagem(){
        return $this->mensagem;
    }

    public function emailJaExiste(){
        $this->mensagem = "<div class='alert alert-danger text-center mt-3'>O email digitado já existe</div>";

    }
}