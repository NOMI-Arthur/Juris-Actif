<?php 
include("../../../path.php");
include(ROOT_PATH . "/App/sujet.php");
administrateurUniquement();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">
            
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../../style.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../../admin.css">

        <title>Section d'Administration - Edit </title>
    </head>

    <body>
    <?php include("../../header.php"); ?>
    <!-- admin page wrapper -->
     <div class="admin-wrapper">
        <!-- left sidebar -->
          <div class="left-sidebar">
            <ul>
                <li><a href="index.php">Ajout des Publications</a></li>
                <li><a href="../user/index.php">Gestion des Utilisateurs</a></li>
                <li><a href="../topic/index.php">Gestion des Sujets</a></li>
                <li><a href="../books/documents.php">Publier des documents</a></li>
            </ul>
          </div>
        <!-- // left sidebar -->
        <!-- admin Content -->
            <div class="admin-content">
               <div class="button-group">
                 <a href="create.php" class="btn btn-big">Ajouter un Sujet</a>
                 <a href="index.php" class="btn btn-big">Gestion des Sujet</a>
               </div>

               <div class="content">
                    <h2 class="page-title">Modification des Sujets</h2>

                    <?php include(ROOT_PATH . "/App/helpers/formErrors.php"); ?>

                    <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                       <div>
                       <label>Titre</label>
                       <input type="text" name="name" value="<?php echo $name; ?>" class="text-input">
                       </div>
                       <div>
                            <label>Corps</label>
                            <textarea name="description" id="editor1"><?php echo $description; ?></textarea>
                         <p>
                         <div>
                            <button type="submit" name="update-topic" class="btn btn-big">Modifier la Publication</button>
                         </div>
                         </p>
                    </form>

               </div>

            </div>
        <!-- // admin Content -->
     </div>

    <!-- page wrapper -->



        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Ckeditor -->
        <script>
            CKEDITOR.replace('editor1'); 
        </script>
        <!-- Custom Script -->
        <script src="../../scripts.js"></script>

    </body>

</html>