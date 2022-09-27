<?php
 include("../ouverture.php"); 
include(ROOT_PATH . "/App/publication.php");

if(isset($_GET['id'])){
  $publication = selectOne('posts', ['id' => $_GET['id']]);
}
$sujets = selectAll('topics');
$publications = selectAll('posts', ['published' => 1]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="../others/style.css">

  <title>Termes et conditions | JurisActif</title>
</head>

<body>
  <header>
  <?php include("../others/header.php"); ?>
  </header>

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content -->
      <div class="main-content single">
        <h1 class="post-title">Termes et conditions d'utilisation</h1>

            <form action="termes.php" method="post">
                <h2 class="post" style=color:red><center>Les termes et conditions ne sont pas encore</center> <b><center>disponible</center></b></h2>
            </form>
      </div>
      <!-- // Main Content -->

      <div class="sidebar single">
       <div class="section popular">
           <h2 class="section-title"> A la une </h2>
           <?php foreach($publications as $publica): ?>
             <div class="post clearfix">
                 <img src="<?php echo BASE_URL . '/others/image/' . $publica['image']; ?>" alt="">
                 <a href="../single.php?id=<?php echo $publica['id']; ?>" class="title"><h4> <?php echo $publica['title']; ?></h4></a>
             </div>
            <?php endforeach; ?>
       </div>

        <div class="section topics">
          <h2 class="section-title">sujets</h2>
          <?php foreach($sujets as $sujet): ?> 
             <ul>
                <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $sujet['id'] . '&name=' . $sujet['name'] ?>"><?php echo $sujet['name']; ?></a></li>
            </ul>
          <?php endforeach; ?>
        </div>

      </div>

    </div>
    <!-- // Content -->

  </div>
  <!-- // Page Wrapper -->

  <?php include("../others/footer.php"); ?>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="others/script.js"></script>

</body>

</html>