<?php
  session_start();
  if ($_POST["action"] == "Enregister") {
    require_once "../models/ajoutArticle.php";

    $catégorie = $trouver_catégorie($_POST["categorie"]);
    $ajouter_article($_POST["titre"], $_POST["prix"], $_SESSION["user-id"], $catégorie->id);

    $confirmation = "Vos information de fabricant ont bien été enregistrées.";
    require_once "../views/pageDemande.php";
  } else {
    $erreur = "Erreur de connexion avec le serveur.";
    require_once "../views/pageDemande.php";
  }
 ?>
