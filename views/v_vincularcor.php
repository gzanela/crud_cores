<?php
require_once '../connection.php';
include_once('../exceptions/GeralException.php');
include_once('../models/UsuarioCor.php');
include_once('../controllers/UsuarioCorController.php');
$id = $_GET['id'];
$conexao = new Connection();
$cores = $conexao->query(
        "SELECT *
                 FROM colors
                WHERE id NOT IN (SELECT color_id
                                  FROM user_colors
                                 WHERE user_id = $id);"
        );
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
        <h3>Cores disponíveis</h3>
        <script src="../scripts/checkAll.js"></script>
        <button form="checkCor" class="btn btn-primary" name="vincularCor" type="submit">Vincular</button>
        <a href='v_cores_vinculadas.php?id=<?php echo $id?>'>
            <button class="btn btn-secondary">Voltar</button>
        </a>
        <form action="" id="checkCor" method="post"></form>
        <div class="mt-3 table-responsive">
            <table class="table table-sm table-hover">
                <thead class="">
                <th>
                    <input type="checkbox" onClick="toggle(this)">
                </th>
                <th>#</th>
                <th>cor</th>
                <th>nome</th>
                <th>hex</th>
                </tr>
                </thead>
                <?php
                foreach($cores as $cor){
                    echo sprintf("
                    <tr>
                        <td>
                            <input form='checkCor' type='checkbox' name='checkCorVinculo[]' value='$cor->id'>
                        </td>
                        <td>%s</td>
                        <td>
                            <i style='color: $cor->hex ' class='bi bi-circle-fill'></i>
                        </td>
                        <td>%s</td>
                        <td>%s</td>
                    </tr>
                ", $cor->id, $cor->name, $cor->hex);
                }
                if (isset($exception)) {
                    echo $exception->getMensagem();
                }
                ?>
        </div>
    </div>

</body>
</html>
