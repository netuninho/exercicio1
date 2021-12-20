<?php 

$idusuario = isset($_GET["idusuario"]) ? $_GET["idusuario"]: null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 
    try {
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "bdprojeto";

        $con = new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$senha); 

        if($op=="del"){
            $sql = "delete  FROM  tblusuarios where idusuario= :idusuario";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idusuario",$idusuario);
            $stmt->execute();
            header("Location:listarusuario.php");
        }


        if($idusuario){
           
            $sql = "SELECT * FROM  tblusuarios where idusario= :idusuario";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":idusuario",$idusuario);
            $stmt->execute();
            $cliente = $stmt->fetch(PDO::FETCH_OBJ);
            
        }
        if($_POST){
            if($_POST["idusuario"]){
                $sql = "UPDATE tblusuarios SET nome=:nome, email=:email, senha=:senha, idsituacao=:idsituacao, idnivelacesso=:idnivelacesso, criado=:criado, modificado=:modificado  WHERE idusuario =:idusuario";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":nome", $_POST["nome"]);
                $stmt->bindValue(":email", $_POST["email"]);
                $stmt->bindValue(":senha", $_POST["senha"]);
                $stmt->bindValue(":idsituacao", $_POST["idsituacao"]);
                $stmt->bindValue(":idnivelacesso", $_POST["idnivelacesso"]);
                $stmt->bindValue(":criado", $_POST["criado"]);
                $stmt->bindValue(":modificado", $_POST["modificado"]);
                $stmt->execute(); 
            } else {
                $sql = "INSERT INTO tblusuarios(nome,email,senha,idsituacao,idnivelacesso,criado,modificado) VALUES (:nome,:email,:senha,:idsituacao,:idnivelacesso,:criado,:modificado)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(":nome",$_POST["nome"]);
                $stmt->bindValue(":email",$_POST["email"]);
                $stmt->bindValue(":senha", $_POST["senha"]);
                $stmt->bindValue(":idsituacao", $_POST["idsituacao"]);
                $stmt->bindValue(":idnivelacesso", $_POST["idnivelacesso"]);
                $stmt->bindValue(":criado", $_POST["criado"]);
                $stmt->bindValue(":modificado", $_POST["modificado"]);
                $stmt->execute(); 
            }
            header("Location:listarusuario.php");
        } 

    } catch(PDOException $e){
    echo 'Erro' . $e->getMessage();
        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1>Cadastro de Usuários</h1>

    <form method="POST">
  
        Nome  <input type="text" name="nome"   class="form-control"     value="<?php echo isset($tblusuarios) ? $tblusuarios->nome : null ?>"><br>
        Email <input type="email"  name="email"  class="form-control"     value="<?php echo isset($tblusuarios) ? $tblusuarios->email : null ?>"><br>
        Senha <input type="password" name="senha" class="form-control" value="<?php echo isset($tblusuarios) ? $tblusuarios->senha : null ?>"><br>
        Situação
        <select name="idsituacao" class="form-select" aria-label="Default select example" value="<?php echo isset($tblusuarios) ? $tblusuarios->idsituacao : null ?>">
            <option selected>...</option>
            <option value="1">Ativo</option>
            <option value="2">Inativo</option>
        </select>
        Nível de Acesso <select name="idnivelacesso" class="form-select" aria-label="Default select example" value="<?php echo isset($tblusuarios) ? $tblusuarios->idnivelacesso : null ?>">
            <option selected>...</option>
            <option value="1">Administrador</option>
            <option value="2">Usuário</option>
            <option value="3">Colaborador</option>
            <option value="4">Fornecedor</option>
        </select>

        Criado <input type="date" name="criado" class="form-control" value="<?php echo isset($tblusuarios) ? $tblusuarios->criado : null?>"><br>
        Modificado <input type="date" name="criado" class="form-control" value="<?php echo isset($tblusuarios) ? $tblusuarios->modificado : null?>"><br>
        <input type="hidden"      name="idusuario"                       value="<?php echo isset($tblusuarios) ? $tblusuarios->idcliente : null ?>">
        <br>
        <input type="submit" value="Cadastrar" class="btn btn-outline-primary">
  
    </form>
    <br>
    <a href="listarusuario.php" class="btn btn-outline-secundary">Voltar</a>
</div>

</body>
</html>