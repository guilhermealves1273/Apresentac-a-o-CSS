<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Criar Contacto</h2>
 
<form action="../../functions/contactos/criarContactoDB.php" method="post">
    <label for="nome">Nome:</label>
    <Select  id="nome" name="nome">
        <option value="Facebook">Facebook</option>
        <option value="Instagram">Instagram</option>
        <option value="Github">Github</option>
        <option value="Telefone">Telefone</option>
        <option value="Email">Email</option>
        <option value="Linkedin">Linkedin</option>
        <option value="Twitter">Twitter</option>
    </Select>

    <label for="descrição">Desciçao:</label>
    <input type="text" name="descricao" id="descricao" required>

    <label for="nome">Link:</label>
    <input type="text" name="link" id="link" required>


    <input type="submit" value="Criar">

</form>

<a href="./contactos.php">Voltar</a>
    
</body>
</html>