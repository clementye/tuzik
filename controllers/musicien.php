<?php
  session_start();
  if ($_POST["action"] == "Enregister") {
    require_once "../models/musicien.php";

    $ajouter_musicien($_POST["adresse"], $_POST["instrument"], $_POST["niveau"], $_POST["bio"], $_SESSION["user-id"]);

    $_SESSION["user-statue"] = "Musicien";
    $confirmation = "Vos information de musicien ont bien été enregistrées.";
    require_once "../views/espace_personnel.php";
  } else {
    $erreur = "Erreur de connexion avec le serveur.";
    require_once "../views/musicien.php";
  }
 ?>
