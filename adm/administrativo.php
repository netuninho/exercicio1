<?php
session_start();
include_once('seguranca.php');
include_once('../conexao/conexao.php');

seguranca_adm();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <div class="d-grid gap-2 col-3 mx-auto">
            Olá Administrador(a) - <?php echo $_SESSION['usuarioNome']; ?>
        <a class="btn btn-outline-danger btn-sm" href='sair.php'>Sair</a>
        </div>
        <hr>
        
        <div class="d-grid gap-2 col-6 mx-auto">
            <a class="btn btn-outline-info btn-lg" href="listarusuario.php">Listar Usuário</a> 
            <a class="btn btn-outline-success btn-lg" href="frmusuario.php">Cadastrar Usuário</a>
        </div>
    </div>
</body>
</html>