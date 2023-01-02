<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Utilizador</title>
    <link rel="stylesheet" href="./deleteUser.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
<button onclick="window.location.href='../welcome.php'" class="voltarBT topleft fa fa-arrow-left "></button>
<div class="container text-center">
    <div class="row mt-5">
        <div class="col-12 display-5 text-info">
        Pretende eliminar este utilizador?
        </div>
    </div>
<div class="row my-5">
    <div class="col-12">
        <div class="list-group">


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

<form action="../../functions/users/deleteUserDB.php" method="post">
<input type="hidden" class="form-control" id="idUser" name="idUser" value="<?php echo $id?>">
    <div>
        <label id="username" name="username">Username:<?php echo $dados['username']?></label>
    </div>
    <div>
        <label id="role" name="role">Role:<?php echo $dados['role']?></label>
    </div>
    <?php if($dados['role']=='admin'){ ?>
        <h3 class="">Não é possivel eliminar um utilizador que tem role ADMIN!!!!!</h3>
    <?php }else{ ?>
    <div>
        <input type="submit" value="Apagar">
    </div>
    <?php } ?>
</form>

            </div>
        </div>
    </div>
</div>
</body>
<script src="https://use.fontawesome.com/62e43a72a9.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>

