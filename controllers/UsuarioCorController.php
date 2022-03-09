<?php
if(isset($_POST['vincularCor'])){
    $userid = $_GET['id'];
    $list = $_POST['checkCorVinculo'];

    for($i = 0; $i < count($list); $i++){
        $usuarioCor = new UsuarioCor();
        $usuarioCor->setUserId($userid);
        $usuarioCor->setColorId($list[$i]);
        $usuarioCor->vincular();

    }
}

if(isset($_POST['submitDesvincularCor'])){
    $id = $_POST['userID'];
    $cor_id = $_POST['colorID'];

    $userCor = new UsuarioCor();
    $userCor->setUserId($id);
    $userCor->setColorId($cor_id);
    $userCor->deletar();


}