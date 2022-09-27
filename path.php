
<?php

define("ROOT_PATH", realpath(dirname(__FILE__)));
define("BASE_URL", "http://localhost:80/JurisActif/");
?>
<?php
                  if(!empty($_GET['file'])){
                    $nomDocument = basename($_GET['file']);
                     $cheminDocumentPDF = ROOT_PATH . '/Fichiers/Doc/' . $nomDocument;
                     if((!empty($nomDocument) && file_exists($cheminDocumentPDF))){

                      header("Cache-control: public");
                      header("Content-Discription: FIle Transfer");
                      header("Content-Disposition: Attachment; filename=$nomDocument");
                      header("Content-Type: application/zip");
                      header("Content-Transfer-Emcoding: binary");

                      readfile($cheminDocumentPDF);
                      unset($_GET['file']);
                      exit;

                     }else{
                        echo "Fichier Manquant...";
                      }
                     }
?>