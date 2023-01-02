

<!doctype html>
<html lang="pt">

<head>
  <title>DB (CRUD) | demo</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Demonstrações da aula">
  <meta name="author" content="José Viana">

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
    extract($_POST);
    // com o extract são criadas variáveis com todas as entradas do array, no caso $_POST
    // os dados enviados pelo formulário são (ver atributo "name" nos campos dos formulários): 
    //  - nomelivro
    //  - numpaginas
    //  - anolancamento
    //  - id_autor
    // Preparação de um array com os dados a inserir
    $dados=array($nome);
    # preparar a query
    $stmt= $pdo->prepare('Insert into soft_skills(nome) values(?)');

      // Alternativamente poderia ser feito desta forma
      // atribuir variáveis a cada um dos place holders (?)
      // $INSTRUCAO->bindParam(1, $nomelivro);
      // $INSTRUCAO->bindParam(2, $numpaginas);
      // $INSTRUCAO->bindParam(3, $anolancamento);
      // $INSTRUCAO->bindParam(4, $id_autor);

    # executar instrução 
    $stmt->execute($dados);

  } 

  ?>

  <div class="container">

    <div class="row mt-5">
      <div class="col-12 display-4 text-info">
     SOFT SKILLS
        <a href="../../pages/soft_skills/soft_skills.php" type="button" class="btn btn-outline-info float-end">
          <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg>
        </a>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12">
          <div class="display-4">Criar SOFT_SKILL</div>
      </div>
    </div>
    
    <div class="row my-5">
      <div class="col-12">
        <?php
        if ($existemDadosPOST) {
        ?>
          <div class="alert alert-success" role="alert">
            <strong>Soft_skills criada com sucesso.</strong>
          </div>
          <a class="btn btn-primary float-end mt-5" href="../../pages/soft_skills/criarSoftSkills.php" role="button">Inserir outra soft_skill</a>
        <?php
        } else {
        ?>
          <div class="alert alert-danger" role="alert">
            <strong>Acesso indevido a esta página.</strong>
          </div>
          <a class="btn btn-primary float-end mt-5" href="../../pages/soft_skills/criarSoftSkills.php" role="button">Inserir Soft_skill</a>
        <?php
        }
        ?>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>