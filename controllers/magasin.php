<?php
  session_start();
  require_once "../views/magasin.php";
  if ($_POST["action"] == "Enregister") {
    require_once "../models/magasin.php";

    $ajouter_fabricant($_POST["adresse"], $_POST["nom"], $_POST["horaires"], $_SESSION["user-id"]);
    $utilisateur = $recuperer_utilisateur($_POST["email"]);
    $ajouter_statue_utilisateur( $utilisateur->NumMagasin);

    $_SESSION["user-statue"] = "Gérant de magasin";
    $confirmation = "Votre magasin fut bien enregistré.";
    require_once "../views/espace_personnel.php";
  } else {
    $erreur = "Erreur de connexion avec le serveur.";
    require_once "../views/magasin.php";
  }
 ?>
