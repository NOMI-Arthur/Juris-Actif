<?php require('../../../ouverture.php'); ?>
<?php include("../../../App/books.php");
administrateurUniquement();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $articles['name']; ?></title>
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
                <li><a href="../topîc/index.php">Gestion des sujets</a></li>
                <li><a href="../books/documents.php">Publier des documents</a></li>
            </ul>
          </div>
        <!-- // left sidebar -->
        <!-- admin Content -->
            <div class="admin-content">
               <div class="button-group">
                 <a href="documents.php" class="btn btn-big">Ajouter un document</a>
                 <a href="index.php" class="btn btn-big">Voir les documents publiés</a>
               </div>

               <div class="content">
                    <h2 class="page-title">Modifier Documents</h2>
                    <?php include(ROOT_PATH . "/App/helpers/formErrors.php"); ?> 
                    <form action="documents.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                       <div>
                          <label>Titre</label>
                          <input type="text" name="name" class="text-input" value="<?php echo $name; ?>">
                       </div>

                       <div>
                            <label>A propos du documents</label>
                            <br>
                            <textarea name="body" id="editor1" value="<?php echo $articles['name']; ?>"></textarea>
                        </div>
                         <p>
                              <label>Importer la publication (.pdf)</label>
                              <p>
                              <input type="file" name="nomDoc" class="text-input" accept=".pdf, .doc, .docx">
                              </p>
                         </p>
                    
                        
                         <div>
                             <label>Sujets</label>
                            <select name="id_sujet" class="text-input">
                            <option value=""></option>
                            <?php foreach ($sujets as $key => $sujet): ?>
                                <?php if (!empty($sujet_id) && $sujet_id === $sujet['id_sujet']): ?>
                                    <option selected value="<?php echo $sujet['id']; ?>"><?php echo $sujet['name']; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $sujet['id']; ?>"><?php echo $sujet['name']; ?></option>
                                <?php endif; ?>
                               
                            <?php endforeach; ?>
                            </select>
                         </div>

                        
                         <div>
                            <label>image à  ajouté au document *</label>
                            <input type="file" name="imageAss" class="text-input" accept=".png, .jpg, .jpeg">
                        </div>

                         <p>
                            <div>
                                <?php if(empty($publication) && $publication === 0): ?>
                                      <input type="checkbox" name="publish">
                                      Publier ?
                                <?php else: ?>
                                      <input type="checkbox" name="publish" checked>
                                      Publier ?
                                <?php endif; ?>
                            </div>
                         </p>
                         <div>
                            <button type="submit" name="ModifierDocument" class="btn btn-big">Modifier la publicationt</button>
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