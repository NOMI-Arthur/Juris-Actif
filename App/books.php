<?php
include(ROOT_PATH . "/database/db.php");
include(ROOT_PATH . "/App/helpers/middleWare.php");
include(ROOT_PATH . "/App/helpers/validerDocument.php");

$sujets = selectAll('topics');
$name = '';
$body = '';
$id = "";
$publication = "";
$sujet_id = "";
$table = 'publicationdoc';
$posts = selectAll($table);
$erreur = array();

if (isset($_GET['id'])){
     $articles = selectOne($table, ['id' => $_GET['id']]);

     $id = $articles['id'];
     $name = $articles['name'];
     $body = $articles['body'];
     $publication = $articles['publish'];
     $sujet_id = $articles['id_sujet'];
}

if (isset($_POST['AjouterDocument'])){
    //affiche($_FILES);
     //die();
     if ((!empty($_FILES['nomDoc'])) && (!empty($_FILES['imageAss']))) {
          $nomDoc = time() . '_' . $_FILES['nomDoc']['name'];
          $nomImage = time() . '_' . $_FILES['imageAss']['name'];
          $cheminImage = ROOT_PATH . "/Fichiers/images/" . $nomImage;
          $cheminDoc = ROOT_PATH . "/Fichiers/Doc/" . $nomDoc;
          $result1 = move_uploaded_file($_FILES['nomDoc']['tmp_name'], $cheminDoc);
          $result2 = move_uploaded_file($_FILES['imageAss']['tmp_name'], $cheminImage);
          if(($result1) && ($result2)){
               $_POST['imageAss'] = $nomImage;
               $_POST['nomDoc'] = $nomDoc;
          }else {
               # code...
          }
     } else {
          array_push($erreur, "L'action de publication nécessite l'import d'une image et d'un document");
     }
     
     $erreur = validerDocuments($_POST);
     if(!empty($erreur)){
          $name = $_POST['name'];
          $body = $_POST['body'];
          $sujet_id = $_POST['id_sujet'];
          $publication = isset($_POST['publish']) ? 1 : 0;
     }else {
          unset($_POST['AjouterDocument']);
          $_POST['user_id'] = $_SESSION['id'];
          $_POST['publish'] = isset($_POST['publish']) ? 1 : 0;
          $_POST['body'] = htmlentities($_POST['body']);
          $retour = create('publicationdoc', $_POST);
          $_SESSION['message'] = "Publication ajouté avec succès";
          $_SESSION['type'] = "success";
          header('location:' . BASE_URL . 'others/post/books/index.php');
          
     }
     
}

if (isset($_GET['delete_id'])) {
     $nombre = suprimer($table, $_GET['delete_id']);
     $_SESSION['message'] = "Publication Suprimé avec succès";
     $_SESSION['type'] = "success";
     header('location:' . BASE_URL . 'others/post/books/index.php');
     exit();
}

if (isset($_GET['publish']) && isset($_GET['p_id'])) {
     $publication = $_GET['publish'];
     $p_id = $_GET['p_id'];
     $count = update($table, $p_id, ['publish' => $publication]);
     $_SESSION['message'] = "L'état de la Publication à été changé avec succès";
     $_SESSION['type'] = "success";
     header('location:' . BASE_URL . 'others/post/books/index.php');
     exit();
}

if(isset($_POST['ModifierDocument'])){
     $erreur = validerDocuments($_POST);
     
     if ((!empty($_FILES['nomDoc'])) && (!empty($_FILES['imageAss']))) {
          $nomDoc = time() . '_' . $_FILES['nomDoc']['name'];
          $nomImage = time() . '_' . $_FILES['imageAss']['name'];
          $cheminImage = ROOT_PATH . "/Fichiers/images/" . $nomImage;
          $cheminDoc = ROOT_PATH . "/Fichiers/Doc/" . $nomDoc;
          $result1 = move_uploaded_file($_FILES['nomDoc']['tmp_name'], $cheminDoc);
          $result2 = move_uploaded_file($_FILES['imageAss']['tmp_name'], $cheminImage);
          if(($result1) && ($result2)){
               $_POST['imageAss'] = $nomImage;
               $_POST['nomDoc'] = $nomDoc;
          }else {
               # code...
          }
     } else {
          array_push($erreur, "L'action de publication nécessite l'import d'une image et d'un document");
     }
     if(!empty($erreur)){
          $name = $_POST['name'];
          $body = $_POST['body'];
          $sujet_id = $_POST['id_sujet'];
          $publication = isset($_POST['publish']) ? 1 : 0;
     }else { 
          $id = $_POST['id']; 
          unset($_POST['ModifierDocument'], $_POST['id']);
          $_POST['user_id'] = $_SESSION['id'];
          $_POST['publish'] = isset($_POST['publish']) ? 1 : 0;
          $_POST['body'] = htmlentities($_POST['body']);
          $retour = update('publicationdoc', $id, $_POST);
          $_SESSION['message'] = "Publication Modifié avec succès";
          $_SESSION['type'] = "success";
          header('location:' . BASE_URL . 'others/post/books/index.php');
          exit();
     }
}

if (isset($_GET['idd'])) {
     $pubs = selectOne('publicationdoc', ['id' => $_GET['idd']]);
     $chemin = BASE_URL . '/Fichiers/Doc/' . $pubs['nomDoc'];
}

?>