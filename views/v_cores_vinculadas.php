<?php
require_once '../connection.php';
include('../models/UsuarioCor.php');
include_once('../controllers/UsuarioCorController.php');
$conexao = new Connection();
$id = $_GET['id'];
$cores = $conexao->query(
    "SELECT c.name as colorName, c.hex as colorHex, c.id as colorId
             FROM colors c
            JOIN user_colors uc ON c.id = uc.color_id
            JOIN users usr ON usr.id = uc.user_id
            WHERE usr.id = $id");?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
    <title>Cores vinculadas</title>
</head>
<body>
    <?php include('../includes/menu.php')?>
    <div class="main">
        <h3>Cores vinculadas ao usuário</h3>
        <form action="v_vincularcor.php?id=<?php echo $id?>" method="POST" id="vinculaCorBotao">

        </form>
        <a href=''>
            <button class="btn btn-primary" type="submit" form="vinculaCorBotao">Vincular cor</button>
        </a>
        <a href="v_lista_usuarios.php">
            <button class="btn btn-secondary">Voltar</button>
        </a>
        <div class="mt-3 table-responsive">
            <table class="table table-sm table-hover">
                <thead class="">
                <th>#</th>
                <th>cor</th>
                <th>nome</th>
                <th>hex</th>
                <th>desvincular</th>
                </tr>
                </thead>
                <?php
                foreach($cores as $cor){
                    echo sprintf("
                    <tr>
                        <td>%s</td>
                        <td>
                            <i style='color: $cor->colorHex ' class='bi bi-circle-fill'></i>
                        </td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <form action='' method='post'>  
                                <input type='hidden' value='$id' name='userID'>
                                <input type='hidden' value='$cor->colorId' name='colorID'>
                                <button type='submit' name='submitDesvincularCor' class='btn-acao bi bi-x-lg text-danger'></button>
                            </form>
                            
                        </td>
                    </tr>
                ", $cor->colorId, $cor->colorName, $cor->colorHex);
                }
                ?>
        </div>
    </div>
</body>
</html>
