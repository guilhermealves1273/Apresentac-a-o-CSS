<!doctype html>
<html lang="pt">

<head>
  <title>DB (CRUD) | demo</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

  <?php
  require("../../db/connect.php");
  $pdo= pdo_connect_mysql();

  // Verificação da existência de POST de informação, proveniente do formulário
  $existemDadosPOST = false;
  if (isset($_POST) && !empty($_POST)) {
    $existemDadosPOST = true;
    $tamanhoCorreto=True;
    extract($_POST);
   
    $dados=array($frase, $id);


    if(strlen($dados[0])<=200 and strlen($dados[0])>0){
        # preparar a query
        $stmt= $pdo->prepare('Update about_me set frase=? where id=?; ');

    // Alternativamente poderia ser feito desta forma
    // atribuir variáveis a cada um dos place holders (?)
    // $INSTRUCAO->bindParam(1, $nomelivro);
    // $INSTRUCAO->bindParam(2, $numpaginas);
    // $INSTRUCAO->bindParam(3, $anolancamento);
    // $INSTRUCAO->bindParam(4, $id_autor);

  # executar instrução 
    $stmt->execute($dados);
    }
    else{

        $tamanhoCorreto=False;
    }
  } 

  ?>











  <div class="container">

    <div class="row my-5">
      <div class="col-12">
        <?php
        if ($existemDadosPOST==True and $tamanhoCorreto==True) {
        ?>
          <div class="alert alert-success" role="alert">
            <strong>Frase atualizada com sucesso</strong>
         
          </div>
          <a class="btn btn-primary float-end mt-5" href="../../pages/about_me/about_me.php" role="button">Atualizar Frase</a>
        <?php
        } else {
            if($tamanhoCorreto==False){
        ?>

        <div class="alert alert-danger" role="alert">       
            <strong>Tamanho da frase muito longo ou não possui nenhum caracter</strong>
          </div>
          <a class="btn btn-primary float-end mt-5" href="../../pages/about_me/about_me.php" role="button">Atualizar Frase</a>


         <?php } else{?>

          <div class="alert alert-danger" role="alert">
            <strong>Acesso indevido a esta página.</strong>
          </div>
          <a class="btn btn-primary float-end mt-5" href="../../pages/about_me/about_me.php" role="button">Atualizar Frase</a>
        <?php
         
        }}
        ?>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>