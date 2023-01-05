


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
 

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="me.css">
</head>

<body>

<div class="container text-center">
<div class="row mt-5">
  <div class="col-12 display-4 text-info">
    Informações Pessoais
  </div>
</div>
<div class="row my-5">
  <div class="col-12">
    <div class="list-group">

<?php 
if($arrayVazio){

?>

<form action="../../functions/me/criarDB.php" method="post" enctype="multipart/form-data">

<div>
      <label for="nome">Nome Completo:</label>
      <input type="text" name="nome" id="nome" >
    </div>
    
    <div class="margin dt_div">
      <label for="data">Data Nascimento:</label>
      <input type="date" name="data" id="data"  >
    </div>

    <div class="margin lc_div">
      <label for="localidade">localidade:</label>
      <input type="text" name="localidade" id="localidade" >
    </div>

    <div class="margin pro_div">
      <label for="profissao">Profissão:</label>
      <input type="text" name="profissao" id="profissao" >
    </div>

    <div class="margin im_div">
      <div class="upload-wrapper">
        <span class="file-name">Imagem:</span>
        <label for="file-upload"><input type="file" id="file-upload" name="uploadedFile"></label>
      </div>
    </div>
    
    <input type="submit" name="uploadBtn" value="Criar" id="BT">

</form>





<?php }else{  ?>  


    <form action="../../functions/me/atualizarDB.php" method="POST" enctype="multipart/form-data">
    <div>
      <label for="nome">Nome Completo:</label>
      <input type="text" name="nome" id="nome" value=" <?php  echo $dados['fullname']?>">
    </div>
    
    <div class="margin dt_div">
      <label for="data">Data Nascimento:</label>
      <input type="date" name="data" id="data"  value="<?php  echo $dados['dt_nascimento']?>">
    </div>

    <div class="margin lc_div">
      <label for="localidade">localidade:</label>
      <input type="text" name="localidade" id="localidade" value="<?php  echo $dados['localidade']?>">
    </div>

    <div class="margin pro_div">
      <label for="profissao">Profissão:</label>
      <input type="text" name="profissao" id="profissao" value="<?php  echo $dados['profissao']?>">
    </div>

    <div class="margin im_div">
      <div class="upload-wrapper">
        <span class="file-name">Imagem:</span>
        <label for="file-upload">
          <input type="file" id="file-upload" name="uploadedFile">
        </label>
      </div>
    </div>
    
    <input type="submit" name="uploadBtn" value="Atualizar" id="BT">
  

</form>
     
</div>
  </div>
</div>

</div>


<?php } ?>
<button onclick="window.location.href='../welcome.php'" class="voltarBT topleft fa fa-arrow-left"></button>

<script src="https://use.fontawesome.com/62e43a72a9.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>
