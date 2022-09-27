<?php 
      $sujet = "Le message du visiteur à JurisActif..." ;
      $message = $_POST['message'];
      $header = "From:\"nash\"<lnomi274@gmail.com>\n";
      $destinataire = "lnomi274@gmail.com";
      $header .= "Reply-To:lnomi274@gmail.com\n";
      $header .= "Content-Type:text/html; charset=\"iso-8859-1\"";
      if(mail($destinataire, $sujet, $message, $header)){
        echo "Message envoyé";
      }else {
        echo "Message non envoyé veuillez vérifier les données entrée.";
      }
    ?>