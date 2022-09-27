<?php include(ROOT_PATH . "/database/db.php");
include(ROOT_PATH . "/App/helpers/middleWare.php");
  include(ROOT_PATH . "/App/helpers/validerSujet.php");
?>
<?php 
$table = 'topics';
$erreur = array();
$id = '';
$name = '';
$description = '';

$sujets = selectAll($table);

if(isset($_POST['add-topic'])){
     administrateurUniquement();
     $erreur = validerSujet($_POST);

     if(count($erreur) === 0){
        unset($_POST['add-topic']);
        $sujet_id = create('topics', $_POST);
        $_SESSION['message'] = 'Le sujet a été ajouter avec succès';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/others/post/topic/index.php');
        exit();
     }else{
          $name = $_POST['name'];
          $description = $_POST['description'];
     }
} 

if(isset($_GET['del_id'])){
     administrateurUniquement();
     $id = $_GET['del_id'];
     $count = Suprimer($table, $id);
     $_SESSION['message'] = 'Sujet suprimé avec succès';
     $_SESSION['type'] = 'success';
     header('location: ' . BASE_URL . '/others/post/topic/index.php');
     exit();
}

if (isset($_GET['id'])){
     $id = $_GET['id'];
     $sujet = selectOne($table, ['id' => $id]);
     $id = $sujet['id'];
     $name = $sujet['name'];
     $description = $sujet['description'];
}

if(isset($_POST['update-topic'])){

     administrateurUniquement();

     $erreur = validerSujet($_POST);

     if(count($erreur) === 0){
     $id = $_POST['id'];
     unset($_POST['update-topic'], $_POST['id']);
     $sujet_id = Update($table, $id, $_POST);
     $_SESSION['message'] = 'Sujet mis à jour...';
     $_SESSION['type'] = 'success';
     header('location: ' . BASE_URL . '/others/post/topic/index.php');
     exit();
     }else{
          $id = $_POST['id'];
          $name = $_POST['name'];
          $description = $_POST['description'];
     }
}

?>