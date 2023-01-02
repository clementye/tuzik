<?php
  session_start();
  if ($_POST["action"] == "Enregister") {
    require_once "../models/magasin.php";

    $ajouter_fabricant($_POST["adresse"], $_POST["nom"], $_POST["horaires"], $_SESSION["user-id"]);

    $_SESSION["user-statue"] = "Gérant de magasin";
    $confirmation = "Votre magasin fut bien enregistré.";
    require_once "../views/espace_personnel.php";
  } else {
    $erreur = "Erreur de connexion avec le serveur.";
    require_once "../views/magasin.php";
  }
 ?>
