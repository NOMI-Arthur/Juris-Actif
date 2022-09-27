<?php

require('connect.php');

//Fonction permettant d'éviter des répétitions du code d'éxécution de la requette SQL...

function executerTous($sql, $data){
    global $nomi;
    $stat = $nomi->prepare($sql);
    $value = array_values($data);
    $types = str_repeat('s', count($value));
    $stat->bind_param($types, ...$value);
    $stat->execute();
    return $stat;
}

// Fonction permettant d'afficher...
function affiche($resultat){
    echo "<pre>", print_r($resultat), "</pre>";
    die();
}

// Conditions sql....
//$data = [
  //    'admin' => 0,
    //  'username' => "Pogba NOMI",
      // 'email' => "arthuroi57@gmail.com",
       //'password' => "arthur"
    //];  


// Fonction dédié aux requettes et condions d'affichages..

function SelectAll($table, $condition = []){
global $nomi;
$i = 0;
$sql = "SELECT * FROM $table";
if(empty($condition)){
    $stat = $nomi->prepare($sql);
    $stat->execute();
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}
else{
    //retourner les requettes correspondantes à la conditions...
    foreach($condition as $key => $value){
        if($i === 0){
           $sql = $sql . " WHERE $key=?";
        }else{
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    $stat =  executerTous($sql, $condition);
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}
}

// Sélectionner un seule ***

function SelectONE($table, $condition){
    global $nomi;
    $i = 0;
    $sql = "SELECT * FROM $table";

       
        foreach($condition as $key => $value){
            if($i === 0){
               $sql = $sql . " WHERE $key=?";
            }else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

          $sql = $sql . " LIMIT 1";

        $stat = $nomi->prepare($sql);
        $value = array_values($condition);
        $types = str_repeat('s', count($value));
        $stat->bind_param($types, ...$value);
        $stat->execute();
        $uss = $stat->get_result()->fetch_ASSOC();
        return $uss;
    }
 //fonction pour la création des tables
 function create($table, $data)
 {
     global $nomi;
     $sql = "INSERT INTO $table SET ";
            $i = 0;
     foreach($data as $key => $value){
        if($i === 0){
           $sql = $sql . " $key=?";
        }else{
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $stat = executerTous($sql, $data);
    $id = $stat->insert_id;
    return $id;
 }

// Fonction permettant de mettre à jour les champs de la base de donnée

function Update($table, $id, $data){
    global $nomi;
    $sql = "UPDATE $table SET ";
           $i = 0;
    foreach($data as $key => $value){
       if($i === 0){
          $sql = $sql . " $key=?";
       }else{
           $sql = $sql . ", $key=?";
       }
       $i++;
   }
   $sql = $sql . " WHERE id=?";
   $data['id'] = $id;
   $stat = executerTous($sql, $data);
   return $stat->affected_rows;
}

//fonction permettant de suprimer un yser 


function Suprimer($table, $id){
    global $nomi;
    $sql = "DELETE FROM $table WHERE id=?";
   
   $stat = executerTous($sql, ['id' => $id]);
   return $stat->affected_rows;
}


//Test....
//$id = create('users', $data);
//affiche($id);

//La jointure ::

function getpublishedPublication(){
    global $nomi; 
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? ORDER BY id DESC";
    
    $stat =  executerTous($sql, ['published' => 1]);
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}

function getpublishedDocument(){
    global $nomi; 
    $sql = "SELECT p.*, u.username FROM publicationdoc AS p JOIN users AS u ON p.user_id=u.id WHERE p.publish=? ORDER BY id DESC";
    
    $stat =  executerTous($sql, ['publish' => 1]);
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}

function searchDocument($term){

    $relie = '%' . $term . '%';
    global $nomi; 
    $sql = "SELECT p.*, u.username 
    FROM publicationdoc AS p 
    JOIN users AS u 
    ON p.user_id=u.id 
    WHERE p.publish=?
    AND p.name LIKE ? OR p.body LIKE ?";
    
    $stat =  executerTous($sql, ['publish' => 1, 'name' => $relie, 'body' => $relie]);
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}


function getpublishedPublicationBY_Sujet($sujet_id){
    global $nomi; 
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND sujet_id=?";
    
    $stat =  executerTous($sql, ['published' => 1, 'sujet_id' => $sujet_id]);
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}

function recherchePublication($term){
    $relie = '%' . $term . '%';
    global $nomi; 
    $sql = "SELECT p.*, u.username 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            WHERE p.published=?
            AND p.title LIKE ? OR p.body LIKE ?
            ";
    
    $stat =  executerTous($sql, ['published' => 1, 'title' => $relie, 'body' => $relie]);
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}


function getArchivedPublication(){
    global $nomi; 
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";
    
    $stat =  executerTous($sql, ['published' => 0]);
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}

function getArchived_publicationBySujet($sujet_id){
    global $nomi; 
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND $sujet_id=?";
    
    $stat =  executerTous($sql, ['published' => 0, 'sujet_id' => $sujet_id]);
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}


function searchOld_Publication($term){
    $relie = '%' . $term . '%';
    global $nomi; 
    $sql = "SELECT p.*, u.username 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            WHERE p.published=?
            AND p.title LIKE ? OR p.body LIKE ?
            ";
    
    $stat =  executerTous($sql, ['published' => 0, 'title' => $relie, 'body' => $relie]);
    $uss = $stat->get_result()->fetch_all(MYSQLI_ASSOC);
    return $uss;
}

?>