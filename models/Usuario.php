<?php
class Usuario {
    protected $id;
    protected $nome;
    protected $email;

public function getId() {
    return $this->id;
}
public function setId($id){
    $this->id = $id;
}

public function setNome($nome) {
    $this->nome = $nome;
}
public function getNome() {
return $this->nome;
}
public function setEmail($email){
    $this->email = $email;
}
public function getEmail(){
    return $this->email;
}

public function buscarUsuarios(){
    $conn = new Connection();
    $db = $conn->getConnection();
    $sql = "SELECT * FROM users";
    $busca = $db->prepare($sql);
    $busca->execute();

}

public function cadastrar(){
    $conn = new Connection();
    $db = $conn->getConnection();
    $sql = "INSERT INTO users (name, email) VALUES (:nome, :email)";
    $cadastro = $db->prepare($sql);
    $cadastro->bindValue(1, $this->getNome(), PDO::PARAM_STR);
    $cadastro->bindValue(2, $this->getEmail(),PDO::PARAM_STR);
    $cadastro->execute();
}
public function deletar(){
    $conn = new Connection();
    $db = $conn->getConnection();
    $sql = 'DELETE FROM users WHERE id = :id';
    $delete = $db->prepare($sql);
    $delete->bindValue(1, $this->getId(), PDO::PARAM_INT);
    $delete->execute();
}
public function alterar(){
    $conn = new Connection();
    $db = $conn->getConnection();
    $sql = 'UPDATE users SET name = :nome, email = :email WHERE id = :id';
    $alterar = $db->prepare($sql);
    $alterar->bindValue(1, $this->getNome(), PDO::PARAM_STR);
    $alterar->bindValue(2, $this->getEmail(), PDO::PARAM_STR);
    $alterar->bindValue(3, $this->getId(), PDO::PARAM_INT);
    $alterar->execute();
}

}     

?>