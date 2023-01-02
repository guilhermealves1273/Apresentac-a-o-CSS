
<?php
session_start();
$id=$_GET['id'];
$idUser=$_SESSION["id"];


require('../../db/connect.php');
$pdo = pdo_connect_mysql();

# podemos utilizar diretamente o método ->query() uma vez que, ainda, não estamos a utilizar varíaveis na instrução SQL
$stmt = $pdo->prepare('SELECT * from mensagens where id=:id');
$stmt->bindParam(":id", $id, PDO::PARAM_STR);
$stmt->execute();

 # definir o fetch mode
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$dados=$stmt->fetch();

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Visualizar Mensagem</title>
</head>
<body>

<form action="../../functions/mensagens/marcarVista.php" method="post">
<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id?>">
<input type="hidden" class="form-control" id="idUser" name="idUser" value="<?php echo $idUser?>">
<input type="hidden" class="form-control" id="string" name="string" value="vista">
<div>
    <label> Nome: <?php echo $dados['nome']?></label>
</div>
<div>
    <label> E-Mail: <?php echo $dados['email']?></label>
</div>
<div>
    <label> Informacao: <?php echo $dados['informacao']?></label>
</div>
<div>
    <label> estado: <?php echo $dados['estado']?></label>
</div>




<div>
    <input type="submit" value="Marcar como vista ">
</div>


</form>

<a href="./listagem.php">Voltar  </a>







</body>
</html>