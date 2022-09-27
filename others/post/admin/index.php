<?php include("../../../ouverture.php"); ?>
<?php include(ROOT_PATH . "/App/publication.php"); 
administrateurUniquement();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tchatchouang's post section</title>
</head>
<body>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../admin.css">
    <script scr="../../script.js"></script>
    <?php include("../../header.php"); ?>
    <!-- admin page wrapper -->
     <div class="admin-wrapper">
        <!-- left sidebar -->
          <div class="left-sidebar">
            <ul>
                <li><a href="index.php">Gestion des Publications</a></li>
                <li><a href="../user/index.php">Gestion des Utilisateurs</a></li>
                <li><a href="../topic/index.php">Gestion des Sujets</a></li>
                <li><a href="../books/documents.php">Publier des documents</a></li>
            </ul>
          </div>
        <!-- // left sidebar -->
        <!-- admin Content -->
            <div class="admin-content">
               <div class="button-group">
                 <a href="create.php" class="btn btn-big">Ajouter un Post</a>
                 <a href="index.php" class="btn btn-big">Gérer un Post</a>
                 <a href="../books/index.php" class="btn btn-big">Voir les documents publiés</a>
               </div>

               <div class="content">
                    <h2 class="page-title">Gestion des Publications</h2>

                    <?php if(isset($_SESSION['message'])): ?>
                       <div class="msg <?php echo $_SESSION['type']; ?>">
                             <li> <?php echo $_SESSION['message']; ?></li>
                         <?php 
                            unset($_SESSION['message']);
                            unset($_SESSION['type']);
                         ?>
                      </div>
                   <?php endif; ?>
                    <table>
                        <thead>
                           <th>SN</th>
                           <th>Titre</th>
                           <th>Auteur</th>
                           <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                        <?php foreach ($publications as $key => $publication): ?>
                            <tr>
                               <td><?php echo $key + 1; ?></td>
                               <td><?php echo $publication['title']; ?></td>
                               <td>Dr Tchatchouang</td>
                               <td><a href="edit.php?id=<?php echo $publication['id']; ?>" class="edit">Modifier</a></td>
                               <td><a href="edit.php?delete_id=<?php echo $publication['id']; ?>" class="delete">suprimer</a></td>
                               <?php if($publication['published']): ?>
                                   <td><a href="edit.php?publie=0&p_id=<?php echo $publication['id']; ?>" class="unpublish">Archivé</a></td>
                               <?php else: ?>
                                <td><a href="edit.php?publie=1&p_id=<?php echo $publication['id']; ?>" class="publish">Publier</a></td>
                               <?php endif; ?>
                            </tr>
                            
                          <?php endforeach; ?>
                        </tbody>
                    </table>
               </div>

            </div>
        <!-- // admin Content -->
     </div>

    <!-- page wrapper -->
</body>
</html>