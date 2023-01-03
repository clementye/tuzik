<?php
  session_start();
  if ($_POST["action"] == "Enregister") {
    require_once "../models/ajoutArticle.php";

    $ajouter_article($_POST["titre"], $_POST["categorie"], $_POST["prix"], $_SESSION["user-id"]);

    $confirmation = "Vos information de fabricant ont bien été enregistrées.";
    require_once "../views/accueil.php";
  } else {
    $erreur = "Erreur de connexion avec le serveur.";
    require_once "../views/pageDemande.php";
  }
 ?>
