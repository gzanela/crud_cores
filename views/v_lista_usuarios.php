<?php
include_once('../models/Usuario.php');
include_once('../models/UsuarioCor.php');
include_once('../models/Valida.php');
require_once '../connection.php';
include_once('../controllers/UsuarioController.php');
$conexao = new Connection();
$users = $conexao->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
    <title>Home</title>
</head>
<body>
    <?php include('../includes/menu.php')?>
    <div class="main">
    <a href="v_criar_usuario.php">
        <button class="btn btn-primary">Novo</button>
    </a>
    <div class="mt-3 table-responsive mx-2">
        <div class="div-container">
        <table class="table table-sm table-hover">
            <thead class="">
                <th>#</th>
                <th>nome</th>
                <th>e-mail</th>
                <th>editar</th>
            </tr>
            </thead>
                <tbody>

                <?php
                    foreach($users as $user){
                        echo sprintf("
                        <tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>
                                <form action='v_editar_usuario.php?id=$user->id' method='post' class='acoes'>
                                    <input type='hidden' name='nomeHidden' value='$user->name'>
                                    <input type='hidden' name='emailHidden' value='$user->email'>
                                    <button type='submit' name='iconeEditar' class='btn-acao bi bi-pencil-square text-info'></button>
                                </form>
                                <a href='v_cores_vinculadas.php?id=$user->id' class='acoes'>
                                    <button type='submit' name='iconeCores' class='btn-acao bi bi-palette-fill text-success'></button>
                                </a>
                                    <form action='' class='acoes' method='post'>
                                    <input type='hidden' name='idHidden' value='$user->id'>
                                    <button type='submit' name='acaoDeletar' class='btn-acao bi bi-x-lg text-danger'></button>
                                </form>
                            </td>
                        </tr>
                        ", $user->id, $user->name, $user->email);
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>