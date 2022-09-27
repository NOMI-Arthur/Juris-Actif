<?php require('../../ouverture.php'); ?>
<?php include("../../App/publication.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">
            
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"  rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../style.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../admin.css">

      <!-- Boostrap css -->  
<link rel="stylesheet" href="css/bootstrap-grid.css">
<link rel="stylesheet" href="css/bootstrap-grid.css.map">
<link rel="stylesheet" href="css/bootstrap-grid.min.css">
<link rel="stylesheet" href="css/bootstrap-grid.min.css.map">
<link rel="stylesheet" href="css/bootstrap-reboot.css">
<link rel="stylesheet" href="css/bootstrap-reboot.css.map">
<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="css/bootstrap-reboot.min.css.map">
<link rel="stylesheet" href="css/bootstrap.css.map">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css.map">

<!-- //Boostrap css --> 

        <title>Le tableau de bord</title>
    </head>

    <body>
    <?php include("../header.php"); ?>
    <!-- admin page wrapper -->
     <div class="admin-wrapper">
        <!-- left sidebar -->
          <div class="left-sidebar">
            <ul>
                <li><a href="admin/index.php">Gestion des Publications</a></li>
                <li><a href="user/index.php">Gestion des Utilisateurs</a></li>
                <li><a href="topic/index.php">Gestion des Sujets</a></li>
                <li><a href="books/documents.php">Publier un document</a></li>
            </ul>
          </div>
        <!-- // left sidebar -->
        <!-- admin Content -->
            <div class="admin-content">

               <center>
                  <h1 class="slider-title">JurisActif <span>le tableau de Bord</span></h1>
                </center>
                <p></p>
                    <?php include(ROOT_PATH . "/App/helpers/message.php"); ?>
                    <?php include(ROOT_PATH . "/others/post/compteur.php"); ?>

                    <?php
                      $an = (int)date('Y');
                      $an_selected = empty($_GET['an']) ? null : (int)$_GET['an'];
                      $mois_selected = empty($_GET['mois']) ? null : $_GET['mois'];
                      if ($an_selected && $mois_selected) {
                          $total = nombre_articles_mois($an_selected, $mois_selected);
                          $detail = nombre_articles_detail_mois($an_selected, $mois_selected);
                      }else {
                          $total = nombre_vues();  
                      }
                      $mois = [
                          '01' => 'Janvier',
                          '02' => 'Février',
                          '03' => 'Mars',
                          '04' => 'Avril',
                          '05' => 'Mai',
                          '06' => 'Juin',
                          '07' => 'Juillet',
                          '08' => 'Août',
                          '09' => 'Septembre',
                          '10' => 'Octobre',
                          '11' => 'Novembre',
                          '12' => 'Décembre',
                      ];
                    ?>
                        <p>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="list-group">
                                         <?php for($i = 0; $i < 3; $i++): ?>
                                            <a class="list-group-item <?= $an - $i === $an_selected ? 'active': ''; ?>" href="dashboard.php?an=<?= $an - $i; ?>"><?= $an - $i; ?></a>
                                            <?php if($an - $i === $an_selected): ?>
                                                <div class="list-group">
                                                    <?php foreach($mois as $key => $nom): ?>
                                                        <a href="dashboard.php?an=<?= $an_selected; ?>&mois=<?= $key; ?>" class="list-group-item <?= $key === $mois_selected ? 'active': ''; ?>"><?= $nom; ?></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                         <?php endfor; ?>
                                    </div>
                                </div>
                                <div class="col-md-8">      
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <strong style="font-size:1em"><?= $total; ?></strong>
                                            Article<?php if($total > 1): ?>s <?php endif; ?> lûs au total
                                        </div>
                                    </div>
                                    <?php if(isset($detail)): ?>
                                        <h2>visites détaillé pour le mois</h2>
                                        <table class="table table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>jour</th>
                                                    <th>visites</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($detail as $ligne): ?>
                                                <tr>
                                                    <td><?= $ligne['jour']; ?></td>
                                                    <td><?= $ligne['lus']; ?> article<?= $ligne['lus'] > 1 ? 's' : '' ?> lûs</td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </p>
        <!-- // admin Content -->
            </div>

    <!-- page wrapper -->

        <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
        <!-- Custom Script -->
        <script src="../scripts.js"></script>

                <!-- Boostrap Script -->
            <script src="js/bootstrap.js.map"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js.map"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.js.map"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js.map"></script>

    </body>

</html>
