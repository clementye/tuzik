<?php
  session_start();
  if ($_POST["action"] == "Enregister") {
    require_once "../models/fabricant.php";

    $ajouter_fabricant($_POST["adresse"], $_POST["nom"], $_POST["specialite"], $_POST["prix"], $_SESSION["user-id"]);

    $_SESSION["user-statue"] = "Fabriquant";
    $confirmation = "Vos information de fabricant ont bien été enregistrées.";
    require_once "../views/espace_personnel.php";
  } else {
    $erreur = "Erreur de connexion avec le serveur.";
    require_once "../views/fabricant.php";
  }
 ?>
