<?php

function validerDocuments($theFuckingDoc){

    $erreur = array();

    if (empty($theFuckingDoc['name'])){
        array_push($erreur, "Le titre de la publication est obligatoire");
      }elseif (empty($theFuckingDoc['body'])) {
          array_push($erreur, 'La description de votre pdf est complémentaire afin de mieux orienté les visiteurs du blog');
      }elseif (empty($theFuckingDoc['id_sujet'])) {
          array_push($erreur, "Veuillez Sélectionner un sujet Monsieur " . $_SESSION['username']);
      }
      $publicationExistante = selectOne('publicationdoc', ['name' => $theFuckingDoc['name']]);
      if ($publicationExistante) {
          array_push($erreur, "Une publication avec un titre semblable existe déjà");
      }
      return $erreur;
}