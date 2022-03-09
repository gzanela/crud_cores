<?php
class UsuarioCor
{
    protected $user_id;
    protected $color_id;

    public function setUserId($id){
        $this->user_id = $id;
    }
    public function getUserId(){
        return $this->user_id;
    }

    public function setColorId($id){
        $this->color_id = $id;
    }
    public function getColorId(){
        return $this->color_id;
    }

    public function deletar(){
        $conn = new Connection();
        $db = $conn->getConnection();
        $sql = 'DELETE FROM user_colors WHERE user_id = :user_id AND color_id = :color_id';
        $deletar = $db->prepare($sql);
        $deletar->bindValue(1, $this->getUserId(), PDO::PARAM_INT);
        $deletar->bindValue(2, $this->getColorId(), PDO::PARAM_INT);
        $deletar->execute();
    }
    public function vincular(){
        $conn = new Connection();
        $db = $conn->getConnection();
        $sql = 'INSERT INTO user_colors (user_id, color_id) VALUES (:user_id, :color_id)';
        $vincular = $db->prepare($sql);
        $vincular->bindValue(1, $this->getUserId(), PDO::PARAM_INT);
        $vincular->bindValue(2, $this->getColorId(), PDO::PARAM_INT);
        $vincular->execute();
    }
    public function deletarModelExcluido($id, $model){
        if($model == 'USUARIO'){
            $sql = 'DELETE FROM user_colors WHERE user_id = :user_id';
        }
        if($model == 'COR'){
            $sql = 'DELETE FROM user_colors WHERE color_id = :color_id';
        }
        $conn = new Connection();
        $db = $conn->getConnection();
        
        $deletar = $db->prepare($sql);
        $deletar->bindValue(1, $id, PDO::PARAM_INT);
        $deletar->execute();
    }
}