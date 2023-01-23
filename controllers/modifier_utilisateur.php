<?php
  require_once "../models/utilisateur.php";

  $changement = $recuperer_utilisateur($_POST["email"]);
  $hash = $changement->motdepasse;
  if ($changement == false || !password_verify($_POST["password"], $hash)){
    $erreur = "Erreur de connexion au serveur.";
    require_once "../views/modifier_utilisateur.php";
  } else {
    $modifier_utilisateur($_POST["newPassword"], $_POST["nom"], $_POST["prenom"], $_POST["telephone"], $_POST["email"]);
    $confirmation = "Les changements furent effectués.";
    require_once "../controllers/espace_membres.php";
  }


 ?>
