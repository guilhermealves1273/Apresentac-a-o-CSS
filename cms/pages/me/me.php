


<?php


require('../../db/connect.php');
$pdo = pdo_connect_mysql();

# podemos utilizar diretamente o método ->query() uma vez que, ainda, não estamos a utilizar varíaveis na instrução SQL
$stmt = $pdo->prepare('SELECT * from me');
$arrayVazio=False;
$stmt->execute();

 # definir o fetch mode
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$dados=$stmt->fetch();

if(empty($dados)){
    $arrayVazio=True;
}


?>


<!doctype html>
<html lang="en">

<head>
  <title>DB (CRUD) | demo</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Demonstrações da aula">
  <meta name="author" content=" Nelson">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

<?php 
if($arrayVazio){

?>

<form action="../../functions/me/criarDB.php" method="post" enctype="multipart/form-data">

    <label for="nome">Nome Completo</label>
    <input type="text" name="nome" id="nome" >

    <label for="data">Data Nascimento</label>
    <input type="date" name="data" id="data" >

    <label for="localidade">localidade</label>
    <input type="text" name="localidade" id="localidade">

    <label for="profissao">Profissão</label>
    <input type="text" name="profissao" id="profissao" >

    <label for="filename">Filename</label>
    <input type="file" name="filename" placeholder="c://" id="filename" required>

   

    <input type="submit" value="Criar">

</form>

<a href="../welcome.php">Voltar</a>



<?php }else{  ?>  


    <form action="../../functions/me/atualizarDB.php" method="post" enctype="multipart/form-data">

     <label for="nome">Nome Completo</label>
    <input type="text" name="nome" id="nome" value=" <?php  echo $dados['fullname']?>">

    <label for="data">Data Nascimento</label>
    <input type="date" name="data" id="data"  value="<?php  echo $dados['dt_nascimento']?>">

    <label for="localidade">localidade</label>
    <input type="text" name="localidade" id="localidade" value="<?php  echo $dados['localidade']?>">

    <label for="profissao">Profissão</label>
    <input type="text" name="profissao" id="profissao" value="<?php  echo $dados['profissao']?>">

    <label for="filename">Filename</label>
    <input type="file" name="filename" placeholder="c://" id="filename" required>
    

    <input type="submit" value="Atualizar">

</form>
<a href="../welcome.php">Voltar</a>


<?php } ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>
