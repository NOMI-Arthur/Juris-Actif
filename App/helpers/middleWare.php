<?php

function utilisateurUniquement($redirect = '/index.php'){
    if(isset($_SESSION['id'])){
        $_SESSION['message'] = "Vous n'êtes pas connecté";
        $_SESSION['type'] = "error";
        header('location :' . BASE_URL . $redirect);
        exit(0);
    }
}
function administrateurUniquement($redirect = '/index.php'){
    if(empty($_SESSION['id']) || empty($_SESSION['admin'])){
        $_SESSION['message'] = "Vous pas autorisé";
        $_SESSION['type'] = "error";
        header('location:' . BASE_URL . $redirect);
        exit(0);
    }
}
function inviteUniquement($redirect = '/index.php'){
    if(isset($_SESSION['id'])){
        header('location :' . BASE_URL . $redirect);
        exit(0);
    }
}