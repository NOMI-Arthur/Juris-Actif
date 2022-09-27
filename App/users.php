<?php include(ROOT_PATH . "/database/db.php"); ?>
<?php 
include(ROOT_PATH . "/App/helpers/middleWare.php");
include(ROOT_PATH . "/App/helpers/validerUtilisateur.php"); 
?>
<?php

$username = '';
$id = '';
$email = '';
$password = '';
$passwordConf = '';
$erreur = array();
$table = 'users';

$administrateur = SelectAll($table); 

 
if ((isset($_POST['register-btn']))  || (isset($_POST['create-admin']))){ // donc lors du clique sur le bouton permettant d'enregistrer un nouvel utilisateur l'on vérifie tout d'abord les champs entrés...

    $erreur = validerUsers($_POST);

       if (count($erreur) === 0){
            unset($_POST['passwordConf'], $_POST['register-btn'], $_POST['create-admin']); // L'on retire le champ de confirmation de mot de passe de l'array $_POST...
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); //Afin de crypter le mot de passe...

            if ($_POST['admin']) {
 
              $_POST['admin'] = 1; 
              $user_id = create('users', $_POST);        
              $_SESSION['message'] = "Vous venez d'ajouter un nouvel administrateur";
              $_SESSION['type'] = 'success';
              header('location: ' . BASE_URL . '/others/post/user/index.php');
              exit();

            } else { 

              $_POST['admin'] = 0; 
              $user_id = create('users', $_POST);
              $arthur = SelectONE('users', ['id' => $user_id]);
              $_SESSION['id'] = $arthur['id'];
              $_SESSION['username'] = $arthur['username']; 
              $_SESSION['admin'] = $arthur['admin']; 
              $_SESSION['message'] = 'Vous êtes inscrit'; 
              $_SESSION['type'] = 'success'; 
              header('location: ' . BASE_URL . 'index.php');
              exit();
            }

      }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        }
     }

     if (isset($_POST['update-user'])) {

      administrateurUniquement();

         $erreur = validerUsers($_POST);

       if (count($erreur) === 0){
           $id = $_POST['id'];
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']); 
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); //Afin de crypter le mot de passe...


          $_POST['admin'] = isset($_POST['admin']) ? 1 : 0; 
          $count = update('users', $id, $_POST);        
          $_SESSION['message'] = "Vous venez de modifier un  utilisateur";
          $_SESSION['type'] = 'success';
          header('location: ' . BASE_URL . '/others/post/user/index.php');
          exit();

  }else{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
    }
     }

     if (isset($_GET['id'])) {
         $user = selectONE($table, ['id' => $_GET['id']]);
         $id = $user['id'];
         $username = $user['username'];
        $email = $user['email'];
     }     


     if (isset($_POST['login-btn'])){
         $erreur = validerLOGIN($_POST);

         if (count($erreur) === 0){
             $arthur = SelectONE('users', ['username' => $_POST['username']]);

             if($arthur && password_verify($_POST['password'], $arthur['password'])){
                $_SESSION['id'] = $arthur['id'];
                $_SESSION['username'] = $arthur['username']; 
                $_SESSION['admin'] = $arthur['admin']; 
                $_SESSION['message'] = 'Vous êtes connecté'; 
                $_SESSION['type'] = 'success'; 
                
                if($_SESSION['admin']){
                    header('location:' .BASE_URL. '/others/post/dashboard.php');
                }else{
                    header('location:' .BASE_URL. '/index.php');
                }
                exit();
             }else{
                 array_push($erreur, 'Les données entré sont erronés');
             }
         }
         $username = $_POST['username'];
         $password = $_POST['password'];
     }

     if(isset($_GET['delete_id'])){
         administrateurUniquement();
         $count = suprimer($table, $_GET['delete_id']);
         $_SESSION['message'] = "Vous venez de suprimer un utilisateur avec succès";
         $_SESSION['type'] = 'success';
         header('location: ' . BASE_URL . '/others/post/user/index.php');
         exit();
     }
     
?>