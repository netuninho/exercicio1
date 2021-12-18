<?php
include_once('../conexao/conexao.php');

try{
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bdprojeto";
    $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 
    $sql = "SELECT * from tblusuarios";
    $qry = $con->query($sql);
    $user = $qry->fetchAll(PDO::FETCH_OBJ);
} catch(PDOException $e){
    echo $e->getMessage();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
 
<div class="container">
<h1>Lista de Usuários</h1>
<hr>
<a href="frmusuario.php" class="btn btn-outline-primary">Novo Cadastro</a>
<hr>
<table class="table table-striped table-hover">
<!-- Tabela -->
    <thead>
        <tr>
           <th>ID</th> 
           <th>Nome</th>
           <th>Email</th>
           <th colspan=2>Ações</th>
           
        </tr>
    </thead>
    <tbody>
    <?php foreach($user as $usuario) { ?>
        <tr>
            <td><?php echo $usuario->idusuario ?></td>
            <td><?php echo $usuario->nome ?></td>
            <td><?php echo $usuario->email ?></td>
            
            <td><a href="frmusuario.php?op=del&idusuario=<?php echo  $usuario->idusuario ?>">Excluir</a></td>

        </tr>
        <?php } ?> 
    </tbody>
</table>
<a class="btn btn-outline-secundary" href="administrativo.php">Voltar</a>
</div>
</body>
</html>