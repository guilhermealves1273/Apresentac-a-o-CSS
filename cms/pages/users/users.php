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
  

  require('../../db/connect.php');
  $pdo = pdo_connect_mysql();
  # podemos utilizar diretamente o método ->query() uma vez que, ainda, não estamos a utilizar varíaveis na instrução SQL
  $stmt = $pdo->prepare('SELECT username, role,id from user');
  
  $stmt->execute();
  # definir o fetch mode
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  ?>

  <div class="container">

    <div class="row mt-5">
      <div class="col-12 display-4 text-info">
        Utilizadores
        <a href="../welcome.php" type="button" class="btn btn-outline-info float-end">
          <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
          </svg>
        </a>
      </div>
    </div>

    
    <div class="row my-5">
      <div class="col-12">
        <div class="list-group">
          <a class="list-group-item list-group-item-action active ">
            Utilizadores 
            <span class="float-end fw-bold"> <?php echo $stmt->rowCount();?> Utilizadores</span>
          </a>
            <table>
            <tr>
                    <th>Nome</th>
                    <th>Role</th>
                    <th>Ações</th>
            </tr>
            <?php while($row = $stmt->fetch()): ?>
                <tr>
                    <td><?php echo $row['username'];?> </td>
                    <td><?php echo $row['role'];?></td>
                    
                    <td> 
                        <button onclick="window.location.href='editUser.php?idUser=<?php echo $row['id']; ?>'">Editar</button>
                        <button onclick="window.location.href='deleteUser.php?idUser=<?php echo $row['id']; ?>'">Apagar</button>
                       

                    </td>
                </tr>
                
            <?php endwhile;?>
                
            </table>

            <div class="azul">
            <a class="btn btn-primary float-end mt-5" href="./criarUser.php" role="button">Inserir User</a>
            </div>



        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>
