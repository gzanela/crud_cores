<?php
include_once('../models/Usuario.php');
include_once('../models/UsuarioCor.php');
require_once '../connection.php';
$conexao = new Connection();
$sql = "SELECT u.id as user_id, u.name as user_name, count(uc.user_id) as total
FROM users u
LEFT JOIN user_colors uc on uc.user_id = u.id
group by u.id,
         u.name
order by total desc
LIMIT 5
";
$topvinculos = $conexao->query($sql);
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
    <title>Usuários e cores</title>
</head>
<body>
<?php include('../includes/menu.php')?>
<div class="main">
    <div class="mt-3 table-responsive">
        <div class="div-container">
            <h3 class="">Ranking de vínculos</h3>
            <table class="table table-sm table-hover">
                <thead class="">
                <th>#</th>
                <th>nome</th>
                <th>cores vinculadas</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach($topvinculos as $registro){
                    echo sprintf("
                        <tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            
                        </tr>
                        ", $registro->user_id, $registro->user_name, $registro->total);
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
