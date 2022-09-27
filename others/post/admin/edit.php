<?php require('../../../ouverture.php'); ?>
<?php include("../../../App/publication.php"); 
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

        <title>Modifier Publications</title>
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
                 <a href="edit.php" class="btn btn-big">Ajouter un Post</a>
                 <a href="index.php" class="btn btn-big">Gérer un Post</a>
               </div>

               <div class="content">
                    <h2 class="page-title">Modification des Publications</h2>

                    <form action="edit.php" method="post" enctype="multipart/form-data">
                    <?php include(ROOT_PATH . "/App/helpers/formErrors.php"); ?>

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                       <div>
                       <label>Titre</label>
                       <input type="text" name="title" class="text-input" value="<?php echo $titre; ?>">
                       </div>
                       <div>
                            <label>Corps</label>
                            <textarea name="body" id="editor1" value="<?php echo $corps; ?>"></textarea>
                        </div>
                           <label>Image</label>
                           <input type="file" name="image" class="text-input" accept=".png, .gif, .jpg, .jpeg>
                        </div>
                         <div>
                             <label>Sujets</label>
                            <select name="sujet_id" class="text-input">
                            <option value=""></option>
                            <?php foreach ($sujets as $key => $sujet): ?>
                                <?php if (!empty($sujet_id) && $sujet_id === $sujet['sujet_id']): ?>
                                    <option selected value="<?php echo $sujet['id']; ?>"><?php echo $sujet['name']; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $sujet['id']; ?>"><?php echo $sujet['name']; ?></option>
                                <?php endif; ?>
                               
                            <?php endforeach; ?>
                            </select>
                         </div>
                         <div>
                         <?php if(empty($publier) && $publier == 0): ?>
                           <label>
                             <input type="checkbox" name="published">
                             Publier ?
                             </label>
                         <?php else: ?>
                           <label>
                           <input type="checkbox" name="published" checked>
                           Publier ?
                           </label>
                        <?php endif; ?>
                         </div>
                         <p>
                         <div>
                            <button type="submit" name="update-post" class="btn btn-big">Modifier la Publication</button>
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