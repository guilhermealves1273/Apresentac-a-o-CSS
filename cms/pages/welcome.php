<?php 
    session_start();
    $username = $_SESSION["username"];
    $id = $_SESSION["id"];
   


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DefaultPage</title>
    <!-- CSS only -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
        crossorigin="anonymous"
    />
    <!-- FontAwesome CSS (Icons) -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css" integrity="sha512-aNH2ILn88yXgp/1dcFPt2/EkSNc03f9HBFX0rqX3Kw37+vjipi1pK3L9W08TZLhMg4Slk810sPLdJlNIjwygFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css" integrity="sha512-uj2QCZdpo8PSbRGL/g5mXek6HM/APd7k/B5Hx/rkVFPNOxAQMXD+t+bG4Zv8OAdUpydZTU3UHmyjjiHv2Ww0PA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="welcome.css">
</head>
<body>



<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
       
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-list-ul" id="icon-ul"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
     
        <ul class="navbar-nav m-auto">

        <?php if($_SESSION['role']=='admin'){?>
        <li class="nav-item">

            <a class="nav-link " aria-current="page" href="./users/users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./soft_skills/soft_skills.php">Soft Skills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./frameworks/frameworks.php">Frameworks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about_me/about_me.php">About me</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./languages/languages.php">Languages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./me/me.php">Personal Informations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./education/education.php">Educação</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contactos/contactos.php">Contactos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./mensagens/listagem.php">Mensagens</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./lingProg/listagem.php">Linguagens de programação</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../../index.php">Portfólio</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../auth/logout.php">Logout</a>
          </li>


        
<?php  }else if($_SESSION['role']=='gestor'){?>

    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="./mensagens/listagem.php">Mensagens</a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="../auth/logout.php">Logout</a>
          </li>

<?php }else{ ?>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="">Não tem permissão
        </a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="../auth/logout.php">Logout</a>
          </li>

    <?php } ?>

    </ul>
      </div>
    </div>
  </nav>

  <h1> Hello <?php echo $username?></h1>
  



<!-- JavaScript Bundle with Popper -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"
></script>
<script src="darkmode.js"></script>
</body>
</html>
