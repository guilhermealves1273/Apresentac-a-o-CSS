<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./criarfrase.css">
</head>
<body>

<div class="container text-center">
<div class="row mt-5">
  <div class="col-12 display-4 text-info">
    Criar Frase
  </div>
</div>
<div class="row my-5">
  <div class="col-12">
    <div class="list-group">

<form action="../../functions/about_me/criarFraseDB.php" method="post">
    <div >
    <!-- <label for="nome" id="LabelFrase">Frase:</label> -->
    <input type="text" name="nome" id="nome" >
    </div>
    <input type="hidden" value="sem_role" name="role" id="role">
    <input type="submit" value="Criar" id="bt_criar">
    <input type="reset" value="Limpar" class="bt_limpar">
</form>

        
    </div>
  </div>
</div>
<button onclick="window.location.href='./about_me.php'" class="voltarBT topleft fa fa-arrow-left"></button>
</div>

<script src="https://use.fontawesome.com/62e43a72a9.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>