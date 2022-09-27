<?php include("../../../ouverture.php"); ?>
<?php include("../../../App/users.php");
administrateurUniquement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'Utilisateur</title>
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
                    <h2 class="page-title">Ajouter des Utilisateur</h2>

                    <form action="create.php" method="post">

                    <?php include(ROOT_PATH . "/App/helpers/formErrors.php"); ?>
                    <div>
                         <label>Nom</label>
                        <input type="text" name="username" class="text-input" value="<?php echo $username; ?>">
                    </div>
                   <div>
                      <label>E-mail</label>
                      <input type="email" name="email" class="text-input" value="<?php echo $email; ?>">
                   </div>
                  <div>
                    <label>Mot de passe</label>
                    <input type="password" name="password" class="text-input" value="<?php echo $password; ?>">
                  </div>
                   <div>
                      <label>Confirmer le Mot de Passe</label>
                      <input type="password" name="passwordConf" class="text-input" value="<?php echo $passwordConf; ?>">
                    </div>
                    <div>
                             <label>
                                 <input type="checkbox" name="admin" checked>
                                 Administrateur ?
                             </label>
                         </div>
                <div>
                         <div>
                            <button type="submit" name="create-admin" class="btn btn-big">Ajouter l'Utilisateur</button>
                         </div>
                    </form>

               </div>

            </div>
        <!-- // admin Content -->
     </div>

    <!-- page wrapper -->
</body>
</html>