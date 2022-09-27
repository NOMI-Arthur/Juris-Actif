<?php include("../../../ouverture.php"); ?>
<?php include("../../../App/users.php");
administrateurUniquement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JurisActif --Utilisateurs</title>
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
                <li><a href="index.php">Gestion des Utilisateurs</a></li>
                <li><a href="../topic/index.php">Gestion des Sujets</a></li>
                <li><a href="../books/documents.php">Publier des documents</a></li>
            </ul>
          </div>
        <!-- // left sidebar -->
        <!-- admin Content -->
            <div class="admin-content">
               <div class="button-group">
                 <a href="create.php" class="btn btn-big">Ajouter un Utilisateur</a>
                 <a href="index.php" class="btn btn-big">Gérer un Utilisateur</a>
               </div>

               <div class="content">
                    <h2 class="page-title">Gestion des Utilisateurs</h2>

                    <?php include(ROOT_PATH . "/App/helpers/message.php"); ?>
                   
                    <table>
                        <thead>
                          <th>SN</th>
                           <th>Nom d'Utilisateur</th>
                           <th>Email</th>
                           <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                        <?php foreach($administrateur as $key => $user): ?>
                             
                            <tr>
                               <td><?php echo $key + 1; ?></td>
                               <td><?php echo $user['username']; ?></td>
                               <td><?php echo $user['email'] ?></td>
                               <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">Modifier</a></td>
                               <td><a href="index.php?delete_id=<?php echo $user['id']; ?>" class="delete">suprimer</a></td>
                               
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