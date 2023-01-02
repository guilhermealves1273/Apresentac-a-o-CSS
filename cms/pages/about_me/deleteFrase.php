
<?php

$id=$_GET['id'];
require('../../db/connect.php');
$pdo = pdo_connect_mysql();

# podemos utilizar diretamente o método ->query() uma vez que, ainda, não estamos a utilizar varíaveis na instrução SQL
$stmt = $pdo->prepare('SELECT frase from about_me where id=:id');
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
    <title>Frases</title>
</head>
<body>

<h3>Pretende apagar "<?php echo $dados['frase']?>" das Frases?</h3>

<form action="../../functions/about_me/deleteFraseDB.php" method="post">
<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id?>">   
    <div>
        <label id="frase" name="frase">Frase:<?php echo $dados['frase']?></label>
    </div>

    <div>
        <input type="submit" value="Confirmar">
    </div>
</form>
<a href="./about_me.php">Cancelar</a>









</body>
</html>
