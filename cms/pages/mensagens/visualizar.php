
<?php
session_start();
$id=$_GET['id'];
$idUser=$_SESSION["id"];
$string="vista";


require('../../db/connect.php');
$pdo = pdo_connect_mysql();

$stmt1 = $pdo->prepare('SELECT nome,email,informacao,estado from mensagens where id=?');
$stmt1->bindParam(1, $id, PDO::PARAM_INT);
$stmt1->execute();

 # definir o fetch mode
$stmt1->setFetchMode(PDO::FETCH_ASSOC);
$dados=$stmt1->fetch();


if($dados['estado']=="nao vista"){
    $stmt= $pdo->prepare('Update mensagens set estado=?, idUser=? where id=? ');
    $stmt->bindParam(1, $string, PDO::PARAM_STR);
    $stmt->bindParam(2, $idUser, PDO::PARAM_INT);
    $stmt->bindParam(3, $id, PDO::PARAM_INT);
    
    $stmt->execute();
    
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Mensagem</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="visualizar.css">
</head>
<body>
    <div>
        <button onclick="window.location.href='./listagem.php'" class="voltarBT topleft fa fa-arrow-left "></button>
    </div>
<div class="container text-center">
    <div class="row mt-5">
        <div class="col-12 display-5 text-info">
        Mensagem
        </div>
    </div>
<div class="row my-5">
    <div class="col-12">
        <div class="list-group">



<form action="../../functions/contactos/deleteContactoDB.php" method="post">
<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id?>"> 


    <div >
        <label id="nome" name="nome"><h4 id="label">Nome</h4> <div class="quadrado"><?php echo $dados['nome']?></div></label>
    </div>

    <div class="Div">
        <label id="descricao" name="descricao"><h4 id="label">Email:</h4> <div class="quadrado"><?php echo $dados['email']?></div></label>
    </div>

    <div class="Div">
        <label id="descricao" name="descricao"><h4 id="label">Informação</h4> <div class="quadrado"><?php echo $dados['informacao']?></div></label>
    </div>
    <div class="Div">
        <label id="descricao" name="descricao"><h4 id="label">Estado</h4> <div class="quadrado"><?php echo $dados['estado']?></div></label>
    </div>
    
    


    <button type="submit" id="botao">
        <i class="fa fa-envelope"></i>
    </button>
   
   
</form>

            </div>
        </div>
    </div>
</div>

<script src="https://use.fontawesome.com/62e43a72a9.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>














