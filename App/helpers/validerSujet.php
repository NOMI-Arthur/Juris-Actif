<?php
function validerSujet($sujet){

        $erreur = array();
    
        if (empty($sujet['name'])){
           array_push($erreur, 'Le Sujet est obligatoire');
        }
        $sujetExistant = selectOne('topics', ['name' => $sujet['name']]);
        if($sujetExistant){
            if(isset($publication['update-topic']) && $publication['id'] != $publicationExistante['id']){
                array_push($erreur, 'Ce nom existe déjà...');    
            }
            if(isset($publication['add-topic'])){
                array_push($erreur, 'Ce nom existe déjà...');       
            }
            
        }
        return $erreur;

}
