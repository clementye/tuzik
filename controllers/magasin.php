<?php
  session_start();
  //require_once "../views/magasin.php";
  if ($_POST["action"] == "Enregister") {
    require_once "../models/magasin.php";

    $ajouter_magasin($_POST["adresse"], $_POST["nom"], $_POST["horaires"], $_SESSION["user-id"]);
    $magasin = $afficher_magasin_precis($_POST["nom"]);
    $ajouter_statue_utilisateur($magasin->NumMagasin, $_SESSION["user-email"]);

    $_SESSION["user-statue"] = "Gérant de magasin";
    $confirmation = "Votre magasin fut bien enregistré.";
    require_once "../views/espace_personnel.php";
  } else {
    $erreur = "Erreur de connexion avec le serveur.";
    require_once "../views/magasin.php";
  }
 ?>
