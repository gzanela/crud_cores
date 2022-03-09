<?php
include_once('../exceptions/CorException.php');
include_once('../exceptions/GeralException.php');
require_once '../connection.php';
include_once('../models/Cor.php');
include_once('../models/Valida.php');
include_once('../controllers/CorController.php');
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
    <title>Nova cor</title>
</head>
<body>
    <?php include('../includes/menu.php')?>
    <div class="main">
        <h3>Cadastrar cor</h3>
        <form id="cadastroCorForm" action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control inputform" name="nome">
            </div>
            <div class="form-group">
                <label for="color">Cor</label>
                <input type="color" class="form-control" name="color" id="cor">
            </div>

        </form>
        <button form="cadastroCorForm" type="submit" class="btn btn-primary" name="submitCor">Cadastrar</button>
        <a href="v_lista_cores.php">
            <button class="btn btn-secondary">Voltar</button>
        </a>
        <?php
        if(isset($exception)){
            echo $exception->getMensagem();
        }

        ?>
    </div>
</body>
</html>