<?php
require_once('../connection.php');

class Cor
{
    protected $id;
    protected $nome;
    protected $hex;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getHex(){
        return $this->hex;
    }
    public function setHex($hex){
        $this->hex = $hex;
    }

    public function cadastraCor(){
        $conn = new Connection();
        $db = $conn->getConnection();
        $sql = 'INSERT INTO colors (name, hex) VALUES (:nome, :hex)';
        $cadastraCor = $db->prepare($sql);
        $cadastraCor->bindValue(1, $this->getNome(), PDO::PARAM_STR);
        $cadastraCor->bindValue(2, $this->getHex(), PDO::PARAM_STR);
        $cadastraCor->execute();
    }
    public function editarCor(){
        $conn = new Connection();
        $db = $conn->getConnection();
        $sql = 'UPDATE colors SET name = :nome, hex = :hex WHERE id = :id';
        $editarCor = $db->prepare($sql);
        $editarCor->bindValue(1, $this->getNome(), PDO::PARAM_STR);
        $editarCor->bindValue(2, $this->getHex(), PDO::PARAM_STR);
        $editarCor->bindValue(3, $this->getId(), PDO::PARAM_INT);
        $editarCor->execute();
    }
    public function deletarCor(){
        $conn = new Connection();
        $db = $conn->getConnection();
        $sql = 'DELETE FROM colors WHERE id = :id';
        $deletarCor = $db->prepare($sql);
        $deletarCor->bindValue(1, $this->getId(), PDO::PARAM_INT);
        $deletarCor->execute();
    }
    public function buscarCor(){
        $conn = new Connection();
        $db = $conn->getConnection();
        $sql = 'SELECT id, name, hex FROM colors WHERE id = :id';
        $buscarCor = $db->prepare($sql);
        $buscarCor->bindValue(1, $this->getId(), PDO::PARAM_INT);
        $buscarCor->execute();
        $buscarCor->fetchObject();
        $this->nome = $buscarCor->name;
    }

}