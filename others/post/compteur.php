<?php
    
function ajouter_vue() : void{
    
    $fichier_journalier =  ROOT_PATH . "/others/post/vues/compteur-" . date('Y-m-d') . '-.txt';
    $fichier = ROOT_PATH . "/others/post/vues/compteur.txt";
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);
}

function nombre_vues() : string{
    $file = "vues\compteur.txt";
    return file_get_contents($file);
}

function incrementer_compteur(string $fichier): void{
    $compteur = '1';
    if(file_exists($fichier)){
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
        file_put_contents($fichier, $compteur);    
    }else{
        file_put_contents($fichier, $compteur);
    }
    
}
function nombre_articles_mois(int $an, int $mois): int{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $file = "vues\compteur-" . $an . '-' . $mois . '-' . '*';
    $files = glob($file); //Donc ici $file est le pattern...
    $total = 0;
    foreach($files as $a){
        $total += (int)file_get_contents($a); 
    }
    return $total;
}
function nombre_articles_detail_mois(int $an, int $mois): array{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $file = "vues\compteur-" . $an . '-' . $mois . '-' . '*';
    $files = glob($file);
    $lus = [];
    foreach($files as $a){
        $parties = explode('-', basename($a));
        $lus[] = [
        'annee' => $parties[1],
        'mois' => $parties[2],
        'jour' => $parties[3],
        'lus' => file_get_contents($a)
        ];
    }
    return $lus;
}
?>