<?php include("ouverture.php"); ?>
<?php include("App/users.php"); 
inviteUniquement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juirs Actif-- Connect</title>
</head>
<body>
    <?php include("others/header.php"); ?>
<div class="auth-content">
<form action="connection.php" method="post">
        <h2 class="form-title">Connection</h2>

        <?php include("App/helpers/formErrors.php"); ?>
        <div>
            <label>Nom</label>
            <input type="text" name="username" class="text-input" value="<?php echo $username; ?>">
        </div>
        <div>
            <label>Mot de Passe</label>
            <input type="password" name="password" class="text-input" value="<?php echo $password; ?>">
        </div>
        <div>
            <button type="submit" class="btn btn-big" name="login-btn">Se connecter</button>
        </div>
        <div>
            <p>Ou <a href="inscription.php">S'inscrire</p></a>
        </div>
    </form>
</div>
</body>
<script src="others/script.js"></script>
<link rel="stylesheet" href="others/style.css">
</html>
