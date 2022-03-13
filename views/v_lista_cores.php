<?php
require_once '../connection.php';

include_once('../models/Cor.php');
include_once('../models/UsuarioCor.php');
include_once('../models/Valida.php');
include_once('../controllers/CorController.php');
$conexao = new Connection();
$cores = $conexao->query("SELECT * FROM colors");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
    <title>Cores</title>
</head>
<body>
    <?php include('../includes/menu.php')?>
    <div class="main">
        <a href="v_criar_cor.php">
            <button class="btn btn-primary">Novo</button>
        </a>
        <div class="mt-3 table-responsive">
            <table class="table table-sm table-hover">
                <thead class="">
                <th>#</th>
                <th>cor</th>
                <th>nome</th>
                <th>hex</th>
                <th>editar</th>
                </tr>
                </thead>
                <?php
                foreach($cores as $cor){
                    echo sprintf("
                    <tr>
                        <td>%s</td>
                        <td>
                            <i style='color: $cor->hex ' class='bi bi-circle-fill'></i>
                        </td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <form action='v_editar_cor.php?id=$cor->id' method='post' class='acoes'>
                                <input type='hidden' name='corHidden' value='$cor->name'>
                                <input type='hidden' name='hexHidden' value='$cor->hex'>
                                <button type='submit' name='iconeEditar' class='btn-acao bi bi-pencil-square text-info'></button>
                            </form>
                            <form action='' method='post' class='acoes'>  
                                <input type='hidden' value='$cor->id' name='colorID'>
                                <button type='submit' name='submitDeletarCor' class='btn-acao bi bi-x-lg text-danger'></button>
                            </form>
                        </td>
                    </tr>
                ", $cor->id, $cor->name, $cor->hex);
                }
                ?>
    </div>
</div>
</body>
</html>
