<?php include(ROOT_PATH . "/database/db.php");
include(ROOT_PATH . "/App/helpers/middleWare.php");
  include(ROOT_PATH . "/App/helpers/validerPublication.php");
  $table = 'posts';
  $sujets = selectAll('topics');
  $publications = selectAll($table);

  $erreur = array();
  $titre = "";
  $id = "";
  $corps = "";
  $sujet_id = "";
  $publier = "";
  if (isset($_GET['publie']) && isset($_GET['p_id'])) {
    administrateurUniquement();
    $publie = $_GET['publie'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $publie]);
    $_SESSION['message'] = 'Etat de la publication a été modifié avec succès';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/others/post/admin/index.php');
    exit();
  }
  if(isset($_GET['id'])){
    $publication = SelectONE($table, ['id' => $_GET['id']]);
    $id = $publication['id'];
    $titre = $publication['title'];
    $corps = $publication['body'];
    $sujet_id = $publication['sujet_id'];
    $publier = $publication['published'];
  }

  if(isset($_GET['delete_id'])){
    administrateurUniquement();
    $count = Suprimer($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Publication suprimé avec succès';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/others/post/admin/index.php');
    exit();
  }


if(isset($_POST['add-post'])){
  administrateurUniquement();
  $erreur = validerPublication($_POST);
  if(!empty($_FILES['image']['name'])){
     $nom_image = time() . '_' . $_FILES['image']['name'];
     $destination = ROOT_PATH . "/others/image/" . $nom_image;
     $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

     if($resultat){
      $_POST['image'] = $nom_image;
     }else{
       array_push($erreur, "Impossible de charger l'image");
     }
  }else{
    array_push($erreur, "Veuillez selectionner une image pour cette publication svp");
  }
  if(count($erreur) === 0){
    unset($_POST['add-post']);
    $_POST['user_id'] = $_SESSION['id'];
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;
    $_POST['body'] = htmlspecialchars($_POST['body']);
    $publication_id = create($table, $_POST);
    $_SESSION['message'] = 'Publication créé avec succès';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/others/post/admin/index.php');
    exit();
  }else{
    $titre = $_POST['title'];
    $corps = $_POST['body'];
    $sujet_id = $_POST['sujet_id'];
    $publier = isset($_POST['published']) ? 1 : 0;
  }

}

if(isset($_POST['update-post'])){
  administrateurUniquement();
  $erreur = validerPublication($_POST);
  if(!empty($_FILES['image']['name'])){
     $nom_image = time() . '_' . $_FILES['image']['name'];
     $destination = ROOT_PATH . "/others/image/" . $nom_image;
     $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

     if($resultat){
      $_POST['image'] = $nom_image;
     }else{
       array_push($erreur, "Impossible de charger l'image");
     }
  }else{
    array_push($erreur, "Veuillez selectionner une image pour cette publication svp");
  }
  if(count($erreur) === 0){
    $id = $_POST['id'];
    unset($_POST['update-post'], $_POST['id']);
    $_POST['user_id'] = $_SESSION['id'];
    $_POST['published'] = isset($_POST['published']) ? 1 : 0;
    $_POST['body'] = htmlentities($_POST['published']);
    $publication_id = update($table, $id, $_POST);
    $_SESSION['message'] = 'Publication modifié avec succès';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/others/post/admin/index.php');
    exit();
  }else{
    $titre = $_POST['title'];
    $corps = $_POST['body'];
    $sujet_id = $_POST['sujet_id'];
    $publier = isset($_POST['published']) ? 1 : 0;
  }

}


?>