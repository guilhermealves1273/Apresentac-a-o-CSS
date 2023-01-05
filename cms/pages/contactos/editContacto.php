
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="editContacto.css">

    
</head>
<body>
<div class="container text-center">
<div class="row mt-5">
  <div class="col-12 display-4 text-info">
    Editar Contacto
  </div>
</div>
<div class="row my-5">
  <div class="col-12">
    <div class="list-group">

<form action="../../functions/contactos/editContactoDB.php" method="post">
<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id?>">
<div class="nomeMargin">

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

<div class="padding">
    <label> Descrição</label>
    <input type="text" id="descricao" name="descricao" value="<?php echo $dados['descricao']?>">
</div>
<div class="padding linkmargin">
    <label> Link</label>
    <input type="link" id="link" name="link" value="<?php echo $dados['link']?>">
</div>

    <div>
        <input type="submit" value="Atualizar" id="AtualizarBT">
        <input type="reset" value="Repor" class="bt_limpar">
    </div>
   
</form>

</div>
  </div>
</div>
<button onclick="window.location.href='./contactos.php'" class="voltarBT topleft fa fa-arrow-left"></button>
</div>

<script src="https://use.fontawesome.com/62e43a72a9.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>

















