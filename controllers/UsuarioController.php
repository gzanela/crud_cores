<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
};

if(isset($_POST['submitCriar'])){
    if(!empty($_POST['nome']) && !empty($_POST['email'])) {
        $operacao = 'CRIAR';
        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);

        $valida = new Valida();
        $valida->validaEmail($usuario, $operacao);
        if(!$valida->getEmailErro()){
            $usuario->cadastrar();
            header('Location: v_lista_usuarios.php');
        }else{
            $exception = new UsuarioException();
            $exception->emailJaExiste();
            $exception->getMensagem();
        }
    }else{
        $exception = new GeralException();
        $exception->campoVazio();
        $exception->getMensagem();
    }
}

if(isset($_POST['submitDeletar']) || isset($_POST['acaoDeletar'])){
    $model = 'USUARIO';
    if(isset($_POST['acaoDeletar'])){
        $id = $_POST['idHidden'];
    }
    $usr = new Usuario();
    $usr->setId($id);
    $usr->deletar();
    $usuarioCor = new UsuarioCor();
    $usuarioCor->deletarModelExcluido($id, $model);
    header('Location: v_lista_usuarios.php');
    
}

if(isset($_POST['submitEditar'])){
    if(!empty($_POST['nomeEditado']) && !empty($_POST['emailEditado'])){
        $operacao = 'EDITAR';
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setNome($_POST['nomeEditado']);
        $usuario->setEmail($_POST['emailEditado']);
        $valida = new Valida();
        $valida->validaEmail($usuario,$operacao);
        if(!$valida->getEmailErro()){
            $usuario->alterar();
            header('Location: v_lista_usuarios.php');

        }else{
            $exception = new UsuarioException();
            $exception->emailJaExiste();
            $exception->getMensagem();

        }
    }else{
        $exception = new GeralException();
        $exception->campoVazio();

    }
}

