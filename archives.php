<?php 
    include("ouverture.php");
    include(ROOT_PATH . "/App/sujet.php");

    $publications = array();
    $titreRecherche = "Publications récentes";
    
  
    //affiche($publications);

    if(isset($_GET['t_id'])){
      $publications = getArchived_publicationBySujet($_GET['t_id']);
      $titreRecherche = "Vous avez recherché une publication sous '" . $_GET['name'] . "'";
    }else if(isset($_POST['search-term'])){
      $publications = searchOld_Publication($_POST['search-term']);
      $titreRecherche = "Vous avez cherché '" . $_POST['search-term'] . "'";
    }else{
      $publications = getArchivedPublication();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juris Actif | Archives</title>
    <link rel="stylesheet" href="others/style.css">
</head>
<body>
  <!-- L'entête de ma page -->

    <?php include("others/header.php"); ?>
    <?php if(isset($_SESSION['Message'])): ?>
    <div class="msg <?php echo $_SESSION['type']; ?>">
       <li> <?php echo $_SESSION['Message']; ?></li>
       <?php 
            unset($_SESSION['Message']);
            unset($_SESSION['type']);
       ?>
    </div>
    <?php endif; ?>
    <!-- //L'entête de ma page -->
   <!-- wrapper -->

        <!-- Post Slider -->
        <div class="post-slider">
      <h1 class="slider-title">Publications<span><i>  Archivés</i></span>      </h1>
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>

      <div class="post-wrapper">

      <?php foreach($publications as $publication): ?>
         

      <div class="post">
          <img src="<?php echo BASE_URL . "/others/image/" . $publication['image']; ?>" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="single.php?id=<?php echo $publication['id']; ?>"><?php echo $publication['title']; ?></a></h4>
            <i class="far fa-user"><?php echo $publication['username']; ?></i>
            <i class="far fa-calendar"><?php echo date('F j, y', strtotime($publication['created_at'])); ?></i>
          </div>
        </div>

        <?php endforeach; ?>


      </div>

    </div>
    <!-- // Post Slider -->

       <!-- Content -->
       <div class="content clearfix">

<!-- Main Content -->
<div class="main-content">
  <h1 class="recent-post-title"><?php echo $titreRecherche; ?></h1>

  <?php foreach($publications as $publication): ?>
    
    <div class="post clearfix">

<img src="<?php echo BASE_URL . "/others/image/" . $publication['image']; ?>" alt="image de la publication" class="post-image">
<div class="post-preview">
  <h2><a href="single.php?id=<?php echo $publication['id']; ?>"><?php echo $publication['title']; ?></a></h2>
  <i class="far fa-user"><?php echo $publication['username']; ?></i>
  &nbsp;
  <i class="far calendar"><i><?php echo date('F j, y', strtotime($publication['created_at'])); ?></i></i>
  <p class="preview-text">
      <?php echo html_entity_decode(substr($publication['body'], 0, 150) . '...'); ?>
  </p>
  <a href="single.php?id=<?php echo $publication['id']; ?>" class="btn read-more">Lire la suite</a>
</div>
</div>

    <?php endforeach; ?>

</div>
<!-- // Main Content -->

<div class="sidebar">

  <div class="section search">
    <h2 class="section-title">Recherche</h2>
    <form action="index.php" method="post">
      <input type="text" name="search-term" class="text-input" placeholder="Search...">
    </form>
  </div>


  <div class="section topics">
    <h2 class="section-title">Sujet</h2>
    <ul>      
      <?php foreach ($sujets as $key => $sujet): ?>
        <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $sujet['id'] . '&name=' . $sujet['name'] ?>"><?php echo $sujet['name']; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

</div>
<!-- // Content -->

    <!-- // wrapper -->
    <?php include("others/footer.php"); ?>
</body>
</html>