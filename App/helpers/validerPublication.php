<?php


function validerPublication($publication){
    $erreur = array();
    
        if (empty($publication['title'])){
           array_push($erreur, 'Le titre de la publication est obligatoire');
        }elseif (empty($publication['body'])){
            array_push($erreur, 'Le corps de la publcation est vide');
        }elseif (empty($publication['sujet_id'])) {
            array_push($erreur, 'Veuillez sélectionner un sujet svp');
        }
        $publicationExistante = selectOne('posts', ['title' => $publication['title']]);
        if($publicationExistante){
            if(isset($publication['update-post']) && $publication['id'] != $publicationExistante['id']){
                array_push($erreur, 'Le titre de cette publication existe déjà');    
            }
            if(isset($publication['add-post'])){
                array_push($erreur, 'Le titre de cette publication existe déjà');       
            }
            
        }

        return $erreur;
}

