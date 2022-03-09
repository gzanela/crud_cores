<?php
class Valida{
    protected $emailErro = false;
    protected $corErro = false;

    public function setEmailErro($b){
        $this->emailErro = $b;
    }
    public function getEmailErro(){
        return $this->emailErro;
    }
    public function setCorErro($c){
        $this->corErro = $c;
    }
    public function getCorErro(){
        return $this->corErro;
    }

    //valida se o e-mail já existe no banco
    public function validaEmail(Usuario $usr, $operacao){
        $connection =  new Connection();
        $db = $connection->getConnection();
        $sql = "SELECT count(*) AS qtde, id FROM users WHERE email = :email group by id";
        $contarRegistros = $db->prepare($sql);
        $contarRegistros->bindValue(1, $usr->getEmail());
        $contarRegistros->execute();
        $registrosEncontrados = $contarRegistros->fetchObject();
        $db = null;


        if($operacao == 'CRIAR'){
            if($registrosEncontrados->qtde > 0){
                $this->setEmailErro(true);
            }
        }
        if($operacao == 'EDITAR'){
            if($registrosEncontrados->qtde > 0 && strval($registrosEncontrados->id) <> strval($usr->getId())){
                $this->setEmailErro(true);
            }
        }
    }

    public function validaCor(Cor $cor, $operacao){

        $connection =  new Connection();
        $db = $connection->getConnection();
        $sql = "SELECT count(*) AS qtde, id FROM colors WHERE hex = :hex group by id";
        $contarRegistros = $db->prepare($sql);
        $contarRegistros->bindValue(1, $cor->getHex());
        $contarRegistros->execute();
        $registrosEncontrados = $contarRegistros->fetchObject();
        $db = null;

        if($operacao == 'CRIAR'){
            if($registrosEncontrados->qtde > 0){
                $this->setCorErro(true);
            }
        }
        if($operacao == 'EDITAR'){
            if($registrosEncontrados->qtde > 0 && strval($registrosEncontrados->id) <> strval($cor->getId())){
                $this->setCorErro(true);
            }
        }
    }
}