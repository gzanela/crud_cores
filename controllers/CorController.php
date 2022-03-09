<?php
$id = $_GET['id'];
if(isset($_POST['submitEditarCor'])){
    if(!empty($_POST['nomeEditado'])){
        $operacao = 'EDITAR';
        $cor = new Cor();
        $cor->setId($id);
        $cor->setHex($_POST['hexEditado']);
        $cor->setNome($_POST['nomeEditado']);
        $valida = new Valida();
        $valida->validaCor($cor, $operacao);
        if(!$valida->getCorErro()){
            $cor->editarCor();
            header('Location: v_lista_cores.php');
        }else{
            $exception = new CorException();
            $exception->corJaExiste();
        }
    }else{
        $exception = new GeralException();
        $exception->campoVazio();
    }

}

if(isset($_POST['submitCor'])){
    if(!empty($_POST['nome'])){
        $operacao = 'CRIAR';
        $cor = new Cor();
        $cor->setNome($_POST['nome']);
        $cor->setHex($_POST['color']);
        $valida = new Valida();
        $valida->validaCor($cor, $operacao);
        if(!$valida->getCorErro()){
            $cor->cadastraCor();
            header('Location: v_lista_cores.php');
        } else{
            $exception = new CorException();
            $exception->corJaExiste();
        }
    }else{
        $exception = new GeralException();
        $exception->campoVazio();
    }
}

if(isset($_POST['submitDeletarCor'])){
    $model = 'COR';
    $cor = new Cor();
    $cor->setId($_POST['colorID']);
    $cor->deletarCor();
    $usuarioCor = new UsuarioCor();
    $usuarioCor->deletarModelExcluido($cor->getId(), $model);
}
