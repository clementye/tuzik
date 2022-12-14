<?php
  require_once "../models/utilisateur.php";

  // On vérifie que l'email et
  $changement = $recuperer_utilisateur($_POST[]);

  if ($changement == false){
    $erreur = "Erreur de connexion au serveur.";
    require_once("/views/.php");
  } else {
    $modifier_utilisateur($_POST[]);
    $confirmation = "Les changements ont été effectués.";
  }

 ?>
