<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Icon/Nextflix.ico">
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

<link rel="stylesheet" href="style.css">
<body>
    <header>
       <div class="logo">

           <h1 class="logo-text"><a href="<?php echo BASE_URL . '/index.php' ?>"><span>Juris</span> Actif</h1></a>
       </div>
       <i class="fa fa-bars menu-toggle"></i>
       <ul class="nav">
           <li><a href="<?php echo BASE_URL . '/index.php' ?>">Acceuil</a></li>
           <li>
               
              <?php if(isset($_SESSION['id'])):  ?>
                <a href="#">
                  <i class="fa fa-user"></i> 
                   <?php echo $_SESSION['username'];  ?>
                  <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                 </a>
                       <ul>
                         <?php if($_SESSION['admin']): ?>   
                            <li><a href="<?php echo BASE_URL . '/others/post/dashboard.php' ?>">Tableau de board</a></li>
                          <?php endif; ?>
                          <li><a href="<?php echo BASE_URL . '/deconnection.php' ?> " class="logout">Déconnexion</a></li>
                       </ul>
                <?php else: ?>

                     <li><a href="<?php echo BASE_URL . '/connection.php' ?>">connection</a></li>
                     <li><a href="<?php echo BASE_URL . '/inscription.php' ?>">Inscription</a></li>
             <?php endif; ?>
           </li>
       </ul>
    </header>
</body>
      <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Custom Script -->
    <script src="scripts.js"></script>
</html>