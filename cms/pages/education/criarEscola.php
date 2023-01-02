<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Criar Escola</h2>
 
<form action="../../functions/education/criarEscolaDB.php" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" require>

    <label for="nome">Desciçao</label>
    <input type="text" name="descricao" id="descricao" require>


    <input type="submit" value="Criar">

</form>

<a href="./education.php">Voltar</a>
    
</body>
</html>