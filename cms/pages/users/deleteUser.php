
<?php

$id=$_GET['idUser'];
require('../../db/connect.php');
$pdo = pdo_connect_mysql();

# podemos utilizar diretamente o método ->query() uma vez que, ainda, não estamos a utilizar varíaveis na instrução SQL
$stmt = $pdo->prepare('SELECT username,role,id from user where id=:id');
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
    <title>Pretende apagar este utilizador?</title>
</head>
<body>

<form action="../../functions/users/deleteUserDB.php" method="post">
<input type="hidden" class="form-control" id="idUser" name="idUser" value="<?php echo $id?>">
    <div>
        <label id="username" name="username">Username:<?php echo $dados['username']?></label>
    </div>
    <div>
        <label id="role" name="role">Role:<?php echo $dados['role']?></label>
    </div>

    <?php if($dados['role']=='admin'){ ?>

        <h3>Não é possivel eliminar um utilizador que tem role ADMIN!!!!!</h3>

     <?php }else{ ?>
    
    <div>
        <input type="submit" value="Apagar">
    </div>

   <?php } ?>

</form>







</body>
</html>

