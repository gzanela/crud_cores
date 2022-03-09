<?php
include_once('../exceptions/CorException.php');
include_once('../exceptions/GeralException.php');
require_once '../connection.php';
include_once('../models/Cor.php');
include_once('../models/Valida.php');
include_once('../controllers/CorController.php');

$cores = new Cor();
$cores->setId($_GET['id']);
$cores->buscarCor();

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
    <title>Editar cor</title>
</head>
<body>
    <?php include('../includes/menu.php')?>
    <div class="main">
        <h4>Editar cor</h4>
        <form action="" method="POST" id="formEditarCor">
            <div class="form-group">
                <label for="nomeEditado">Nome</label>
                <input class="form-control" name="nomeEditado" type="text" value="<?=$_POST['corHidden'] ?>">
            </div>
            <div class="form-group">
                <label for="hexEditado">Cor</label>
                <input class="form-control" name="hexEditado" id="cor" type="color" value="<?=$_POST['hexHidden'] ?>">
            </div>
        </form>
        <button type="submit" form="formEditarCor" class="btn btn-primary" name="submitEditarCor">Alterar</button>
        <a href="v_lista_cores.php" class="btn btn-secondary">Voltar</a>
        <?php
        if(isset($exception)){
            echo $exception->getMensagem();
        }

        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/akjpro/form-anticlear/base.js"></script>
</body>
</html>