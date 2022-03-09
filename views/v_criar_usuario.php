<?php
include_once('../exceptions/GeralException.php');
include_once('../exceptions/UsuarioException.php');
require_once '../connection.php';
include_once('../models/Usuario.php');
include_once('../models/Valida.php');
include_once('../controllers/UsuarioController.php');
$email = isset($_POST['email']) ? $_POST['email'] : "";
$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
    <title>Novo cadastro</title>
</head>
<body>
    <?php include('../includes/menu.php')?>
    <div class="main">
        <div class="form-container">
            <h3 class="">Cadastrar</h3>
            <form id="cadastroForm" action="" method="POST">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?= $nome ?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" value="<?= $email ?>">
                </div>

            </form>
            <button form="cadastroForm" type="submit" class="btn btn-primary" name="submitCriar">Cadastrar</button>
            <a href="v_lista_usuarios.php">
                <button class="btn btn-secondary">Voltar</button>
            </a>
            <?php
                if(isset($exception)){
                    echo $exception->getMensagem();
                }

            ?>
        </div>
    </div>

</body>
</html>
