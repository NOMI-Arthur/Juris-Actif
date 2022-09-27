<?php require('../../../ouverture.php'); ?>
<?php include("../../../App/sujet.php");
administrateurUniquement();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de sujet--JurisActif</title>
</head>
<body>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../admin.css">
    <script scr="../../script.js"></script>
    <?php include("../../header.php"); ?>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <!-- admin page wrapper -->
     <div class="admin-wrapper">
        <!-- left sidebar -->
          <div class="left-sidebar">
            <ul>
                <li><a href="../admin/index.php">Gestion des Publications</a></li>
                <li><a href="../user/index.php">Gestion des Utilisateurs</a></li>
                <li><a href="index.php">Gestion des Sujets</a></li>
                <li><a href="../books/documents.php">Publier des documents</a></li>
            </ul>
          </div>
        <!-- // left sidebar -->
        <!-- admin Content -->
            <div class="admin-content">
               <div class="button-group">
                 <a href="create.php" class="btn btn-big">Ajouter un Sujet</a>
                 <a href="index.php" class="btn btn-big">Gérer un sujet</a>
               </div>

               <div class="content">
                    <h2 class="page-title">Ajouter des Sujets</h2>
                    <?php include(ROOT_PATH . "/App/helpers/formErrors.php"); ?> 
                    <form action="create.php" method="post">
                       <div>
                       <label>Nom</label>
                       <input type="text" name="name" class="text-input" value="<?php echo $name; ?>">
                       </div>
                    
                        <div>
                        <label>Description</label>
                       <textarea name="description" id="editor1" value="<?php echo $description; ?>"></textarea>
                        </div>

                         <div>
                            <button type="submit" name="add-topic" class="btn btn-big">Ajouter le sujet</button>
                         </div>
                    </form>

               </div>

            </div>
        <!-- // admin Content -->
     </div>
        <!-- Ckeditor -->
        <script>
            CKEDITOR.replace('editor1'); 
        </script>
    <!-- page wrapper -->
</body>
</html>