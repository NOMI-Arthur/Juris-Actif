<?php require('../../../ouverture.php'); 
include(ROOT_PATH . "/App/sujet.php");
administrateurUniquement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JurisActif Topics</title>
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
                 <a href="create.php" class="btn btn-big">Ajouter un sujet</a>
                 <a href="index.php" class="btn btn-big">Gérer un sujet</a>
               </div>

               <div class="content">
                    <h2 class="page-title">Gestion des Sujets de Publication</h2>
                    <?php if(isset($_SESSION['message'])): ?>
                          <div class="msg <?php echo $_SESSION['type']; ?>">
                          <li><?php echo $_SESSION['message']; ?></li>
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
                           <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                          <?php foreach ($sujets as $key => $sujet): ?>
                            <tr>
                               <td><?php echo $key + 1; ?></td>
                               <td><?php echo $sujet['name']; ?></td>
                               <td><a href="edit.php?id=<?php echo $sujet['id']; ?>" class="edit">Modifier</a></td>
                               <td><a href="index.php?del_id=<?php echo $sujet['id']; ?>" class="delete">suprimer</a></td>
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