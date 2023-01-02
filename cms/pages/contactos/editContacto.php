
<?php

$id=$_GET['id'];
require('../../db/connect.php');
$pdo = pdo_connect_mysql();

# podemos utilizar diretamente o método ->query() uma vez que, ainda, não estamos a utilizar varíaveis na instrução SQL
$stmt = $pdo->prepare('SELECT * from contactos where id=:id');
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
<title>Editar Contacto</title>
</head>
<body>

<form action="../../functions/contactos/editContactoDB.php" method="post">
<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id?>">
<div>
<label for="nome">Nome:</label>
    <Select id="nome" name="nome">
        <option value="<?php echo $dados['nome']?>" ><?php echo $dados['nome'] ?></option>
        <?php 

        $redes=['Facebook','Instagram','Github','Telefone','Email','Linkedin','Twitter'];
        

        for($i=0;$i<sizeof($redes);$i++){
            if($redes[$i]!=$dados['nome']){
                ?>
        <option value="<?php  echo $redes[$i]?>"> <?php echo $redes[$i]?></option>

            <?php }}?>
    
    </Select>
</div>

<div>
    <label> Descrição</label>
    <input type="text" id="descricao" name="descricao" value="<?php echo $dados['descricao']?>">
</div>
<div>
    <label> Link</label>
    <input type="link" id="link" name="link" value="<?php echo $dados['link']?>">
</div>

<div>
    <input type="submit" value="Atualizar">
</div>

</form>

<a href="./contactos.php">Voltar</a>







</body>
</html>