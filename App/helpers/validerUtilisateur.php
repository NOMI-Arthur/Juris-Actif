<?php
function validerUsers($user){
    
    if (isset($_POST['register-btn']) || isset($_POST['create-admin'])){ 

        $erreur = array();
        $tr = verifierNom_Utilisateur($user['username']);
    
        if (empty($user['username'])){
           array_push($erreur, 'Le nom utilisateur est obligatoire');
        }elseif (empty($user['password'])){
            array_push($erreur, 'Aucun mot de passe na été saisie');
        }elseif (empty($user['email'])) {
            array_push($erreur, 'email est obligatoire');
        }elseif ($user['password'] !== $user['passwordConf']) {
            array_push($erreur, 'Les mots de passe ne correspondent pas !!');
        }elseif ( (strlen($user['password']) < 6) || (strlen($user['password']) > 10) ) {
            array_push($erreur, "La taille du mot de passe doit être comprise entre 6 et 10 caractères");
        }elseif ($tr === true) {
            array_push($erreur, "Le Nom d'utilisateur entré est invalid, il comporte des caractères spéciaux ou des chiffres");
        }elseif ((strlen($user['username']) < 4) || (strlen($user['username']) > 16)) {
            array_push($erreur, "La taille du nom d'utilisateur est invalid ! Elle doit être comprise entre 4 et 16 caractères.");
        }

        $utilisateurExistant = selectOne('users', ['email' => $user['email']]);
        if($utilisateurExistant){
            if(isset($user['update-user']) && $user['id'] != $utilisateurExistant['id']){
                array_push($erreur, 'Cet email existe déjà...');    
            }
            if(isset($user['create-admin'])){
                array_push($erreur, 'Cet email existe déjà...');    
            }
            
        }

        return $erreur;
}
}

function validerLOGIN($user){
    if (isset($_POST['login-btn'])){ 

        $erreur = array();
    
        if (empty($user['username'])){
           array_push($erreur, 'Le nom utilisateur est obligatoire');
        }
        if (empty($user['password'])){
            array_push($erreur, 'Aucun mot de passe na été saisie');
        }
        return $erreur;
}
}
function verifierNom_Utilisateur($mot): bool{
    $trouve = false;
    $max = strlen($mot) - 1;
    $i = 0;
    $invalid = [",", "#", "@", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "*", "&", "=", "(", "-", "_", ")"];
    while ( ($i <= $max) && ($trouve === false) ) {
        foreach ($invalid as $a){
            if ($a === $mot[$i]) {
                $trouve = true;
            }
        }
        $i++;
    }
    return $trouve;
}