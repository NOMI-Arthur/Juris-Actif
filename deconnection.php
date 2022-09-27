<?php 
require('ouverture.php');
$_SESSION['id'] = $arthur['id'];
unset($_SESSION['username']); 
        unset($_SESSION['admin']); 
        unset($_SESSION['Message']); 
        unset($_SESSION['type']); 
        session_destroy();

        header('location:' . BASE_URL .'/index.php');
            

?>