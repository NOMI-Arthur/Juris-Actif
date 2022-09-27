<title> JurisActif-- . <?php echo $_GET['doc'] ?></title>
<?php include("ouverture.php"); ?>
<?php include(ROOT_PATH . "/others/post/compteur.php"); ?>
<?php ajouter_vue(); ?>
<?php
    if (isset($_GET['doc'])) {
        $nomDoc = basename($_GET['doc']);
        $chemin = ROOT_PATH . '/Fichiers/Doc/' . $nomDoc;
        header('Content-Type: application/pdf');
        readfile($chemin);
        unset($_GET['doc']);
        exit;
    }else {
        echo "Fichier Manquant et donc impossible de lire";
    }
?>