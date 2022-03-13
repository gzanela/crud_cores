<?php
if(isset($_POST['vincularCor'])){
    if(isset($_GET['id'])){
        $userid = $_GET['id'];
    };
    $list = $_POST['checkCorVinculo'];

    for($i = 0; $i < count($list); $i++){
        $usuarioCor = new UsuarioCor();
        $usuarioCor->setUserId($userid);
        $usuarioCor->setColorId($list[$i]);
        $usuarioCor->vincular();

    }
}

if(isset($_POST['submitDesvincularCor'])){
    if(isset($_POST['userID'])){
        $id = $_POST['userID'];
    };

    $cor_id = $_POST['colorID'];

    $userCor = new UsuarioCor();
    $userCor->setUserId($id);
    $userCor->setColorId($cor_id);
    $userCor->deletar();


}