
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
    <title>Editar Utilizador</title>
</head>
<body>

<form action="../../functions/users/updateUserDB.php" method="post">
<input type="hidden" class="form-control" id="idUser" name="idUser" value="<?php echo $id?>">
    <div>
        <label id="username" name="username">Username:<?php echo $dados['username']?></label>
    </div>
    <div>
        <label>Role</label>
        <Select id="role" name="role">
            <option value="<?php echo $dados['role']?>" selected><?php echo $dados['role']?> </option>
            <?php if($dados['role']=='admin'){?>
                <option value="sem_role">sem_role</option>
                <option value="gestor">gestor</option>
            <?php }else if($dados['role']=='gestor'){?>
                <option value="admin">admin</option>
                <option value="sem_role">sem_role</option>
            <?php }else {?>
                <option value="admin">admin</option>
                <option value="gestor">gestor</option>
                <?php }?>
        </Select>
    </div>

    <div>
        <input type="submit" value="Atualizar">
    </div>
   
</form>







</body>
</html>