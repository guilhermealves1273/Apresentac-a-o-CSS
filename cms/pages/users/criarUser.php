<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar User</title>
</head>
<body>

<h2>Criar User</h2>
 
<form action="../../functions/users/criarUserDB.php" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome">
    <label for="pass">Password</label>
    <input type="text" name="pass" id="pass">
    <input type="hidden" value="sem_role" name="role" id="role">
    <input type="submit" value="Criar">
   
    
</form>




<a href="./users.php">Voltar</a>
    
</body>
</html>