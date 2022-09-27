<?php include("ouverture.php"); ?>
<?php include("App/users.php"); 
inviteUniquement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions</title>
    <link rel="stylesheet" href="others/style.css">
</head>
<body>
    <?php include("others/header.php"); ?>
    
    <div class="auth-content">

    <?php include("App/helpers/formErrors.php"); ?>

        <form action="inscription.php" method="post">
            <h2 class="form-title">Inscriptions</h2>
            <div>
               <label>Nom</label>
               <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
            </div>
            <div>
               <label>E-mail</label>
               <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
            </div>
            <div>
               <label>Mot de passe</label>
               <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
            </div>
            <div>
               <label>Confirmer le Mot de Passe</label>
               <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
            </div>
            <div>
                <button type="submit" name="register-btn" class="btn btn-big">Soumettre</button>
            </div>
            <p>Ou <a href="connection.php">Connexion</a></p>
        </form>
    </div>
</body>
<script src="others/script.js"></script>
</html>