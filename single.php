<?php
 include("ouverture.php"); 
include(ROOT_PATH . "/database/db.php");

if(isset($_GET['id'])){
  $publication = selectOne('posts', ['id' => $_GET['id']]);
}
$sujets = selectAll('topics');
$publications = selectAll('posts', ['published' => 1]);
$pub = selectAll('publicationdoc', ['publish' => 1]);

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
  <link rel="stylesheet" href="others/style.css">
  <?php if(isset($publication['title'])): ?>
        <title><?php echo $publication['title']; ?> | JurisActif</title>
  <?php  elseif(isset($pubs['name'])): ?>
    <title><?php echo $pubs['name']; ?> | JurisActif</title>
  <?php endif;  ?>
</head>

      <?php include(ROOT_PATH . "/others/post/compteur.php"); ?>
      <?php ajouter_vue(); ?>

<body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v11.0" nonce="dXiVG6P1"></script>

  <header>
  <?php include("others/header.php"); ?>
  </header>

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content -->
      <div class="main-content single"  id="caroussel">
          <div class="post-content"> 

               <h1 class="post-title"><?php echo $publication['title']; ?></h1>
                 <img src="<?php echo BASE_URL . "/others/image/" . $publication['image']; ?>" alt="image de la publication" class="post-image" width="700" height="450" >
                  <?php echo html_entity_decode($publication['body']); ?>
            
          </div>

      </div>
      <!-- // Main Content -->

      <div class="sidebar single">

      <div class="fb-page" data-href="https://web.facebook.com/JurisActif-100385972287018" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/JurisActif-100385972287018" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/JurisActif-100385972287018">JurisActif</a></blockquote></div>

       <div class="section popular">
           <h2 class="section-title"> A la une </h2>
           <?php foreach($publications as $publica): ?>
             <div class="post clearfix">
                 <img src="<?php echo BASE_URL . '/others/image/' . $publica['image']; ?>" alt="">
                 <a href="single.php?id=<?php echo $publica['id']; ?>" class="title"><h4> <?php echo $publica['title']; ?></h4></a>
             </div>
            <?php endforeach; ?>

           <?php foreach($pub as $pubb): ?>
             <div class="post clearfix">
                 <img src="<?php echo BASE_URL . '/Fichiers/images/' . $pubb['imageAss']; ?>" alt="">
                 <a href="OuvrirPDF.php?idd=<?php echo $pubb['id']; ?> && doc=<?php echo $pubb['nomDoc']; ?>" class="title"><h4> <?php echo $pubb['name']; ?></h4></a>
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

  <?php include("others/footer.php"); ?>
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="others/script.js"></script>

</body>

</html>